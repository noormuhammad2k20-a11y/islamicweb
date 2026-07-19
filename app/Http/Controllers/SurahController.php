<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surah;
use App\Services\SurahSeoService;
use Illuminate\Support\Facades\Cache;

class SurahController extends Controller
{
    public function __construct(private SurahSeoService $seoService) {}

    public function index(Request $request)
    {
        $query = Surah::orderBy('number');

        // Search/filter functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhere('name_ur', 'like', "%{$search}%")
                  ->orWhere('number', $search);
            });
        }

        if ($request->has('filter') && in_array($request->filter, ['Makki', 'Madani'])) {
            $query->where('revelation_type', $request->filter);
        }

        if (!$request->has('search') && !$request->has('filter')) {
            $surahs = Cache::remember('surahs.index.list', now()->addHours(24), function () use ($query) {
                return $query->select([
                    'id', 'number', 'name_ar', 'name_en', 'name_ur',
                    'meaning_en', 'meaning_ur', 'total_ayahs',
                    'revelation_type', 'juz_start', 'slug',
                ])->get();
            });
        } else {
            $surahs = $query->get();
        }

        $seoData = $this->seoService->getIndexSeoData();
        // Since prompt mentions view('surahs.index'), I'll use the existing pages.surah.index
        return view('pages.surah.index', compact('surahs', 'seoData'));
    }

    public function show($slug)
    {
        try {
            if ($slug instanceof Surah) {
                $slug = $slug->slug;
            }
        
        $surah = Cache::remember("surah.show.{$slug}", now()->addHours(24), function () use ($slug) {
            return Surah::where('slug', $slug)
                ->with([
                    // Core content
                    'ayahs.englishTranslation',
                    'ayahs.urduTranslation',
                    'ayahs.tafsirs',
                    // New knowledge hub sections
                    'contentBlocks',
                    'faqs',
                    'themes',
                    'importantAyahs.ayah.englishTranslation',
                    'importantAyahs.ayah.urduTranslation',
                    'relatedSurahs.relatedSurah',
                    'entities',
                    'recitationGuides',
                    'learningPath',
                    // Existing relationships
                    'hadiths',
                    'wazaif',
                    'collections',
                    'seoMeta',
                    'reviews.scholar',
                    'fazilatEntries'
                ])
                ->firstOrFail();
        });

        // Assemble full arabic text from ayahs
        $surah->computed_arabic = $surah->ayahs->pluck('arabic_text')->implode(' ');

        $prevSurah = Cache::remember("surah.prev.{$surah->number}", now()->addDay(), fn() =>
            Surah::where('number', $surah->number - 1)
                ->select('number', 'name_en', 'name_ar', 'slug')->first()
        );

        $nextSurah = Cache::remember("surah.next.{$surah->number}", now()->addDay(), fn() =>
            Surah::where('number', $surah->number + 1)
                ->select('number', 'name_en', 'name_ar', 'slug')->first()
        );

        // Get popular/most-searched surahs for the related section
        $popularSlugs = [
            'al-fatihah', 'ya-sin', 'al-mulk', 'ar-rahman',
            'al-waqiah', 'al-kahf', 'al-baqarah', 'al-ikhlas'
        ];
        $popularSurahs = Cache::remember("surah.popular", now()->addDay(), fn() => 
            Surah::whereIn('slug', $popularSlugs)
                ->where('id', '!=', $surah->id)
                ->take(6)
                ->get()
        );

        // Generate Mushaf pages array based on start and end page
        $mushafPages = [];
        if ($surah->page_start && $surah->page_end) {
            for ($i = $surah->page_start; $i <= $surah->page_end; $i++) {
                $mushafPages[] = $i;
            }
        }

        $seoData   = $this->seoService->getSurahSeoData($surah);
        $schemaOrg = $this->seoService->buildSchema($surah);

        // Track page view
        if (class_exists(\App\Models\PageView::class) && method_exists(\App\Models\PageView::class, 'track')) {
            \App\Models\PageView::track(request()->path(), 'surah');
        }

        // Return pages.surah.show as that is what already exists, we will update it instead of surahs.show
        return view('pages.surah.show', compact(
            'surah', 'prevSurah', 'nextSurah', 'popularSurahs', 'mushafPages', 'seoData', 'schemaOrg'
        ));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Surah Error: ' . $e->getMessage());
            abort(404);
        }
    }

    public function collection(string $slug)
    {
        $collection = \App\Models\SurahCollection::where('slug', $slug)
            ->where('is_published', true)
            ->with('surahs:id,number,name_en,name_ar,slug,total_ayahs,revelation_type,juz_start')
            ->firstOrFail();

        return view('pages.surah.collection', compact('collection'));
    }
}
