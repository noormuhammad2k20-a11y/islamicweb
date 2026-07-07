<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahFaq;
use Illuminate\Support\Facades\Log;

class SurahFaqSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Surah FAQs...');
        try {
            Surah::chunk(20, function ($surahs) {
                foreach ($surahs as $surah) {
                    $faqs = [
                        [
                            'question_en' => "Surah {$surah->name_en} kaunse para mein hai?",
                            'answer_en' => "Surah {$surah->name_en} Para {$surah->juz_start} mein hai.",
                            'sort_order' => 1
                        ],
                        [
                            'question_en' => "Surah {$surah->name_en} mein kitni ayat hain?",
                            'answer_en' => "Is Surah mein {$surah->total_ayahs} ayat hain.",
                            'sort_order' => 2
                        ],
                        [
                            'question_en' => "Surah {$surah->name_en} Makki hai ya Madani?",
                            'answer_en' => "Yeh ek {$surah->revelation_type} Surah hai.",
                            'sort_order' => 3
                        ],
                        [
                            'question_en' => "Surah {$surah->name_en} ka matlab kya hai?",
                            'answer_en' => "Iska matlab '{$surah->meaning_en}' hai.",
                            'sort_order' => 4
                        ],
                        [
                            'question_en' => "Surah {$surah->name_en} ki tilawat kitne minute mein hoti hai?",
                            'answer_en' => "Is Surah ki tilawat mein taqreeban " . ceil($surah->total_ayahs * 0.5) . " minutes lagte hain.",
                            'sort_order' => 5
                        ]
                    ];
                    
                    foreach ($faqs as $faq) {
                        SurahFaq::updateOrCreate(
                            ['surah_id' => $surah->id, 'question_en' => $faq['question_en']],
                            $faq + ['is_published' => true]
                        );
                    }
                }
            });
            $this->command->info('Surah FAQs Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahFaqSeeder: ' . $e->getMessage());
        }
    }
}