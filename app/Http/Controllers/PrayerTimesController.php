<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\PrayerTime;
use App\Models\HijriDateCache;
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

    /**
     * Hub page — All Pakistan cities for prayer times
     */
    public function hub()
    {
        $cities = City::with('country')->orderBy('name')->get();

        // Group cities by state/province for organized display
        $citiesByProvince = $cities->groupBy(function($city) {
            return $city->state ?? 'Other';
        })->sortKeys();

        // SEO
        $seoMeta = (object) [
            'title' => 'Namaz Timing Pakistan — Prayer Times All Cities Today ' . date('Y') . ' | Noor-e-Islam',
            'description' => 'Accurate namaz timing for all Pakistan cities including Lahore, Karachi, Islamabad, Rawalpindi, Faisalabad, Multan, Peshawar, Quetta. Fajr, Zuhr, Asr, Maghrib, Isha times with monthly timetable.',
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => 'Prayer Times All Cities Pakistan',
                'description' => 'Accurate prayer times for 120+ Pakistan cities',
                'url' => route('prayer-times.hub'),
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'numberOfItems' => $cities->count(),
                    'itemListElement' => $cities->take(10)->map(function($city, $i) {
                        return [
                            '@type' => 'ListItem',
                            'position' => $i + 1,
                            'name' => 'Prayer Times ' . $city->name,
                            'url' => route('prayer-times.city', $city->slug),
                        ];
                    })->values()->toArray()
                ]
            ], JSON_UNESCAPED_SLASHES)
        ];

        // Hijri date for display
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))
            ->where('region', 'pakistan')
            ->first() ?? HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();

        return view('pages.prayer-times.hub', compact('cities', 'citiesByProvince', 'seoMeta', 'hijriDate'));
    }

    /**
     * City-specific prayer times page — FULL FEATURED
     */
    public function city(Request $request, City $city)
    {
        $city->load('seoMeta', 'country');

        $date = date('Y-m-d');

        // Use the existing PrayerTimesService for data
        $prayerTimes = Cache::remember('prayer_times_srv_' . $city->id . '_' . $date, 3600, function() use ($city) {
            return $this->prayerTimesService->fetchAndCacheForCity($city);
        });

        $todayPrayer = $prayerTimes->firstWhere('date', $date) ?? $prayerTimes->first();

        // Qibla Calculation
        $qiblaDegree = $this->prayerTimesService->getQibla($city);
        $qiblaDirectionText = $this->getQiblaDirectionText($qiblaDegree);

        // Sunnah / Nawafil Times
        $nawafil = null;
        $sunnahTimes = null;
        if ($todayPrayer) {
            $sunrise = Carbon::parse($todayPrayer->sunrise);
            $maghrib = Carbon::parse($todayPrayer->maghrib);
            $isha = Carbon::parse($todayPrayer->isha);
            $fajr = Carbon::parse($todayPrayer->fajr);
            $dhuhr = Carbon::parse($todayPrayer->dhuhr);

            $nawafil = (object)[
                'ishraq' => $sunrise->copy()->addMinutes(20)->format('h:i A'),
                'chasht' => $sunrise->copy()->addMinutes(90)->format('h:i A'),
                'awwabeen' => $maghrib->copy()->addMinutes(15)->format('h:i A'),
                'tahajjud' => $isha->copy()->addHours(2)->format('h:i A') . ' - ' . $fajr->copy()->subMinutes(10)->format('h:i A'),
            ];

            $sunnahTimes = (object)[
                'midnight' => $todayPrayer->midnight ? Carbon::parse($todayPrayer->midnight)->format('h:i A') : $maghrib->copy()->addHours(3)->format('h:i A'),
                'last_third' => $todayPrayer->last_third ? Carbon::parse($todayPrayer->last_third)->format('h:i A') : $fajr->copy()->subHours(2)->format('h:i A'),
                'ishraq' => $sunrise->copy()->addMinutes(20)->format('h:i A'),
                'chaasht' => $sunrise->copy()->addMinutes(90)->format('h:i A'),
                'zawal' => $dhuhr->copy()->subMinutes(15)->format('h:i A'),
            ];
        }

        // Hijri Date
        $hijriDate = HijriDateCache::where('gregorian_date', $date)
            ->where('region', 'pakistan')
            ->first() ?? HijriDateCache::where('gregorian_date', $date)->first();

        $hijriUrduMonth = $this->hijriMonthUrdu($hijriDate->hijri_month ?? '');

        // Nearby Cities
        $nearbyCities = City::where('country_id', $city->country_id)
            ->where('id', '!=', $city->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // ALL Pakistan cities for internal linking grid
        $allCities = Cache::remember('all_pakistan_cities', 86400, function() use ($city) {
            return City::where('country_id', $city->country_id)
                ->orderBy('name')
                ->get(['id', 'name', 'slug', 'name_ur', 'state']);
        });

        // Next Prayer Calculation
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

        // Tomorrow's Fajr (Part D feature)
        $tomorrowFajr = null;
        $tomorrowDate = Carbon::parse($date)->addDay()->format('Y-m-d');
        $tomorrowPrayer = $prayerTimes->firstWhere('date', $tomorrowDate);
        if ($tomorrowPrayer) {
            $tomorrowFajr = Carbon::parse($tomorrowPrayer->fajr)->format('h:i A');
        }

        // Jamaat Times (Part D — default: prayer time + 30 min)
        $jamaatTimes = null;
        if ($todayPrayer) {
            $jamaatTimes = (object)[
                'fajr' => Carbon::parse($todayPrayer->fajr)->addMinutes(30)->format('h:i A'),
                'dhuhr' => Carbon::parse($todayPrayer->dhuhr)->addMinutes(30)->format('h:i A'),
                'asr' => Carbon::parse($todayPrayer->asr)->addMinutes(30)->format('h:i A'),
                'maghrib' => Carbon::parse($todayPrayer->maghrib)->addMinutes(10)->format('h:i A'),
                'isha' => Carbon::parse($todayPrayer->isha)->addMinutes(30)->format('h:i A'),
            ];
        }

        // Enhanced SEO with high-volume keywords (Part C + E)
        $seoMeta = $city->seoMeta ?? (object) [];
        $fajrFormatted = $todayPrayer ? Carbon::parse($todayPrayer->fajr)->format('h:i A') : '';
        $maghribFormatted = $todayPrayer ? Carbon::parse($todayPrayer->maghrib)->format('h:i A') : '';
        $dhuhrFormatted = $todayPrayer ? Carbon::parse($todayPrayer->dhuhr)->format('h:i A') : '';
        $asrFormatted = $todayPrayer ? Carbon::parse($todayPrayer->asr)->format('h:i A') : '';
        $ishaFormatted = $todayPrayer ? Carbon::parse($todayPrayer->isha)->format('h:i A') : '';
        $sunriseFormatted = $todayPrayer ? Carbon::parse($todayPrayer->sunrise)->format('h:i A') : '';
        $dateStr = Carbon::now()->format('d M Y');

        // Part E: City-specific SEO titles
        if (!isset($seoMeta->title)) {
            $seoMeta->title = $this->getCityTitle($city->name, $dateStr);
        }
        // Part C: Keyword-rich meta description (150-160 chars)
        if (!isset($seoMeta->description)) {
            $seoMeta->description = "Namaz timing {$city->name} today {$dateStr}. Fajr time {$city->name} {$fajrFormatted}, Maghrib {$maghribFormatted}. Azan time, Zohar, Asr, Isha timings. Hanafi & Shafi. Monthly timetable." . ($hijriDate ? " Hijri date {$hijriDate->hijri_day} {$hijriDate->hijri_month} {$hijriDate->hijri_year}." : '');
        }
        if (!isset($seoMeta->h1)) {
            $seoMeta->h1 = "Namaz Timing {$city->name} Today | Prayer Times {$city->name} | اوقاتِ نماز {$city->name}";
        }

        // Schema with expanded FAQ (7 questions from Part C), BreadcrumbList, Event
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
                        '@type' => 'WebPage',
                        'name' => $seoMeta->title,
                        'description' => $seoMeta->description,
                        'url' => url()->current(),
                        'mainEntity' => [
                            '@type' => 'Event',
                            'name' => "Prayer Times {$city->name}",
                            'location' => [
                                '@type' => 'Place',
                                'name' => "{$city->name}, Pakistan",
                                'geo' => [
                                    '@type' => 'GeoCoordinates',
                                    'latitude' => $city->latitude,
                                    'longitude' => $city->longitude,
                                ]
                            ],
                            'startDate' => Carbon::now()->toIso8601String()
                        ]
                    ],
                    [
                        '@type' => 'FAQPage',
                        'mainEntity' => [
                            [
                                '@type' => 'Question',
                                'name' => "Fajr time {$city->name} today?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Fajr time {$city->name} today {$dateStr} is {$fajrFormatted}. Fajar namaz time in {$city->name} starts at {$fajrFormatted} and ends at sunrise {$sunriseFormatted}. Fajr end time {$city->name} today is {$sunriseFormatted}."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "Namaz timing in {$city->name} today?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Namaz timing {$city->name} today {$dateStr}: Fajr {$fajrFormatted}, Sunrise {$sunriseFormatted}, Zuhr/Dhuhr {$dhuhrFormatted}, Asr {$asrFormatted}, Maghrib {$maghribFormatted}, Isha {$ishaFormatted}. Ye timings Hanafi method ke mutabiq hain."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "Azan time in {$city->name} today?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Azan time {$city->name} today: Fajr azan {$fajrFormatted}, Zohar azan {$dhuhrFormatted}, Asr azan {$asrFormatted}, Maghrib azan {$maghribFormatted}, Isha azan {$ishaFormatted}."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "Maghrib time {$city->name} today?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Maghrib time {$city->name} today {$dateStr} is {$maghribFormatted}. Maghrib azan time {$city->name} is same as Maghrib prayer time. Maghrib namaz time today changes daily."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "Namaz timing {$city->name} Hanafi?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Namaz timing {$city->name} Hanafi method (University of Islamic Sciences Karachi): Fajr {$fajrFormatted}, Dhuhr {$dhuhrFormatted}, Asr {$asrFormatted} (Hanafi shadow = 2x), Maghrib {$maghribFormatted}, Isha {$ishaFormatted}. Namaz timing {$city->name} Ahle Sunnat bhi same Hanafi method hai."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "Fajar ka time kya hai?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Fajar ka time aaj {$city->name} mein {$fajrFormatted} hai. Fajar ki namaz ka time subah sadiq se shuru hota hai aur sunrise tak rehta hai. Aaj fajr end time {$sunriseFormatted} hai."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "Jumma time in {$city->name}?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Jumma time in {$city->name} is at Zuhr time which today is {$dhuhrFormatted}. Juma ki namaz Zuhr ke waqt mein ada hoti hai. Most mosques in {$city->name} hold Jummah between 1:00 PM and 2:30 PM."
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => "What is Qibla direction in {$city->name}?",
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => "Qibla direction in {$city->name} is " . number_format($qiblaDegree ?? 0, 2) . "° from North."
                                ]
                            ]
                        ]
                    ]
                ]
            ];
            $seoMeta->schema_override_json = json_encode($schema, JSON_UNESCAPED_SLASHES);
        }

        return view('pages.prayer-times.city', compact(
            'city', 'prayerTimes', 'todayPrayer', 'seoMeta',
            'qiblaDegree', 'qiblaDirectionText', 'nawafil', 'sunnahTimes',
            'nearbyCities', 'nextPrayer', 'hijriDate', 'hijriUrduMonth',
            'allCities', 'tomorrowFajr', 'jamaatTimes',
            'fajrFormatted', 'maghribFormatted', 'dhuhrFormatted',
            'asrFormatted', 'ishaFormatted', 'sunriseFormatted'
        ));
    }

    /**
     * Nawafil page
     */
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

    /**
     * Get Qibla direction text from degree
     */
    private function getQiblaDirectionText($degree)
    {
        if ($degree === null) return 'N/A';

        $directions = [
            'North', 'North-Northeast', 'Northeast', 'East-Northeast',
            'East', 'East-Southeast', 'Southeast', 'South-Southeast',
            'South', 'South-Southwest', 'Southwest', 'West-Southwest',
            'West', 'West-Northwest', 'Northwest', 'North-Northwest'
        ];

        $index = round($degree / 22.5) % 16;
        return $directions[$index];
    }

    /**
     * Get Hijri month name in Urdu
     */
    private function hijriMonthUrdu($monthName)
    {
        $months = [
            'Muharram' => 'محرم',
            'Safar' => 'صفر',
            'Rabi al-Awwal' => 'ربیع الاول',
            'Rabi ul Awal' => 'ربیع الاول',
            'Rabi al-Thani' => 'ربیع الثانی',
            'Rabi ul Thani' => 'ربیع الثانی',
            'Jumada al-Ula' => 'جمادی الاول',
            'Jumada al-Awwal' => 'جمادی الاول',
            'Jumada al-Thani' => 'جمادی الثانی',
            'Rajab' => 'رجب',
            'Sha\'ban' => 'شعبان',
            'Shaban' => 'شعبان',
            'Ramadan' => 'رمضان',
            'Shawwal' => 'شوال',
            'Dhul Qi\'dah' => 'ذوالقعدہ',
            'Dhul Qadah' => 'ذوالقعدہ',
            'Dhu al-Qi\'dah' => 'ذوالقعدہ',
            'Dhul Hijjah' => 'ذوالحجہ',
            'Dhu al-Hijjah' => 'ذوالحجہ',
        ];

        // Try exact match first
        if (isset($months[$monthName])) {
            return $months[$monthName];
        }

        // Try partial/fuzzy match
        foreach ($months as $key => $urdu) {
            if (stripos($monthName, strtok($key, ' ')) !== false) {
                return $urdu;
            }
        }

        return $monthName;
    }

    /**
     * Part E: City-specific SEO titles with exact high-volume keywords
     */
    private function getCityTitle($cityName, $dateStr)
    {
        $cityTitles = [
            'Lahore' => "Namaz Timing Lahore Today {$dateStr} | Fajr Time Lahore | Azan Time Lahore | Prayer Times Lahore",
            'Karachi' => "Namaz Timing Karachi Today {$dateStr} | Prayer Times Karachi | Fajr Karachi",
            'Islamabad' => "Namaz Timing Islamabad Today {$dateStr} | Prayer Times Islamabad | Fajr Time",
            'Rawalpindi' => "Namaz Timing Rawalpindi {$dateStr} | Fajr Time Rawalpindi | Azan Time",
            'Faisalabad' => "Namaz Timing Faisalabad Today {$dateStr} | Prayer Times Faisalabad",
            'Peshawar' => "Namaz Timing Peshawar Today {$dateStr} | Fajr Time Peshawar | Azan",
            'Quetta' => "Namaz Timing Quetta Today {$dateStr} | Prayer Times Quetta | Fajr Time",
            'Multan' => "Namaz Timing Multan Today {$dateStr} | Fajr Time Multan | Azan Time",
        ];

        return $cityTitles[$cityName] ?? "Namaz Timing {$cityName} Today {$dateStr} | Prayer Times {$cityName} Pakistan";
    }
}
