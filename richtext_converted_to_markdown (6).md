Tu mera Laravel developer hai. Mujhe meri Islamic website ka prayer times page

(/prayer-times) complete banana hai. Ye sab kuch implement karna hai:

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔧 TECH STACK & LIBRARIES (already installed)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\- Adhan PHP (Prayer Times + Qibla + Sunnah Times)

\- Carbon (Date & Time)

\- HijriDate (Hijri Calendar)

\- league/geotools (Geo calculations)

\- PHP DateTimeZone (built-in)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📍 STEP 1: PAKISTAN KE TAMAM CITIES COVER KARO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Ek cities config file banao: config/pakistan\_cities.php

Ye tamam cities shamil karo (lat/lng ke saath):

Lahore (31.5204, 74.3587), Karachi (24.8607, 67.0011),

Islamabad (33.6844, 73.0479), Rawalpindi (33.5651, 73.0169),

Faisalabad (31.4504, 73.1350), Multan (30.1575, 71.5249),

Peshawar (34.0151, 71.5249), Quetta (30.1798, 66.9750),

Sialkot (32.4945, 74.5229), Gujranwala (32.1877, 74.1945),

Hyderabad (25.3960, 68.3578), Bahawalpur (29.3956, 71.6836),

Sargodha (32.0836, 72.6711), Sukkur (27.7052, 68.8574),

Larkana (27.5600, 68.2100), Sheikhupura (31.7167, 73.9850),

Rahim Yar Khan (28.4202, 70.2952), Jhang (31.2681, 72.3181),

Gujrat (32.5736, 74.0789), Kasur (31.1167, 74.4500),

Mardan (34.1986, 72.0404), Mingora (34.7717, 72.3600),

Abbottabad (34.1463, 73.2117), Mansehra (34.3305, 73.1966),

Dera Ghazi Khan (30.0577, 70.6352), Dera Ismail Khan (31.8314, 70.9419),

Nawabshah (26.2442, 68.4100), Mirpur Khas (25.5270, 69.0120),

Jacobabad (28.2769, 68.4514), Shikarpur (27.9556, 68.6378),

Turbat (25.9869, 63.0420), Khuzdar (27.8120, 66.6100),

Zhob (31.3422, 69.4488), Hub (25.0317, 66.8878),

Muzaffarabad (34.3700, 73.4700), Mirpur AJK (33.1450, 73.7500),

Gilgit (35.9208, 74.3083), Skardu (35.2972, 75.6333),

Chitral (35.8511, 71.7864), Bannu (32.9889, 70.6056),

Kohat (33.5869, 71.4414), Chakwal (32.9328, 72.8528),

Attock (33.7667, 72.3667), Mianwali (32.5850, 71.5430),

Khushab (32.2992, 72.3528), Hafizabad (32.0714, 73.6886),

Narowal (32.1014, 74.8744), Okara (30.8092, 73.4453),

Pakpattan (30.3439, 73.3869), Sahiwal (30.6706, 73.1064),

Vehari (30.0454, 72.3517), Lodhran (29.5360, 71.6311),

Khanewal (30.3014, 71.9322), Toba Tek Singh (30.9694, 72.4833),

Chiniot (31.7197, 72.9789), Mandi Bahauddin (32.5864, 73.4917),

Naushahro Feroze (26.8406, 68.1181), Kamber (27.5886, 68.0228),

Dadu (26.7319, 67.7753), Tharparkar (24.7139, 70.2481),

Umerkot (25.3614, 69.7367), Badin (24.6558, 68.8383),

Thatta (24.7481, 67.9233), Khairpur (27.5317, 68.7592),

Ghotki (28.0044, 69.3133), Kashmore (28.4408, 70.4619),

Lasbela (26.7547, 66.3342), Awaran (26.3464, 65.2508),

Kech (26.5714, 63.9072), Panjgur (26.9689, 64.0983),

Kalat (29.0231, 66.5886), Mastung (29.7989, 66.8475),

