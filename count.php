<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
echo 'Cities: '.App\Models\City::count()."\n";
echo 'Surahs: '.App\Models\Surah::count()."\n";
echo 'Duas: '.App\Models\Dua::count()."\n";
echo 'AllahNames: '.App\Models\AllahName::count()."\n";
echo 'IslamicNames: '.App\Models\IslamicName::count()."\n";
echo 'DreamSymbols: '.App\Models\DreamSymbol::count()."\n";
echo 'Wazaif: '.App\Models\Wazifa::count()."\n";
