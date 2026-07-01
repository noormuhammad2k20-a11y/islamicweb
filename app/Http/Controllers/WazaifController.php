<?php

namespace App\Http\Controllers;

use App\Models\Wazifa;
use Illuminate\Http\Request;

class WazaifController extends Controller
{
    public function index()
    {
        $wazaif = Wazifa::authentic()->orderBy('title_urdu')->get();

        // Group by purpose for category display
        $purposes = $wazaif->groupBy('purpose');

        $seoMeta = (object) [
            'title' => 'وظائف – مسنون وظائف قرآن و حدیث سے | NoorIslam',
            'meta_description' => 'قرآن و حدیث سے ثابت مسنون وظائف — رزق، شفا، شادی، امتحان، قرض اور ہر مشکل کے لیے مستند وظائف اور دعائیں۔',
            'canonical_url' => url('/wazaif'),
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Islamic Wazaif Collection',
                'description' => 'Authentic Islamic Wazaif from Quran and Hadith',
                'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            ]),
        ];

        return view('pages.wazaif.index', compact('wazaif', 'purposes', 'seoMeta'));
    }

    public function show($slug)
    {
        $wazifa = Wazifa::where('slug', $slug)->firstOrFail();

        // Related wazaif (same purpose)
        $related = Wazifa::where('purpose', $wazifa->purpose)
            ->where('id', '!=', $wazifa->id)
            ->take(4)
            ->get();

        $seoMeta = (object) [
            'title' => $wazifa->title_urdu . ' – ' . $wazifa->title_english . ' | NoorIslam',
            'meta_description' => 'مستند وظیفہ: ' . $wazifa->title_urdu . ' — ' . \Illuminate\Support\Str::limit(strip_tags($wazifa->urdu_text), 120),
            'canonical_url' => url('/wazaif/' . $wazifa->slug),
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'headline' => $wazifa->title_english,
                'inLanguage' => ['ar', 'ur'],
                'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            ]),
        ];

        return view('pages.wazaif.show', compact('wazifa', 'related', 'seoMeta'));
    }
}
