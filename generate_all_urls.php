<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

URL::forceRootUrl('http://127.0.0.1:8000');

$categories = [];

function addUrl($category, $url) {
    global $categories;
    
    $url = str_replace('https://noorislam.com', 'http://127.0.0.1:8000', $url);
    
    $path = parse_url($url, PHP_URL_PATH);
    $path = ltrim($path, '/');
    
    // exclude livewire internals and health checks
    if ($path === 'up' || str_starts_with($path, 'livewire')) return;
    if (str_starts_with($path, 'test') || str_starts_with($path, 'temp') || str_starts_with($path, 'api')) return;
    
    // Normalize ur paths for categorization
    $catPath = $path;
    if (str_starts_with($catPath, 'ur/')) {
        $catPath = substr($catPath, 3);
    }
    
    if (empty($catPath) || $catPath === 'ur') $category = 'Home';
    elseif (str_starts_with($catPath, 'prayer-times-today') || str_starts_with($catPath, 'sehri-time-today') || str_starts_with($catPath, 'iftar-time-today') || str_starts_with($catPath, 'islamic-date-today') || str_starts_with($catPath, 'zakat-calculator-online') || str_starts_with($catPath, 'qibla-finder-online')) {
        $category = 'SEO Landing Pages';
    }
    elseif (str_starts_with($catPath, 'about') || str_starts_with($catPath, 'contact') || str_starts_with($catPath, 'privacy') || str_starts_with($catPath, 'terms') || str_starts_with($catPath, 'disclaimer') || str_starts_with($catPath, 'faq') || str_starts_with($catPath, 'sitemap')) {
        $category = 'Static Pages';
    }
    elseif (str_starts_with($catPath, 'tools') || str_contains($catPath, 'converter') || str_contains($catPath, 'tasbeeh') || str_contains($catPath, 'qibla')) $category = 'Tools';
    elseif (str_starts_with($catPath, 'calculators') || str_starts_with($catPath, 'zakat')) $category = 'Calculators';
    elseif (str_starts_with($catPath, 'prayer-times') || str_starts_with($catPath, 'namaz-time')) $category = 'Prayer Times';
    elseif (str_starts_with($catPath, 'islamic-calendar') || str_starts_with($catPath, 'islamic-date') || str_starts_with($catPath, 'hijri-date')) $category = 'Islamic Calendar';
    elseif (str_starts_with($catPath, 'islamic-month')) $category = 'Islamic Months';
    elseif (str_starts_with($catPath, 'surahs') || str_starts_with($catPath, 'surah')) $category = 'Surahs';
    elseif (str_starts_with($catPath, 'hadith')) $category = 'Hadith';
    elseif (str_starts_with($catPath, 'islamic-names')) $category = 'Islamic Names';
    elseif (str_starts_with($catPath, 'duas') || str_starts_with($catPath, 'dua/')) $category = 'Duas';
    elseif (str_starts_with($catPath, '99-names')) $category = '99 Names of Allah';
    elseif (str_starts_with($catPath, 'wazaif')) $category = 'Wazaif';
    elseif (str_starts_with($catPath, 'khwabon-ki-tabeer') || str_starts_with($catPath, 'dreams')) $category = 'Khwabon Ki Tabeer';
    elseif (str_starts_with($catPath, 'blog')) $category = 'Blog';
    elseif (str_starts_with($catPath, 'hajj') || str_starts_with($catPath, 'umrah')) $category = 'Hajj & Umrah';
    elseif (str_starts_with($catPath, 'ramadan') || str_starts_with($catPath, 'sehri') || str_starts_with($catPath, 'sehr-o')) $category = 'Ramadan';
    elseif (str_starts_with($catPath, 'knowledge')) $category = 'Islamic Knowledge';
    elseif (str_starts_with($catPath, 'media')) $category = 'Media';
    elseif (str_starts_with($catPath, 'namaz-guides')) $category = 'Namaz Guides';
    elseif (str_starts_with($catPath, 'islamic-quiz')) $category = 'Islamic Quiz';
    elseif (str_starts_with($catPath, 'islamic-events')) $category = 'Islamic Events';
    elseif (str_starts_with($catPath, 'search')) $category = 'Search';
    else {
        // Keeps original category (like 'Sitemap' or 'Static') if it falls through, but we prefer these to be categorized
    }

    if (!isset($categories[$category])) $categories[$category] = [];
    $categories[$category][$url] = true;
}

// 1. Get from all Sitemaps
$controller = new \App\Http\Controllers\SitemapController();

$methods = [
    'calendar', 'dates', 'prayer', 'surah', 'surahs', 'collections',
    'hadith', 'pages', 'duas', 'names', 'wazaif', 'dreams', 'allahNames'
];

foreach ($methods as $method) {
    try {
        $response = $controller->{$method}();
        $content = $response->getContent();
        
        // Parse XML
        preg_match_all('/<loc>(.*?)<\/loc>/', $content, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $url) {
                addUrl('Sitemap', $url);
            }
        }
    } catch (\Exception $e) {
        // skip error
    }
}

// 2. Add all static GET routes
$routes = Route::getRoutes();
foreach ($routes as $route) {
    if (in_array('GET', $route->methods())) {
        $uri = $route->uri();
        if (str_contains($uri, '{') || str_starts_with($uri, 'api') || str_starts_with($uri, 'ajax') || str_starts_with($uri, '_') || str_contains($uri, 'sitemap') || $uri == 'robots.txt' || str_starts_with($uri, 'admin') || str_starts_with($uri, 'filament')) continue;
        if ($uri == 'test' || str_contains($uri, 'test') || str_contains($uri, 'response')) continue;
        
        addUrl('Static', url($uri));
    }
}

// 3. Add anything missing like Knowledge Articles
if (class_exists('App\Models\KnowledgeArticle')) {
    $articles = \App\Models\KnowledgeArticle::all();
    foreach ($articles as $a) {
        addUrl('Islamic Knowledge', url('knowledge/' . $a->slug));
        addUrl('Islamic Knowledge', url('ur/knowledge/' . $a->slug));
    }
}

// Create directories and files
$outputDir = __DIR__ . '/website-pages-by-category';
if (!is_dir($outputDir)) mkdir($outputDir, 0755, true);

$indexContent = "# Indexable Pages Report\n\n| Category | Total Pages |\n|---|---|\n";
$grandTotal = 0;

ksort($categories); // Sort alphabetically

foreach ($categories as $cat => $urlsDict) {
    // Only output if not empty
    $urlsList = array_keys($urlsDict);
    if (count($urlsList) === 0) continue;

    $count = count($urlsList);
    $grandTotal += $count;
    
    $filename = str_replace([' & ', ' '], ['-', '-'], strtolower($cat)) . '.md';
    $filePath = $outputDir . '/' . $filename;
    
    $indexContent .= "| [$cat]($filename) | $count |\n";
    
    $md = "# $cat\n\nTotal number of pages: $count\n\n";
    $md .= implode("\n", $urlsList);
    
    file_put_contents($filePath, $md);
}

$indexContent .= "| **Grand Total** | **$grandTotal** |\n";
file_put_contents($outputDir . '/index.md', $indexContent);

echo "Report generated at website-pages-by-category/index.md\n";
