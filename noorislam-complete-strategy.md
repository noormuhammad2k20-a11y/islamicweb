# NoorIslam.com — Complete SEO & Content Strategy
## Competitor: hamariweb.com | Goal: Pakistan Islamic Searches Ka 1st Page

---

## 🔴 CRITICAL FINDING — DATABASE AUDIT

Database scan se pata chala ke **infrastructure bilkul ready hai** lekin **content tables almost empty hain** — yahi #1 blocker hai ranking ka.

| Table | Current Rows | Required | Status |
|---|---|---|---|
| `allah_names` | 1 | 99 | ❌ EMPTY |
| `surahs` | 1 | 114 | ❌ EMPTY |
| `surah_ayahs` | **0** | 6,236 | 🔴 COMPLETELY MISSING |
| `duas` | 1 | 500+ | ❌ EMPTY |
| `islamic_names` | 2 | 5,000+ | ❌ EMPTY |
| `hadiths` | 4 | 1,000+ | ❌ EMPTY |
| `knowledge_articles` | 1 | 200+ | ❌ EMPTY |
| `zakat_configs` | **0** | 1 | ❌ EMPTY |
| `subscribers` | **0** | — | not launched |
| `prayer_times` | 10 | 200+ cities | ⚠️ LOW |
| `seo_metas` | 159 | 500+ | ✅ Good start |

**SEO metas exist** (159 records for surahs + prayer time pages) lekin un pages ka content EMPTY hai — Google index karega to thin content penalty milegi.

---

## 🟢 HAMARIWEB vs NOORISLAM — GAP ANALYSIS

### Hamariweb Ki Kamzoriyan (Yahan Jeetna Hai)

| Hamariweb | NoorIslam Opportunity |
|---|---|
| General portal — Islam sirf ek section | Dedicated Islamic website = stronger E-E-A-T |
| Quran (.aspx old tech, no ayah player) | Modern ayah-by-ayah audio player + verse bookmarks |
| No tafsir (explanation) | Deep tafsir content per surah |
| Basic names list | Names with Arabic calligraphy, meanings, Quranic references |
| No Zakat calculator | Interactive Zakat calculator |
| No Hajj/Umrah guide | Step-by-step Hajj guide with maps |
| No Tasbeeh counter | Digital Tasbeeh counter (mobile PWA) |
| No dream interpretation | Islamic tabeer/dream section |
| No wazaif/amaal section | Wazaif with authentic references |
| No Islamic Q&A | Scholar-verified Q&A section |
| Slow (heavy portal) | Fast Laravel 11 = Core Web Vitals win |
| No bilingual toggle | Urdu + English toggle per page |
| No dark mode | Dark mode for night reading Quran |
| No offline mode | PWA with offline Quran caching |
| No audio for duas | Duas with audio by famous reciters |

---

## 📋 PART 1 — CONTENT GAPS (Jo Abhi Add Karne Hain)

### 1.1 QURAN SECTION (Highest Priority)

Hamariweb ka Quran.aspx 2005-era technology par hai. Yahan win karna easy hai.

**Database mein bharna hai (surah_ayahs table — abhi 0 rows):**
```
- Har surah ke liye all ayahs with:
  - arabic_text (UTF-8 Arabic)
  - urdu_translation (Fateh Muhammad Jallandhary — most popular in Pakistan)
  - english_translation (Saheeh International)
  - transliteration
  - audio_url (per ayah — Mishary Rashid Alafasy recommended)
  - juz_number
  - page_number (mushaf)
  - sajdah flag
```

**New table needed — `tafseer` :**
```sql
CREATE TABLE tafseer (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  surah_id BIGINT UNSIGNED,
  ayah_number INT,
  tafseer_text LONGTEXT,  -- Ibn Kathir summarized in Urdu
  scholar_name VARCHAR(255) DEFAULT 'Ibn Kathir',
  language ENUM('urdu','english'),
  slug VARCHAR(255),
  created_at TIMESTAMP, updated_at TIMESTAMP
);
```

**New table needed — `quran_bookmarks` (user feature):**
```sql
CREATE TABLE quran_bookmarks (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  session_id VARCHAR(255),  -- no login required
  surah_id INT,
  ayah_number INT,
  created_at TIMESTAMP
);
```

**New Blade pages needed:**
- `/quran` — Quran index (all 114 surahs grid)
- `/quran/{surah-slug}` — Single surah page with ayah player
- `/quran/{surah}/{ayah}` — Single ayah shareable page (social sharing goldmine)
- `/quran/juz/{number}` — Para/Juz pages (30 pages = 30 ranking opportunities)
- `/quran/tafseer/{surah-slug}` — Tafseer pages

**SEO Title Formula:**
```
Surah {name_urdu} ({name_ar}) – Urdu Tarjuma, Tafseer aur Tilawat | NoorIslam
```

---

### 1.2 DUAS SECTION (Masnoon Duas — Hamariweb Ki Sabse Weak Area)

**`duas` table fill karna — 500+ duas:**

Categories (se `dua_categories` table fill karo):
1. Subah ki duas (Morning duas)
2. Raat ki duas (Evening duas)
3. Khane ki duas (Before/after eating)
4. Safar ki duas (Travel)
5. Masjid ki duas (Mosque)
6. Sote waqt ki dua (Before sleep)
7. Bimari ki duas (Illness)
8. Mushkil waqt ki duas (Hardship)
9. Namaz ke baad ki duas
10. Tasbeeh + Azkar
11. Dua-e-Qunoot
12. 40 Rabbana (Quranic duas)
13. Wazu ki dua
14. Azan ke baad ki dua
15. Istighfar collection

