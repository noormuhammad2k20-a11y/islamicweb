Ye mera Islamic website Laravel project hai.

GitHub: https://github.com/noormuhammad2k20-a11y/islamicweb

Competitor: https://hamariweb.com/islam/lahore\_prayer-timing5.aspx

STRICT RULES:

1\. Theme/design bilkul change mat karna — existing design exact same rahe

2\. Har page 90%+ unique content — zero duplicate

3\. Programmatic SEO — ek template se hundreds of pages

4\. Existing database tables USE karo: cities, prayer\_times, qibla\_data

5\. Libraries already installed: islamic-network/adhan, nesbot/carbon,

uploder/hijri-date, league/geotools

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🗺️ PART A: PROGRAMMATIC URL STRUCTURE — 500+ Pages

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

TIER 1 — Pakistan City Pages (120+ pages):

/prayer-times/lahore

/prayer-times/karachi

/prayer-times/islamabad

/prayer-times/rawalpindi

/prayer-times/faisalabad

/prayer-times/peshawar

/prayer-times/quetta

/prayer-times/multan

/prayer-times/gujranwala

/prayer-times/sialkot

/prayer-times/bahawalpur

/prayer-times/sargodha

/prayer-times/mardan

/prayer-times/wah-cantt

/prayer-times/abbottabad

/prayer-times/mandi-bahauddin

/prayer-times/mianwali

/prayer-times/rahim-yar-khan

/prayer-times/jhelum

/prayer-times/sahiwal

/prayer-times/sheikhupura

/prayer-times/swabi

/prayer-times/attock

/prayer-times/chakwal

/prayer-times/nowshera

/prayer-times/okara

... (tamam cities database se)

TIER 2 — UAE City Pages (15+ pages):

/prayer-times/dubai

/prayer-times/abu-dhabi

/prayer-times/sharjah

/prayer-times/ajman

/prayer-times/al-ain

/prayer-times/ras-al-khaimah

/prayer-times/fujairah

/prayer-times/umm-al-quwain

/prayer-times/mussafah

/prayer-times/jebel-ali

TIER 3 — Saudi Arabia Pages (20+ pages):

/prayer-times/makkah

/prayer-times/madinah

/prayer-times/riyadh

/prayer-times/jeddah

/prayer-times/dammam

/prayer-times/khobar

/prayer-times/jubail

/prayer-times/taif

/prayer-times/hail

/prayer-times/buraidah

/prayer-times/tabuk

/prayer-times/najran

/prayer-times/abha

/prayer-times/yanbu

/prayer-times/hofuf

/prayer-times/khamis-mushait

/prayer-times/masjid-al-haram ← Special page

/prayer-times/masjid-nabawi ← Special page

TIER 4 — India City Pages (20+ pages):

/prayer-times/bangalore

/prayer-times/mumbai

/prayer-times/chennai

/prayer-times/kochi

/prayer-times/calicut

/prayer-times/kozhikode

/prayer-times/hyderabad-india

/prayer-times/kannur

/prayer-times/malappuram

/prayer-times/thrissur

/prayer-times/delhi

/prayer-times/lucknow

/prayer-times/kolkata

/prayer-times/mangalore

/prayer-times/trivandrum

/prayer-times/kasaragod

TIER 5 — USA City Pages (15+ pages):

/prayer-times/new-york

/prayer-times/chicago

/prayer-times/houston

/prayer-times/los-angeles

/prayer-times/boston

/prayer-times/dallas

/prayer-times/philadelphia

/prayer-times/detroit

/prayer-times/minneapolis

/prayer-times/san-diego

/prayer-times/dearborn-michigan

/prayer-times/buffalo-ny

/prayer-times/atlanta

/prayer-times/seattle

/prayer-times/irvine-california

TIER 6 — Prayer-Specific Pages per City:

/prayer-times/lahore/fajr

/prayer-times/lahore/asr

/prayer-times/lahore/maghrib

/prayer-times/lahore/isha

/prayer-times/lahore/zuhr

(same for top 10 cities)

TIER 7 — Country Hub Pages:

/prayer-times/pakistan

/prayer-times/uae

/prayer-times/saudi-arabia

/prayer-times/india

/prayer-times/usa

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🗄️ PART B: DATABASE — NEW TABLES ADD KARO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Existing tables (already have): cities, prayer\_times, qibla\_data

New tables add karo:

\`\`\`sql

\-- World cities for UAE, Saudi, India, USA

CREATE TABLE world\_cities (

id INT AUTO\_INCREMENT PRIMARY KEY,

name VARCHAR(100) NOT NULL,

slug VARCHAR(100) NOT NULL UNIQUE,

country VARCHAR(100) NOT NULL,

country\_code CHAR(2) NOT NULL,

region VARCHAR(100),

latitude DECIMAL(10,7) NOT NULL,

longitude DECIMAL(10,7) NOT NULL,

timezone VARCHAR(50) NOT NULL,

population INT DEFAULT 0,

is\_featured TINYINT DEFAULT 0,

meta\_title VARCHAR(160),

meta\_description VARCHAR(320),

city\_intro TEXT COMMENT 'Unique 200-word intro per city',

famous\_mosques TEXT COMMENT 'JSON: mosque names',

islamic\_history TEXT COMMENT 'Unique Islamic history of city',

created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP,

INDEX idx\_country (country\_code),

INDEX idx\_slug (slug)

) ENGINE=InnoDB CHARSET=utf8mb4;

\-- Prayer-specific page content

CREATE TABLE prayer\_page\_content (

id INT AUTO\_INCREMENT PRIMARY KEY,

city\_slug VARCHAR(100) NOT NULL,

prayer\_name ENUM('fajr','zuhr','asr','maghrib','isha') NOT NULL,

content\_en TEXT NOT NULL COMMENT '200+ words unique per prayer per city',

content\_urdu TEXT,

rakats\_info TEXT NOT NULL,

fiqh\_details TEXT NOT NULL,

hadith\_reference TEXT,

UNIQUE KEY unique\_city\_prayer (city\_slug, prayer\_name)

) ENGINE=InnoDB CHARSET=utf8mb4;

\-- City Islamic content (extends cities table)

CREATE TABLE city\_prayer\_content (

id INT AUTO\_INCREMENT PRIMARY KEY,

city\_slug VARCHAR(100) NOT NULL UNIQUE,

country\_code CHAR(2) NOT NULL,

intro\_paragraph TEXT NOT NULL COMMENT 'UNIQUE per city 150+ words',

famous\_mosques\_list TEXT COMMENT 'JSON array',

local\_islamic\_events TEXT,

calculation\_method VARCHAR(100) DEFAULT 'Karachi',

madhab VARCHAR(20) DEFAULT 'Hanafi',

dawateislami\_time\_note TEXT COMMENT 'For cities with Dawateislami presence',

eid\_prayer\_venue TEXT,

jummah\_popular\_mosques TEXT,

created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP

) ENGINE=InnoDB CHARSET=utf8mb4;

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🌍 PART C: WORLD CITIES DATA — INSERT KARO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`sql

