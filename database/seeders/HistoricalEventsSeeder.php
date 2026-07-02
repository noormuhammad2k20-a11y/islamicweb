<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HistoricalEventsSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('historical_events')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $events = [
            ['hijri_day' => 12, 'hijri_month' => 'Rabi al-Awwal', 'hijri_year' => null, 'title' => 'Birth of the Prophet Muhammad (PBUH)', 'description' => 'The Prophet Muhammad (PBUH) was born in Mecca.', 'source_note' => 'Commonly accepted Islamic history'],
            ['hijri_day' => 27, 'hijri_month' => 'Rajab', 'hijri_year' => null, 'title' => 'Isra and Mi\'raj', 'description' => 'The Night Journey and Ascension of the Prophet Muhammad (PBUH).', 'source_note' => 'Commonly accepted Islamic history'],
            ['hijri_day' => 17, 'hijri_month' => 'Ramadan', 'hijri_year' => 2, 'title' => 'Battle of Badr', 'description' => 'The first major battle in Islam, a turning point where Muslims were victorious.', 'source_note' => 'Islamic history'],
            ['hijri_day' => 10, 'hijri_month' => 'Muharram', 'hijri_year' => 61, 'title' => 'Tragedy of Karbala', 'description' => 'The martyrdom of Imam Hussain (RA) and his companions at Karbala.', 'source_note' => 'Islamic history'],
        ];

        $now = Carbon::now();
        foreach ($events as &$event) {
            $event['created_at'] = $now;
            $event['updated_at'] = $now;
        }

        DB::table('historical_events')->insert($events);
    }
}
