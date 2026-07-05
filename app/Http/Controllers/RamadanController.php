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

        // Dynamic Ramadan calculation instead of empty DB queries
        $lat = $city->latitude ?? $city->lat ?? 31.5204;
        $lng = $city->longitude ?? $city->lng ?? 74.3587;
        $tz = $city->timezone ?? 'Asia/Karachi';
        
        $method = 'Karachi';
        $madhab = 'hanafi';
        
        // Find Ramadan Start in the given Gregorian year
        $start = Carbon::create($year, 1, 1, 12, 0, 0, $tz);
        $end = Carbon::create($year, 12, 31, 12, 0, 0, $tz);
        $ramadanStart = null;
        while($start <= $end) {
            $hijri = \GeniusTS\HijriDate\Hijri::convertToHijri($start);
            if ($hijri->month == 9) {
                $ramadanStart = $start->copy();
                break;
            }
            $start->addDay();
        }
        
        if (!$ramadanStart) {
            $ramadanStart = Carbon::create($year, 2, 18, 12, 0, 0, $tz); // Fallback
        }

        $methodConst = \IslamicNetwork\PrayerTimes\Method::METHOD_KARACHI;
        $schoolConst = \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_HANAFI;
        $pt = new \IslamicNetwork\PrayerTimes\PrayerTimes($methodConst, $schoolConst);
        
        $fmt = function($t) {
            if ($t === '-----' || empty($t)) return '--:--';
            return Carbon::createFromFormat('H:i', $t)->format('h:i A');
        };

        $timings = [];
        $current = $ramadanStart->copy();
        for ($d=1; $d<=30; $d++) { 
            $hijri = \GeniusTS\HijriDate\Hijri::convertToHijri($current);
            if ($hijri->month != 9) break; // If Shawwal starts, stop
            
            $times = $pt->getTimes($current, $lat, $lng, 0, \IslamicNetwork\PrayerTimes\PrayerTimes::LATITUDE_ADJUSTMENT_METHOD_ANGLE, null, \IslamicNetwork\PrayerTimes\PrayerTimes::TIME_FORMAT_24H);

            $timings[] = (object) [
                'day' => $d,
                'date' => $current->format('Y-m-d'),
                'sehri_time' => $fmt($times['Fajr']),
                'iftar_time' => $fmt($times['Maghrib']),
            ];
            $current->addDay();
        }
        
        $timings = collect($timings);
        $todayTiming = $timings->firstWhere('date', date('Y-m-d', time())) ?? $timings->first();

        $seoMeta = (object) [
            'title' => "Sehri & Iftar Time {$city->name} {$year} — Ramadan Timetable",
            'h1' => "{$city->name} Sehri & Iftar Timings {$year} — رمضان اوقات",
            'description' => "Complete Ramadan {$year} sehri and iftar timings for {$city->name}. Daily sehri time, iftar time, and full Ramadan calendar for {$city->name}.",
        ];

        return view('pages.ramadan.city', compact('city', 'year', 'timings', 'todayTiming', 'seoMeta', 'tz'));
    }

    public function calendar()
    {
        return view('pages.ramadan.calendar');
    }

    public function timetable()
    {
        $timings = \App\Models\RamadanTiming::orderBy('date')->get();
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