INSERT INTO world\_cities

(name, slug, country, country\_code, latitude, longitude, timezone, is\_featured) VALUES

\-- UAE

('Dubai','dubai','UAE','AE',25.2048,55.2708,'Asia/Dubai',1),

('Abu Dhabi','abu-dhabi','UAE','AE',24.4539,54.3773,'Asia/Dubai',1),

('Sharjah','sharjah','UAE','AE',25.3463,55.4209,'Asia/Dubai',1),

('Ajman','ajman','UAE','AE',25.4052,55.5136,'Asia/Dubai',1),

('Al Ain','al-ain','UAE','AE',24.2075,55.7447,'Asia/Dubai',1),

('Ras Al Khaimah','ras-al-khaimah','UAE','AE',25.7895,55.9432,'Asia/Dubai',1),

('Fujairah','fujairah','UAE','AE',25.1288,56.3265,'Asia/Dubai',1),

('Umm Al Quwain','umm-al-quwain','UAE','AE',25.5647,55.5553,'Asia/Dubai',0),

('Mussafah','mussafah','UAE','AE',24.3611,54.5050,'Asia/Dubai',0),

('Jebel Ali','jebel-ali','UAE','AE',24.9966,55.0603,'Asia/Dubai',0),

\-- Saudi Arabia

('Makkah','makkah','Saudi Arabia','SA',21.3891,39.8579,'Asia/Riyadh',1),

('Madinah','madinah','Saudi Arabia','SA',24.5247,39.5692,'Asia/Riyadh',1),

('Riyadh','riyadh','Saudi Arabia','SA',24.7136,46.6753,'Asia/Riyadh',1),

('Jeddah','jeddah','Saudi Arabia','SA',21.5433,39.1728,'Asia/Riyadh',1),

('Dammam','dammam','Saudi Arabia','SA',26.3927,49.9777,'Asia/Riyadh',1),

('Khobar','khobar','Saudi Arabia','SA',26.2172,50.1971,'Asia/Riyadh',1),

('Jubail','jubail','Saudi Arabia','SA',27.0046,49.6584,'Asia/Riyadh',0),

('Taif','taif','Saudi Arabia','SA',21.2854,40.4148,'Asia/Riyadh',1),

('Hail','hail','Saudi Arabia','SA',27.5114,41.7208,'Asia/Riyadh',0),

('Buraidah','buraidah','Saudi Arabia','SA',26.3260,43.9750,'Asia/Riyadh',0),

('Tabuk','tabuk','Saudi Arabia','SA',28.3998,36.5715,'Asia/Riyadh',0),

('Najran','najran','Saudi Arabia','SA',17.4920,44.1277,'Asia/Riyadh',0),

('Abha','abha','Saudi Arabia','SA',18.2164,42.5053,'Asia/Riyadh',0),

('Yanbu','yanbu','Saudi Arabia','SA',24.0895,38.0618,'Asia/Riyadh',0),

\-- India

('Bangalore','bangalore','India','IN',12.9716,77.5946,'Asia/Kolkata',1),

('Mumbai','mumbai','India','IN',19.0760,72.8777,'Asia/Kolkata',1),

('Chennai','chennai','India','IN',13.0827,80.2707,'Asia/Kolkata',1),

('Kochi','kochi','India','IN',9.9312,76.2673,'Asia/Kolkata',1),

('Calicut','calicut','India','IN',11.2588,75.7804,'Asia/Kolkata',1),

('Kozhikode','kozhikode','India','IN',11.2588,75.7804,'Asia/Kolkata',1),

('Kannur','kannur','India','IN',11.8745,75.3704,'Asia/Kolkata',1),

('Malappuram','malappuram','India','IN',11.0510,76.0711,'Asia/Kolkata',1),

('Thrissur','thrissur','India','IN',10.5276,76.2144,'Asia/Kolkata',1),

('Delhi','delhi','India','IN',28.7041,77.1025,'Asia/Kolkata',1),

('Lucknow','lucknow','India','IN',26.8467,80.9462,'Asia/Kolkata',1),

('Hyderabad','hyderabad-india','India','IN',17.3850,78.4867,'Asia/Kolkata',1),

\-- USA

('New York','new-york','USA','US',40.7128,-74.0060,'America/New\_York',1),

('Chicago','chicago','USA','US',41.8781,-87.6298,'America/Chicago',1),

('Houston','houston','USA','US',29.7604,-95.3698,'America/Chicago',1),

('Los Angeles','los-angeles','USA','US',34.0522,-118.2437,'America/Los\_Angeles',1),

('Boston','boston','USA','US',42.3601,-71.0589,'America/New\_York',1),

('Dallas','dallas','USA','US',32.7767,-96.7970,'America/Chicago',1),

('Philadelphia','philadelphia','USA','US',39.9526,-75.1652,'America/New\_York',1),

