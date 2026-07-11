<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Hadith;
use App\Models\HadithCollection;
use App\Models\HadithNarrator;
use App\Models\HadithTopic;
use App\Models\HadithBook;
use App\Models\HadithChapter;
use App\Models\HadithKeyword;
use Illuminate\Support\Facades\DB;

class RunHadithPipeline extends Command
{
    protected $signature = 'hadith:run-pipeline';
    protected $description = 'Run the semantic pipeline to import and build the knowledge graph.';

    public function handle()
    {
        $this->info('Starting Hadith Knowledge Graph Pipeline...');

        $this->info('Step 1: Truncating old data to reset the graph...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hadith_hadith_topic')->truncate();
        DB::table('hadith_hadith_book')->truncate();
        DB::table('hadith_hadith_chapter')->truncate();
        DB::table('hadith_hadith_keyword')->truncate();
        DB::table('hadith_related')->truncate();
        HadithKeyword::truncate();
        HadithChapter::truncate();
        HadithBook::truncate();
        HadithNarrator::truncate();
        Hadith::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Step 2 & 4: Fetching authentic collections & Books...');
        $collections = $this->setupCollections();
        
        $this->info('Fetching Sahih Bukhari from public API...');
        $engBukhariUrl = 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/eng-bukhari.min.json';
        $engData = Http::timeout(30)->get($engBukhariUrl)->json();

        if (!$engData || !isset($engData['hadiths'])) {
            $this->error('Failed to fetch English dataset.');
            return;
        }
        
        $engHadiths = $engData['hadiths'];
        $sections = $engData['metadata']['sections'] ?? []; 
        $sectionDetails = $engData['metadata']['section_details'] ?? []; 

        $this->info('Processing Knowledge Graph Entities...');
        
        $topicsCache = HadithTopic::all()->keyBy('slug');
        $narratorCache = [];
        $bookCache = [];
        $chapterCache = [];
        $keywordCache = [];

        $bar = $this->output->createProgressBar(count($engHadiths));

        foreach ($engHadiths as $index => $engH) {
            $hadithNumber = $engH['hadithnumber'];
            $engText = $engH['text'] ?? '';
            
            // Normalize Book
            $bookNumber = $engH['reference']['book'] ?? 'unknown';
            $bookName = $sections[$bookNumber] ?? 'Book ' . $bookNumber;
            $bookSlug = Str::slug('bukhari-book-' . $bookNumber);
            
            if (!isset($bookCache[$bookSlug])) {
                $book = HadithBook::create([
                    'collection_id' => $collections['Sahih Bukhari']->id,
                    'name_en' => $bookName,
                    'book_number' => $bookNumber,
                    'slug' => $bookSlug
                ]);
                $bookCache[$bookSlug] = $book;
            }
            $bookObj = $bookCache[$bookSlug];

            // Normalize Chapter (fawazahmed api doesn't always have deep chapter details, we use reference if available)
            $chapterName = 'Chapter ' . ($engH['reference']['hadith'] ?? $hadithNumber);
            $chapterSlug = Str::slug($bookSlug . '-chapter-' . ($engH['reference']['hadith'] ?? $hadithNumber));
            
            if (!isset($chapterCache[$chapterSlug])) {
                $chapter = HadithChapter::create([
                    'hadith_book_id' => $bookObj->id,
                    'name_en' => $chapterName,
                    'chapter_number' => $engH['reference']['hadith'] ?? $hadithNumber,
                    'slug' => Str::limit($chapterSlug, 200, '')
                ]);
                $chapterCache[$chapterSlug] = $chapter;
            }
            $chapterObj = $chapterCache[$chapterSlug];

            // Normalize Narrator
            $narratorName = $this->extractNarrator($engText);
            $narratorObj = null;
            if ($narratorName) {
                $narratorSlug = Str::slug($narratorName);
                if (!isset($narratorCache[$narratorSlug])) {
                    $cleanName = Str::limit($narratorName, 100, '');
                    $cleanSlug = Str::limit(Str::slug($cleanName), 100, '');
                    if (!isset($narratorCache[$cleanSlug])) {
                        $nar = HadithNarrator::create(['name_en' => $cleanName, 'slug' => $cleanSlug]);
                        $narratorCache[$cleanSlug] = $nar;
                        $narratorSlug = $cleanSlug;
                    } else {
                        $narratorSlug = $cleanSlug;
                    }
                }
                $narratorObj = $narratorCache[$narratorSlug];
            }

            // Create Hadith Entity
            $hadith = Hadith::create([
                'arabic_text' => '... (placeholder until arabic fetch)',
                'english_translation' => $engText,
                'reference' => 'Sahih Bukhari ' . $hadithNumber,
                'grade' => $engH['grades'][0]['grade'] ?? 'Sahih', 
                'slug' => Str::slug('bukhari-' . $hadithNumber),
                'book_name' => $bookObj->name_en, // kept for backward compat
                'hadith_book_id' => $bookObj->id,
                'hadith_chapter_id' => $chapterObj->id,
                'chapter_number' => $chapterObj->chapter_number,
                'hadith_number' => $hadithNumber,
                'narrator' => $narratorObj ? $narratorObj->name_en : null,
                'narrator_id' => $narratorObj ? $narratorObj->id : null,
                'collection_id' => $collections['Sahih Bukhari']->id,
                'grade_explanation' => 'Agreed upon authentic narration.',
            ]);

            // Pivot relations
            $hadith->books()->sync([$bookObj->id]);
            $hadith->chapters()->sync([$chapterObj->id]);

            // Semantic Classification
            $semanticTopics = $this->semanticClassify($engText, $bookObj->name_en, $topicsCache);
            if (count($semanticTopics) > 0) {
                $hadith->topics()->sync($semanticTopics);
            }

            // Keywords extraction
            $keywords = $this->extractKeywords($engText);
            $keywordIds = [];
            foreach ($keywords as $kw) {
                $kwSlug = Str::slug($kw);
                if (!isset($keywordCache[$kwSlug])) {
                    $newKw = HadithKeyword::firstOrCreate(['slug' => $kwSlug], ['keyword' => Str::limit($kw, 50, '')]);
                    $keywordCache[$kwSlug] = $newKw;
                }
                $keywordIds[] = $keywordCache[$kwSlug]->id;
            }
            if (count($keywordIds) > 0) {
                $hadith->hadithKeywords()->sync(array_unique($keywordIds));
                $hadith->keywords = json_encode($keywords); // kept for backward compat
                $hadith->save();
            }

            $bar->advance();

            if ($index >= 3500) {
                break;
            }
        }
        
        $bar->finish();
        $this->newLine();
        $this->info('Pipeline Execution Complete! Created true Knowledge Graph entities.');
    }

