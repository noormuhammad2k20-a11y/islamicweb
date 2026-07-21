<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\City;
use App\Models\IslamicYearEvent;
use App\Models\CityIslamicContent;
use App\Models\IslamicMonthContent;
use App\Services\SeoMetaService;

class IslamicCalendarController extends Controller
{
    private SeoMetaService $seoService;

    public function __construct(SeoMetaService $seoService)
    {
        $this->seoService = $seoService;
    }

    // ── PAGE 1: Main Calendar Hub ─────────────────────────
    public function mainCalendar(Request $request)
    {
        $year = (int) $request->get('year', now()->year);
        $month = (int) $request->get('month', now()->month);

        $nowPK = Carbon::now('Asia/Karachi');
        $nowSA = Carbon::now('Asia/Riyadh');

        $hijriPK = $this->getCachedHijri($nowPK, 'pk');
        $hijriSA = $this->getCachedHijri($nowSA, 'sa');

        // Full year 12-month calendar data (cached 24h for past years)
        $fullYearCalendar = Cache::remember("islamic_cal_{$year}", $year < now()->year ? 86400 : 3600,
            fn() => $this->buildFullYearCalendar($year));

        // Current month Gregorian-Hijri grid
        $currentMonthGrid = $fullYearCalendar[$month] ?? [];

        // Islamic events for this year from DB
        $yearEvents = IslamicYearEvent::forYear($year)->get();

        $seoData = [
            'title' => "Islamic Calendar {$year} | Islamic Date Today | Hijri Calendar {$hijriPK['year']} AH",
            'description' => "Islamic calendar {$year} with Hijri dates. Islamic date today in Pakistan is {$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']}. Complete Islamic calendar {$year} with all months, Ramadan, Eid dates.",
            'canonical' => url('/islamic-calendar'),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.main', compact(
            'nowPK', 'hijriPK', 'hijriSA', 'fullYearCalendar',
            'currentMonthGrid', 'yearEvents', 'year', 'month', 'seoData'
        ));
    }

    // ── PAGE 2: Today's Date Focus ────────────────────────
    public function islamicDateToday()
    {
        $nowPK = Carbon::now('Asia/Karachi');
        $nowSA = Carbon::now('Asia/Riyadh');

        $hijriPK = $this->getCachedHijri($nowPK, 'pk');
        $hijriSA = $this->getCachedHijri($nowSA, 'sa');

        // Pakistan major cities
        $pkCities = ['Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Peshawar', 'Quetta', 'Multan'];
        $citiesData = [];
        foreach ($pkCities as $c) {
            $citiesData[$c] = $hijriPK; // All PK cities same timezone
        }

        $monthContent = IslamicMonthContent::where('month_number', $hijriPK['month'])->first();

        // Tomorrow's date
        $tomorrowPK = Carbon::now('Asia/Karachi')->addDay();
        $hijriTomorrow = $this->toHijri($tomorrowPK);

        $seoData = [
            'title' => "Islamic Date Today {$nowPK->format('d F Y')} | {$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']} | Today Islamic Date Pakistan",
            'description' => "Islamic date today in Pakistan is {$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']} AH ({$nowPK->format('d F Y')}). Saudi Arabia Islamic date today is {$hijriSA['day']} {$hijriSA['month_name']}. Exact Islamic date today in Karachi, Lahore, Rawalpindi, Faisalabad.",
            'canonical' => url('/islamic-date-today'),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.today', compact(
            'nowPK', 'hijriPK', 'hijriSA', 'citiesData', 'monthContent', 'hijriTomorrow', 'seoData'
        ));
    }

    // ── PAGE 3: Pakistan Specific ─────────────────────────
    public function pakistanDate()
    {
        $nowPK = Carbon::now('Asia/Karachi');
        $hijriPK = $this->getCachedHijri($nowPK, 'pk');

        // 8 provinces data
        $provinces = [
            'Punjab' => ['cities' => ['Lahore', 'Faisalabad', 'Rawalpindi', 'Multan', 'Gujranwala', 'Sialkot']],
            'Sindh' => ['cities' => ['Karachi', 'Hyderabad', 'Sukkur', 'Nawabshah']],
            'KPK' => ['cities' => ['Peshawar', 'Abbottabad', 'Mardan', 'Swat']],
            'Balochistan' => ['cities' => ['Quetta', 'Gwadar', 'Turbat', 'Khuzdar']],
            'AJK' => ['cities' => ['Muzaffarabad', 'Mirpur']],
            'Gilgit-Baltistan' => ['cities' => ['Gilgit', 'Skardu', 'Chitral']],
            'ICT' => ['cities' => ['Islamabad']],
            'FATA' => ['cities' => ['Peshawar', 'Bannu']],
        ];

        $seoData = [
            'title' => "Islamic Date Today in Pakistan {$nowPK->format('d F Y')} | {$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']} | Today Islamic Date Pakistan 2026",
            'description' => "Today Islamic date in Pakistan is {$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']} AH. Official Pakistan Hijri date per Ruet-e-Hilal Committee. All provinces: Punjab, Sindh, KPK, Balochistan. Which Islamic date is today in Pakistan.",
            'canonical' => url('/islamic-calendar/pakistan'),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.pakistan', compact(
            'nowPK', 'hijriPK', 'provinces', 'seoData'
        ));
    }

    // ── PAGE 4: Saudi Arabia Date ─────────────────────────
    public function saudiDate(Request $request)
    {
        $nowSA = Carbon::now('Asia/Riyadh');
        $nowUAE = Carbon::now('Asia/Dubai');
        
        $year = (int) $request->get('year', now()->year);
        $month = (int) $request->get('month', now()->month);

        $hijriSA = $this->getCachedHijri($nowSA, 'sa');
        $hijriUAE = $this->toHijri($nowUAE);
        $hijriPK = $this->getCachedHijri(Carbon::now('Asia/Karachi'), 'pk');

        $fullYearCalendar = Cache::remember("islamic_cal_sa_{$year}", $year < now()->year ? 86400 : 3600,
            fn() => $this->buildFullYearCalendar($year, 'Asia/Riyadh'));

        $currentMonthGrid = $fullYearCalendar[$month] ?? [];

        // Arab countries
        $arabCountries = [
            'Saudi Arabia' => ['tz' => 'Asia/Riyadh', 'flag' => '🇸🇦'],
            'UAE' => ['tz' => 'Asia/Dubai', 'flag' => '🇦🇪'],
            'Kuwait' => ['tz' => 'Asia/Kuwait', 'flag' => '🇰🇼'],
            'Qatar' => ['tz' => 'Asia/Qatar', 'flag' => '🇶🇦'],
            'Bahrain' => ['tz' => 'Asia/Bahrain', 'flag' => '🇧🇭'],
            'Jordan' => ['tz' => 'Asia/Amman', 'flag' => '🇯🇴'],
            'Egypt' => ['tz' => 'Africa/Cairo', 'flag' => '🇪🇬'],
            'Turkey' => ['tz' => 'Europe/Istanbul', 'flag' => '🇹🇷'],
        ];

        $countriesData = [];
        foreach ($arabCountries as $name => $info) {
            $countriesData[$name] = array_merge($info, $this->toHijri(Carbon::now($info['tz'])));
        }

        $seoData = [
            'title' => "Islamic Date Today in Saudi Arabia | {$hijriSA['day']} {$hijriSA['month_name']} {$hijriSA['year']} | Saudi Arabia Islamic Date Today 2026",
            'description' => "Islamic date today in Saudi Arabia is {$hijriSA['day']} {$hijriSA['month_name']} {$hijriSA['year']} AH. UAE, Kuwait, Qatar Islamic date. Saudi Arabia vs Pakistan Islamic date difference explained.",
            'canonical' => url('/islamic-calendar/saudi-arabia'),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.saudi', compact(
            'nowSA', 'hijriSA', 'hijriUAE', 'hijriPK', 'countriesData', 'seoData',
            'fullYearCalendar', 'currentMonthGrid', 'year', 'month'
        ));
    }

    // ── PAGE 4.5: Programmatic Country Pages ─────────────────────────
    public function countryPage(Request $request, string $country)
    {
        $countries = [
            'uae' => ['name' => 'UAE', 'full_name' => 'United Arab Emirates', 'tz' => 'Asia/Dubai', 'flag' => '🇦🇪'],
            'kuwait' => ['name' => 'Kuwait', 'full_name' => 'Kuwait', 'tz' => 'Asia/Kuwait', 'flag' => '🇰🇼'],
            'qatar' => ['name' => 'Qatar', 'full_name' => 'Qatar', 'tz' => 'Asia/Qatar', 'flag' => '🇶🇦'],
            'bahrain' => ['name' => 'Bahrain', 'full_name' => 'Bahrain', 'tz' => 'Asia/Bahrain', 'flag' => '🇧🇭'],
            'jordan' => ['name' => 'Jordan', 'full_name' => 'Jordan', 'tz' => 'Asia/Amman', 'flag' => '🇯🇴'],
            'egypt' => ['name' => 'Egypt', 'full_name' => 'Egypt', 'tz' => 'Africa/Cairo', 'flag' => '🇪🇬'],
            'turkey' => ['name' => 'Turkey', 'full_name' => 'Turkey', 'tz' => 'Europe/Istanbul', 'flag' => '🇹🇷'],
        ];

        if (!array_key_exists($country, $countries)) {
            abort(404);
        }

        $cData = $countries[$country];
        $now = Carbon::now($cData['tz']);
        $year = (int) $request->get('year', now()->year);
        $month = (int) $request->get('month', now()->month);
        
        $hijri = $this->toHijri($now);
        $hijriPK = $this->getCachedHijri(Carbon::now('Asia/Karachi'), 'pk');
        $hijriSA = $this->getCachedHijri(Carbon::now('Asia/Riyadh'), 'sa');

        $fullYearCalendar = Cache::remember("islamic_cal_{$country}_{$year}", $year < now()->year ? 86400 : 3600,
            fn() => $this->buildFullYearCalendar($year, $cData['tz']));

        $currentMonthGrid = $fullYearCalendar[$month] ?? [];

        $seoData = [
            'title' => "Islamic Date Today in {$cData['full_name']} | {$hijri['day']} {$hijri['month_name']} {$hijri['year']} | Today Islamic Date {$cData['name']} " . now()->year,
            'description' => "Today Islamic date in {$cData['full_name']} is {$hijri['day']} {$hijri['month_name']} {$hijri['year']} AH. Official Hijri date for {$cData['name']}. Full 12-month Islamic calendar and Gregorian converter.",
            'canonical' => url('/islamic-calendar/' . $country),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.country', compact(
            'country', 'cData', 'now', 'hijri', 'hijriPK', 'hijriSA', 'seoData',
            'fullYearCalendar', 'currentMonthGrid', 'year', 'month'
        ));
    }

    // ── PAGE 5: City Pages (Programmatic) ─────────────────
    public function cityPage(string $citySlug)
    {
        $city = City::where('slug', $citySlug)->firstOrFail();

        $cityContent = Cache::rememberForever("city_content_{$citySlug}",
            fn() => CityIslamicContent::where('city_slug', $citySlug)->first());

        $nowPK = Carbon::now('Asia/Karachi');
        $hijri = $this->getCachedHijri($nowPK, 'pk');
        $cityName = $city->name;

        $seoData = [
            'title' => "Islamic Date Today in {$cityName} | {$hijri['day']} {$hijri['month_name']} {$hijri['year']} | Today Islamic Date {$cityName}",
            'description' => "Islamic date today in {$cityName} is {$hijri['day']} {$hijri['month_name']} {$hijri['year']} AH ({$nowPK->format('d F Y')}). Today Islamic date {$cityName} Pakistan. Exact Hijri date {$cityName}.",
            'canonical' => route('islamic-date-city', $citySlug),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.city', compact(
            'city', 'cityContent', 'nowPK', 'hijri', 'cityName', 'seoData'
        ));
    }

    // ── PAGE 6: Year Archive (Programmatic) ───────────────
    public function yearArchive(int $year)
    {
        abort_if($year < 2018 || $year > 2036, 404);

        $nowPK = Carbon::now('Asia/Karachi');

        $fullYearCalendar = Cache::remember("islamic_cal_{$year}", 86400,
            fn() => $this->buildFullYearCalendar($year));

        $yearEvents = IslamicYearEvent::forYear($year)->get();

        // Hijri year(s) for this Gregorian year
        $startHijri = $this->toHijri(Carbon::create($year, 1, 1));
        $endHijri = $this->toHijri(Carbon::create($year, 12, 31));

        $seoData = [
            'title' => "Islamic Calendar {$year} | Hijri Calendar {$startHijri['year']}–{$endHijri['year']} | Islamic Date {$year} Pakistan",
            'description' => "Complete Islamic calendar {$year} with Hijri dates. All 12 months, Ramadan {$year}, Eid dates, Muharram. Islamic calendar {$year} today date in Pakistan. Hijri calendar {$startHijri['year']} AH.",
            'canonical' => url("/islamic-calendar/{$year}"),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.year', compact(
            'year', 'fullYearCalendar', 'yearEvents',
            'startHijri', 'endHijri', 'seoData', 'nowPK'
        ));
    }

    public function yearMonthArchive($year, $month)
    {
        if (!is_numeric($month)) {
            $map = [
                'muharram' => 1, 'safar' => 2, 'rabi-ul-awwal' => 3, 'rabi-ul-akhir' => 4,
                'jumada-al-awwal' => 5, 'jumada-al-akhir' => 6, 'rajab' => 7, 'shaban' => 8,
                'ramadan' => 9, 'shawwal' => 10, 'dhul-qadah' => 11, 'dhul-hijjah' => 12
            ];
            $month = $map[strtolower($month)] ?? 1;
        }
        $month = (int) $month;
        abort_if($year < 2018 || $year > 2036, 404);
        abort_if($month < 1 || $month > 12, 404);

        $nowPK = Carbon::now('Asia/Karachi');

        $fullYearCalendar = Cache::remember("islamic_cal_{$year}", $year < now()->year ? 86400 : 3600,
            fn() => $this->buildFullYearCalendar($year));

        $monthData = $fullYearCalendar[$month] ?? null;
        abort_if(!$monthData, 404);

        $yearEvents = IslamicYearEvent::forYear($year)->get();
        $monthName = $monthData['month_name'];
        $monthNumStr = str_pad($month, 2, '0', STR_PAD_LEFT);

        $seoData = [
            'title' => "Islamic Calendar {$monthName} {$year} | Hijri Date Pakistan",
            'description' => "Complete Islamic calendar for {$monthName} {$year} with exact Hijri dates. Find out the Islamic date today in Pakistan, Ramadan, and Eid dates for {$monthName} {$year}.",
            'canonical' => url("/islamic-calendar/{$year}/{$month}"),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.year-month', compact(
            'year', 'month', 'monthData', 'monthName', 'yearEvents',
            'seoData', 'nowPK'
        ));
    }

    // ── PAGE 7: Urdu Date Page ────────────────────────────
    public function urduDate(Request $request)
    {
        $nowPK = Carbon::now('Asia/Karachi');
        $hijri = $this->getCachedHijri($nowPK, 'pk');

        $year = (int) $request->get('year', now()->year);
        $month = (int) $request->get('month', now()->month);

        $fullYearCalendar = Cache::remember("islamic_cal_pk_{$year}", $year < now()->year ? 86400 : 3600,
            fn() => $this->buildFullYearCalendar($year, 'Asia/Karachi'));

        $currentMonthGrid = $fullYearCalendar[$month] ?? [];

        $seoData = [
            'title' => "آج کی اسلامی تاریخ | Islamic Date Today in Urdu | اسلامی تاریخ {$hijri['day']} {$hijri['month_urdu']}",
            'description' => "آج کی اسلامی تاریخ {$hijri['day']} {$hijri['month_urdu']} {$hijri['year']} ہجری ہے۔ Islamic date today in Urdu. پاکستان میں آج کی اسلامی تاریخ۔",
            'canonical' => url('/islamic-calendar/in-urdu'),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.urdu', compact('nowPK', 'hijri', 'seoData', 'fullYearCalendar', 'currentMonthGrid', 'year', 'month'));
    }

    // ── PAGE 8: Month Pages (Programmatic) ────────────────
    public function monthPage(Request $request, string $monthSlug)
    {
        $content = IslamicMonthContent::where('slug', $monthSlug)->firstOrFail();

        $nowPK = Carbon::now('Asia/Karachi');
        $hijriPK = $this->getCachedHijri($nowPK, 'pk');

        $isCurrentMonth = ($content->month_number === $hijriPK['month']);

        $hijriYear = (int) $request->get('year', $hijriPK['year']);
        $cacheKey = "hijri_month_cal_{$hijriYear}_{$content->month_number}_pk";
        $hijriMonthGrid = Cache::remember($cacheKey, 86400, fn() => 
            $this->buildHijriMonthCalendar($hijriYear, $content->month_number, 'Asia/Karachi')
        );

        $seoData = [
            'title' => "{$content->month_name_en} {$hijriYear} Calendar | {$content->month_name_urdu} | Islamic Month {$content->month_name_en}",
            'description' => "{$content->month_name_en} is the {$content->month_number}th month of the Islamic calendar. View the full {$hijriYear} Hijri calendar for {$content->month_name_en} with exact dates.",
            'canonical' => url("/islamic-month/{$monthSlug}"),
        ];

        $this->seoService->setForPage($seoData['title'], $seoData['description'], $seoData['canonical']);

        return view('islamic-calendar.month', compact(
            'content', 'nowPK', 'hijriPK', 'isCurrentMonth', 'seoData', 'hijriYear', 'hijriMonthGrid'
        ));
    }

    // ── HELPER: Cached Hijri ──────────────────────────────
    private function getCachedHijri(Carbon $date, string $region): array
    {
        $key = "hijri_{$region}_" . $date->format('Ymd');
        return Cache::remember($key, 3600, fn() => $this->toHijri($date));
    }

    // ── HELPER: Hijri Conversion ──────────────────────────
    public function toHijri(Carbon $date): array
    {
        $hijri = \GeniusTS\HijriDate\Hijri::convertToHijri($date);
        $m = (int) $hijri->month;
        $d = (int) $hijri->day;
        $y = (int) $hijri->year;
        $monthName = $hijri->format('F');

        return [
            'day' => $d,
            'month' => $m,
            'year' => $y,
            'month_name' => $monthName,
            'month_urdu' => $this->monthUrdu($m),
            'month_arabic' => $this->monthArabic($m),
            'day_name' => $date->locale('en')->isoFormat('dddd'),
            'day_urdu' => $this->dayUrdu($date->dayOfWeek),
            'formatted' => $d . ' ' . $monthName . ' ' . $y . ' AH',
        ];
    }

    // ── HELPER: Build Hijri Month Calendar ───────────────
    private function buildHijriMonthCalendar(int $hijriYear, int $hijriMonth, string $timezone = 'Asia/Karachi'): array
    {
        try {
            $startDateObj = \GeniusTS\HijriDate\Hijri::convertToGregorian(1, $hijriMonth, $hijriYear);
            $startDate = Carbon::parse($startDateObj)->setTimezone($timezone);
        } catch (\Exception $e) {
            // Fallback if conversion fails
            return [];
        }

        $days = [];
        for ($i = 0; $i <= 30; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            $hijri = $this->toHijri($currentDate);
            
            // Stop if we've crossed into the next month
            if ($hijri['month'] !== $hijriMonth) {
                break;
            }

            $days[] = [
                'gregorian_day' => $currentDate->day,
                'gregorian_date' => $currentDate->format('Y-m-d'),
                'day_of_week' => $currentDate->dayOfWeek,
                'hijri_day' => $hijri['day'],
                'hijri_month' => $hijri['month'],
                'hijri_month_name' => $hijri['month_name'],
                'hijri_year' => $hijri['year'],
                'is_today' => $currentDate->isToday(),
                'is_friday' => $currentDate->isFriday(),
            ];
        }
        
        return [
            'month_num' => $hijriMonth,
            'month_name' => $days[0]['hijri_month_name'] ?? '',
            'days' => $days,
            'first_dow' => $days[0]['day_of_week'] ?? 0,
        ];
    }

    // ── HELPER: Build Full Year Calendar ─────────────────
    private function buildFullYearCalendar(int $year, string $timezone = 'Asia/Karachi'): array
    {
        $calendar = [];
        for ($m = 1; $m <= 12; $m++) {
            $days = Carbon::create($year, $m, 1)->daysInMonth;
            $monthDays = [];
            for ($d = 1; $d <= $days; $d++) {
                $date = Carbon::create($year, $m, $d, 0, 0, 0, $timezone);
                $hijri = $this->toHijri($date);
                $monthDays[] = [
                    'gregorian_day' => $d,
                    'day_of_week' => $date->dayOfWeek,
                    'hijri_day' => $hijri['day'],
                    'hijri_month' => $hijri['month'],
                    'hijri_month_name' => $hijri['month_name'],
                    'hijri_year' => $hijri['year'],
                    'is_today' => $date->isToday(),
                    'is_friday' => $date->isFriday(),
                ];
            }
            $calendar[$m] = [
                'month_num' => $m,
                'month_name' => Carbon::create($year, $m, 1)->format('F'),
                'days' => $monthDays,
                'first_dow' => Carbon::create($year, $m, 1)->dayOfWeek,
            ];
        }
        return $calendar;
    }

    private function buildMonthGrid(int $year, int $month): array
    {
        return $this->buildFullYearCalendar($year)[$month] ?? [];
    }

    private function monthUrdu(int $m): string
    {
        return ['', 'محرم', 'صفر', 'ربیع الاول', 'ربیع الثانی', 'جمادی الاول', 'جمادی الثانی', 'رجب', 'شعبان', 'رمضان', 'شوال', 'ذوالقعدہ', 'ذوالحجہ'][$m] ?? '';
    }

    private function monthArabic(int $m): string
    {
        return ['', 'مُحَرَّم', 'صَفَر', 'رَبِيع ٱلْأَوَّل', 'رَبِيع ٱلثَّانِي', 'جُمَادَى ٱلْأُولَى', 'جُمَادَى ٱلثَّانِيَة', 'رَجَب', 'شَعْبَان', 'رَمَضَان', 'شَوَّال', 'ذُو ٱلْقَعْدَة', 'ذُو ٱلْحِجَّة'][$m] ?? '';
    }

    private function dayUrdu(int $d): string
    {
        return ['اتوار', 'پیر', 'منگل', 'بدھ', 'جمعرات', 'جمعہ', 'ہفتہ'][$d] ?? '';
    }
}
