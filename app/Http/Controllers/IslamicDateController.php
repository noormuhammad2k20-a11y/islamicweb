<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\SeoMetaService;

class IslamicDateController extends Controller
{
    private SeoMetaService $seoService;

    public function __construct(SeoMetaService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index()
    {
        return $this->buildDatePage();
    }

    public function cityPage($city)
    {
        $cityName = ucfirst(str_replace('-', ' ', $city));
        return $this->buildDatePage($cityName);
    }

    private function buildDatePage($targetCity = null)
    {
        // Pakistan time
        $nowPK = Carbon::now('Asia/Karachi');
        // Saudi time (UTC+3)
        $nowSA = Carbon::now('Asia/Riyadh');

        // Hijri for Pakistan (1 day behind Saudi usually)
        $hijriPK = $this->toHijri($nowPK);
        // Hijri for Saudi
        $hijriSA = $this->toHijri($nowSA);
        // For UAE (same as Saudi usually)
        $hijriUAE = $hijriSA;

        // Cities
        $cities = [
            'Karachi'      => $this->toHijri(Carbon::now('Asia/Karachi')),
            'Lahore'       => $this->toHijri(Carbon::now('Asia/Karachi')),
            'Islamabad'    => $this->toHijri(Carbon::now('Asia/Karachi')),
            'Rawalpindi'   => $this->toHijri(Carbon::now('Asia/Karachi')),
            'Faisalabad'   => $this->toHijri(Carbon::now('Asia/Karachi')),
            'Saudi Arabia' => $hijriSA,
            'UAE'          => $hijriUAE,
        ];

        $monthInfo = $this->getMonthInfo($hijriPK['month']);
        $nextMonth = $this->getMonthInfo(($hijriPK['month'] % 12) + 1);
        $islamicYear = $this->getYearInfo($hijriPK['year']);
        
        $seoData = $this->getSeoData($hijriPK, $hijriSA, $nowPK, $targetCity);
        
        // Pass to the SEO service to inject into the master layout as well
        $this->seoService->setForPage($seoData['title'], $seoData['description'], request()->url());

        // Full Hijri calendar for current month
        $monthCalendar = $this->getMonthCalendar($nowPK, $hijriPK);

        return view('pages.islamic-date.index', compact(
            'hijriPK', 'hijriSA', 'hijriUAE', 'cities',
            'monthInfo', 'nextMonth', 'islamicYear',
            'seoData', 'nowPK', 'monthCalendar', 'targetCity'
        ));
    }

    private function toHijri(Carbon $date): array
    {
        $hijri = \GeniusTS\HijriDate\Hijri::convertToHijri($date);
        $monthNum = (int) $hijri->month;
        $dayNum = (int) $hijri->day;
        $yearNum = (int) $hijri->year;
        $monthName = $hijri->format('F');

        return [
            'day'          => $dayNum,
            'month'        => $monthNum,
            'year'         => $yearNum,
            'month_name'   => $monthName,
            'month_urdu'   => $this->hijriMonthUrdu($monthNum),
            'month_arabic' => $this->hijriMonthArabic($monthNum),
            'day_name'     => $date->locale('en')->isoFormat('dddd'),
            'day_urdu'     => $this->urduDayName($date->dayOfWeek),
            'formatted'    => $dayNum . ' ' . $monthName . ' ' . $yearNum . ' AH',
        ];
    }

    private function getMonthCalendar(Carbon $now, array $hijriToday): array
    {
        $calendar = [];
        $daysInGregorianMonth = $now->daysInMonth;

        for ($d = 1; $d <= $daysInGregorianMonth; $d++) {
            $date = Carbon::create($now->year, $now->month, $d, 0, 0, 0, 'Asia/Karachi');
            $hijri = $this->toHijri($date);

            $calendar[] = [
                'gregorian_day'  => $d,
                'gregorian_date' => $date->format('d M'),
                'hijri_day'      => $hijri['day'],
                'hijri_month'    => $hijri['month_name'],
                'is_today'       => $d === $now->day,
            ];
        }

        return $calendar;
    }

    public function getMonthInfoPublic(int $month): array
    {
        return $this->getMonthInfo($month);
    }

    private function getMonthInfo(int $month): array
    {
        $info = [
            1  => ['name' => 'Muharram', 'urdu' => 'محرم', 'significance' => 'First month of Islamic year. Ashura falls on 10th Muharram — a day of great importance.'],
            2  => ['name' => 'Safar', 'urdu' => 'صفر', 'significance' => 'Second month. Historically a month of travel and battles in early Islamic history.'],
            3  => ['name' => 'Rabi al-Awwal', 'urdu' => 'ربیع الاول', 'significance' => 'Birth month of Prophet Muhammad (PBUH). Eid Milad-un-Nabi celebrated on 12th.'],
            4  => ['name' => 'Rabi al-Thani', 'urdu' => 'ربیع الثانی', 'significance' => 'Fourth month. Also called Rabi ul Akhir.'],
            5  => ['name' => 'Jumada al-Awwal', 'urdu' => 'جمادی الاول', 'significance' => 'Fifth month of the Islamic calendar year.'],
            6  => ['name' => 'Jumada al-Thani', 'urdu' => 'جمادی الثانی', 'significance' => 'Sixth month. End of the first half of the Islamic year.'],
            7  => ['name' => 'Rajab', 'urdu' => 'رجب', 'significance' => 'One of the four sacred months. Night of Isra and Miraj (27th Rajab).'],
            8  => ['name' => 'Shaban', 'urdu' => 'شعبان', 'significance' => 'Month of preparation for Ramadan. Shab-e-Barat on 15th Shaban.'],
            9  => ['name' => 'Ramadan', 'urdu' => 'رمضان', 'significance' => 'Holiest month. Fasting (Roza) is obligatory. Laylatul Qadr in last 10 nights.'],
            10 => ['name' => 'Shawwal', 'urdu' => 'شوال', 'significance' => 'Eid-ul-Fitr on 1st Shawwal. Six fasts of Shawwal are sunnah.'],
            11 => ['name' => 'Dhu al-Qadah', 'urdu' => 'ذوالقعدہ', 'significance' => 'One of four sacred months. Hajj preparation begins.'],
            12 => ['name' => 'Dhu al-Hijjah', 'urdu' => 'ذوالحجہ', 'significance' => 'Month of Hajj. Eid-ul-Adha on 10th. First 10 days most blessed.'],
        ];

        return $info[$month] ?? $info[1];
    }

    private function getYearInfo(int $year): array
    {
        return [
            'year'    => $year,
            'started' => 'The Islamic Hijri calendar started from the migration (Hijra) of Prophet Muhammad (PBUH) from Makkah to Madinah in 622 CE.',
            'type'    => 'Lunar calendar — 354 or 355 days per year, 12 months of 29–30 days.',
        ];
    }

    private function getSeoData(array $hijriPK, array $hijriSA, Carbon $nowPK, $targetCity = null): array
    {
        $dateStr = $nowPK->format('d F Y');
        $pkDate = $hijriPK['day'] . ' ' . $hijriPK['month_name'] . ' ' . $hijriPK['year'];
        $saDate = $hijriSA['day'] . ' ' . $hijriSA['month_name'] . ' ' . $hijriSA['year'];
        
        $title = "Islamic Date Today {$dateStr} | {$pkDate} | Hijri Date Pakistan | آج کی اسلامی تاریخ";
        $description = "Islamic date today in Pakistan is {$pkDate}. Saudi Arabia Islamic date today is {$saDate}. Today Islamic date in Karachi, Lahore, Rawalpindi, Faisalabad. Exact Hijri date {$dateStr}.";
        
        if ($targetCity) {
            $title = "Islamic Date Today in {$targetCity} {$dateStr} | {$pkDate} | Hijri Date {$targetCity}";
            $description = "Today Islamic date in {$targetCity} Pakistan is {$pkDate}. Islamic date today in {$targetCity}, Saudi Arabia Islamic date, and exact Hijri calendar for {$dateStr}.";
        }

        return [
            'title'       => $title,
            'description' => $description,
            'keywords'    => "islamic date today, islamic date today in pakistan, today islamic date, hijri date today, islamic date today in karachi, islamic date today in lahore, today islamic date pakistan, islamic month date today, exact islamic date today, today's date according to islamic calendar",
        ];
    }

    private function hijriMonthUrdu(int $m): string
    {
        return ['', 'محرم', 'صفر', 'ربیع الاول', 'ربیع الثانی', 'جمادی الاول', 'جمادی الثانی', 'رجب', 'شعبان', 'رمضان', 'شوال', 'ذوالقعدہ', 'ذوالحجہ'][$m] ?? '';
    }

    private function hijriMonthArabic(int $m): string
    {
        return ['', 'مُحَرَّم', 'صَفَر', 'رَبِيع ٱلْأَوَّل', 'رَبِيع ٱلثَّانِي', 'جُمَادَى ٱلْأُولَى', 'جُمَادَى ٱلثَّانِيَة', 'رَجَب', 'شَعْبَان', 'رَمَضَان', 'شَوَّال', 'ذُو ٱلْقَعْدَة', 'ذُو ٱلْحِجَّة'][$m] ?? '';
    }

    private function urduDayName(int $dow): string
    {
        // 0=Sun, 1=Mon, 2=Tue, 3=Wed, 4=Thu, 5=Fri, 6=Sat
        return ['اتوار', 'پیر', 'منگل', 'بدھ', 'جمعرات', 'جمعہ', 'ہفتہ'][$dow] ?? '';
    }
}
