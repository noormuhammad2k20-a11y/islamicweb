<?php
$html = file_get_contents('index_backup.html');

preg_match('/<head>(.*?)<style>/is', $html, $matches);
$headContent = $matches[1];
preg_match_all('/<link[^>]+>/is', $headContent, $links);
$fontsIcons = '<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap" rel="stylesheet">' . "\n    " . '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">';

preg_match('/<!-- Top Bar -->(.*?)<!-- Hero -->/is', $html, $matches);
$headerContent = trim($matches[1]);

// Inject Blade variables into Top Bar
$headerContent = str_replace(
    '<span class="hijri-date"><i class="fas fa-moon"></i> ١٥ جمادی الثانی ۱۴۴۶</span>',
    '<span class="hijri-date"><i class="fas fa-moon"></i> {{ isset($hijriDate) ? $hijriDate->hijri_day . \' \' . $hijriDate->hijri_month . \' \' . $hijriDate->hijri_year : \'١٥ جمادی الثانی ۱۴۴۶\' }}</span>',
    $headerContent
);
$headerContent = str_replace(
    '<span><i class="fas fa-map-marker-alt"></i> مکہ مکرمہ</span>',
    '<span><i class="fas fa-map-marker-alt"></i> {{ isset($city) ? $city->name : \'مکہ مکرمہ\' }}</span>',
    $headerContent
);

preg_match('/<!-- Footer -->(.*?)<\/body>/is', $html, $matches);
$footerContent = trim($matches[1]);

$layout = '<!DOCTYPE html>
<html lang="{{ str_replace(\'_\', \'-\', app()->getLocale()) }}" dir="{{ app()->getLocale() == \'ur\' ? \'rtl\' : \'ltr\' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield(\'title\', \'نورِ اسلام | Noor-e-Islam\')</title>
    ' . $fontsIcons . '
    @vite([\'resources/css/app.css\', \'resources/js/app.js\'])
</head>
<body>

' . $headerContent . '

    <main>
        @yield(\'content\')
    </main>

' . $footerContent . '
</body>
</html>';

file_put_contents('resources/views/layouts/app.blade.php', $layout);
echo "app.blade.php fixed and dynamic variables injected!\n";
