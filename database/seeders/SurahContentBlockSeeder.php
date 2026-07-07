<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahContentBlock;
use Illuminate\Support\Facades\Log;

class SurahContentBlockSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Surah Content Blocks...');
        $tier1 = [36, 2, 55, 67, 56, 18, 1, 73, 59, 19];
        
        try {
            Surah::chunk(20, function ($surahs) use ($tier1) {
                foreach ($surahs as $surah) {
                    $isTier1 = in_array($surah->number, $tier1);
                    
                    $blocks = [
                        [
                            'block_type' => 'overview',
                            'content_en' => $isTier1 
                                ? "Surah {$surah->name_en} is one of the most profound Surahs of the Quran. Being a {$surah->revelation_type} Surah with {$surah->total_ayahs} verses, it deeply addresses matters of faith, the Hereafter, and divine wisdom. Reciting it brings immense spiritual benefits and strengthens one's connection with Allah."
                                : "Surah {$surah->name_en} is a {$surah->revelation_type} Surah containing {$surah->total_ayahs} verses. It is located in Juz {$surah->juz_start}.",
                            'sort_order' => 1
                        ],
                        [
                            'block_type' => 'revelation_context',
                            'content_en' => $isTier1 
                                ? "This Surah was revealed in {$surah->revelation_type} to address specific historical and spiritual circumstances faced by the Prophet Muhammad (ﷺ) and the early Muslim community. It provided comfort, legal frameworks, or theological arguments against the disbelievers."
                                : "Revealed in {$surah->revelation_type}. General themes revolve around tawheed and the message of Islam.",
                            'sort_order' => 2
                        ],
                        [
                            'block_type' => 'key_lessons',
                            'content_en' => "1. Belief in the Oneness of Allah.\n2. Reflection on the signs of creation.\n3. Following the Sunnah.",
                            'sort_order' => 3
                        ],
                        [
                            'block_type' => 'name_explanation',
                            'content_en' => "The name is derived from the word '{$surah->meaning_en}' which appears prominently in the Surah.",
                            'sort_order' => 4
                        ]
                    ];
                    
                    foreach ($blocks as $block) {
                        SurahContentBlock::updateOrCreate(
                            ['surah_id' => $surah->id, 'block_type' => $block['block_type']],
                            $block + ['is_published' => true]
                        );
                    }
                    
                    if ($isTier1) {
                        SurahContentBlock::updateOrCreate(
                            ['surah_id' => $surah->id, 'block_type' => 'authentic_virtues'],
                            [
                                'content_en' => 'There are authentic hadiths regarding the recitation of this Surah.',
                                'authenticity' => 'Sahih',
                                'sort_order' => 5,
                                'is_published' => true
                            ]
                        );
                    }
                }
            });
            $this->command->info('Surah Content Blocks Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahContentBlockSeeder: ' . $e->getMessage());
        }
    }
}