<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❼: SEO Meta for 5,618 Dream Symbols.
 * "Khwab ki tabeer" — very high search volume in Pakistan.
 */
class DreamSymbolSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for Dream Symbols ===');

        $existingCount = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\DreamSymbol')
            ->count();
        $this->command->info("Existing SEO entries: {$existingCount}");

        $totalCreated = 0;

        DB::table('dream_symbols')->orderBy('id')->chunk(500, function ($symbols) use (&$totalCreated) {
            $inserts = [];

            foreach ($symbols as $symbol) {
                $exists = DB::table('seo_metas')
                    ->where('metaable_type', 'App\\Models\\DreamSymbol')
                    ->where('metaable_id', $symbol->id)
                    ->exists();

                if ($exists) continue;

                $symbolUr = $symbol->title_urdu ?? $symbol->symbol_urdu ?? '';
                $symbolEn = $symbol->title_english ?? $symbol->symbol_english ?? $symbol->title ?? '';
                $interpretation = $symbol->interpretation_urdu ?? $symbol->interpretation ?? $symbol->short_interpretation ?? '';
                $slug = $symbol->slug ?? \Illuminate\Support\Str::slug($symbolEn);

                // Title: max 60 chars
                $title = $this->generateTitle($symbolUr, $symbolEn);

                // Description: 145-155 chars
                $description = $this->generateDescription($symbolUr, $symbolEn, $interpretation);

                $inserts[] = [
                    'metaable_type' => 'App\\Models\\DreamSymbol',
                    'metaable_id' => $symbol->id,
                    'title' => $title,
                    'meta_description' => $description,
                    'canonical_url' => 'https://noorislam.com/khwabon-ki-tabeer/' . $slug,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $totalCreated++;
            }

            if (!empty($inserts)) {
                foreach (array_chunk($inserts, 100) as $batch) {
                    DB::table('seo_metas')->insert($batch);
                }
            }

            $this->command->info("  Processed chunk... Total so far: {$totalCreated}");
        });

        $finalCount = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\DreamSymbol')
            ->count();
        $this->command->info("✅ Dream Symbol SEO entries: {$finalCount}");
    }

    private function generateTitle(string $symbolUr, string $symbolEn): string
    {
        // Prefer Urdu title for Pakistani audience
        if ($symbolUr) {
            $title = "Khwab mein {$symbolUr} — Islami Tabeer | NoorIslam";
            if (strlen($title) > 60) {
                $title = "{$symbolUr} Ki Tabeer | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = mb_substr($symbolUr, 0, 45) . ' | NoorIslam';
            }
            return $title;
        }

        if ($symbolEn) {
            $title = "{$symbolEn} in Dream — Islamic Tabeer | NoorIslam";
            if (strlen($title) > 60) {
                $title = "{$symbolEn} Dream Meaning | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = mb_substr($symbolEn, 0, 45) . ' | NoorIslam';
            }
            return $title;
        }

        return 'Khwab Ki Tabeer | NoorIslam';
    }

    private function generateDescription(string $symbolUr, string $symbolEn, string $interpretation): string
    {
        $desc = '';

        if ($symbolUr && $symbolEn) {
            $desc = "Khwab mein {$symbolUr} ({$symbolEn}) dekhne ki Islami tabeer. ";
        } elseif ($symbolUr) {
            $desc = "Khwab mein {$symbolUr} dekhne ki Islami tabeer. ";
        } elseif ($symbolEn) {
            $desc = "Seeing {$symbolEn} in dream — Islamic interpretation. ";
        }

        if ($interpretation) {
            $interpShort = mb_substr($interpretation, 0, 60);
            $desc .= "{$interpShort}. ";
        }

        $desc .= 'Authentic Islamic khwabon ki tabeer NoorIslam par parhen.';

        // Ensure 145-155 chars
        if (strlen($desc) > 155) {
            $desc = mb_substr($desc, 0, 152) . '...';
        } elseif (strlen($desc) < 145) {
            $padding = ' Quran aur Hadith se mustanad tabeer.';
            $desc .= $padding;
            if (strlen($desc) > 155) {
                $desc = mb_substr($desc, 0, 155);
            }
        }

        return trim($desc);
    }
}
