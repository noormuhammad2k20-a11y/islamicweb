<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahRecitationGuide;
use Illuminate\Support\Facades\Log;

class SurahRecitationGuideSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Recitation Guides...');
        try {
            Surah::chunk(20, function ($surahs) {
                foreach ($surahs as $surah) {
                    $reciters = [
                        ['reciter_name_en' => 'Sheikh Abdul Rahman Al-Sudais', 'is_featured' => true, 'sort_order' => 1],
                        ['reciter_name_en' => 'Sheikh Mishary Rashid Alafasy', 'is_featured' => true, 'sort_order' => 2],
                        ['reciter_name_en' => 'Sheikh Abdul Basit Abdul Samad', 'is_featured' => false, 'sort_order' => 3],
                        ['reciter_name_en' => 'Sheikh Dawat-e-Islami', 'is_featured' => false, 'sort_order' => 4],
                    ];
                    foreach ($reciters as $reciter) {
                        SurahRecitationGuide::updateOrCreate(
                            ['surah_id' => $surah->id, 'reciter_name_en' => $reciter['reciter_name_en']],
                            $reciter
                        );
                    }
                }
            });
            $this->command->info('Recitation Guides Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahRecitationGuideSeeder: ' . $e->getMessage());
        }
    }
}