<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\HijriDateCache;
use App\Models\HistoricalEvent;
use App\Models\IslamicEvent;
use App\Models\HijriMonth;
use App\Models\PrayerTime;
use App\Models\KnowledgeArticle;
use App\Models\Dua;
use App\Services\AladhanApiService;
use App\Services\MoonPhaseService;
use App\Services\CountdownService;
use App\Services\SeoMetaService;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class IslamicDateController extends Controller
{
    private AladhanApiService $apiService;
    private MoonPhaseService $moonPhaseService;
    private CountdownService $countdownService;
    private SeoMetaService $seoService;

    public function __construct(
        AladhanApiService $apiService,
        MoonPhaseService $moonPhaseService,
        CountdownService $countdownService,
        SeoMetaService $seoService
    ) {
        $this->apiService = $apiService;
        $this->moonPhaseService = $moonPhaseService;
        $this->countdownService = $countdownService;
        $this->seoService = $seoService;
    }

    /**
     * Display the Global Hub Page for Islamic Date.
     */
    public function hub()
    {
        $today = Carbon::today();

        // 1. Get Global Date (Region: global)
        $globalDate = Cache::remember('hub_global_date_' . $today->toDateString(), 3600, function () use ($today) {
            return $this->apiService->getHijriDate($today, 'global');
        });

        // 2. Get Pakistan Date (Region: pakistan)
        $pakistanDate = Cache::remember('hub_pakistan_date_' . $today->toDateString(), 3600, function () use ($today) {
            return $this->apiService->getHijriDate($today, 'pakistan');
        });

        // Use global for the rest of the generic calculations on the hub
        $primaryDate = $globalDate;

        // 3. Moon Phase
        $moonPhase = Cache::remember('moon_phase_' . $today->toDateString(), 3600, function () use ($today) {
            return $this->moonPhaseService->getPhase($today);
        });

        // 4. Countdowns
        $topCountdowns = Cache::remember('top_countdowns_' . ($primaryDate->id ?? 'fallback'), 3600, function () use ($primaryDate) {
            return $this->countdownService->getTopCountdowns($primaryDate);
        });

        // 5. Monthly Calendar
        $monthlyCalendar = collect();
        if ($primaryDate) {
            $monthlyCalendar = Cache::remember(
                "monthly_calendar_global_{$primaryDate->hijri_month_number}_{$primaryDate->hijri_year}",
                3600,
                function () use ($primaryDate) {
                    return $this->apiService->getHijriMonthCalendar(
                        $primaryDate->hijri_month_number,
                        $primaryDate->hijri_year,
                        'global'
                    );
                }
            );
        }

        // 6. Upcoming Events (Full year)
        $upcomingEvents = Cache::remember('upcoming_events_all_' . ($primaryDate->id ?? 'none'), 3600, function () use ($primaryDate) {
            return collect($this->countdownService->getCountdowns($primaryDate));
        });

        // 7. Today's Historical Events
        $historicalEvents = collect();
        if ($primaryDate) {
            $historicalEvents = Cache::remember("historical_events_{$primaryDate->hijri_month}_{$primaryDate->hijri_day}", 86400, function () use ($primaryDate) {
                return HistoricalEvent::where('hijri_day', $primaryDate->hijri_day)
                    ->where('hijri_month', $primaryDate->hijri_month)
                    ->get();
            });
        }

        // 8. Prayer Times (Default: Makkah for Hub, or skip and just use a default widget in view)
        // We'll use a hardcoded default for the global hub or fetch Makkah if seeded.

        // 9. Fasting Days Check
        $fastingDays = $primaryDate ? $this->getFastingDays($primaryDate->gregorian_date, $primaryDate->hijri_day) : [];

        // 10. Hijri Month Details
        $currentMonthDetails = null;
        if ($primaryDate) {
            $currentMonthDetails = Cache::remember("hijri_month_{$primaryDate->hijri_month_number}", 86400, function () use ($primaryDate) {
                return HijriMonth::where('name_en', $primaryDate->hijri_month)
                    ->orWhere('month_number', $primaryDate->hijri_month_number)
                    ->first();
            });
        }

        // 11. SEO & Schema
        $title = $primaryDate ? "Islamic Date Today - {$primaryDate->hijri_day} {$primaryDate->hijri_month} {$primaryDate->hijri_year} AH" : 'Islamic Date Today - Current Hijri Calendar';
        $desc = "Find out today's Islamic date (Hijri date), current moon phase, upcoming Islamic events, and daily prayer times.";
        
        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => route('islamic-date.hub'),
                    'url' => route('islamic-date.hub'),
                    'name' => $title,
                    'description' => $desc,
                ]
            ]
        ];

        if ($upcomingEvents && $upcomingEvents->count() > 0) {
            foreach ($upcomingEvents as $event) {
                $schema['@graph'][] = [
                    '@type' => 'Event',
                    'name' => $event['name'],
                    'description' => $event['description'] ?? "Upcoming event in " . $event['days_away'] . " days.",
                    'startDate' => Carbon::today()->addDays($event['days_away'])->format('Y-m-d'),
                    'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
                    'eventStatus' => 'https://schema.org/EventScheduled',
                    'location' => [
                        '@type' => 'Place',
                        'name' => 'Worldwide'
                    ]
                ];
            }
        }

        $this->seoService->setForPage($title, $desc, route('islamic-date.hub'), $schema);

        return view('pages.islamic-date.hub', compact(
            'globalDate', 'pakistanDate', 'moonPhase', 'topCountdowns',
            'monthlyCalendar', 'upcomingEvents', 'historicalEvents',
            'fastingDays', 'currentMonthDetails'
        ));
    }

    /**
     * Display the Country-specific Islamic Date Page.
     */
    public function country(Country $country)
    {
        $today = Carbon::today();
        $region = strtolower($country->slug) === 'pakistan' ? 'pakistan' : 'global';

        $hijriDate = Cache::remember("country_date_{$country->id}_{$today->toDateString()}", 3600, function () use ($today, $region) {
            return $this->apiService->getHijriDate($today, $region);
        });

        $moonPhase = Cache::remember('moon_phase_' . $today->toDateString(), 3600, function () use ($today) {
            return $this->moonPhaseService->getPhase($today);
        });

        $monthlyCalendar = collect();
        if ($hijriDate) {
            $monthlyCalendar = Cache::remember(
                "monthly_calendar_{$region}_{$hijriDate->hijri_month_number}_{$hijriDate->hijri_year}",
                3600,
                function () use ($hijriDate, $region) {
                    return $this->apiService->getHijriMonthCalendar(
                        $hijriDate->hijri_month_number,
                        $hijriDate->hijri_year,
                        $region
                    );
                }
            );
        }

        $upcomingEvents = Cache::remember('upcoming_events_' . ($hijriDate->id ?? 'none'), 3600, function () use ($hijriDate) {
            return collect($this->countdownService->getCountdowns($hijriDate));
        });

        $historicalEvents = collect();
        if ($hijriDate) {
            $historicalEvents = Cache::remember("historical_events_{$hijriDate->hijri_month}_{$hijriDate->hijri_day}", 86400, function () use ($hijriDate) {
                return HistoricalEvent::where('hijri_day', $hijriDate->hijri_day)
                    ->where('hijri_month', $hijriDate->hijri_month)
                    ->get();
            });
        }

        $fastingDays = $hijriDate ? $this->getFastingDays($hijriDate->gregorian_date, $hijriDate->hijri_day) : [];

        $cities = $country->cities()->orderBy('population', 'desc')->take(10)->get();

        // SEO
        $titleHijri = $hijriDate ? "{$hijriDate->hijri_day} {$hijriDate->hijri_month} {$hijriDate->hijri_year} AH" : '';
        $title = "Islamic Date Today in {$country->name} - {$titleHijri}";
        $desc = "Today's Hijri date in {$country->name}. View the Islamic calendar, current moon phase, and prayer times for {$country->name} cities.";
        $this->seoService->setForPage($title, $desc, route('islamic-date.country', $country->slug));

        return view('pages.islamic-date.country', compact(
            'country', 'hijriDate', 'moonPhase', 'monthlyCalendar',
            'upcomingEvents', 'historicalEvents', 'fastingDays', 'cities'
        ));
    }

    /**
     * Display the City-specific Islamic Date Page.
     */
    public function city(Country $country, City $city)
    {
        if ($city->country_id !== $country->id) {
            abort(404);
        }

        $today = Carbon::today();
        $region = strtolower($country->slug) === 'pakistan' ? 'pakistan' : 'global';

        $hijriDate = Cache::remember("city_date_{$city->id}_{$today->toDateString()}", 3600, function () use ($today, $region) {
            return $this->apiService->getHijriDate($today, $region);
        });

        $prayerTimes = Cache::remember("prayer_times_{$city->id}_{$today->toDateString()}", 3600, function () use ($city, $today) {
            return PrayerTime::where('city_id', $city->id)->where('date', $today->toDateString())->first();
        });

        $moonPhase = Cache::remember('moon_phase_' . $today->toDateString(), 3600, function () use ($today) {
            return $this->moonPhaseService->getPhase($today);
        });

        $fastingDays = $hijriDate ? $this->getFastingDays($hijriDate->gregorian_date, $hijriDate->hijri_day) : [];

        // SEO
        $titleHijri = $hijriDate ? "{$hijriDate->hijri_day} {$hijriDate->hijri_month}" : '';
        $title = "Islamic Date in {$city->name} Today - {$titleHijri}";
        $desc = "Check the exact Islamic date today in {$city->name}, {$country->name}. Includes local moon phase, Hijri calendar, and precise prayer times.";
        $this->seoService->setForPage($title, $desc, route('islamic-date.city', ['country' => $country->slug, 'city' => $city->slug]));

        return view('pages.islamic-date.city', compact(
            'country', 'city', 'hijriDate', 'prayerTimes', 'moonPhase', 'fastingDays'
        ));
    }

    /**
     * Helper to determine sunnah fasting days.
     */
    private function getFastingDays(string $gregorianDate, int $hijriDay): array
    {
        $fastingDays = [];
        $dayOfWeek = date('l', strtotime($gregorianDate));
        
        if ($dayOfWeek === 'Monday' || $dayOfWeek === 'Thursday') {
            $fastingDays[] = 'Sunnah Fasting (' . $dayOfWeek . ')';
        }
        
        if (in_array($hijriDay, [13, 14, 15])) {
            $fastingDays[] = 'Ayyam al-Bid (White Days)';
        }
        
        return $fastingDays;
    }
}