Washuk (27.4347, 65.0267), Chagai (28.9886, 64.7903),

Nushki (29.5522, 66.0194), Harnai (30.1036, 67.9375),

Ziarat (30.3814, 67.7247), Pishin (30.5875, 66.9972),

Qilla Abdullah (30.6800, 66.5864), Loralai (30.3719, 68.5964),

Musakhel (29.8667, 69.7833), Kohlu (29.8942, 69.2544),

Barkhan (29.8969, 69.5314), Sibi (29.5439, 67.8775),

Usta Mohammad (28.1586, 68.0142), Jaffarabad (28.8167, 68.2700),

Nasirabad (28.3833, 67.9167), Sohbatpur (28.4833, 68.7167),

Tank (32.2192, 70.3758), Karak (33.1144, 71.0931),

Hangu (33.5289, 71.0586), Lakki Marwat (32.6075, 70.9103),

North Waziristan (33.0000, 69.9000),

South Waziristan (32.3167, 69.8333),

Bajour (34.7000, 71.5000), Mohmand (34.5333, 71.3833),

Khyber (34.0667, 71.2000), Kurram (33.5000, 69.9167),

Orakzai (33.4500, 71.1667), FR Bannu (32.9500, 70.7500),

Torghar (34.6833, 72.7833), Kolai Pallas (35.0700, 73.1800),

Shangla (34.8833, 72.7500)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🕌 STEP 2: PRAYER TIMES CONTROLLER

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

File: app/Http/Controllers/PrayerTimesController.php