**New column needed in `duas`:**
```sql
ALTER TABLE duas 
  ADD COLUMN audio_url VARCHAR(255) AFTER transliteration,
  ADD COLUMN dua_type ENUM('masnoon','quranic','general') DEFAULT 'masnoon',
  ADD COLUMN occasion VARCHAR(255),
  ADD COLUMN is_featured TINYINT(1) DEFAULT 0;
```

**New Blade pages:**
- `/duas` — All categories
- `/duas/{category-slug}` — Category listing
- `/duas/{dua-slug}` — Single dua page (shareable, with Arabic calligraphy display)

**SEO Title Formula:**
```
{Dua Title} – Arabic, Urdu Tarjuma aur Fazilay | NoorIslam
```
Example: `Subah Uthne Ki Dua – Arabic, Urdu Tarjuma aur Fazilay | NoorIslam`

---

### 1.3 PRAYER TIMES (Programmatic SEO Goldmine)

Currently `prayer_times` has 10 rows. Pakistan mein 200+ cities hain.

**Target keyword structure:**
- "namaz time [city name]" — searched millions of times daily
- "aaj ka namaz waqt [city]"
- "[city] prayer times today"

**Cities to add (high search volume):**
```
Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad, Multan, 
Peshawar, Quetta, Hyderabad, Sialkot, Gujranwala, Bahawalpur,
Sargodha, Sukkur, Larkana, Abbottabad, Murree, Swat, Gilgit,
Mirpur AJK + all 700+ tehsils of Pakistan
```

**`cities` table mein yeh columns add karo:**
```sql
ALTER TABLE cities
  ADD COLUMN timezone VARCHAR(50) DEFAULT 'Asia/Karachi',
  ADD COLUMN calculation_method VARCHAR(50) DEFAULT 'UISK',
  ADD COLUMN latitude DECIMAL(10,8),
  ADD COLUMN longitude DECIMAL(11,8),
  ADD COLUMN population INT,
  ADD COLUMN province VARCHAR(100),
  ADD COLUMN meta_title VARCHAR(255),
  ADD COLUMN meta_description VARCHAR(160);
```

**API Integration:** Use Aladhan API (free) for real-time prayer times calculation rather than storing static times.

**Programmatic Pages:**
- `/prayer-times` — Pakistan main page with city search
- `/prayer-times/{city-slug}` — City-specific (already in seo_metas!)
- `/prayer-times/{city-slug}/{date}` — Date-specific (future dates rankable)

**Schema per prayer times page:**
```json
{
  "@context": "https://schema.org",
  "@type": "Event",
  "name": "Fajr Prayer Time Karachi",
  "startDate": "2026-06-29T04:16:00+05:00",
  "location": {"@type": "Place", "name": "Karachi"}
}
```

---

### 1.4 ISLAMIC NAMES (Hamariweb Ka Sabse Popular Section)

Hamariweb names section pe lakhs of daily visitors hain. `islamic_names` mein abhi 2 rows hain.

**Minimum 5,000 names chahiyen:**
- 2,000+ boy names
- 2,000+ girl names
- 500+ unisex names
- Trending names (Zaviyan, Zohaib, Anaya, etc.)

**Existing table is good — bas fill karna hai. Extra columns add karo:**
```sql
ALTER TABLE islamic_names
  ADD COLUMN meaning_urdu VARCHAR(500),
  ADD COLUMN meaning_english VARCHAR(500),
  ADD COLUMN quranic_reference VARCHAR(255),  -- "Surah Al-Baqarah 2:31"
  ADD COLUMN is_quranic TINYINT(1) DEFAULT 0,
  ADD COLUMN is_trending TINYINT(1) DEFAULT 0,
  ADD COLUMN lucky_number INT,
  ADD COLUMN lucky_color VARCHAR(100),  -- searched a LOT in Pakistan
  ADD COLUMN lucky_stone VARCHAR(100),
  ADD COLUMN personality_traits TEXT,
  ADD COLUMN similar_names JSON,  -- ["Ayan", "Ayaan", "Aayan"]
  ADD COLUMN calligraphy_svg TEXT;  -- SVG Arabic calligraphy
```

**Programmatic Pages:**
- `/names` — Main names page (boy/girl filter, A-Z browsing)
- `/names/boys` — All boy names
- `/names/girls` — All girl names  
- `/names/{name-slug}` — Individual name page
- `/names/letter/{letter}` — Names starting with A, B, etc.
- `/names/meaning/{word-slug}` — Names meaning "light", "moon" etc.

**High-Search Keyword Targets:**
```
"Islamic names for boys with meaning in Urdu"
"Muslim girl names with meaning in Urdu 2026"
"Zaviyan naam ka matlab" → /names/zaviyan
"Anaya naam ki meaning" → /names/anaya
```

---

### 1.5 ALLAH KE 99 NAAM (Asmaul Husna)

`allah_names` table mein abhi 1 row hai — 99 chahiyen.

**Yeh table already perfect hai** — bas 99 rows fill karo with:
- `arabic` — Arabic text with harakat
- `transliteration` — Roman English
- `meaning_english` + `meaning_urdu`
- `benefits` — Har naam ke wazife aur fazilay (unique content!)
- Quranic references

**New columns:**
```sql
ALTER TABLE allah_names
  ADD COLUMN quran_reference VARCHAR(255),
  ADD COLUMN dhikr_count INT DEFAULT 0,  -- kitni baar padha jaye
  ADD COLUMN dua_text TEXT,  -- us naam se dua
  ADD COLUMN audio_url VARCHAR(255);
```