('Detroit','detroit','USA','US',42.3314,-83.0458,'America/Detroit',1),

('Minneapolis','minneapolis','USA','US',44.9778,-93.2650,'America/Chicago',1),

('San Diego','san-diego','USA','US',32.7157,-117.1611,'America/Los\_Angeles',1),

('Dearborn Michigan','dearborn-michigan','USA','US',42.3223,-83.1763,'America/Detroit',1),

('Buffalo NY','buffalo-ny','USA','US',42.8864,-78.8784,'America/New\_York',1);

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔧 PART D: CONTROLLER

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

File: app/Http/Controllers/PrayerTimesController.php

\`\`\`php

namespace App\\Http\\Controllers;

use Carbon\\Carbon;

use Illuminate\\Http\\Request;

use IslamicNetwork\\PrayerTimes\\PrayerTimes;

use IslamicNetwork\\PrayerTimes\\Models\\{Coordinates,CalculationMethod,Madhab,SunnahTimes,Qibla};

use App\\Models\\{City, WorldCity, CityPrayerContent, PrayerPageContent};

class PrayerTimesController extends Controller

{

// ── Country Hub ───────────────────────────────────────

public function countryHub(string $country)

{

$countryMap = \[

'pakistan' => \['code'=>'PK','name'=>'Pakistan','tz'=>'Asia/Karachi'\],

'uae' => \['code'=>'AE','name'=>'UAE','tz'=>'Asia/Dubai'\],

'saudi-arabia' => \['code'=>'SA','name'=>'Saudi Arabia','tz'=>'Asia/Riyadh'\],

'india' => \['code'=>'IN','name'=>'India','tz'=>'Asia/Kolkata'\],

'usa' => \['code'=>'US','name'=>'USA','tz'=>'America/New\_York'\],

\];

abort\_if(!isset($countryMap\[$country\]), 404);

$info = $countryMap\[$country\];

// Get all cities for this country

if ($info\['code'\] === 'PK') {

$cities = City::orderBy('name')->get();

} else {

$cities = WorldCity::where('country\_code', $info\['code'\])

\->orderByDesc('is\_featured')

\->orderBy('name')->get();

}

// Top 6 city prayer times

$topCities = $cities->take(6);

$topPrayers = \[\];

foreach ($topCities as $city) {

$lat = $city->latitude ?? $city->lat;

$lng = $city->longitude ?? $city->lng;

$tz = $city->timezone ?? $info\['tz'\];

$topPrayers\[$city->name\] = $this->calcPrayers($lat, $lng, $tz);

}

$seoData = $this->countryHubSeo($info, $country);

return view('prayer-times.country', compact(

'country','info','cities','topPrayers','seoData'

));

}

// ── City Page (Pakistan + World) ──────────────────────

public function cityPage(string $citySlug, Request $request)

{

$madhab = $request->get('madhab','hanafi');

$method = $request->get('method','Karachi');

// Find city — first in PK cities, then world

$city = City::where('slug', $citySlug)->first()

?? WorldCity::where('slug', $citySlug)->firstOrFail();

$lat = $city->latitude ?? $city->lat;

$lng = $city->longitude ?? $city->lng;

$tz = $city->timezone ?? 'Asia/Karachi';

$name = $city->name;

$country = $city->country ?? 'Pakistan';

// Prayer times

$prayers = $this->calcPrayers($lat, $lng, $tz, $madhab, $method);

$sunnah = $this->calcSunnah($prayers\['raw'\]);

$qibla = $this->calcQibla($lat, $lng);

$hijri = $this->toHijri(Carbon::now($tz));

$monthly = $this->buildMonthly($lat, $lng, $tz, $madhab, $method);

$next = $this->getNextPrayer($prayers, $tz);

$tomorrow = $this->buildTomorrow($lat, $lng, $tz, $madhab, $method);

// City content from DB

$content = CityPrayerContent::where('city\_slug', $citySlug)->first();

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

$validPrayers = \['fajr','zuhr','asr','maghrib','isha'\];

abort\_if(!in\_array($prayerName, $validPrayers), 404);

$city = City::where('slug', $citySlug)->first()

?? WorldCity::where('slug', $citySlug)->firstOrFail();

$lat = $city->latitude ?? $city->lat;

$lng = $city->longitude ?? $city->lng;

$tz = $city->timezone ?? 'Asia/Karachi';

$name = $city->name;

$prayers = $this->calcPrayers($lat, $lng, $tz);

$prayerContent = PrayerPageContent::where('city\_slug',$citySlug)

\->where('prayer\_name',$prayerName)->first();

$monthly = $this->buildMonthly($lat, $lng, $tz);

$seoData = $this->prayerSeo($name, $prayerName, $prayers, $tz);

return view('prayer-times.prayer', compact(

'city','name','citySlug','prayerName','prayers',

'prayerContent','monthly','seoData','tz'

));

}

// ── HELPERS ───────────────────────────────────────────

private function calcPrayers($lat,$lng,$tz,$madhab='hanafi',$method='Karachi'): array

{

$coords = new Coordinates($lat,$lng);

$params = CalculationMethod::$method();

$params->madhab = $madhab==='hanafi' ? Madhab::Hanafi : Madhab::Shafi;

$date = Carbon::now($tz);

$pt = new PrayerTimes($coords,$date->toDateTime(),$params);

$fmt = fn($t) => Carbon::instance($t)->setTimezone($tz)->format('h:i A');

$fmt24 = fn($t) => Carbon::instance($t)->setTimezone($tz)->format('H:i');

return \[

'fajr' => $fmt($pt->fajr), 'fajr\_24' => $fmt24($pt->fajr),

'sunrise' => $fmt($pt->sunrise), 'sunrise\_24' => $fmt24($pt->sunrise),

'dhuhr' => $fmt($pt->dhuhr), 'dhuhr\_24' => $fmt24($pt->dhuhr),

'asr' => $fmt($pt->asr), 'asr\_24' => $fmt24($pt->asr),

'maghrib' => $fmt($pt->maghrib), 'maghrib\_24' => $fmt24($pt->maghrib),

'isha' => $fmt($pt->isha), 'isha\_24' => $fmt24($pt->isha),

'raw' => $pt,

'date' => $date,

\];

}

private function calcSunnah($pt): array

{

$s = new SunnahTimes($pt);

return \[

'middle\_night' => $s->middleOfTheNight,

'last\_third' => $s->lastThirdOfTheNight,

\];

}

private function calcQibla($lat,$lng): float

{

return (new Qibla(new Coordinates($lat,$lng)))->direction;

}

private function buildMonthly($lat,$lng,$tz,$madhab='hanafi',$method='Karachi'): array

{

$now = Carbon::now($tz);

$days = $now->daysInMonth;

$rows = \[\];

for ($d=1; $d<=$days; $d++) {

$date = Carbon::create($now->year,$now->month,$d,0,0,0,$tz);

$coords = new Coordinates($lat,$lng);

$params = CalculationMethod::$method();

$params->madhab = $madhab==='hanafi' ? Madhab::Hanafi : Madhab::Shafi;

$pt = new PrayerTimes($coords,$date->toDateTime(),$params);

$fmt = fn($t) => Carbon::instance($t)->setTimezone($tz)->format('h:i A');

$rows\[\] = \[

'day' => $d,

'date' => $date->format('d M'),

'dow' => $date->format('D'),

'fajr' => $fmt($pt->fajr),

'sunrise' => $fmt($pt->sunrise),

'dhuhr' => $fmt($pt->dhuhr),

'asr' => $fmt($pt->asr),

'maghrib' => $fmt($pt->maghrib),

'isha' => $fmt($pt->isha),

'is\_today'=> $d === $now->day,

'is\_friday'=> $date->isFriday(),

\];

}

return $rows;

}

private function buildTomorrow($lat,$lng,$tz,$madhab='hanafi',$method='Karachi'): array

{

$tomorrow = Carbon::now($tz)->addDay();

$coords = new Coordinates($lat,$lng);

$params = CalculationMethod::$method();

$params->madhab = $madhab==='hanafi' ? Madhab::Hanafi : Madhab::Shafi;

$pt = new PrayerTimes($coords,$tomorrow->toDateTime(),$params);

$fmt = fn($t) => Carbon::instance($t)->setTimezone($tz)->format('h:i A');

return \['fajr'=>$fmt($pt->fajr),'dhuhr'=>$fmt($pt->dhuhr),

'asr'=>$fmt($pt->asr),'maghrib'=>$fmt($pt->maghrib),'isha'=>$fmt($pt->isha)\];

}

private function getNextPrayer(array $prayers, string $tz): array

{

$now = Carbon::now($tz);

$map = \['fajr'=>$prayers\['raw'\]->fajr,'dhuhr'=>$prayers\['raw'\]->dhuhr,

'asr'=>$prayers\['raw'\]->asr,'maghrib'=>$prayers\['raw'\]->maghrib,

'isha'=>$prayers\['raw'\]->isha\];

foreach ($map as $name=>$time) {

$t = Carbon::instance($time)->setTimezone($tz);

if ($now->lt($t)) {

$diff = $now->diff($t);

return \['name'=>ucfirst($name),'time'=>$t->format('h:i A'),

'countdown'=>sprintf('d:d:d',$diff->h,$diff->i,$diff->s),

'timestamp'=>$t->toIso8601String()\];

}

}

return \['name'=>'Fajr (Tomorrow)','time'=>$prayers\['fajr'\],'countdown'=>'00:00:00','timestamp'=>''\];

}

private function toHijri(Carbon $date): array

{

$h = new \\Uploder\\HijriDate\\HijriDate($date->day,$date->month,$date->year);

$m = $h->getHijriMonth();

return \['day'=>$h->getHijriDay(),'month'=>$m,'year'=>$h->getHijriYear(),

'month\_name'=>$h->getHijriMonthName(),

'month\_urdu'=>\['','محرم','صفر','ربیع الاول','ربیع الثانی','جمادی الاول',

'جمادی الثانی','رجب','شعبان','رمضان','شوال','ذوالقعدہ','ذوالحجہ'\]\[$m\]??''\];

}

private function getNearby($city, string $currentSlug): array

{

if ($city instanceof \\App\\Models\\City) {

return City::where('id','!=',$city->id)->inRandomOrder()->take(8)->get()->toArray();

}

return WorldCity::where('country\_code',$city->country\_code)

\->where('slug','!=',$currentSlug)->take(8)->get()->toArray();

}

private function citySeo($name,$country,$slug,$prayers,$hijri,$tz): array

{

$date = Carbon::now($tz)->format('d F Y');

return \[

'title' => "Prayer Time {$name} Today {$date} | Namaz Timing {$name} | Fajr {$prayers\['fajr'\]} Maghrib {$prayers\['maghrib'\]}",

'description' => "Prayer time {$name} today {$date}: Fajr {$prayers\['fajr'\]}, Dhuhr {$prayers\['dhuhr'\]}, Asr {$prayers\['asr'\]}, Maghrib {$prayers\['maghrib'\]}, Isha {$prayers\['isha'\]}. Islamic date {$hijri\['day'\]} {$hijri\['month\_name'\]} {$hijri\['year'\]} AH. Exact {$name} namaz timing.",

'canonical' => url("/prayer-times/{$slug}"),

\];

}

private function prayerSeo($name,$prayer,$prayers,$tz): array

{

$time = $prayers\[$prayer\];

$date = Carbon::now($tz)->format('d F Y');

return \[

'title' => ucfirst($prayer)." Time {$name} Today {$date} | {$prayer} Prayer Time {$name} | {$time}",

'description' => ucfirst($prayer)." prayer time in {$name} today is {$time}. ".ucfirst($prayer)." namaz time {$name} {$date}. Start time, end time, rakats, and monthly schedule.",

'canonical' => url("/prayer-times/{$name}/{$prayer}"),

\];

}

private function countryHubSeo($info,$country): array

{

return \[

'title' => "Prayer Times {$info\['name'\]} | Namaz Timing All Cities {$info\['name'\]} | Islamic Prayer Times",

'description' => "Prayer times in all cities of {$info\['name'\]}. Fajr, Dhuhr, Asr, Maghrib, Isha timings for {$info\['name'\]} cities. Today's prayer schedule for all {$info\['name'\]} cities.",

'canonical' => url("/prayer-times/{$country}"),

\];

}

}

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🌐 PART E: ROUTES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

use App\\Http\\Controllers\\PrayerTimesController;

// Country hubs

Route::get('/prayer-times/{country}', \[PrayerTimesController::class, 'countryHub'\])

\->where('country','pakistan|uae|saudi-arabia|india|usa')

\->name('prayer-times.country');

// Prayer-specific pages

Route::get('/prayer-times/{city}/{prayer}', \[PrayerTimesController::class, 'prayerPage'\])

\->where(\['city'=>'\[a-z0-9\\-\]+','prayer'=>'fajr|zuhr|asr|maghrib|isha'\])

\->name('prayer-times.prayer');

// City pages (Pakistan + World)

Route::get('/prayer-times/{city}', \[PrayerTimesController::class, 'cityPage'\])

\->where('city','\[a-z0-9\\-\]+')

\->name('prayer-times.city');

// Main /prayer-times (redirect to Pakistan hub)

Route::get('/prayer-times', fn() => redirect('/prayer-times/pakistan'))

\->name('prayer-times');

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📄 PART F: BLADE VIEWS — 4 UNIQUE TEMPLATES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Banao: resources/views/prayer-times/

country.blade.php ← Country hub

city.blade.php ← Individual city

prayer.blade.php ← Prayer-specific

partials/

\_countdown.blade.php

\_prayer-cards.blade.php

\_monthly-table.blade.php

\_sunnah-times.blade.php

\_qibla-compass.blade.php

\_faq.blade.php

\_nearby-cities.blade.php

\_schema.blade.php

CITY PAGE (city.blade.php) — Ye sections honge:

1\. SEO HEAD (meta title, description, canonical, schema)

2\. LIVE COUNTDOWN banner (next prayer)

3\. DATE BAR (Gregorian + Hijri + Islamic date)

4\. CITY HEADER (H1 with city name + country flag)

5\. MADHAB + METHOD SELECTOR

6\. 6-PRAYER CARDS GRID (fajr/sunrise/dhuhr/asr/maghrib/isha)

7\. SUNNAH TIMES (Tahajjud, Ishraq, Chaasht, Zawal)

8\. TOMORROW'S PRAYER TIMES (competitor ke paas NAHI)

9\. QIBLA COMPASS

10\. MONTHLY TABLE (30 days)

11\. CITY INTRO paragraph (unique from DB)

12\. FAMOUS MOSQUES of city (unique from DB)

13\. PRAYER-SPECIFIC FAQ (schema markup)

14\. RAKAT INFO TABLE (unique feature)

15\. SEO TEXT BLOCK (keyword-rich)

16\. NEARBY CITIES links

17\. INTERNAL LINKS to prayer-specific pages

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📋 PART G: CITY PAGE FULL BLADE (city.blade.php)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

@extends('layouts.app')

@section('seo')

\`\`\`html

{{ $seoData\['title'\] }}

</p><p class="slate-paragraph">{</p><p class="slate-paragraph"> "@context": "https://schema.org",</p><p class="slate-paragraph"> "@type": "WebPage",</p><p class="slate-paragraph"> "name": "{{ $seoData\[&#x27;title&#x27;\] }}",</p><p class="slate-paragraph"> "description": "{{ $seoData\[&#x27;description&#x27;\] }}",</p><p class="slate-paragraph"> "url": "{{ $seoData\[&#x27;canonical&#x27;\] }}",</p><p class="slate-paragraph"> "dateModified": "{{ now()->toIso8601String() }}"</p><p class="slate-paragraph">}</p><p class="slate-paragraph">

</p><p class="slate-paragraph">{</p><p class="slate-paragraph"> "@context": "https://schema.org",</p><p class="slate-paragraph"> "@type": "FAQPage",</p><p class="slate-paragraph"> "mainEntity": \[</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "Fajr time in {{ $name }} today?",</p><p class="slate-paragraph"> "acceptedAnswer": {"@type":"Answer","text":"Fajr time in {{ $name }} today {{ $prayers\[&#x27;date&#x27;\]->format(&#x27;d F Y&#x27;) }} is {{ $prayers\[&#x27;fajr&#x27;\] }}. Fajr ends at sunrise {{ $prayers\[&#x27;sunrise&#x27;\] }}."}</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "Prayer time {{ $name }} today?",</p><p class="slate-paragraph"> "acceptedAnswer": {"@type":"Answer","text":"Prayer times {{ $name }} today: Fajr {{ $prayers\[&#x27;fajr&#x27;\] }}, Dhuhr {{ $prayers\[&#x27;dhuhr&#x27;\] }}, Asr {{ $prayers\[&#x27;asr&#x27;\] }}, Maghrib {{ $prayers\[&#x27;maghrib&#x27;\] }}, Isha {{ $prayers\[&#x27;isha&#x27;\] }}."}</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "Asr time in {{ $name }} today?",</p><p class="slate-paragraph"> "acceptedAnswer": {"@type":"Answer","text":"Asr prayer time in {{ $name }} today is {{ $prayers\[&#x27;asr&#x27;\] }}. Asr ends at Maghrib time {{ $prayers\[&#x27;maghrib&#x27;\] }}."}</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "Maghrib time {{ $name }} today?",</p><p class="slate-paragraph"> "acceptedAnswer": {"@type":"Answer","text":"Maghrib prayer time {{ $name }} today is {{ $prayers\[&#x27;maghrib&#x27;\] }}. Maghrib time ends at Isha {{ $prayers\[&#x27;isha&#x27;\] }}."}</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "What is Isha time in {{ $name }}?",</p><p class="slate-paragraph"> "acceptedAnswer": {"@type":"Answer","text":"Isha prayer time {{ $name }} today is {{ $prayers\[&#x27;isha&#x27;\] }}."}</p><p class="slate-paragraph"> },</p><p class="slate-paragraph"> {</p><p class="slate-paragraph"> "@type": "Question",</p><p class="slate-paragraph"> "name": "What is Qibla direction in {{ $name }}?",</p><p class="slate-paragraph"> "acceptedAnswer": {"@type":"Answer","text":"Qibla direction from {{ $name }} is {{ number\_format($qibla,2) }}° from True North."}</p><p class="slate-paragraph"> }</p><p class="slate-paragraph"> \]</p><p class="slate-paragraph">}</p><p class="slate-paragraph">

\`\`\`

@section('content')

\`\`\`html

Next: **{{ $next\['name'\] }}**

{{ $next\['time'\] }}

{{ $next\['countdown'\] }}

{{ $prayers\['date'\]->format('l, d F Y') }}

{{ $hijri\['day'\] }} {{ $hijri\['month\_name'\] }} {{ $hijri\['year'\] }} AH — {{ $hijri\['month\_urdu'\] }}

Prayer Time {{ $name }}

@if($country==='UAE')🇦🇪@elseif($country==='Saudi Arabia')🇸🇦@elseif($country==='India')🇮🇳@elseif($country==='USA')🇺🇸@else🇵🇰@endif


=====================================================================================================================================================================

Today {{ $prayers\['date'\]->format('d M Y') }} —

Namaz Timing {{ $name }} — Azan Time {{ $name }}

{{ $name }} نماز کے اوقات

Hanafi (حنفی)

Shafi (شافعی)

Karachi Method

Muslim World League

Egyptian

Dubai (UAQF)

North America (ISNA)

{{ $name }} Namaz Timing Today — {{ $prayers\['date'\]->format('d M Y') }}
--------------------------------------------------------------------------

@foreach(\[

\['name'=>'Fajr','urdu'=>'فجر','icon'=>'🌙','key'=>'fajr','desc'=>'Dawn Prayer'\],

\['name'=>'Sunrise','urdu'=>'طلوعِ آفتاب','icon'=>'🌅','key'=>'sunrise','desc'=>'Fajr Ends'\],

\['name'=>'Dhuhr / Zuhr','urdu'=>'ظہر','icon'=>'☀️','key'=>'dhuhr','desc'=>'Noon Prayer'\],

\['name'=>'Asr','urdu'=>'عصر','icon'=>'🌤','key'=>'asr','desc'=>'Afternoon Prayer'\],

\['name'=>'Maghrib','urdu'=>'مغرب','icon'=>'🌇','key'=>'maghrib','desc'=>'Sunset Prayer'\],

\['name'=>'Isha','urdu'=>'عشاء','icon'=>'🌌','key'=>'isha','desc'=>'Night Prayer'\],

\] as $p)

{{ $p\['icon'\] }}

{{ $p\['name'\] }}

{{ $p\['urdu'\] }}

{{ $p\['desc'\] }}

{{ $prayers\[$p\['key'\]\] }}

{{ $prayers\[$p\['key'\].'\_24'\] }}

@if($p\['key'\]!=='sunrise')

[]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[Details →]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

@endif

@endforeach

Namaz Rakat Information — {{ $name }}
-------------------------------------

Prayer

Total Rakat

Sunnah

Farz

Nafl

Witr

Fajr / فجر

4

2

2

—

—

Dhuhr / ظہر

12

4+2

4

2

—

Asr / عصر

8

4

4

—

—

Maghrib / مغرب

7

2

3

2

—

Isha / عشاء

17

4+2

4

2

3

Sunnah & Nafl Times {{ $name }}
-------------------------------

#### Ishraq / اشراق

{{ \\Carbon\\Carbon::instance($prayers\['raw'\]->sunrise)->setTimezone($tz)->addMinutes(20)->format('h:i A') }}

#### Chaasht / چاشت

{{ \\Carbon\\Carbon::instance($prayers\['raw'\]->sunrise)->setTimezone($tz)->addMinutes(90)->format('h:i A') }}

#### Zawal / زوال

{{ \\Carbon\\Carbon::instance($prayers\['raw'\]->dhuhr)->setTimezone($tz)->subMinutes(15)->format('h:i A') }}

#### Tahajjud / تہجد

{{ \\Carbon\\Carbon::instance($sunnah\['last\_third'\])->setTimezone($tz)->format('h:i A') }}

Tomorrow Prayer Time {{ $name }} — {{ \\Carbon\\Carbon::now($tz)->addDay()->format('d M Y') }}
----------------------------------------------------------------------------------------------

@foreach(\['fajr','dhuhr','asr','maghrib','isha'\] as $p)

{{ ucfirst($p) }}

{{ $tomorrow\[$p\] }}

@endforeach

Qibla Direction {{ $name }} — قبلہ سمت
--------------------------------------

Qibla direction from **{{ $name }}** is

**{{ number\_format($qibla,2) }}°** from North.

↑

{{ $prayers\['date'\]->format('F Y') }} Prayer Times {{ $name }} — Monthly Timetable
------------------------------------------------------------------------------------

Complete namaz timing schedule for {{ $name }} for {{ $prayers\['date'\]->format('F Y') }}.

@foreach($monthly as $row)

@endforeach

Date

Day

Fajr

Sunrise

Dhuhr

Asr

Maghrib

Isha

{{ $row\['date'\] }}

{{ $row\['dow'\] }}

{{ $row\['fajr'\] }}

{{ $row\['sunrise'\] }}

{{ $row\['dhuhr'\] }}

{{ $row\['asr'\] }}

{{ $row\['maghrib'\] }}

{{ $row\['isha'\] }}

@if($content)

Prayer Time {{ $name }} — City Guide
------------------------------------

{{ $content->intro\_paragraph }}

@if($content->famous\_mosques\_list)

### Famous Mosques in {{ $name }}

@foreach(json\_decode($content->famous\_mosques\_list) as $mosque)

*   {{ $mosque }}

@endforeach

@endif

@endif

Prayer Time {{ $name }} — FAQ
-----------------------------

### Fajr time in {{ $name }} today?

Fajr time {{ $name }} today {{ $prayers\['date'\]->format('d F Y') }} is **{{ $prayers\['fajr'\] }}**. Fajr namaz ends at sunrise {{ $prayers\['sunrise'\] }}. Fajr consists of 4 Rakat (2 Sunnah + 2 Farz).

### Asr prayer time {{ $name }}?

Asr time {{ $name }} today is **{{ $prayers\['asr'\] }}**. Asr ends at Maghrib {{ $prayers\['maghrib'\] }}. Asr consists of 8 Rakat (4 Sunnah + 4 Farz).

### Maghrib prayer time {{ $name }} today?

Maghrib time {{ $name }} today is **{{ $prayers\['maghrib'\] }}**. Maghrib ends at Isha {{ $prayers\['isha'\] }}.

### Isha prayer time {{ $name }}?

Isha time {{ $name }} today is **{{ $prayers\['isha'\] }}**. Isha consists of 17 Rakat (4 Sunnah, 4 Farz, 2 Sunnah, 2 Nafl, 3 Witr, 2 Nafl).

### What is Qibla direction in {{ $name }}?

Qibla direction from {{ $name }} is **{{ number\_format($qibla,2) }}°** from True North.

@if(in\_array($country,\['UAE','Saudi Arabia'\]))

### Eid prayer time in {{ $name }}?

Eid prayer time in {{ $name }} is typically after sunrise, between 6:00 AM and 8:00 AM. Official Eid timing is announced by the relevant Islamic authority.

@endif

@if($country==='UAE')

### Khaleej Times prayer time {{ $name }}?

Khaleej Times prayer times {{ $name }} are published daily. Our prayer times for {{ $name }} match the official UAQF (UAE Authority for Qur'an and Endowments) calculation.

@endif

{{ $name }} Prayer Times — Complete Guide
-----------------------------------------

**Prayer time {{ $name }}** today

{{ $prayers\['date'\]->format('d F Y') }}:

**Fajr time {{ $name }}** {{ $prayers\['fajr'\] }},

**Dhuhr time {{ $name }}** {{ $prayers\['dhuhr'\] }},

**Asr time {{ $name }}** {{ $prayers\['asr'\] }},

**Maghrib time {{ $name }}** {{ $prayers\['maghrib'\] }},

**Isha time {{ $name }}** {{ $prayers\['isha'\] }}.

Today's Islamic date is {{ $hijri\['day'\] }} {{ $hijri\['month\_name'\] }} {{ $hijri\['year'\] }} AH.

**Namaz timing {{ $name }}** is calculated using the

University of Islamic Sciences Karachi method for Pakistan cities.

**Azan time {{ $name }}** starts at each prayer's beginning time.

**Fajr prayer time {{ $name }}** starts at dawn (Subah Sadiq)

and ends at **sunrise time {{ $name }}** which is {{ $prayers\['sunrise'\] }}.

@if($country==='UAE')

**Prayer time Dubai / {{ $name }}** follows the UAE Awqaf

(UAQF) calculation. **Fajr prayer time {{ $name }}** and

**Isha prayer time {{ $name }}** are published by Khaleej Times daily.

**Eid prayer time in {{ $name }}** is announced officially.

**Jummah prayer time {{ $name }}** is at Zuhr time {{ $prayers\['dhuhr'\] }}.

@elseif($country==='Saudi Arabia')

**Prayer time {{ $name }}** follows Umm al-Qura calendar.

**Makkah prayer time** and

**Madinah prayer times** are based on the official

Saudi Arabia Ministry of Islamic Affairs schedule.

**Haram prayer time** {{ $prayers\['fajr'\] }} (Fajr).

@elseif($country==='India')

**Prayer time {{ $name }}** is calculated for exact

coordinates of {{ $name }}, India. Muslim Pro prayer times and

Islamic prayer times {{ $name }} follow the same calculation.

**Subh prayer time {{ $name }}** is {{ $prayers\['fajr'\] }}.

@elseif($country==='USA')

**Prayer times {{ $name }}** follow ISNA (Islamic Society of

North America) calculation method. Muslim prayer times {{ $name }} are

calculated for exact latitude/longitude. Morning prayer time {{ $name }}

(Fajr) is {{ $prayers\['fajr'\] }}. Night prayer time {{ $name }}

(Isha) is {{ $prayers\['isha'\] }}.

@endif

**Tomorrow prayer time {{ $name }}**:

Fajr {{ $tomorrow\['fajr'\] }}, Dhuhr {{ $tomorrow\['dhuhr'\] }},

Asr {{ $tomorrow\['asr'\] }}, Maghrib {{ $tomorrow\['maghrib'\] }},

Isha {{ $tomorrow\['isha'\] }}.

Prayer Times Nearby Cities
--------------------------

@foreach($nearbyCities as $nc)

[]({{ url('/prayer-times/'.($nc['slug']??strtolower(str_replace(' ','-',$nc['name'])))) }})

[class="city-link">{{ $nc\['name'\] }}]({{ url('/prayer-times/'.($nc['slug']??strtolower(str_replace(' ','-',$nc['name'])))) }})

@endforeach

\`\`\`

@section('scripts')

\`\`\`javascript

// Live countdown

(function(){

var target = new Date("{{ $next\['timestamp'\] ?? '' }}");

function tick(){

var now = new Date(), diff = target - now;

if(diff <= 0){ location.reload(); return; }

var h=Math.floor(diff/3600000), m=Math.floor(diff600000/60000), s=Math.floor(diff\`000/1000);

document.getElementById('live-timer').textContent =

String(h).padStart(2,'0')+':'+String(m).padStart(2,'0')+':'+String(s).padStart(2,'0');

}

setInterval(tick,1000); tick();

})();

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔑 PART H: KEYWORD → URL EXACT MAPPING

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

PAKISTAN (Primary):

"prayer time in lahore" → /prayer-times/lahore

"namaz timing in lahore" → /prayer-times/lahore

"fajr time lahore" → /prayer-times/lahore/fajr

"fajr prayer time in lahore" → /prayer-times/lahore/fajr

"maghrib time lahore" → /prayer-times/lahore/maghrib

"asr time lahore" → /prayer-times/lahore/asr

"prayer timings islamabad" → /prayer-times/islamabad

"karachi prayer time" → /prayer-times/karachi

"rawalpindi prayer time" → /prayer-times/rawalpindi

"faisalabad prayer time" → /prayer-times/faisalabad

"gujranwala prayer time" → /prayer-times/gujranwala

"prayer time peshawar" → /prayer-times/peshawar

"prayer time multan" → /prayer-times/multan

"prayer time in pakistan" → /prayer-times/pakistan

"dawateislami prayer times" → /prayer-times/lahore (+ note in content)

UAE (Secondary - high value):

"prayer time dubai" → /prayer-times/dubai

"dubai prayer time" → /prayer-times/dubai

"prayer time in abu dhabi" → /prayer-times/abu-dhabi

"prayer time sharjah" → /prayer-times/sharjah

"khaleej times prayer times" → /prayer-times/dubai (mention in content)

"uae prayer time" → /prayer-times/uae

"eid prayer time in dubai" → /prayer-times/dubai (FAQ section)

"fajr prayer time dubai" → /prayer-times/dubai/fajr

"prayer time ajman" → /prayer-times/ajman

"awqaf prayer time" → /prayer-times/abu-dhabi (mention UAQF)

SAUDI ARABIA:

"prayer time riyadh" → /prayer-times/riyadh

"makkah prayer time" → /prayer-times/makkah

"prayer time jeddah" → /prayer-times/jeddah

"prayer time dammam" → /prayer-times/dammam

"masjid al haram prayer times" → /prayer-times/masjid-al-haram

"masjid nabawi prayer times" → /prayer-times/masjid-nabawi

"haram prayer time" → /prayer-times/makkah (H2 + FAQ)

"prayer time madinah" → /prayer-times/madinah

"mecca prayer time" → /prayer-times/makkah

INDIA (Kerala focus):

"prayer time in bangalore" → /prayer-times/bangalore

"prayer time calicut" → /prayer-times/calicut

"prayer time malappuram" → /prayer-times/malappuram

"prayer time kochi" → /prayer-times/kochi

"prayer time kerala" → (redirect /prayer-times/calicut or hub)

"prayer time kannur" → /prayer-times/kannur

"prayer time in mumbai" → /prayer-times/mumbai

USA:

"prayer times nyc" → /prayer-times/new-york

"prayer times chicago" → /prayer-times/chicago

"houston prayer times" → /prayer-times/houston

"prayer time in dearborn michigan"→ /prayer-times/dearborn-michigan

"prayer times minneapolis" → /prayer-times/minneapolis

"boston prayer times" → /prayer-times/boston

"detroit islamic prayer times" → /prayer-times/detroit

SPECIAL PAGES:

"eid prayer time" → FAQ on city pages + separate /prayer-times/eid

"jummah prayer time" → FAQ on city pages

"friday prayer time" → UAE city page FAQ sections

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

⚡ PART I: CACHING STRATEGY

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

// In controller, wrap expensive calculations:

$cacheKey = "prayers\_{$citySlug}\_{$madhab}\_{$method}\_".now($tz)->format('Ymd');

$prayers = Cache::remember($cacheKey, 3600, fn()=>$this->calcPrayers($lat,$lng,$tz,$madhab,$method));

$monthlyKey = "monthly\_{$citySlug}\_{$madhab}\_".now($tz)->format('Ym');

$monthly = Cache::remember($monthlyKey, 86400, fn()=>$this->buildMonthly($lat,$lng,$tz,$madhab,$method));

$contentKey = "city\_content\_{$citySlug}";

$content = Cache::rememberForever($contentKey, fn()=>CityPrayerContent::where('city\_slug',$citySlug)->first());

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📋 PART J: COMPETITOR vs TUMHARA PAGE

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

HamariWeb ke paas HAI:

✓ 30-day table

✓ Calculation method info

✓ Basic FAQ

✓ Pakistan cities links

✓ Rakat info (basic text)

HamariWeb ke paas NAHI — TUMHARE PAAS HOGA:

✅ UAE + Saudi + India + USA cities (4 countries extra)

✅ Prayer-specific sub-pages (/lahore/fajr)

✅ Country hub pages (/prayer-times/pakistan etc)

✅ Tomorrow's prayer times

✅ Live countdown timer

✅ Sunnah times (Ishraq, Chaasht, Zawal, Tahajjud)

✅ Rakat info visual table

✅ Qibla compass

✅ Khaleej Times / Awqaf / ISNA method per country

✅ City-specific Islamic history from DB

✅ City-specific famous mosques from DB

✅ Nearby cities auto-linked

✅ Eid prayer time FAQ per city

✅ Dawateislami / Jummah specific content

✅ Schema FAQ on every page

✅ Internal linking network (500+ pages)

✅ Cache optimized

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📁 PART K: SITEMAP UPDATE

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

sitemap.blade.php mein add karo:

Priority 1.0: /prayer-times/pakistan, /prayer-times/uae, /prayer-times/saudi-arabia, /prayer-times/india, /prayer-times/usa

Priority 0.9: All city pages (500+)

Priority 0.8: All prayer-specific pages (/city/fajr etc)

changefreq: daily for all