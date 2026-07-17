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
            'total_topics'      => $topics->count(),
            'total_hadiths'     => \App\Models\Hadith::count(),
            'total_collections' => $collections->whereNotNull('hadiths_count')->where('hadiths_count', '>', 0)->count(),
            'total_narrators'   => \App\Models\HadithNarrator::count(),
        ];
        
        return view('hadith.index', compact('topics', 'collections', 'narrators', 'stats'));
    }

    public function show(Request $request, $slug)
    {
        $topic = HadithTopic::where('slug', $slug)->firstOrFail();

        // Eager load hadiths via pivot with collection and narrator
        $query = $topic->hadiths()->with(['collectionModel', 'narratorModel']);
        
        if ($request->has('grade') && $request->grade != '') {
            $query->where('sahih_grade', $request->grade);
        }
        
        if ($request->has('narrator') && $request->narrator != '') {
            $query->where('narrator_id', $request->narrator);
        }
        
        if ($request->has('collection') && $request->collection != '') {
            $query->where('collection_id', $request->collection);
        }

        $hadiths = $query->paginate(10)->withQueryString();
        
        $relatedTopics = HadithTopic::whereHas('hadiths')
                        ->where('id', '!=', $topic->id)
                        ->inRandomOrder()->limit(6)->get();
                        
        $topicBooks = \App\Models\HadithCollection::whereHas('hadiths.topics', function($q) use ($topic) {
            $q->where('hadith_topics.id', $topic->id);
        })->get();

        $topicNarrators = \App\Models\HadithNarrator::whereHas('hadiths.topics', function($q) use ($topic) {
            $q->where('hadith_topics.id', $topic->id);
        })->orderBy('name_en')->get();
        
        $authenticSourcesCount = \Illuminate\Support\Facades\DB::table('hadith_hadith_topic as hht')
            ->join('hadiths as h', 'hht.hadith_id', '=', 'h.id')
            ->where('hht.hadith_topic_id', $topic->id)
            ->whereNotNull('h.collection_id')
            ->distinct('h.collection_id')
            ->count('h.collection_id');
            
        $totalHadithsCount = \Illuminate\Support\Facades\DB::table('hadith_hadith_topic')
            ->where('hadith_topic_id', $topic->id)
            ->count();
            
        $stats = [
            'total_hadiths' => $totalHadithsCount,
            'authentic_sources' => array_fill(0, $authenticSourcesCount, 1) // View expects count($stats['authentic_sources'])
        ];

        // SEO and Schema Markup
        $canonicalUrl = config('app.url') . '/hadith/' . $topic->slug;
        $faqSchema = [];
        if ($topic->faqs) {
            $faqs = json_decode($topic->faqs, true);
            if (is_array($faqs)) {
                foreach ($faqs as $faq) {
                    $faqSchema[] = [
                        '@type' => 'Question',
                        'name' => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer']
                        ]
                    ];
                }
            }
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'FAQPage', 
                    'mainEntity' => $faqSchema
                ],
                [
                    '@type' => 'BreadcrumbList', 
                    'itemListElement' => [
                        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => config('app.url')],
                        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Hadith Topics', 'item' => config('app.url').'/hadith'],
                        ['@type' => 'ListItem', 'position' => 3, 'name' => $topic->topic_name, 'item' => config('app.url').'/hadith/'.$topic->slug],
                    ]
                ],
            ]
        ];

        return view('hadith.show', compact('topic', 'hadiths', 'relatedTopics', 'topicBooks', 'topicNarrators', 'canonicalUrl', 'schema', 'stats'));
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
