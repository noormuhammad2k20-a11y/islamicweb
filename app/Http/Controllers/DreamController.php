<?php

namespace App\Http\Controllers;

use App\Models\DreamSymbol;
use Illuminate\Http\Request;

class DreamController extends Controller
{
    public function index(Request $request)
    {
        $query = DreamSymbol::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('symbol_urdu', 'like', "%{$search}%")
                  ->orWhere('symbol_english', 'like', "%{$search}%")
                  ->orWhere('interpretation_urdu', 'like', "%{$search}%");
            });
        }

        if ($request->has('type')) {
            if ($request->type === 'good') $query->where('is_good_dream', 1);
            elseif ($request->type === 'bad') $query->where('is_good_dream', 0);
        }

        $symbols = $query->orderBy('symbol_urdu')->paginate(24);

        $seoMeta = (object) [
            'title' => 'خوابوں کی تعبیر – اسلامی خواب نامہ | NoorIslam',
            'meta_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اُڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
            'canonical_url' => url('/khwabon-ki-tabeer'),
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Islamic Dream Interpretation - Khwabon Ki Tabeer',
                'description' => 'Islamic dream interpretation based on Ibn Sirin',
                'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            ]),
        ];

        return view('pages.dreams.index', compact('symbols', 'seoMeta'));
    }

    public function show($slug)
    {
        $symbol = DreamSymbol::where('slug', $slug)->firstOrFail();

        // Increment search count
        $symbol->increment('search_count');

        // Related symbols
        $related = DreamSymbol::where('id', '!=', $symbol->id)
            ->where('is_good_dream', $symbol->is_good_dream)
            ->inRandomOrder()
            ->take(6)
            ->get();

        // Popular symbols
        $popular = DreamSymbol::popular()->take(10)->get();

        $seoMeta = (object) [
            'title' => $symbol->symbol_urdu . ' خواب میں دیکھنا – تعبیر | NoorIslam',
            'meta_description' => 'خواب میں ' . $symbol->symbol_urdu . ' دیکھنے کی اسلامی تعبیر — ' . \Illuminate\Support\Str::limit($symbol->interpretation_urdu, 120),
            'canonical_url' => url('/khwabon-ki-tabeer/' . $symbol->slug),
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'headline' => $symbol->symbol_english . ' - Islamic Dream Interpretation',
                'inLanguage' => ['ur', 'en'],
                'author' => ['@type' => 'Person', 'name' => $symbol->scholar_reference ?? 'Ibn Sirin'],
                'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            ]),
        ];

        return view('pages.dreams.show', compact('symbol', 'related', 'popular', 'seoMeta'));
    }
}
