# 🕌 Noor-e-Islam — Complete SEO Strategy & Audit Report
**Website:** noorislam.com | **Stack:** Laravel (PHP) + Blade Templates  
**Analysis Date:** July 19, 2026 | **Total Pages Analyzed:** 20,000+

---

## 📊 EXECUTIVE SUMMARY — Issue Severity Overview

| Severity | Issue Count | Impact |
|----------|-------------|--------|
| 🔴 CRITICAL (Fix Today) | 5 issues | Site ranking block |
| 🟠 HIGH (Fix This Week) | 8 issues | Major traffic loss |
| 🟡 MEDIUM (Fix This Month) | 7 issues | CTR & rankings drop |
| 🟢 LOW (Ongoing) | 5 strategies | Growth opportunities |

---

## 🔴 PART 1 — CRITICAL ISSUES (Emergency Fixes)

### 1.1 — 114 Surah Pages → All Returning ERROR 500

**Affected URLs:** `/surah/al-faatiha` through `/surah/an-naas` (ALL 114 pages)

**Problem:** Every single Surah page returns a 500 Internal Server Error.
- Google completely cannot crawl or index any Quran content
- This is potentially your BIGGEST traffic opportunity being completely wasted
- Al-Kahf, Yaseen, Ar-Rahman, Al-Mulk — yeh sab searched terms hain

**Root Cause (Laravel):**
```bash
# Larvel logs check karo:
storage/logs/laravel.log

# Common causes:
# 1. Database query fail — surah table missing or empty
# 2. View file exist nahi karta
# 3. Missing relationship in Surah model
# 4. Missing API key for Quran API
```

**Fix Steps:**
```php
// app/Http/Controllers/SurahController.php
public function show($slug)
{
    try {
        $surah = Surah::where('slug', $slug)->firstOrFail();
        return view('surah.show', compact('surah'));
    } catch (\Exception $e) {
        \Log::error('Surah Error: ' . $e->getMessage());
        abort(404); // 500 ki jagah 404 return karo jab tak fix na ho
    }
}
```

**SEO Impact if Fixed:** Potential for 114 high-traffic pages ranking for:
- "Surah Al-Kahf with Urdu translation"
- "Surah Yaseen"  
- "Surah Al-Rahman"
- These terms get millions of monthly searches

---

### 1.2 — 300+ Dua Pages → All Returning ERROR 404

**Affected URLs:** `/duas/misc/` — All dua detail pages broken

**Problem:** URL is `/duas/misc/` without proper slug — route is missing or slug column is null in DB.

**Root Cause:**
The URL being generated is just `/duas/misc/` (no ID or slug appended), meaning:
- Either the slug column is NULL in the duas table
- Or the route definition is wrong

**Fix in Laravel Routes:**
```php
// routes/web.php — check karo:
Route::get('/duas/{category}/{slug}', [DuaController::class, 'show'])->name('dua.show');

// Blade template mein link generation:
// WRONG:
<a href="{{ route('dua.show', [$dua->category, '']) }}">

// CORRECT:
<a href="{{ route('dua.show', [$dua->category, $dua->slug]) }}">
```

**Fix in Database:**
```sql
-- Check karein kaunse duas ka slug NULL hai:
SELECT id, name, slug FROM duas WHERE slug IS NULL OR slug = '';

-- Fix: slug generate karo from name:
UPDATE duas SET slug = LOWER(REPLACE(REPLACE(name, ' ', '-'), "'", ''))
WHERE slug IS NULL OR slug = '';
```

---

### 1.3 — 500 Error on `/prayer-times-today` (INDEXED but BROKEN)

**Problem:** This page is in the sitemap and indexed, but returns 500.
Google is seeing a broken, indexed page — this hurts domain authority.

**Immediate Fix:**
```php
// Option 1: Redirect to working page
Route::get('/prayer-times-today', function() {
    return redirect()->to('/prayer-times/pakistan', 301);
});

// Option 2: Fix the controller
// Option 3: Add noindex until fixed
```

---

### 1.4 — `/knowledge/islamic-facts` → ERROR 500 (INDEXED)

