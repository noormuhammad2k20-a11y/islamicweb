<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Wazifa;
use App\Models\WazifaCategory;
use Illuminate\Support\Str;

class ImportWazaifCommand extends Command
{
    protected $signature = 'wazaif:import {file}';
    protected $description = 'Import wazaif from a JSON file into the database';

    public function handle()
    {
        $file = $this->argument('file');
        
        if (!file_exists($file)) {
            $this->error("File not found: {$file}");
            return;
        }

        $json = file_get_contents($file);
        $data = json_decode($json, true);

        if (!$data) {
            $this->error("Invalid JSON file.");
            return;
        }

        $this->info("Importing " . count($data) . " Wazaif...");
        
        $bar = $this->output->createProgressBar(count($data));
        $bar->start();

        foreach ($data as $item) {
            $slug = Str::slug($item['title_english'] ?? ($item['title_urdu'] ?? 'wazifa'));
            // Ensure unique slug
            $originalSlug = $slug;
            $count = 1;
            while (Wazifa::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            // Check if Wazifa already exists by title
            $existing = Wazifa::where('title_english', $item['title_english'] ?? '')
                              ->orWhere('title_urdu', $item['title_urdu'] ?? '')
                              ->first();
            
            if ($existing) {
                // If exists, just skip to avoid duplicates
                $bar->advance();
                continue;
            }

            $wazifa = Wazifa::create([
                'title_urdu' => $item['title_urdu'] ?? null,
                'title_english' => $item['title_english'] ?? null,
                'slug' => $slug,
                'arabic_text' => $item['arabic_text'] ?? null,
                'urdu_text' => $item['urdu_text'] ?? null,
                'english_translation' => $item['english_translation'] ?? null,
                'transliteration' => $item['transliteration'] ?? null,
                'method' => $item['method'] ?? null,
                'benefits' => $item['benefits'] ?? null,
                'frequency' => $item['frequency'] ?? null,
                'before_after_salah' => $item['before_after_salah'] ?? null,
                'conditions' => $item['conditions'] ?? null,
                'precautions' => $item['precautions'] ?? null,
                'recommended_situations' => $item['recommended_situations'] ?? null,
                'book_name' => $item['book_name'] ?? null,
                'chapter' => $item['chapter'] ?? null,
                'hadith_number' => $item['hadith_number'] ?? null,
                'authenticity_grade' => $item['authenticity_grade'] ?? null,
                'scholar_verification' => $item['scholar_verification'] ?? null,
                'reference' => $item['reference'] ?? null,
                'reference_details' => $item['reference_details'] ?? null,
                'is_authentic' => $item['is_authentic'] ?? 1,
            ]);

            if (!empty($item['categories'])) {
                foreach ($item['categories'] as $catName) {
                    $category = WazifaCategory::firstOrCreate([
                        'slug' => Str::slug($catName)
                    ], [
                        'name_english' => $catName,
                        'name_urdu' => $catName, // We would need mapping for real translation
                    ]);
                    $wazifa->categories()->attach($category->id);
                }
            }
            
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nImport completed successfully!");
    }
}
