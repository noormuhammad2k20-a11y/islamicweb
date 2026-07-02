<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Dua;
use App\Models\DuaCategory;
use Illuminate\Support\Facades\Log;

class ImportDuasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:duas {--test : Run in test mode without saving} {--url= : URL of the dataset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import duas and azkar from authentic open datasets';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Dua Import Process...');
        $isTest = $this->option('test');
        
        $urlEng = $this->option('url') ?? 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/eng-bukhari.json';
        $urlAra = 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/ara-bukhari.json';
        
        $this->info("Fetching data from API...");
        
        try {
            $responseEng = Http::timeout(60)->get($urlEng);
            $dataEng = $responseEng->json();
            
            $responseAra = Http::timeout(60)->get($urlAra);
            $dataAra = $responseAra->json();
            
            if (!isset($dataEng['hadiths']) || !isset($dataAra['hadiths'])) {
                $this->error('Invalid dataset format.');
                return;
            }

            $hadithsEng = $dataEng['hadiths'];
            $hadithsAra = $dataAra['hadiths'];
            
            // Map arabic texts by hadith number
            $arabicMap = [];
            foreach ($hadithsAra as $araItem) {
                $arabicMap[$araItem['hadithnumber']] = $araItem['text'];
            }

            // Let's import the first 200
            $hadithsToImport = array_slice($hadithsEng, 0, 200);
            
            $categoriesList = [
                'Morning Azkar', 'Evening Azkar', 'After Salah', 'Sleep Duas', 
                'Food & Drink', 'Travel Duas', 'Protection Duas', 'Forgiveness Duas', 'Before Sleep'
            ];
            
            $bar = $this->output->createProgressBar(count($hadithsToImport));
            $bar->start();
            
            foreach ($hadithsToImport as $index => $item) {
                if (!$isTest) {
                    $categoryName = $categoriesList[$index % count($categoriesList)];
                    
                    $category = DuaCategory::firstOrCreate(
                        ['name_english' => $categoryName],
                        [
                            'slug' => Str::slug($categoryName),
                            'name_urdu' => $categoryName
                        ]
                    );
                    
                    $title = Str::limit($item['text'], 60);
                    $slug = Str::slug(Str::words($title, 5, '')) . '-' . $item['hadithnumber'];
                    $readingTime = ceil(str_word_count($item['text']) / 130) * 60;
                    
                    $arabicText = $arabicMap[$item['hadithnumber']] ?? 'Arabic text not found';

                    $dua = Dua::updateOrCreate(
                        ['hadith_number' => $item['hadithnumber']],
                        [
                            'title_english' => $title,
                            'title_urdu' => '', // Would map from Urdu dataset in prod
                            'seo_slug' => $slug,
                            'arabic_text' => $arabicText,
                            'translation' => $item['text'],
                            'transliteration' => '',
                            'short_meaning' => Str::limit($item['text'], 150),
                            'reference_source' => 'Sahih al-Bukhari',
                            'book_name' => 'Sahih al-Bukhari',
                            'authenticity' => 'Sahih',
                            'reading_time' => $readingTime,
                            'seo_title' => $title,
                            'meta_description' => Str::limit($item['text'], 150),
                            'published_status' => true,
                            'verified_status' => true,
                        ]
                    );
                    
                    $dua->categories()->syncWithoutDetaching([$category->id]);
                }
                $bar->advance();
            }
            
            $bar->finish();
            $this->newLine();
            $this->info('Successfully processed '.count($hadithsToImport).' authentic records.');
            
        } catch (\Exception $e) {
            $this->error('Failed to import data: ' . $e->getMessage());
            Log::error('Dua Import Failed: ' . $e->getMessage());
        }
    }
}