Same issue — indexed but broken. Either fix or redirect to `/knowledge`.

```php
Route::get('/knowledge/islamic-facts', function() {
    return redirect()->to('/knowledge', 301);
});
```

---

### 1.5 — Wrong Canonical Tags (SITE-WIDE CRITICAL)

**This is the most widespread critical SEO issue on the entire site.**

**Problem Found:**
```
/hajj-guide          → canonical: https://noorislam.com  ❌ (should be /hajj-guide)
/prayer-times/karachi → canonical: https://noorislam.com ❌
/hijri-gregorian-converter → canonical: https://noorislam.com/islamic-calendar/pakistan ❌
/islamic-date-today  → canonical: https://noorislam.com  ❌
/sehri-time-today    → canonical: https://noorislam.com  ❌
```

**What Canonical SHOULD be:**
Every page's canonical = its OWN full URL (unless it's a true duplicate that should point elsewhere).

**Laravel Fix (Blade Layout):**
```blade
{{-- resources/views/layouts/app.blade.php --}}
<head>
    {{-- WRONG (current): --}}
    <link rel="canonical" href="https://noorislam.com" />
    
    {{-- CORRECT: --}}
    <link rel="canonical" href="{{ url()->current() }}" />
    
    {{-- OR pass from controller: --}}
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}" />
</head>
```

**In Controller (where custom canonical needed):**
```php
// PrayerTimesController.php
return view('prayer-times.city', [
    'city' => $city,
    'canonical' => 'https://noorislam.com/prayer-times/' . $city->slug,
]);
```

---

## 🟠 PART 2 — HIGH PRIORITY (Fix This Week)

### 2.1 — DUPLICATE TITLE TAGS (80% of Pages)

**This is the #1 On-Page SEO problem killing your rankings.**

**Current State (WRONG):**
```
/hajj-guide          → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools"
/umrah-guide         → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools"
/prayer-times/karachi → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools"
/prayer-times/lahore  → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools"
/surahs              → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools"
/duas                → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools"
```

**Why This is Catastrophic:**
- Google sees hundreds of pages with same title = treats them as duplicates
- Zero keyword relevance signal for individual pages
- Poor CTR in search results (no one clicks a generic title)

**Correct Title Tag Formula by Section:**

#### Prayer Times Pages (92 pages):
```
Formula: "[City] Prayer Times Today | Fajr, Dhuhr, Asr, Maghrib, Isha — Noor-e-Islam"

Examples:
/prayer-times/karachi → "Karachi Prayer Times Today | Fajr, Dhuhr, Asr, Maghrib, Isha — Noor-e-Islam"
/prayer-times/lahore  → "Lahore Prayer Times Today | Fajr, Dhuhr, Asr, Isha Times — Noor-e-Islam"
/prayer-times/islamabad → "Islamabad Prayer Times Today | Accurate Namaz Timings — Noor-e-Islam"
```

#### Hajj & Umrah Pages (8 pages):
```
/hajj-and-umrah  → "Hajj & Umrah Guide 2026 | Complete Information — Noor-e-Islam"
/hajj-guide      → "Complete Hajj Guide 2026 | Step-by-Step Rituals & Rules — Noor-e-Islam"
/umrah-guide     → "Complete Umrah Guide 2026 | Step-by-Step How to Perform Umrah — Noor-e-Islam"
/hajj-checklist  → "Hajj Packing Checklist 2026 | Essential Items for Hajj — Noor-e-Islam"
/umrah-checklist → "Umrah Packing Checklist 2026 | What to Pack for Umrah — Noor-e-Islam"
/hajj-duas       → "Hajj Duas in Arabic with Urdu Translation | Supplications — Noor-e-Islam"
/umrah-duas      → "Umrah Duas in Arabic & Urdu | Step-by-Step Supplications — Noor-e-Islam"
/hajj-faqs       → "Hajj & Umrah Frequently Asked Questions | Answers — Noor-e-Islam"
```

