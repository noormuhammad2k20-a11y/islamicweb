<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\PrayerTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Services\PrayerTimesService;

class PrayerTimesController extends Controller
{
    protected $prayerTimesService;

    public function __construct(PrayerTimesService $prayerTimesService)
    {
        $this->prayerTimesService = $prayerTimesService;
    }

    public function hub()
    {
        // Load Pakistan cities for the hub page, or all cities grouped by country
        $cities = City::with('country')->orderBy('name')->get();
        return view('pages.prayer-times.hub', compact('cities'));
    }

    public function city(City $city)
    {
        $city->load('seoMeta', 'country');
        
        $date = date('Y-m-d');
        
        // Use the new PrayerTimesService which handles AlAdhan, Fallbacks, and DB caching
        $prayerTimes = Cache::remember('prayer_times_srv_' . $city->id . '_' . $date, 3600, function() use ($city) {
            return $this->prayerTimesService->fetchAndCacheForCity($city);
        });

        $todayPrayer = $prayerTimes->firstWhere('date', $date) ?? $prayerTimes->first();

        // Qibla Calculation via Service
        $qiblaDegree = $this->prayerTimesService->getQibla($city);

        // Nawafil Calculation
        $nawafil = null;
        if ($todayPrayer) {
            $sunrise = Carbon::parse($todayPrayer->sunrise);
            $maghrib = Carbon::parse($todayPrayer->maghrib);
            $isha = Carbon::parse($todayPrayer->isha);
            $fajr = Carbon::parse($todayPrayer->fajr);
            
            $nawafil = (object)[
                'ishraq' => $sunrise->copy()->addMinutes(15)->format('h:i A'),
                'chasht' => $sunrise->copy()->addMinutes(45)->format('h:i A'),
                'awwabeen' => $maghrib->copy()->addMinutes(15)->format('h:i A'),
                'tahajjud' => $isha->copy()->addHours(2)->format('h:i A') . ' - ' . $fajr->copy()->subMinutes(10)->format('h:i A'),
            ];
        }

        // Nearby Cities
        $nearbyCities = City::where('country_id', $city->country_id)
            ->where('id', '!=', $city->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // Dynamic SEO generation based on master prompt rules
        $seoMeta = $city->seoMeta ?? (object) [];
        if (!isset($seoMeta->title)) {
            $seoMeta->title = "Namaz Timings {$city->name} Today — " . Carbon::now()->format('d M Y') . " | Noor-e-Islam";
        }
        if (!isset($seoMeta->h1)) {
            $seoMeta->h1 = "{$city->name} Prayer Times — نماز اوقات";
        }
        if (!isset($seoMeta->description)) {
            $seoMeta->description = "Today's prayer times in {$city->name}: Fajr " . ($todayPrayer->fajr ?? '') . ", Dhuhr " . ($todayPrayer->dhuhr ?? '') . ", Asr " . ($todayPrayer->asr ?? '') . ", Maghrib " . ($todayPrayer->maghrib ?? '') . ", Isha " . ($todayPrayer->isha ?? '') . ". Accurate namaz timings using " . ($city->prayer_calc_method ?? 'local') . " calculation.";
        }
        if (!isset($seoMeta->schema_override_json)) {
            $schema = [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'BreadcrumbList',
                        'itemListElement' => [
                            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Prayer Times', 'item' => route('prayer-times.hub')],
                            ['@type' => 'ListItem', 'position' => 3, 'name' => $city->name]
                        ]
                    ],
                    [
                        '@type' => 'FAQPage',
                        'mainEntity' => [
                            [
                                '@type' => 'Question',
                                'name' => "What is Fajr time in {$city->name} today?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Fajr time in {$city->name} today is " . ($todayPrayer ? Carbon::parse($todayPrayer->fajr)->format('h:i A') : 'N/A') . "."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "What is Maghrib time in {$city->name} today?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Maghrib time in {$city->name} today is " . ($todayPrayer ? Carbon::parse($todayPrayer->maghrib)->format('h:i A') : 'N/A') . "."
                                ]
                            ]
                        ]
                    ]
                ]
            ];
            $seoMeta->schema_override_json = json_encode($schema, JSON_UNESCAPED_SLASHES);
        }

        // Calculate Next Prayer
        $nextPrayer = 'Fajr';
        if ($todayPrayer) {
            $now = Carbon::now($city->timezone ?? 'Asia/Karachi');
            $prayers = [
                'Fajr' => Carbon::parse($todayPrayer->fajr),
                'Sunrise' => Carbon::parse($todayPrayer->sunrise),
                'Dhuhr' => Carbon::parse($todayPrayer->dhuhr),
                'Asr' => Carbon::parse($todayPrayer->asr),
                'Maghrib' => Carbon::parse($todayPrayer->maghrib),
                'Isha' => Carbon::parse($todayPrayer->isha),
            ];
            foreach ($prayers as $name => $time) {
                if ($now->lessThan($time)) {
                    $nextPrayer = $name;
                    break;
                }
            }
        }

        return view('pages.prayer-times.city', compact('city', 'prayerTimes', 'todayPrayer', 'seoMeta', 'qiblaDegree', 'nawafil', 'nearbyCities', 'nextPrayer'));
    }

    public function nawafil(City $city)
    {
        $date = date('Y-m-d');
        $todayPrayer = PrayerTime::where('city_id', $city->id)->where('date', $date)->first();
        
        $seoMeta = (object) [
            'title' => "Nawafil Prayer Times {$city->name} Today — Ishraq, Chasht, Tahajjud",
            'h1' => "{$city->name} Nawafil & Qaza Times — نوافل اوقات",
            'description' => "Today's Nawafil prayer times in {$city->name}: Ishraq, Chasht, Awwabeen, and Tahajjud timings.",
        ];

        return view('pages.prayer-times.nawafil', compact('city', 'todayPrayer', 'seoMeta'));
    }

    public function today()
    {
        return view('pages.placeholder', ['title' => 'Prayer Times Today']);
    }
}
