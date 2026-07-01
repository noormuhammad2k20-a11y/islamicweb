<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Surah;
use App\Models\FazilatEntry;

$surahs = [
    ['number' => 73, 'name_ar' => '??????', 'name_en' => 'Muzammil', 'name_ur' => '????', 'slug' => 'muzammil', 'revelation_place' => 'Meccan', 'ayah_count' => 20, 'para_juz' => '29', 'arabic_text' => '??? ???????? ?????????????... (Surah text snippet)'],
    ['number' => 67, 'name_ar' => '?????', 'name_en' => 'Mulk', 'name_ur' => '???', 'slug' => 'mulk', 'revelation_place' => 'Meccan', 'ayah_count' => 30, 'para_juz' => '29', 'arabic_text' => '????????? ??????? ???????? ?????????... (Surah text snippet)'],
    ['number' => 47, 'name_ar' => '????', 'name_en' => 'Muhammad', 'name_ur' => '????', 'slug' => 'muhammad', 'revelation_place' => 'Medinan', 'ayah_count' => 38, 'para_juz' => '26', 'arabic_text' => '????????? ???????? ????????? ??? ??????? ???????... (Surah text snippet)'],
    ['number' => 56, 'name_ar' => '???????', 'name_en' => 'Waqiah', 'name_ur' => '?????', 'slug' => 'waqiah', 'revelation_place' => 'Meccan', 'ayah_count' => 96, 'para_juz' => '27', 'arabic_text' => '????? ???????? ????????????... (Surah text snippet)'],
];

foreach ($surahs as $s) {
    Surah::firstOrCreate(['slug' => $s['slug']], $s);
}

$muzammil = Surah::where('slug', 'muzammil')->first();
if ($muzammil) {
    FazilatEntry::firstOrCreate(['surah_id' => $muzammil->id, 'question' => 'What are the benefits of reciting Surah Muzammil?'], [
        'answer' => 'Reciting Surah Muzammil is known to bring ease during difficult times and protect the reciter from worldly hardships.',
        'hadith_reference' => 'Various scholarly traditions (Commonly cited)',
        'verification_status' => 'commonly_cited'
    ]);
}

$mulk = Surah::where('slug', 'mulk')->first();
if ($mulk) {
    FazilatEntry::firstOrCreate(['surah_id' => $mulk->id, 'question' => 'How does Surah Mulk protect the reciter?'], [
        'answer' => 'The Prophet (PBUH) stated that a Surah of thirty verses intercedes for a man until he is forgiven, and it is Surah Tabarak Alladhi Biyadihil Mulk.',
        'hadith_reference' => 'Sunan Abi Dawud 1400',
        'verification_status' => 'verified'
    ]);
}

echo "Seeding completed successfully.\n";