**Pages:**
- `/99-names-of-allah` — Grid with search
- `/99-names-of-allah/{slug}` — Individual name deep page

---

### 1.6 HADITHS SECTION

`hadiths` table mein 4 rows — need 1,000+.

**New columns needed:**
```sql
ALTER TABLE hadiths
  ADD COLUMN arabic_text TEXT,
  ADD COLUMN urdu_translation TEXT,
  ADD COLUMN english_translation TEXT,
  ADD COLUMN collection ENUM('Bukhari','Muslim','Tirmidhi','AbuDawud','IbnMajah','Nasai','Malik') NOT NULL,
  ADD COLUMN book VARCHAR(255),
  ADD COLUMN chapter VARCHAR(255),
  ADD COLUMN hadith_number INT,
  ADD COLUMN sahih_grade ENUM('Sahih','Hasan','Daif','Maudu') DEFAULT 'Sahih',
  ADD COLUMN is_featured TINYINT(1) DEFAULT 0;
```

**Target keywords:**
```
"Hadees about namaz in Urdu"
"Hadith about parents in Urdu"  
"Sahih Bukhari Hadees"
"Hadees about kindness"
```

**Pages:**
- `/hadith` — Collection index (Bukhari, Muslim, etc.)
- `/hadith/{collection-slug}` — Collection pages
- `/hadith/{collection}/{number}` — Individual hadith

---

### 1.7 ZAKAT CALCULATOR (No One Else Has This Properly)

`zakat_configs` table bilkul EMPTY hai — yeh fix karo.

**Seed data:**
```sql
INSERT INTO zakat_configs VALUES (1, 
  372514.00,  -- gold_nisab_pkr (1 tola = 372,514 per gram × 7.5 tola)
  7102.00,    -- silver_nisab_pkr (52.5 tola × current rate)  
  'today',    -- last_updated
  '{"gold_gram":37251,"silver_gram":135"}'  -- rates JSON
);
```

**Interactive Calculator page `/zakat-calculator`:**
- Gold jewelry input
- Silver input
- Cash savings input
- Business inventory
- Livestock (camels/cows/goats)
- Receivable debts
- Auto calculation
- Results with breakdown + Nisab explanation

**SEO:** "Zakat calculator Pakistan 2026" — barely any proper pages exist for this.

---

## 📋 PART 2 — NEW FEATURES/SECTIONS (Jo Abhi Hai Nahin)

### 2.1 RAMADAN SECTION (Seasonal But Massive Traffic)

New table needed:
```sql
CREATE TABLE ramadan_section (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  year INT NOT NULL,
  city_id BIGINT,
  sehri_time TIME,
  iftar_time TIME,
  date DATE,
  created_at TIMESTAMP, updated_at TIMESTAMP
);
```

**Features:**
- Sehri/Iftar timer with countdown (live widget)
- Ramadan calendar (monthly PDF download)
- Daily Ramadan dua
- Taraweeh rakat guide
- Laylatul Qadr countdown
- 30 days dua-e-iftar + dua-e-sehri
- Fidya/Kaffarah calculator

**Page:** `/ramadan` → `/ramadan/{year}` → `/ramadan/timings/{city}`

---

### 2.2 TASBEEH COUNTER (PWA Feature — Mobile App Replacement)

No backend needed — pure JavaScript + localStorage in Blade.

**Features:**
- Digital click counter
- Preset tasbeeh (SubhanAllah, Alhamdulillah, AllahuAkbar, Astaghfirullah)
- Custom dua entry
- Vibration on click (mobile)
- Session save
- Daily target setting

**Page:** `/tasbeeh` — searchable as "digital tasbeeh counter online"

---

### 2.3 HIJRI CALENDAR (Full Interactive)

`hijri_months` table exists but has 1 row.

**Features:**
- Current Hijri date widget (already on homepage)
- Full monthly calendar view
- Islamic events overlay (Ramadan, Eid, Muharram etc.)
- Gregorian ↔ Hijri converter
- "Aaj ka Islami date" — extremely searched query

**API:** Use Al-Adhan API for live Hijri date.

**Pages:**
- `/hijri-calendar` — Current month
- `/hijri-calendar/{year}/{month}` — Programmatic (e.g. `/hijri-calendar/1448/muharram`)
- `/hijri-converter` — Gregorian to Hijri converter

---

### 2.4 ISLAMIC EVENTS TRACKER

`islamic_events` table exists (1 row).

**Events to add:**
- Eid ul Fitr (with moon sighting updates)
- Eid ul Adha
- Laylatul Qadr
- Shab-e-Barat
- 12 Rabi ul Awwal (Eid Milad un Nabi)
- Muharram / Ashura
- Rajab events
- Ramadan start

**Page:** `/islamic-events` — Yearly calendar with countdown timers

---

### 2.5 NAMAZ GUIDE (Step-by-Step)

`namaz_guides` + `namaz_steps` tables exist.

**Content needed:**
- How to pray Fajr (with images)
- How to pray Zuhr, Asr, Maghrib, Isha
- Janaza namaz guide
- Eid namaz guide  
- Friday Juma guide
- Taraweeh guide
- Witr namaz
- Sunnah prayers guide
- Namaz for beginners (non-Arabic speakers)
- Mistakes in namaz

**Pages:** `/namaz-guide` → `/namaz-guide/{namaz-name}`

**SEO targets:**
```
"Namaz ka tarika in Urdu"
"How to pray namaz step by step"
"Fajr namaz ka tarika"
```

---

### 2.6 HAJJ & UMRAH COMPLETE GUIDE

`hajj_guides` + `hajj_steps` tables exist.

