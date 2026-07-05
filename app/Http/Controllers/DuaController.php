<?php
namespace App\Http\Controllers;

use App\Models\Dua;
use App\Models\DuaCategory;
use Illuminate\Http\Request;

class DuaController extends Controller
{
    // /duas — Category listing hub page
    public function index()
    {
        $categories = DuaCategory::whereNull('parent_id')
            ->with(['duas' => fn($q) => $q->limit(6), 'children'])
            ->withCount('duas')
            ->get();
        
        $featuredDuas = Dua::where('is_featured', 1)
            ->where('published_status', 1)
            ->with('categories')
            ->limit(8)->get();
        
        $totalDuas = Dua::where('published_status', 1)->count();
        
        $seo = [
            'title' => 'تمام دعائیں - All Islamic Duas in Urdu & Arabic | NoorIslam',
            'description' => 'Sone ki dua, namaz ki dua, shifa ki dua aur 95+ Islamic duain mukammal Arabic text, Urdu tarjuma, Roman Urdu aur hadith hawale ke sath. NoorIslam par tamam zaroorat ki duain.',
            'canonical' => config('app.url') . '/duas',
        ];
        
        return view('duas.index', compact('categories', 'featuredDuas', 'totalDuas', 'seo'));
    }

    // /duas/category/{slug} — Category page
    public function category(string $slug)
    {
        $category = DuaCategory::where('slug', $slug)
            ->orWhere('slug_urdu', $slug)
            ->with(['duas' => fn($q) => $q->where('published_status', 1)->orderBy('is_featured', 'desc'), 'parent', 'children'])
            ->firstOrFail();
        
        $duas = $category->duas()->where('published_status', 1)->paginate(20);
        
        $relatedCategories = DuaCategory::whereNull('parent_id')
            ->where('id', '!=', $category->id)->limit(6)->get();
        
        $seo = [
            'title' => $category->seo_title ?? $category->name_english . ' - ' . $category->name_urdu . ' | NoorIslam',
            'description' => $category->seo_description ?? 'NoorIslam par ' . $category->name_roman_urdu . ' ki tamam duain mukammal Arabic, Urdu tarjuma aur hadith reference ke sath parhen.',
            'canonical' => config('app.url') . '/duas/' . $category->slug,
        ];
        
        return view('duas.category', compact('category', 'duas', 'relatedCategories', 'seo'));
    }

    // Legacy URL redirect handler
    public function legacyShow(string $slug)
    {
        $dua = Dua::where('seo_slug', $slug)->firstOrFail();
        return redirect($dua->canonical_url, 301);
    }

    // /duas/{category}/{slug} — Individual Dua Page (MAIN SEO PAGE)
    public function show(string $category, string $slug)
    {
        $dua = Dua::where('seo_slug', $slug)
            ->where('published_status', 1)
            ->with(['categories', 'seoMeta', 'relatedDuas' => fn($q) => $q->limit(6)])
            ->firstOrFail();
        
        // SEO Protection: redirect if accessed via wrong category URL
        if (!$dua->categories->contains('slug', $category) && $category !== 'general') {
            return redirect($dua->canonical_url, 301);
        }
        
        $activeCategory = $dua->categories->firstWhere('slug', $category) ?? $dua->categories->first();
        
        // Get related duas from same category
        $relatedDuas = Dua::whereHas('categories', function($q) use ($dua) {
                $q->whereIn('dua_categories.id', $dua->categories->pluck('id'));
            })
            ->where('id', '!=', $dua->id)
            ->where('published_status', 1)
            ->limit(8)->get();
        
        // Prev / Next navigation
        $prevDua = Dua::where('id', '<', $dua->id)->where('published_status', 1)->orderBy('id','desc')->first();
        $nextDua = Dua::where('id', '>', $dua->id)->where('published_status', 1)->orderBy('id','asc')->first();
        
        $seo = [
            'title' => $dua->seo_title ?? $dua->meta_title ?? $dua->title_roman_urdu . ' - ' . $dua->title_urdu . ' | NoorIslam',
            'description' => $dua->meta_description ?? $dua->short_meaning,
            'canonical' => $dua->canonical_url,
            'schema_article' => $dua->generateSchema(),
            'schema_faq' => $dua->generateFaqSchema(),
            'schema_breadcrumb' => $this->generateBreadcrumb($dua),
        ];
        
        return view('duas.show', compact('dua', 'activeCategory', 'relatedDuas', 'prevDua', 'nextDua', 'seo'));
    }
    
    private function generateBreadcrumb(Dua $dua): array
    {
        $items = [
            ['name' => 'Home', 'url' => config('app.url')],
            ['name' => 'Duas', 'url' => config('app.url') . '/duas'],
        ];
        if ($dua->categories->first()) {
            $cat = $dua->categories->first();
            $items[] = ['name' => $cat->name_english, 'url' => config('app.url') . '/duas/' . $cat->slug];
        }
        $items[] = ['name' => $dua->title_english ?? $dua->title_roman_urdu, 'url' => $dua->canonical_url];
        
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($items)->map(function($item, $i) {
                return [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'name' => $item['name'],
                    'item' => $item['url'],
                ];
            })->toArray(),
        ];
    }
}