\`\`\`php

namespace App\\Http\\Controllers;

use Illuminate\\Http\\Request;

use Carbon\\Carbon;

use IslamicNetwork\\PrayerTimes\\PrayerTimes;

use IslamicNetwork\\PrayerTimes\\Models\\Coordinates;

use IslamicNetwork\\PrayerTimes\\Models\\CalculationParameters;

use IslamicNetwork\\PrayerTimes\\Models\\CalculationMethod;

use IslamicNetwork\\PrayerTimes\\Models\\Madhab;

use IslamicNetwork\\PrayerTimes\\Models\\SunnahTimes;

use IslamicNetwork\\PrayerTimes\\Models\\Qibla;

class PrayerTimesController extends Controller

{

public function index(Request $request)

{

$cities = config('pakistan\_cities');

$selectedCity = $request->get('city', 'Lahore');

$madhab = $request->get('madhab', 'hanafi'); // hanafi or shafi

$method = $request->get('method', 'Karachi'); // calculation method

$cityData = $cities\[$selectedCity\] ?? $cities\['Lahore'\];

$lat = $cityData\['lat'\];

$lng = $cityData\['lng'\];

$timezone = $cityData\['timezone'\] ?? 'Asia/Karachi';

// Calculation parameters

$params = CalculationMethod::$method();

$params->madhab = ($madhab === 'hanafi') ? Madhab::Hanafi : Madhab::Shafi;

$coordinates = new Coordinates($lat, $lng);

$date = Carbon::now($timezone);

// Today's prayer times

$prayerTimes = new PrayerTimes($coordinates, $date->toDateTime(), $params);

// Sunnah Times (Tahajjud, Ishraq, Chaasht)

$sunnahTimes = new SunnahTimes($prayerTimes);

// Qibla direction

$qibla = new Qibla($coordinates);

$qiblaDirection = $qibla->direction;

// Hijri Date

$hijriDate = $this->getHijriDate($date);

// Monthly timetable

$monthlyTimes = $this->getMonthlyTimetable($coordinates, $params, $date, $timezone);

// Next prayer countdown

$nextPrayer = $this->getNextPrayer($prayerTimes, $date, $timezone);

// SEO data

$seoData = $this->getSeoData($selectedCity, $date, $hijriDate, $prayerTimes, $timezone);

return view('prayer-times', compact(

'cities', 'selectedCity', 'cityData', 'madhab', 'method',

'prayerTimes', 'sunnahTimes', 'qiblaDirection', 'hijriDate',

'monthlyTimes', 'nextPrayer', 'seoData', 'date', 'timezone'

));

}

private function getHijriDate(Carbon $date)

{

// Using HijriDate library

$hijri = new \\Uploder\\HijriDate\\HijriDate($date->day, $date->month, $date->year);

return \[

'day' => $hijri->getHijriDay(),

'month' => $hijri->getHijriMonth(),

'year' => $hijri->getHijriYear(),

'month\_name' => $hijri->getHijriMonthName(),

'month\_name\_urdu' => $this->hijriMonthUrdu($hijri->getHijriMonth()),

\];

}

private function hijriMonthUrdu($month)

{

$months = \[

1=>'محرم',2=>'صفر',3=>'ربیع الاول',4=>'ربیع الثانی',

5=>'جمادی الاول',6=>'جمادی الثانی',7=>'رجب',8=>'شعبان',

9=>'رمضان',10=>'شوال',11=>'ذوالقعدہ',12=>'ذوالحجہ'

\];

return $months\[$month\] ?? '';

}

private function getMonthlyTimetable($coordinates, $params, Carbon $now, $timezone)

{

$monthly = \[\];

$daysInMonth = $now->daysInMonth;

for ($day = 1; $day <= $daysInMonth; $day++) {

$date = Carbon::create($now->year, $now->month, $day, 0, 0, 0, $timezone);

$pt = new PrayerTimes($coordinates, $date->toDateTime(), $params);

$monthly\[\] = \[

'day' => $day,

'fajr' => Carbon::instance($pt->fajr)->setTimezone($timezone)->format('h:i A'),

'sunrise' => Carbon::instance($pt->sunrise)->setTimezone($timezone)->format('h:i A'),

'dhuhr' => Carbon::instance($pt->dhuhr)->setTimezone($timezone)->format('h:i A'),

'asr' => Carbon::instance($pt->asr)->setTimezone($timezone)->format('h:i A'),

'maghrib' => Carbon::instance($pt->maghrib)->setTimezone($timezone)->format('h:i A'),

'isha' => Carbon::instance($pt->isha)->setTimezone($timezone)->format('h:i A'),

\];

}

return $monthly;

}

private function getNextPrayer($prayerTimes, Carbon $now, $timezone)

{

$prayers = \[

'Fajr' => Carbon::instance($prayerTimes->fajr)->setTimezone($timezone),

'Dhuhr' => Carbon::instance($prayerTimes->dhuhr)->setTimezone($timezone),

'Asr' => Carbon::instance($prayerTimes->asr)->setTimezone($timezone),

'Maghrib' => Carbon::instance($prayerTimes->maghrib)->setTimezone($timezone),

'Isha' => Carbon::instance($prayerTimes->isha)->setTimezone($timezone),

\];

foreach ($prayers as $name => $time) {

if ($now->lt($time)) {

$diff = $now->diff($time);

return \[

'name' => $name,

'time' => $time->format('h:i A'),

'countdown' => sprintf('d:d:d', $diff->h, $diff->i, $diff->s),

\];

}

}

return \['name' => 'Fajr', 'time' => Carbon::instance($prayerTimes->fajr)->addDay()->setTimezone($timezone)->format('h:i A'), 'countdown' => 'Tomorrow'\];

}

private function getSeoData($city, Carbon $date, $hijri, $prayerTimes, $timezone)

{

$todayUrdu = $date->locale('ur')->isoFormat('D MMMM Y');

$fajr = Carbon::instance($prayerTimes->fajr)->setTimezone($timezone)->format('h:i A');

$maghrib = Carbon::instance($prayerTimes->maghrib)->setTimezone($timezone)->format('h:i A');

return \[

'title' => "Namaz Timing {$city} Today {$date->format('d M Y')} | Prayer Times {$city} | اوقات نماز",

'description' => "Namaz timing {$city} today {$date->format('d M Y')}. Fajr {$fajr}, Maghrib {$maghrib}. Hijri date {$hijri\['day'\]} {$hijri\['month\_name'\]} {$hijri\['year'\]}. All 5 prayer times, monthly timetable, Qibla direction for {$city} Pakistan.",

'keywords' => "namaz timing {$city}, prayer time {$city}, fajr time {$city}, azan time {$city}, namaz waqt {$city}, {$city} prayer times today, {$city} namaz schedule",

\];

}

}

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🌐 STEP 3: ROUTES (web.php)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

// Main page

Route::get('/prayer-times', \[PrayerTimesController::class, 'index'\])->name('prayer-times');

// City-specific SEO URLs — ye Google ke liye zaroori hai

Route::get('/prayer-times/{city}', \[PrayerTimesController::class, 'cityPage'\])

\->name('prayer-times.city')

\->where('city', '\[a-z\\-\]+');

// Example: /prayer-times/lahore, /prayer-times/karachi, /prayer-times/islamabad

// Ye URLs Google mein rank karengi city-specific searches ke liye

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🖼️ STEP 4: BLADE VIEW — resources/views/prayer-times.blade.php

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`html

