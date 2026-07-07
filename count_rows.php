<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tables = [
    'surah_entities',
    'surah_entity_map',
    'surah_collections',
    'surah_collection_items',
    'surah_content_blocks',
    'surah_themes',
    'surah_faqs',
    'surah_important_ayahs',
    'surah_related_surahs',
    'surah_recitation_guides',
    'surah_learning_paths',
    'seo_metas'
];

echo "Row Counts After Seeding:\n";
echo "=========================\n";
foreach ($tables as $table) {
    try {
        $count = \Illuminate\Support\Facades\DB::table($table)->count();
        echo str_pad($table, 30) . ": $count\n";
    } catch (\Exception $e) {
        echo str_pad($table, 30) . ": ERROR\n";
    }
}
