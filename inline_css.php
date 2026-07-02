<?php
$html = file_get_contents('design.html');

// 1. FontAwesome
$faCss = '';
if (file_exists(__DIR__ . '/public/vendor/fontawesome/css/all.min.css')) {
    $faCss = file_get_contents(__DIR__ . '/public/vendor/fontawesome/css/all.min.css');
    $faCss = str_replace('../webfonts/', './public/vendor/fontawesome/webfonts/', $faCss);
}

// 2. Build Assets
$buildDir = __DIR__ . '/public/build/assets';
$cssFiles = glob($buildDir . '/*.css');
$appCss = '';
foreach ($cssFiles as $file) {
    $css = file_get_contents($file);
    // Vite build assets use relative paths like url(fa-brands-400-BP5tdqmh.woff2)
    $css = preg_replace('/url\(([\'"]?)(?!data:)(?!\/)(?!http)([^\'"\)]+)([\'"]?)\)/', 'url($1./public/build/assets/$2$3)', $css);
    $appCss .= $css . "\n";
}

// Strip out the existing <link> and <script> preload tags for assets
$html = preg_replace('/<link[^>]*href="[^"]*app-.*?\.css"[^>]*>/is', '', $html);
$html = preg_replace('/<link[^>]*href="[^"]*all\.min\.css"[^>]*>/is', '', $html);
$html = preg_replace('/<link[^>]*rel="modulepreload"[^>]*>/is', '', $html);

// We should also remove the fallback noscript if present
$html = preg_replace('/<noscript><link rel="stylesheet" href="https:\/\/fonts.googleapis.com[^>]*><\/noscript>/is', '', $html);

// Inject the inline styles right before </head>
$inlineStyles = "<style>\n" . $faCss . "\n" . $appCss . "\n</style>\n</head>";
$html = str_replace('</head>', $inlineStyles, $html);

file_put_contents('design.html', $html);
echo "CSS inlined successfully!\n";
