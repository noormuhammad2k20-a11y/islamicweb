<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KnowledgeCategory;

class IslamicKnowledgeController extends Controller
{
    public function index()
    {
        $categories = KnowledgeCategory::all();
        return view('pages.knowledge.index', compact('categories'));
    }

    public function pillarsIslam() { return view('pages.knowledge.pillars_islam'); }
    public function pillarsIman() { return view('pages.knowledge.pillars_iman'); }
    public function namesOfAllah() { return view('pages.knowledge.names_allah'); }
    public function prophets() { return view('pages.knowledge.prophets'); }
    public function history() { return view('pages.knowledge.history'); }
    public function facts() 
    { 
        $facts = \App\Models\KnowledgeArticle::where('category', 'facts')->orWhere('category', 'like', '%fact%')->latest()->get();
        return view('pages.knowledge.facts', compact('facts')); 
    }
}