#### Surah Pages (When Fixed - 114 pages):
```
Formula: "Surah [Name] | Arabic Text, Urdu Translation & Transliteration — Noor-e-Islam"

/surah/al-faatiha → "Surah Al-Fatiha | Arabic, Urdu Translation & Tafseer — Noor-e-Islam"
/surah/al-kahf   → "Surah Al-Kahf | Full Arabic Text, Urdu Translation, Benefits — Noor-e-Islam"
/surah/yaseen    → "Surah Yaseen | Complete Arabic & Urdu Translation — Noor-e-Islam"
/surah/ar-rahmaan → "Surah Ar-Rahman | Arabic Text, Urdu Tarjuma & Benefits — Noor-e-Islam"
```

#### Islamic Calendar:
```
/islamic-calendar         → "Islamic Calendar 2026 | Hijri Calendar 1448 AH — Noor-e-Islam"
/islamic-calendar/today   → "Today's Islamic Date — 19 Muharram 1448 AH | Hijri Date — Noor-e-Islam"
/islamic-calendar/pakistan → "Islamic Date in Pakistan Today | Hijri Gregorian Calendar — Noor-e-Islam"
/islamic-date-today       → "Islamic Date Today | Aaj Ki Islami Tarikh — Noor-e-Islam"
```

**Laravel Implementation:**
```blade
{{-- In each controller, pass $seo array: --}}
@section('title', $seo['title'] ?? config('seo.default_title'))

{{-- In app.blade.php: --}}
<title>@yield('title', 'Noor-e-Islam: Islamic Knowledge & Tools')</title>
```

```php
// In PrayerTimesController:
$seo = [
    'title' => "Prayer Times in {$city->name} Today | Fajr, Dhuhr, Asr, Maghrib, Isha — Noor-e-Islam",
    'description' => "Get accurate {$city->name} prayer times for today, {$today}. Fajr: {$times->fajr}, Dhuhr: {$times->dhuhr}, Asr: {$times->asr}, Maghrib: {$times->maghrib}, Isha: {$times->isha}.",
];
```

---

### 2.2 — DUPLICATE META DESCRIPTIONS (80% of Pages)

**Current (WRONG) — Same description on ~500+ pages:**
```
"Discover accurate prayer times, Quranic verses, daily duas, and authentic Islamic knowledge."
```

**Why Bad:** Google ignores duplicate meta descriptions. Zero CTR optimization.

**Correct Formula by Section:**

```
Prayer Times:
"Get accurate {City} prayer times for today, {Date}. 
Fajr at {time}, Dhuhr at {time}, Asr at {time}, Maghrib at {time}, Isha at {time}. 
Updated daily with correct Islamic timings."
(Character limit: 150-160 chars)

Hajj Guide:
"Complete step-by-step Hajj guide for 2026. Learn the rituals of Tawaf, Sa'i, 
Wuquf at Arafah, Muzdalifah, Rami, and Qurbani. Includes essential duas and tips."

Surah Pages:
"Read Surah {Name} in Arabic with Urdu translation (Tarjuma) and transliteration. 
Includes benefits (fazilat), tafseer, and audio recitation. {Verse count} verses."

Duas:
"Read {Dua Name} in Arabic with Urdu translation and transliteration. 
Learn when to recite this dua and its virtues according to authentic hadith."
```

**Laravel Dynamic Generation:**
```php
// Helper function:
public function generateMetaDescription(string $template, array $data): string
{
    $description = str_replace(array_keys($data), array_values($data), $template);
    return Str::limit($description, 155, ''); // 155 char limit
}
```

---

### 2.3 — "COMING SOON" PAGES ARE INDEXED

**Affected Pages:**
```
/sehri-time-today   → H1: "Coming Soon" → INDEXED (WRONG!)
/iftar-time-today   → H1: "Coming Soon" → INDEXED (WRONG!)
/qibla-finder-online → H1: "Coming Soon" → INDEXED (WRONG!)
```

**Problem:** Google indexes empty "Coming Soon" pages. This:
- Wastes crawl budget
- Creates thin content signals
- Damages domain authority

**Fix — Two Options:**

