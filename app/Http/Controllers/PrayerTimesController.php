<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use IslamicNetwork\PrayerTimes\PrayerTimes;
use IslamicNetwork\PrayerTimes\Method;
use App\Models\{City, WorldCity, CityPrayerContent, PrayerPageContent};
use Illuminate\Support\Facades\Cache;

class PrayerTimesController extends Controller
{
    // ── Country Hub ───────────────────────────────────────
    public function countryHub(string $country)
    {
        $countryMap = [
            'pakistan' => ['code'=>'PK','name'=>'Pakistan','tz'=>'Asia/Karachi'],
            'uae' => ['code'=>'AE','name'=>'UAE','tz'=>'Asia/Dubai'],
            'saudi-arabia' => ['code'=>'SA','name'=>'Saudi Arabia','tz'=>'Asia/Riyadh'],
            'india' => ['code'=>'IN','name'=>'India','tz'=>'Asia/Kolkata'],
            'usa' => ['code'=>'US','name'=>'USA','tz'=>'America/New_York'],
        ];

        abort_if(!isset($countryMap[$country]), 404);
        $info = $countryMap[$country];

        // Get all cities for this country
        if ($info['code'] === 'PK') {
            $cities = City::orderBy('name')->get();
        } else {
            $cities = WorldCity::where('country_code', $info['code'])
                ->orderByDesc('is_featured')
                ->orderBy('name')->get();
        }

        // Top 6 city prayer times
        $topCities = $cities->take(6);
        $topPrayers = [];

        foreach ($topCities as $city) {
            $lat = $city->latitude ?? $city->lat;
            $lng = $city->longitude ?? $city->lng;
            $tz = $city->timezone ?? $info['tz'];
            $topPrayers[$city->name] = $this->calcPrayers($lat, $lng, $tz);
        }

        $seoData = $this->countryHubSeo($info, $country);

        return view('prayer-times.country', compact('country','info','cities','topPrayers','seoData'));
    }

    // ── City Page (Pakistan + World) ──────────────────────
    public function cityPage(string $citySlug, Request $request)
    {
        $madhab = $request->get('madhab','hanafi');
        $method = $request->get('method','Karachi');

        // Find city — first in PK cities, then world
        $city = City::where('slug', $citySlug)->first() ?? WorldCity::where('slug', $citySlug)->firstOrFail();
        $lat = $city->latitude ?? $city->lat;
        $lng = $city->longitude ?? $city->lng;
        $tz = $city->timezone ?? 'Asia/Karachi';
        $name = $city->name;
        $country = $city->country ?? 'Pakistan';

        // Add caching logic
        $cacheKey = "prayers_{$citySlug}_{$madhab}_{$method}_".now($tz)->format('Ymd');
        $prayers = Cache::remember($cacheKey, 3600, fn()=>$this->calcPrayers($lat, $lng, $tz, $madhab, $method));

        $sunnah = $this->calcSunnah($prayers['raw']);
        $qibla = $this->calcQibla($lat, $lng);
        $hijri = $this->toHijri(Carbon::now($tz));

        $monthlyKey = "monthly_{$citySlug}_{$madhab}_".now($tz)->format('Ym');
        $monthly = Cache::remember($monthlyKey, 86400, fn()=>$this->buildMonthly($lat, $lng, $tz, $madhab, $method));

        $next = $this->getNextPrayer($prayers, $tz);
        $tomorrow = $this->buildTomorrow($lat, $lng, $tz, $madhab, $method);

        // City content from DB
        $contentKey = "city_content_{$citySlug}";
        $content = Cache::rememberForever($contentKey, fn()=>CityPrayerContent::where('city_slug',$citySlug)->first());

        // Nearby cities
        $nearbyCities = $this->getNearby($city, $citySlug);
        $seoData = $this->citySeo($name, $country, $citySlug, $prayers, $hijri, $tz);

        return view('prayer-times.city', compact(
            'city','name','country','citySlug','madhab','method',
            'prayers','sunnah','qibla','hijri','monthly',
            'next','tomorrow','content','nearbyCities','seoData','tz'
        ));
    }

    // ── Prayer-Specific Page ──────────────────────────────
    public function prayerPage(string $citySlug, string $prayerName)
    {
        $validPrayers = ['fajr','zuhr','asr','maghrib','isha'];
        abort_if(!in_array($prayerName, $validPrayers), 404);

        $city = City::where('slug', $citySlug)->first() ?? WorldCity::where('slug', $citySlug)->firstOrFail();
        $lat = $city->latitude ?? $city->lat;
        $lng = $city->longitude ?? $city->lng;
        $tz = $city->timezone ?? 'Asia/Karachi';
        $name = $city->name;

        // Caching
        $cacheKey = "prayers_{$citySlug}_hanafi_Karachi_".now($tz)->format('Ymd');
        $prayers = Cache::remember($cacheKey, 3600, fn()=>$this->calcPrayers($lat, $lng, $tz));

        $prayerContent = PrayerPageContent::where('city_slug',$citySlug)->where('prayer_name',$prayerName)->first();
        
        $monthlyKey = "monthly_{$citySlug}_hanafi_".now($tz)->format('Ym');
        $monthly = Cache::remember($monthlyKey, 86400, fn()=>$this->buildMonthly($lat, $lng, $tz));

        $seoData = $this->prayerSeo($name, $prayerName, $prayers, $tz);

        return view('prayer-times.prayer', compact(
            'city','name','citySlug','prayerName','prayers',
            'prayerContent','monthly','seoData','tz'
        ));
    }

