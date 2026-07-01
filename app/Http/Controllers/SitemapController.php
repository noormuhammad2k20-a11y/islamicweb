<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use App\Models\City;
use App\Models\HadithTopic;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function dates()
    {
        $countries = \App\Models\Country::all();
        return response()->view('sitemap.dates', ['countries' => $countries])->header('Content-Type', 'text/xml');
    }

    public function prayer()
    {
        $cities = City::limit(200)->get();
        return response()->view('sitemap.prayer', ['cities' => $cities])->header('Content-Type', 'text/xml');
    }

    public function surah()
    {
        $surahs = Surah::all();
        return response()->view('sitemap.surah', ['surahs' => $surahs])->header('Content-Type', 'text/xml');
    }

    public function hadith()
    {
        $topics = HadithTopic::all();
        return response()->view('sitemap.hadith', ['topics' => $topics])->header('Content-Type', 'text/xml');
    }

    public function pages()
    {
        return response()->view('sitemap.pages')->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /filament/\n";
        $content .= "Disallow: /api/\n";
        $content .= "Disallow: /storage/\n";
        $content .= "Disallow: /ajax/\n";
        $content .= "Sitemap: " . url('sitemap_index.xml') . "\n";

        return response($content)->header('Content-Type', 'text/plain');
    }

    public function duas()
    {
        $categories = \App\Models\DuaCategory::all();
        $duas = \App\Models\Dua::all();
        return response()->view('sitemap.duas', ['categories' => $categories, 'duas' => $duas])->header('Content-Type', 'text/xml');
    }

    public function names()
    {
        $names = \App\Models\IslamicName::all();
        return response()->view('sitemap.names', ['names' => $names])->header('Content-Type', 'text/xml');
    }

    public function wazaif()
    {
        $wazaif = \App\Models\Wazifa::all();
        return response()->view('sitemap.wazaif', ['wazaif' => $wazaif])->header('Content-Type', 'text/xml');
    }

    public function dreams()
    {
        $symbols = \App\Models\DreamSymbol::all();
        return response()->view('sitemap.dreams', ['symbols' => $symbols])->header('Content-Type', 'text/xml');
    }
}
