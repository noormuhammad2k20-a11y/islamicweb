<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Hadith;
use App\Models\HadithTopic;
use App\Models\HadithCollection;
use App\Models\HadithNarrator;

class ImportMassiveHadithData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hadith:import-json {path : The path to the JSON file containing hadiths}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import thousands of authentic hadiths from a structured JSON file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');

        if (!File::exists($path)) {
            $this->error("File not found at path: {$path}");
            return Command::FAILURE;
        }

        $this->info("Loading JSON file...");
        
        $json = File::get($path);
        $data = json_decode($json, true);

        if (!$data || !is_array($data)) {
            $this->error("Invalid JSON format. Expected an array of hadiths.");
            return Command::FAILURE;
        }

        $count = count($data);
        $this->info("Found {$count} hadiths to import.");

        $bar = $this->output->createProgressBar($count);

        $collections = HadithCollection::all()->keyBy('name_en');
        $narrators = HadithNarrator::all()->keyBy('name_en');
        $topics = HadithTopic::all()->keyBy('slug');

        foreach ($data as $item) {
            $collectionName = $item['collection'] ?? null;
            $narratorName = $item['narrator'] ?? null;
            
            $collectionId = null;
            if ($collectionName && isset($collections[$collectionName])) {
                $collectionId = $collections[$collectionName]->id;
            } elseif ($collectionName) {
                // Auto create collection if not found
                $col = HadithCollection::create([
                    'name_en' => $collectionName,
                    'slug' => Str::slug($collectionName),
                    'reliability' => 'Unknown (Imported)',
                ]);
                $collections[$collectionName] = $col;
                $collectionId = $col->id;
            }

            $narratorId = null;
            if ($narratorName && isset($narrators[$narratorName])) {
                $narratorId = $narrators[$narratorName]->id;
            } elseif ($narratorName) {
                $nar = HadithNarrator::create([
                    'name_en' => $narratorName,
                    'slug' => Str::slug($narratorName)
                ]);
                $narrators[$narratorName] = $nar;
                $narratorId = $nar->id;
            }

            $hadith = Hadith::create([
                'arabic_text' => $item['arabic'] ?? '',
                'english_translation' => $item['english'] ?? '',
                'urdu_translation' => $item['urdu'] ?? '',
                'reference' => $item['reference'] ?? '',
                'grade' => $item['grade'] ?? '',
                'slug' => isset($item['english']) ? Str::slug(Str::limit($item['english'], 50)) : Str::uuid(),
                'book_name' => $collectionName,
                'chapter' => $item['chapter'] ?? null,
                'chapter_number' => $item['chapter_number'] ?? null,
                'narrator' => $narratorName,
                'narrator_id' => $narratorId,
                'collection_id' => $collectionId,
                'explanation' => $item['explanation'] ?? null,
                'key_lessons' => $item['lessons'] ?? null,
            ]);

            // Attach topics
            if (isset($item['topics']) && is_array($item['topics'])) {
                $topicIds = [];
                foreach ($item['topics'] as $topicSlug) {
                    if (isset($topics[$topicSlug])) {
                        $topicIds[] = $topics[$topicSlug]->id;
                    }
                }
                if (count($topicIds) > 0) {
                    $hadith->topics()->attach($topicIds);
                }
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Successfully imported {$count} hadiths!");

        return Command::SUCCESS;
    }
}
