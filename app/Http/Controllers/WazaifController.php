<?php

namespace App\Http\Controllers;

use App\Models\Wazifa;
use Illuminate\Http\Request;

class WazaifController extends Controller
{
    public function index(Request $request)
    {
        $query = Wazifa::with('categories')->authentic();

        // Advanced Filters
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category)
                  ->orWhere('name_english', $request->category);
            });
        }
        
        if ($request->filled('type')) {
            if ($request->type === 'quranic') {
                $query->quranic();
            } elseif ($request->type === 'hadith') {
                $query->hadith();
            }
        }
        
        if ($request->filled('time')) {
            $query->where('best_time', 'like', '%' . $request->time . '%')
                  ->orWhere('frequency', 'like', '%' . $request->time . '%');
        }

        if ($request->filled('difficulty')) {
            $query->where('difficulty_level', $request->difficulty);
        }

        // Apply Sorting
        $sort = $request->get('sort', 'title_urdu');
        if ($sort === 'popular') {
            $query->orderByDesc('views_count');
        } elseif ($sort === 'newest') {
            $query->latest();
        } else {
            $query->orderBy('title_urdu');
        }

        $wazaif = $query->paginate(24)->withQueryString();

        // Fetch all categories for the filter sidebar/dropdown
        $categories = \App\Models\WazifaCategory::orderBy('name_english')->get();

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

        return view('pages.wazaif.index', compact('wazaif', 'categories', 'seoMeta'));
    }

    public function show($slug)
    {
        $wazifa = Wazifa::with(['categories', 'surahs', 'hadiths', 'duas'])->where('slug', $slug)->firstOrFail();
        
        // Increment view count
        $wazifa->increment('views_count');

        // Related wazaif (same categories)
        $categoryIds = $wazifa->categories->pluck('id');
        $related = Wazifa::whereHas('categories', function($q) use ($categoryIds) {
                $q->whereIn('wazifa_categories.id', $categoryIds);
            })
            ->where('id', '!=', $wazifa->id)
            ->inRandomOrder()
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
