<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuaCategory;
use App\Models\Dua;
use Illuminate\Support\Facades\Cache;

class DuaController extends Controller
{
    private function applySearch($query, $searchTerm)
    {
        return $query->where(function($q) use ($searchTerm) {
            $q->where('title_english', 'like', '%' . $searchTerm . '%')
              ->orWhere('title_urdu', 'like', '%' . $searchTerm . '%')
              ->orWhere('title_roman_urdu', 'like', '%' . $searchTerm . '%')
              ->orWhere('translation', 'like', '%' . $searchTerm . '%')
              ->orWhere('arabic_text', 'like', '%' . $searchTerm . '%')
              ->orWhere('tags', 'like', '%' . $searchTerm . '%')
              ->orWhere('synonyms', 'like', '%' . $searchTerm . '%')
              ->orWhere('search_keywords', 'like', '%' . $searchTerm . '%');
        });
    }

    public function index(Request $request)
    {
        $categories = Cache::remember('dua_categories_all', 3600, function () {
            return DuaCategory::whereNull('parent_id')->get();
        });

        $activeCategory = DuaCategory::where('slug', 'morning-azkar')->first();
        if (!$activeCategory) {
            $activeCategory = $categories->first();
        }

        $duasQuery = $activeCategory ? $activeCategory->duas()->where('published_status', true) : Dua::where('published_status', true);

        if ($request->has('search') && !empty($request->search)) {
            $duasQuery = $this->applySearch($duasQuery, $request->search);
        }

        // Paginate for performance if dataset is large (user asked for 5k-10k duas)
        $duas = $duasQuery->paginate(50);
        
        if ($activeCategory) {
            $activeCategory->setRelation('duas', $duas);
        }

        if ($request->ajax()) {
            return view('pages.duas.partials.dua_list', compact('activeCategory', 'duas'))->render();
        }

        return view('pages.duas.hub', compact('categories', 'activeCategory', 'duas'));
    }

    public function category(Request $request, $slug)
    {
        $categories = Cache::remember('dua_categories_all', 3600, function () {
            return DuaCategory::whereNull('parent_id')->get();
        });

        $activeCategory = DuaCategory::where('slug', $slug)->firstOrFail();

        $duasQuery = $activeCategory->duas()->where('published_status', true);

        if ($request->has('search') && !empty($request->search)) {
            $duasQuery = $this->applySearch($duasQuery, $request->search);
        }

        $duas = $duasQuery->paginate(50);
        $activeCategory->setRelation('duas', $duas);

        if ($request->ajax()) {
            return view('pages.duas.partials.dua_list', compact('activeCategory', 'duas'))->render();
        }

        return view('pages.duas.hub', compact('categories', 'activeCategory', 'duas'));
    }

    public function show($category_slug, $seo_slug)
    {
        $category = DuaCategory::where('slug', $category_slug)->firstOrFail();
        
        $dua = Cache::remember("dua_show_{$seo_slug}", 3600, function () use ($seo_slug, $category) {
            return Dua::with(['relatedDuas', 'relatedArticles', 'wazaif'])
                ->where('seo_slug', $seo_slug)
                ->whereHas('categories', function($q) use ($category) {
                    $q->where('dua_categories.id', $category->id);
                })
                ->firstOrFail();
        });

        // SEO Strategy: Fetch 4 to 6 related duas from the same category or explicitly related ones
        if ($dua->relatedDuas->isNotEmpty()) {
            $relatedDuas = $dua->relatedDuas->take(6);
        } else {
            $relatedDuas = Cache::remember("dua_related_{$dua->id}", 3600, function () use ($category, $dua) {
                return Dua::whereHas('categories', function($q) use ($category) {
                        $q->where('dua_categories.id', $category->id);
                    })
                    ->where('id', '!=', $dua->id)
                    ->where('published_status', true)
                    ->inRandomOrder()
                    ->limit(6)
                    ->get();
            });
        }
        
        // Navigation: Previous & Next
        $previousDua = Dua::whereHas('categories', function($q) use ($category) {
                $q->where('dua_categories.id', $category->id);
            })
            ->where('id', '<', $dua->id)
            ->where('published_status', true)
            ->orderBy('id', 'desc')
            ->first();

        $nextDua = Dua::whereHas('categories', function($q) use ($category) {
                $q->where('dua_categories.id', $category->id);
            })
            ->where('id', '>', $dua->id)
            ->where('published_status', true)
            ->orderBy('id', 'asc')
            ->first();

        // FAQs Generation
        $faqs = $dua->faqs;
        if (empty($faqs)) {
            $faqs = [];
            
            $contentType = $dua->content_type ?? 'Prophetic Dua';
            $title = $dua->title_english ?? $dua->title_urdu ?? 'this';
            
            if ($contentType === 'Hadith') {
                $faqs[] = [
                    'question' => "Which Hadith collection contains \"{$title}\"?",
                    'answer' => "This narration is from " . ($dua->reference_source ?? $dua->book_name ?? 'authentic sources') . ($dua->hadith_number ? ", Hadith #" . $dua->hadith_number : "") . "."
                ];
                $faqs[] = [
                    'question' => "Is this Hadith authentic?",
                    'answer' => "Its authentication grade is: " . ($dua->authenticity ?? 'Not specified in this record') . ". " . ($dua->authenticity_notes ?? '')
                ];
                if ($dua->narrator) {
                    $faqs[] = [
                        'question' => "Who narrated this Hadith?",
                        'answer' => "It was narrated by " . $dua->narrator . "."
                    ];
                }
            } else {
                $faqs[] = [
                    'question' => "What is the purpose of \"{$title}\"?",
                    'answer' => $dua->short_meaning ?? "This is a supplication categorized under {$category->name_english}."
                ];
                $faqs[] = [
                    'question' => "When should I recite this Dua?",
                    'answer' => $dua->when_to_read ?? $dua->best_time ?? "You can recite this " . ($dua->occasion ?? "regularly as part of your daily supplications.")
                ];
                if ($dua->authenticity) {
                    $faqs[] = [
                        'question' => "Is the source of this Dua authentic?",
                        'answer' => "Yes, it is referenced from " . ($dua->reference_source ?? 'authentic texts') . " and is graded as " . $dua->authenticity . "."
                    ];
                }
            }
        }

        return view('pages.duas.show', compact('category', 'dua', 'relatedDuas', 'previousDua', 'nextDua', 'faqs'));
    }
}
