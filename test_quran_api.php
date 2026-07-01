<?php
require 'vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Http;

echo "Fetching Uthmani Arabic...\n";
$response = Http::timeout(60)->get('https://api.alquran.cloud/v1/quran/quran-uthmani');
if ($response->successful()) {
    $data = $response->json();
    echo "Successfully fetched " . count($data['data']['surahs']) . " surahs.\n";
    $surah1 = $data['data']['surahs'][0];
    echo "Surah 1: " . $surah1['name'] . ", Ayahs: " . count($surah1['ayahs']) . "\n";
} else {
    echo "Failed to fetch Arabic.\n";
}

echo "Fetching English Tafsir from Quran.com...\n";
// 169 = English Ibn Kathir
$response = Http::timeout(60)->get('https://api.quran.com/api/v4/quran/tafsirs/169');
if ($response->successful()) {
    $data = $response->json();
    echo "Successfully fetched Tafsir. Count: " . count($data['tafsirs']) . "\n";
} else {
    echo "Failed to fetch Tafsir.\n";
}
