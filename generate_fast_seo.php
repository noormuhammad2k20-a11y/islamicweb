<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

$categories = [
    'Static & Core Pages' => [
        'routes' => [
            '/', '/about', '/contact', '/privacy-policy', '/terms-and-conditions', 
            '/disclaimer', '/sitemap', '/faq', '/search'
        ],
        'total' => 9
    ],
    'Hajj & Umrah' => [
        'routes' => [
            '/hajj-and-umrah', '/hajj-guide', '/umrah-guide', '/hajj-checklist', 
            '/umrah-checklist', '/hajj-faqs', '/hajj-duas', '/umrah-duas'
        ],
        'total' => 8
    ],
    'Prayer Times' => [
        'routes' => ['/prayer-times/pakistan'],
        'model' => 'App\Models\City',
        'url_pattern' => '/prayer-times/{slug}',
        'total' => DB::table('cities')->count()
    ],
    'Namaz Guides' => [
        'routes' => ['/namaz-guides', '/namaz-guides/how-to-pray-salah', '/namaz-guides/salat-ul-tasbeeh'],
        'total' => 3
    ],
    'Surahs' => [
        'routes' => ['/surahs'],
        'model' => 'App\Models\Surah',
        'url_pattern' => '/surah/{slug}',
        'total' => DB::table('surahs')->count()
    ],
    'Duas' => [
        'routes' => ['/duas'],
        'model' => 'App\Models\Dua',
        'url_pattern' => '/duas/category-placeholder/{slug}',
        'total' => DB::table('duas')->count()
    ],
    '99 Names of Allah' => [
        'routes' => ['/99-names-of-allah'],
        'model' => 'App\Models\AllahName',
        'url_pattern' => '/99-names-of-allah/{slug}',
        'total' => DB::table('allah_names')->count()
    ],
    'Islamic Names' => [
        'routes' => ['/islamic-names'],
        'model' => 'App\Models\IslamicName',
        'url_pattern' => '/islamic-names/{slug}',
        'total' => DB::table('islamic_names')->count()
    ],
    'Dream Symbols' => [
        'routes' => ['/khwabon-ki-tabeer'],
        'model' => 'App\Models\DreamSymbol',
        'url_pattern' => '/khwabon-ki-tabeer/{slug}',
        'total' => DB::table('dream_symbols')->count()
    ],
    'Wazaif' => [
        'routes' => ['/wazaif'],
        'model' => 'App\Models\Wazifa',
        'url_pattern' => '/wazaif/{slug}',
        'total' => DB::table('wazaif')->count()
    ],
    'Hadiths' => [
        'routes' => ['/hadith'],
        'total' => DB::table('hadiths')->count(),
        'note' => 'Routes are complex (/hadith/collection/chapter/number).'
    ],
    'Islamic Knowledge' => [
        'routes' => [
            '/knowledge', '/knowledge/names-of-allah', '/knowledge/pillars-of-islam',
            '/knowledge/pillars-of-iman', '/knowledge/prophets-in-islam',
            '/knowledge/islamic-history', '/knowledge/islamic-facts'
        ],
        'total' => 7
    ],
    'Tools & Calculators' => [
        'routes' => [
            '/tools/qibla-direction', '/tools/age-calculator', '/tools/islamic-event-finder',
            '/tools/ramadan-calendar-generator', '/digital-tasbeeh-counter',
            '/calculators', '/calculators/zakat', '/calculators/zakat-on-gold',
            '/calculators/zakat-on-silver', '/calculators/fidya', '/calculators/kaffarah',
            '/calculators/inheritance'
        ],
        'total' => 12
    ],
    'Programmatic SEO Hubs' => [
        'routes' => [
            '/islamic-calendar', '/islamic-calendar/today', '/islamic-calendar/pakistan',
            '/hijri-gregorian-converter', '/islamic-date-today', '/prayer-times-today',
            '/sehri-time-today', '/iftar-time-today', '/zakat-calculator-online', '/qibla-finder-online'
        ],
        'total' => 10
    ]
];

$outputFile = 'website-Full pages-analysis.md';

