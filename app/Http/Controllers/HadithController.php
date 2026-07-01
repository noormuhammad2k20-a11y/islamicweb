<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HadithTopic;

class HadithController extends Controller
{
    public function index()
    {
        $topics = HadithTopic::all();
        return view('pages.hadith.index', compact('topics'));
    }

    public function show(HadithTopic $topic)
    {
        return view('pages.hadith.show', compact('topic'));
    }

    public function hadithShow(HadithTopic $topic, $hadithSlug)
    {
        $hadith = \App\Models\Hadith::where('slug', $hadithSlug)->where('topic_id', $topic->id)->firstOrFail();
        return view('pages.hadith.hadith_show', compact('topic', 'hadith'));
    }
}
