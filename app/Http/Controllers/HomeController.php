<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteSetting;
use App\Models\City;
use App\Models\HijriDateCache;
use App\Models\PrayerTime;
use App\Models\SurahAyah;
use App\Models\AllahName;
use App\Models\KnowledgeArticle;
use App\Models\IslamicEvent;

class HomeController extends Controller
{
    public function index()
    {
        // Get the default city from settings, or fallback to first city
        $defaultCityId = SiteSetting::where('key', 'default_city_id')->value('value');
        $city = City::find($defaultCityId) ?? City::first();

        // Get Hijri Date for today
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();

        // Get Prayer times for today for the default city
        $prayerTimes = null;
        if ($city) {
            $prayerTimes = PrayerTime::where('city_id', $city->id)
                ->where('date', date('Y-m-d'))
                ->first();
        }

        // Fetch popular surahs (e.g. Yaseen, Rahman, Mulk, Kahf)
        $popularSurahs = \App\Models\Surah::whereIn('number', [36, 55, 67, 18])->get();

        $ayahOfDay = SurahAyah::inRandomOrder()->first();
        $allahNames = AllahName::all();
        $latestArticles = KnowledgeArticle::latest()->take(3)->get();
        $upcomingEvents = IslamicEvent::take(3)->get();

        return view('home', compact('city', 'hijriDate', 'prayerTimes', 'popularSurahs', 'ayahOfDay', 'allahNames', 'latestArticles', 'upcomingEvents'));
    }
}
