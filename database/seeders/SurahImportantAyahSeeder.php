<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahImportantAyah;
use App\Models\Ayah;
use Illuminate\Support\Facades\Log;

class SurahImportantAyahSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Important Ayahs...');
        try {
            // Only mapping a few specific ones as per instructions
            $mapping = [
                36 => [['ayat' => [9, 36], 'title' => 'Significant Ayahs', 'anchor' => 'significant-ayahs']],
                2 => [['ayat' => [285, 286], 'title' => 'Last 2 Ayat', 'anchor' => 'last-2-ayat']],
                56 => [['ayat' => [1, 2, 3], 'title' => 'First 3 Ayat', 'anchor' => 'first-3-ayat']],
            ];
            
            foreach ($mapping as $surahNum => $sections) {
                $surah = Surah::where('number', $surahNum)->first();
                if (!$surah) continue;
                
                foreach ($sections as $idx => $section) {
                    foreach ($section['ayat'] as $ayahNum) {
                        $ayah = Ayah::where('surah_id', $surah->id)->where('ayah_number', $ayahNum)->first();
                        if ($ayah) {
                            SurahImportantAyah::updateOrCreate(
                                ['surah_id' => $surah->id, 'ayah_id' => $ayah->id],
                                [
                                    'label_en' => $section['title'] . ' (Ayah ' . $ayahNum . ')',
                                    'anchor_id' => $section['anchor'],
                                    'sort_order' => $idx + 1
                                ]
                            );
                        }
                    }
                }
            }
            $this->command->info('Important Ayahs Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahImportantAyahSeeder: ' . $e->getMessage());
        }
    }
}