**Content needed:**
- Complete Hajj guide step by step (with maps)
- Umrah ka tarika
- Hajj du'as with audio
- Ihram ke ahkam
- Mina, Arafat, Muzdalifah guide
- Tawaf guide
- Sa'ee guide
- Stoning at Jamarat
- Hajj checklist (downloadable PDF)
- Umrah package comparison (affiliate potential)

**Pages:** `/hajj-guide` → `/hajj-guide/{step-slug}`

---

### 2.7 KNOWLEDGE HUB / ISLAMIC ARTICLES

`knowledge_articles` table exists (1 row).

**Article categories needed (from `knowledge_categories`):**
1. Aqeedah (Beliefs)
2. Fiqh (Islamic Law — practical questions)
3. Seerah (Prophet's biography)
4. Sahaba stories
5. Islamic history
6. Women in Islam
7. Islamic finance
8. Contemporary issues
9. Tazkiya (Self-purification)
10. Islamic parenting

**Minimum 5 articles per category = 50 articles to start.**

**Schema for articles:**
```json
{
  "@type": "Article",
  "headline": "...",
  "author": {"@type": "Person", "name": "..."},
  "publisher": {"@type": "Organization", "name": "NoorIslam"},
  "datePublished": "...",
  "inLanguage": "ur"
}
```

---

### 2.8 WAZAIF SECTION (Unique to NoorIslam — Not on Hamariweb)

**New table needed:**
```sql
CREATE TABLE wazaif (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  title_urdu VARCHAR(255) NOT NULL,
  title_english VARCHAR(255),
  arabic_text TEXT,
  urdu_text TEXT,
  purpose VARCHAR(255),  -- "Rizq ke liye", "Shifa ke liye", etc.
  reference TEXT,  -- Quran/Hadith reference
  method TEXT,     -- How many times, when to read
  slug VARCHAR(255) UNIQUE,
  is_authentic TINYINT(1) DEFAULT 1,
  scholar_verified TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP, updated_at TIMESTAMP
);
```

**Pages:** `/wazaif` → `/wazaif/{purpose-slug}` → `/wazaif/{slug}`

**High-search queries:**
```
"Wazifa for rizq"
"Wazifa for marriage"
"Wazifa for success in exam"
"Shifa ke liye wazifa"
```

---

### 2.9 ISLAMIC DREAM INTERPRETATION (Tabeer ul Ruya)

Almost no dedicated Pakistani website covers this properly.

**New table:**
```sql
CREATE TABLE dream_symbols (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  symbol_urdu VARCHAR(255) NOT NULL,
  symbol_english VARCHAR(255),
  interpretation_urdu TEXT NOT NULL,
  interpretation_english TEXT,
  scholar_reference VARCHAR(255),  -- "Ibn Sirin"
  is_good_dream TINYINT(1),
  slug VARCHAR(255) UNIQUE,
  search_count INT DEFAULT 0,
  created_at TIMESTAMP, updated_at TIMESTAMP
);
```

**500+ dream symbols** (snakes, water, flying, teeth falling, etc.)

**Pages:** `/khwabon-ki-tabeer` → `/khwabon-ki-tabeer/{symbol-slug}`

**Why this wins:** "Khwabon ki tabeer" searches are MASSIVE in Pakistan. Zero good websites exist.

---

### 2.10 SCHOLARS SECTION

`scholars` table exists (1 row). 

**Add 50+ scholars:**
- Dr. Israr Ahmed
- Mufti Menk
- Dr. Zakir Naik
- Nouman Ali Khan
- Maulana Tariq Jamil
- Dr. Farhat Hashmi (women audience)
- Mufti Taqi Usmani

**Columns to add:**
```sql
ALTER TABLE scholars
  ADD COLUMN bio_urdu TEXT,
  ADD COLUMN bio_english TEXT,
  ADD COLUMN youtube_channel VARCHAR(255),
  ADD COLUMN website VARCHAR(255),
  ADD COLUMN photo_url VARCHAR(255),
  ADD COLUMN specialty VARCHAR(255),
  ADD COLUMN country VARCHAR(100);
```

---

### 2.11 ISLAMIC QUIZ (Engagement + Time-on-Site)

**New table:**
```sql
CREATE TABLE islamic_quizzes (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  question_urdu TEXT NOT NULL,
  question_english TEXT,
  option_a VARCHAR(255), option_b VARCHAR(255),
  option_c VARCHAR(255), option_d VARCHAR(255),
  correct_option ENUM('a','b','c','d'),
  explanation TEXT,
  category VARCHAR(100),  -- "Quran", "Hadith", "Fiqh", "History"
  difficulty ENUM('easy','medium','hard'),
  created_at TIMESTAMP
);
```

**Page:** `/islamic-quiz` — Daily quiz widget

---

## 📋 PART 3 — TECHNICAL SEO (Critical Fixes)

### 3.1 Schema Markup — Per Page Type

Every page needs proper schema. Laravel mein ek `SchemaService` bano:

**Homepage:**
```json
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "NoorIslam",
  "url": "https://noorislam.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://noorislam.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
```

**Prayer Times pages:**
```json
{"@type": "FAQPage", "mainEntity": [
  {"@type": "Question", "name": "Aaj Karachi mein Fajr ka waqt kya hai?",
   "acceptedAnswer": {"@type": "Answer", "text": "04:16 AM"}}
]}
```

**Surah pages:**
```json
{"@type": "Article", "articleSection": "Quran",
 "inLanguage": ["ar", "ur", "en"],
 "hasPart": [{"@type": "CreativeWork", "text": "Ayah 1..."}]}
```

**Islamic Names pages:**
```json
{"@type": "Article", "about": {"@type": "Thing", "name": "Zaviyan Name Meaning"}}
```

---

### 3.2 Dynamic Sitemap Structure

Laravel mein `/sitemap.xml` route already hai check karo. Sitemap index structure:

```xml
<sitemapindex>
  <sitemap><loc>https://noorislam.com/sitemap-surahs.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-duas.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-names.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-prayer-times.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-hadiths.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-articles.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-wazaif.xml</loc></sitemap>
</sitemapindex>
```

**Priority mapping:**
- Homepage: 1.0
- Prayer times city pages: 0.9 (daily changefreq)
- Surah pages: 0.8
- Dua pages: 0.8
- Name pages: 0.7
- Article pages: 0.7
- Hadith pages: 0.6

---

### 3.3 Open Graph / Social Sharing (Per Page)

Every shareable page (duas, names, hadith) needs OG image generation.

**Laravel `spatie/browsershot` ya `intervention/image` se dynamic OG images:**

```php
// OG image template for duas
// Background: dark green gradient
// Arabic text: large, Scheherazade font  
// Branding: NoorIslam logo bottom right
// Size: 1200×630px
```

**Dua cards ke liye:**
```html
<meta property="og:image" content="https://noorislam.com/og/dua/{slug}.jpg">
<meta property="twitter:card" content="summary_large_image">
```

WhatsApp pe share karne se backlinks automatically generate honge — Pakistani users yahi karte hain.

---

### 3.4 Canonical URLs

`seo_metas` mein `canonical_url` already hai. Ensure karo:
- Prayer times: `https://noorislam.com/prayer-times/karachi` (no trailing slash)
- Surah pages: `https://noorislam.com/surah/al-fatiha`
- No duplicate content for `/quran/1` vs `/quran/al-fatiha`

---

### 3.5 hreflang Tags (Urdu + English)

```html
<link rel="alternate" hreflang="ur" href="https://noorislam.com/ur/surah/al-fatiha">
<link rel="alternate" hreflang="en" href="https://noorislam.com/surah/al-fatiha">
<link rel="alternate" hreflang="x-default" href="https://noorislam.com/surah/al-fatiha">
```

---

### 3.6 Core Web Vitals Checklist

| Metric | Target | How to Achieve |
|---|---|---|
| LCP | < 2.5s | Lazy load images, preload fonts |
| FID/INP | < 100ms | Defer JS, avoid render-blocking |
| CLS | < 0.1 | Define image dimensions, no dynamic injection |
| TTFB | < 200ms | Redis cache for prayer times, OPcache |

**Laravel Optimizations:**
```bash
php artisan config:cache
php artisan route:cache  
php artisan view:cache
php artisan optimize
```

**Blade templates:**
```html
<!-- Preload Arabic font -->
<link rel="preload" href="/fonts/scheherazade.woff2" as="font" crossorigin>

<!-- Lazy load Quran audio -->
<audio preload="none" data-src="/audio/001.mp3"></audio>

<!-- Critical CSS inline -->
<style>/* above-fold styles only */</style>
```

---

### 3.7 robots.txt

```
User-agent: *
Allow: /

Disallow: /admin/
Disallow: /filament/
Disallow: /api/
Disallow: /*.json$
Disallow: /storage/

Sitemap: https://noorislam.com/sitemap.xml
```

---

### 3.8 `.htaccess` / Nginx Optimizations

```apache
# Enable Gzip
AddOutputFilterByType DEFLATE text/html text/css application/javascript

# Browser Caching  
ExpiresByType text/css "access plus 1 month"
ExpiresByType application/javascript "access plus 1 month"
ExpiresByType image/jpeg "access plus 1 year"
ExpiresByType image/webp "access plus 1 year"

# Force HTTPS
RewriteRule ^(.*)$ https://www.noorislam.com/$1 [R=301,L]

# www redirect
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]
```

---

## 📋 PART 4 — KEYWORD STRATEGY

### 4.1 High Priority Keywords (Easy Wins)

| Keyword | Monthly Searches | Competition | Target Page |
|---|---|---|---|
| namaz time karachi | 200K+ | Medium | /prayer-times/karachi |
| namaz time lahore | 100K+ | Medium | /prayer-times/lahore |
| surah yaseen | 500K+ | High | /surah/yaseen |
| surah rehman | 300K+ | High | /surah/ar-rahman |
| dua e qunoot | 150K+ | Low | /duas/dua-e-qunoot |
| islamic names for boys | 100K+ | Medium | /names/boys |
| zaviyan naam ka matlab | 50K+ | Low | /names/zaviyan |
| 99 names of allah | 80K+ | Medium | /99-names-of-allah |
| zakat calculator pakistan | 40K+ | Low | /zakat-calculator |
| hadees in urdu | 100K+ | Medium | /hadith |
| khwabon ki tabeer | 200K+ | Low | /khwabon-ki-tabeer |
| dua for success | 50K+ | Low | /duas/success |
| islamabad namaz timing | 80K+ | Low | /prayer-times/islamabad |
| hajj guide urdu | 30K+ | Low | /hajj-guide |
| digital tasbeeh | 20K+ | Very Low | /tasbeeh |

---

### 4.2 Programmatic SEO — Volume Keywords

**Prayer Times (700+ cities):**
Pattern: `namaz time {city-name} today`
→ 700 pages × ~1000 avg searches = 700,000 monthly impressions

**Islamic Names (5000+ names):**
Pattern: `{name} naam ka matlab urdu mein`
→ 5000 pages × ~500 avg searches = 2.5M monthly impressions

**Surah Pages (114 surahs):**
Pattern: `surah {name} with urdu translation`
→ 114 pages × ~10,000 avg searches = 1.14M monthly impressions

**Hadith Pages (1000+ hadiths):**
Pattern: `hadith about {topic}`
→ 1000 pages × ~200 avg searches = 200,000 monthly impressions

**Dream Interpretation (500+ symbols):**
Pattern: `{symbol} khwab mein dekhna`
→ 500 pages × ~1000 avg searches = 500,000 monthly impressions

---

### 4.3 Long-Tail Keyword Clusters

**Namaz Category:**
- fajr namaz ka tarika in urdu
- namaz mein kya parhein
- witr namaz ka tarika
- eid ul fitr namaz ka tarika
- zuhr ki sunnat namaz

**Dua Category:**
- subah uthne ki dua
- safar ki dua in urdu
- dua before eating in arabic
- dua for rain in urdu
- shifa ki dua quran se

**Quran Category:**
- surah yasin ki fazilat
- surah mulk benefits in urdu
- last 3 surahs of quran
- surah fatiha meaning
- 4 qul in arabic

---

## 📋 PART 5 — ON-PAGE SEO (Per Section)

### 5.1 Homepage SEO

**Title tag:**
```
NoorIslam – Quran, Duas, Namaz Timings, Islamic Names | Pakistan Ka Islami Portal
```

**Meta description:**
```
NoorIslam par payen Quran Majeed ka Urdu tarjuma, masnoon duain, aaj ka namaz waqt, Islamic names aur hadees. Pakistan ka sabse behtar Islami website.
```

**H1 tag:** "پاکستان کا مکمل اسلامی پورٹل"

**Homepage sections order (SEO-optimized):**
1. Hero — Prayer Times widget (aaj ka namaz waqt — highest search intent)
2. Daily Dua of the day
3. Quran Explorer (Today's surah recommendation)
4. Islamic Names Trending
5. Hadith of the Day
6. 99 Names of Allah (partial — link to full page)
7. Islamic Events & Hijri Calendar
8. Zakat Calculator widget
9. Knowledge Hub articles
10. Newsletter signup

---

### 5.2 Internal Linking Strategy

**Every surah page links to:**
- Previous surah / Next surah
- Same juz other surahs
- Related duas from same context
- Related hadiths

**Every name page links to:**
- Similar names
- Names with same meaning
- Gender-specific name lists
- Names by first letter

**Every prayer time page links to:**
- Same city other dates
- Neighboring city prayer times
- Namaz guide
- Qibla direction for that city

---

## 📋 PART 6 — NEW HOMEPAGE SECTIONS (Theme-Matching)

Existing homepage sections preserve karo. Inhe ADD karo (theme variables same rahenge: CSS variables se `--primary-green`, `--gold-accent` etc.):

### 6.1 Daily Dua Widget
```blade
{{-- resources/views/components/daily-dua.blade.php --}}
<section class="daily-dua-section" style="background: var(--card-bg); border-left: 4px solid var(--primary-green)">
  <div class="arabic-text" dir="rtl">{{ $dua->arabic_text }}</div>
  <div class="transliteration">{{ $dua->transliteration }}</div>
  <div class="translation urdu" dir="rtl">{{ $dua->translation }}</div>
  <div class="audio-player"><!-- Audio button --></div>
  <a href="{{ route('duas.show', $dua->seo_slug) }}">مکمل دعا پڑھیں</a>
</section>
```

### 6.2 Quick Prayer Time Widget
```blade
<section class="prayer-times-widget">
  <div class="city-selector">
    <select id="city-select"><!-- Pakistan cities --></select>
  </div>
  <div class="times-grid">
    @foreach(['Fajr','Sunrise','Zuhr','Asr','Maghrib','Isha'] as $prayer)
    <div class="prayer-card {{ $currentPrayer == $prayer ? 'active' : '' }}">
      <span class="prayer-name">{{ $prayer }}</span>
      <span class="prayer-time">{{ $times[$prayer] }}</span>
    </div>
    @endforeach
  </div>
</section>
```

### 6.3 Hijri Date Banner
```blade
<div class="hijri-banner" style="background: linear-gradient(135deg, var(--primary-green), var(--dark-green))">
  <span class="hijri-date">{{ $hijriDate }}</span>
  <span class="gregorian-date">{{ now()->format('d F Y') }}</span>
  <span class="next-event">اگلا: {{ $nextIslamicEvent->name }} ({{ $daysLeft }} دن)</span>
</div>
```

### 6.4 Trending Names Section
```blade
<section class="trending-names">
  <h2>آج کے مقبول اسلامی نام</h2>
  <div class="names-tabs">
    <button class="tab active" data-gender="male">لڑکوں کے نام</button>
    <button class="tab" data-gender="female">لڑکیوں کے نام</button>
  </div>
  <div class="names-grid">
    @foreach($trendingNames as $name)
    <a href="{{ route('names.show', $name->slug) }}" class="name-card">
      <span class="arabic">{{ $name->name_arabic }}</span>
      <span class="urdu">{{ $name->name_english }}</span>
      <span class="meaning">{{ Str::limit($name->translation_urdu, 30) }}</span>
    </a>
    @endforeach
  </div>
</section>
```

### 6.5 Hadith of the Day
```blade
<section class="hadith-widget" style="border: 1px solid var(--gold-accent)">
  <div class="hadith-label">آج کی حدیث مبارکہ</div>
  <div class="hadith-arabic" dir="rtl">{{ $hadith->arabic_text }}</div>
  <div class="hadith-urdu" dir="rtl">{{ $hadith->urdu_translation }}</div>
  <div class="hadith-source">{{ $hadith->collection }} — {{ $hadith->book }}</div>
  <div class="share-buttons"><!-- WhatsApp, Facebook, Copy --></div>
</section>
```

### 6.6 Surah of the Day / Quran Explorer
```blade
<section class="quran-explorer">
  <h2>آج کی سورت</h2>
  <div class="surah-card">
    <div class="surah-header">
      <span class="surah-name-ar">{{ $surah->name_ar }}</span>
      <span class="surah-name-ur">{{ $surah->name_ur }}</span>
      <span class="surah-info">{{ $surah->ayah_count }} آیات | {{ $surah->revelation_place }}</span>
    </div>
    <div class="surah-preview" dir="rtl">{{ Str::limit($surah->arabic_text, 200) }}</div>
    <a href="{{ route('surah.show', $surah->slug) }}" class="read-btn">مکمل سورت پڑھیں</a>
    <button class="listen-btn" data-audio="{{ $surah->audio_url }}">سنیں ▶</button>
  </div>
  <div class="surah-grid">
    <!-- 114 surahs grid with search -->
  </div>
</section>
```

### 6.7 Zakat Calculator Widget (Homepage Shortened Version)
```blade
<section class="zakat-widget">
  <h2>زکوٰۃ کیلکولیٹر</h2>
  <p>اپنی زکوٰۃ فوری معلوم کریں</p>
  <div class="quick-calc">
    <input type="number" placeholder="سونا (گرام میں)">
    <input type="number" placeholder="چاندی (گرام میں)">
    <input type="number" placeholder="نقد رقم (PKR)">
    <button>زکوٰۃ معلوم کریں</button>
  </div>
  <a href="/zakat-calculator">مکمل کیلکولیٹر</a>
</section>
```

### 6.8 Islamic Events Countdown
```blade
<section class="events-countdown">
  @foreach($upcomingEvents->take(3) as $event)
  <div class="event-card">
    <div class="event-name">{{ $event->title }}</div>
    <div class="countdown" data-date="{{ $event->date }}">
      <span class="days">--</span> دن باقی
    </div>
  </div>
  @endforeach
</section>
```

### 6.9 Knowledge Hub Preview
```blade
<section class="knowledge-hub">
  <h2>علم کا خزانہ</h2>
  <div class="articles-grid">
    @foreach($latestArticles->take(6) as $article)
    <article class="article-card">
      <div class="category-badge">{{ $article->category->name }}</div>
      <h3><a href="{{ route('knowledge.show', $article->slug) }}">{{ $article->title }}</a></h3>
      <p>{{ Str::limit($article->content, 100) }}</p>
    </article>
    @endforeach
  </div>
</section>
```

### 6.10 Newsletter Signup (Engagement Signal)
```blade
<section class="newsletter-section" style="background: var(--primary-green)">
  <h2>روزانہ ایک اسلامی پیغام</h2>
  <p>ای میل پر حدیث، دعا اور اسلامی معلومات پائیں</p>
  <form action="/subscribe" method="POST">
    @csrf
    <input type="email" name="email" placeholder="آپ کا ای میل">
    <button type="submit">سبسکرائب کریں</button>
  </form>
  <small>بغیر اسپیم کے۔ کبھی بھی بند کر سکتے ہیں۔</small>
</section>
```

---

## 📋 PART 7 — NEW DB TABLES SUMMARY

Tables jo abhi exist nahin lekin add karni hain:

```sql
-- 1. Tafseer per ayah
CREATE TABLE tafseer (...);

-- 2. Quran bookmarks (sessionless)
CREATE TABLE quran_bookmarks (...);

-- 3. Wazaif collection  
CREATE TABLE wazaif (...);

-- 4. Dream interpretation
CREATE TABLE dream_symbols (...);

-- 5. Islamic Quiz
CREATE TABLE islamic_quizzes (...);

-- 6. Page views / analytics
CREATE TABLE page_views (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  page_url VARCHAR(500),
  page_type VARCHAR(100),
  views INT DEFAULT 0,
  date DATE,
  UNIQUE KEY unique_page_date (page_url, date)
);

-- 7. Quran recitations (audio links)
CREATE TABLE quran_recitations (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  reciter_name VARCHAR(255),
  reciter_slug VARCHAR(255),
  surah_id INT,
  audio_url VARCHAR(500),
  bitrate INT DEFAULT 128
);

-- 8. Ramadan timings per city per year
CREATE TABLE ramadan_section (...);
```

---

## 📋 PART 8 — ROUTE STRUCTURE (Laravel routes/web.php)

```php
// Quran
Route::get('/quran', [QuranController::class, 'index']);
Route::get('/quran/{slug}', [QuranController::class, 'show']);
Route::get('/quran/{slug}/{ayah}', [QuranController::class, 'ayah']);
Route::get('/quran/juz/{number}', [QuranController::class, 'juz']);

// Duas  
Route::get('/duas', [DuaController::class, 'index']);
Route::get('/duas/{category}', [DuaController::class, 'category']);
Route::get('/duas/{category}/{slug}', [DuaController::class, 'show']);

// Prayer Times
Route::get('/prayer-times', [PrayerController::class, 'index']);
Route::get('/prayer-times/{city}', [PrayerController::class, 'city']);
Route::get('/prayer-times/{city}/{date}', [PrayerController::class, 'cityDate']);

// Islamic Names
Route::get('/names', [NameController::class, 'index']);
Route::get('/names/boys', [NameController::class, 'boys']);
Route::get('/names/girls', [NameController::class, 'girls']);
Route::get('/names/{slug}', [NameController::class, 'show']);

// 99 Names of Allah
Route::get('/99-names-of-allah', [AllahNamesController::class, 'index']);
Route::get('/99-names-of-allah/{slug}', [AllahNamesController::class, 'show']);

// Hadith
Route::get('/hadith', [HadithController::class, 'index']);
Route::get('/hadith/{collection}', [HadithController::class, 'collection']);

// Tools
Route::get('/zakat-calculator', [ToolsController::class, 'zakat']);
Route::get('/tasbeeh', [ToolsController::class, 'tasbeeh']);
Route::get('/hijri-converter', [ToolsController::class, 'hijriConverter']);

// New Sections
Route::get('/wazaif', [WazaifController::class, 'index']);
Route::get('/wazaif/{slug}', [WazaifController::class, 'show']);
Route::get('/khwabon-ki-tabeer', [DreamController::class, 'index']);
Route::get('/khwabon-ki-tabeer/{slug}', [DreamController::class, 'show']);
Route::get('/namaz-guide', [NamazGuideController::class, 'index']);
Route::get('/hajj-guide', [HajjController::class, 'index']);
Route::get('/ramadan', [RamadanController::class, 'index']);
Route::get('/islamic-quiz', [QuizController::class, 'index']);

// SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/sitemap-{type}.xml', [SitemapController::class, 'type']);
Route::get('/robots.txt', [SeoController::class, 'robots']);
```

---

## 📋 PART 9 — CONTENT SEEDING PRIORITY ORDER

**Month 1 (Foundation):**
1. ✅ 99 Allah Names — 99 rows fill karo
2. ✅ Prayer times — 50 major cities add karo
3. ✅ Duas — 100 masnoon duas (categories ready hain)
4. ✅ Surahs — All 114 with basic info
5. ✅ Surah Ayahs — Start with 10 most searched (Yaseen, Rahman, Mulk, Waqiah, Fatiha...)
6. ✅ Zakat config — 1 row seed karo (gold/silver rates)

**Month 2 (Traffic):**
1. Islamic Names — 2000 names minimum
2. Hadiths — 200 hadiths (categorized)
3. Knowledge articles — 30 articles (10 categories × 3 each)
4. Wazaif — 50 authentic wazaif

**Month 3 (Dominance):**
1. Remaining surah ayahs (all 6236)
2. Dream symbols — 200 entries
3. Remaining cities prayer times (200+)
4. Hadiths — 1000 total
5. Islamic names — 5000 total

---

## 📋 PART 10 — GEMINI AI INTEGRATION (Auto Content)

Tumhare paas already Gemini integration hai. Use it for:

```php
// In a console command: php artisan content:generate-names
$prompt = "Generate 50 Islamic baby boy names with:
- name_arabic (Arabic script)
- name_english (romanized)
- translation_urdu (Urdu meaning)
- meaning_english
- origin (Arabic/Persian/Turkish)
- quranic_reference if applicable
Return as JSON array.";
```

**Auto-generate karo:**
- Name meanings
- Hadith translations
- Knowledge articles (with human review)
- OG image descriptions

---

## 📋 PART 11 — PERFORMANCE TARGETS

| Metric | Current (estimate) | Target | How |
|---|---|---|---|
| PageSpeed Mobile | Unknown | 90+ | Optimize images, defer JS |
| PageSpeed Desktop | Unknown | 95+ | Cache, CDN |
| LCP | Unknown | < 2.0s | Preload fonts, critical CSS |
| Indexed pages | ~160 (from seo_metas) | 10,000+ | Fill content tables |
| Google rank keywords | 0 | 50 within 90 days | Content + technical |

---

## 📋 PART 12 — QUICK WINS (Implement This Week)

1. **robots.txt** — Create proper file
2. **Zakat config** — Seed 1 row, calculator page live karo
3. **Allah names** — Seed all 99 (20 mins ka kaam)
4. **Prayer times Karachi/Lahore/Islamabad** — Already in seo_metas, pages live karo  
5. **Surah Fatiha** — Full ayahs + translation add karo (most searched)
6. **Newsletter** — Subscribers table start karo
7. **Sitemap** — Submit to Google Search Console
8. **Page speed** — `php artisan optimize` + image compression

---

## SUMMARY TABLE — HAMARIWEB vs NOORISLAM TARGET

| Feature | Hamariweb | NoorIslam Target |
|---|---|---|
| Focus | General portal | Pure Islamic ✅ |
| Quran | Basic .aspx | Modern ayah player + tafseer ✅ |
| Prayer times | ✅ Good | ✅ + API-based accuracy |
| Duas | ✅ Basic list | Audio + categories + sharing ✅ |
| Names | ✅ Large DB | + Calligraphy + lucky number ✅ |
| Zakat calculator | ❌ None | ✅ Interactive |
| Tasbeeh counter | ❌ None | ✅ PWA |
| Dream interpretation | ❌ None | ✅ 500+ symbols |
| Wazaif | ❌ None | ✅ Authentic collection |
| Hajj guide | ❌ Basic | ✅ Step-by-step with maps |
| Speed | ⚠️ Heavy portal | ✅ Laravel optimized |
| Mobile UX | ⚠️ OK | ✅ Mobile-first |
| Schema markup | ❌ Basic | ✅ Per-page structured data |
| Bilingual | ✅ Urdu+English | ✅ + Per-page toggle |
| E-E-A-T signal | ⚠️ General site | ✅ Pure Islamic authority |

---

*Document generated: June 29, 2026 | NoorIslam Strategy v1.0*
*Based on: DB audit (islamicwebsite_6.sql), GitHub repo scan, hamariweb.com competitor analysis*
