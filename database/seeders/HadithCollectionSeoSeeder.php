<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❺: SEO Meta for 62 Hadith Collections.
 */
class HadithCollectionSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for Hadith Collections ===');

        $collections = DB::table('hadith_collections')->get();
        $created = 0;

        foreach ($collections as $collection) {
            $exists = DB::table('seo_metas')
                ->where('metaable_type', 'App\\Models\\HadithCollection')
                ->where('metaable_id', $collection->id)
                ->exists();

            if ($exists) continue;

            $nameEn = $collection->name_en ?? '';
            $nameAr = $collection->name_ar ?? '';
            $compiler = $collection->compiler ?? '';
            $slug = $collection->slug ?? \Illuminate\Support\Str::slug($nameEn);

            // Title: max 60 chars
            $title = "{$nameEn} — Authentic Hadith Collection | NoorIslam";
            if (strlen($title) > 60) {
                $title = "{$nameEn} Collection | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = mb_substr($nameEn, 0, 45) . ' | NoorIslam';
            }

            // Description: 148-155 chars
            $desc = "Read the complete {$nameEn}";
            if ($nameAr) {
                $desc .= " ({$nameAr})";
            }
            $desc .= " hadith collection";
            if ($compiler) {
                $desc .= " compiled by {$compiler}";
            }
            $desc .= ". Explore authentic hadiths with Arabic text, Urdu and English translations on NoorIslam.";

            if (strlen($desc) > 155) {
                $desc = mb_substr($desc, 0, 152) . '...';
            } elseif (strlen($desc) < 145) {
                $desc .= ' Authentic Islamic knowledge.';
                if (strlen($desc) > 155) {
                    $desc = mb_substr($desc, 0, 155);
                }
            }

            DB::table('seo_metas')->insert([
                'metaable_type' => 'App\\Models\\HadithCollection',
                'metaable_id' => $collection->id,
                'title' => $title,
                'meta_description' => $desc,
                'canonical_url' => 'https://noorislam.com/hadith/' . $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $created++;
        }

        $this->command->info("✅ Hadith Collection SEO entries created: {$created}");
    }
}