@extends('layouts.app')

@section('seo')

{{ $seoData\['title'\] }}

{{-- Open Graph --}}

{{-- Schema.org Structured Data --}}

</p><p class="slate-paragraph">{</p><p class="slate-paragraph"> "@context": "https://schema.org",</p><p class="slate-paragraph"> "@type": "WebPage",</p><p class="slate-paragraph"> "name": "{{ $seoData\[&#x27;title&#x27;\] }}",</p><p class="slate-paragraph"> "description": "{{ $seoData\[&#x27;description&#x27;\] }}",</p><p class="slate-paragraph"> "url": "{{ url()->current() }}",</p><p class="slate-paragraph"> "mainEntity": {</p><p class="slate-paragraph"> "@type": "Event",</p><p class="slate-paragraph"> "name": "Prayer Times {{ $selectedCity }}",</p><p class="slate-paragraph"> "location": {</p><p class="slate-paragraph"> "@type": "Place",</p><p class="slate-paragraph"> "name": "{{ $selectedCity }}, Pakistan",</p><p class="slate-paragraph"> "geo": {</p><p class="slate-paragraph"> "@type": "GeoCoordinates",</p><p class="slate-paragraph"> "latitude": "{{ $cityData\[&#x27;lat&#x27;\] }}",</p><p class="slate-paragraph"> "longitude": "{{ $cityData\[&#x27;lng&#x27;\] }}"</p><p class="slate-paragraph"> }</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> "startDate": "{{ $date->toIso8601String() }}"</p><p class="slate-paragraph"> }</p><p class="slate-paragraph">}</p><p class="slate-paragraph">

{{-- FAQ Schema — Google Featured Snippet ke liye --}}

</p><p class="slate-paragraph">{</p><p class="slate-paragraph"> "@context": "https://schema.org",</p><p class="slate-paragraph"> "@type": "FAQPage",</p><p class="slate-paragraph"> "mainEntity": \[</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "Fajr time in {{ $selectedCity }} today?",</p><p class="slate-paragraph"> "acceptedAnswer": {</p><p class="slate-paragraph"> "@type": "Answer",</p><p class="slate-paragraph"> "text": "Fajr time in {{ $selectedCity }} today is {{ Carbon\\Carbon::instance($prayerTimes->fajr)->setTimezone($timezone)->format(&#x27;h:i A&#x27;) }}"</p><p class="slate-paragraph"> }</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "Namaz timing {{ $selectedCity }} today?",</p><p class="slate-paragraph"> "acceptedAnswer": {</p><p class="slate-paragraph"> "@type": "Answer",</p><p class="slate-paragraph"> "text": "Today&#x27;s prayer times in {{ $selectedCity }}: Fajr {{ Carbon\\Carbon::instance($prayerTimes->fajr)->setTimezone($timezone)->format(&#x27;h:i A&#x27;) }}, Dhuhr {{ Carbon\\Carbon::instance($prayerTimes->dhuhr)->setTimezone($timezone)->format(&#x27;h:i A&#x27;) }}, Asr {{ Carbon\\Carbon::instance($prayerTimes->asr)->setTimezone($timezone)->format(&#x27;h:i A&#x27;) }}, Maghrib {{ Carbon\\Carbon::instance($prayerTimes->maghrib)->setTimezone($timezone)->format(&#x27;h:i A&#x27;) }}, Isha {{ Carbon\\Carbon::instance($prayerTimes->isha)->setTimezone($timezone)->format(&#x27;h:i A&#x27;) }}"</p><p class="slate-paragraph"> }</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "What is Qibla direction in {{ $selectedCity }}?",</p><p class="slate-paragraph"> "acceptedAnswer": {</p><p class="slate-paragraph"> "@type": "Answer",</p><p class="slate-paragraph"> "text": "Qibla direction in {{ $selectedCity }} is {{ number\_format($qiblaDirection, 2) }}° from North."</p><p class="slate-paragraph"> }</p><p class="slate-paragraph"> }</p><p class="slate-paragraph"> \]</p><p class="slate-paragraph">}</p><p class="slate-paragraph">

