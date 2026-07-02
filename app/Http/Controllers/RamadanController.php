<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\RamadanTiming;
use Carbon\Carbon;

class RamadanController extends Controller
{
    public function hub($year)
    {
        $cities = City::with('country')->orderBy('name')->get();
        return view('pages.ramadan.hub', compact('cities', 'year'));
    }

    public function city($year, City $city = null)
    {
        // Support the alternate URLs where $year is the city directly due to route definition
        if (!$city) {
            $city = City::where('slug', $year)->firstOrFail();
            $year = date('Y');
        }

        $timings = RamadanTiming::where('city_id', $city->id)
            ->where('hijri_year', $year)
            ->orderBy('day')
            ->get();

        $todayTiming = $timings->firstWhere('date', date('Y-m-d')) ?? $timings->first();

        $seoMeta = (object) [
            'title' => "Sehri & Iftar Time {$city->name} {$year} — Ramadan Timetable",
            'h1' => "{$city->name} Sehri & Iftar Timings {$year} — رمضان اوقات",
            'description' => "Complete Ramadan {$year} sehri and iftar timings for {$city->name}. Daily sehri time, iftar time, and full Ramadan calendar for {$city->name}.",
        ];

        return view('pages.ramadan.city', compact('city', 'year', 'timings', 'todayTiming', 'seoMeta'));
    }

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
