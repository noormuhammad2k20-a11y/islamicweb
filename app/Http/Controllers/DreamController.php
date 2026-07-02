<?php
namespace App\Http\Controllers;
use App\Models\DreamSymbol;
use Illuminate\Http\Request;
class DreamController extends Controller
{
    public function index(Request $request)
    {
        $query = DreamSymbol::where('published_status', 1);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereFullText(['symbol_urdu', 'symbol_english', 'symbol_arabic', 'symbol_roman_urdu', 'search_keywords'], $search);
        }

        if ($request->has('type')) {
            if ($request->type === 'good') $query->good();
            elseif ($request->type === 'bad') $query->bad();
            elseif ($request->type === 'warning') $query->warning();
            elseif ($request->type === 'neutral') $query->neutral();
        }

        // Cache the paginated results for 60 minutes based on search and type parameters
        $cacheKey = 'dreams_index_' . md5($request->search . '_' . $request->type . '_' . $request->get('page', 1));
        
        $symbols = \Illuminate\Support\Facades\Cache::remember($cacheKey, 3600, function () use ($query) {
            return $query->orderBy('symbol_urdu')->paginate(48);
        });

        $seoMeta = (object) [
            'title' => 'خوابوں کی تعبیر – اسلامی خواب نامہ | NoorIslam',
            'meta_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اُڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
            'canonical_url' => url('/khwabon-ki-tabeer'),
            'og_title' => 'خوابوں کی تعبیر – اسلامی خواب نامہ | NoorIslam',
            'og_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اُڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
            'twitter_title' => 'خوابوں کی تعبیر – اسلامی خواب نامہ | NoorIslam',
            'twitter_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اُڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
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
        $symbol = DreamSymbol::where('slug', $slug)->where('published_status', 1)->firstOrFail();

        // Increment search count
        $symbol->increment('search_count');

        // Related symbols (fallback to random if none set)
        $related = \Illuminate\Support\Facades\Cache::remember('dream_related_' . $symbol->id, 3600, function() use ($symbol) {
            return $symbol->similarDreams()->count() > 0 
                ? $symbol->similarDreams()->take(6)->get() 
                : DreamSymbol::where('id', '!=', $symbol->id)
                    ->where(function($q) use ($symbol) {
                        $q->where('dream_type', $symbol->dream_type)
                          ->orWhere('is_good_dream', $symbol->is_good_dream);
                    })
                    ->inRandomOrder()
                    ->take(6)
                    ->get();
        });
                
        // Opposite symbols
        $opposite = \Illuminate\Support\Facades\Cache::remember('dream_opposite_' . $symbol->id, 3600, function() use ($symbol) {
            return $symbol->oppositeDreams()->take(6)->get();
        });

        // Popular symbols
        $popular = \Illuminate\Support\Facades\Cache::remember('dreams_popular', 3600, function() {
            return DreamSymbol::popular()->take(10)->get();
        });
        
        // Recent symbols
        $recent = \Illuminate\Support\Facades\Cache::remember('dreams_recent', 3600, function() {
            return DreamSymbol::recent()->take(6)->get();
        });

        // Generate JSON-LD Graph
        $schemas = [];
        
        // 1. Article Schema
        $schemas[] = [
            '@type' => 'Article',
            'headline' => $symbol->symbol_english . ' - Islamic Dream Interpretation',
            'inLanguage' => ['ur', 'en', 'ar'],
            'author' => ['@type' => 'Person', 'name' => $symbol->scholar_reference ?? 'Classical Islamic Scholars'],
            'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'keywords' => $symbol->keywords ? implode(', ', $symbol->keywords) : '',
        ];
        
        // 2. Breadcrumb Schema
        $schemas[] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Khwabon Ki Tabeer', 'item' => url('/khwabon-ki-tabeer')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $symbol->symbol_english, 'item' => url()->current()]
            ]
        ];
        
        // 3. FAQ Schema if exists
        if ($symbol->faqs && is_array($symbol->faqs) && count($symbol->faqs) > 0) {
            $faqItems = [];
            foreach ($symbol->faqs as $faq) {
                if (isset($faq['question']) && isset($faq['answer'])) {
                    $faqItems[] = [
                        '@type' => 'Question',
                        'name' => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer']
                        ]
                    ];
                }
            }
            if (count($faqItems) > 0) {
                $schemas[] = [
                    '@type' => 'FAQPage',
                    'mainEntity' => $faqItems
                ];
            }
        }

        $schemaGraph = [
            '@context' => 'https://schema.org',
            '@graph' => $schemas
        ];

        $seoMeta = (object) [
            'title' => $symbol->meta_title ?? $symbol->seo_title ?? ($symbol->symbol_english . ' Dream Meaning | خواب میں ' . $symbol->symbol_urdu . ' دیکھنا | NoorIslam'),
            'meta_description' => $symbol->meta_description ?? ('Islamic interpretation of seeing ' . $symbol->symbol_english . ' (' . $symbol->symbol_urdu . ') in a dream according to Ibn Sirin. Learn the authentic meaning.'),
            'canonical_url' => $symbol->canonical_url ?? url('/khwabon-ki-tabeer/' . $symbol->slug),
            'og_title' => $symbol->og_title ?? $symbol->seo_title ?? ($symbol->symbol_english . ' Dream Meaning in Islam'),
            'og_description' => $symbol->og_description ?? $symbol->meta_description ?? ('Find out the authentic Islamic meaning of ' . $symbol->symbol_english . ' in a dream.'),
            'og_image' => $symbol->og_image ?? url('/images/default-dream-og.jpg'),
            'twitter_title' => $symbol->twitter_title ?? $symbol->seo_title ?? ($symbol->symbol_english . ' Dream Interpretation'),
            'twitter_description' => $symbol->twitter_description ?? $symbol->meta_description ?? ('Find out the authentic Islamic meaning of ' . $symbol->symbol_english . ' in a dream.'),
            'twitter_image' => $symbol->twitter_image ?? url('/images/default-dream-og.jpg'),
            'schema_override_json' => json_encode($schemaGraph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ];

        return view('pages.dreams.show', compact('symbol', 'related', 'opposite', 'popular', 'recent', 'seoMeta'));
    }
}
