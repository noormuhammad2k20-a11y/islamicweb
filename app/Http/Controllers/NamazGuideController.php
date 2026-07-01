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

    public function show($prayer)
    {
        $guide = NamazGuide::where('title', 'like', "%{$prayer}%")->firstOrFail();
        return view('pages.namaz.show', compact('guide'));
    }
}