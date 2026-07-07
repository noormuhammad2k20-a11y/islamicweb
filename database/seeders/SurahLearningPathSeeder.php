<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahLearningPath;
use Illuminate\Support\Facades\Log;

class SurahLearningPathSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Learning Paths...');
        try {
            Surah::chunk(20, function ($surahs) {
                foreach ($surahs as $surah) {
                    $difficulty = 'intermediate';
                    if ($surah->total_ayahs <= 20) $difficulty = 'beginner';
                    elseif ($surah->total_ayahs >= 100) $difficulty = 'advanced';
                    
                    SurahLearningPath::updateOrCreate(
                        ['surah_id' => $surah->id],
                        [
                            'difficulty_level' => $difficulty,
                            'estimated_reading_minutes' => ceil($surah->total_ayahs * 0.5),
                            'memorization_tips_en' => 'Listen to the recitation repeatedly and practice reciting 5 verses a day.',
                        ]
                    );
                }
            });
            $this->command->info('Learning Paths Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahLearningPathSeeder: ' . $e->getMessage());
        }
    }
}