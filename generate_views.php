<?php

$viewsDir = __DIR__ . '/resources/views/pages/';

$viewsToCreate = [
    'allah_names' => ['index', 'show'],
    'hadith' => ['index', 'show', 'hadith_show'],
    'calculators' => ['index', 'zakat', 'zakat_gold', 'zakat_silver', 'fidya', 'kaffarah', 'inheritance'],
    'search' => ['index'],
];

$baseLayout = <<<EOT
@extends('layouts.app')

@section('title', '{{ TITLE }}')

@section('content')
<div class="page-header" style="background: var(--primary); color: white; padding: 40px 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 10px;">{{ TITLE }}</h1>
        <p style="opacity: 0.8; margin-bottom: 0;">{{ DESCRIPTION }}</p>
    </div>
</div>

<div class="container" style="padding: 40px 20px;">
    <!-- Content goes here -->
    <div style="background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px;">
        <h3>Page Content</h3>
        <p>This is a placeholder for the {{ TITLE }} page. Full implementation will be added here based on the design system.</p>
    </div>
</div>
@endsection
EOT;

foreach ($viewsToCreate as $folder => $files) {
    $dir = $viewsDir . $folder;
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    foreach ($files as $file) {
        $path = $dir . '/' . $file . '.blade.php';
        if (!file_exists($path)) {
            $title = ucwords(str_replace('_', ' ', $folder)) . ' - ' . ucwords(str_replace('_', ' ', $file));
            $content = str_replace(['{{ TITLE }}', '{{ DESCRIPTION }}'], [$title, 'Explore ' . $title], $baseLayout);
            file_put_contents($path, $content);
            echo "Created: $path\n";
        }
    }
}

echo "Done.\n";
