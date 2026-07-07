<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$results = DB::select("SELECT block_type, LEFT(content_en, 100) as preview FROM surah_content_blocks WHERE surah_id = 36");
echo "=== PREVIEW ===\n";
print_r($results);

$results2 = DB::select("SELECT block_type, is_published, LENGTH(content_en) as content_length FROM surah_content_blocks WHERE surah_id = 36 ORDER BY sort_order");
echo "=== LENGTHS ===\n";
print_r($results2);
