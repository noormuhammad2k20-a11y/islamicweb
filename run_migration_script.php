<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$sql = file_get_contents(__DIR__ . '/run_migration.sql');
DB::unprepared($sql);

$stats = DB::select("SELECT status, COUNT(*) as count FROM islamic_names GROUP BY status");
foreach ($stats as $stat) {
    echo $stat->status . ": " . $stat->count . "\n";
}
echo "Migration successful.\n";
