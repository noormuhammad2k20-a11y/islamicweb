<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HadithTopic;
use App\Models\IslamicEvent;
use Illuminate\Support\Str;

echo "Seeding Hadith Topics...\n";
$topics = ['Faith', 'Prayer', 'Fasting', 'Charity', 'Pilgrimage', 'Manners'];
foreach ($topics as $t) {
    HadithTopic::firstOrCreate(['slug' => Str::slug($t)], [
        'topic_name' => $t,
        'content' => "Authentic Ahadeeth regarding {$t} from major collections like Sahih Bukhari and Sahih Muslim.",
    ]);
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