@endsection

@section('content')

{{-- 🔴 LIVE COUNTDOWN BANNER --}}

Next Prayer: **{{ $nextPrayer\['name'\] }}**

{{ $nextPrayer\['time'\] }}

{{ $nextPrayer\['countdown'\] }}

{{-- 📅 HIJRI + GREGORIAN DATE BAR --}}

{{ $date->format('l, d F Y') }}

{{ $hijriDate\['day'\] }} {{ $hijriDate\['month\_name'\] }} {{ $hijriDate\['year'\] }} ھ

({{ $hijriDate\['month\_name\_urdu'\] }})

{{-- 🏙️ CITY SELECTOR —— TAMAM PAKISTAN CITIES --}}

Namaz Timing Pakistan — Prayer Times All Cities
===============================================

Select City / شہر منتخب کریں

@foreach($cities as $cityName => $data)

{{ $cityName }} — {{ $data\['urdu'\] ?? '' }}

@endforeach

Madhab / مسلک

Hanafi (حنفی)

Shafi (شافعی)

Calculation Method

Karachi (University of Islamic Sciences)

Muslim World League

Egyptian General Authority

Moonsighting Committee

{{-- 🕌 5 DAILY PRAYERS — MAIN TABLE --}}

Prayer Times {{ $selectedCity }} Today — {{ $date->format('d M Y') }}
---------------------------------------------------------------------

آج کے نماز کے اوقات {{ $selectedCity }} — Aaj ke namaz ke awqat {{ $selectedCity }}.

Fajr, Zuhr, Asr, Maghrib, Isha aur Sunrise timings.

@php

$prayerList = \[

\['name'=>'Fajr','urdu'=>'فجر','icon'=>'🌙','time'=>$prayerTimes->fajr,'class'=>'fajr'\],

\['name'=>'Sunrise','urdu'=>'طلوعِ آفتاب','icon'=>'🌅','time'=>$prayerTimes->sunrise,'class'=>'sunrise'\],

\['name'=>'Dhuhr / Zuhr','urdu'=>'ظہر','icon'=>'☀️','time'=>$prayerTimes->dhuhr,'class'=>'zuhr'\],

\['name'=>'Asr','urdu'=>'عصر','icon'=>'🌤','time'=>$prayerTimes->asr,'class'=>'asr'\],

\['name'=>'Maghrib','urdu'=>'مغرب','icon'=>'🌇','time'=>$prayerTimes->maghrib,'class'=>'maghrib'\],

\['name'=>'Isha','urdu'=>'عشاء','icon'=>'🌌','time'=>$prayerTimes->isha,'class'=>'isha'\],

\];

@endphp

@foreach($prayerList as $prayer)

{{ $prayer\['icon'\] }}

{{ $prayer\['name'\] }}

