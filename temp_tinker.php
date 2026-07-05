<?php
$urls = [];
$baseUrl = url('/prayer-times');

$countries = ['pakistan', 'uae', 'saudi-arabia', 'india', 'usa'];
foreach($countries as $c) {
    $urls[] = $baseUrl . '/' . $c;
}

$prayers = ['fajr', 'zuhr', 'asr', 'maghrib', 'isha'];

$worldCities = \App\Models\WorldCity::pluck('slug')->toArray();
foreach($worldCities as $slug) {
    $urls[] = $baseUrl . '/' . $slug;
    foreach($prayers as $p) {
        $urls[] = $baseUrl . '/' . $slug . '/' . $p;
    }
}

try {
    $pakCities = \App\Models\City::pluck('slug')->toArray();
    foreach($pakCities as $slug) {
        if (empty($slug)) continue;
        $urls[] = $baseUrl . '/' . $slug;
        foreach($prayers as $p) {
            $urls[] = $baseUrl . '/' . $slug . '/' . $p;
        }
    }
} catch (\Exception $e) {
    // Ignore if City table is empty or missing slug
}

file_put_contents(base_path('newkeyword.txt'), implode("\n", $urls));
echo "Generated " . count($urls) . " URLs.\n";