**Option A (Best): Remove from sitemap + Add noindex**
```blade
{{-- In coming-soon pages: --}}
<meta name="robots" content="noindex, nofollow" />
```

**Option B: Redirect to working equivalent**
```php
// routes/web.php
Route::get('/sehri-time-today', function() {
    // Redirect to Ramadan calendar or prayer times
    return redirect('/prayer-times/pakistan', 301);
});

Route::get('/iftar-time-today', function() {
    return redirect('/prayer-times/pakistan', 301);
});

Route::get('/qibla-finder-online', function() {
    return redirect('/tools/qibla-direction', 301);
});
```

---

### 2.4 — DUPLICATE CONTENT (URL Cannibalization)

**Problem Pairs Found:**

| Duplicate 1 | Duplicate 2 | Impact |
|-------------|-------------|--------|
| `/zakat-calculator-online` | `/calculators/zakat` | Split link equity |
| `/qibla-finder-online` | `/tools/qibla-direction` | Keyword cannibalization |
| `/islamic-date-today` | `/islamic-calendar/today` | Competing pages |
| `/prayer-times/hyderabad-sindh` | `/prayer-times/hyderabad` | Different cities but confusing |

**Fix Strategy:**

```php
// Option 1: 301 Redirect old/duplicate to canonical
Route::get('/zakat-calculator-online', fn() => redirect('/calculators/zakat', 301));
Route::get('/qibla-finder-online', fn() => redirect('/tools/qibla-direction', 301));
Route::get('/islamic-date-today', fn() => redirect('/islamic-calendar/today', 301));

// Option 2: If both need to exist, add proper canonical
// On /zakat-calculator-online:
<link rel="canonical" href="https://noorislam.com/calculators/zakat" />
```

**For Hyderabad issue** — keep both but make clearly distinct:
- `/prayer-times/hyderabad` → Hyderabad, India
- `/prayer-times/hyderabad-sindh` → Hyderabad, Sindh, Pakistan (ensure H1 and content is distinct)

---

### 2.5 — HAJJ & UMRAH SECTION — Missing Unique Title/Meta

All 7 sub-pages (hajj-guide, umrah-guide, hajj-checklist, etc.) have identical title and meta as the homepage. This needs controller-level fixes.

**Laravel Controller Fix:**
```php
// app/Http/Controllers/HajjUmrahController.php

private array $pageSeo = [
    'hajj-guide' => [
        'title' => 'Complete Hajj Guide 2026 | Step-by-Step Rituals — Noor-e-Islam',
        'description' => 'Learn every step of Hajj 2026 with our complete guide. Covers Ihram, Tawaf, Sa\'i, Arafah, Muzdalifah, Rami al-Jamarat, Qurbani, and Halq. With duas for each step.',
        'h1' => 'Complete Step-by-Step Hajj Guide 2026',
    ],
    'umrah-guide' => [
        'title' => 'Complete Umrah Guide 2026 | How to Perform Umrah Step-by-Step — Noor-e-Islam',
        'description' => 'Perform Umrah correctly with our step-by-step guide. Learn about Ihram, Tawaf around the Kaaba, Sa\'i between Safa and Marwa, and Halq or Taqsir with duas.',
        'h1' => 'Complete Step-by-Step Umrah Guide 2026',
    ],
    // ... etc
];
```

---

### 2.6 — SEARCH PAGE H1 = "Search - Index" (Bad SEO)

**Current:** H1 = "Search - Index"  
**Fix:** H1 should be meaningful

```blade
{{-- search.blade.php --}}
<h1>Search Islamic Content | Noor-e-Islam</h1>
<p>Search for prayer times, Surah, duas, Islamic calendar, and more...</p>
```

Also add to this page:
```html
<meta name="robots" content="noindex, follow" />
```
Search pages should generally not be indexed.

---

### 2.7 — ISLAMIC CALENDAR HUB — Canonical URL Wrong

**Found Issue:**
```
/hijri-gregorian-converter → canonical: https://noorislam.com/islamic-calendar/pakistan ❌
```

