<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('countries')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $countries = [
            ['name'=>'Pakistan','slug'=>'pakistan','flag_code'=>'pk','moon_sighting_authority'=>'Ruet-e-Hilal Committee Pakistan','default_timezone'=>'Asia/Karachi'],
            ['name'=>'Saudi Arabia','slug'=>'saudi-arabia','flag_code'=>'sa','moon_sighting_authority'=>'Supreme Court of Saudi Arabia','default_timezone'=>'Asia/Riyadh'],
            ['name'=>'United Arab Emirates','slug'=>'uae','flag_code'=>'ae','moon_sighting_authority'=>'UAE Moon Sighting Committee (GAAC)','default_timezone'=>'Asia/Dubai'],
            ['name'=>'India','slug'=>'india','flag_code'=>'in','moon_sighting_authority'=>'All India Muslim Personal Law Board','default_timezone'=>'Asia/Kolkata'],
            ['name'=>'Bangladesh','slug'=>'bangladesh','flag_code'=>'bd','moon_sighting_authority'=>'National Moon Sighting Committee Bangladesh','default_timezone'=>'Asia/Dhaka'],
            ['name'=>'United Kingdom','slug'=>'uk','flag_code'=>'gb','moon_sighting_authority'=>'Wifaqul Ulama UK / HMCUK','default_timezone'=>'Europe/London'],
            ['name'=>'United States','slug'=>'usa','flag_code'=>'us','moon_sighting_authority'=>'ISNA (Islamic Society of North America)','default_timezone'=>'America/New_York'],
            ['name'=>'Canada','slug'=>'canada','flag_code'=>'ca','moon_sighting_authority'=>'ISNA Canada','default_timezone'=>'America/Toronto'],
            ['name'=>'Australia','slug'=>'australia','flag_code'=>'au','moon_sighting_authority'=>'Grand Mufti of Australia','default_timezone'=>'Australia/Sydney'],
            ['name'=>'Malaysia','slug'=>'malaysia','flag_code'=>'my','moon_sighting_authority'=>'Department of Islamic Development Malaysia (JAKIM)','default_timezone'=>'Asia/Kuala_Lumpur'],
        ];

        $now = Carbon::now();
        foreach ($countries as &$country) {
            $country['created_at'] = $now;
            $country['updated_at'] = $now;
            $country['local_context_note'] = 'Islamic resources and accurate prayer timings for Muslims in ' . $country['name'] . '.';
        }

        DB::table('countries')->insert($countries);
    }
}
