<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$names = DB::select("SELECT name_english FROM islamic_names LIMIT 20");
foreach ($names as $name) {
    echo $name->name_english . "\n";
}
