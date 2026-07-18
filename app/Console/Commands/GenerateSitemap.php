<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Surah;
use App\Models\IslamicName;
use App\Models\Dua;
use App\Models\Hadith;
use App\Models\Wazifa;
use App\Models\DreamSymbol;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemaps.';

    public function handle()
    {
        $this->info('Generating sitemaps...');

        // Sitemap Index
        SitemapIndex::create()
            ->add('/sitemap-surahs.xml')
            ->add('/sitemap-duas.xml')
            ->add('/sitemap-hadiths.xml')
            ->add('/sitemap-names.xml')
            ->add('/sitemap-dreams.xml')
            ->add('/sitemap-wazaif.xml')
            ->writeToFile(public_path('sitemap.xml'));
            
        $this->info('Generated sitemap.xml index');

        // Surahs
        $surahsSitemap = Sitemap::create();
        foreach (Surah::all() as $s) {
            $surahsSitemap->add(Url::create("/surah/{$s->slug}")->setPriority(0.9));
        }
        $surahsSitemap->writeToFile(public_path('sitemap-surahs.xml'));
        $this->info('Generated sitemap-surahs.xml');

        // Islamic Names
        $namesSitemap = Sitemap::create();
        IslamicName::chunk(1000, function($names) use ($namesSitemap) {
            foreach ($names as $n) {
                if ($n->slug) {
                    $namesSitemap->add(Url::create("/islamic-names/{$n->slug}")->setPriority(0.7));
                }
            }
        });
        $namesSitemap->writeToFile(public_path('sitemap-names.xml'));
        $this->info('Generated sitemap-names.xml');

        // Duas
        $duasSitemap = Sitemap::create();
        Dua::chunk(1000, function($duas) use ($duasSitemap) {
            foreach ($duas as $d) {
                if ($d->slug) {
                    $duasSitemap->add(Url::create("/dua/{$d->slug}")->setPriority(0.8));
                }
            }
        });
        $duasSitemap->writeToFile(public_path('sitemap-duas.xml'));
        $this->info('Generated sitemap-duas.xml');

        // Hadiths
        $hadithsSitemap = Sitemap::create();
        Hadith::chunk(1000, function($hadiths) use ($hadithsSitemap) {
            foreach ($hadiths as $h) {
                // Assuming URL structure for hadith, modify if different
                $hadithsSitemap->add(Url::create("/hadith/{$h->id}")->setPriority(0.6));
            }
        });
        $hadithsSitemap->writeToFile(public_path('sitemap-hadiths.xml'));
        $this->info('Generated sitemap-hadiths.xml');
        
        // Wazaif
        $wazaifSitemap = Sitemap::create();
        Wazifa::chunk(1000, function($wazaif) use ($wazaifSitemap) {
            foreach ($wazaif as $w) {
                if ($w->slug) {
                    $wazaifSitemap->add(Url::create("/wazaif/{$w->slug}")->setPriority(0.7));
                }
            }
        });
        $wazaifSitemap->writeToFile(public_path('sitemap-wazaif.xml'));
        $this->info('Generated sitemap-wazaif.xml');

        // Dream Symbols
        $dreamsSitemap = Sitemap::create();
        DreamSymbol::chunk(1000, function($dreams) use ($dreamsSitemap) {
            foreach ($dreams as $d) {
                if ($d->slug) {
                    $dreamsSitemap->add(Url::create("/dreams/{$d->slug}")->setPriority(0.6));
                }
            }
        });
        $dreamsSitemap->writeToFile(public_path('sitemap-dreams.xml'));
        $this->info('Generated sitemap-dreams.xml');

        $this->info('All sitemaps generated successfully.');
    }
}
