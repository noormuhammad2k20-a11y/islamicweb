STEP 7: INTERNAL LINKING — Add to city.blade.php

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Internal linking 4 jagah add karo — existing content ke andar.

Design change nahi hoga — sirf links add honge.

── 7A: PRAYER CARDS pe sub-page links ──────────────

Existing prayer cards (fajr/dhuhr/asr/maghrib/isha) mein

har card ke neeche ek small link add karo:

\`\`\`blade

{{-- Har prayer card ke andar, existing time ke BAAD add karo: --}}

@if($p\['key'\] !== 'sunrise')

[]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[class="btn btn-sm btn-outline-secondary mt-1 w-100"]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[title="{{ $p\['name'\] }} time {{ $name }}">]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[{{ $p\['name'\] }} Details →]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

@endif

\`\`\`

── 7B: Prayer-Specific Pages Internal Links Section ──

City page pe monthly table ke BAAD ye section add karo:

\`\`\`blade

{{-- ══ INTERNAL LINKS: Prayer-Specific Pages ══ --}}

{{ $name }} Prayer Times — Detailed Pages
-----------------------------------------

View detailed information for each individual prayer in {{ $name }}:

@foreach(\[

\['key'=>'fajr', 'label'=>'Fajr Time', 'urdu'=>'فجر', 'icon'=>'🌙','desc'=>'Dawn prayer · Before sunrise'\],

\['key'=>'zuhr', 'label'=>'Dhuhr/Zuhr Time','urdu'=>'ظہر', 'icon'=>'☀️','desc'=>'Noon prayer · At solar midday'\],

\['key'=>'asr', 'label'=>'Asr Time', 'urdu'=>'عصر', 'icon'=>'🌤','desc'=>'Afternoon prayer · Hanafi method'\],

\['key'=>'maghrib', 'label'=>'Maghrib Time', 'urdu'=>'مغرب', 'icon'=>'🌇','desc'=>'Sunset prayer · Exact sunset'\],

\['key'=>'isha', 'label'=>'Isha Time', 'urdu'=>'عشاء', 'icon'=>'🌌','desc'=>'Night prayer · Evening worship'\],

\] as $pl)

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[class="text-decoration-none d-block border rounded p-2 h-100"]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[title="{{ $pl\['label'\] }} in {{ $name }}">]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[{{ $pl\['icon'\] }} {{ $pl\['label'\] }}]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[{{ $pl\['urdu'\] }} — {{ $pl\['desc'\] }}]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

@endforeach

\`\`\`

── 7C: Country Hub + Related Countries ─────────────

City page pe FAQ section ke BAAD add karo:

\`\`\`blade

{{-- ══ INTERNAL LINKS: Country Hub + Cross-Country ══ --}}

Prayer Times by Country
-----------------------

[]({{ url('/prayer-times/pakistan') }})

[class="btn btn-outline-success w-100 {{ $country==='Pakistan'?'active':'' }}"]({{ url('/prayer-times/pakistan') }})

[title="Prayer Times Pakistan All Cities">]({{ url('/prayer-times/pakistan') }})

[🇵🇰 Pakistan]({{ url('/prayer-times/pakistan') }})

[]({{ url('/prayer-times/pakistan') }})

[]({{ url('/prayer-times/uae') }})

[class="btn btn-outline-primary w-100 {{ $country==='UAE'?'active':'' }}"]({{ url('/prayer-times/uae') }})

[title="Prayer Times UAE All Cities">]({{ url('/prayer-times/uae') }})

[🇦🇪 UAE]({{ url('/prayer-times/uae') }})

[]({{ url('/prayer-times/uae') }})

[]({{ url('/prayer-times/saudi-arabia') }})

[class="btn btn-outline-danger w-100 {{ $country==='Saudi Arabia'?'active':'' }}"]({{ url('/prayer-times/saudi-arabia') }})

[title="Prayer Times Saudi Arabia">]({{ url('/prayer-times/saudi-arabia') }})

[🇸🇦 Saudi Arabia]({{ url('/prayer-times/saudi-arabia') }})

[]({{ url('/prayer-times/saudi-arabia') }})

[]({{ url('/prayer-times/india') }})

[class="btn btn-outline-warning w-100 {{ $country==='India'?'active':'' }}"]({{ url('/prayer-times/india') }})

[title="Prayer Times India">]({{ url('/prayer-times/india') }})

[🇮🇳 India]({{ url('/prayer-times/india') }})

[]({{ url('/prayer-times/india') }})

{{-- Same-country popular cities --}}

* * *

### 

Popular Cities in

@if($country==='Pakistan')Pakistan 🇵🇰

@elseif($country==='UAE')UAE 🇦🇪

@elseif($country==='Saudi Arabia')Saudi Arabia 🇸🇦

@elseif($country==='India')India 🇮🇳

@else USA 🇺🇸 @endif

@php

$popularByCountry = \[

'Pakistan' => \[\['lahore','Lahore'\],\['karachi','Karachi'\],\['islamabad','Islamabad'\],\['rawalpindi','Rawalpindi'\],\['faisalabad','Faisalabad'\],\['peshawar','Peshawar'\],\['multan','Multan'\],\['quetta','Quetta'\]\],

'UAE' => \[\['dubai','Dubai'\],\['abu-dhabi','Abu Dhabi'\],\['sharjah','Sharjah'\],\['ajman','Ajman'\],\['al-ain','Al Ain'\],\['ras-al-khaimah','RAK'\],\['fujairah','Fujairah'\]\],

'Saudi Arabia' => \[\['makkah','Makkah'\],\['madinah','Madinah'\],\['riyadh','Riyadh'\],\['jeddah','Jeddah'\],\['dammam','Dammam'\],\['khobar','Khobar'\],\['taif','Taif'\]\],

'India' => \[\['calicut','Calicut'\],\['kozhikode','Kozhikode'\],\['malappuram','Malappuram'\],\['kochi','Kochi'\],\['kannur','Kannur'\],\['bangalore','Bangalore'\],\['mumbai','Mumbai'\]\],

'USA' => \[\['new-york','New York'\],\['chicago','Chicago'\],\['houston','Houston'\],\['dearborn-michigan','Dearborn'\],\['minneapolis','Minneapolis'\],\['los-angeles','LA'\],\['boston','Boston'\]\],

\];

$links = $popularByCountry\[$country\] ?? $popularByCountry\['Pakistan'\];

@endphp

@foreach($links as \[$slug, $label\])

@if($slug !== $citySlug)

[]({{ url('/prayer-times/'.$slug) }})

[class="badge text-decoration-none bg-light text-dark border py-2 px-3"]({{ url('/prayer-times/'.$slug) }})

[title="Prayer Time {{ $label }}">]({{ url('/prayer-times/'.$slug) }})

[{{ $label }}]({{ url('/prayer-times/'.$slug) }})

[]({{ url('/prayer-times/'.$slug) }})

@endif

@endforeach

\`\`\`

── 7D: Cross-Feature Links (Islamic Date + Qibla) ──

SEO text block ke BAAD, page ke end mein add karo:

\`\`\`blade

{{-- ══ INTERNAL LINKS: Cross-Feature Navigation ══ --}}

Islamic Tools — {{ $name }}
---------------------------

[]({{ url('/islamic-date-today') }})

[class="text-decoration-none d-block border rounded p-3 h-100"]({{ url('/islamic-date-today') }})

[title="Islamic Date Today {{ $name }}">]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[📅 Islamic Date Today]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[Today's Hijri date:]({{ url('/islamic-date-today') }})

[**{{ $hijri\['day'\] }} {{ $hijri\['month\_name'\] }} {{ $hijri\['year'\] }}**]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-calendar') }})

[class="text-decoration-none d-block border rounded p-3 h-100"]({{ url('/islamic-calendar') }})

[title="Islamic Calendar {{ $prayers\['date'\]->format('Y') }}">]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[🗓️ Islamic Calendar {{ $prayers\['date'\]->format('Y') }}]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[Full Hijri calendar with all months]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[class="text-decoration-none d-block border rounded p-3 h-100"]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[title="Fajr Time {{ $name }} Today">]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[🌙 Fajr Time {{ $name }}]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[Today: **{{ $prayers\['fajr'\] }}** —]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[Full details, monthly schedule]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

INTERNAL LINKING STRATEGY SUMMARY

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Link Type | From | To | Anchor Text

──────────────────────|───────────────────|───────────────────────────|─────────────────────────

Prayer card links | /prayer-times/lahore | /prayer-times/lahore/fajr | "Fajr Details →"

Prayer sub-pages grid | /prayer-times/lahore | /prayer-times/lahore/asr | "Asr Time — عصر"

Same-country cities | /prayer-times/lahore | /prayer-times/karachi | "Karachi"

Country hubs | /prayer-times/lahore | /prayer-times/pakistan | "🇵🇰 Pakistan"

Cross-feature (date) | /prayer-times/lahore | /islamic-date-today | "Islamic Date Today"

Cross-feature (cal) | /prayer-times/lahore | /islamic-calendar | "Islamic Calendar 2026"

Nearby cities | /prayer-times/lahore | /prayer-times/sialkot | "Sialkot" (already exists)

RESULT: Every page links to:

✅ 5 prayer sub-pages (/city/fajr, /city/asr etc)

✅ 5-7 same-country popular cities

✅ 4 country hubs (Pakistan/UAE/Saudi/India)

✅ Islamic Date page

✅ Islamic Calendar page

\= 15-20 internal links per page × 200 pages = 3,000-4,000 internal links total