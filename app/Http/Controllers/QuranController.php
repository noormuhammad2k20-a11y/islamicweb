<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuranController extends Controller
{
    public function index()
    {
        return view('pages.quran.index');
    }

    public function reading()
    {
        return view('pages.quran.reading');
    }

    public function translation()
    {
        return view('pages.quran.translation');
    }

    public function tafsir()
    {
        return view('pages.quran.tafsir');
    }

    public function search()
    {
        return view('pages.quran.search');
    }

    public function audio()
    {
        return view('pages.quran.audio');
    }

    public function juz($id)
    {
        return view('pages.quran.juz');
    }

}
