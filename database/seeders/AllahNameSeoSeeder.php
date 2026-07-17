<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❺: SEO Meta for 99 Allah Names.
 * "99 names of Allah" — 40,500+ monthly searches.
 */
class AllahNameSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for 99 Allah Names ===');

        $names = DB::table('allah_names')->orderBy('number')->get();
        $created = 0;

        foreach ($names as $name) {
            $exists = DB::table('seo_metas')
                ->where('metaable_type', 'App\\Models\\AllahName')
                ->where('metaable_id', $name->id)
                ->exists();

            if ($exists) continue;

            $transliteration = $name->transliteration ?? '';
            $arabic = $name->arabic ?? '';
            $number = $name->number ?? 0;
            $meaningEn = $name->meaning_english ?? '';
            $meaningUr = $name->meaning_urdu ?? '';
            $slug = $name->slug ?? \Illuminate\Support\Str::slug($transliteration);

            // Title: max 60 chars — "{Name} — Allah Ka {N}va Naam | NoorIslam"
            $title = "{$transliteration} — Allah Ka Naam #{$number} | NoorIslam";
            if (strlen($title) > 60) {
                $title = "{$transliteration} — 99 Names | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = mb_substr($transliteration, 0, 45) . ' | NoorIslam';
            }

            // Description: 148-155 chars
            $desc = "{$transliteration} ({$arabic}) — Allah ka {$number}va naam. ";
            if ($meaningUr) {
                $desc .= "Matlab: {$meaningUr}. ";
            } elseif ($meaningEn) {
                $desc .= "Meaning: {$meaningEn}. ";
            }
            $desc .= "Dhikr ki fazilat, benefits aur wazifa — Asma ul Husna NoorIslam par.";

            if (strlen($desc) > 155) {
                $desc = mb_substr($desc, 0, 152) . '...';
            }

            DB::table('seo_metas')->insert([
                'metaable_type' => 'App\\Models\\AllahName',
                'metaable_id' => $name->id,
                'title' => $title,
                'meta_description' => $desc,
                'canonical_url' => 'https://noorislam.com/99-names-of-allah/' . $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $created++;
        }

        $this->command->info("✅ Allah Names SEO entries created: {$created}");
    }
}