    // ── HELPERS ───────────────────────────────────────────
    private function calcPrayers($lat,$lng,$tz,$madhab='hanafi',$method='Karachi'): array
    {
        $methodConst = defined('\IslamicNetwork\PrayerTimes\Method::METHOD_' . strtoupper($method)) 
            ? constant('\IslamicNetwork\PrayerTimes\Method::METHOD_' . strtoupper($method)) 
            : \IslamicNetwork\PrayerTimes\Method::METHOD_KARACHI;
            
        $schoolConst = $madhab === 'hanafi' ? \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_HANAFI : \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_STANDARD;
        
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
            'midnight' => $toCarbon($times['Midnight']),
            'lastthird' => $toCarbon($times['Lastthird']),
        ];

        if ($raw->midnight->lt($raw->isha)) $raw->midnight->addDay();
        if ($raw->lastthird->lt($raw->isha)) $raw->lastthird->addDay();

        $fmt = fn($c) => $c->format('h:i A');
        $fmt24 = fn($c) => $c->format('H:i');

        return [
            'fajr' => $fmt($raw->fajr), 'fajr_24' => $fmt24($raw->fajr),
            'sunrise' => $fmt($raw->sunrise), 'sunrise_24' => $fmt24($raw->sunrise),
            'dhuhr' => $fmt($raw->dhuhr), 'dhuhr_24' => $fmt24($raw->dhuhr),
            'asr' => $fmt($raw->asr), 'asr_24' => $fmt24($raw->asr),
            'maghrib' => $fmt($raw->maghrib), 'maghrib_24' => $fmt24($raw->maghrib),
            'isha' => $fmt($raw->isha), 'isha_24' => $fmt24($raw->isha),
            'raw' => $raw,
            'date' => $date,
        ];
    }

    private function calcSunnah($raw): array
    {
        return [
            'middle_night' => clone $raw->midnight,
            'last_third' => clone $raw->lastthird,
        ];
    }

    private function calcQibla($lat,$lng): float
    {
        $mLat = deg2rad(21.422487);
        $mLng = deg2rad(39.826206);
        $lat = deg2rad($lat);
        $lng = deg2rad($lng);

        $x = sin($mLng - $lng);
        $y = cos($lat) * tan($mLat) - sin($lat) * cos($mLng - $lng);
        $qibla = rad2deg(atan2($x, $y));
        return fmod($qibla + 360, 360);
    }

    private function buildMonthly($lat,$lng,$tz,$madhab='hanafi',$method='Karachi'): array
    {
        $now = Carbon::now($tz);
        $days = $now->daysInMonth;
        $rows = [];
        
        $methodConst = defined('\IslamicNetwork\PrayerTimes\Method::METHOD_' . strtoupper($method)) 
            ? constant('\IslamicNetwork\PrayerTimes\Method::METHOD_' . strtoupper($method)) 
            : \IslamicNetwork\PrayerTimes\Method::METHOD_KARACHI;
        $schoolConst = $madhab === 'hanafi' ? \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_HANAFI : \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_STANDARD;
        $pt = new \IslamicNetwork\PrayerTimes\PrayerTimes($methodConst, $schoolConst);
        
        $fmt = function($t) {
            if ($t === '-----' || empty($t)) return '--:--';
            return Carbon::createFromFormat('H:i', $t)->format('h:i A');
        };

        for ($d=1; $d<=$days; $d++) {
            $date = Carbon::create($now->year,$now->month,$d,12,0,0,$tz);
            $times = $pt->getTimes($date, $lat, $lng, 0, \IslamicNetwork\PrayerTimes\PrayerTimes::LATITUDE_ADJUSTMENT_METHOD_ANGLE, null, \IslamicNetwork\PrayerTimes\PrayerTimes::TIME_FORMAT_24H);

            $rows[] = [
                'day' => $d,
                'date' => $date->format('d M'),
                'dow' => $date->format('D'),
                'fajr' => $fmt($times['Fajr']),
                'sunrise' => $fmt($times['Sunrise']),
                'dhuhr' => $fmt($times['Dhuhr']),
                'asr' => $fmt($times['Asr']),
                'maghrib' => $fmt($times['Maghrib']),
                'isha' => $fmt($times['Isha']),
                'is_today'=> $d === $now->day,
                'is_friday'=> $date->isFriday(),
            ];
        }
        return $rows;
    }

    private function buildTomorrow($lat,$lng,$tz,$madhab='hanafi',$method='Karachi'): array
    {
        $tomorrow = Carbon::now($tz)->addDay();
        $methodConst = defined('\IslamicNetwork\PrayerTimes\Method::METHOD_' . strtoupper($method)) 
            ? constant('\IslamicNetwork\PrayerTimes\Method::METHOD_' . strtoupper($method)) 
            : \IslamicNetwork\PrayerTimes\Method::METHOD_KARACHI;
        $schoolConst = $madhab === 'hanafi' ? \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_HANAFI : \IslamicNetwork\PrayerTimes\PrayerTimes::SCHOOL_STANDARD;
        $pt = new \IslamicNetwork\PrayerTimes\PrayerTimes($methodConst, $schoolConst);
        $times = $pt->getTimes($tomorrow, $lat, $lng, 0, \IslamicNetwork\PrayerTimes\PrayerTimes::LATITUDE_ADJUSTMENT_METHOD_ANGLE, null, \IslamicNetwork\PrayerTimes\PrayerTimes::TIME_FORMAT_24H);
        
        $fmt = function($t) {
            if ($t === '-----' || empty($t)) return '--:--';
            return Carbon::createFromFormat('H:i', $t)->format('h:i A');
        };

        return [
            'fajr'=>$fmt($times['Fajr']),'dhuhr'=>$fmt($times['Dhuhr']),
            'asr'=>$fmt($times['Asr']),'maghrib'=>$fmt($times['Maghrib']),'isha'=>$fmt($times['Isha'])
        ];
    }

    private function getNextPrayer(array $prayers, string $tz): array
    {
        $now = Carbon::now($tz);
        $map = [
            'fajr'=>$prayers['raw']->fajr,'dhuhr'=>$prayers['raw']->dhuhr,
            'asr'=>$prayers['raw']->asr,'maghrib'=>$prayers['raw']->maghrib,
            'isha'=>$prayers['raw']->isha
        ];
        foreach ($map as $name=>$t) {
            if ($now->lt($t)) {
                $diff = $now->diff($t);
                return [
                    'name'=>ucfirst($name),'time'=>$t->format('h:i A'),
                    'countdown'=>sprintf('%02d:%02d:%02d',$diff->h,$diff->i,$diff->s),
                    'timestamp'=>$t->toIso8601String()
                ];
            }
        }
        return ['name'=>'Fajr (Tomorrow)','time'=>$prayers['fajr'],'countdown'=>'00:00:00','timestamp'=>''];
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

    private function getNearby($city, string $currentSlug): array
    {
        if ($city instanceof \App\Models\City) {
            return City::where('id','!=',$city->id)->inRandomOrder()->take(8)->get()->toArray();
        }
        return WorldCity::where('country_code',$city->country_code)
            ->where('slug','!=',$currentSlug)->take(8)->get()->toArray();
    }

    private function citySeo($name,$country,$slug,$prayers,$hijri,$tz): array
    {
        $date = Carbon::now($tz)->format('d F Y');
        return [
            'title' => "Prayer Time {$name} Today {$date} | Namaz Timing {$name} | Fajr {$prayers['fajr']} Maghrib {$prayers['maghrib']}",
            'description' => "Prayer time {$name} today {$date}: Fajr {$prayers['fajr']}, Dhuhr {$prayers['dhuhr']}, Asr {$prayers['asr']}, Maghrib {$prayers['maghrib']}, Isha {$prayers['isha']}. Islamic date {$hijri['day']} {$hijri['month_name']} {$hijri['year']} AH. Exact {$name} namaz timing.",
            'canonical' => url("/prayer-times/{$slug}"),
        ];
    }

    private function prayerSeo($name,$prayer,$prayers,$tz): array
    {
        $time = $prayers[$prayer];
        $date = Carbon::now($tz)->format('d F Y');
        return [
            'title' => ucfirst($prayer)." Time {$name} Today {$date} | {$prayer} Prayer Time {$name} | {$time}",
            'description' => ucfirst($prayer)." prayer time in {$name} today is {$time}. ".ucfirst($prayer)." namaz time {$name} {$date}. Start time, end time, rakats, and monthly schedule.",
            'canonical' => url("/prayer-times/{$name}/{$prayer}"),
        ];
    }

    private function countryHubSeo($info,$country): array
    {
        return [
            'title' => "Prayer Times {$info['name']} | Namaz Timing All Cities {$info['name']} | Islamic Prayer Times",
            'description' => "Prayer times in all cities of {$info['name']}. Fajr, Dhuhr, Asr, Maghrib, Isha timings for {$info['name']} cities. Today's prayer schedule for all {$info['name']} cities.",
            'canonical' => url("/prayer-times/{$country}"),
        ];
    }
}
