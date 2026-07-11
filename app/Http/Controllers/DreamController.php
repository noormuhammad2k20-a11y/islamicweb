<?php
namespace App\Http\Controllers;
use App\Models\DreamSymbol;
use App\Models\DreamCategory;
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

        // Load new sections for the Hub page if no search query
        $categories = DreamCategory::withCount('dreamSymbols')->get();
        $trendingDreams = DreamSymbol::where('published_status', 1)->orderBy('search_count', 'desc')->take(8)->get();
        $recentDreams = DreamSymbol::where('published_status', 1)->orderBy('created_at', 'desc')->take(8)->get();

        $seoMeta = (object) [
            'title' => 'خوابوں کی تعبیر - Islamic Dream Interpretation | NoorIslam',
            'meta_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
            'canonical_url' => url('/khwabon-ki-tabeer'),
            'og_title' => 'خوابوں کی تعبیر – اسلامی خواب نامہ | NoorIslam',
            'og_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
            'twitter_title' => 'خوابوں کی تعبیر – اسلامی خواب نامہ | NoorIslam',
            'twitter_description' => 'خوابوں کی اسلامی تعبیر ابن سیرین کے مطابق — پانی، سانپ، اڑنا، مسجد اور سینکڑوں خوابوں کی مستند تعبیر۔',
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Islamic Dream Interpretation - Khwabon Ki Tabeer',
                'description' => 'Islamic dream interpretation based on Ibn Sirin',
                'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            ]),
        ];

        return view('pages.dreams.index', compact('symbols', 'categories', 'trendingDreams', 'recentDreams', 'seoMeta'));
    }

    public function show($slug)
    {
        // Check if slug belongs to a category first
        $category = DreamCategory::where('slug', $slug)->first();
        if ($category) {
            return $this->showCategory(request(), $slug);
        }

        $symbol = DreamSymbol::where('slug', $slug)->where('published_status', 1)->first();

        if (!$symbol) {
            $symbol = DreamSymbol::where('old_english_slug', $slug)->where('published_status', 1)->firstOrFail();
            return redirect()->route('dreams.show', $symbol->slug, 301);
        }

        // Increment search count
        $symbol->increment('search_count');

        // Related symbols (fallback to random if none set)
        $related = \Illuminate\Support\Facades\Cache::remember('dream_related_' . $symbol->id, 3600, function() use ($symbol) {
            return $symbol->similarDreams()->count() > 0 
                ? $symbol->similarDreams()->take(6)->get() 
                : DreamSymbol::where('id', '!=', $symbol->id)
                    ->where('category_id', $symbol->category_id)
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
            'headline' => $symbol->symbol_urdu . ' - Islamic Dream Interpretation',
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'خوابوں کی تعبیر', 'item' => url('/khwabon-ki-tabeer')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $symbol->symbol_urdu, 'item' => url()->current()]
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
            'title' => $symbol->meta_title ?? $symbol->seo_title ?? ($symbol->symbol_roman_urdu . ' | Islamic Interpretation'),
            'meta_description' => $symbol->meta_description ?? ($symbol->symbol_roman_urdu . ' ki islami tabeer aur mani janen. Read the Islamic interpretation of seeing ' . $symbol->symbol_english . ' in a dream.'),
            'canonical_url' => $symbol->canonical_url ?? url('/khwabon-ki-tabeer/' . $symbol->slug),
            'og_title' => $symbol->og_title ?? $symbol->seo_title ?? ($symbol->symbol_roman_urdu . ' | Islamic Interpretation'),
            'og_description' => $symbol->og_description ?? $symbol->meta_description ?? ($symbol->symbol_roman_urdu . ' ki islami tabeer.'),
            'og_image' => $symbol->og_image ?? url('/images/default-dream-og.jpg'),
            'twitter_title' => $symbol->twitter_title ?? $symbol->seo_title ?? ($symbol->symbol_roman_urdu . ' | Islamic Interpretation'),
            'twitter_description' => $symbol->twitter_description ?? $symbol->meta_description ?? ($symbol->symbol_roman_urdu . ' ki islami tabeer.'),
            'twitter_image' => $symbol->twitter_image ?? url('/images/default-dream-og.jpg'),
            'schema_override_json' => json_encode($schemaGraph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ];

        return view('pages.dreams.show', compact('symbol', 'related', 'opposite', 'popular', 'recent', 'seoMeta'));
    }

    public function showCategory(Request $request, $slug)
    {
        $category = DreamCategory::where('slug', $slug)->firstOrFail();
        
        $query = DreamSymbol::where('category_id', $category->id)->where('published_status', 1);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            // Support searching by specific letter or full text
            if (mb_strlen($search) === 1) {
                $query->where('symbol_urdu', 'like', $search . '%');
            } else {
                $query->where(function($q) use ($search) {
                    $q->where('symbol_urdu', 'like', '%' . $search . '%')
                      ->orWhere('symbol_english', 'like', '%' . $search . '%')
                      ->orWhere('symbol_roman_urdu', 'like', '%' . $search . '%');
                });
            }
        }

        $symbols = $query->orderBy('symbol_urdu')->paginate(48);

        // Mega Hub Data (only load if not searching to save resources)
        $popularDreams = collect();
        $recentDreams = collect();
        $featuredDreams = collect();
        $relatedCategories = collect();

        if (!$request->has('search')) {
            $popularDreams = DreamSymbol::where('category_id', $category->id)->where('published_status', 1)->orderByDesc('search_count')->take(4)->get();
            $recentDreams = DreamSymbol::where('category_id', $category->id)->where('published_status', 1)->orderByDesc('created_at')->take(4)->get();
            $featuredDreams = DreamSymbol::where('category_id', $category->id)->where('published_status', 1)->inRandomOrder()->take(4)->get();
            $relatedCategories = DreamCategory::where('id', '!=', $category->id)->inRandomOrder()->take(6)->get();
        }

        $category->loadCount('dreamSymbols');

        $seoMeta = (object) [
            'title' => $category->name_english . ' Dreams | Khawab Ki Tabeer',
            'meta_description' => $category->description ?? $category->name_english . ' se mutaliq khwabon ki islami tabeer aur mani.',
            'canonical_url' => url('/khwabon-ki-tabeer/' . $category->slug),
        ];

        return view('pages.dreams.category', compact('category', 'symbols', 'seoMeta', 'popularDreams', 'recentDreams', 'featuredDreams', 'relatedCategories'));
    }
}
