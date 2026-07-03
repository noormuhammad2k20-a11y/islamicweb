<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DreamSymbol;
use Illuminate\Support\Str;

class ImportDreamsCommand extends Command
{
    protected $signature = 'dreams:import {file}';
    protected $description = 'Import Khwabon Ki Tabeer from a JSON dataset and strictly merge duplicates into master symbols';

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

        $this->info("Importing " . count($data) . " Dreams with strict duplicate merging...");
        
        $bar = $this->output->createProgressBar(count($data));
        $bar->start();

        foreach ($data as $item) {
            $rawEnglish = $item['symbol_english'] ?? '';
            $rawUrdu = $item['symbol_urdu'] ?? '';
            
            // Strictly remove numbered variations if any sneaked in
            $rawEnglish = preg_replace('/\(Type\s*\d+\)/i', '', $rawEnglish);
            $rawUrdu = preg_replace('/\(قسم\s*\d+\)/iu', '', $rawUrdu);

            $normalizedEnglish = $this->normalizeEnglishTitle($rawEnglish);
            $normalizedUrdu = $this->normalizeUrduTitle($rawUrdu);
            
            // Prefer english for slug, fallback to urdu
            $baseForSlug = !empty($normalizedEnglish) ? $normalizedEnglish : $normalizedUrdu;
            if (empty($baseForSlug)) {
                $baseForSlug = 'dream';
            }
            
            $slug = Str::slug($baseForSlug);
            
            // Search existing canonical record
            $existing = DreamSymbol::where('slug', $slug)
                ->orWhere('symbol_english', $normalizedEnglish)
                ->orWhere('symbol_urdu', $normalizedUrdu)
                ->first();
                                   
            if ($existing) {
                // If it exists, append to scholarly opinions instead of creating a duplicate
                $opinions = $existing->scholarly_opinions ?? [];
                
                // Avoid duplicating the exact same opinion context
                $alreadyExists = false;
                $newInterpretation = trim($item['detailed_interpretation_english'] ?? ($item['detailed_interpretation_urdu'] ?? ''));
                
                foreach ($opinions as $op) {
                    $existingInt = trim($op['interpretation_english'] ?? ($op['interpretation_urdu'] ?? ''));
                    if ($existingInt === $newInterpretation) {
                        $alreadyExists = true;
                        break;
                    }
                }
                
                if (!$alreadyExists && !empty($newInterpretation)) {
                    $opinions[] = [
                        'scholar' => $item['scholar_reference'] ?? 'General',
                        'interpretation_urdu' => $item['detailed_interpretation_urdu'] ?? null,
                        'interpretation_english' => $item['detailed_interpretation_english'] ?? null,
                        'source' => $item['source_book'] ?? null,
                    ];
                    
                    // Also merge keywords
                    $existingKeywords = is_array($existing->keywords) ? $existing->keywords : [];
                    $newKeywords = is_array($item['keywords'] ?? []) ? $item['keywords'] : [];
                    $mergedKeywords = array_values(array_unique(array_merge($existingKeywords, $newKeywords)));
                    
                    $existing->update([
                        'scholarly_opinions' => $opinions,
                        'keywords' => $mergedKeywords
                    ]);
                }
                
                $bar->advance();
                continue;
            }

            // Create new canonical record
            $dream = DreamSymbol::create([
                'symbol_urdu' => $normalizedUrdu,
                'symbol_arabic' => $item['symbol_arabic'] ?? null,
                'symbol_roman_urdu' => $item['symbol_roman_urdu'] ?? null,
                'symbol_english' => ucwords(strtolower($normalizedEnglish)),
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

    private function normalizeEnglishTitle($title)
    {
        if (empty($title)) return '';
        $title = strtolower(trim($title));
        
        // Remove common extraneous words
        $remove = [
            'dream about', 'dreaming of', 'dreaming about', 'dream of', 'dream in', 
            'in a dream', 'in dream', 'meaning of', 'interpretation of', 'seeing a', 'seeing an', 'seeing'
        ];
        
        foreach ($remove as $word) {
            $title = str_replace($word, '', $title);
        }
        
        return trim($title);
    }

    private function normalizeUrduTitle($title)
    {
        if (empty($title)) return '';
        $title = trim($title);
        
        // Remove common extraneous words in Urdu
        $remove = [
            'خواب میں', 'کا خواب دیکھنا', 'دیکھنا', 'کی تعبیر', 'کا خواب'
        ];
        
        foreach ($remove as $word) {
            $title = str_replace($word, '', $title);
        }
        
        return trim($title);
    }
}
