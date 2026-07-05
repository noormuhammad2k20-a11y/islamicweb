<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamazGuide;

class NamazGuideController extends Controller
{
    public function index()
    {
        $guides = NamazGuide::all();
        return view('pages.namaz.index', compact('guides'));
    }

    public function salah()
    {
        $guides = NamazGuide::all();
        return view('pages.namaz.salah', compact('guides'));
    }

    public function salatUlTasbeeh()
    {
        $seoMeta = (object) [
            'title' => 'Salat ul Tasbeeh Method, Benefits & Duas | Complete Step-by-Step Guide',
            'description' => 'Learn the exact method of praying Salat-ul-Tasbeeh. Discover the virtues, the required tasbeeh, common mistakes, and step-by-step instructions.',
        ];
        
        return view('pages.namaz.salat_tasbeeh', compact('seoMeta'));
    }

    public function show($prayer)
    {
        $guide = NamazGuide::where('title', 'like', "%{$prayer}%")->firstOrFail();
        return view('pages.namaz.show', compact('guide'));
    }
}