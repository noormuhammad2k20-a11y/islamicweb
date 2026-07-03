<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$compiler = app('blade.compiler');
$compiled = $compiler->compileString(file_get_contents('resources/views/pages/islamic-date/hub.blade.php'));
file_put_contents('compiled_hub.php', $compiled);
echo "Compiled to compiled_hub.php\n";
