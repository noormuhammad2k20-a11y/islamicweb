STEP 3: UPDATE city.blade.php — ADD CONTENT SECTIONS

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Existing city.blade.php mein EXISTING CONTENT ke BAAD ye sections add karo.

Design change mat karo — sirf ye new sections append karo existing page ke end se pehle (before closing tag).

Add these sections after the monthly table and nearby cities — in this exact order:

\`\`\`blade

{{-- ══ SECTION 1: RAKAT INFO TABLE ══ --}}

Namaz Rakat Information — {{ $name }}
-------------------------------------

Prayer / نماز

Sunnah (Muakkadah)

Farz

Sunnah (Ghair Muakkadah)

Nafl

Witr

Total

**Fajr / فجر**

2

2

—

—

—

4

**Dhuhr / ظہر**

4 (before)

4

2

2

—

12

**Asr / عصر**

—

4

4

—

—

8

**Maghrib / مغرب**

—

3

—

2

—

7

**Isha / عشاء**

4 (before)

4

2

2

3

17

{{-- ══ SECTION 2: TOMORROW'S TIMES ══ --}}

Tomorrow Prayer Time {{ $name }} —

{{ \\Carbon\\Carbon::now($tz)->addDay()->format('d M Y') }}


---------------------------------------------------------------------------------------------------

@foreach(\['fajr','dhuhr','asr','maghrib','isha'\] as $p)

{{ ucfirst($p) }}

{{ $tomorrow\[$p\] ?? 'N/A' }}

@endforeach

{{-- ══ SECTION 3: CITY ARTICLE (300-400 words unique) ══ --}}

@if($content && $content->article\_en)

Prayer Time {{ $name }} — Complete Guide
----------------------------------------

{{ $content->article\_en }}

@if($content->article\_urdu)

* * *

{{ $content->article\_urdu }}

@endif

@endif

{{-- ══ SECTION 4: FAMOUS MOSQUES ══ --}}

@if($content && $content->famous\_mosques)

Famous Mosques in {{ $name }}
-----------------------------

@foreach(json\_decode($content->famous\_mosques) as $mosque)

🕌

{{ $mosque }}

@endforeach

@endif

{{-- ══ SECTION 5: SPECIAL NOTES ══ --}}

@if($content && ($content->special\_note || $content->jummah\_note || $content->eid\_prayer\_note))

Important Prayer Information — {{ $name }}
------------------------------------------

@if($content->jummah\_note)

### 🕌 Jummah Prayer Time {{ $name }}

{{ $content->jummah\_note }}

@endif

@if($content->eid\_prayer\_note)

### 🌙 Eid Prayer Time {{ $name }}

{{ $content->eid\_prayer\_note }}

@endif

@if($content->special\_note)

### ℹ️ Note

{{ $content->special\_note }}

@endif

@endif

{{-- ══ SECTION 6: FAQ WITH SCHEMA ══ --}}

FAQ — Prayer Time {{ $name }} Today
-----------------------------------

### 

What is Fajr time in {{ $name }} today?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Fajr time in {{ $name }} today**

{{ $prayers\['date'\]->format('d F Y') }} is

**{{ $prayers\['fajr'\] }}**.

Fajr namaz consists of 2 Sunnah and 2 Farz rakats (total 4 rakats).

Fajr time ends at sunrise which is {{ $prayers\['sunrise'\] }} today in {{ $name }}.

### 

What are all prayer times in {{ $name }} today?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Prayer times {{ $name }} today**

{{ $prayers\['date'\]->format('d F Y') }}:

Fajr **{{ $prayers\['fajr'\] }}**,

Sunrise {{ $prayers\['sunrise'\] }},

Dhuhr/Zuhr **{{ $prayers\['dhuhr'\] }}**,

Asr **{{ $prayers\['asr'\] }}**,

Maghrib **{{ $prayers\['maghrib'\] }}**,

Isha **{{ $prayers\['isha'\] }}**.

These timings are calculated using the

@if($content && $content->calculation\_note)

{{ $content->calculation\_note }}

@else

University of Islamic Sciences Karachi method.

@endif

### 

What is Asr prayer time in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Asr time {{ $name }} today** is

**{{ $prayers\['asr'\] }}**.

Asr consists of 4 Sunnah (Ghair Muakkadah) and 4 Farz rakats.

Asr time ends at Maghrib {{ $prayers\['maghrib'\] }}.

Hanafi Asr starts when shadow is twice the object length.

### 

What is Maghrib prayer time in {{ $name }} today?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Maghrib time {{ $name }} today** is

**{{ $prayers\['maghrib'\] }}**.

Maghrib prayer is 3 Farz + 2 Nafl (total 7 rakats if including optional Sunnah).

Maghrib time ends at Isha {{ $prayers\['isha'\] }}.

### 

What is Isha prayer time in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Isha time {{ $name }} today** is

**{{ $prayers\['isha'\] }}**.

Isha is the final prayer of the day — 4 Sunnah + 4 Farz + 2 Sunnah + 2 Nafl + 3 Witr + 2 Nafl = 17 total rakats.

### 

What is the Qibla direction in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Qibla direction from {{ $name }}** is

**{{ number\_format($qibla, 2) }}°** from True North.

Face this direction while performing Salah in {{ $name }}.

@if($content && $content->jummah\_note)

### 

What is Jummah prayer time in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

{{ $content->jummah\_note }}

Today's Zuhr time in {{ $name }} is {{ $prayers\['dhuhr'\] }}.

@endif

{{-- ══ SECTION 7: SEO TEXT BLOCK ══ --}}

Prayer Time {{ $name }} — Namaz Timing Guide
--------------------------------------------

**Prayer time {{ $name }}** today

{{ $prayers\['date'\]->format('d F Y') }}

({{ $hijri\['day'\] }} {{ $hijri\['month\_name'\] }} {{ $hijri\['year'\] }} AH):

**Fajr {{ $prayers\['fajr'\] }}**,

Dhuhr {{ $prayers\['dhuhr'\] }},

**Asr {{ $prayers\['asr'\] }}**,

Maghrib {{ $prayers\['maghrib'\] }},

**Isha {{ $prayers\['isha'\] }}**.

**Fajr prayer time {{ $name }}** begins at dawn and ends at

sunrise ({{ $prayers\['sunrise'\] }}).

**Asr time {{ $name }}** follows the

@if(in\_array($country, \['Pakistan','India (Hanafi)'\]))Hanafi@elseif($country==='UAE')UAE Shafi@elseif($country==='USA')ISNA@else standard @endif

calculation.

**Maghrib time {{ $name }}** starts exactly at sunset.

**Isha prayer time {{ $name }}** begins

approximately 90 minutes after Maghrib.

**Tomorrow prayer time {{ $name }}**

({{ \\Carbon\\Carbon::now($tz)->addDay()->format('d M Y') }}):

Fajr {{ $tomorrow\['fajr'\] ?? 'N/A' }},

Dhuhr {{ $tomorrow\['dhuhr'\] ?? 'N/A' }},

Asr {{ $tomorrow\['asr'\] ?? 'N/A' }},

Maghrib {{ $tomorrow\['maghrib'\] ?? 'N/A' }},

Isha {{ $tomorrow\['isha'\] ?? 'N/A' }}.

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

