<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('resources/views/pages/surah'));
foreach ($files as $file) {
    if ($file->isFile() && strpos($file->getFilename(), '.blade.php') !== false) {
        $path = $file->getPathname();
        // Convert path to view name
        $viewName = str_replace(['resources\\views\\', '.blade.php', '/'], ['', '', '.'], $path);
        // Replace Windows directory separators with dots
        $viewName = str_replace('\\', '.', $viewName);
        try {
            // Compile but don't render (since rendering requires variables)
            $compiler = app('blade.compiler');
            $compiler->compileString(file_get_contents($path));
            // To actually check for PHP syntax errors, we'd need to lint the compiled string
            // Let's just try to php -l a temp file
            $compiled = $compiler->compileString(file_get_contents($path));
            file_put_contents('temp_compiled.php', $compiled);
            exec('php -l temp_compiled.php 2>&1', $output, $returnVar);
            if ($returnVar !== 0) {
                echo "ERROR in $viewName:\n" . implode("\n", $output) . "\n\n";
            }
        } catch (\Throwable $e) {
            echo "Exception compiling $viewName: " . $e->getMessage() . "\n";
        }
    }
}
@unlink('temp_compiled.php');
echo "Done\n";
