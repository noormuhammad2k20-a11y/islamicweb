<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$count = DB::table('islamic_names')->where('name_english', 'LIKE', '%-%')->count();
echo "Hyphenated names: $count\n";

$all = DB::table('islamic_names')->count();
echo "Total names: $all\n";
