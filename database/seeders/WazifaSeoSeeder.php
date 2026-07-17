<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❽: SEO Meta for 97 Wazaif.
 * "Wazifa" — 25,000+ monthly searches.
 */
class WazifaSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for Wazaif ===');

        $wazaif = DB::table('wazaif')->orderBy('id')->get();
        $created = 0;

        foreach ($wazaif as $wazifa) {
            $exists = DB::table('seo_metas')
                ->where('metaable_type', 'App\\Models\\Wazifa')
                ->where('metaable_id', $wazifa->id)
                ->exists();

            if ($exists) continue;

            $title_en = $wazifa->title_en ?? $wazifa->title ?? '';
            $title_ur = $wazifa->title_ur ?? $wazifa->title_urdu ?? '';
            $slug = $wazifa->slug ?? \Illuminate\Support\Str::slug($title_en);
            $purpose = $wazifa->purpose ?? $wazifa->description ?? '';

            // Title: max 60 chars
            $seoTitle = $this->generateTitle($title_en, $title_ur);

            // Description: 148-155 chars
            $desc = $this->generateDescription($title_en, $title_ur, $purpose);

            DB::table('seo_metas')->insert([
                'metaable_type' => 'App\\Models\\Wazifa',
                'metaable_id' => $wazifa->id,
                'title' => $seoTitle,
                'meta_description' => $desc,
                'canonical_url' => 'https://noorislam.com/wazaif/' . $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $created++;
        }

        $this->command->info("✅ Wazaif SEO entries created: {$created}");
    }

    private function generateTitle(string $titleEn, string $titleUr): string
    {
        if ($titleEn) {
            $title = "{$titleEn} — Fazilat aur Tarika | NoorIslam";
            if (strlen($title) > 60) {
                $title = "{$titleEn} — Wazifa | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = mb_substr($titleEn, 0, 45) . ' | NoorIslam';
            }
            return $title;
        }

        if ($titleUr) {
            $title = "{$titleUr} — وظیفہ | NoorIslam";
            if (strlen($title) > 60) {
                $title = mb_substr($titleUr, 0, 45) . ' | NoorIslam';
            }
            return $title;
        }

        return 'Islamic Wazifa — Fazilat | NoorIslam';
    }

    private function generateDescription(string $titleEn, string $titleUr, string $purpose): string
    {
        $desc = 'NoorIslam par ';

        if ($titleEn) {
            $desc .= "{$titleEn} ";
        } elseif ($titleUr) {
            $desc .= "{$titleUr} ";
        }

        $desc .= 'ka mukammal tarika, Arabic text, Urdu tarjuma, fazilat aur Hadith reference parhen. ';

        if ($purpose) {
            $purposeShort = mb_substr($purpose, 0, 40);
            $desc .= "{$purposeShort}. ";
        }

        $desc .= 'Authentic Islamic wazaif.';

        if (strlen($desc) > 155) {
            $desc = mb_substr($desc, 0, 152) . '...';
        } elseif (strlen($desc) < 145) {
            $desc .= ' Quran aur Sunnah se sabit wazaif.';
            if (strlen($desc) > 155) {
                $desc = mb_substr($desc, 0, 155);
            }
        }

        return trim($desc);
    }
}