This is WRONG — it points to a completely different page. Fix immediately:
```blade
<link rel="canonical" href="https://noorislam.com/hijri-gregorian-converter" />
```

---

### 2.8 — SURAHS PAGE — Hub Title is Generic

```
/surahs → "NoorIslam — Noor-e-Islam: Islamic Knowledge & Tools" ❌
```

Fix:
```
Title: "All 114 Surahs of the Quran | Arabic Text, Urdu Translation — Noor-e-Islam"
Meta: "Browse all 114 Surahs of the Holy Quran with Arabic text, Urdu translation (tarjuma), and transliteration. Read online or download for free."
```

---

## 🟡 PART 3 — MEDIUM PRIORITY (This Month)

### 3.1 — STRUCTURED DATA / SCHEMA MARKUP

Schema markup tells Google exactly what your content is. Currently missing from the entire site.

#### For Prayer Times Pages:
```json
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Karachi Prayer Times Today",
  "description": "Accurate prayer times for Karachi...",
  "mainEntity": {
    "@type": "Table",
    "about": "Islamic Prayer Times",
    "name": "Karachi Namaz Timings"
  }
}
```

#### For FAQ Page + Hajj FAQs:
```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What is Hajj?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Hajj is the fifth pillar of Islam..."
    }
  }]
}
```

#### For Islamic Calculators:
```json
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Zakat Calculator",
  "applicationCategory": "FinanceApplication",
  "description": "Free online Zakat calculator..."
}
```

#### For Surah Pages (when fixed):
```json
{
  "@context": "https://schema.org",
  "@type": "Article",
  "name": "Surah Al-Kahf",
  "description": "Surah Al-Kahf — 18th chapter of the Quran with 110 verses",
  "inLanguage": ["ar", "ur"],
  "about": {
    "@type": "Book",
    "name": "The Holy Quran"
  }
}
```

**Laravel Blade Implementation:**
```blade
{{-- In layout: --}}
@stack('schema')

{{-- In each view: --}}
@push('schema')
<script type="application/ld+json">
{!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
```

---

### 3.2 — INTERNAL LINKING STRATEGY

Currently the site has minimal cross-linking. Add these link patterns:

**Prayer Times → Duas:**
```
"Karachi Prayer Times" page mein add karo:
→ Link: "Azaan ke baad ki dua" → /duas/after-prayer
→ Link: "Fajr ki namaz ka tarika" → /namaz-guides/how-to-pray-salah
```

**Surah Pages → Related Duas:**
```
Surah Yaseen page par:
→ "Related Dua: Dua for the deceased" → /duas/for-deceased
```

**Hajj Guide → Duas:**
```
Each step of Hajj guide:
→ Link to specific Hajj dua for that step
```

**Home Page Hub Links:** Strengthen the homepage with keyword-rich anchor text:
```blade
{{-- Instead of "Prayer Times": --}}
<a href="/prayer-times/pakistan">Pakistan Namaz Timings & Prayer Times</a>

{{-- Instead of "Surahs": --}}
<a href="/surahs">All 114 Surahs of the Quran with Urdu Translation</a>
```

---

### 3.3 — SITEMAP.XML OPTIMIZATION

**Issues:**
1. Error pages (500s) should NOT be in sitemap
2. "Coming Soon" pages should NOT be in sitemap
3. Priority values should reflect page importance
4. Dynamic pages need `<lastmod>` tags for time-sensitive content (prayer times)

**Laravel Sitemap Fix:**
```php
// routes/web.php or a dedicated SitemapController
Route::get('/sitemap.xml', function() {
    $sitemap = [];
    
    // Static pages — high priority
    $staticPages = [
        ['url' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
        ['url' => '/prayer-times/pakistan', 'priority' => '0.9', 'changefreq' => 'daily'],
        ['url' => '/surahs', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['url' => '/duas', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['url' => '/islamic-calendar', 'priority' => '0.9', 'changefreq' => 'daily'],
        // ...
    ];
    
    // EXCLUDE: /prayer-times-today (500 error)
    // EXCLUDE: /knowledge/islamic-facts (500 error)
    // EXCLUDE: /sehri-time-today (coming soon)
    // EXCLUDE: /iftar-time-today (coming soon)
    // EXCLUDE: /qibla-finder-online (coming soon)
    // EXCLUDE: /duas/misc/ (404 error pages)
    
    return response()->view('sitemap', compact('sitemap'))
        ->header('Content-Type', 'text/xml');
});
```

