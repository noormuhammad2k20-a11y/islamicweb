<?php
$dir = __DIR__ . '/app/Filament/Admin/Resources';

if (!is_dir($dir)) {
    // maybe it is in app/Filament/Resources ?
    $dir = __DIR__ . '/app/Filament/Resources';
}

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), 'Resource.php')) {
        $path = $file->getPathname();
        $content = file_get_contents($path);
        
        // Add navigation group if not exists
        if (strpos($content, '$navigationGroup') === false) {
            // Find "protected static ?string $navigationIcon" and insert after it
            $content = preg_replace(
                '/(protected static \?string \$navigationIcon = .*?;)/',
                "$1\n    protected static ?string \$navigationGroup = 'Quran SEO Hub';",
                $content
            );
            file_put_contents($path, $content);
        }
    }
}
echo "Done processing resources.\n";
