<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HadithTopic;

class HadithController extends Controller
{
    public function index()
    {
        $topics = HadithTopic::withCount('hadiths')->orderBy('topic_name')->get();
        $collections = \App\Models\HadithCollection::withCount('hadiths')->get();
        $narrators = \App\Models\HadithNarrator::withCount('hadiths')->orderByDesc('hadiths_count')->limit(12)->get();
        
        $stats = [
            'topics' => $topics->count(),
            'hadiths' => \App\Models\Hadith::count(),
            'books' => $collections->count(),
            'narrators' => $narrators->count() > 0 ? $narrators->count() : \App\Models\Hadith::distinct('narrator')->count('narrator'),
        ];
        
        return view('hadith.index', compact('topics', 'collections', 'narrators', 'stats'));
    }

    public function show(Request $request, HadithTopic $topic)
    {
        $query = $topic->hadiths();
        
        if ($request->has('grade') && $request->grade != '') {
            $query->where('grade', 'LIKE', '%' . $request->grade . '%');
        }
        
        if ($request->has('narrator') && $request->narrator != '') {
            $query->where('narrator', 'LIKE', '%' . $request->narrator . '%');
        }
        
        if ($request->has('book') && $request->book != '') {
            $query->where('book_name', 'LIKE', '%' . $request->book . '%');
        }

        $hadiths = $query->orderBy('id')->paginate(10)->withQueryString();
        
        $otherTopics = HadithTopic::where('id', '!=', $topic->id)
                        ->inRandomOrder()->limit(6)->get();
                        
        // Extract unique narrators and books for the filters
        $topicNarrators = $topic->hadiths()->select('narrator')->distinct()->whereNotNull('narrator')->pluck('narrator');
        $topicBooks = $topic->hadiths()->select('book_name')->distinct()->whereNotNull('book_name')->pluck('book_name');

        return view('hadith.show', compact('topic', 'hadiths', 'otherTopics', 'topicNarrators', 'topicBooks'));
    }

    public function hadithShow(HadithTopic $topic, $hadithSlug)
    {
        $hadith = $topic->hadiths()->where('slug', $hadithSlug)->firstOrFail();
        return view('pages.hadith.hadith_show', compact('topic', 'hadith'));
    }

    private function getBookName($collection) {
        $map = [
            'sahih-bukhari' => 'Sahih Bukhari',
            'sahih-muslim' => 'Sahih Muslim',
            'sunan-abu-dawud' => 'Sunan Abu Dawud',
            'jami-at-tirmidhi' => 'Jami at-Tirmidhi',
            'sunan-an-nasai' => 'Sunan an-Nasai',
            'sunan-ibn-majah' => 'Sunan Ibn Majah',
        ];
        return $map[$collection] ?? ucwords(str_replace('-', ' ', $collection));
    }

    public function collectionShow($collection)
    {
        $collectionModel = \App\Models\HadithCollection::where('slug', $collection)->firstOrFail();
        $bookName = $collectionModel->name_en;
        $hadiths = $collectionModel->hadiths()->paginate(20);
        
        return view('pages.hadith.collection_show', compact('collectionModel', 'bookName', 'hadiths'));
    }

    public function narratorShow(\App\Models\HadithNarrator $narrator)
    {
        $hadiths = $narrator->hadiths()->paginate(20);
        return view('pages.hadith.narrator_show', compact('narrator', 'hadiths'));
    }

    public function collectionHadithShow($collection, $chapter, $number)
    {
        $bookName = $this->getBookName($collection);
        $hadith = \App\Models\Hadith::where('book_name', $bookName)
                    ->where(function($query) use ($number) {
                        $query->where('hadith_number', $number)
                              ->orWhere('reference', 'LIKE', '% ' . $number);
                    })
                    ->firstOrFail();
                    
        return view('pages.hadith.collection_hadith_show', compact('collection', 'bookName', 'hadith', 'chapter', 'number'));
    }
}
