<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$urls = [
    'Homepage' => '/',
    'About Us' => '/about',
    'Contact Us' => '/contact',
    'Islamic Date Hub' => '/islamic-date-today',
    'Islamic Date Country' => '/islamic-date-today/pakistan',
    'Prayer Times Hub' => '/prayer-times',
    'Prayer Times City' => '/prayer-times/karachi',
    'Namaz Guide Hub' => '/namaz-guides',
    'Quran Hub' => '/quran',
    'Surah Index' => '/surahs',
    'Surah Show' => '/surah/ya-sin',
    'Hadith Topics' => '/hadith-topics',
    'Events Calendar' => '/islamic-calendar',
    'Islamic Names' => '/islamic-names',
    'Duas Hub' => '/duas',
    'Zakat Calculator' => '/zakat-calculator',
    'Tasbeeh' => '/tasbeeh',
    'Ramadan Hub' => '/ramadan/2024',
    'Hajj & Umrah' => '/hajj-umrah',
    'Qibla Direction' => '/tools/qibla-direction',
    'Islamic Knowledge' => '/knowledge',
    'Media Wallpapers' => '/media/wallpapers',
    'Blog Index' => '/blog',
    '99 Names of Allah' => '/99-names-of-allah',
    'Wazaif' => '/wazaif',
    'Dream Interpretation' => '/khwabon-ki-tabeer',
    'Islamic Quiz' => '/islamic-quiz',
];

$outputHtml = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n<meta charset=\"UTF-8\">\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n<title>Static Design Prototype</title>\n";

$request = Illuminate\Http\Request::create('/', 'GET');
$response = $kernel->handle($request);
$homeHtml = $response->getContent();

if (preg_match('/<head>(.*?)<\/head>/is', $homeHtml, $headMatches)) {
    $outputHtml .= $headMatches[1];
}

// Add our custom prototype styling
$outputHtml .= "
<style>
    #prototype-nav {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #111;
        color: #fff;
        padding: 15px;
        border-radius: 10px;
        z-index: 999999;
        font-family: sans-serif;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        max-height: 80vh;
        overflow-y: auto;
        width: 250px;
    }
    #prototype-nav h3 {
        margin: 0 0 10px 0;
        font-size: 16px;
        border-bottom: 1px solid #333;
        padding-bottom: 10px;
    }
    #prototype-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    #prototype-nav li {
        margin-bottom: 5px;
    }
    #prototype-nav a {
        color: #aaa;
        text-decoration: none;
        font-size: 14px;
        display: block;
        padding: 5px;
        border-radius: 4px;
    }
    #prototype-nav a:hover, #prototype-nav a.active {
        background: #333;
        color: #fff;
    }
    .prototype-page {
        display: none;
    }
    .prototype-page.active {
        display: block;
    }
</style>
";

$outputHtml .= "</head>\n<body>\n";

// Generate Prototype Nav
$outputHtml .= "<div id=\"prototype-nav\">\n";
$outputHtml .= "<h3>Design Prototype Menu</h3>\n";
$outputHtml .= "<ul>\n";
$index = 0;
foreach ($urls as $name => $url) {
    $id = 'page-' . $index;
    $activeClass = $index === 0 ? 'active' : '';
    $outputHtml .= "<li><a href=\"#\" class=\"prototype-link $activeClass\" onclick=\"showPage('$id', this); return false;\">$name</a></li>\n";
    $index++;
}
$outputHtml .= "</ul>\n";
$outputHtml .= "</div>\n";

// Generate Page Contents
$index = 0;
foreach ($urls as $name => $url) {
    $id = 'page-' . $index;
    try {
        $request = Illuminate\Http\Request::create($url, 'GET');
        $response = $kernel->handle($request);
        $html = $response->getContent();

        if (preg_match('/<body[^>]*>(.*?)<\/body>/is', $html, $bodyMatches)) {
            $bodyContent = $bodyMatches[1];
            $bodyContent = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $bodyContent);
            
            $activeClass = $index === 0 ? 'active' : '';
            $outputHtml .= "<!-- SECTION: $name Page ($url) -->\n";
            $outputHtml .= "<div id=\"$id\" class=\"prototype-page $activeClass\">\n";
            $outputHtml .= $bodyContent;
            $outputHtml .= "\n</div>\n";
        }
    } catch (\Exception $e) {
        $outputHtml .= "<div id=\"$id\" class=\"prototype-page\"><div style=\"padding:50px; text-align:center; color:red;\">$name Page ($url) - ERROR: " . $e->getMessage() . "</div></div>\n";
    }
    $index++;
}

// Add Prototype JS
$outputHtml .= "
<script>
    function showPage(pageId, linkElement) {
        document.querySelectorAll('.prototype-page').forEach(function(page) {
            page.classList.remove('active');
        });
        document.querySelectorAll('.prototype-link').forEach(function(link) {
            link.classList.remove('active');
        });
        document.getElementById(pageId).classList.add('active');
        if (linkElement) {
            linkElement.classList.add('active');
        }
        window.scrollTo(0, 0);
    }
</script>
";

$outputHtml .= "\n</body>\n</html>";

file_put_contents(__DIR__.'/design.html', $outputHtml);
echo "design.html created successfully with navigation.\n";
