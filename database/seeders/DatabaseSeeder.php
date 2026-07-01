<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $country = \App\Models\Country::create([
            'name' => 'Pakistan',
            'slug' => 'pakistan',
            'flag_code' => 'pk',
            'moon_sighting_authority' => 'Ruet-e-Hilal Committee',
            'default_timezone' => 'Asia/Karachi',
        ]);

        $city = \App\Models\City::create([
            'country_id' => $country->id,
            'name' => 'Karachi',
            'slug' => 'karachi',
            'latitude' => 24.8607,
            'longitude' => 67.0011,
            'timezone' => 'Asia/Karachi',
            'prayer_calc_method' => 'University of Islamic Sciences, Karachi',
            'local_context_note' => 'Karachi follows the standard University of Islamic Sciences calculation method for prayer times.',
        ]);

        \App\Models\HijriDateCache::create([
            'gregorian_date' => date('Y-m-d'),
            'hijri_day' => 15,
            'hijri_month' => 'جمادی الثانی',
            'hijri_year' => 1446,
            'source' => 'Umm al-Qura',
            'fetched_at' => now(),
        ]);

        \App\Models\PrayerTime::create([
            'city_id' => $city->id,
            'date' => date('Y-m-d'),
            'fajr' => '05:12 AM',
            'sunrise' => '06:28 AM',
            'dhuhr' => '12:35 PM',
            'asr' => '04:02 PM',
            'maghrib' => '06:48 PM',
            'isha' => '08:15 PM',
            'calc_method' => 'Karachi',
            'fetched_at' => now(),
        ]);
        
        \App\Models\SiteSetting::create(['key' => 'default_city_id', 'value' => $city->id]);

        $this->call([
            AllahNameSeeder::class,
            HadithSeeder::class,
            IslamicNameSeeder::class,
        ]);
    }
}