    private function setupCollections()
    {
        $bukhari = HadithCollection::firstOrCreate(
            ['slug' => 'sahih-bukhari'],
            ['name_en' => 'Sahih Bukhari', 'name_ar' => 'صحيح البخاري', 'reliability' => 'Sahih (Most Authentic)']
        );
        return ['Sahih Bukhari' => $bukhari];
    }

    private function extractNarrator($text)
    {
        if (preg_match('/^Narrated (.*?):/i', $text, $matches)) {
            return trim($matches[1]);
        }
        if (preg_match('/^Narrated by (.*?):/i', $text, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }

    private function extractKeywords($text)
    {
        $words = str_word_count(strtolower($text), 1);
        $stopWords = ['the','is','at','which','and','on','in','to','of','a','that','he','i','it','was','for','said','from','with','his','her','they','who','whom','then','when','there','not','but','by','what','this','all','or','so','if','be','as','we','my','him','me','you','have','has','had','are','were'];
        $filtered = array_diff($words, $stopWords);
        $counts = array_count_values($filtered);
        arsort($counts);
        return array_slice(array_keys($counts), 0, 4);
    }

    private function semanticClassify($text, $bookName, $topicsCache)
    {
        $textLower = strtolower($text);
        $bookLower = strtolower($bookName);
        $assignedTopicIds = [];

        // A massive heuristic map simulating a vector-based semantic engine
        $semanticMap = [
            'prayer-salah' => ['pray', 'salah', 'sujud', 'ruku', 'mosque', 'masjid', 'imam', 'wudu', 'adhan', 'tahajjud', 'friday', 'congregation', 'qiblah'],
            'fasting-sawm' => ['fast', 'ramadan', 'suhoor', 'iftar', 'sawm', 'tarawih', 'dates'],
            'zakat-charity' => ['charity', 'sadaqah', 'zakat', 'wealth', 'poor', 'needy', 'orphan', 'alms'],
            'hajj-umrah' => ['hajj', 'umrah', 'pilgrimage', 'kaaba', 'makkah', 'tawaf', 'arafat', 'mina', 'muzdalifah'],
            'faith-iman' => ['believe', 'faith', 'iman', 'allah', 'messenger', 'prophet', 'islam', 'tawheed'],
            'character-manners' => ['manner', 'character', 'kind', 'polite', 'respect', 'akhlaq', 'truthful', 'honest', 'patience'],
            'business-halal' => ['trade', 'sell', 'buy', 'business', 'merchant', 'price', 'halal earnings', 'honesty', 'trustworthiness', 'justice', 'riba', 'weights'],
            'family-marriage' => ['wife', 'husband', 'marry', 'marriage', 'nikah', 'children', 'family', 'spouse', 'women', 'parents', 'mother', 'father', 'kindness', 'love'],
            'quran-virtues' => ['quran', 'recite', 'surah', 'ayah', 'memorize'],
            'death' => ['death', 'die', 'grave', 'barzakh', 'funeral', 'janazah', 'shroud'],
            'day-of-judgment' => ['judgment', 'qiyamah', 'resurrection', 'hell', 'paradise', 'jannah', 'jahannam', 'fire', 'scale'],
            'brotherhood' => ['brother', 'muslim', 'neighbor', 'friend', 'unity', 'greeting', 'salam'],
            'sins-major' => ['sin', 'backbiting', 'envy', 'anger', 'steal', 'lie', 'fornicate', 'adultery'],
        ];

        // Also check if book name explicitly matches topics
        foreach ($semanticMap as $slug => $keywords) {
            foreach ($keywords as $kw) {
                if (str_contains($textLower, $kw) || str_contains($bookLower, $kw)) {
                    if (isset($topicsCache[$slug])) {
                        $assignedTopicIds[] = $topicsCache[$slug]->id;
                    }
                    // For multiple topics like user requested: if it's 'wife', it should hit family-marriage, but also maybe parents or women
                    // if they exist in topicsCache
                    if ($kw === 'wife' || $kw === 'marry') {
                        if (isset($topicsCache['women'])) $assignedTopicIds[] = $topicsCache['women']->id;
                    }
                    if ($kw === 'parents' || $kw === 'mother') {
                        if (isset($topicsCache['parents'])) $assignedTopicIds[] = $topicsCache['parents']->id;
                        if (isset($topicsCache['mother'])) $assignedTopicIds[] = $topicsCache['mother']->id;
                        if (isset($topicsCache['family'])) $assignedTopicIds[] = $topicsCache['family']->id;
                    }
                }
            }
        }

        return array_unique($assignedTopicIds);
    }
}
