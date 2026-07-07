<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SeoMeta;
use Illuminate\Support\Facades\Log;

class SurahSeoMetaSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding SEO Metas...');
        try {
            Surah::chunk(20, function ($surahs) {
                foreach ($surahs as $surah) {
                    SeoMeta::updateOrCreate(
                        [
                            'metaable_type' => Surah::class,
                            'metaable_id' => $surah->id,
                        ],
                        [
                            'title' => substr("Surah {$surah->name_en} — Arabic, Urdu Tarjuma & Tafsir | NoorIslam", 0, 65),
                            'meta_description' => substr("Read Surah {$surah->name_en} ({$surah->name_ar}) — {$surah->total_ayahs} ayahs, {$surah->revelation_type}, Para {$surah->juz_start}. Full Arabic text, Urdu tarjuma, Tafsir, PDF & audio.", 0, 155),
                            'canonical_url' => url('/surah/' . $surah->slug),
                        ]
                    );
                }
            });
            $this->command->info('SEO Metas Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahSeoMetaSeeder: ' . $e->getMessage());
        }
    }
}