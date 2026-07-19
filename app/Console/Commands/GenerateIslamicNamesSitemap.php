<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\IslamicName;

class GenerateIslamicNamesSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:islamic-names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML sitemaps for active Islamic names';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Only generate sitemap for ACTIVE names
        $names = IslamicName::select('slug', 'updated_at')
            ->orderBy('name_english')
            ->get();

        // Split into chunks (max 5,000 per sitemap file)
        $chunks = $names->chunk(5000);

        foreach ($chunks as $index => $chunk) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            foreach ($chunk as $name) {
                $xml .= '  <url>' . "\n";
                $xml .= '    <loc>https://noorislam.com/names/' . $name->slug . '</loc>' . "\n";
                $xml .= '    <changefreq>monthly</changefreq>' . "\n";
                $xml .= '    <priority>0.6</priority>' . "\n";
                $xml .= '  </url>' . "\n";
            }

            $xml .= '</urlset>';

            file_put_contents(
                public_path("sitemap-islamic-names-{$index}.xml"),
                $xml
            );
        }

        $this->info('Islamic Names sitemap generated! Active names: ' . $names->count());
    }
}
