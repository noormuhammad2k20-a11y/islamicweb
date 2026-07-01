<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HijriMonth;
use App\Models\IslamicEvent;
use Illuminate\Support\Facades\DB;

echo "Seeding Hijri Months...\n";
$months = [
    1 => 'Muharram', 2 => 'Safar', 3 => 'Rabi al-Awwal', 4 => 'Rabi al-Thani',
    5 => 'Jumada al-Awwal', 6 => 'Jumada al-Thani', 7 => 'Rajab', 8 => 'Shaban',
    9 => 'Ramadan', 10 => 'Shawwal', 11 => 'Dhu al-Qadah', 12 => 'Dhu al-Hijjah'
];

foreach ($months as $id => $name) {
    DB::table('hijri_months')->updateOrInsert(['id' => $id], ['name' => $name]);
}

echo "Seeding Islamic Events...\n";
$iEvents = [
    ['name' => 'Eid al-Fitr', 'hijri_day' => 1, 'hijri_month_id' => 10, 'description' => 'Festival of breaking the fast.', 'event_type' => 'Holiday'],
    ['name' => 'Eid al-Adha', 'hijri_day' => 10, 'hijri_month_id' => 12, 'description' => 'Festival of sacrifice.', 'event_type' => 'Holiday'],
    ['name' => 'Ramadan Starts', 'hijri_day' => 1, 'hijri_month_id' => 9, 'description' => 'Beginning of the holy month of fasting.', 'event_type' => 'Observation'],
];

foreach ($iEvents as $ie) {
    IslamicEvent::firstOrCreate(['name' => $ie['name']], $ie);
}

echo "Seeding completed successfully.\n";
