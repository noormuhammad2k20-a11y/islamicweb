<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DreamSymbol;
use Illuminate\Support\Str;

class ImportDreamsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dreams:import {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Khwabon Ki Tabeer from a JSON dataset';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = $this->argument('file');
        
        if (!file_exists($file)) {
            $this->error("File not found: {$file}");
            return 1;
        }

        $json = file_get_contents($file);
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($extension === 'csv') {
            $rows = array_map('str_getcsv', file($file));
            $header = array_shift($rows);
            $data = [];
            foreach ($rows as $row) {
                if (count($header) == count($row)) {
                    $data[] = array_combine($header, $row);
                }
            }
        } else {
            $data = json_decode($json, true);
        }

        if (!$data) {
            $this->error("Invalid file format or empty data.");
            return 1;
        }

        $this->info("Importing " . count($data) . " Dreams...");
        
        $bar = $this->output->createProgressBar(count($data));
        $bar->start();

        foreach ($data as $item) {
            $slug = Str::slug($item['symbol_english'] ?? ($item['symbol_urdu'] ?? 'dream'));
            
            // Check for existing canonical record by exact english name or slug
            $existing = DreamSymbol::where('slug', $slug)
                                   ->orWhere('symbol_english', $item['symbol_english'] ?? '')
                                   ->first();
                                   
            if ($existing) {
                // If it exists, append to scholarly opinions instead of creating a duplicate
                $opinions = $existing->scholarly_opinions ?? [];
                
                // Avoid duplicating the exact same opinion
                $alreadyExists = false;
                foreach ($opinions as $op) {
                    if (($op['scholar'] ?? '') === ($item['scholar_reference'] ?? '')) {
                        $alreadyExists = true;
                        break;
                    }
                }
                
                if (!$alreadyExists) {
                    $opinions[] = [
                        'scholar' => $item['scholar_reference'] ?? 'Unknown',
                        'interpretation_urdu' => $item['detailed_interpretation_urdu'] ?? null,
                        'interpretation_english' => $item['detailed_interpretation_english'] ?? null,
                        'source' => $item['source_book'] ?? null,
                    ];
                    $existing->update(['scholarly_opinions' => $opinions]);
                }
                
                $bar->advance();
                continue;
            }

            // Create new canonical record
            $dream = DreamSymbol::create([
                'symbol_urdu' => $item['symbol_urdu'] ?? null,
                'symbol_arabic' => $item['symbol_arabic'] ?? null,
                'symbol_roman_urdu' => $item['symbol_roman_urdu'] ?? null,
                'symbol_english' => $item['symbol_english'] ?? null,
                'short_interpretation' => $item['short_interpretation'] ?? null,
                'interpretation_urdu' => $item['detailed_interpretation_urdu'] ?? null,
                'detailed_interpretation_urdu' => $item['detailed_interpretation_urdu'] ?? null,
                'interpretation_english' => $item['detailed_interpretation_english'] ?? null,
                'detailed_interpretation_english' => $item['detailed_interpretation_english'] ?? null,
                'scholar_reference' => $item['scholar_reference'] ?? 'Ibn Sirin',
                'source_book' => $item['source_book'] ?? null,
                'scholarly_opinions' => [[
                    'scholar' => $item['scholar_reference'] ?? 'Ibn Sirin',
                    'interpretation_urdu' => $item['detailed_interpretation_urdu'] ?? null,
                    'interpretation_english' => $item['detailed_interpretation_english'] ?? null,
                    'source' => $item['source_book'] ?? null,
                ]],
                'dream_type' => $item['dream_type'] ?? 0,
                'is_good_dream' => isset($item['dream_type']) && $item['dream_type'] == 1 ? 1 : 0,
                'slug' => $slug,
                'keywords' => $item['keywords'] ?? [],
                'search_keywords' => $item['search_keywords'] ?? null,
                'seo_title' => $item['seo_title'] ?? null,
                'meta_title' => $item['meta_title'] ?? null,
                'meta_description' => $item['meta_description'] ?? null,
                'canonical_url' => url('/khwabon-ki-tabeer/' . $slug),
                'published_status' => 1,
                'faqs' => $item['faqs'] ?? null,
                'quran_reference' => $item['quran_reference'] ?? null,
                'hadith_reference' => $item['hadith_reference'] ?? null,
            ]);

            $bar->advance();
        }

        $bar->finish();
        $this->info("\nImport completed successfully!");
        return 0;
    }
}
