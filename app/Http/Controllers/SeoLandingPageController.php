<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SeoLandingPageController extends Controller
{
    // Default coordinates for Pakistan (Karachi)
    private float $defaultLat = 24.8607;
    private float $defaultLng = 67.0011;
    private string $defaultTz = 'Asia/Karachi';

    /**
     * URL: /prayer-times-today
     */
    public function prayerTimesToday(Request $request)
    {
        $date = Carbon::now($this->defaultTz);
        $prayers = $this->calcPrayers($this->defaultLat, $this->defaultLng, $this->defaultTz);
        $hijri = $this->toHijri($date);

        $seo = [
            'title' => "Prayer Times Today | Exact Namaz Timings {$date->format('d F Y')}",
            'description' => "Get accurate prayer times for today. Fajr: {$prayers['fajr']}, Dhuhr: {$prayers['dhuhr']}, Asr: {$prayers['asr']}, Maghrib: {$prayers['maghrib']}, Isha: {$prayers['isha']}. Updated daily.",
            'canonical' => url('/prayer-times-today'),
        ];

        return view('seo-pages.prayer-times-today', compact('prayers', 'date', 'hijri', 'seo'));
    }

    /**
     * URL: /sehri-time-today
     */
    public function sehriTimeToday(Request $request)
    {
        $date = Carbon::now($this->defaultTz);
        $prayers = $this->calcPrayers($this->defaultLat, $this->defaultLng, $this->defaultTz);
        $hijri = $this->toHijri($date);

        $seo = [
            'title' => "Sehri Time Today | Exact Suhoor End Time {$date->format('d F Y')}",
            'description' => "Today's exact Sehri time ends at {$prayers['fajr']}. Find accurate Suhoor timings, fasting rules, and intention (Niyyah) for fasting today.",
            'canonical' => url('/sehri-time-today'),
        ];

        return view('seo-pages.sehri-time-today', compact('prayers', 'date', 'hijri', 'seo'));
    }

    /**
     * URL: /iftar-time-today
     */
    public function iftarTimeToday(Request $request)
    {
        $date = Carbon::now($this->defaultTz);
        $prayers = $this->calcPrayers($this->defaultLat, $this->defaultLng, $this->defaultTz);
        $hijri = $this->toHijri($date);

        $seo = [
            'title' => "Iftar Time Today | Exact Fast Breaking Time {$date->format('d F Y')}",
            'description' => "Today's exact Iftar time begins at {$prayers['maghrib']}. Find accurate Maghrib timings, Iftar duas, and rules for breaking your fast today.",
            'canonical' => url('/iftar-time-today'),
        ];

        return view('seo-pages.iftar-time-today', compact('prayers', 'date', 'hijri', 'seo'));
    }

    /**
     * URL: /qibla-finder-online
     */
    public function qiblaFinderOnline(Request $request)
    {
        $seo = [
            'title' => "Qibla Finder Online | Exact Kaaba Direction Compass",
            'description' => "Find the exact Qibla direction online from anywhere in the world. Use our live compass tool to get the accurate Kaaba bearing instantly for your prayers.",
            'canonical' => url('/qibla-finder-online'),
        ];

        return view('seo-pages.qibla-finder-online', compact('seo'));
    }

    /**
     * URL: /islamic-date-today
     */
    public function islamicDateToday(Request $request)
    {
        $date = Carbon::now($this->defaultTz);
        $hijri = $this->toHijri($date);

        $seo = [
            'title' => "Islamic Date Today | Hijri Date {$hijri['day']} {$hijri['month_name']} {$hijri['year']}",
            'description' => "The Islamic date today is {$hijri['day']} {$hijri['month_name']} {$hijri['year']} AH. Convert Gregorian to Hijri, find current Islamic month events and accurate moon dates.",
            'canonical' => url('/islamic-date-today'),
        ];

        return view('seo-pages.islamic-date-today', compact('date', 'hijri', 'seo'));
    }

    /**
     * URL: /zakat-calculator-online
     */
    public function zakatCalculatorOnline(Request $request)
    {
        $seo = [
            'title' => "Zakat Calculator Online | Accurate Nisab & Payable Zakat",
            'description' => "Calculate your Zakat online accurately. Enter your gold, silver, cash, and liabilities to find your exact payable Zakat amount based on current Nisab values.",
            'canonical' => url('/zakat-calculator-online'),
        ];

        return view('seo-pages.zakat-calculator-online', compact('seo'));
    }

    // ── HELPERS ───────────────────────────────────────────

    private function calcPrayers($lat, $lng, $tz): array
    {
        $methodConst = defined('\IslamicNetwork\PrayerTimes\Method::METHOD_KARACHI') 
            ? constant('\IslamicNetwork\PrayerTimes\Method::METHOD_KARACHI') 
            : 1; // Karachi method fallback
            
        $schoolConst = defined('\IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_HANAFI')
            ? constant('\IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_HANAFI')
            : 1; // Hanafi fallback
        
        $pt = new \IslamicNetwork\PrayerTimes\PrayerTimes($methodConst, $schoolConst);
        $date = Carbon::now($tz);
        
        $times = $pt->getTimes($date, $lat, $lng, 0, \IslamicNetwork\PrayerTimes\PrayerTimes::LATITUDE_ADJUSTMENT_METHOD_ANGLE, null, \IslamicNetwork\PrayerTimes\PrayerTimes::TIME_FORMAT_24H);
        
        $toCarbon = function($t) use ($date, $tz) {
            if ($t === '-----' || empty($t)) return $date->copy();
            return Carbon::createFromFormat('Y-m-d H:i', $date->format('Y-m-d') . ' ' . $t, $tz);
        };

        $raw = (object) [
            'fajr' => $toCarbon($times['Fajr']),
            'sunrise' => $toCarbon($times['Sunrise']),
            'dhuhr' => $toCarbon($times['Dhuhr']),
            'asr' => $toCarbon($times['Asr']),
            'maghrib' => $toCarbon($times['Maghrib']),
            'isha' => $toCarbon($times['Isha']),
        ];

        $fmt = fn($c) => $c->format('h:i A');

        return [
            'fajr' => $fmt($raw->fajr),
            'sunrise' => $fmt($raw->sunrise),
            'dhuhr' => $fmt($raw->dhuhr),
            'asr' => $fmt($raw->asr),
            'maghrib' => $fmt($raw->maghrib),
            'isha' => $fmt($raw->isha),
        ];
    }

    private function toHijri(Carbon $date): array
    {
        $hijri = \GeniusTS\HijriDate\Hijri::convertToHijri($date);
        $m = (int) $hijri->month;
        return [
            'day' => (int) $hijri->day,
            'month' => $m,
            'year' => (int) $hijri->year,
            'month_name' => $hijri->format('F'),
            'month_urdu' => ['','محرم','صفر','ربیع الاول','ربیع الثانی','جمادی الاول','جمادی الثانی','رجب','شعبان','رمضان','شوال','ذوالقعدہ','ذوالحجہ'][$m]??''
        ];
    }
}