{{ $prayer\['urdu'\] }}

{{ \\Carbon\\Carbon::instance($prayer\['time'\])->setTimezone($timezone)->format('h:i A') }}

{{ \\Carbon\\Carbon::instance($prayer\['time'\])->setTimezone($timezone)->format('H:i') }}

@endforeach

{{-- 🌙 SUNNAH TIMES (Tahajjud, Ishraq, Chaasht, Zawal) --}}

Sunnah & Nafl Prayer Times {{ $selectedCity }}
----------------------------------------------

#### Tahajjud / تہجد

Midnight: {{ \\Carbon\\Carbon::instance($sunnahTimes->middleOfTheNight)->setTimezone($timezone)->format('h:i A') }}

Last Third: {{ \\Carbon\\Carbon::instance($sunnahTimes->lastThirdOfTheNight)->setTimezone($timezone)->format('h:i A') }}

#### Ishraq / اشراق

~15-20 min after Sunrise

{{ \\Carbon\\Carbon::instance($prayerTimes->sunrise)->setTimezone($timezone)->addMinutes(20)->format('h:i A') }}

#### Chaasht / چاشت

Mid-morning prayer

{{ \\Carbon\\Carbon::instance($prayerTimes->sunrise)->setTimezone($timezone)->addMinutes(90)->format('h:i A') }}

#### Zawal / زوال

Just before Dhuhr begins

{{ \\Carbon\\Carbon::instance($prayerTimes->dhuhr)->setTimezone($timezone)->subMinutes(15)->format('h:i A') }}

{{-- 🧭 QIBLA DIRECTION --}}

Qibla Direction {{ $selectedCity }} — قبلہ سمت
----------------------------------------------

Qibla direction from {{ $selectedCity }} is **{{ number\_format($qiblaDirection, 2) }}°** from North.

🧭

Face **{{ $qiblaDirection > 180 ? 'West-Northwest' : 'West' }}** direction for Qibla in {{ $selectedCity }}.

{{-- 📋 MONTHLY PRAYER TIMETABLE --}}

{{ $date->format('F Y') }} Prayer Times {{ $selectedCity }} — Monthly Timetable
-------------------------------------------------------------------------------

Complete namaz timing schedule for {{ $selectedCity }} for {{ $date->format('F Y') }}.

@foreach($monthlyTimes as $row)

@endforeach

Date / تاریخ

Fajr / فجر

Sunrise / طلوع

Dhuhr / ظہر

Asr / عصر

Maghrib / مغرب

Isha / عشاء

{{ $row\['day'\] }} {{ $date->format('M') }}

{{ $row\['fajr'\] }}

{{ $row\['sunrise'\] }}

{{ $row\['dhuhr'\] }}

{{ $row\['asr'\] }}

{{ $row\['maghrib'\] }}

{{ $row\['isha'\] }}

{{-- 🏙️ ALL PAKISTAN CITIES QUICK LINKS (Internal linking + SEO) --}}

Prayer Times All Cities Pakistan — پاکستان کے تمام شہروں کے اوقاتِ نماز
-----------------------------------------------------------------------

@foreach($cities as $cityName => $data)

[]({{ route('prayer-times.city', strtolower(str_replace(' ', '-', $cityName))) }})

[class="city-link {{ $selectedCity === $cityName ? 'active' : '' }}">]({{ route('prayer-times.city', strtolower(str_replace(' ', '-', $cityName))) }})

[{{ $cityName }}]({{ route('prayer-times.city', strtolower(str_replace(' ', '-', $cityName))) }})

[@if(isset($data\['urdu'\])) {{ $data\['urdu'\] }} @endif]({{ route('prayer-times.city', strtolower(str_replace(' ', '-', $cityName))) }})

[]({{ route('prayer-times.city', strtolower(str_replace(' ', '-', $cityName))) }})

@endforeach

{{-- ❓ FAQ SECTION — Google Featured Snippet target --}}

Frequently Asked Questions — اکثر پوچھے گئے سوالات
--------------------------------------------------

