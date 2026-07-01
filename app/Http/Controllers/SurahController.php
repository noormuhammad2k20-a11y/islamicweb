<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surah;

class SurahController extends Controller
{
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
            $query->where('revelation_place', $request->filter);
        }

        $surahs = $query->get();

        return view('pages.surah.index', compact('surahs'));
    }

    public function show(Surah $surah)
    {
        $surah->load(['ayahs', 'reviews.scholar', 'seoMeta', 'fazilatEntries']);
        $seoMeta = $surah->seoMeta;

        // Get previous and next surahs for navigation
        $prevSurah = Surah::where('number', $surah->number - 1)->first();
        $nextSurah = Surah::where('number', $surah->number + 1)->first();

        // Get popular/most-searched surahs for the related section
        $popularSlugs = [
            'al-fatihah', 'ya-sin', 'al-mulk', 'ar-rahman',
            'al-waqiah', 'al-kahf', 'al-baqarah', 'al-ikhlas'
        ];
        $popularSurahs = Surah::whereIn('slug', $popularSlugs)
            ->where('id', '!=', $surah->id)
            ->take(6)
            ->get();

        // Generate Mushaf pages array based on start and end page
        $mushafPages = [];
        if ($surah->start_page && $surah->end_page) {
            for ($i = $surah->start_page; $i <= $surah->end_page; $i++) {
                $mushafPages[] = $i;
            }
        }

        return view('pages.surah.show', compact('surah', 'seoMeta', 'prevSurah', 'nextSurah', 'popularSurahs', 'mushafPages'));
    }
}
