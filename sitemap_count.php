<?php

$baseUrl = 'http://127.0.0.1:8000';
$sitemaps = [
    '/sitemap_index.xml',
    '/sitemap-surahs.xml',
    '/sitemap-duas.xml',
    '/sitemap-hadith.xml',
    '/sitemap-names.xml',
    '/sitemap-wazaif.xml',
    '/sitemap-prayer.xml',
    '/sitemap-calendar.xml',
    '/sitemap-allah-names.xml',
    '/sitemap-dreams.xml',
    '/sitemap-pages.xml'
];

$totalCount = 0;
$allUrls = [];

foreach ($sitemaps as $smPath) {
    $url = $baseUrl . $smPath;
    $content = @file_get_contents($url);
    if ($content) {
        $xml = simplexml_load_string($content);
        if ($xml) {
            if (isset($xml->sitemap)) {
                // it's an index, skip as we will list them manually or process them
                echo "$smPath is an index.\n";
            } else if (isset($xml->url)) {
                $count = count($xml->url);
                echo "$smPath : $count URLs\n";
                $totalCount += $count;
            }
        } else {
            echo "Failed to parse $smPath\n";
        }
    } else {
        echo "Failed to fetch $smPath\n";
    }
}
echo "Total URLs: $totalCount\n";