function getSeoDataInternal($url) {
    try {
        $request = Request::create($url, 'GET');
        // bypass middleware that might mess up state if we do it many times, or just handle normally
        $response = app()->make('router')->dispatch($request);
        $html = $response->getContent();
        $httpCode = $response->getStatusCode();
    } catch (\Exception $e) {
        $httpCode = 500;
        $html = '';
    }

    if ($httpCode !== 200 || !$html) {
        return [
            'Title' => 'ERROR: ' . $httpCode,
            'Description' => 'N/A',
            'H1' => 'N/A',
            'Index' => 'N/A',
            'Canonical' => 'N/A',
            'Notes' => 'Failed to load page'
        ];
    }

    // to avoid memory leaks with DOMDocument on 20k requests, let's use regex
    $title = '';
    $desc = '';
    $h1 = '';
    $robots = 'Index';
    $canonical = '';

    if (preg_match('/<title[^>]*>(.*?)<\/title>/is', $html, $matches)) {
        $title = strip_tags($matches[1]);
    }
    if (preg_match('/<meta[^>]*name=["\']description["\'][^>]*content=["\'](.*?)["\'][^>]*>/is', $html, $matches)) {
        $desc = $matches[1];
    } elseif (preg_match('/<meta[^>]*content=["\'](.*?)["\'][^>]*name=["\']description["\'][^>]*>/is', $html, $matches)) {
        $desc = $matches[1];
    }
    if (preg_match('/<meta[^>]*name=["\']robots["\'][^>]*content=["\'](.*?)["\'][^>]*>/is', $html, $matches)) {
        $robots = $matches[1];
    } elseif (preg_match('/<meta[^>]*content=["\'](.*?)["\'][^>]*name=["\']robots["\'][^>]*>/is', $html, $matches)) {
        $robots = $matches[1];
    }
    if (preg_match('/<link[^>]*rel=["\']canonical["\'][^>]*href=["\'](.*?)["\'][^>]*>/is', $html, $matches)) {
        $canonical = $matches[1];
    } elseif (preg_match('/<link[^>]*href=["\'](.*?)["\'][^>]*rel=["\']canonical["\'][^>]*>/is', $html, $matches)) {
        $canonical = $matches[1];
    }
    if (preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $html, $matches)) {
        $h1 = strip_tags($matches[1]);
    }

    $notes = [];
    if (empty($title)) $notes[] = 'Missing Title';
    if (empty($desc)) $notes[] = 'Missing Meta Description';
    else if (str_ends_with(trim($desc), 'Auth...')) $notes[] = 'Truncated Meta Description (Auth...)';
    if (empty($h1)) $notes[] = 'Missing H1';
    if (empty($canonical)) $notes[] = 'Missing Canonical URL';
    if (stripos($robots, 'noindex') !== false) $robots = 'Noindex';

    return [
        'Title' => trim(str_replace("\n", " ", $title)),
        'Description' => trim(str_replace("\n", " ", $desc)),
        'H1' => trim(str_replace("\n", " ", $h1)),
        'Index' => $robots,
        'Canonical' => $canonical,
        'Notes' => implode(', ', $notes) ?: 'Good'
    ];
}

$fileHandle = fopen($outputFile, 'w');
fwrite($fileHandle, "# Website SEO Inventory & Analysis\n\n");
fwrite($fileHandle, "Generated on: " . date('Y-m-d H:i:s') . "\n\n");

$totalCrawled = 0;

foreach ($categories as $catName => $catData) {
    echo "Processing category: {$catName}...\n";
    fwrite($fileHandle, "## {$catName} (Total Pages: {$catData['total']})\n");
    fwrite($fileHandle, "| URL | Page Title | Meta Description | H1 | Index Status | Canonical URL | Page Type | Notes |\n");
    fwrite($fileHandle, "|---|---|---|---|---|---|---|---|\n");

    if (!empty($catData['routes'])) {
        foreach ($catData['routes'] as $route) {
            $seo = getSeoDataInternal($route);
            fwrite($fileHandle, "| `{$route}` | {$seo['Title']} | {$seo['Description']} | {$seo['H1']} | {$seo['Index']} | {$seo['Canonical']} | Static/Hub | {$seo['Notes']} |\n");
            $totalCrawled++;
        }
    }

    if (!empty($catData['model'])) {
        $modelClass = $catData['model'];
        if (class_exists($modelClass)) {
            $count = 0;
            // Eager load category if Dua
            $query = ($modelClass === 'App\Models\Dua') ? $modelClass::with('category') : $modelClass::query();
            foreach ($query->cursor() as $record) {
                if ($modelClass === 'App\Models\Dua') {
                    $catSlug = $record->category ? $record->category->slug : 'misc';
                    $url = "/duas/{$catSlug}/{$record->slug}";
                } else {
                    $url = str_replace('{slug}', $record->slug, $catData['url_pattern']);
                }
                $seo = getSeoDataInternal($url);
                fwrite($fileHandle, "| `{$url}` | {$seo['Title']} | {$seo['Description']} | {$seo['H1']} | {$seo['Index']} | {$seo['Canonical']} | Dynamic | {$seo['Notes']} |\n");
                $count++;
                $totalCrawled++;
                if ($count % 500 == 0) {
                    echo "  Processed $count records for $catName...\n";
                }
            }
        }
    }
    
    if ($catName === 'Hadiths') {
        fwrite($fileHandle, "| `/hadith` | ... | ... | ... | ... | ... | Hub | Needs complex crawling for all individual hadiths. |\n");
    }

    fwrite($fileHandle, "\n");
}

fclose($fileHandle);
echo "Analysis completed. Total pages crawled: $totalCrawled. Written to $outputFile\n";
