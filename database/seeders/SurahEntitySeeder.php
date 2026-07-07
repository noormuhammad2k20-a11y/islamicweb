<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SurahEntity;
use App\Models\Surah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurahEntitySeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Surah Entities...');
        try {
            $entities = [
                ['entity_name_en' => 'Ibrahim', 'entity_name_ar' => 'إبراهيم', 'entity_name_ur' => 'ابراہیم', 'entity_type' => 'prophet', 'slug' => 'ibrahim'],
                ['entity_name_en' => 'Musa', 'entity_name_ar' => 'موسى', 'entity_name_ur' => 'موسیٰ', 'entity_type' => 'prophet', 'slug' => 'musa'],
                ['entity_name_en' => 'Isa', 'entity_name_ar' => 'عيسى', 'entity_name_ur' => 'عیسیٰ', 'entity_type' => 'prophet', 'slug' => 'isa'],
                ['entity_name_en' => 'Yusuf', 'entity_name_ar' => 'يوسف', 'entity_name_ur' => 'یوسف', 'entity_type' => 'prophet', 'slug' => 'yusuf'],
                ['entity_name_en' => 'Nuh', 'entity_name_ar' => 'نوح', 'entity_name_ur' => 'نوح', 'entity_type' => 'prophet', 'slug' => 'nuh'],
                ['entity_name_en' => 'Sulaiman', 'entity_name_ar' => 'سليمان', 'entity_name_ur' => 'سلیمان', 'entity_type' => 'prophet', 'slug' => 'sulaiman'],
                ['entity_name_en' => 'Dawud', 'entity_name_ar' => 'داود', 'entity_name_ur' => 'داؤد', 'entity_type' => 'prophet', 'slug' => 'dawud'],
                ['entity_name_en' => 'Adam', 'entity_name_ar' => 'آدم', 'entity_name_ur' => 'آدم', 'entity_type' => 'prophet', 'slug' => 'adam'],
                ['entity_name_en' => 'Muhammad', 'entity_name_ar' => 'محمد', 'entity_name_ur' => 'محمد', 'entity_type' => 'prophet', 'slug' => 'muhammad'],
                ['entity_name_en' => 'Makkah', 'entity_name_ar' => 'مكة', 'entity_name_ur' => 'مکہ', 'entity_type' => 'place', 'slug' => 'makkah'],
                ['entity_name_en' => 'Madinah', 'entity_name_ar' => 'المدينة', 'entity_name_ur' => 'مدینہ', 'entity_type' => 'place', 'slug' => 'madinah'],
                ['entity_name_en' => 'Jerusalem', 'entity_name_ar' => 'القدس', 'entity_name_ur' => 'یروشلم', 'entity_type' => 'place', 'slug' => 'jerusalem'],
                ['entity_name_en' => 'Egypt', 'entity_name_ar' => 'مصر', 'entity_name_ur' => 'مصر', 'entity_type' => 'place', 'slug' => 'egypt'],
                ['entity_name_en' => 'Mount Sinai', 'entity_name_ar' => 'طور سيناء', 'entity_name_ur' => 'کوہ طور', 'entity_type' => 'place', 'slug' => 'mount-sinai'],
                ['entity_name_en' => 'Cave of Hira', 'entity_name_ar' => 'غار حراء', 'entity_name_ur' => 'غار حرا', 'entity_type' => 'place', 'slug' => 'cave-of-hira'],
            ];

            foreach ($entities as $entity) {
                SurahEntity::updateOrCreate(['entity_name_en' => $entity['entity_name_en']], $entity);
            }

            // Map some to Tier 1 surahs just as an example
            $yaseen = Surah::where('number', 36)->first();
            $musa = SurahEntity::where('entity_name_en', 'Musa')->first();
            
            if ($yaseen && $musa) {
                DB::table('surah_entity_map')->updateOrInsert(
                    ['surah_id' => $yaseen->id, 'entity_id' => $musa->id],
                    ['relevance_score' => 8]
                );
            }
            $this->command->info('Surah Entities Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahEntitySeeder error: ' . $e->getMessage());
            $this->command->error('Error seeding entities.');
        }
    }
}