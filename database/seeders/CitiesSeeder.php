<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $pakistan = DB::table('countries')->where('slug', 'pakistan')->first();
        if (!$pakistan) {
            return;
        }

        $pakCities = [
            ['slug'=>'karachi',    'volume_est'=>200000, 'lat'=>24.8607,  'lng'=>67.0011,  'prayer_method'=>1],
            ['slug'=>'lahore',     'volume_est'=>180000, 'lat'=>31.5204,  'lng'=>74.3587,  'prayer_method'=>1],
            ['slug'=>'islamabad',  'volume_est'=>150000, 'lat'=>33.6844,  'lng'=>73.0479,  'prayer_method'=>1],
            ['slug'=>'rawalpindi', 'volume_est'=>80000,  'lat'=>33.5651,  'lng'=>73.0169,  'prayer_method'=>1],
            ['slug'=>'faisalabad', 'volume_est'=>60000,  'lat'=>31.4504,  'lng'=>73.1350,  'prayer_method'=>1],
            ['slug'=>'multan',     'volume_est'=>50000,  'lat'=>30.1575,  'lng'=>71.5249,  'prayer_method'=>1],
            ['slug'=>'peshawar',   'volume_est'=>40000,  'lat'=>34.0151,  'lng'=>71.5249,  'prayer_method'=>1],
            ['slug'=>'quetta',     'volume_est'=>20000,  'lat'=>30.1810,  'lng'=>66.9997,  'prayer_method'=>1],
            ['slug'=>'sialkot',    'volume_est'=>10000,  'lat'=>32.4945,  'lng'=>74.5229,  'prayer_method'=>1],
            ['slug'=>'gujranwala', 'volume_est'=>8000,   'lat'=>32.1877,  'lng'=>74.1945,  'prayer_method'=>1],
            ['slug'=>'hyderabad-sindh','volume_est'=>6000,'lat'=>25.3960, 'lng'=>68.3578,  'prayer_method'=>1],
            ['slug'=>'sukkur',     'volume_est'=>3000,   'lat'=>27.7052,  'lng'=>68.8574,  'prayer_method'=>1],
            ['slug'=>'sargodha',   'volume_est'=>5000,   'lat'=>32.0836,  'lng'=>72.6711,  'prayer_method'=>1],
            ['slug'=>'bahawalpur', 'volume_est'=>4000,   'lat'=>29.3956,  'lng'=>71.6836,  'prayer_method'=>1],
            ['slug'=>'abbottabad', 'volume_est'=>3000,   'lat'=>34.1688,  'lng'=>73.2215,  'prayer_method'=>1],
            ['slug'=>'dera-ghazi-khan','volume_est'=>2000,'lat'=>30.0490, 'lng'=>70.6355,  'prayer_method'=>1],
            ['slug'=>'sahiwal',    'volume_est'=>2000,   'lat'=>30.6706,  'lng'=>73.1064,  'prayer_method'=>1],
            ['slug'=>'gujrat',     'volume_est'=>2000,   'lat'=>32.5736,  'lng'=>74.0790,  'prayer_method'=>1],
            ['slug'=>'muzaffarabad','volume_est'=>2000,  'lat'=>34.3700,  'lng'=>73.4700,  'prayer_method'=>1],
            ['slug'=>'mardan',     'volume_est'=>2000,   'lat'=>34.1986,  'lng'=>72.0404,  'prayer_method'=>1],
            ['slug'=>'larkana',    'volume_est'=>1500,   'lat'=>27.5600,  'lng'=>68.2200,  'prayer_method'=>1],
            ['slug'=>'nawabshah',  'volume_est'=>1500,   'lat'=>26.2442,  'lng'=>68.4100,  'prayer_method'=>1],
            ['slug'=>'rahim-yar-khan','volume_est'=>2000,'lat'=>28.4212,  'lng'=>70.2989,  'prayer_method'=>1],
            ['slug'=>'okara',      'volume_est'=>1500,   'lat'=>30.8138,  'lng'=>73.4534,  'prayer_method'=>1],
            ['slug'=>'sheikhupura','volume_est'=>2000,   'lat'=>31.7167,  'lng'=>73.9850,  'prayer_method'=>1],
        ];

        $insertData = [];
        $now = Carbon::now();

        foreach ($pakCities as $city) {
            $name = Str::title(str_replace('-', ' ', $city['slug']));
            
            $insertData[] = [
                'country_id' => $pakistan->id,
                'name' => $name,
                'slug' => $city['slug'],
                'latitude' => $city['lat'],
                'longitude' => $city['lng'],
                'timezone' => 'Asia/Karachi',
                'prayer_calc_method' => $city['prayer_method'],
                'local_context_note' => 'Accurate prayer times and historical context for Muslims living in ' . $name . ', ' . $pakistan->name . '.', 
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('cities')->insert($insertData);
    }
}