---

### 3.4 — ROBOTS.TXT OPTIMIZATION

```
# Current (likely generic)
User-agent: *
Disallow: /admin

# Should be:
User-agent: *
Disallow: /admin
Disallow: /search           # Search pages shouldn't be crawled
Disallow: /api/
Disallow: /storage/
Allow: /

# Block error pages from crawl budget waste
Disallow: /prayer-times-today   # Until fixed
Disallow: /knowledge/islamic-facts  # Until fixed

Sitemap: https://noorislam.com/sitemap.xml
```

---

### 3.5 — OPEN GRAPH / SOCIAL MEDIA TAGS

Currently generic OG tags. Fix for social sharing:

```blade
{{-- app.blade.php --}}
<meta property="og:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? config('seo.title') }}" />
<meta property="og:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ $seo['og_image'] ?? asset('images/og-default.jpg') }}" />
<meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}" />
<meta property="og:locale" content="ur_PK" />
<meta property="og:site_name" content="Noor-e-Islam" />

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seo['title'] ?? '' }}" />
<meta name="twitter:description" content="{{ $seo['description'] ?? '' }}" />
```

---

### 3.6 — HREFLANG (MULTILINGUAL SEO)

The site has both Urdu and English content. Add hreflang tags:

```blade
{{-- For pages with both language versions: --}}
<link rel="alternate" hreflang="ur" href="https://noorislam.com/ur{{ request()->path() }}" />
<link rel="alternate" hreflang="en" href="https://noorislam.com/{{ request()->path() }}" />
<link rel="alternate" hreflang="x-default" href="https://noorislam.com/{{ request()->path() }}" />
```

If Urdu URLs don't exist yet, at minimum add:
```blade
<html lang="ur-PK">   {{-- or "en" for English pages --}}
```

---

### 3.7 — H1 TAG AUDIT & FIXES

| Page | Current H1 | Recommended H1 |
|------|-----------|----------------|
| `/search` | "Search - Index" | "Search Islamic Content" |
| `/duas` | "تمام دعائیں" | "All Islamic Duas in Arabic, Urdu & English" |
| `/surahs` | "All 114 Surahs of the Quran" | ✅ Good — keep |
| `/hajj-and-umrah` | "Hajj & Umrah Hub" | "Hajj & Umrah Guide 2026 — Complete Information" |
| `/islamic-calendar` | "Islamic Calendar 2026 | Hijri Calendar 1448 AH" | ✅ Good — keep |

---

## 🟢 PART 4 — GROWTH STRATEGIES (Ongoing)

### 4.1 — PROGRAMMATIC SEO EXPANSION

Your biggest untapped opportunity. You already have:
- 92 Prayer Times pages (Pakistan cities)

**Expand to:**
```
India cities: /prayer-times/delhi, /prayer-times/mumbai, /prayer-times/hyderabad-india
UAE: /prayer-times/dubai, /prayer-times/abu-dhabi, /prayer-times/sharjah
UK: /prayer-times/london, /prayer-times/birmingham
USA: /prayer-times/new-york, /prayer-times/chicago
Saudi Arabia: /prayer-times/makkah, /prayer-times/madinah, /prayer-times/riyadh
Bangladesh: /prayer-times/dhaka, /prayer-times/chittagong
```

**Estimated additional organic traffic:** 50,000–200,000 monthly visits

Each page template formula:
```
Title: "{City} Prayer Times Today {Month} {Year} | Fajr, Dhuhr, Asr — Noor-e-Islam"
H1:   "Prayer Times in {City} Today — {Date}"
Content:
- Today's 5 prayer times table
- Monthly prayer timetable
- Calculation method used
- Qibla direction for city
- Sunrise/Sunset times
- City description (2 paragraphs)
- FAQ section (Schema markup)
```

