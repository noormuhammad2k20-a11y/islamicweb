<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\PrayerTime;

class PrayerTimesController extends Controller
{
    public function hub()
    {
        $cities = City::get();
        return view('pages.prayer-times.hub', compact('cities'));
    }

    public function city(City $city)
    {
        $city->load('seoMeta');
        $seoMeta = $city->seoMeta;

        $prayerTimes = \Illuminate\Support\Facades\Cache::remember('prayer_times_' . $city->id . '_' . date('Y-m-d'), 3600, function() use ($city) {
            return PrayerTime::where('city_id', $city->id)
                ->where('date', '>=', date('Y-m-d'))
                ->orderBy('date', 'asc')
                ->limit(30)
                ->get();
        });
            
        return view('pages.prayer-times.city', compact('city', 'prayerTimes', 'seoMeta'));
    }

    public function today()
    {
        return view('pages.placeholder', ['title' => 'Prayer Times Today']);
    }
}
