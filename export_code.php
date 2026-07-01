<?php

$directories = [
    'routes/web.php',
    'app/Models',
    'app/Http/Controllers',
    'resources/views/layouts',
    'resources/views/pages',
    'resources/css/app.css',
    'database/migrations',
    'database/seeders',
];

$outputFile = 'islamic_website_source.md';
$content = "# Islamic Website Source Code\n\nThis file contains the source code for the Zakat, Namaz, Duas, and other sections.\n\n";

function appendFiles($path, &$content) {
    if (is_file($path)) {
        if (str_ends_with($path, '.php') || str_ends_with($path, '.css')) {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if (str_ends_with($path, '.blade.php')) $ext = 'html';
            $content .= "## File: " . str_replace('\\', '/', $path) . "\n\n```" . $ext . "\n" . file_get_contents($path) . "\n```\n\n";
        }
    } elseif (is_dir($path)) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $file) {
            if ($file->isFile()) {
                $filePath = $file->getPathname();
                if (str_ends_with($filePath, '.php') || str_ends_with($filePath, '.css')) {
                    $ext = pathinfo($filePath, PATHINFO_EXTENSION);
                    if (str_ends_with($filePath, '.blade.php')) $ext = 'html';
                    $content .= "## File: " . str_replace('\\', '/', $filePath) . "\n\n```" . $ext . "\n" . file_get_contents($filePath) . "\n```\n\n";
                }
            }
        }
    }
}

foreach ($directories as $dir) {
    appendFiles($dir, $content);
}

file_put_contents($outputFile, $content);
echo "Generated $outputFile successfully. Total size: " . round(strlen($content)/1024, 2) . " KB\n";
