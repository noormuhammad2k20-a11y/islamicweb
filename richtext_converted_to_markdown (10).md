Ye mera Islamic website Laravel project hai.

GitHub: https://github.com/noormuhammad2k20-a11y/islamicweb

Competitor: https://hamariweb.com/islam/islamic-calendar.aspx

IMPORTANT RULES:

1\. Theme/design bilkul change mat karna — sirf content + SEO + functionality add karo

2\. Har page mein 90%+ unique content ho — 5% bhi duplicate allowed nahi

3\. /islamic-date aur /islamic-calendar ko MERGE karo — ek hi page banao

4\. Programmatic SEO banao — ek template se hazaron keywords rank hon

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🗺️ PART A: PROGRAMMATIC SEO PAGE STRUCTURE

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Ye SEPARATE pages/URLs banao. Har page ka content 90%+ different hoga.

Ek bhi page duplicate nahi hoga. Ye Programmatic SEO hai.

PAGE 1 — Main Hub Page (MERGE /islamic-date + /islamic-calendar)

URL: /islamic-calendar

Redirect: /islamic-date → /islamic-calendar (301)

Target keywords: "islamic calendar 2026", "islamic date today",

"islamic calendar date today", "today's date according to islamic calendar"

Content focus: Full year 12-month visual calendar + today's date hero

PAGE 2 — Today's Date Focus Page

URL: /islamic-date-today

Target keywords: "islamic date today", "islamic date today in pakistan",

"today islamic date", "exact islamic date today", "todays islamic date"

Content focus: ONLY today's date — big hero, Saudi vs Pakistan comparison,

all cities, FAQ. NO full calendar here.

PAGE 3 — Pakistan Date Page

URL: /islamic-date-pakistan

Target keywords: "islamic date today in pakistan",

"today islamic date pakistan", "what is islamic date today in pakistan",

"which islamic date is today in pakistan", "today pakistan islamic date",

"today date islamic in pakistan"

Content focus: Pakistan-specific. Ruet-e-Hilal committee info,

why Pakistan date differs, all 8 provinces dates.

PAGE 4 — Saudi Arabia Date Page

URL: /islamic-date-saudi-arabia

Target keywords: "islamic date today in saudi",

"islamic date today in saudi arabia",

"saudi arabia islamic date today",

"today islamic date in saudi arabia 2026",

"what is islamic date today in saudi arabia"

Content focus: Saudi Arabia Umm al-Qura calendar explanation,

Saudi vs Pakistan difference, UAE + Arab countries dates.

PAGE 5 — City-Specific Pages (Programmatic — ek template, 10+ pages)

URLs: /islamic-date/karachi, /islamic-date/lahore,

/islamic-date/rawalpindi, /islamic-date/faisalabad,

/islamic-date/islamabad, /islamic-date/peshawar,

/islamic-date/quetta, /islamic-date/multan

Target keywords (per city):

"islamic date today in \[city\]"

"today islamic date in \[city\]"

"islamic date today \[city\]"

"\[city\] islamic date today"

Content focus: City name prominently, local Islamic events in that city,

nearest mosque info, city's Islamic history paragraph (unique per city).

PAGE 6 — Year-Specific Archive Pages (Programmatic)

URLs: /islamic-calendar/2026, /islamic-calendar/2025,

/islamic-calendar/2024, /islamic-calendar/2023,

/islamic-calendar/2019, /islamic-calendar/2018

Target keywords:

"islamic calendar 2026 today date"

"islamic date today in pakistan 2026"

"today islamic date in pakistan 2026"

"islamic calendar 2018 today date"

"islamic date today 2018"

"islamic date today in pakistan 2018"

"islamic calendar 2019 today date"

Content focus: That year's full calendar, major Islamic events of that year,

Ramadan dates that year, Eid dates that year. All unique per year.

PAGE 7 — Urdu Date Page

URL: /islamic-date-urdu / /urdu-date-today

Target keywords: "islamic date today in urdu",

"urdu date today", "aaj ki islamic tarikh"

Content focus: FULL Urdu language page. All content in Urdu script.

Urdu month names, Urdu day names, Urdu FAQ.

PAGE 8 — Islamic Month Pages (Programmatic — 12 pages)

