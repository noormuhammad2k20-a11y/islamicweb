<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Country;
use App\Models\City;
use App\Models\Surah;
use App\Models\HadithTopic;
use App\Models\IslamicEvent;
use App\Models\RamadanTiming;
use App\Models\HistoricalEvent;
use Illuminate\Support\Str;

echo "Seeding Countries and Cities...\n";
$countriesData = [
    'Pakistan' => ['code' => 'PK', 'cities' => ['Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Peshawar', 'Quetta', 'Multan', 'Sialkot', 'Hyderabad', 'Sukkur', 'Gujranwala']],
    'Saudi Arabia' => ['code' => 'SA', 'cities' => ['Makkah', 'Madinah', 'Riyadh', 'Jeddah', 'Dammam']],
    'UAE' => ['code' => 'AE', 'cities' => ['Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman']],
    'USA' => ['code' => 'US', 'cities' => ['New York', 'Chicago', 'Houston', 'Dallas', 'Los Angeles']],
    'UK' => ['code' => 'GB', 'cities' => ['London', 'Birmingham', 'Manchester', 'Bradford']],
    'Canada' => ['code' => 'CA', 'cities' => ['Toronto', 'Montreal', 'Vancouver', 'Calgary']],
    'India' => ['code' => 'IN', 'cities' => ['Mumbai', 'Delhi', 'Hyderabad', 'Lucknow']],
    'Oman' => ['code' => 'OM', 'cities' => ['Muscat', 'Salalah', 'Sohar']],
];

foreach ($countriesData as $cName => $cData) {
    $country = Country::firstOrCreate(['slug' => Str::slug($cName)], [
        'name' => $cName,
        'iso_code' => $cData['code'],
        'local_context_note' => "In {$cName}, the Islamic calendar and related dates are deeply influenced by the local moon sighting committees and regional Islamic councils."
    ]);

    foreach ($cData['cities'] as $cityName) {
        $lat = 24.8607; $lng = 67.0011; // Dummy coords
        $city = City::firstOrCreate(['slug' => Str::slug($cityName), 'country_id' => $country->id], [
            'name' => $cityName,
            'latitude' => $lat,
            'longitude' => $lng,
            'prayer_calc_method' => 'University of Islamic Sciences, Karachi',
            'local_context_note' => "The city of {$cityName} has its own vibrant tradition. Local mosques announce moon sightings based on the national consensus, often coordinated by central authorities."
        ]);
        
        RamadanTiming::firstOrCreate(['city_id' => $city->id, 'date' => date('Y-m-d')], [
            'ramadan_year' => 1446,
            'sehri_time' => '05:00 AM',
            'iftar_time' => '06:30 PM',
        ]);
    }
}

echo "Seeding Hadith Topics...\n";
$topics = ['Faith', 'Prayer', 'Fasting', 'Charity', 'Pilgrimage', 'Manners'];
foreach ($topics as $t) {
    HadithTopic::firstOrCreate(['slug' => Str::slug($t)], [
        'name_en' => $t,
        'name_ur' => '????? ' . $t,
        'name_ar' => '???????',
        'description' => "Authentic Ahadeeth regarding {$t} from major collections like Sahih Bukhari and Sahih Muslim.",
    ]);
}

echo "Seeding Islamic Events...\n";
$iEvents = [
    ['name' => 'Eid al-Fitr', 'slug' => 'eid-al-fitr', 'hijri_day' => 1, 'hijri_month' => 'Shawwal', 'hijri_month_id' => 10, 'description' => 'Festival of breaking the fast.', 'is_public_holiday' => true],
    ['name' => 'Eid al-Adha', 'slug' => 'eid-al-adha', 'hijri_day' => 10, 'hijri_month' => 'Dhu al-Hijjah', 'hijri_month_id' => 12, 'description' => 'Festival of sacrifice.', 'is_public_holiday' => true],
    ['name' => 'Ramadan Starts', 'slug' => 'ramadan-starts', 'hijri_day' => 1, 'hijri_month' => 'Ramadan', 'hijri_month_id' => 9, 'description' => 'Beginning of the holy month of fasting.', 'is_public_holiday' => false],
];

foreach ($iEvents as $ie) {
    IslamicEvent::firstOrCreate(['slug' => $ie['slug']], $ie);
}

echo "Seeding completed successfully.\n";
