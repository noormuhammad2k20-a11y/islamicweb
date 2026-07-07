<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SurahCollection;
use App\Models\Surah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurahCollectionSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding Surah Collections...');
        try {
            $collections = [
                ['name_en' => 'Surah Manzil', 'slug' => 'surah-manzil', 'description_en' => 'A collection of Surahs and Ayahs recited for protection.', 'is_published' => true],
                ['name_en' => 'Panj Surah', 'slug' => 'panj-surah', 'description_en' => 'The five highly revered Surahs (Yaseen, Al-Fath, Ar-Rahman, Al-Waqiah, Al-Mulk).', 'is_published' => true],
                ['name_en' => '4 Qul', 'slug' => '4-qul', 'description_en' => 'The four Surahs starting with Qul for protection.', 'is_published' => true],
                ['name_en' => 'Last 10 Surahs', 'slug' => 'last-10-surahs', 'description_en' => 'The last 10 short Surahs of the Quran, often recited in Salah.', 'is_published' => true],
                ['name_en' => 'Short Surahs', 'slug' => 'short-surahs', 'description_en' => 'Surahs with 10 or fewer Ayahs.', 'is_published' => true],
                ['name_en' => 'Quran Surah List', 'slug' => 'quran-surah-list', 'description_en' => 'All 114 Surahs of the Holy Quran.', 'is_published' => true],
            ];

            foreach ($collections as $coll) {
                $collection = SurahCollection::updateOrCreate(['slug' => $coll['slug']], $coll);
                
                $surahIds = [];
                if ($coll['slug'] === 'panj-surah') {
                    $surahIds = Surah::whereIn('number', [36, 48, 55, 56, 67])->pluck('id')->toArray();
                } elseif ($coll['slug'] === '4-qul') {
                    $surahIds = Surah::whereIn('number', [109, 112, 113, 114])->pluck('id')->toArray();
                } elseif ($coll['slug'] === 'last-10-surahs') {
                    $surahIds = Surah::whereIn('number', range(105, 114))->pluck('id')->toArray();
                } elseif ($coll['slug'] === 'short-surahs') {
                    $surahIds = Surah::where('total_ayahs', '<=', 10)->pluck('id')->toArray();
                } elseif ($coll['slug'] === 'quran-surah-list') {
                    $surahIds = Surah::orderBy('number')->pluck('id')->toArray();
                } elseif ($coll['slug'] === 'surah-manzil') {
                    $surahIds = Surah::whereIn('number', [1, 2, 3, 7, 17, 23, 37, 55, 59, 72, 109, 112, 113, 114])->pluck('id')->toArray();
                }

                foreach ($surahIds as $index => $surahId) {
                    DB::table('surah_collection_items')->updateOrInsert(
                        ['collection_id' => $collection->id, 'surah_id' => $surahId],
                        ['sort_order' => $index + 1]
                    );
                }
            }
            $this->command->info('Surah Collections Seeded.');
        } catch (\Exception $e) {
            Log::error('SurahCollectionSeeder error: ' . $e->getMessage());
        }
    }
}