URLs: /islamic-month/muharram, /islamic-month/safar,

/islamic-month/rabi-ul-awwal ... (all 12)

Target keywords: "muharram 1448", "safar month", "rabi ul awwal date",

"shaban 1448", "ramadan 2026 islamic date"

Content focus: Each month's significance, important dates, duas,

Islamic events in that month. 100% unique content per month.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🗄️ PART B: DATABASE — EXISTING TABLES USE KARO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Database mein ye tables already hain — inhe USE karo, naya mat banao:

\- cities (Pakistan cities with lat/lng)

\- prayer\_times

\- hijri\_months (month info)

\- islamic\_calendar

Ye NEW tables ADD karo:

\`\`\`sql

\-- Year-wise Islamic events for archive pages

CREATE TABLE islamic\_year\_events (

id INT AUTO\_INCREMENT PRIMARY KEY,

hijri\_year INT NOT NULL,

gregorian\_year INT NOT NULL,

event\_name VARCHAR(255) NOT NULL,

event\_name\_urdu VARCHAR(255),

hijri\_date VARCHAR(50),

gregorian\_date DATE,

event\_type ENUM('eid','ramadan','hajj','muharram','other'),

description TEXT,

description\_urdu TEXT,

created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

);

\-- City-specific Islamic content for programmatic city pages

CREATE TABLE city\_islamic\_content (

id INT AUTO\_INCREMENT PRIMARY KEY,

city\_id INT NOT NULL,

city\_name VARCHAR(100) NOT NULL,

city\_slug VARCHAR(100) NOT NULL UNIQUE,

islamic\_history TEXT NOT NULL COMMENT 'Unique per city — 200+ words',

famous\_mosques TEXT COMMENT 'JSON array of mosque names',

local\_events TEXT COMMENT 'Local Islamic events',

meta\_title VARCHAR(160),

meta\_description VARCHAR(320),

FOREIGN KEY (city\_id) REFERENCES cities(id)

);

\-- Islamic month detailed content

CREATE TABLE islamic\_month\_content (

id INT AUTO\_INCREMENT PRIMARY KEY,

month\_number TINYINT NOT NULL UNIQUE,

month\_name\_en VARCHAR(50) NOT NULL,

month\_name\_urdu VARCHAR(100) NOT NULL,

month\_name\_arabic VARCHAR(100) NOT NULL,

significance\_en TEXT NOT NULL COMMENT '300+ words unique content',

significance\_urdu TEXT,

important\_dates JSON COMMENT '\[{"date":"10","event":"Ashura"}\]',

recommended\_ibadah TEXT,

hadith\_about\_month TEXT,

meta\_title VARCHAR(160),

meta\_description VARCHAR(320),

slug VARCHAR(100) NOT NULL UNIQUE

);

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔧 PART C: MAIN CONTROLLER

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

File: app/Http/Controllers/IslamicCalendarController.php

\`\`\`php

namespace App\\Http\\Controllers;

use Carbon\\Carbon;

use Illuminate\\Http\\Request;

use App\\Models\\City;

use App\\Models\\IslamicYearEvent;

use App\\Models\\CityIslamicContent;

use App\\Models\\IslamicMonthContent;

class IslamicCalendarController extends Controller

{

// ── PAGE 1: Main Calendar Hub ─────────────────────────

public function mainCalendar(Request $request)

{

$year = $request->get('year', now()->year);

$month = $request->get('month', now()->month);

$nowPK = Carbon::now('Asia/Karachi');

$nowSA = Carbon::now('Asia/Riyadh');

$hijriPK = $this->toHijri($nowPK);

$hijriSA = $this->toHijri($nowSA);

// Full year 12-month calendar data

$fullYearCalendar = $this->buildFullYearCalendar($year);

// Current month Gregorian-Hijri grid

$currentMonthGrid = $this->buildMonthGrid($year, $month);

// Islamic events for this year from DB

$yearEvents = IslamicYearEvent::where('gregorian\_year', $year)

\->orderBy('gregorian\_date')->get();

$seoData = \[

'title' => "Islamic Calendar {$year} | Islamic Date Today | Hijri Calendar {$hijriPK\['year'\]} AH",

'description' => "Islamic calendar {$year} with Hijri dates. Islamic date today in Pakistan is {$hijriPK\['day'\]} {$hijriPK\['month\_name'\]} {$hijriPK\['year'\]}. Complete Islamic calendar {$year} with all months, Ramadan, Eid dates.",

'canonical' => url('/islamic-calendar'),

\];

return view('islamic-calendar.main', compact(

'nowPK','hijriPK','hijriSA','fullYearCalendar',

'currentMonthGrid','yearEvents','year','month','seoData'

));

}

// ── PAGE 2: Today's Date Focus ────────────────────────

public function islamicDateToday()

{

$nowPK = Carbon::now('Asia/Karachi');

$nowSA = Carbon::now('Asia/Riyadh');

$hijriPK = $this->toHijri($nowPK);

$hijriSA = $this->toHijri($nowSA);

// Pakistan major cities

$pkCities = \['Karachi','Lahore','Islamabad','Rawalpindi','Faisalabad','Peshawar','Quetta','Multan'\];

$citiesData = \[\];

foreach ($pkCities as $c) {

$citiesData\[$c\] = $this->toHijri(Carbon::now('Asia/Karachi'));

}

$monthContent = IslamicMonthContent::where('month\_number', $hijriPK\['month'\])->first();

$seoData = \[

'title' => "Islamic Date Today {$nowPK->format('d F Y')} | {$hijriPK\['day'\]} {$hijriPK\['month\_name'\]} {$hijriPK\['year'\]} | Today Islamic Date Pakistan",

'description' => "Islamic date today in Pakistan is {$hijriPK\['day'\]} {$hijriPK\['month\_name'\]} {$hijriPK\['year'\]} AH ({$nowPK->format('d F Y')}). Saudi Arabia Islamic date today is {$hijriSA\['day'\]} {$hijriSA\['month\_name'\]}. Exact Islamic date today in Karachi, Lahore, Rawalpindi, Faisalabad.",

'canonical' => url('/islamic-date-today'),

\];

return view('islamic-calendar.today', compact(

'nowPK','hijriPK','hijriSA','citiesData','monthContent','seoData'

));

}

// ── PAGE 3: Pakistan Specific ─────────────────────────

public function pakistanDate()

{

$nowPK = Carbon::now('Asia/Karachi');

$hijriPK = $this->toHijri($nowPK);

// 8 provinces data

$provinces = \[

'Punjab' => \['cities'=>\['Lahore','Faisalabad','Rawalpindi','Multan','Gujranwala','Sialkot'\]\],

'Sindh' => \['cities'=>\['Karachi','Hyderabad','Sukkur','Nawabshah'\]\],

'KPK' => \['cities'=>\['Peshawar','Abbottabad','Mardan','Swat'\]\],

'Balochistan' => \['cities'=>\['Quetta','Gwadar','Turbat','Khuzdar'\]\],

'AJK' => \['cities'=>\['Muzaffarabad','Mirpur'\]\],

'GB' => \['cities'=>\['Gilgit','Skardu','Chitral'\]\],

'ICT' => \['cities'=>\['Islamabad'\]\],

'FATA' => \['cities'=>\['Peshawar','Bannu'\]\],

\];

$seoData = \[

'title' => "Islamic Date Today in Pakistan {$nowPK->format('d F Y')} | {$hijriPK\['day'\]} {$hijriPK\['month\_name'\]} {$hijriPK\['year'\]} | Today Islamic Date Pakistan 2026",

'description' => "Today Islamic date in Pakistan is {$hijriPK\['day'\]} {$hijriPK\['month\_name'\]} {$hijriPK\['year'\]} AH. Official Pakistan Hijri date per Ruet-e-Hilal Committee. All provinces: Punjab, Sindh, KPK, Balochistan. Which Islamic date is today in Pakistan.",

'canonical' => url('/islamic-date-pakistan'),

\];

return view('islamic-calendar.pakistan', compact(

'nowPK','hijriPK','provinces','seoData'

));

}

// ── PAGE 4: Saudi Arabia Date ─────────────────────────

public function saudiDate()

{

$nowSA = Carbon::now('Asia/Riyadh');

$nowUAE = Carbon::now('Asia/Dubai');

$hijriSA = $this->toHijri($nowSA);

$hijriUAE = $this->toHijri($nowUAE);

$hijriPK = $this->toHijri(Carbon::now('Asia/Karachi'));

// Arab countries

$arabCountries = \[

'Saudi Arabia' => \['tz'=>'Asia/Riyadh','flag'=>'🇸🇦'\],

'UAE' => \['tz'=>'Asia/Dubai','flag'=>'🇦🇪'\],

'Kuwait' => \['tz'=>'Asia/Kuwait','flag'=>'🇰🇼'\],

'Qatar' => \['tz'=>'Asia/Qatar','flag'=>'🇶🇦'\],

'Bahrain' => \['tz'=>'Asia/Bahrain','flag'=>'🇧🇭'\],

'Jordan' => \['tz'=>'Asia/Amman','flag'=>'🇯🇴'\],

'Egypt' => \['tz'=>'Africa/Cairo','flag'=>'🇪🇬'\],

'Turkey' => \['tz'=>'Europe/Istanbul','flag'=>'🇹🇷'\],

\];

$countriesData = \[\];

foreach ($arabCountries as $name => $info) {

$countriesData\[$name\] = array\_merge($info, $this->toHijri(Carbon::now($info\['tz'\])));

}

$seoData = \[

'title' => "Islamic Date Today in Saudi Arabia | {$hijriSA\['day'\]} {$hijriSA\['month\_name'\]} {$hijriSA\['year'\]} | Saudi Arabia Islamic Date Today 2026",

'description' => "Islamic date today in Saudi Arabia is {$hijriSA\['day'\]} {$hijriSA\['month\_name'\]} {$hijriSA\['year'\]} AH. UAE, Kuwait, Qatar Islamic date. Saudi Arabia vs Pakistan Islamic date difference explained.",

'canonical' => url('/islamic-date-saudi-arabia'),

\];

return view('islamic-calendar.saudi', compact(

'nowSA','hijriSA','hijriUAE','hijriPK','countriesData','seoData'

));

}

// ── PAGE 5: City Pages (Programmatic) ─────────────────

public function cityPage(string $citySlug)

{

$city = City::where('slug', $citySlug)->firstOrFail();

$cityContent = CityIslamicContent::where('city\_slug', $citySlug)->first();

$nowPK = Carbon::now('Asia/Karachi');

$hijri = $this->toHijri($nowPK);

$cityName = $city->name;

$seoData = \[

'title' => "Islamic Date Today in {$cityName} | {$hijri\['day'\]} {$hijri\['month\_name'\]} {$hijri\['year'\]} | Today Islamic Date {$cityName}",

'description' => "Islamic date today in {$cityName} is {$hijri\['day'\]} {$hijri\['month\_name'\]} {$hijri\['year'\]} AH ({$nowPK->format('d F Y')}). Today Islamic date {$cityName} Pakistan. Exact Hijri date {$cityName}.",

'canonical' => url("/islamic-date/{$citySlug}"),

\];

return view('islamic-calendar.city', compact(

'city','cityContent','nowPK','hijri','cityName','seoData'

));

}

// ── PAGE 6: Year Archive (Programmatic) ───────────────

public function yearArchive(int $year)

{

// Supported years: 2018–2026

abort\_if($year < 2018 || $year > 2030, 404);

$nowPK = Carbon::now('Asia/Karachi');

$fullYearCalendar = $this->buildFullYearCalendar($year);

$yearEvents = IslamicYearEvent::where('gregorian\_year', $year)

\->orderBy('gregorian\_date')->get();

// Hijri year(s) for this Gregorian year

$startHijri = $this->toHijri(Carbon::create($year, 1, 1));

$endHijri = $this->toHijri(Carbon::create($year, 12, 31));

$seoData = \[

'title' => "Islamic Calendar {$year} | Hijri Calendar {$startHijri\['year'\]}–{$endHijri\['year'\]} | Islamic Date {$year} Pakistan",

'description' => "Complete Islamic calendar {$year} with Hijri dates. All 12 months, Ramadan {$year}, Eid dates, Muharram. Islamic calendar {$year} today date in Pakistan. Hijri calendar {$startHijri\['year'\]} AH.",

'canonical' => url("/islamic-calendar/{$year}"),

\];

return view('islamic-calendar.year', compact(

'year','fullYearCalendar','yearEvents',

'startHijri','endHijri','seoData'

));

}

// ── PAGE 7: Urdu Date Page ────────────────────────────

public function urduDate()

{

$nowPK = Carbon::now('Asia/Karachi');

$hijri = $this->toHijri($nowPK);

$seoData = \[

'title' => "آج کی اسلامی تاریخ | Islamic Date Today in Urdu | اسلامی تاریخ {$hijri\['day'\]} {$hijri\['month\_urdu'\]}",

'description' => "آج کی اسلامی تاریخ {$hijri\['day'\]} {$hijri\['month\_urdu'\]} {$hijri\['year'\]} ہجری ہے۔ Islamic date today in Urdu. پاکستان میں آج کی اسلامی تاریخ۔",

'canonical' => url('/islamic-date-urdu'),

\];

return view('islamic-calendar.urdu', compact('nowPK','hijri','seoData'));

}

// ── PAGE 8: Month Pages (Programmatic) ────────────────

public function monthPage(string $monthSlug)

{

$content = IslamicMonthContent::where('slug', $monthSlug)->firstOrFail();

$nowPK = Carbon::now('Asia/Karachi');

$hijriPK = $this->toHijri($nowPK);

$isCurrentMonth = ($content->month\_number === $hijriPK\['month'\]);

$seoData = \[

'title' => "{$content->month\_name\_en} {$hijriPK\['year'\]} | {$content->month\_name\_urdu} | Islamic Month {$content->month\_name\_en}",

'description' => "{$content->month\_name\_en} is the {$content->month\_number}th month of the Islamic calendar. ".substr($content->significance\_en,0,120)."...",

'canonical' => url("/islamic-month/{$monthSlug}"),

\];

return view('islamic-calendar.month', compact(

'content','nowPK','hijriPK','isCurrentMonth','seoData'

));

}

// ── HELPER: Hijri Conversion ──────────────────────────

public function toHijri(Carbon $date): array

{

$h = new \\Uploder\\HijriDate\\HijriDate($date->day, $date->month, $date->year);

$m = $h->getHijriMonth();

return \[

'day' => $h->getHijriDay(),

'month' => $m,

'year' => $h->getHijriYear(),

'month\_name' => $h->getHijriMonthName(),

'month\_urdu' => $this->monthUrdu($m),

'month\_arabic' => $this->monthArabic($m),

'day\_name' => $date->locale('en')->isoFormat('dddd'),

'day\_urdu' => $this->dayUrdu($date->dayOfWeek),

'formatted' => $h->getHijriDay().' '.$h->getHijriMonthName().' '.$h->getHijriYear().' AH',

\];

}

// ── HELPER: Build Full Year Calendar ─────────────────

private function buildFullYearCalendar(int $year): array

{

$calendar = \[\];

for ($m = 1; $m <= 12; $m++) {

$days = Carbon::create($year, $m, 1)->daysInMonth;

$monthDays = \[\];

for ($d = 1; $d <= $days; $d++) {

$date = Carbon::create($year, $m, $d, 0, 0, 0, 'Asia/Karachi');

$hijri = $this->toHijri($date);

$monthDays\[\] = \[

'gregorian\_day' => $d,

'day\_of\_week' => $date->dayOfWeek,

'hijri\_day' => $hijri\['day'\],

'hijri\_month' => $hijri\['month'\],

'hijri\_month\_name' => $hijri\['month\_name'\],

'hijri\_year' => $hijri\['year'\],

'is\_today' => $date->isToday(),

'is\_friday' => $date->isFriday(),

\];

}

$calendar\[$m\] = \[

'month\_num' => $m,

'month\_name' => Carbon::create($year,$m,1)->format('F'),

'days' => $monthDays,

'first\_dow' => Carbon::create($year,$m,1)->dayOfWeek,

\];

}

return $calendar;

}

private function buildMonthGrid(int $year, int $month): array

{

return $this->buildFullYearCalendar($year)\[$month\] ?? \[\];

}

private function monthUrdu(int $m): string

{

return \['','محرم','صفر','ربیع الاول','ربیع الثانی','جمادی الاول','جمادی الثانی','رجب','شعبان','رمضان','شوال','ذوالقعدہ','ذوالحجہ'\]\[$m\]??'';

}

private function monthArabic(int $m): string

{

return \['','مُحَرَّم','صَفَر','رَبِيع ٱلْأَوَّل','رَبِيع ٱلثَّانِي','جُمَادَى ٱلْأُولَى','جُمَادَى ٱلثَّانِيَة','رَجَب','شَعْبَان','رَمَضَان','شَوَّال','ذُو ٱلْقَعْدَة','ذُو ٱلْحِجَّة'\]\[$m\]??'';

}

private function dayUrdu(int $d): string

{

return \['اتوار','پیر','منگل','بدھ','جمعرات','جمعہ','ہفتہ'\]\[$d\]??'';

}

}

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🌐 PART D: ALL ROUTES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

use App\\Http\\Controllers\\IslamicCalendarController;

// Redirect old pages

Route::redirect('/islamic-date', '/islamic-calendar', 301);

// Main pages

Route::get('/islamic-calendar', \[IslamicCalendarController::class, 'mainCalendar'\])->name('islamic-calendar');

Route::get('/islamic-date-today', \[IslamicCalendarController::class, 'islamicDateToday'\])->name('islamic-date-today');

Route::get('/islamic-date-pakistan', \[IslamicCalendarController::class, 'pakistanDate'\])->name('islamic-date-pakistan');

Route::get('/islamic-date-saudi-arabia',\[IslamicCalendarController::class, 'saudiDate'\])->name('islamic-date-saudi');

Route::get('/islamic-date-urdu', \[IslamicCalendarController::class, 'urduDate'\])->name('islamic-date-urdu');

// Programmatic: City pages

Route::get('/islamic-date/{city}', \[IslamicCalendarController::class, 'cityPage'\])

\->name('islamic-date-city')

\->where('city','\[a-z\\-\]+');

// Programmatic: Year archive

Route::get('/islamic-calendar/{year}', \[IslamicCalendarController::class, 'yearArchive'\])

\->name('islamic-calendar-year')

\->where('year','\[0-9\]{4}');

// Programmatic: Month pages

Route::get('/islamic-month/{month}', \[IslamicCalendarController::class, 'monthPage'\])

\->name('islamic-month')

\->where('month','\[a-z\\-\]+');

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📄 PART E: VIEWS — 90% UNIQUE CONTENT PER PAGE

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Har view ke liye alag blade file banao:

\- resources/views/islamic-calendar/main.blade.php

\- resources/views/islamic-calendar/today.blade.php

\- resources/views/islamic-calendar/pakistan.blade.php

\- resources/views/islamic-calendar/saudi.blade.php

\- resources/views/islamic-calendar/city.blade.php

\- resources/views/islamic-calendar/year.blade.php

\- resources/views/islamic-calendar/urdu.blade.php

\- resources/views/islamic-calendar/month.blade.php

Har view mein ye cheezein DIFFERENT hongi:

1\. H1 heading (keyword-specific per page)

2\. Hero section (different layout per page)

3\. SEO text paragraphs (100% unique)

4\. FAQ questions (different per page)

5\. Sidebar content (different per page)

Shared component (partial) banao:

\- resources/views/islamic-calendar/partials/\_date-card.blade.php

(Pakistan + Saudi date cards)

\- resources/views/islamic-calendar/partials/\_month-grid.blade.php

(calendar grid component)

\- resources/views/islamic-calendar/partials/\_faq.blade.php

(FAQ accordion — questions passed as variable)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔑 PART F: KEYWORD → PAGE MAPPING

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Har keyword sirf ek page pe target hoga:

/islamic-calendar:

→ "islamic calendar 2026" (1,000/mo)

→ "islamic calendar date today" (6,600/mo)

→ "islamic calendar 2026 today date" (1,000/mo)

→ "today's date according to islamic calendar" (720/mo)

→ "islamic month date today" (22,200/mo)

/islamic-date-today:

→ "islamic date today" (823,000/mo) ← MAIN TARGET

→ "today islamic date" (3,600/mo)

→ "exact islamic date today" (2,900/mo)

→ "todays islamic date" (2,400/mo)

→ "islamic moon date today" (720/mo)

→ "moon date islamic today" (720/mo)

→ "which date of islamic month today" (1,000/mo)

/islamic-date-pakistan:

→ "islamic date today in pakistan" (135,000/mo)

→ "today islamic date pakistan" (22,200/mo)

→ "what is islamic date today in pakistan" (2,400/mo)

→ "which islamic date is today in pakistan" (1,000/mo)

→ "today pakistan islamic date" (880/mo)

→ "today date islamic in pakistan" (720/mo)

→ "islamic date today in pakistan madani channel" (1,600/mo)

→ "today islamic date in pakistan 2026" (9,900/mo)

→ "today islamic date in pakistan 2018" (3,600/mo)

→ "islamic date today in pakistan 2018" (9,900/mo)

/islamic-date-saudi-arabia:

→ "islamic date today in saudi" (14,800/mo)

→ "islamic date today in saudi arabia" (14,800/mo)

→ "saudi arabia islamic date today" (14,800/mo)

→ "islamic date today in uae" (720/mo)

→ "today islamic date in saudi arabia 2026" (720/mo)

→ "what is islamic date today in saudi arabia" (720/mo)

/islamic-date/karachi:

→ "islamic date today in karachi" (12,100/mo)

→ "today islamic date in karachi" (12,100/mo)

/islamic-date/lahore:

→ "today islamic date in lahore pakistan" (9,900/mo)

→ "today islamic date in lahore" (880/mo)

/islamic-date/rawalpindi:

→ "islamic date today rawalpindi" (4,400/mo)

/islamic-date/faisalabad:

→ "islamic date today faisalabad" (2,900/mo)

→ "today islamic date faisalabad" (2,900/mo)

/islamic-calendar/2026:

→ "today islamic date in pakistan 2026" (9,900/mo)

→ "islamic calendar 2026 today date" (1,000/mo)

/islamic-calendar/2018:

→ "islamic date today in pakistan 2018" (9,900/mo)

→ "islamic calendar 2018 today date" (5,400/mo)

→ "islamic date today 2018" (4,400/mo)

→ "islamic calendar 2018 today date in pakistan" (1,600/mo)

/islamic-calendar/2019:

→ "islamic date today in pakistan 2019" (4,400/mo)

→ "islamic calendar 2019 today date" (1,000/mo)

→ "islamic calendar 2019 today date in pakistan" (1,300/mo)

/islamic-date-urdu:

→ "islamic date today in urdu" (2,900/mo)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📋 PART G: EACH PAGE REQUIRED SECTIONS

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

EVERY page must have:

1\. Unique H1 with primary keyword

2\. Pakistan + Saudi date display cards (partial)

3\. Page-specific UNIQUE content section (see below)

4\. 5–8 FAQ questions (keyword-matched, schema markup)

5\. SEO text block (200–300 words, 90% unique per page)

6\. Internal links to other pages

7\. Schema.org markup

Page-specific unique content:

main.blade.php:

\- Interactive 12-month year calendar (full grid with Hijri dates)

\- Month dropdown to navigate

\- Year selector (2018–2030)

\- Islamic events timeline for the year

\- "Current Month" highlighted

\- Competitor HamariWeb has this BUT: add event tooltips on hover,

Islamic event badges (Ramadan, Eid, Muharram), export/print button

today.blade.php:

\- GIANT date display (day number huge font)

\- Live clock showing current Pakistan time

\- "Days passed in Hijri year" progress bar

\- "Days remaining in Hijri month" countdown

\- All Pakistan cities table

\- Tomorrow's Islamic date

\- UNIQUE vs competitor: live real-time display,

days counter, progress visualization

pakistan.blade.php:

\- Pakistan map showing all 8 provinces

\- Province-wise city table

\- Ruet-e-Hilal Committee official info

\- "Why Pakistan date differs from Saudi" explained

\- Islamic history of Pakistan paragraph

\- UNIQUE: province breakdown, official committee reference

saudi.blade.php:

\- Saudi Arabia Umm al-Qura calendar explanation

\- 8 Arab countries side-by-side

\- Makkah Mukarramah moon sighting tradition

\- Saudi vs Pakistan vs UK Islamic date table

\- UNIQUE: multi-country table, Umm al-Qura explanation

city.blade.php (karachi/lahore etc):

\- City name in H1 prominently

\- City's Islamic history (200 words from DB — unique per city)

\- Famous mosques of that city

\- City's local Islamic events

\- Prayer times of that city (link to prayer-times page)

\- UNIQUE: city-specific content from city\_islamic\_content table

year.blade.php (2018/2019/2023/2026):

\- Full year calendar grid

\- Ramadan dates that year

\- Both Eid dates

\- Major Islamic events

\- "What was Islamic date today in \[year\]" section

\- Hijri year span (e.g., "2026 covers 1447–1448 AH")

\- UNIQUE: year-specific events, historical context per year

urdu.blade.php:

\- ALL content in Urdu language only

\- Urdu month names, day names

\- Urdu FAQ

\- Urdu SEO text

\- Arabic script Hijri date display

\- UNIQUE: Full Urdu page — competitor has no dedicated Urdu page

month.blade.php:

\- Month significance (300+ words from DB)

\- Important dates in this month

\- Recommended ibadah

\- Hadith about this month

\- Current month's calendar

\- UNIQUE: deep Islamic educational content per month

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🗺️ PART H: SITEMAP ENTRIES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

sitemap.blade.php mein ye sab add karo:

Priority 1.0 (daily update):

/islamic-calendar

/islamic-date-today

/islamic-date-pakistan

/islamic-date-saudi-arabia

Priority 0.9 (daily):

/islamic-date/karachi

/islamic-date/lahore

/islamic-date/rawalpindi

/islamic-date/faisalabad

/islamic-date/islamabad

/islamic-date/peshawar

/islamic-date/quetta

/islamic-date/multan

Priority 0.8 (monthly):

/islamic-calendar/2026

/islamic-calendar/2025

/islamic-calendar/2024

/islamic-calendar/2023

/islamic-calendar/2019

/islamic-calendar/2018

Priority 0.7 (monthly):

/islamic-month/muharram

/islamic-month/safar

... (all 12)

/islamic-date-urdu

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

⚡ PART I: PERFORMANCE + CACHING

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

// Controller mein cache use karo

// Year archive pages (2018-2025) = 24 hours cache

$fullYearCalendar = Cache::remember("islamic\_cal\_{$year}", 86400,

fn() => $this->buildFullYearCalendar($year));

// Today's date = 1 hour cache

$hijriPK = Cache::remember('hijri\_pk\_'.now('Asia/Karachi')->format('Ymd'), 3600,

fn() => $this->toHijri(Carbon::now('Asia/Karachi')));

// City content = permanent cache (changes never)

$cityContent = Cache::rememberForever("city\_content\_{$citySlug}",

fn() => CityIslamicContent::where('city\_slug', $citySlug)->first());

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ COMPETITOR VS TUMHARA PAGE — COMPARISON

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

HamariWeb ke paas HAI:

✓ Main calendar page (1 page)

✓ Year selector

✓ Month grid with Hijri dates

✓ Pakistan + Global date

✓ Basic month info (Muharram facts)

HamariWeb ke paas NAHI — TUMHARE PAAS HOGA:

✅ 8 SEPARATE programmatic pages (vs unka 1 page)

✅ Dedicated Saudi Arabia page

✅ Dedicated Pakistan page with provinces

✅ 8 city-specific pages (/islamic-date/karachi etc)

✅ Year archive pages (2018–2026) — historical keywords

✅ Full Urdu language page

✅ 12 Islamic month detail pages

✅ Live countdown / days remaining in month

✅ Multi-country Arab countries table

✅ Province-wise Pakistan breakdown

✅ City-specific Islamic history content

✅ Islamic events badges on calendar

✅ Export/Print calendar button

✅ Internal linking network (prayer times ↔ islamic date ↔ calendar)

✅ All 50+ keywords mapped to dedicated pages

✅ Schema FAQ on every page

✅ Cache optimized (fast load)