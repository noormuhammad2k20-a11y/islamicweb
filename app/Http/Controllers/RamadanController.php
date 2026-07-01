<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RamadanController extends Controller
{
    public function calendar()
    {
        return view('pages.ramadan.calendar');
    }

    public function timetable()
    {
        $timings = \App\Models\RamadanTiming::orderBy('day')->get();
        return view('pages.ramadan.timetable', compact('timings'));
    }

    public function duas()
    {
        return view('pages.ramadan.duas');
    }

    public function rules()
    {
        return view('pages.ramadan.rules');
    }

    public function faqs()
    {
        return view('pages.ramadan.faqs');
    }

    public function laylatulQadr()
    {
        return view('pages.ramadan.laylatul_qadr');
    }

    public function sehriToday()
    {
        return view('pages.placeholder', ['title' => 'sehriToday']);
    }

    public function iftarToday()
    {
        return view('pages.placeholder', ['title' => 'iftarToday']);
    }

}
