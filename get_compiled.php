<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$path = app('view')->getFinder()->find('prayer-times.nawafil');
$compiledPath = app('blade.compiler')->getCompiledPath($path);
file_put_contents('compiled_nawafil.php', file_get_contents($compiledPath));