### 

Fajr time in {{ $selectedCity }} today?

Fajr time in {{ $selectedCity }} today

({{ $date->format('d M Y') }}) is

**{{ \\Carbon\\Carbon::instance($prayerTimes->fajr)->setTimezone($timezone)->format('h:i A') }}**.

Fajr ends at Sunrise which is

{{ \\Carbon\\Carbon::instance($prayerTimes->sunrise)->setTimezone($timezone)->format('h:i A') }}.

### 

What is namaz timing {{ $selectedCity }} today?

Namaz timing {{ $selectedCity }} today {{ $date->format('d M Y') }}:

Fajr {{ \\Carbon\\Carbon::instance($prayerTimes->fajr)->setTimezone($timezone)->format('h:i A') }},

Dhuhr {{ \\Carbon\\Carbon::instance($prayerTimes->dhuhr)->setTimezone($timezone)->format('h:i A') }},

Asr {{ \\Carbon\\Carbon::instance($prayerTimes->asr)->setTimezone($timezone)->format('h:i A') }},

Maghrib {{ \\Carbon\\Carbon::instance($prayerTimes->maghrib)->setTimezone($timezone)->format('h:i A') }},

Isha {{ \\Carbon\\Carbon::instance($prayerTimes->isha)->setTimezone($timezone)->format('h:i A') }}.

### 

Namaz timing {{ $selectedCity }} Hanafi vs Shafi difference?

Main difference is in Asr time. Hanafi Asr starts when shadow is twice the object length,

Shafi Asr starts when shadow equals object length. You can switch madhab using the selector above.

### 

What is Qibla direction in {{ $selectedCity }}?

Qibla direction in {{ $selectedCity }}, Pakistan is

**{{ number\_format($qiblaDirection, 2) }}°** from North (True North bearing).

You should face West-Northwest direction while praying in {{ $selectedCity }}.

{{-- 📖 SEO TEXT CONTENT BLOCK --}}

Namaz Timing {{ $selectedCity }} — Complete Guide
-------------------------------------------------

Namaz timing {{ $selectedCity }} today

**{{ $date->format('d F Y') }}**

({{ $hijriDate\['day'\] }} {{ $hijriDate\['month\_name'\] }} {{ $hijriDate\['year'\] }} Hijri).

Muslims in {{ $selectedCity }} offer 5 daily prayers (Fajr, Zuhr, Asr, Maghrib, Isha)

according to the Islamic schedule. Prayer times in {{ $selectedCity }} change daily

based on the sun's position.

Today's **Fajr time in {{ $selectedCity }}** is

{{ \\Carbon\\Carbon::instance($prayerTimes->fajr)->setTimezone($timezone)->format('h:i A') }}.

**Maghrib time {{ $selectedCity }}** today is

{{ \\Carbon\\Carbon::instance($prayerTimes->maghrib)->setTimezone($timezone)->format('h:i A') }}.

These timings are calculated using the University of Islamic Sciences, Karachi method

which is the official method for Pakistan.

**Azan time {{ $selectedCity }}** — The azaan is called at the start of each prayer time.

You can view the complete monthly prayer timetable for {{ $selectedCity }} above.

Times are calculated for both **Hanafi** and **Shafi** madhabs.

@endsection

@section('scripts')

