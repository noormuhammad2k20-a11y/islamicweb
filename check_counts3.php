<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$res = DB::select("SELECT COUNT(*) as c FROM islamic_names WHERE is_quranic = 1 OR is_prophet_name = 1 OR is_sahabi = 1 OR is_sahabiyah = 1");
print_r($res);
