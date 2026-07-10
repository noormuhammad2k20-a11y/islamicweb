<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HadithTopic;

class HadithController extends Controller
{
    public function index()
    {
        $topics = HadithTopic::withCount('hadiths')->orderBy('topic_name')->get();
        return view('hadith.index', compact('topics'));
    }

    public function show(HadithTopic $topic)
    {
        $hadiths = $topic->hadiths()->orderBy('id')->paginate(10);
        $otherTopics = HadithTopic::where('id', '!=', $topic->id)
                        ->inRandomOrder()->limit(6)->get();
        return view('hadith.show', compact('topic', 'hadiths', 'otherTopics'));
    }

    public function hadithShow(HadithTopic $topic, $hadithSlug)
    {
        $hadith = \App\Models\Hadith::where('slug', $hadithSlug)->where('topic_id', $topic->id)->firstOrFail();
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
        $bookName = $this->getBookName($collection);
        $hadiths = \App\Models\Hadith::where('book_name', $bookName)->paginate(20);
        
        if ($hadiths->isEmpty()) {
            abort(404);
        }
        
        return view('pages.hadith.collection_show', compact('collection', 'bookName', 'hadiths'));
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