</p><p class="slate-paragraph">// Live countdown to next prayer</p><p class="slate-paragraph">function updateCountdown() {</p><p class="slate-paragraph"> const now = new Date();</p><p class="slate-paragraph"> const nextPrayerTime = new Date("{{ \\Carbon\\Carbon::instance($prayerTimes->{strtolower($nextPrayer\[&#x27;name&#x27;\]) === &#x27;dhuhr&#x27; ? &#x27;dhuhr&#x27; : strtolower($nextPrayer\[&#x27;name&#x27;\])})->setTimezone($timezone)->toIso8601String() }}");</p><p class="slate-paragraph"> const diff = nextPrayerTime - now;</p><p class="slate-paragraph"> if (diff > 0) {</p><p class="slate-paragraph"> const h = Math.floor(diff / 3600000);</p><p class="slate-paragraph"> const m = Math.floor((diff % 3600000) / 60000);</p><p class="slate-paragraph"> const s = Math.floor((diff % 60000) / 1000);</p><p class="slate-paragraph"> document.getElementById(&#x27;live-countdown&#x27;).textContent =</p><p class="slate-paragraph"> String(h).padStart(2,&#x27;0&#x27;) + &#x27;:&#x27; + String(m).padStart(2,&#x27;0&#x27;) + &#x27;:&#x27; + String(s).padStart(2,&#x27;0&#x27;);</p><p class="slate-paragraph"> }</p><p class="slate-paragraph">}</p><p class="slate-paragraph">setInterval(updateCountdown, 1000);</p><p class="slate-paragraph">updateCountdown();</p><p class="slate-paragraph">

@endsection

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📁 STEP 5: SITEMAP — SEO ke liye zaroori

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

// routes/web.php mein add karo

Route::get('/sitemap.xml', function() {

$cities = config('pakistan\_cities');

$content = view('sitemap', compact('cities'));

return response($content, 200, \['Content-Type' => 'application/xml'\]);

});

\`\`\`

resources/views/sitemap.blade.php:

\`\`\`xml

{{ url('/prayer-times') }}

daily

1.0

@foreach($cities as $cityName => $data)

{{ url('/prayer-times/' . strtolower(str\_replace(' ', '-', $cityName))) }}

daily

0.9

@endforeach

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔑 STEP 6: HIGH VOLUME SEO KEYWORDS

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Har city page ke H1, H2, meta mein ye keywords naturally use karo:

PRIMARY (15k+ searches/month):

\- "namaz timing \[city\]"

\- "prayer time in \[city\]"

\- "fajr time \[city\]"

\- "azan time \[city\]"

\- "maghrib time \[city\]"

SECONDARY (5k-15k/month):

\- "namaz time today \[city\]"

\- "fajr time \[city\] today"

\- "isha time in \[city\]"

\- "zohar namaz time \[city\]"

\- "asr time \[city\]"

\- "namaz timing \[city\] hanafi"

\- "\[city\] prayer times today"

LONG TAIL (1k-5k/month):

\- "fajr namaz time in \[city\] today"

\- "today namaz timing \[city\]"

\- "azan time in \[city\] today"

\- "namaz timing \[city\] ahle sunnat"

\- "shia fajr time \[city\]"

\- "fajr end time \[city\]"

\- "qibla direction \[city\]"

\- "monthly prayer timetable \[city\]"

\- "islamabad/lahore/karachi namaz schedule"

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

⚡ STEP 7: PERFORMANCE (Google ranks fast sites)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1\. Cache prayer times: Cache::remember("prayer\_{$city}\_{$date}", 3600, fn() => ...)

2\. Add response cache middleware for city pages

3\. Compress images, use lazy loading

4\. Add robots.txt: Allow all prayer-time pages

5\. Submit sitemap.xml to Google Search Console

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ COMPETITOR SE 100X ZYADA YE CHEEZEN ADD KARO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

HamariWeb NAHI karta — TUM KARO:

✅ Live countdown timer to next prayer

✅ Sunnah times (Tahajjud, Ishraq, Chaasht, Zawal)

✅ Hanafi + Shafi toggle

✅ Qibla direction with compass

✅ Hijri date (Arabic + Urdu month names)

✅ Multiple calculation methods (Karachi, MWL, Egyptian)

✅ FAQ schema for featured snippets

✅ All 120+ Pakistan cities (not just major ones)

✅ Monthly timetable on same page

✅ City-specific SEO URLs (/prayer-times/lahore)

✅ Bilingual content (English + Urdu)

✅ Dark/Light mode

✅ Mobile-first design

✅ Schema.org structured data

✅ Auto-detect location (use JS Geolocation API)