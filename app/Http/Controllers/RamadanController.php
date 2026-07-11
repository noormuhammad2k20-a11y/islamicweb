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
        $duas = [
            'Sehri' => [
                'arabic' => 'وَبِصَوْمِ غَدٍ نَّوَيْتُ مِنْ شَهْرِ رَمَضَانَ',
                'transliteration' => 'Wa bisawmi ghadinn nawaiytu min shahri ramadan.',
                'translation' => 'I intend to keep the fast for tomorrow in the month of Ramadan.'
            ],
            'Iftar' => [
                'arabic' => 'اللَّهُمَّ اِنِّى لَكَ صُمْتُ وَبِكَ امنْتُ وَعَليْكَ تَوَكَّلْتُ وَ عَلَى رِزْقِكَ اَفْطَرْتُ',
                'transliteration' => 'Allahumma inni laka sumtu wa bika aamantu wa alayka tawakkaltu wa ala rizq-ika-aftartu.',
                'translation' => 'O Allah! I fasted for You and I believe in You and I put my trust in You and I break my fast with Your sustenance.'
            ],
            'Ashra 1' => [
                'arabic' => 'رَبِّ اغْفِرْ وَارْحَمْ وَأَنْتَ خَيْرُ الرَّاحِمِينَ',
                'transliteration' => 'Rabbighfir warham wa anta khairur raahimeen.',
                'translation' => 'O My Lord! Forgive and have mercy, for You are the Best of those who show mercy.'
            ],
            'Ashra 2' => [
                'arabic' => 'اَسْتَغْفِرُ اللہَ رَبِّی مِنْ کُلِّ ذَنْبٍ وَّ اَتُوْبُ اِلَیْہِ',
                'transliteration' => 'Astaghfirullaha rabbi min kulli zambin wa atoobu ilayhi.',
                'translation' => 'I seek forgiveness from Allah, my Lord, from every sin I committed.'
            ],
            'Ashra 3' => [
                'arabic' => 'اَللَّهُمَّ أَجِرْنِي مِنَ النَّارِ',
                'transliteration' => 'Allahumma ajirni minan naar.',
                'translation' => 'O Allah! Save me from the Hell-fire.'
            ],
            'Taraweeh' => [
                'arabic' => 'سُبْحَانَ ذِی الْمُلْكِ وَالْمَلَكُوْتِ، سُبْحَانَ ذِی الْعِزَّةِ وَالْعَظَمَةِ وَالْهَيْبَةِ وَالْقُدْرَةِ وَالْكِبْرِيَآءِ وَالْجَبَرُوْتِ',
                'transliteration' => 'Subhana dhil Mulki wal Malakuti, Subhana dhil izzati wal aazamati wal haybati wal qudrati wal kibriyaa-i wal jabaroot.',
                'translation' => 'Glory be to the Owner of the physical and spiritual worlds. Glory be to the Possessor of Honor, Greatness, Awe, Power, Pride, and Majesty.'
            ]
        ];

        return view('pages.ramadan.duas', compact('duas'));
    }

    public function rules()
    {
        $rules = [
            'Things that Break the Fast' => [
                'Eating or drinking intentionally',
                'Intentional vomiting',
                'Menstruation or postnatal bleeding',
                'Engaging in marital relations',
                'Taking nutritional injections'
            ],
            'Things that DO NOT Break the Fast' => [
                'Eating or drinking forgetfully',
                'Brushing teeth (without swallowing toothpaste)',
                'Taking a shower or swimming (without swallowing water)',
                'Applying eye drops or ear drops',
                'Swallowing one\'s own saliva'
            ],
            'Fidyah (Compensation)' => 'For those who cannot fast due to old age or chronic illness, Fidyah is feeding one poor person for every missed fast.',
            'Kaffarah (Expiation)' => 'For intentionally breaking a fast without a valid excuse, Kaffarah is fasting 60 consecutive days, or if unable, feeding 60 poor people.'
        ];

        return view('pages.ramadan.rules', compact('rules'));
    }

    public function faqs()
    {
        $faqs = [
            [
                'q' => 'Can I brush my teeth while fasting?',
                'a' => 'Yes, you can use a toothbrush or miswak while fasting. However, you must be extremely careful not to swallow any toothpaste or water. If anything goes down the throat, the fast is invalidated.'
            ],
            [
                'q' => 'What if I eat or drink by mistake?',
                'a' => 'If you genuinely forget that you are fasting and eat or drink, your fast is still valid. You should stop eating/drinking as soon as you remember.'
            ],
            [
                'q' => 'Is it permissible to taste food while cooking?',
                'a' => 'It is permissible to taste food with the tip of the tongue if necessary, provided it is spat out completely and nothing reaches the throat. However, it is disliked if not necessary.'
            ],
            [
                'q' => 'Do injections break the fast?',
                'a' => 'Non-nutritional injections (like vaccines or pain relievers) into the muscle or under the skin do not break the fast according to the majority of contemporary scholars. Nutritional IV drips, however, do invalidate the fast.'
            ]
        ];
        return view('pages.ramadan.faqs', compact('faqs'));
    }

    public function laylatulQadr()
    {
        $guide = [
            'Virtues' => 'Lailatul Qadr (The Night of Decree) is described in the Quran as being "better than a thousand months" (83 years and 4 months). Worship on this night brings immense reward.',
            'When is it?' => 'It is found in the odd nights of the last 10 days of Ramadan (21st, 23rd, 25th, 27th, or 29th night).',
            'Dua for the Night' => [
                'arabic' => 'اللَّهُمَّ إِنَّكَ عَفُوٌّ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّي',
                'transliteration' => 'Allahumma innaka afuwwun tuhibbul afwa fa\'fu anni',
                'translation' => 'O Allah, You are forgiving and love forgiveness, so forgive me.'
            ],
            'Recommended Acts' => [
                'Reciting the Quran',
                'Performing Nawafil prayers (Qiyam al-Layl)',
                'Making abundant Dua',
                'Giving charity (Sadaqah)',
                'Seeking forgiveness (Istighfar)'
            ]
        ];
        return view('pages.ramadan.laylatul_qadr', compact('guide'));
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