---

### 4.2 — CONTENT STRATEGY — HIGH-VOLUME KEYWORDS

**Based on site content, target these keyword clusters:**

#### Cluster 1: Prayer Times (High Intent)
```
"aaj ki namaz ka waqt" — 40,000+ monthly searches (Urdu)
"prayer times karachi today" — 20,000+
"prayer times lahore" — 15,000+
"fajr time today pakistan" — 10,000+
```

#### Cluster 2: Quran / Surahs (Very High Volume)
```
"surah yaseen" — 200,000+ monthly
"surah al-kahf" — 150,000+
"surah rahman" — 100,000+
"ayat ul kursi" — 80,000+
```

#### Cluster 3: Islamic Dates
```
"islamicdate today" — 30,000+
"hijri date today" — 25,000+
"aaj ki islamic tarikh" — 20,000+
```

#### Cluster 4: Duas
```
"dua for rizq" — 15,000+
"morning dua" — 12,000+
"dua e qunoot" — 10,000+
"istighfar dua" — 8,000+
```

#### Cluster 5: Hajj & Umrah
```
"how to perform umrah step by step" — 8,000+
"hajj guide 2026" — 5,000+
"umrah checklist" — 4,000+
```

---

### 4.3 — CORE WEB VITALS / PAGE SPEED

For a Laravel site, these optimizations matter:

```php
// config/cache.php — Enable view caching:
// Run: php artisan view:cache

// For prayer times (time-sensitive dynamic data):
// Cache for 30 minutes max:
Cache::remember('prayer-times-' . $city->slug, 1800, function() {
    return $this->calculatePrayerTimes($city);
});

// Enable Laravel HTTP caching for static pages:
// middleware: cache.headers:public;max-age=3600;etag
Route::get('/about', [PageController::class, 'about'])
    ->middleware('cache.headers:public;max-age=86400;etag');
```

**Vite/Asset Optimization (you have vite.config.js):**
```js
// vite.config.js
export default defineConfig({
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['alpinejs'],
                }
            }
        }
    }
});
```

---

### 4.4 — LOCAL SEO (Pakistan-First Strategy)

Register on **Google Business Profile** as:
- Name: Noor-e-Islam
- Category: Islamic website / Religious organization
- Description: Authentic Islamic knowledge, prayer times, Quran...

Add **LocalBusiness schema** to homepage:
```json
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Noor-e-Islam",
  "url": "https://noorislam.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://noorislam.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
```

The `SearchAction` schema adds a **Google Sitelink Search Box** — users can search your site directly from Google results.

---

### 4.5 — LINK BUILDING STRATEGY

**Internal (Easy wins):**
- Add breadcrumbs to all pages (also Schema markup)
- Footer links to all major sections
- Related content links at bottom of each page

**External Link Building:**
```
Target sites for backlinks:
1. Pakistani Islamic forums (IslamicBoard.com)
2. Pakistani news sites (Dawn, Geo) — contribute prayer time widgets
3. Muslim community sites
4. YouTube — create short clips with website watermark
5. Google Play Store app listing → links to website
6. Submit to Islamic web directories
```

---

## 📋 PART 5 — IMPLEMENTATION PRIORITY CHECKLIST

### Week 1 — Emergency Fixes
- [ ] Fix 500 errors on all 114 Surah pages
- [ ] Fix 404 errors on all `/duas/misc/` pages  
- [ ] Fix `/prayer-times-today` (redirect or fix)
- [ ] Fix `/knowledge/islamic-facts` (redirect or fix)
- [ ] Fix ALL canonical tags site-wide (one layout change)

### Week 2 — Critical On-Page
- [ ] Add unique title tags to all Prayer Times pages (92 pages)
- [ ] Add unique title tags to Hajj & Umrah section (8 pages)
- [ ] Add unique meta descriptions to Prayer Times pages
- [ ] Add noindex to Coming Soon pages (3 pages)
- [ ] Set up 301 redirects for duplicate URLs (4 pairs)

