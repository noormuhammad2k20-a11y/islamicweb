<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dua;
use App\Models\DuaCategory;

class GenerateDuasSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:duas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates sitemap for duas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Base /duas hub
        $xml .= '  <url>' . PHP_EOL;
        $xml .= '    <loc>' . config('app.url') . '/duas</loc>' . PHP_EOL;
        $xml .= '    <lastmod>' . now()->toDateString() . '</lastmod>' . PHP_EOL;
        $xml .= '    <changefreq>weekly</changefreq>' . PHP_EOL;
        $xml .= '    <priority>0.9</priority>' . PHP_EOL;
        $xml .= '  </url>' . PHP_EOL;

        // Categories
        $categories = DuaCategory::all();
        foreach ($categories as $cat) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . config('app.url') . '/duas/category/' . $cat->slug . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . ($cat->updated_at ? $cat->updated_at->toDateString() : now()->toDateString()) . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>weekly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.9</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        // Duas
        $duas = Dua::where('published_status', 1)->get();
        foreach ($duas as $dua) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . config('app.url') . '/dua/' . $dua->seo_slug . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . ($dua->updated_at ? $dua->updated_at->toDateString() : now()->toDateString()) . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>monthly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.8</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        file_put_contents(public_path('sitemap-duas.xml'), $xml);

        $this->info('Sitemap generated successfully at public/sitemap-duas.xml');
    }
}
