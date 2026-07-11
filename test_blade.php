<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$compiler = app('blade.compiler');
$path = __DIR__ . '/resources/views/hadith/show.blade.php';
$compiled = $compiler->compileString(file_get_contents($path));
file_put_contents(__DIR__ . '/compiled_blade.php', $compiled);
echo "Compiled to compiled_blade.php\n";