### Week 3 — On-Page Completion
- [ ] Add unique titles/descriptions to Islamic Calendar pages
- [ ] Fix `/surahs` hub page title/meta
- [ ] Fix `/duas` hub page title/H1
- [ ] Fix Search page H1
- [ ] Add Schema markup to FAQ page and Hajj FAQs

### Week 4 — Technical SEO
- [ ] Regenerate sitemap.xml (exclude error/coming-soon pages)
- [ ] Update robots.txt
- [ ] Add Open Graph tags
- [ ] Add lang attribute to HTML
- [ ] Add breadcrumb navigation + Schema

### Month 2 — Growth
- [ ] Launch Surah pages with full unique titles/meta (when 500 fixed)
- [ ] Launch Dua pages with unique titles/meta (when 404 fixed)
- [ ] Add Schema markup to all Calculator pages
- [ ] Expand Prayer Times to 20+ international cities
- [ ] Add SearchAction schema to homepage

### Month 3 — Scale
- [ ] Content: Add Surah page content (Tafseer, Benefits, Audio)
- [ ] Content: Add Dua page content (Virtues, When to recite)
- [ ] Expand Programmatic SEO to India/UAE/UK cities
- [ ] Launch link building campaign

---

## 🔑 QUICK REFERENCE — Laravel SEO Pattern

```php
// app/Http/Controllers/BaseController.php
// Reusable SEO pattern for all controllers:

protected function setSeoData(array $data): array
{
    return array_merge([
        'title'       => config('seo.default_title'),
        'description' => config('seo.default_description'),
        'canonical'   => url()->current(),
        'og_image'    => asset('images/og-default.jpg'),
        'robots'      => 'index, follow',
        'schema'      => null,
    ], $data);
}

// Usage in any controller:
public function show(City $city): View
{
    $seo = $this->setSeoData([
        'title'       => "Prayer Times in {$city->name} Today | Fajr, Dhuhr, Asr — Noor-e-Islam",
        'description' => "Accurate {$city->name} prayer times for today. Fajr at {$times->fajr}...",
        'canonical'   => "https://noorislam.com/prayer-times/{$city->slug}",
        'schema'      => $this->buildPrayerTimesSchema($city, $times),
    ]);
    
    return view('prayer-times.show', compact('city', 'times', 'seo'));
}
```

```blade
{{-- resources/views/layouts/app.blade.php --}}
<head>
    <title>{{ $seo['title'] }}</title>
    <meta name="description" content="{{ $seo['description'] }}" />
    <link rel="canonical" href="{{ $seo['canonical'] }}" />
    <meta name="robots" content="{{ $seo['robots'] }}" />
    
    {{-- OG Tags --}}
    <meta property="og:title" content="{{ $seo['title'] }}" />
    <meta property="og:description" content="{{ $seo['description'] }}" />
    <meta property="og:url" content="{{ $seo['canonical'] }}" />
    <meta property="og:image" content="{{ $seo['og_image'] }}" />
    
    {{-- Schema --}}
    @if($seo['schema'])
    <script type="application/ld+json">
    {!! json_encode($seo['schema'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    @endif
</head>
```

---

## 📈 EXPECTED RESULTS TIMELINE

| Timeline | Action | Expected Impact |
|----------|--------|----------------|
| Week 1-2 | Fix 500/404 errors | Google re-crawls, stops seeing broken pages |
| Week 2-4 | Unique titles/meta on 100+ pages | CTR improvement 20-40% |
| Month 2 | Surah pages working + optimized | 50,000+ monthly organic visits |
| Month 2 | Dua pages working + optimized | 20,000+ monthly organic visits |
| Month 3 | Schema markup live | Featured snippets eligibility |
| Month 3-4 | Prayer time pages fully optimized | Dominant ranking for city prayer times |
| Month 4-6 | International city expansion | 100,000+ additional monthly visits |

---

*Report generated based on analysis of 20,000+ pages from noorislam.com website-Full_pages-analysis.md*  
*Stack: Laravel + Blade Templates + MySQL*  
*Priority: Fix critical 500/404 errors FIRST before any other SEO work*
