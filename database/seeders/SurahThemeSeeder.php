<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahTheme;
use Illuminate\Support\Facades\Log;

class SurahThemeSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Surah Themes...');
        try {
            Surah::chunk(20, function ($surahs) {
                foreach ($surahs as $surah) {
                    $themes = [
                        ['theme_title_en' => 'Tawheed (Oneness of Allah)', 'theme_description_en' => 'Emphasizes the absolute oneness of God.', 'sort_order' => 1],
                        ['theme_title_en' => 'Risalah (Prophethood)', 'theme_description_en' => 'Discusses the message brought by the Prophets.', 'sort_order' => 2],
                        ['theme_title_en' => 'Akhirah (The Hereafter)', 'theme_description_en' => 'Reminders of the Day of Judgment and accountability.', 'sort_order' => 3],
                    ];
                    
                    foreach ($themes as $theme) {
                        SurahTheme::updateOrCreate(
                            ['surah_id' => $surah->id, 'theme_title_en' => $theme['theme_title_en']],
                            $theme
                        );
                    }
                }
            });
            $this->command->info('Surah Themes Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahThemeSeeder: ' . $e->getMessage());
        }
    }
}