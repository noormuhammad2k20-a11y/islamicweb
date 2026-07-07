<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahRelatedSurah;
use Illuminate\Support\Facades\Log;

class SurahRelatedSurahSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Related Surahs...');
        try {
            Surah::chunk(20, function ($surahs) {
                foreach ($surahs as $surah) {
                    // Previous surah
                    if ($surah->number > 1) {
                        $prev = Surah::where('number', $surah->number - 1)->first();
                        if ($prev) {
                            SurahRelatedSurah::updateOrCreate(
                                ['surah_id' => $surah->id, 'related_surah_id' => $prev->id],
                                ['relation_type' => 'Previous Surah in Sequence', 'sort_order' => 1]
                            );
                        }
                    }
                    // Next surah
                    if ($surah->number < 114) {
                        $next = Surah::where('number', $surah->number + 1)->first();
                        if ($next) {
                            SurahRelatedSurah::updateOrCreate(
                                ['surah_id' => $surah->id, 'related_surah_id' => $next->id],
                                ['relation_type' => 'Next Surah in Sequence', 'sort_order' => 2]
                            );
                        }
                    }
                    // Same juz
                    $sameJuz = Surah::where('juz_start', $surah->juz_start)->where('id', '!=', $surah->id)->first();
                    if ($sameJuz) {
                        SurahRelatedSurah::updateOrCreate(
                            ['surah_id' => $surah->id, 'related_surah_id' => $sameJuz->id],
                            ['relation_type' => 'same_juz', 'sort_order' => 3]
                        );
                    }
                }
            });
            $this->command->info('Related Surahs Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahRelatedSurahSeeder: ' . $e->getMessage());
        }
    }
}