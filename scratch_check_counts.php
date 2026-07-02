<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

foreach(App\Models\DuaCategory::withCount('duas')->get() as $cat) {
    echo $cat->name_english . ': ' . $cat->duas_count . PHP_EOL;
}
