<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❻: SEO Meta for 13,622 Islamic Names.
 * URGENT — Pakistan mein sab se zyada search hone wala topic!
 */
class IslamicNameSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for Islamic Names ===');

        $existingCount = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\IslamicName')
            ->count();
        $this->command->info("Existing SEO entries: {$existingCount}");

        $totalCreated = 0;

        // Process in chunks of 500 for memory efficiency
        DB::table('islamic_names')->orderBy('id')->chunk(500, function ($names) use (&$totalCreated) {
            $inserts = [];

            foreach ($names as $name) {
                // Check if already exists
                $exists = DB::table('seo_metas')
                    ->where('metaable_type', 'App\\Models\\IslamicName')
                    ->where('metaable_id', $name->id)
                    ->exists();

                if ($exists) continue;

                $nameEn = $name->name_english ?? $name->name ?? '';
                $nameUr = $name->name_urdu ?? $name->name_arabic ?? '';
                $meaningUr = $name->meaning_urdu ?? $name->meaning ?? '';
                $meaningEn = $name->meaning_english ?? $name->meaning ?? '';
                $gender = $name->gender ?? '';
                $slug = $name->slug ?? \Illuminate\Support\Str::slug($nameEn);

                // Title: max 60 chars
                $title = $this->generateTitle($nameEn, $gender);

                // Description: 145-155 chars
                $description = $this->generateDescription($nameEn, $nameUr, $meaningUr, $meaningEn, $gender);

                // OG Title (can be slightly longer)
                $ogTitle = "{$nameEn} — Islamic Name Meaning in Urdu & Arabic | NoorIslam";
                if (strlen($ogTitle) > 70) {
                    $ogTitle = "{$nameEn} — Name Meaning in Urdu | NoorIslam";
                }

                $inserts[] = [
                    'metaable_type' => 'App\\Models\\IslamicName',
                    'metaable_id' => $name->id,
                    'title' => $title,
                    'meta_description' => $description,
                    'canonical_url' => 'https://noorislam.com/islamic-names/' . $slug,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $totalCreated++;
            }

            if (!empty($inserts)) {
                // Insert in sub-batches to avoid query size limits
                foreach (array_chunk($inserts, 100) as $batch) {
                    DB::table('seo_metas')->insert($batch);
                }
            }

            $this->command->info("  Processed chunk... Total so far: {$totalCreated}");
        });

        $finalCount = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\IslamicName')
            ->count();
        $this->command->info("✅ Islamic Names SEO entries: {$finalCount}");
    }

    private function generateTitle(string $nameEn, string $gender): string
    {
        if (!$nameEn) return 'Islamic Name Meaning | NoorIslam';

        // Try full format first
        $genderLabel = '';
        if (strtolower($gender) === 'male' || strtolower($gender) === 'boy') {
            $genderLabel = 'Boy';
        } elseif (strtolower($gender) === 'female' || strtolower($gender) === 'girl') {
            $genderLabel = 'Girl';
        }

        if ($genderLabel) {
            $title = "{$nameEn} — Islamic {$genderLabel} Name Meaning | NoorIslam";
        } else {
            $title = "{$nameEn} Name Meaning in Urdu | NoorIslam";
        }

        // Truncate if needed
        if (strlen($title) > 60) {
            $title = "{$nameEn} Name Meaning | NoorIslam";
        }
        if (strlen($title) > 60) {
            $title = mb_substr($nameEn, 0, 45) . ' | NoorIslam';
        }

        return $title;
    }

    private function generateDescription(string $nameEn, string $nameUr, string $meaningUr, string $meaningEn, string $gender): string
    {
        $parts = [];

        if ($nameEn && $nameUr) {
            $parts[] = "{$nameEn} ({$nameUr})";
        } elseif ($nameEn) {
            $parts[] = $nameEn;
        }

        if ($meaningUr) {
            $parts[] = "ka matlab: {$meaningUr}";
        } elseif ($meaningEn) {
            $parts[] = "meaning: {$meaningEn}";
        }

        $desc = implode(' ', $parts);
        $desc .= '. ';

        if ($gender) {
            $gLabel = strtolower($gender) === 'male' || strtolower($gender) === 'boy' ? 'ladke' : 'ladki';
            $desc .= "Islamic {$gLabel} ka naam. ";
        }

        $desc .= 'Complete details, fazilat aur Quranic reference NoorIslam par parhen.';

        // Ensure 145-155 chars
        if (strlen($desc) > 155) {
            $desc = mb_substr($desc, 0, 152) . '...';
        } elseif (strlen($desc) < 145) {
            $desc .= str_repeat(' Islamic name details.', (int)ceil((145 - strlen($desc)) / 22));
            $desc = mb_substr($desc, 0, 155);
        }

        return trim($desc);
    }
}
