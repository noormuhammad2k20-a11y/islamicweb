# Noor-e-Islam: Islamic Date Today Page — Complete Master Analysis & Implementation Roadmap
**For Antigravity (AI Developer) — Hand-Off Document**
**Prepared:** July 3, 2026 | **Project:** `noormuhammad2k20-a11y/islamicweb` | **Target Page:** `/islamic-date-today`

---

## TABLE OF CONTENTS

1. [Project State Audit](#1-project-state-audit)
2. [Database Analysis](#2-database-analysis)
3. [API Implementation Audit](#3-api-implementation-audit)
4. [Bugs & Critical Issues Found](#4-bugs--critical-issues-found)
5. [Competitor Analysis — HamariWeb](#5-competitor-analysis--hamariweb)
6. [Gap Analysis](#6-gap-analysis)
7. [Complete Feature Recommendations](#7-complete-feature-recommendations)
8. [Database Improvements](#8-database-improvements)
9. [API Optimization](#9-api-optimization)
10. [Caching Strategy](#10-caching-strategy)
11. [SEO Implementation — Complete Spec](#11-seo-implementation--complete-spec)
12. [Schema Markup Implementation](#12-schema-markup-implementation)
13. [Internal Linking Strategy](#13-internal-linking-strategy)
14. [Content Strategy](#14-content-strategy)
15. [Performance Optimization](#15-performance-optimization)
16. [Security Improvements](#16-security-improvements)
17. [Programmatic SEO & URL Architecture](#17-programmatic-seo--url-architecture)
18. [Multilingual Implementation](#18-multilingual-implementation)
19. [Prioritized Implementation Roadmap](#19-prioritized-implementation-roadmap)
20. [Definition of Done](#20-definition-of-done)

---

## 1. PROJECT STATE AUDIT

### 1.1 Tech Stack (Confirmed)
- **Framework:** Laravel (PHP 8.2.12 / MariaDB 10.4.32 on XAMPP 127.0.0.1:3307)
- **Admin Panel:** Filament v3/v5.6 — installed and live at `/admin`
- **Frontend:** Blade + Vanilla JS + Vite CSS pipeline
- **Templating:** Server-side Blade (correct — Google-crawlable)
- **Current Build Phase:** Phase 2 (Waves 1 & 2) — COMPLETED per `walkthrough.md`
- **Remaining Work:** Phases 3–5 (sitemap generator, Hijri-Gregorian converter AJAX, final content waves)

### 1.2 Repository Structure (Confirmed from GitHub)
```
islamicweb/
├── app/
│   ├── Http/Controllers/     (IslamicDateController, PrayerTimesController, etc.)
│   └── Models/
├── resources/views/          (Blade templates)
├── routes/web.php            (bilingual locale group confirmed)
├── database/                 (migrations, seeders)
├── antigravity-master-prompt.md  ← existing master build spec
├── walkthrough.md            ← Phase 2 completion summary
└── fix_*.php, patch_*.php    ← hotfix scripts (TECHNICAL DEBT)
```

### 1.3 Languages (from GitHub stats)
- HTML: 39.5% | Blade: 31.7% | PHP: 17.7% | CSS: 10.9%

### 1.4 Current `/islamic-date-today` Status
Based on the antigravity-master-prompt.md (the authoritative spec) and walkthrough.md, the Islamic Date hub at `/islamic-date-today` was built in Phase 2. Current confirmed capabilities:
- ✅ Hijri date display (from `hijri_date_caches` table, sourced from AlAdhan API)
- ✅ Prayer time mini-widget (from `prayer_times` table)
- ✅ Pakistan country page (`/islamic-date-today/pakistan`)
- ✅ Bilingual `/ur/` route architecture
- ✅ Filament admin panel live
- ✅ Database-driven (no hardcoded dates)
- ❌ Hijri-Gregorian Converter AJAX tool (not yet built — stated as next step)
- ❌ Dynamic sitemap generator (not yet built)
- ❌ Full content for all countries and cities
- ❌ Moon phase widget
- ❌ Countdown timers (Ramadan, Eid, Hajj)
- ❌ Date Converter embedded on date page
- ❌ Rich FAQ content block
- ❌ Related articles / related duas
- ❌ Social share / print version
- ❌ Historical Islamic events for today's Hijri date

### 1.5 Fix Scripts — Technical Debt (CRITICAL)
The presence of `fix_layout.php`, `fix_models.php`, `fix_prayer_home.php`, `patch_migrations.php`, and `create_db.php` at the project root indicates work-in-progress fixes applied directly. These **must not be left at the public web root** in production — they are exploitable if accidentally web-accessible.

**Action:** Move all `fix_*.php` and `patch_*.php` files out of the project root or add them to `.gitignore` and `.htaccess`/nginx deny rules before any production deployment.

---

## 2. DATABASE ANALYSIS

### 2.1 Confirmed Tables (73 total)

| Table | Status | Notes |
|---|---|---|
| `hijri_date_caches` | ✅ Populated | Source: "AlAdhan API (UAQ)" — correct |
| `prayer_times` | ✅ Populated | City 1 (Karachi/Pakistan), 30 days ahead |
| `hijri_months` | ✅ Populated | All 12 months — content is THIN (1-2 sentences per month) |
| `islamic_events` | ✅ Populated | 6 events (Eid x2, Shab-e-Meraj, Shab-e-Barat, Ashura, etc.) |
| `countries` | ✅ Populated | Pakistan, Saudi Arabia, UAE, India, Bangladesh |
| `cities` | ⚠️ 1 entry (inferred) | Only 1 INSERT statement found — severely under-seeded |
| `seo_metas` | ❌ Empty | No SEO meta overrides set |
| `allah_names` | ✅ All 99 | Good |
| `surahs` | ✅ Present | Data quality unknown |
| `ayahs` | ✅ Populated | Arabic text confirmed |
| `duas` | ✅ Present | Need verification |
| `knowledge_articles` | ✅ Present | Need verification |
| `page_views` | ✅ Present | Analytics tracking ready |

### 2.2 Critical Database Issues Found

**Issue 1: `hijri_months.significance_content` is placeholder-thin**
- Muharram: "The month of remembrance. Fasting on the Day of Ashura is highly recommended."
- Safar: "The second month of the Islamic calendar."
- Other months: Presumed similarly thin
- **Impact:** Google Scaled Content Abuse risk. Each month page needs 300–500 words of original, cited content.

**Issue 2: `hijri_date_caches` only starts from July 15, 2026**
- Today is July 3, 2026. There is NO cached entry for today's date (July 3, 2026) in `hijri_date_caches`.
- The `prayer_times` table has row ID 3 for 2026-07-03 (city_id=1).
- **BUG:** The page at `/islamic-date-today` will fail to display today's Hijri date if the controller queries `hijri_date_caches` for today's date — it won't find a row.
- **Fix:** The `RefreshIslamicData` scheduled command must populate today's date on every run, not start 12 days in the future. Run `php artisan app:refresh-islamic-data` immediately and fix the date range.

**Issue 3: `hijri_month_number` column in `hijri_date_caches` exists but `hijri_date_caches` source is "AlAdhan API (UAQ)" — this is UAE, not Pakistan**
- The hijri date from UAE will differ from Pakistan by 1 day (Pakistan follows Ruet-e-Hilal Committee).
- **BUG:** The cache should have TWO rows per date — one for global/Saudi/calculated, and one for Pakistan local sighting. Currently it only has one, and it's from UAE.
- **Fix:** Add a `country_id` or `region` column to `hijri_date_caches`, or a `local_date` / `global_date` pair approach. See Section 8.

**Issue 4: `prayer_times.fajr` is stored as VARCHAR `"04:18"` not TIME**
- The `fajr`, `sunrise`, `dhuhr`, `asr`, `maghrib`, `isha` columns are VARCHAR, but `imsak`, `midnight`, `last_third` are TIME.
- This inconsistency causes sorting issues and makes time comparison queries incorrect.
- **Fix:** Migrate all prayer time columns to TIME or standardize to VARCHAR HH:MM with a `TIME` cast.

**Issue 5: `prayer_times.calc_method` is NULL for all rows**
- The calculation method is stored in the `method` column as "1" (integer string, not descriptive).
- Method "1" in AlAdhan API = University of Islamic Sciences, Karachi.
- **Impact:** The Template D SEO requirement says "name the method + angle parameters explicitly" — this is missing.
- **Fix:** Add a `method_name` VARCHAR column or join with a `prayer_calc_methods` lookup table.

**Issue 6: `countries.local_context_note` is identical boilerplate**
- All 5 countries have: "Islamic resources and accurate prayer timings for Muslims in [Country]."
- This is exactly the Scaled Content Abuse pattern the master spec warns against.
- **Fix:** Write genuinely unique 150-word paragraphs for each country, focusing on their specific moon-sighting authority, local calendar conventions, and major Islamic institutions.

**Issue 7: `cities` table has only 1 city**
- Only 1 INSERT statement found. The Wave 1 spec requires Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad at minimum.
- **Fix:** Seed all Wave 1 priority cities with real lat/lng, timezone, prayer_calc_method, and UNIQUE local_context_note.

**Issue 8: No `moon_phase` table**
- There is no table for moon phase data.
- This is a differentiating feature neither HamariWeb nor competitors offer.
- **Fix:** Add a `moon_phases` table (see Section 8).

**Issue 9: No `date_converter_log` or converter cache**
- The Hijri-Gregorian converter (Template H) doesn't have a dedicated lookup table.
- Queries should be cached to avoid repeated API calls for the same date pair.
- **Fix:** Use `hijri_date_caches` as the converter backing store (it already maps gregorian↔hijri), or add a separate `date_conversion_cache` table.

**Issue 10: `islamic_events` has only 6 events**
- Missing: Mawlid al-Nabi, Laylat al-Qadr, first day of each month, Day of Arafah, Isra and Mi'raj (already in as Shab-e-Meraj), 9 Dhul Hijjah, etc.
- **Fix:** Seed all ~30+ significant Islamic dates with full descriptions and source citations.

---

## 3. API IMPLEMENTATION AUDIT

### 3.1 Hijri Date API (AlAdhan)
**API Used:** AlAdhan API — confirmed from source string "AlAdhan API (UAQ)" in `hijri_date_caches`
**Endpoint (inferred):** `https://api.aladhan.com/v1/gToH/{date}` or calendar endpoint

**Verified Correct Practices:**
- ✅ Caching to DB (avoids repeated API calls)
- ✅ Storing `fetched_at` timestamp

**Issues Found:**
- ❌ Using UAE (UAQ = Umm Al Quwain) as the conversion base — this gives global/Saudi date, not Pakistan local date
- ❌ No fallback mechanism documented — if AlAdhan is down, the page silently fails
- ❌ `hijri_date_caches` starts July 15, not July 3 (today) — scheduler not running or range is wrong
- ❌ No `method` parameter being stored — AlAdhan supports method 1-23 for different calculation schools
- ❌ No Arabic numeral date stored in cache — needed for the Arabic date display requirement

**Correct AlAdhan Endpoint for Pakistan:**
```
GET https://api.aladhan.com/v1/gToH?date=DD-MM-YYYY&adjustment=0
```
For Pakistan local date (adjusted for moon sighting): Store a `local_pakistan_date` separately, flagged with `source = 'pakistan_ruet_adjusted'`.

### 3.2 Prayer Times API (AlAdhan)
**Confirmed:** `prayer_times` table populated with 30 days of data for city_id=1
**Method used:** "1" = University of Islamic Sciences, Karachi

**Issues Found:**
- ❌ `fetched_at` is NULL on all rows — timestamp not being stored despite the column existing
- ❌ Only city_id=1 has data — no other cities have prayer times
- ❌ `method` stored as "1" (opaque integer) with no human-readable label
- ❌ Times are fetched in advance but `RefreshIslamicData` scheduler may not be running (no `fetched_at` timestamp)
- ❌ Two separate cached versions exist in the `cache` table (Laravel file cache + DB) — double-caching without TTL coordination

**Correct AlAdhan Prayer Times Endpoint:**
```
GET https://api.aladhan.com/v1/calendar/{year}/{month}?latitude={lat}&longitude={lng}&method={method}
```

### 3.3 Quran Text (Al-Quran Cloud / Static)
No direct API call logs visible; the `ayahs` table contains Arabic text, so Quran content is stored statically in the database (correct — avoids API dependency for Quran text).

### 3.4 Missing APIs to Integrate
- **Moon Phase API:** Visual Crossing Weather API or `https://api.farmsense.net/v1/moonphases/` — needed for moon phase widget
- **Qibla Direction:** `https://api.aladhan.com/v1/qibla/{latitude}/{longitude}` — already in AlAdhan, zero extra cost
- **Islamic Events Countdown:** Pure PHP/Laravel calculation from `islamic_events` table (no external API needed)

---

## 4. BUGS & CRITICAL ISSUES FOUND

### BUG-001 — CRITICAL: Today's Hijri Date Missing from Cache
**Symptom:** `/islamic-date-today` will show empty/error for Hijri date today (July 3, 2026)
**Root Cause:** `hijri_date_caches` starts from 2026-07-15, not today
**Fix:**
```php
// In RefreshIslamicData command, change date range:
// WRONG: Carbon::now()->addDays(1) to Carbon::now()->addDays(30)
// CORRECT: Carbon::today() to Carbon::today()->addDays(60)
// Then run: php artisan app:refresh-islamic-data
```

### BUG-002 — HIGH: Pakistan vs Global Date Mismatch
**Symptom:** Page shows global Hijri date (from UAE), not Pakistan date (which may be 1 day different)
**Root Cause:** `hijri_date_caches.source = 'AlAdhan API (UAQ)'` — single source, no regional differentiation
**Fix:** Add `pakistan_hijri_day` and `saudi_hijri_day` columns or add a `region` foreign key to `hijri_date_caches`

### BUG-003 — HIGH: Prayer Time Data Type Inconsistency
**Symptom:** `prayer_times.fajr` is `varchar "04:18"` but `prayer_times.imsak` is `time "04:08:00"` — inconsistent formats
**Fix:** Standardize all time columns to `time` type or all to `varchar(5) HH:MM`

### BUG-004 — MEDIUM: `fetched_at` NULL on all prayer_times rows
**Symptom:** `fetched_at` column is NULL — "Last updated" stamp cannot be shown accurately
**Fix:** Add `fetched_at = now()` in the seeder/command when inserting prayer times

### BUG-005 — MEDIUM: Duplicate Cache (DB + Laravel File Cache)
**Symptom:** `cache` table contains serialized PHP objects for prayer times AND the `prayer_times` table also has the data — two sources of truth
**Fix:** Remove Laravel file/DB cache layer for prayer times; use `prayer_times` table directly with a simple `where('city_id', $id)->where('date', today())->first()` query

### BUG-006 — MEDIUM: `fix_*.php` Scripts Accessible at Web Root
**Symptom:** `fix_layout.php`, `fix_models.php`, `fix_prayer_home.php`, `patch_migrations.php`, `create_db.php` exist at public-accessible root
**Fix:** Add to `.gitignore`, move to `storage/` or delete entirely before production

### BUG-007 — LOW: `hijri_months.significance_content` Fails Uniqueness Test
**Symptom:** Safar: "The second month of the Islamic calendar." — 7 words, fails the "genuinely unique paragraph" requirement
**Fix:** Expand all 12 months to 300-500 words with real Quran/Hadith citations

### BUG-008 — LOW: `calc_method` column NULL, `method` is opaque "1"
**Symptom:** Prayer method not labeled; Template D requires naming the method explicitly
**Fix:** Store human-readable method name: "University of Islamic Sciences, Karachi (Method 1, Fajr: 18°, Isha: 18°)"

---

## 5. COMPETITOR ANALYSIS — HAMARIWEB

### 5.1 HamariWeb Islamic Calendar Page Overview
**URL:** `https://hamariweb.com/islam/islamic-calendar.aspx`
**Title:** "Islamic Date Today – Hijri Date & Calendar 2026"
**Meta Desc:** "View the complete Islamic calendar 2026 with Gregorian conversions. Get the exact Islamic date today based on local moon sighting committee data."

### 5.2 What HamariWeb Does Well

| Feature | HamariWeb Status | Notes |
|---|---|---|
| Today's Islamic date (Pakistan) | ✅ 17 Muharram 1448 | Prominently above fold |
| Global Islamic date | ✅ 18 Muharram 1448 | Distinguishes Pakistan vs global |
| Full-year calendar grid | ✅ All 12 months | Gregorian↔Hijri dual-column |
| Month navigation (dropdown) | ✅ Functional | Jan–Dec + 1977–2026 year selector |
| Hijri month name links | ✅ /muharram_calendar.aspx | 12 separate month pages |
| Moon sighting context | ✅ "local moon sighting committee data" | Referenced in meta desc |
| Urdu date explanation | ✅ "What is the Urdu Date Today?" | Addresses local user intent |
| Internal navigation (Islam hub) | ✅ 6 sub-sections in nav | Prayer Times, Ramadan, Quran, Hadith, etc. |
| Social sharing | ✅ Twitter/Facebook links | |
| Comments section | ✅ Real user comments | With city attribution |
| OG/Twitter card | ✅ og:image set | |
| Canonical | ✅ Self-referencing | |
| Meta keywords | ✅ Present | (Low SEO value but present) |

### 5.3 What HamariWeb Does POORLY (Your Opportunities)

| Weakness | Severity | Your Opportunity |
|---|---|---|
| No `/islamic-date-today/{country}/{city}` city-level pages | 🔴 HIGH | Noor-e-Islam has this route architecture — execute it |
| No Hijri-Gregorian date converter tool | 🔴 HIGH | Build Template H — biggest differentiator |
| No prayer times on Islamic date page | 🔴 HIGH | Cross-link + embed mini prayer widget |
| No countdown to Ramadan / Eid / Hajj | 🔴 HIGH | Users search for "days until Ramadan 2026" constantly |
| No moon phase information | 🟠 MEDIUM | Unique feature, zero competition |
| No Qibla direction | 🟠 MEDIUM | Users looking for this while checking date |
| No structured data / Schema.org | 🟠 MEDIUM | HamariWeb has ZERO JSON-LD; you can dominate rich results |
| No hreflang / bilingual architecture | 🟠 MEDIUM | Urdu-speaking diaspora globally underserved |
| Thin written content (calendar is mostly table) | 🟠 MEDIUM | Write 600+ words of original content on each page |
| .aspx URL (ASP.NET legacy) | 🟡 LOW | Your clean Laravel slugs are better |
| No breadcrumbs | 🟡 LOW | Add BreadcrumbList schema |
| No `<time datetime>` on dates | 🟡 LOW | Google requires this for date freshness signals |
| No author / EEAT signals | 🟡 LOW | Add author box + scholar reviewer badge |
| FAQ section absent | 🟡 LOW | Add FAQPage content (even without rich-snippet) |
| No date converter for historical dates | 🟡 LOW | Allow Gregorian→Hijri for any year (1400–1500 AH) |
| No per-country Islamic event differences | 🟡 LOW | Pakistan celebrates Eid 1 day after Saudi — explain this |
| Ads everywhere | 🟡 LOW | If you stay clean, trust signals are higher |

### 5.4 Page-by-Page Feature Comparison

| Dimension | HamariWeb Score | Noor-e-Islam (Current) | Target |
|---|---|---|---|
| Content depth | 4/10 | 5/10 (unknown) | 9/10 |
| Feature richness | 5/10 | 4/10 | 10/10 |
| User experience | 6/10 | Unknown | 9/10 |
| Technical SEO | 5/10 | 6/10 | 10/10 |
| Schema markup | 1/10 | Unknown | 10/10 |
| Mobile experience | 6/10 | Unknown | 9/10 |
| Internal linking | 7/10 | 4/10 | 10/10 |
| Page speed | 5/10 | Unknown | 9/10 |
| Accessibility | 5/10 | Unknown | 9/10 |
| E-E-A-T signals | 3/10 | 2/10 | 9/10 |
| Multilingual | 1/10 (no `/ur/`) | 8/10 (route exists) | 10/10 |
| Programmatic SEO | 6/10 | 3/10 | 10/10 |

---

## 6. GAP ANALYSIS

### 6.1 Features HamariWeb Has That You Must Also Have
- [x] Today's date display (Pakistan + Global) — you have this
- [ ] Full 12-month dual-calendar grid for current year — BUILD THIS
- [ ] Month dropdown navigation (Jan–Dec) — BUILD THIS
- [ ] Year selector (historical) — BUILD THIS (cap at ±2 years per spec)
- [x] Moon sighting authority attribution — partially (it's in `countries` table)
- [ ] User comments with city attribution — BUILD THIS (infrastructure exists in `comments` table)

### 6.2 Features Missing from Both That You Must Add
- [ ] **Countdown timers** — Days to Ramadan 2027, Eid ul Fitr, Eid ul Adha, Hajj
- [ ] **Interactive Hijri-Gregorian converter** (AJAX tool) — biggest differentiator
- [ ] **Today's historical events** — What happened on this Hijri date in Islamic history
- [ ] **Moon phase widget** — Current lunar phase with phase name and percentage
- [ ] **Qibla direction** for default city
- [ ] **Prayer times mini-widget** embedded on date page
- [ ] **Related Islamic duas** for the current month (e.g., Muharram duas)
- [ ] **Related Islamic articles** from `knowledge_articles`
- [ ] **Breadcrumb navigation** (visual + schema)
- [ ] **Social share buttons** (WhatsApp is critical for Pakistani audience)
- [ ] **Print version** (CSS @media print)
- [ ] **City-switcher widget** (let users pick their city to see local date)
- [ ] **FAQPage content block** (15 targeted questions)
- [ ] **Author/Scholar EEAT block**
- [ ] **"Last verified" timestamp** visible to user
- [ ] **Hijri month significance block** (current month facts)
- [ ] **Islamic events this month** list

### 6.3 SEO Gaps (Specific)

**Missing from current implementation:**
- `FAQPage` JSON-LD schema (even without rich snippet, valuable for AI Overviews)
- `WebPage` schema with `dateModified` and `author`
- `BreadcrumbList` schema
- `Organization` schema with `sameAs` social profiles
- `Event` schema for upcoming Islamic events
- `hreflang` lang/ur pairs (route exists but tags may not be emitted)
- `<time datetime="2026-07-03">` on all displayed dates
- Open Graph image (dynamic OG image with today's date would be ideal)
- Canonical URL (must be `/islamic-date-today`, not `/islamic-date-today/`)

**Missing Meta content:**
- Title should be: "Islamic Date Today — 17 Muharram 1448 | Noor-e-Islam" (dynamic, changes daily)
- Meta description must include today's Hijri date (dynamic, changes daily)
- H1 must be unique and match intent: "Islamic Date Today — آج کی اسلامی تاریخ"
- H2 hierarchy: Pakistan Date → Global Date → This Month → Converter → Countdown → FAQ

---

## 7. COMPLETE FEATURE RECOMMENDATIONS

### 7.1 Section Architecture for `/islamic-date-today` Hub Page

Build the page in this exact section order (server-rendered Blade):

```
1. HERO SECTION (above fold, no scroll)
   ├── H1: "Islamic Date Today — آج کی اسلامی تاریخ"
   ├── Pakistan Date card (Hijri day + month + year in Arabic + Urdu + English)
   ├── Global Date card (separate)
   ├── Gregorian Date (formatted)
   ├── Day of Week (in Arabic, English, Urdu)
   └── Last verified timestamp <time datetime="...">

2. CURRENT MONTH SIGNIFICANCE BLOCK
   ├── Hijri month name (Arabic, Urdu, English)
   ├── Month number / total days
   ├── Significance paragraph (from hijri_months.significance_content — must be 300+ words)
   └── Link to /islamic-calendar/{month}

3. TODAY'S ISLAMIC EVENTS
   └── List of events on today's Hijri date (from islamic_events)
       + historical events (from historical_events table)

4. COUNTDOWN TIMERS (WIDGET)
   ├── Days to Ramadan 2027
   ├── Days to Eid ul Fitr
   ├── Days to Eid ul Adha
   └── Days to Hajj season (Dhul Hijjah 8)

5. MINI PRAYER TIMES WIDGET
   ├── Default city (Karachi / user's city via JS geolocation)
   ├── 5 prayers + Sunrise
   └── Link to /prayer-times/{city}

6. MINI HIJRI-GREGORIAN CONVERTER (EMBEDDED)
   ├── Gregorian → Hijri input
   ├── Hijri → Gregorian input
   └── AJAX call to /ajax/hijri-convert
   (Full page at /hijri-gregorian-converter)

7. FULL-YEAR CALENDAR GRID
   ├── 12-month grid (current Hijri year)
   ├── Each day shows Hijri date (sub-text) below Gregorian date
   ├── Islamic events highlighted
   └── Month navigation

8. MOON PHASE WIDGET
   ├── Current phase name (New Moon / Waxing Crescent / etc.)
   ├── Phase percentage illuminated
   ├── Days to next new moon (critical for Hijri calendar)
   └── Visual phase icon

9. IMPORTANT ISLAMIC EVENTS THIS YEAR (LIST)
   └── Table: Event name | Hijri date | Gregorian date | Days away

10. CITY SELECTOR
    └── "View Islamic date for your city:" → city search + links

11. FAQ BLOCK (H3 questions + paragraph answers)
    ├── Q: What is today's Islamic date in Pakistan?
    ├── Q: What is today's global Hijri date?
    ├── Q: Why is Pakistan's Islamic date different from Saudi Arabia?
    ├── Q: What month is it in the Islamic calendar?
    ├── Q: How do I convert a Gregorian date to Hijri?
    ├── Q: What is the difference between Hijri and Gregorian calendars?
    ├── Q: When does the next Islamic month begin?
    ├── Q: What Islamic events are coming up?
    ├── Q: Is today a special Islamic day?
    └── Q: What prayer time is it now?

12. RELATED DUAS (for current Hijri month)
    └── 3-4 duas from duas table, linked to /duas/{slug}

13. RELATED ARTICLES
    └── 3-4 from knowledge_articles, linked to /knowledge/{slug}

14. INTERNAL LINKS BLOCK
    ├── → /prayer-times (Prayer Times Hub)
    ├── → /hijri-gregorian-converter
    ├── → /islamic-calendar/muharram (Current Month)
    ├── → /ramadan/2027
    └── → /islamic-date-today/pakistan/karachi

15. COMMENTS SECTION
    └── AJAX submit, pending moderation, show approved comments

16. AUTHOR BOX
    └── From authors table

17. BREADCRUMB
    └── Home > Islamic Date Today
```

### 7.2 Country Page (`/islamic-date-today/{country}`) — Full Spec

**Required elements per Template A in master spec:**
- Dynamic title: `Islamic Date Today in Pakistan — 17 Muharram 1448 AH`
- Meta: 140-155 chars, includes date + moon authority
- H1 (one per page): `Islamic Date Today in Pakistan`
- Above fold: Hijri + Gregorian side by side (EN + UR)
- H2: "What is today's Islamic date in Pakistan?"
- H2: "Which moon-sighting authority does Pakistan follow?" → Name "Ruet-e-Hilal Committee Pakistan" explicitly
- H2: "This month — Muharram 1448" → 100-150 unique words
- H2: "Cities in Pakistan" → internal links
- H2: "Frequently Asked Questions"
- 500-700 total words, genuine unique content
- Schema: WebPage + BreadcrumbList + Organization + FAQPage

### 7.3 City Page (`/islamic-date-today/{country}/{city}`) — Full Spec

Same structure as country page but:
- 300-400 words
- Prayer times mini-widget embedded
- Adds: "Prayer Times in {City} Today" widget linking to `/prayer-times/{city}`

---

## 8. DATABASE IMPROVEMENTS

### 8.1 New Tables to Add

```sql
-- Moon phases (cache from API or calculate via PHP)
CREATE TABLE moon_phases (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  date DATE NOT NULL UNIQUE,
  phase_name VARCHAR(50) NOT NULL,  -- 'New Moon', 'Waxing Crescent', etc.
  phase_angle DECIMAL(5,2),
  illumination_pct DECIMAL(5,2),
  days_to_next_new_moon TINYINT,
  is_crescent_visible BOOLEAN DEFAULT 0,  -- critical for Hijri month start
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  INDEX(date)
);

-- Islamic event countdowns (calculated, not stored, but seed base events)
-- Add to existing islamic_events table:
ALTER TABLE islamic_events 
  ADD COLUMN is_public_holiday BOOLEAN DEFAULT 0,
  ADD COLUMN countries_observing JSON COMMENT 'Array of country IDs',
  ADD COLUMN gregorian_date_2026 DATE NULL,
  ADD COLUMN gregorian_date_2027 DATE NULL;

-- Qibla data per city (cache, calculate once per city)
CREATE TABLE qibla_data (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  city_id BIGINT UNSIGNED NOT NULL,
  qibla_direction DECIMAL(6,3) NOT NULL,  -- degrees from North
  distance_to_kaaba_km DECIMAL(8,2),
  calculated_at TIMESTAMP,
  FOREIGN KEY (city_id) REFERENCES cities(id),
  UNIQUE(city_id)
);

-- Date conversion cache (back Hijri-Gregorian converter)
-- Use existing hijri_date_caches but add regional variation:
ALTER TABLE hijri_date_caches
  ADD COLUMN region VARCHAR(20) DEFAULT 'global' COMMENT 'global, pakistan, saudi, india',
  ADD COLUMN hijri_day_ar VARCHAR(10) COMMENT 'Arabic numeral day',
  ADD COLUMN hijri_month_ar VARCHAR(50) COMMENT 'Full Arabic month name',
  ADD COLUMN is_verified_sighting BOOLEAN DEFAULT 0;

-- Prayer calculation methods (lookup table)
CREATE TABLE prayer_calc_methods (
  id TINYINT UNSIGNED PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  fajr_angle DECIMAL(4,1),
  isha_angle DECIMAL(4,1),
  description TEXT,
  country_default JSON
);
-- Seed all 23 AlAdhan methods

-- Add to prayer_times:
ALTER TABLE prayer_times
  ADD COLUMN method_name VARCHAR(100),
  ADD COLUMN jumuah_time TIME;  -- Friday prayer time
```

### 8.2 Existing Table Fixes

```sql
-- Fix prayer times column types
ALTER TABLE prayer_times
  MODIFY COLUMN fajr TIME NOT NULL,
  MODIFY COLUMN sunrise TIME NOT NULL,
  MODIFY COLUMN dhuhr TIME NOT NULL,
  MODIFY COLUMN asr TIME NOT NULL,
  MODIFY COLUMN maghrib TIME NOT NULL,
  MODIFY COLUMN isha TIME NOT NULL,
  MODIFY COLUMN fetched_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

-- Fix hijri_months content (content is placeholder)
-- UPDATE all 12 rows with real content via Filament admin panel

-- Fix countries local_context_note (placeholder boilerplate)
-- UPDATE all 5 rows with genuinely unique 150-word narratives

-- Add indexes for performance
ALTER TABLE prayer_times ADD INDEX idx_city_date (city_id, date);
ALTER TABLE hijri_date_caches ADD INDEX idx_greg_date_region (gregorian_date, region);
ALTER TABLE islamic_events ADD INDEX idx_month_day (hijri_month_id, hijri_day);
```

### 8.3 Cities to Seed (Minimum for Wave 1)

```sql
-- Pakistan cities (Wave 1 priority)
INSERT INTO cities (country_id, state, name, name_ar, name_ur, slug, latitude, longitude, timezone, prayer_calc_method, population, province, meta_title, meta_description, local_context_note) VALUES
(1, 'Sindh', 'Karachi', 'كراتشي', 'کراچی', 'karachi', 24.8607, 67.0011, 'Asia/Karachi', '1', 14910352, 'Sindh', 
  'Islamic Date Today in Karachi — Hijri Calendar', 
  'Today\'s Islamic date in Karachi, Pakistan. Based on Ruet-e-Hilal moon sighting. Prayer times and Hijri calendar for Karachi.',
  'Karachi, Pakistan\'s largest city and commercial hub, is home to millions of Muslims who observe the Hijri calendar as declared by the Ruet-e-Hilal Committee Pakistan. The city\'s coastal location means moon sighting conditions differ from inland cities...'),
(1, 'Punjab', 'Lahore', 'لاهور', 'لاہور', 'lahore', 31.5204, 74.3587, 'Asia/Karachi', '1', 13095166, 'Punjab', ...),
(1, 'Punjab', 'Islamabad', 'إسلام آباد', 'اسلام آباد', 'islamabad', 33.6844, 73.0479, 'Asia/Karachi', '1', 1014825, 'Capital Territory', ...),
(1, 'Punjab', 'Rawalpindi', 'راولبندي', 'راولپنڈی', 'rawalpindi', 33.6007, 73.0679, 'Asia/Karachi', '1', 2098231, 'Punjab', ...),
(1, 'Punjab', 'Faisalabad', 'فيصل آباد', 'فیصل آباد', 'faisalabad', 31.4504, 73.1350, 'Asia/Karachi', '1', 3203846, 'Punjab', ...);
```

---

## 9. API OPTIMIZATION

### 9.1 AlAdhan API — Recommended Usage Pattern

```php
// app/Services/AlAdhanService.php

class AlAdhanService
{
    private string $baseUrl = 'https://api.aladhan.com/v1';
    
    /**
     * Fetch Hijri date for a Gregorian date.
     * Uses hijri_date_caches table as primary source.
     * Falls back to API only if cache miss.
     */
    public function getHijriDate(Carbon $date, string $region = 'global'): ?array
    {
        // 1. Check DB cache first
        $cached = HijriDateCache::where('gregorian_date', $date->toDateString())
            ->where('region', $region)
            ->first();
        
        if ($cached) return $cached->toArray();
        
        // 2. Fetch from AlAdhan
        try {
            $response = Http::timeout(5)->get("{$this->baseUrl}/gToH", [
                'date' => $date->format('d-m-Y'),
                'adjustment' => $region === 'pakistan' ? 1 : 0,
            ]);
            
            if ($response->successful()) {
                $data = $response->json()['data'];
                $cached = HijriDateCache::create([
                    'gregorian_date' => $date->toDateString(),
                    'hijri_day' => $data['hijri']['day'],
                    'hijri_month' => $data['hijri']['month']['en'],
                    'hijri_month_number' => $data['hijri']['month']['number'],
                    'hijri_year' => $data['hijri']['year'],
                    'hijri_month_ar' => $data['hijri']['month']['ar'],
                    'region' => $region,
                    'source' => 'AlAdhan API',
                    'fetched_at' => now(),
                ]);
                return $cached->toArray();
            }
        } catch (\Exception $e) {
            Log::error('AlAdhan API failed: ' . $e->getMessage());
        }
        
        // 3. Fallback: return last known good value for same date in previous year
        return HijriDateCache::where('gregorian_date', $date->subYear()->toDateString())
            ->where('region', $region)
            ->first()?->toArray();
    }
    
    /**
     * Fetch prayer times for a city for the current month.
     * Batch-fetches full month (30 requests → 1 request).
     */
    public function getPrayerTimesMonth(City $city, int $year, int $month): Collection
    {
        $existing = PrayerTime::where('city_id', $city->id)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->count();
        
        if ($existing >= 28) return PrayerTime::where('city_id', $city->id)
            ->whereYear('date', $year)->whereMonth('date', $month)->get();
        
        // Fetch full month calendar endpoint (1 API call for 30 days)
        $response = Http::timeout(10)->get("{$this->baseUrl}/calendar/{$year}/{$month}", [
            'latitude' => $city->latitude,
            'longitude' => $city->longitude,
            'method' => $city->prayer_calc_method ?? 1,
            'timezonestring' => $city->timezone,
        ]);
        
        if ($response->successful()) {
            foreach ($response->json()['data'] as $dayData) {
                PrayerTime::updateOrCreate(
                    ['city_id' => $city->id, 'date' => $dayData['date']['gregorian']['date']],
                    [
                        'fajr' => $dayData['timings']['Fajr'],
                        'sunrise' => $dayData['timings']['Sunrise'],
                        'dhuhr' => $dayData['timings']['Dhuhr'],
                        'asr' => $dayData['timings']['Asr'],
                        'maghrib' => $dayData['timings']['Maghrib'],
                        'isha' => $dayData['timings']['Isha'],
                        'imsak' => $dayData['timings']['Imsak'],
                        'midnight' => $dayData['timings']['Midnight'],
                        'method' => $city->prayer_calc_method,
                        'method_name' => $this->getMethodName($city->prayer_calc_method),
                        'fetched_at' => now(),
                    ]
                );
            }
        }
        
        return PrayerTime::where('city_id', $city->id)
            ->whereYear('date', $year)->whereMonth('date', $month)->get();
    }
    
    private function getMethodName(int $method): string
    {
        return [
            1 => 'University of Islamic Sciences, Karachi',
            2 => 'Islamic Society of North America',
            3 => 'Muslim World League',
            4 => 'Umm Al-Qura University, Makkah',
            5 => 'Egyptian General Authority of Survey',
        ][$method] ?? "Method {$method}";
    }
}
```

### 9.2 Scheduler Optimization

```php
// app/Console/Kernel.php
protected function schedule(Schedule $schedule): void
{
    // Refresh today's Hijri date (both Pakistan + global) at 3:30 AM PKT
    $schedule->command('islamic:refresh-hijri-dates')
        ->dailyAt('03:30')
        ->timezone('Asia/Karachi')
        ->withoutOverlapping();
    
    // Refresh prayer times for all active cities (30 days ahead) at 4:00 AM
    $schedule->command('islamic:refresh-prayer-times')
        ->dailyAt('04:00')
        ->timezone('Asia/Karachi')
        ->withoutOverlapping();
    
    // Refresh moon phase data weekly
    $schedule->command('islamic:refresh-moon-phases')
        ->weekly()
        ->sundays()
        ->at('02:00');
    
    // Regenerate sitemap daily after data refresh
    $schedule->command('sitemap:generate')
        ->dailyAt('04:30')
        ->timezone('Asia/Karachi');
}
```

---

## 10. CACHING STRATEGY

### 10.1 Cache Hierarchy

```
Layer 1: Database (source of truth for all dynamic data)
  └── hijri_date_caches, prayer_times, moon_phases

Layer 2: Laravel Cache (Redis preferred, file fallback)
  └── TTL: 24 hours for date/prayer data
  └── TTL: 1 week for static Islamic content (month info, events)
  └── TTL: 1 hour for converter results

Layer 3: HTTP Response Cache
  └── Cache-Control: public, max-age=3600 on date pages
  └── ETag based on last fetched_at timestamp
  └── Full-page cache for Islamic Date hub (invalidate daily at 00:01 PKT)
```

### 10.2 Cache Keys Convention

```php
// Hijri date for today
Cache::remember("hijri.today.{$region}", 86400, fn() => 
    HijriDateCache::where('gregorian_date', today())->where('region', $region)->first()
);

// Prayer times for a city
Cache::remember("prayer.{$cityId}.{$date}", 86400, fn() =>
    PrayerTime::where('city_id', $cityId)->where('date', $date)->first()
);

// Islamic Date page full data
Cache::remember("islamic_date_page.{$locale}", 3600, fn() => [
    'hijri_today' => ...,
    'prayer_today' => ...,
    'events_today' => ...,
    'countdown_ramadan' => ...,
    'moon_phase' => ...,
]);
```

### 10.3 Cache Invalidation

```php
// Invalidate on scheduler success
Cache::forget("hijri.today.pakistan");
Cache::forget("hijri.today.global");
Cache::tags(['islamic_date'])->flush(); // requires Redis

// Never use cache::flush() — too broad
```

---

## 11. SEO IMPLEMENTATION — COMPLETE SPEC

### 11.1 `/islamic-date-today` Hub Page

**Title Tag (dynamic, changes daily):**
```blade
<title>Islamic Date Today — {{ $hijriDay }} {{ $hijriMonth }} {{ $hijriYear }} AH | Noor-e-Islam</title>
```
Target: 50-60 chars. Example: "Islamic Date Today — 17 Muharram 1448 AH | Noor-e-Islam" = 57 chars ✅

**Meta Description (dynamic, changes daily):**
```blade
<meta name="description" content="Today's Islamic date is {{ $hijriDay }} {{ $hijriMonth }} {{ $hijriYear }} AH ({{ $gregorianDate }}). Pakistan: {{ $pakistanHijri }}. Hijri calendar, prayer times, countdowns, and date converter.">
```
Target: 140-155 chars. Must be unique every day.

**Canonical:**
```html
<link rel="canonical" href="https://noorislam.com/islamic-date-today">
```
Never with trailing slash. The `/ur/` version self-canonicalizes separately.

**H-tag structure:**
```html
<h1>Islamic Date Today — آج کی اسلامی تاریخ</h1>
<h2>Pakistan Islamic Date Today</h2>
<h2>Global Hijri Date Today</h2>
<h2>What Month is it in the Islamic Calendar?</h2>
<h2>Countdown to Upcoming Islamic Events</h2>
<h2>Hijri–Gregorian Date Converter</h2>
<h2>Complete Islamic Calendar {{ $year }}</h2>
<h2>Moon Phase Today</h2>
<h2>Islamic Events This Year</h2>
<h2>Prayer Times Today</h2>
<h2>Frequently Asked Questions</h2>
<h3>What is today's Islamic date in Pakistan?</h3>
<!-- ...15 FAQ questions as H3 -->
```

**Open Graph:**
```blade
<meta property="og:title" content="Islamic Date Today — {{ $hijriDay }} {{ $hijriMonth }} {{ $hijriYear }}">
<meta property="og:description" content="Pakistan: {{ $pakistanDate }} | Global: {{ $globalDate }}. Check today's Hijri date, prayer times, and countdowns.">
<meta property="og:image" content="{{ asset('images/og/islamic-date-' . today()->format('Y-m-d') . '.jpg') }}">
```
**Note:** Generate a dynamic OG image server-side (or via a Canvas endpoint) with today's date for maximum social CTR.

**Twitter Card:**
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@noorislam">
```

**hreflang:**
```html
<link rel="alternate" hreflang="en" href="https://noorislam.com/islamic-date-today">
<link rel="alternate" hreflang="ur" href="https://noorislam.com/ur/islamic-date-today">
<link rel="alternate" hreflang="x-default" href="https://noorislam.com/islamic-date-today">
```

**`<time>` tags — required on every date shown:**
```html
<time datetime="{{ today()->toIso8601String() }}" class="gregorian-date">
    {{ today()->format('d F Y') }}
</time>
<time datetime="{{ today()->toIso8601String() }}" class="last-updated">
    Last verified: <span>{{ $lastUpdated->format('d M Y, H:i') }} PKT</span>
</time>
```

### 11.2 On-Page SEO Checklist (Per the Master Spec)

- [ ] Exactly one `<h1>` per page
- [ ] Title tag 50-60 chars, unique across all pages (enforce DB unique constraint on `seo_metas.title`)
- [ ] Meta description 140-155 chars
- [ ] URL: `/islamic-date-today` (no trailing slash, canonical self-referencing)
- [ ] First 100 words answer the query directly (Pakistan date + global date above fold)
- [ ] At least one genuinely unique paragraph per page
- [ ] All images have descriptive `alt` text (Arabic calligraphy images, calendar icons)
- [ ] Minimum 4 outbound internal links (hub, sibling, cross-cluster, converter)
- [ ] `<time datetime="...">` on every date/last-updated value
- [ ] Visible breadcrumb + matching BreadcrumbList schema
- [ ] `rel="canonical"` correct on EN/UR pair

---

## 12. SCHEMA MARKUP IMPLEMENTATION

### 12.1 WebPage Schema (main page)

```json
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Islamic Date Today — 17 Muharram 1448 AH",
  "description": "Today's Islamic date is 17 Muharram 1448 AH (03 July 2026). Pakistan: 17 Muharram 1448. Hijri calendar, prayer times, countdowns.",
  "url": "https://noorislam.com/islamic-date-today",
  "dateModified": "2026-07-03T04:00:00+05:00",
  "inLanguage": "en",
  "author": {
    "@type": "Person",
    "name": "[Author Name from DB]"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Noor-e-Islam",
    "url": "https://noorislam.com",
    "logo": {
      "@type": "ImageObject",
      "url": "https://noorislam.com/images/logo.png"
    },
    "sameAs": [
      "https://facebook.com/noorislam",
      "https://twitter.com/noorislam"
    ]
  }
}
```

### 12.2 BreadcrumbList Schema

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://noorislam.com"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Islamic Date Today",
      "item": "https://noorislam.com/islamic-date-today"
    }
  ]
}
```

### 12.3 FAQPage Schema

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is today's Islamic date in Pakistan?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Today's Islamic date in Pakistan is 17 Muharram 1448 AH, corresponding to 3 July 2026. This date is based on the official moon sighting announcement by the Ruet-e-Hilal Committee Pakistan."
      }
    },
    {
      "@type": "Question",
      "name": "Why is Pakistan's Islamic date different from Saudi Arabia's?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pakistan follows the Ruet-e-Hilal Committee Pakistan for local moon sighting, while Saudi Arabia uses the Supreme Court's announcement based on telescopic observation or the Umm Al-Qura calculated calendar. This often results in a 1-day difference at the start of each Islamic month."
      }
    }
  ]
}
```

### 12.4 Event Schema (for upcoming Islamic events)

```json
{
  "@context": "https://schema.org",
  "@type": "Event",
  "name": "Eid ul Adha 2026",
  "description": "Eid ul Adha marks the end of Hajj and commemorates Ibrahim's sacrifice. Observed on 10 Dhul Hijjah 1448 AH.",
  "startDate": "2026-06-17",
  "eventStatus": "https://schema.org/EventScheduled",
  "location": {
    "@type": "VirtualLocation",
    "url": "https://noorislam.com/islamic-date-today"
  }
}
```

### 12.5 Blade Implementation Pattern

```blade
{{-- In layouts/app.blade.php --}}
@stack('schema')

{{-- In islamic-date/hub.blade.php --}}
@push('schema')
<script type="application/ld+json">
{!! json_encode($schemaWebPage, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode($schemaBreadcrumb, JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($schemaFaq, JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush
```

---

## 13. INTERNAL LINKING STRATEGY

### 13.1 From `/islamic-date-today` Hub — Required Outbound Links

Every render of the hub page must include these links (all must be real, working URLs):

**Tier 1 — Core cluster links:**
- `/prayer-times` — "Prayer Times Today"
- `/prayer-times/karachi` — "Prayer Times in Karachi"
- `/hijri-gregorian-converter` — "Hijri-Gregorian Date Converter"
- `/islamic-calendar/muharram` — "Islamic Calendar — Muharram 1448" (current month)

**Tier 2 — Country/city links:**
- `/islamic-date-today/pakistan` — "Islamic Date in Pakistan"
- `/islamic-date-today/saudi-arabia` — "Islamic Date in Saudi Arabia"
- `/islamic-date-today/uae` — "Islamic Date in UAE"
- `/islamic-date-today/pakistan/karachi` — "Islamic Date in Karachi"
- `/islamic-date-today/pakistan/lahore` — "Islamic Date in Lahore"

**Tier 3 — Cross-cluster links:**
- `/surah/al-fatiha` — contextually linked in content
- `/ramadan/2027` — from countdown section
- `/duas/muharram` — from related duas section (when Muharram is current month)

### 13.2 From Country Pages — Required Outbound Links
- Hub page: `/islamic-date-today`
- 3-4 city pages under that country
- Current month: `/islamic-calendar/{current-month}`
- Prayer times: `/prayer-times/{default-city-in-country}`
- Converter: `/hijri-gregorian-converter`

### 13.3 From City Pages — Required Outbound Links
- Country page: `/islamic-date-today/{country}`
- Hub: `/islamic-date-today`
- Prayer times: `/prayer-times/{city}`
- 2 sibling cities
- Converter

### 13.4 Maximum Click Depth Rule
- Hub: 1 click from homepage
- Country pages: 2 clicks from homepage
- City pages: 3 clicks from homepage
- Never more than 3 clicks to any leaf page

---

## 14. CONTENT STRATEGY

### 14.1 Word Count Requirements (from master spec)

| Page | Min Words | Unique Paragraph Required |
|---|---|---|
| Hub (`/islamic-date-today`) | 800-1200 | Yes — multiple sections |
| Country page | 500-700 | Yes — moon-sighting authority section |
| City page | 300-400 | Yes — local context note |
| Month page | 800-1000 | Yes — significance + citation |

### 14.2 FAQ Questions (Hub Page — All 15)

Write these as H3 headings with paragraph answers (150-200 words each):

1. What is today's Islamic date in Pakistan?
2. What is today's global Hijri date?
3. Why is Pakistan's Islamic date different from Saudi Arabia's?
4. What is today's date in Arabic? (addresses "Arabic date today" searches)
5. What Islamic month is it today?
6. What happened on this day in Islamic history?
7. When does the next Islamic month begin?
8. How do I convert a Gregorian date to Hijri?
9. What is the Islamic year 1448?
10. What is the difference between Hijri and Gregorian calendars?
11. Is today a special Islamic day?
12. What prayer time is it now?
13. When is Ramadan 2027?
14. What is the moon phase today in Islam?
15. What is "Chand Ki Tarikh"? (Roman Urdu — targets diaspora search)

### 14.3 Content Uniqueness Rules

**DO:**
- Write each country's `local_context_note` from a different angle (history, moon sighting tradition, population, major mosques)
- Pakistan: Focus on Ruet-e-Hilal Committee, historical disputes about moon sighting, largest Muslim population in the world after Indonesia
- Saudi Arabia: Umm Al-Qura calendar, Supreme Court process, significance of Makkah as Qibla direction
- UAE: GAAC committee, tolerance policy, cosmopolitan Muslim population
- India: All India Muslim Personal Law Board, diversity of calculation methods, Ramadan traditions

**DON'T:**
- Never duplicate the `local_context_note` boilerplate already in the database: "Islamic resources and accurate prayer timings for Muslims in [Country]"
- Never use the same paragraph structure with only the noun swapped
- Never fabricate Hadith or Quran citations — always cite book + number

### 14.4 Roman Urdu Phrases to Include Naturally in English Content

Include these organically in body copy to capture diaspora search queries:
- "aaj ki islamic tarikh" (today's Islamic date)
- "chand ki tarikh" (lunar date)
- "hijri calendar Pakistan"
- "islamic date today pakistan 2026"
- "aaj ka din islamic calendar mein"

---

## 15. PERFORMANCE OPTIMIZATION

### 15.1 Core Web Vitals Targets
- **LCP (Largest Contentful Paint):** < 2.5s
- **INP (Interaction to Next Paint):** < 200ms
- **CLS (Cumulative Layout Shift):** < 0.1

### 15.2 Specific Optimizations Required

**Images:**
- All images must use `<img width="..." height="..." loading="lazy" decoding="async">` attributes
- Convert PNG/JPG to WebP (Vite plugin or server-side)
- OG image served as pre-generated static file, not dynamically generated on each request
- Arabic calligraphy SVGs preferred over raster images

**CSS:**
- Inline critical CSS for above-fold content (prayer chip row, date cards)
- Defer non-critical CSS with `<link rel="preload" as="style">` pattern
- The existing custom properties design system is efficient — keep it

**JavaScript:**
- Defer all non-critical JS: countdown timer, calendar grid interactions, AJAX comment form
- Prayer ticker JS: convert from `setTimeout` to a single `setInterval` that compares current time to server-rendered prayer times
- Never load prayer times via AJAX for the initial page render

**Database Queries:**
```php
// In IslamicDateController@hub — optimize with eager loading:
$data = [
    'hijri_today' => Cache::remember('hijri.today.pk', 3600, fn() =>
        HijriDateCache::where('gregorian_date', today())->where('region', 'pakistan')->first()
    ),
    'prayer_today' => Cache::remember('prayer.karachi.today', 3600, fn() =>
        PrayerTime::where('city_id', 1)->where('date', today())->first()
    ),
    'events_today' => IslamicEvent::whereHas('hijriMonth', fn($q) => 
        $q->where('month_number', $hijriMonthNumber)
    )->where('hijri_day', $hijriDay)->with('hijriMonth')->get(),
    'current_month' => HijriMonth::where('month_number', $hijriMonthNumber)->first(),
    'upcoming_events' => IslamicEvent::with('hijriMonth')
        ->orderBy('hijri_month_id')->orderBy('hijri_day')
        ->take(8)->get(),
    'moon_phase' => Cache::remember('moon.today', 86400, fn() =>
        MoonPhase::where('date', today())->first()
    ),
];
```

**HTTP Cache Headers:**
```php
// In IslamicDateController@hub:
return response()
    ->view('islamic-date.hub', $data)
    ->header('Cache-Control', 'public, max-age=3600, s-maxage=3600')
    ->header('Vary', 'Accept-Language')
    ->header('Last-Modified', $data['hijri_today']?->fetched_at?->toRfc7231String() ?? now()->toRfc7231String());
```

---

## 16. SECURITY IMPROVEMENTS

### 16.1 Immediate Actions Required

**Remove public-accessible fix scripts (CRITICAL):**
```apache
# In .htaccess (if Apache):
<FilesMatch "^(fix_|patch_|create_db).*\.php$">
    Order Deny,Allow
    Deny from all
</FilesMatch>
```
Or delete: `fix_layout.php`, `fix_models.php`, `fix_prayer_home.php`, `patch_migrations.php`, `create_db.php`

**AJAX Endpoints — required protections:**
```php
// All AJAX routes must have:
Route::middleware(['web', 'throttle:contact'])
    ->post('/ajax/contact', [AjaxController::class, 'contact']);

Route::middleware(['web', 'throttle:comments'])
    ->post('/ajax/comments/{type}/{id}', [AjaxController::class, 'comment']);

Route::middleware(['web', 'throttle:newsletter'])
    ->post('/ajax/newsletter', [AjaxController::class, 'newsletter']);
```

**Comment honeypot:**
```blade
{{-- Hidden field — bots fill it, humans don't --}}
<input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off">
```
```php
// In comment validation:
if ($request->filled('website')) {
    return response()->json(['success' => true]); // Silent rejection
}
```

**Input sanitization for comments:**
```php
$validated = $request->validate([
    'name' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\p{N}\s\-\.]+$/u'],
    'city' => ['nullable', 'string', 'max:100'],
    'body' => ['required', 'string', 'min:10', 'max:1000'],
]);
// Never trust HTML from user input — always sanitize or strip tags
$validated['body'] = strip_tags($validated['body']);
```

**Rate limiting configuration:**
```php
// In RouteServiceProvider:
RateLimiter::for('contact', fn($request) =>
    Limit::perMinute(3)->by($request->ip())
);
RateLimiter::for('comments', fn($request) =>
    Limit::perMinute(5)->by($request->ip())
);
RateLimiter::for('newsletter', fn($request) =>
    Limit::perMinute(2)->by($request->ip())
);
```

**Environment security:**
- Ensure `.env` is in `.gitignore` (it is by default in Laravel)
- `APP_DEBUG=false` and `APP_ENV=production` before go-live
- Database credentials must NOT be hardcoded anywhere in PHP files
- AlAdhan API doesn't require a key currently, but store any future API keys in `.env`

---

## 17. PROGRAMMATIC SEO & URL ARCHITECTURE

### 17.1 Full Route Architecture (from master spec, confirmed)

```
/islamic-date-today                                    ← Hub (this page)
/islamic-date-today/{country:slug}                     ← Country pages (5+ countries)
/islamic-date-today/{country:slug}/{city:slug}          ← City pages (30+ cities)
/hijri-gregorian-converter                              ← Converter tool
/islamic-calendar/{month:slug}                          ← 12 Hijri month pages
/prayer-times                                          ← Prayer hub
/prayer-times/{city:slug}                              ← City prayer pages
/ramadan/{year}                                        ← Ramadan hub
/ramadan/{year}/sehri-iftar/{city:slug}                 ← City Ramadan pages
/surah                                                 ← Surah hub
/surah/{surah:slug}                                    ← 114 Surah pages
/surah/{surah:slug}/fazilat                             ← Fazilat pages

/ur/ prefix mirrors all above (bilingual)
```

### 17.2 Sitemap Structure

```xml
sitemap_index.xml
├── sitemap-dates.xml        (hub + all country + city Islamic date pages)
├── sitemap-prayer.xml       (all city prayer time pages)
├── sitemap-calendar.xml     (12 Hijri month pages + year pages)
├── sitemap-surah.xml        (114 Surah + 114 Fazilat pages)
├── sitemap-hadith.xml       (hadith topic pages)
├── sitemap-ramadan.xml      (Ramadan + Sehri/Iftar pages)
└── sitemap-static.xml       (About, Contact, Privacy, Home)
```

**Sitemap generation command:**
```bash
php artisan sitemap:generate
# Runs after data refresh (04:30 PKT daily per scheduler)
```

**robots.txt:**
```
User-agent: *
Allow: /
Disallow: /admin
Disallow: /ajax/
Disallow: /storage/
Disallow: /*.sql
Disallow: /fix_*.php
Disallow: /patch_*.php
Disallow: /create_db.php

Sitemap: https://noorislam.com/sitemap_index.xml
```

### 17.3 Programmatic Content Rules (Anti-Spam)

The `/islamic-date-today/{country}/{city}` system generates many pages. To avoid Scaled Content Abuse:

1. **Every city page must have a unique `local_context_note`** of minimum 150 words that is genuinely different from other cities
2. **The `local_context_note` field in Filament admin must be marked as required** (not nullable in UI)
3. **Publish in waves** — never more than 20 new city pages per week
4. **Each city page must show live prayer times** specific to that city's lat/lng
5. **Noindex any city page** whose `local_context_note` is still placeholder — use a DB-driven check: `<meta name="robots" content="{{ $city->local_context_note ? 'index,follow' : 'noindex,follow' }}">`

---

## 18. MULTILINGUAL IMPLEMENTATION

### 18.1 Current Status
- ✅ `/ur/` route group exists (confirmed in walkthrough.md)
- ✅ `SetLocale` middleware built
- ✅ Filament admin panel live
- ❓ Arabic (`lang="ur"`) vs English (`lang="en"`) per route — needs verification

### 18.2 Implementation Requirements

**HTML lang attribute:**
```blade
{{-- In layouts/app.blade.php: --}}
<html lang="{{ app()->getLocale() === 'ur' ? 'ur' : 'en' }}" 
      dir="{{ app()->getLocale() === 'ur' ? 'rtl' : 'ltr' }}">
```

**Translatable fields needed in database:**
The `hijri_months` table already has `name_ar`, `name_ur`, `name_en`. The `islamic_events` table has `description_ar`, `description_ur` — but they're NULL. Fill these.

**Language switcher component (`resources/views/components/language-switcher.blade.php`):**
```blade
@php
$locale = app()->getLocale();
$enUrl = url('/') . '/islamic-date-today' . (request()->path() !== 'islamic-date-today' ? '/' . ltrim(str_replace('/ur/', '/', '/' . request()->path()), '/') : '');
$urUrl = url('/') . '/ur/' . ltrim(str_replace('/ur/', '', '/' . request()->path()), '/');
@endphp
<div class="language-switcher">
    <a href="{{ $locale === 'ur' ? $enUrl : '#' }}" {{ $locale === 'en' ? 'class=active' : '' }}>English</a>
    <a href="{{ $locale === 'en' ? $urUrl : '#' }}" {{ $locale === 'ur' ? 'class=active' : '' }}>اردو</a>
</div>
```

**hreflang in every page head:**
```blade
<link rel="alternate" hreflang="en" href="{{ url('/islamic-date-today') }}">
<link rel="alternate" hreflang="ur" href="{{ url('/ur/islamic-date-today') }}">
<link rel="alternate" hreflang="x-default" href="{{ url('/islamic-date-today') }}">
```

---

## 19. PRIORITIZED IMPLEMENTATION ROADMAP

### PHASE 3A — Critical Bugs (Do First, Week 1)
**Priority: BLOCKING — affects production data accuracy**

| Task | File | Effort |
|---|---|---|
| **BUG-001:** Fix `RefreshIslamicData` to include today's date | `app/Console/Commands/RefreshIslamicData.php` | 30 min |
| **BUG-001:** Run command immediately: `php artisan app:refresh-islamic-data` | Terminal | 5 min |
| **BUG-002:** Add `region` column to `hijri_date_caches` | New migration | 1 hr |
| **BUG-002:** Seed both Pakistan + global dates going forward | Modify command | 2 hr |
| **BUG-003:** Fix prayer_times column types to TIME | New migration | 1 hr |
| **BUG-004:** Store `fetched_at` on all prayer time inserts | Modify command | 30 min |
| **BUG-005:** Remove duplicate Laravel file cache for prayer times | Controller cleanup | 1 hr |
| **BUG-006:** Add `fix_*.php` to `.gitignore` + deny in nginx/.htaccess | Config file | 15 min |

### PHASE 3B — Core Missing Features (Week 1-2)
**Priority: HIGH — directly impacts page completeness vs competitor**

| Task | File | Effort |
|---|---|---|
| Build Hijri-Gregorian Converter AJAX (`/ajax/hijri-convert` endpoint) | `AjaxController.php`, `ConverterController.php` | 4 hr |
| Build `/hijri-gregorian-converter` full page (Template H) | Blade + controller | 3 hr |
| Embed mini-converter widget on `/islamic-date-today` hub | Blade component | 2 hr |
| Build countdown timers (Ramadan, Eid, Hajj) | Blade component + service | 3 hr |
| Seed all `islamic_events` with Gregorian dates for 2026/2027 | Seeder / Filament | 2 hr |
| Add moon phase table + seed 60 days | Migration + seeder | 3 hr |
| Add Qibla data table + seed all cities | Migration + AlAdhan API call | 2 hr |
| Build moon phase widget Blade component | Component | 2 hr |
| Build FAQ content block (15 questions + FAQPage schema) | Blade component | 4 hr |
| Seed all missing `hijri_months.significance_content` (300+ words each) | Filament admin | 6 hr |
| Fix all 5 countries' `local_context_note` (genuine unique content) | Filament admin | 3 hr |

### PHASE 3C — SEO Foundation (Week 2)
**Priority: HIGH — blocks Google indexing properly**

| Task | File | Effort |
|---|---|---|
| Build `SeoMeta` service (title/meta/canonical per template formula) | `app/Services/SeoMetaService.php` | 3 hr |
| Implement all JSON-LD schemas (WebPage, BreadcrumbList, FAQ, Event, Organization) | Blade components | 4 hr |
| Add `<time datetime>` to all date displays | Blade templates | 2 hr |
| Generate dynamic sitemap (artisan command + XML views) | Console command | 4 hr |
| Add `robots.txt` with correct Disallow rules | `public/robots.txt` | 30 min |
| Emit `hreflang` pairs on all bilingual pages | `layouts/app.blade.php` | 1 hr |
| Verify `lang="en"` vs `lang="ur"` per route | `layouts/app.blade.php` | 30 min |
| Add canonical tag service | `SeoMetaService.php` | 1 hr |
| Add OG image (static or dynamic) | Asset / controller | 2 hr |

### PHASE 3D — Content & Features (Week 2-3)
**Priority: MEDIUM — improves page depth and internal linking**

| Task | File | Effort |
|---|---|---|
| Seed 5 additional Pakistan cities (Lahore, Islamabad, Rawalpindi, Faisalabad, Hyderabad) | Seeder + migrations | 4 hr |
| Write unique `local_context_note` for each new city | Content | 3 hr |
| Fetch prayer times for all new cities | Scheduler command | 1 hr |
| Build city selector widget on hub page | Blade + AJAX | 2 hr |
| Build "Today's historical events" section from `historical_events` table | Controller + Blade | 2 hr |
| Build "Related duas" section (current month) | Controller + Blade | 1 hr |
| Build "Related knowledge articles" section | Controller + Blade | 1 hr |
| Add breadcrumb Blade component (visual + schema) | Component | 1 hr |
| Add social share buttons (WhatsApp, Facebook, Twitter, Copy Link) | Blade + JS | 1 hr |
| Add print CSS (`@media print`) | CSS file | 1 hr |
| Seed all 30+ Islamic events with Gregorian date equivalents | Filament / Seeder | 3 hr |

### PHASE 3E — Performance & Hardening (Week 3)
**Priority: MEDIUM — production readiness**

| Task | File | Effort |
|---|---|---|
| Add Redis (or database) cache for all dynamic date data | Config + controllers | 2 hr |
| Implement HTTP response cache headers on date pages | Middleware | 1 hr |
| Add all DB indexes (city_date, greg_date_region, etc.) | Migration | 1 hr |
| Consolidate duplicate prayer cache (remove file cache, use DB only) | Controller cleanup | 1 hr |
| Run Lighthouse audit on hub page + fix CLS issues | Browser DevTools | 2 hr |
| Verify all `<img>` tags have width/height/alt attributes | Template review | 1 hr |
| Test schema with Google Rich Results Test | Browser | 1 hr |
| Test sitemap with Google Search Console | GSC | 30 min |
| Verify canonical and hreflang correctness | Browser + validator | 1 hr |

### PHASE 4 — Scale (Weeks 4-8)
**Priority: ONGOING — programmatic SEO wave**

| Task | Notes |
|---|---|
| Add Saudi Arabia city pages (Riyadh, Jeddah, Makkah, Madinah) | 5 cities, genuine content |
| Add UAE city pages (Dubai, Abu Dhabi, Sharjah) | 3 cities |
| Add India city pages (Delhi, Mumbai, Hyderabad, Lucknow) | 5 cities |
| Add Bangladesh city pages (Dhaka, Chittagong) | 2 cities |
| Add UK/USA/Canada country pages | 3 countries (diaspora market) |
| Build all 12 Islamic Calendar month pages with full content | Template C per spec |
| Build `/ur/` versions of all new pages | After EN versions are live |
| Build comments system live with moderation | Infrastructure exists |
| Add author bio to all content pages | EEAT requirement |

---

## 20. DEFINITION OF DONE

Before considering the `/islamic-date-today` page production-ready, verify all of the following:

### Data Accuracy
- [ ] Today's Hijri date displays correctly (both Pakistan + Global) — NOT empty, NOT a cached future date
- [ ] `hijri_date_caches` has today's entry before 5 AM PKT every day (scheduler running)
- [ ] Prayer times show for today (at minimum Karachi) with correct values matching AlAdhan API
- [ ] `fetched_at` timestamp shows accurate last-update time

### Feature Completeness
- [ ] Hijri-Gregorian converter is functional (AJAX, returns results without page reload)
- [ ] Countdown timers show correct days to Ramadan 2027, Eid ul Fitr, Eid ul Adha
- [ ] Moon phase widget shows current phase
- [ ] FAQ section has at least 10 questions with full answers
- [ ] Related duas section shows 3+ duas
- [ ] Social share buttons work (WhatsApp minimum)
- [ ] Breadcrumb visible and correct

### SEO & Schema
- [ ] Title tag is dynamic, includes today's Hijri date, 50-60 chars
- [ ] Meta description is dynamic, 140-155 chars, includes Pakistan date
- [ ] Canonical is `/islamic-date-today` (no trailing slash)
- [ ] `hreflang` pair (en/ur) in `<head>`
- [ ] JSON-LD: WebPage + BreadcrumbList + FAQPage + Organization schemas present
- [ ] All schemas validate in Google Rich Results Test: https://search.google.com/test/rich-results
- [ ] `<time datetime="...">` on every displayed date
- [ ] Sitemap includes `/islamic-date-today` with today's `<lastmod>`
- [ ] `robots.txt` blocks `/admin`, `/ajax/`, fix scripts

### Security
- [ ] No `fix_*.php` files accessible from web
- [ ] AJAX endpoints have CSRF + rate limiting
- [ ] Comment form has honeypot
- [ ] `APP_DEBUG=false` in `.env`
- [ ] No SQL credentials in any PHP file outside `.env`

### Performance
- [ ] Lighthouse Performance score ≥ 80 on mobile
- [ ] LCP ≤ 2.5s (above-fold date cards must render quickly)
- [ ] No layout shift from dynamic content loading
- [ ] All images have width + height + alt attributes

### Content Quality
- [ ] `hijri_months.significance_content` for current month is 300+ words (not placeholder)
- [ ] All 5 countries have unique `local_context_note` (not boilerplate)
- [ ] No duplicate sentences between any two country/city pages
- [ ] All Hadith citations include book name + hadith number
- [ ] Author box renders on the page (even if scholar reviewer is empty until populated)

---

## APPENDIX A — AlAdhan API Reference

**Base URL:** `https://api.aladhan.com/v1`

| Endpoint | Use |
|---|---|
| `GET /gToH?date=DD-MM-YYYY` | Gregorian → Hijri conversion |
| `GET /hToG?date=DD-MM-YYYY-AH` | Hijri → Gregorian conversion |
| `GET /calendar/{year}/{month}?latitude=...&longitude=...&method=...` | Monthly prayer times |
| `GET /timingsByCity/{date}?city=...&country=...&method=...` | Daily prayer times by city name |
| `GET /qibla/{latitude}/{longitude}` | Qibla direction |

**Calculation Methods (key ones for Pakistan/South Asia):**
- Method 1: University of Islamic Sciences, Karachi (Fajr 18°, Isha 18°) ← DEFAULT for Pakistan
- Method 2: Islamic Society of North America (Fajr 15°, Isha 15°) ← for USA/Canada
- Method 3: Muslim World League (Fajr 18°, Isha 17°) ← for UK/Europe
- Method 4: Umm Al-Qura University, Makkah ← for Saudi Arabia

---

## APPENDIX B — File Naming Conventions

```
app/
├── Console/Commands/
│   ├── RefreshHijriDates.php      (was RefreshIslamicData — rename for clarity)
│   ├── RefreshPrayerTimes.php
│   ├── RefreshMoonPhases.php
│   └── GenerateSitemap.php
├── Http/Controllers/
│   ├── IslamicDateController.php  (hub, country, city methods)
│   ├── ConverterController.php    (Hijri-Gregorian converter page)
│   └── AjaxController.php         (all AJAX endpoints)
├── Services/
│   ├── AlAdhanService.php
│   ├── SeoMetaService.php
│   ├── MoonPhaseService.php
│   └── CountdownService.php       (days to Ramadan, Eid, Hajj)
└── Models/
    ├── HijriDateCache.php
    ├── PrayerTime.php
    ├── MoonPhase.php
    ├── QiblaData.php
    └── PrayerCalcMethod.php

resources/views/
├── islamic-date/
│   ├── hub.blade.php              (/islamic-date-today)
│   ├── country.blade.php          (/islamic-date-today/{country})
│   └── city.blade.php             (/islamic-date-today/{country}/{city})
└── components/
    ├── hijri-date-cards.blade.php
    ├── countdown-timers.blade.php
    ├── hijri-converter-widget.blade.php
    ├── moon-phase-widget.blade.php
    ├── prayer-widget.blade.php
    ├── faq-block.blade.php
    ├── breadcrumb.blade.php
    ├── author-box.blade.php
    ├── language-switcher.blade.php
    └── social-share.blade.php
```

---

## APPENDIX C — Keyword Targets for `/islamic-date-today`

| Keyword | Monthly Searches (est.) | Intent | Target Position |
|---|---|---|---|
| islamic date today | 40,000+ | Informational | #1 |
| islamic date today in pakistan | 30,000+ | Local informational | #1 |
| hijri date today | 20,000+ | Informational | Top 3 |
| aaj ki islamic tarikh | 15,000+ | Urdu informational | Top 3 |
| chand ki tarikh | 12,000+ | Urdu informational | Top 3 |
| muharram 1448 calendar | 8,000+ | Seasonal informational | Top 5 |
| 17 muharram 1448 | 5,000+ | Specific date | Top 3 |
| islamic calendar 2026 | 25,000+ | Informational | Top 5 |
| hijri calendar pakistan | 10,000+ | Local informational | Top 3 |
| islamic date converter | 8,000+ | Transactional/tool | Top 3 |
| gregorian to hijri converter | 6,000+ | Tool | Top 5 |
| days until ramadan 2027 | 5,000+ | Countdown | Top 3 |
| what is today's islamic date | 10,000+ | Conversational/AI | Featured |

---

*Document prepared by Claude for handoff to Antigravity AI developer. All analysis is based on: (1) GitHub repository `noormuhammad2k20-a11y/islamicweb` source files, (2) `islamicwebsite__11_.sql` database dump (9.7MB, July 3 2026), (3) live competitor page hamariweb.com/islam/islamic-calendar.aspx, and (4) the authoritative master spec in `antigravity-master-prompt.md`. No additional research is required — all implementation details are self-contained in this document.*
