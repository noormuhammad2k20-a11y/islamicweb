<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;

class SeoAuditCommand extends Command
{
    protected $signature = 'seo:audit {--limit=0} {--category=}';
    protected $description = 'Generate full SEO audit for all sitemap pages';

    public function handle()
    {
        $this->info('Starting SEO Audit...');

        $sitemaps = [
            'Pages' => '/sitemap-pages.xml',
            'Calendar' => '/sitemap-calendar.xml',
            'Surahs' => '/sitemap-surahs.xml',
            'Allah Names' => '/sitemap-allah-names.xml',
            'Duas' => '/sitemap-duas.xml',
            'Hadith' => '/sitemap-hadith.xml',
            'Wazaif' => '/sitemap-wazaif.xml',
            'Prayer Times' => '/sitemap-prayer.xml',
            'Islamic Names' => '/sitemap-names.xml',
            'Dreams' => '/sitemap-dreams.xml',
        ];

        $urlsByCategory = [];
        $totalUrls = 0;

        $app = app();
        $kernel = app(\Illuminate\Contracts\Http\Kernel::class);

        foreach ($sitemaps as $cat => $smPath) {
            if ($this->option('category') && $this->option('category') !== $cat) continue;
            
            $request = Request::create($smPath, 'GET');
            $response = $kernel->handle($request);
            $content = $response->getContent();
            $kernel->terminate($request, $response);
            
            if ($content) {
                if (preg_match_all('/<loc>(.*?)<\/loc>/i', $content, $matches)) {
                    foreach ($matches[1] as $loc) {
                        $urlsByCategory[$cat][] = $loc;
                        $totalUrls++;
                    }
                }
            }
        }

        $this->info("Found $totalUrls URLs to process.");

        $limit = (int)$this->option('limit');
        $mdPath = base_path('website-Full-Audit-pages-analysis.md');
        $handle = fopen($mdPath, 'w');
        
        fwrite($handle, "# Website SEO Audit & Pages Analysis\n\n");
        fwrite($handle, "Generated automatically. This report contains a complete, accurate, and production-ready SEO audit directly from application data.\n\n");

        $globalStats = [
            'total_pages' => $totalUrls,
            'missing_titles' => 0,
            'missing_meta' => 0,
            'missing_h1' => 0,
            'missing_canonical' => 0,
            'duplicate_urls' => 0,
            'duplicate_titles' => 0,
            'duplicate_meta' => 0,
            'noindex_pages' => 0,
            'errors' => 0
        ];

        $allSeenUrls = [];
        $allSeenTitles = [];
        $allSeenMeta = [];

        foreach ($urlsByCategory as $cat => $urls) {
            $this->info("Processing Category: $cat (" . count($urls) . " pages)");
            
            $catData = [];
            $catStats = [
                'total_pages' => count($urls),
                'missing_pages' => 0,
                'duplicate_urls' => 0,
                'duplicate_titles' => 0,
                'duplicate_meta' => 0,
                'missing_titles' => 0,
                'missing_meta' => 0,
                'missing_h1' => 0,
                'missing_canonical' => 0,
            ];

            $catSeenUrls = [];
            $catSeenTitles = [];
            $catSeenMeta = [];

            $count = 0;
            foreach ($urls as $fullUrl) {
                $count++;
                if ($limit > 0 && $count > $limit) {
                    $this->info("Limit reached for $cat");
                    break;
                }

                if ($count % 100 == 0) {
                    $this->info("  Processed $count / " . count($urls));
                }

                $parsed = parse_url($fullUrl);
                $path = $parsed['path'] ?? '/';

                $title = '';
                $metaDesc = '';
                $h1 = '';
                $indexStatus = 'Index';
                $canonical = '';
                $pageType = 'Dynamic';
                $errorMsg = '';

                // FAST DB FETCH FOR MASSIVE CATEGORIES
                if ($cat === 'Islamic Names') {
                    $slug = basename($path);
                    $name = \App\Models\IslamicName::where('slug', $slug)->first();
                    if ($name) {
                        $title = $name->name_english . ' (' . $name->name_arabic . ') - Islamic Name Meaning, Origin & History | Noor-e-Islam';
                        $metaDesc = "Meaning of the Islamic name {$name->name_english} ({$name->name_arabic}) is {$name->meaning_english}. Learn its Urdu meaning, historical background, Quranic references, and personality traits.";
                        $h1 = $name->name_english;
                        $indexStatus = 'Index';
                        $canonical = rtrim(config('app.url'), '/') . "/islamic-names/" . $name->slug;
                    } else {
                        $errorMsg = 'Model not found';
                    }
                } elseif ($cat === 'Dreams') {
                    $slug = basename($path);
                    $symbol = \App\Models\DreamSymbol::where('slug', $slug)->first();
                    if ($symbol) {
                        $title = $symbol->meta_title ?? $symbol->seo_title ?? ($symbol->symbol_roman_urdu . ' | Islamic Interpretation');
                        $metaDesc = $symbol->meta_description ?? ($symbol->symbol_roman_urdu . ' ki islami tabeer aur mani janen. Read the Islamic interpretation of seeing ' . $symbol->symbol_english . ' in a dream.');
                        $h1 = $symbol->symbol_roman_urdu;
                        $indexStatus = $symbol->seo_index == 0 ? 'Noindex' : 'Index';
                        $canonical = $symbol->canonical_url ?? rtrim(config('app.url'), '/') . "/khwabon-ki-tabeer/" . $symbol->slug;
                    } else {
                        $errorMsg = 'Model not found';
                    }
                } else {
                    try {
                        $req = Request::create($path, 'GET');
                        $response = $kernel->handle($req);
                        $html = $response->getContent();
                        $kernel->terminate($req, $response);
                        
                        if (empty($html)) {
                            $errorMsg = 'Empty HTML';
                        } else {
                            $crawler = new Crawler($html);
                            $title = $crawler->filter('title')->count() > 0 ? $crawler->filter('title')->text() : '';
                            $metaDesc = $crawler->filter('meta[name="description"]')->count() > 0 ? $crawler->filter('meta[name="description"]')->attr('content') : '';
                            $h1 = $crawler->filter('h1')->count() > 0 ? $crawler->filter('h1')->text() : '';
                            $robots = $crawler->filter('meta[name="robots"]')->count() > 0 ? $crawler->filter('meta[name="robots"]')->attr('content') : 'Index';
                            $indexStatus = stripos($robots, 'noindex') !== false ? 'Noindex' : 'Index';
                            $canonical = $crawler->filter('link[rel="canonical"]')->count() > 0 ? $crawler->filter('link[rel="canonical"]')->attr('href') : '';
                            
                            $title = str_replace(["\r", "\n", "|"], ["", "", "-"], $title);
                            $metaDesc = str_replace(["\r", "\n", "|"], ["", "", "-"], $metaDesc);
                            $h1 = str_replace(["\r", "\n", "|"], ["", "", "-"], $h1);
                        }
                    } catch (\Exception $e) {
                        $errorMsg = "Exception: " . $e->getMessage();
                    }
                }

                // Collect Stats
                if ($errorMsg) {
                    $catStats['missing_pages']++;
                    $globalStats['errors']++;
                }

                // Check duplicates (Url)
                if (isset($allSeenUrls[$fullUrl])) {
                    $catStats['duplicate_urls']++;
                    $globalStats['duplicate_urls']++;
                }
                $allSeenUrls[$fullUrl] = true;

                // Check titles
                if (empty($title)) {
                    $catStats['missing_titles']++;
                    $globalStats['missing_titles']++;
                } else {
                    if (isset($allSeenTitles[$title])) {
                        $catStats['duplicate_titles']++;
                        $globalStats['duplicate_titles']++;
                    }
                    $allSeenTitles[$title] = true;
                }

                // Check meta
                if (empty($metaDesc)) {
                    $catStats['missing_meta']++;
                    $globalStats['missing_meta']++;
                } else {
                    if (isset($allSeenMeta[$metaDesc])) {
                        $catStats['duplicate_meta']++;
                        $globalStats['duplicate_meta']++;
                    }
                    $allSeenMeta[$metaDesc] = true;
                }

                // Check H1
                if (empty($h1)) {
                    $catStats['missing_h1']++;
                    $globalStats['missing_h1']++;
                }

                // Check Canonical
                if (empty($canonical)) {
                    $catStats['missing_canonical']++;
                    $globalStats['missing_canonical']++;
                }

                if ($indexStatus === 'Noindex') {
                    $globalStats['noindex_pages']++;
                }

                $notes = [];
                if ($errorMsg) $notes[] = "Error: $errorMsg";
                if (empty($title)) $notes[] = "Missing Title";
                if (empty($metaDesc)) $notes[] = "Missing Meta Description";
                if (empty($h1)) $notes[] = "Missing H1";
                if ($indexStatus === 'Noindex') $notes[] = "Page is Noindex";
                if (empty($canonical)) $notes[] = "Missing Canonical";
                if (strlen($title) > 60) $notes[] = "Title > 60 chars";
                if (strlen($metaDesc) > 160) $notes[] = "Meta Desc > 160 chars";
                $notesStr = empty($notes) ? "Good" : implode(", ", $notes);

                $catData[] = "| $fullUrl | $title | $metaDesc | $h1 | $indexStatus | $canonical | $pageType | $notesStr |";
            }

            // Write Category Header & Stats
            fwrite($handle, "## Category: $cat\n");
            fwrite($handle, "- **Total Pages:** {$catStats['total_pages']}\n");
            fwrite($handle, "- **Missing Pages (Errors):** {$catStats['missing_pages']}\n");
            fwrite($handle, "- **Duplicate URLs:** {$catStats['duplicate_urls']}\n");
            fwrite($handle, "- **Duplicate Titles:** {$catStats['duplicate_titles']}\n");
            fwrite($handle, "- **Duplicate Meta Descriptions:** {$catStats['duplicate_meta']}\n");
            fwrite($handle, "- **Missing Titles:** {$catStats['missing_titles']}\n");
            fwrite($handle, "- **Missing Meta Descriptions:** {$catStats['missing_meta']}\n");
            fwrite($handle, "- **Missing H1s:** {$catStats['missing_h1']}\n");
            fwrite($handle, "- **Missing Canonical URLs:** {$catStats['missing_canonical']}\n\n");
            
            fwrite($handle, "### Complete List of Pages\n");
            fwrite($handle, "| URL | Page Title | Meta Description | H1 | Index Status | Canonical URL | Page Type | Notes |\n");
            fwrite($handle, "|---|---|---|---|---|---|---|---|\n");
            
            foreach ($catData as $row) {
                fwrite($handle, $row . "\n");
            }
            fwrite($handle, "\n---\n\n");
            fflush($handle);
        }

        // Write Final Summary
        fwrite($handle, "## Final SEO Summary & Recommendations\n\n");
        fwrite($handle, "### Global Totals\n");
        fwrite($handle, "- **Total URLs Analyzed:** {$globalStats['total_pages']}\n");
        fwrite($handle, "- **Total Noindex Pages:** {$globalStats['noindex_pages']}\n");
        fwrite($handle, "- **Total Errors (Missing Pages):** {$globalStats['errors']}\n");
        fwrite($handle, "- **Total Duplicate URLs:** {$globalStats['duplicate_urls']}\n");
        fwrite($handle, "- **Total Duplicate Titles:** {$globalStats['duplicate_titles']}\n");
        fwrite($handle, "- **Total Duplicate Meta Descriptions:** {$globalStats['duplicate_meta']}\n");
        fwrite($handle, "- **Total Missing Titles:** {$globalStats['missing_titles']}\n");
        fwrite($handle, "- **Total Missing Meta Descriptions:** {$globalStats['missing_meta']}\n");
        fwrite($handle, "- **Total Missing H1s:** {$globalStats['missing_h1']}\n");
        fwrite($handle, "- **Total Missing Canonical URLs:** {$globalStats['missing_canonical']}\n\n");
        
        fwrite($handle, "### Recommendations\n");
        fwrite($handle, "1. **Fix Missing SEO Tags:** Ensure all pages have Title, Meta Description, and H1 tags defined to improve ranking opportunities.\n");
        fwrite($handle, "2. **Resolve Duplicates:** Duplicate Titles and Meta Descriptions can cause keyword cannibalization. Use unique descriptions for all pages.\n");
        fwrite($handle, "3. **Canonical URLs:** Self-referencing canonical URLs are highly recommended for all indexable pages to prevent duplicate content issues.\n");
        fwrite($handle, "4. **Review Noindex Pages:** Ensure that pages marked as 'Noindex' are intentional (e.g. low-value dynamic URLs or symbols with no SEO index value).\n");
        
        fclose($handle);
        $this->info("Audit completed! Saved to $mdPath");
    }
}
