<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class IslamicEventsFullSeeder extends Seeder
{
    public function run(): void
    {
        // Get some country IDs for the JSON field
        $pakistan = Country::where('slug', 'pakistan')->first()->id ?? 1;
        $saudi = Country::where('slug', 'saudi-arabia')->first()->id ?? 2;
        $global = json_encode([$pakistan, $saudi]);

        $events = [
            [
                'name' => 'Eid ul Fitr - عید الفطر', 
                'description' => 'The festival of breaking the fast, marking the end of Ramadan.', 
                'hijri_month_id' => 10, 'hijri_day' => 1, 'event_type' => 'major', 'slug' => 'eid-ul-fitr',
                'is_public_holiday' => true,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-03-20',
                'gregorian_date_2027' => '2027-03-10',
            ],
            [
                'name' => 'Eid ul Adha - عید الاضحی', 
                'description' => 'The festival of sacrifice, honoring Ibrahim\'s willingness to sacrifice his son.', 
                'hijri_month_id' => 12, 'hijri_day' => 10, 'event_type' => 'major', 'slug' => 'eid-ul-adha',
                'is_public_holiday' => true,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-05-27',
                'gregorian_date_2027' => '2027-05-16',
            ],
            [
                'name' => 'Shab-e-Meraj - شب معراج', 
                'description' => 'The night journey and ascension of Prophet Muhammad ﷺ.', 
                'hijri_month_id' => 7, 'hijri_day' => 27, 'event_type' => 'major', 'slug' => 'shab-e-meraj',
                'is_public_holiday' => false,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-01-16',
                'gregorian_date_2027' => '2027-01-05',
            ],
            [
                'name' => 'Shab-e-Barat - شب برات', 
                'description' => 'The night of forgiveness and fortune.', 
                'hijri_month_id' => 8, 'hijri_day' => 15, 'event_type' => 'major', 'slug' => 'shab-e-barat',
                'is_public_holiday' => false,
                'countries_observing' => json_encode([$pakistan]),
                'gregorian_date_2026' => '2026-02-03',
                'gregorian_date_2027' => '2027-01-23',
            ],
            [
                'name' => 'Ashura - یوم عاشورہ', 
                'description' => '10th of Muharram. Marks the martyrdom of Imam Hussain (RA).', 
                'hijri_month_id' => 1, 'hijri_day' => 10, 'event_type' => 'major', 'slug' => 'ashura',
                'is_public_holiday' => true,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-06-26',
                'gregorian_date_2027' => '2027-06-15',
            ],
            [
                'name' => 'Eid Milad-un-Nabi - 12 ربیع الاول', 
                'description' => 'The observance of the birthday of the Islamic prophet Muhammad ﷺ.', 
                'hijri_month_id' => 3, 'hijri_day' => 12, 'event_type' => 'major', 'slug' => 'eid-milad-un-nabi',
                'is_public_holiday' => true,
                'countries_observing' => json_encode([$pakistan]),
                'gregorian_date_2026' => '2026-08-26',
                'gregorian_date_2027' => '2027-08-15',
            ],
            [
                'name' => 'Start of Ramadan - رمضان شروع', 
                'description' => 'The beginning of the holy month of fasting.', 
                'hijri_month_id' => 9, 'hijri_day' => 1, 'event_type' => 'major', 'slug' => 'ramadan-start',
                'is_public_holiday' => false,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-02-18',
                'gregorian_date_2027' => '2027-02-08',
            ],
            [
                'name' => 'Laylatul Qadr - شب قدر', 
                'description' => 'The Night of Decree, better than a thousand months.', 
                'hijri_month_id' => 9, 'hijri_day' => 27, 'event_type' => 'major', 'slug' => 'laylatul-qadr',
                'is_public_holiday' => false,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-03-16',
                'gregorian_date_2027' => '2027-03-05',
            ],
            [
                'name' => 'Day of Arafah - یوم عرفہ', 
                'description' => 'The most important day of Hajj.', 
                'hijri_month_id' => 12, 'hijri_day' => 9, 'event_type' => 'major', 'slug' => 'day-of-arafah',
                'is_public_holiday' => false,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-05-26',
                'gregorian_date_2027' => '2027-05-15',
            ],
            [
                'name' => 'Islamic New Year - اسلامی نیا سال', 
                'description' => '1st of Muharram, marking the start of the Hijri year.', 
                'hijri_month_id' => 1, 'hijri_day' => 1, 'event_type' => 'major', 'slug' => 'islamic-new-year',
                'is_public_holiday' => false,
                'countries_observing' => $global,
                'gregorian_date_2026' => '2026-06-17',
                'gregorian_date_2027' => '2027-06-06',
            ],
        ];

        foreach ($events as $event) {
            DB::table('islamic_events')->updateOrInsert(
                ['slug' => $event['slug']],
                array_merge($event, ['created_at' => now(), 'updated_at' => now()])
            );
        }

        $this->command->info('✅ 10 major Islamic events seeded successfully with 2026/2027 dates.');
    }
}
