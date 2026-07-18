# 🕌 NoorIslam — v18 SEO Audit: Changes Review + Updated Master Prompt
**DB Version:** islamicwebsite__18_.sql (July 2026)  
**Previous Version:** islamicwebsite__17_.sql  
**Stack:** Laravel (PHP 8.2) + Blade | MariaDB 10.4 | GitHub: noormuhammad2k20-a11y/islamicweb

---

## PART 1 — KYA CHANGES HUI HAIN? (v17 → v18 Comparison)

### ✅ FIXED — Achhi Changes Jo Hui Hain

| # | Problem (v17 mein tha) | Fix (v18 mein hua) | Status |
|---|---|---|---|
| 1 | `knowledge_articles` mein koi SEO field nahi tha | `meta_title`, `meta_description`, `og_image`, `canonical_url`, `focus_keyword`, `schema_type` sab add ho gaye | ✅ DONE |
| 2 | `wazaif` mein koi SEO field nahi tha | `meta_title`, `meta_description`, `og_image`, `focus_keyword` add ho gaye | ✅ DONE |
| 3 | `dream_symbols` mein `seo_index` field nahi tha | `seo_index TINYINT(1) DEFAULT 1` add ho gaya | ✅ DONE |
| 4 | `seo_metas` sirf Duas cover karta tha | Ab **13+ models** cover ho rahe hain: IslamicName (13,622), DreamSymbol (5,618), Hadith (3,504), Dua (304), Surah (289), Ayah (258), AllahName (99), Wazifa (97)... | ✅ MASSIVE IMPROVEMENT |
| 5 | `historical_events` mein `meta_title` nahi tha | `meta_title`, `meta_description`, `canonical_url`, `og_data`, `twitter_data` sab add ho gaye | ✅ DONE |

---

### 🔴 ABHI BHI BAQI HAIN — Critical Problems Jo Fix NAHI HUI

#### ❌ PROBLEM 1: Dream Symbols Content Abhi Bhi DUPLICATE Hai (CRITICAL)

`seo_index=0` sirf **101 rows** pe laga — lekin **asli problem** content ka duplicate hona hai, sirf field add karna kaafi nahi.

**Proof — v18 mein abhi bhi same content:**
```
ID 24495 (Kala Saanp Dekhna):
short_interpretation: "Khwab mein Kala Saanp Dekhna dekhna islami tabeer ke mutabiq ek khabardar 
karne wala ishara hai. Khwab mein Saanp dekhna aam tor par kisi pareshani..."

ID 24496 (Kala Saanp Kaatna):  
short_interpretation: "Khwab mein Kala Saanp Kaatna dekhna islami tabeer ke mutabiq ek khabardar
karne wala ishara hai. Khwab mein Saanp dekhna aam tor par kisi pareshani..."
```

Sirf noun "Dekhna" → "Kaatna" badla, baaki sab same! Google ye detect karta hai.

**Aur bura yeh — seo_metas mein meta_description bhi truncated/bad hai:**
```
"Khwab mein Khwab Mein Kala Saanp Dekhna (Black Snake Seeing) dekhne ki Islami 
tabeer. Khwab mein Kala Saanp Dekhna dekhna islami tabeer ke mutabiq. Auth..."
```
"Auth..." pe truncate ho raha hai! Ye SERP mein bekar dikhega.

**Fix Required:**
```
seo_index=0 wale pages pe Blade mein:
<meta name="robots" content="noindex, follow">
<link rel="canonical" href="{{ $parentSymbol->canonical_url }}">
```
Aur `meta_description` field 160 chars se truncate honi chahiye, "Auth..." nahi.

---

#### ❌ PROBLEM 2: Surahs Abhi Bhi NULL Content Hai (CRITICAL)

```sql
-- v18 mein bhi:
(1, 1, NULL, NULL, NULL, NULL, NULL, ...) -- Al-Faatiha: arabic_text = NULL!
(2, 2, NULL, NULL, NULL, NULL, NULL, ...) -- Al-Baqara: arabic_text = NULL!
```

Surah pages ke liye arabic_text, urdu_translation, english_translation — **abhi bhi NULL hain**. Ye critical hai kyunke Surah Yaseen aur Al-Faatiha highest traffic pages hain (page_views table mein top entries).

---

#### ❌ PROBLEM 3: Cities Sirf 25 Hain — 900+ Chahiye

v17: 22 cities → v18: **25 cities** (sirf 3 add hue). Pakistan mein 900+ tehsil hain jahan prayer time searches hoti hain. Ye ek massive missed opportunity hai.

---

#### ❌ PROBLEM 4: Meta Descriptions Mein Template Pattern Abhi Bhi Hai

**Duas ki seo_metas mein:**
- "NoorIslam par Aaina Dekhne Ki Dua in Arabic, Urdu translation aur Roman Urdu mein parhen. Complete details, reference aur benefits."

Ye same formula **500+ Duas** ke liye repeat ho rahi hai.

**Wazaif ki seo_metas mein:**
- "ولاد کے لیے حضرت زکریا علیہ السلا... | NoorIslam" — truncated Urdu title!
- "NoorIslam par ... ka mukammal tarika, Arabic text, Urdu tarjuma, fazilat aur Hadith reference parhen. **Auth...**" — truncated!

"Auth..." ka matlab meta_description 160 chars se zyada thi aur DB mein poori store hai lekin display truncated ho rahi hai.

---

#### ❌ PROBLEM 5: lucky_number/lucky_color Fields Abhi Bhi Table Mein Hain

`islamic_names` table mein `lucky_number`, `lucky_color`, `lucky_stone` fields exist karti hain — aur data NULL hai (achhi baat), lekin ye fields active hain. Agar koi developer inhe galti se template mein show kare, ya agar future mein koi data add ho, to credibility issue hoga.

**Recommendation:** Ya toh frontend template mein inhe kabhi show mat karo (comment add karo), ya DB migration se drop karo.

---

#### ❌ PROBLEM 6: hreflang Tags — Koi Evidence Nahi

GitHub repo mein sirf 1 commit hai — aur views folder nahi dekhne mila. DB se pata nahi chalta ke Blade templates mein hreflang implement hua ya nahi. Ye Urdu/English multilingual site ke liye zaroori hai.

---

#### ❌ PROBLEM 7: Schema/Structured Data — DB Mein Koi Evidence Nahi

`seo_metas.schema_override_json` field exist karti hai lekin **saari rows mein NULL** hai. Matlab BreadcrumbList, FAQPage, HowTo, Article schema — kuch bhi implement nahi hua.

---

## PART 2 — OVERALL SCORECARD: v17 vs v18

| SEO Area | v17 Score | v18 Score | Change |
|---|---|---|---|
| knowledge_articles SEO fields | 0/10 | 8/10 | ✅ +8 |
| wazaif SEO fields | 0/10 | 8/10 | ✅ +8 |
| seo_metas coverage | 3/10 | 8/10 | ✅ +5 |
| Dream Symbol noindex control | 0/10 | 4/10 | ⚠️ +4 (field added, logic incomplete) |
| Dream Symbol content quality | 1/10 | 2/10 | ⚠️ +1 (same duplicate content) |
| Surah content | 1/10 | 1/10 | ❌ No change |
| City coverage (prayer times) | 2/10 | 2/10 | ❌ No change |
| Meta description quality | 2/10 | 3/10 | ⚠️ Slight improvement |
| Schema/Structured Data | 0/10 | 0/10 | ❌ No change |
| hreflang | 0/10 | 0/10 | ❌ No change |
| **OVERALL** | **3/10** | **5/10** | **✅ +2 (Good progress!)** |

---

## PART 3 — NEXT PRIORITY ACTIONS (Kya Karna Hai Ab)

### 🔴 Priority 1 — Foran Karo (This Week)

**1. Dream Symbols — Blade Template mein noindex logic lagao:**
```blade
{{-- resources/views/dream-symbols/show.blade.php --}}
@if($dreamSymbol->seo_index == 0)
    <meta name="robots" content="noindex, follow">
    <link rel="canonical" href="{{ $dreamSymbol->parent ? url('/khwabon-ki-tabeer/' . $dreamSymbol->parent->slug) : url('/khwabon-ki-tabeer') }}">
@else
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $dreamSymbol->canonical_url ?? url()->current() }}">
@endif
```

**2. Meta Description Truncation Fix — seo_metas mein "Auth..." band karo:**
Jab bhi meta_description DB mein save karo, ye ensure karo:
```php
// In Seeder/Command
$description = substr(strip_tags($rawDescription), 0, 155);
// Never end with "..." from mid-word
```

**3. Surah Pages — ayahs table se text compile karo:**
```php
// SurahController@show
$surah = Surah::with(['ayahs.translationEnglish', 'ayahs.translationUrdu'])->findOrFail($id);
// Assemble full arabic text from ayahs
$surah->computed_arabic = $surah->ayahs->pluck('arabic_text')->implode(' ');
```

---

### ⚠️ Priority 2 — Is Month Mein Karo

**4. Schema Markup Implement Karo:**

Har page type ke liye schema add karo Blade layouts mein:

```blade
{{-- BreadcrumbList — sab pages pe --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type": "ListItem", "position": 1, "name": "Home", "item": "https://noorislam.com"},
    {"@type": "ListItem", "position": 2, "name": "{{ $sectionName }}", "item": "{{ $sectionUrl }}"},
    {"@type": "ListItem", "position": 3, "name": "{{ $pageTitle }}", "item": "{{ url()->current() }}"}
  ]
}
</script>

{{-- FAQPage — Islamic Names, Dream Symbols, Duas --}}
@if($model->faq)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": @json(collect(json_decode($model->faq))->map(fn($f) => [
    "@type" => "Question",
    "name" => $f->question,
    "acceptedAnswer" => ["@type" => "Answer", "text" => $f->answer]
  ]))
}
</script>
@endif
```

**5. hreflang Tags Add Karo:**
```blade
{{-- In layouts/app.blade.php <head> section --}}
<link rel="alternate" hreflang="ur" href="{{ url()->current() }}?lang=ur" />
<link rel="alternate" hreflang="en" href="{{ url()->current() }}?lang=en" />
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
```

**6. Cities Expand Karo (Pakistan ke top 100 cities minimum):**
```sql
-- Add major Pakistani cities
INSERT INTO cities (country_id, name, slug, latitude, longitude, timezone, prayer_calc_method) VALUES
(1, 'Multan', 'multan', 30.1575, 71.5249, 'Asia/Karachi', '1'),
(1, 'Peshawar', 'peshawar', 34.0151, 71.5249, 'Asia/Karachi', '1'),
(1, 'Quetta', 'quetta', 30.1798, 66.9750, 'Asia/Karachi', '1'),
-- ... (100+ cities)
```

---

### 📌 Priority 3 — Agले 2 Mahine Mein

**7. Sitemap Strategy:**
```php
// routes/web.php mein
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/sitemap_surahs.xml', [SitemapController::class, 'surahs']);
Route::get('/sitemap_duas.xml', [SitemapController::class, 'duas']);
Route::get('/sitemap_dream_symbols.xml', [SitemapController::class, 'dreamSymbols']); // seo_index=1 only
Route::get('/sitemap_islamic_names.xml', [SitemapController::class, 'islamicNames']);
Route::get('/sitemap_hadiths.xml', [SitemapController::class, 'hadiths']);
Route::get('/sitemap_cities.xml', [SitemapController::class, 'cities']); // daily changefreq
```

**8. Dream Symbol Content Quality — Top 500 rewrite karo:**
Database mein `detailed_interpretation_urdu` jo 500 chars se zyada ho, unhe indexed rakho. Baaki ko noindex. Phir unique content script chalao:

```sql
-- Identify which symbols need content work
SELECT id, symbol_urdu, LENGTH(detailed_interpretation_urdu) as content_len, seo_index
FROM dream_symbols 
WHERE seo_index = 1
AND LENGTH(COALESCE(detailed_interpretation_urdu, '')) < 500
ORDER BY search_count DESC
LIMIT 100;
-- Ye 100 most searched symbols hain jinhein foran unique content chahiye
```

**9. Lucky Number Frontend Block:**
```blade
{{-- resources/views/islamic-names/show.blade.php --}}
{{-- NEVER show these fields - unislamic --}}
{{-- DO NOT: $name->lucky_number, $name->lucky_color, $name->lucky_stone --}}
```

---

## PART 4 — UPDATED MASTER PROMPT FOR ANTIGRAVITY/CLAUDE

Ye prompt copy karke Antigravity ya Claude ko do jab bhi kaam karo:

---

```
SYSTEM CONTEXT — NoorIslam.com (islamicwebsite__18_.sql — July 2026)

Tum NoorIslam par kaam kar rahe ho — ek Pakistani Islamic content website.
Stack: Laravel (PHP 8.2) + Blade | MariaDB 10.4 | Filament Admin Panel
Domain: noorislam.com | Site Name: "Noor-e-Islam" | Email: info@noorislam.com

═══════════════════════════════════════
DATABASE — TABLE STATUS (v18)
═══════════════════════════════════════

FULLY SEO-READY TABLES:
✅ allah_names — slug, explanation, virtues, dhikr_reflection, dhikr_count, practical_lessons, quran_verse, seo via seo_metas (99 rows)
✅ duas — Arabic, Urdu, English, benefits, reference, seo via seo_metas (304 entries)
✅ dua_categories — seo_title, seo_description, parent_id (hierarchical), slug
✅ hadiths — arabic_text, english+urdu translation, grade, explanation, key_lessons(JSON), tags(JSON), keywords(JSON), seo via seo_metas (3,504 entries)
✅ islamic_names — seo_title, seo_description, faq(JSON), biography, famous_personalities, related_names(JSON), initial_letter, is_quranic, is_prophet_name, seo via seo_metas (13,622 entries)
✅ knowledge_articles — meta_title, meta_description, og_image, canonical_url, focus_keyword, schema_type (NEW in v18)
✅ wazaif — meta_title, meta_description, og_image, focus_keyword (NEW in v18), + benefits, reference, transliteration, authenticity_grade
✅ dream_symbols — seo_index, meta_title, meta_description, canonical_url, og_title, faqs(JSON), seo via seo_metas (5,618 entries), seo_index=0 means NOINDEX
✅ surahs — slug, meta_title, meta_description, meta_keywords (BUT arabic_text IS NULL — use ayahs table)
✅ ayahs — arabic_text, juz, page_number, surah_id (ACTUAL Quran text lives here)
✅ cities — slug, latitude, longitude, timezone, prayer_calc_method, meta_title, meta_description (25 cities — NEED MORE)
✅ city_prayer_contents — article_en, article_urdu, famous_mosques, islamic_history, eid_prayer_note
✅ historical_events — meta_title, meta_description, canonical_url, og_data(JSON), slug (NEW in v18)
✅ seo_metas — polymorphic SEO table, covers: IslamicName(13622), DreamSymbol(5618), Hadith(3504), Dua(304), Surah(289), Ayah(258), AllahName(99), Wazifa(97), City(25), DuaCategory(16), HadithCollection(12)...

PARTIAL / NEEDS ATTENTION:
⚠️ dream_symbols — seo_index field added but content still DUPLICATE (same template, noun swapped). Always check seo_index before indexing. seo_index=0 → noindex. NEVER index a page where detailed_interpretation_urdu < 300 chars.
⚠️ islamic_names — HAS lucky_number, lucky_color, lucky_stone fields in DB — NEVER display these in frontend (unislamic, credibility damage). Data is NULL but field exists.
⚠️ seo_metas — meta_description sometimes ends with "Auth..." (truncation bug). Always use substr($description, 0, 155) before saving.

TABLES WITHOUT SEO:
❌ knowledge_categories — no SEO fields (use article listing title pattern)
❌ dream_categories — has slug only (create dynamic meta from category name)

═══════════════════════════════════════
KEY CONTENT RULES
═══════════════════════════════════════

SURAHS:
- arabic_text in surahs table = NULL
- Real text: JOIN surahs with ayahs ON ayahs.surah_id = surahs.id
- Full text: $surah->ayahs->pluck('arabic_text')->implode(' ')
- English: JOIN translations_english ON ayah_id
- Urdu: JOIN translations_urdu ON ayah_id
- Never show empty surah page — always load from ayahs

DREAM SYMBOLS:
- seo_index = 0 → add <meta name="robots" content="noindex, follow">
- seo_index = 1 → add <meta name="robots" content="index, follow">
- If detailed_interpretation_urdu IS NULL or < 300 chars → treat as noindex regardless
- Canonical for noindex pages → point to parent category: /khwabon-ki-tabeer/{category_slug}
- Never create new dream_symbol pages without unique detailed_interpretation_urdu (min 400 words)
- short_interpretation and interpretation_urdu being same = duplicate content = SEO penalty

ISLAMIC NAMES:
- NEVER output: lucky_number, lucky_color, lucky_stone
- Always show: meaning_urdu, meaning_english, is_quranic, is_prophet_name, faq (JSON), famous_personalities
- SEO title pattern: "[Name] ka Matlab | Islamic Name [Name] | NoorIslam"
- Meta desc pattern: "[Name] ka matlab hai '[meaning_urdu]'. Quran ya Hadith mein [is_quranic hint]. NoorIslam pe complete Islamic meaning parhen."

DUAS:
- SEO from seo_metas table (polymorphic: App\Models\Dua)
- Meta description must NOT be same template for all duas
- Each dua should highlight its specific situation/benefit in meta desc
- Audio URL in dua: add AudioObject schema if audio_url is not null

HADITHS:
- key_lessons (JSON array) → use for FAQPage schema bullets
- grade/sahih_grade → always show prominently (credibility/E-E-A-T)
- narrator_id links to hadith_narrators table — use for Person schema
- keywords (JSON) → add as meta keywords AND use for internal linking

WAZAIF:
- meta_title, meta_description now exist (v18 NEW)
- authenticity_grade field → always display (Islamic credibility)
- scholar_verification → show if not null
- Default meta title if null: "[title_english] — Masnoon Wazifa | NoorIslam"

KNOWLEDGE ARTICLES:
- meta_title, meta_description, og_image, canonical_url, focus_keyword now exist (v18 NEW)
- schema_type field (default 'Article') → use for JSON-LD schema type
- author field → link to authors table for E-E-A-T schema

CITIES / PRAYER TIMES:
- Only 25 cities currently — many searches will 404
- prayer_calc_method '1' = University of Islamic Sciences, Karachi (default)
- city_prayer_contents has article_en + article_urdu — always load this for city pages
- Prayer time pages need daily lastmod in sitemap (times change)

═══════════════════════════════════════
SEO STANDARDS — MANDATORY
═══════════════════════════════════════

META TITLE FORMAT (50-60 chars):
- Surahs: "Surah [Name] — Arabic, Urdu Tarjuma | NoorIslam"
- Duas: "[Dua Short Name] — Masnoon Dua | NoorIslam"  
- Islamic Names: "[Name] ka Matlab — Islamic Name | NoorIslam"
- Dream Symbols: "[Symbol] Ki Tabeer — Islami Khwab | NoorIslam"
- Hadiths: "[Topic] Hadith — [Collection] [Number] | NoorIslam"
- Wazaif: "[Title_English] — Wazifa | NoorIslam"
- Knowledge Articles: "[Title] — Islamic Guide | NoorIslam"

META DESCRIPTION FORMAT (140-155 chars, UNIQUE per page, NO truncation):
- Must include primary keyword in first 60 chars
- Must include a value proposition (benefit/uniqueness)
- Must end cleanly — NO "Auth..." or "..." mid-sentence
- Urdu + English mixed is OK for Pakistani audience

CANONICAL URLS:
- Always set via seo_metas.canonical_url OR inline meta
- Dream symbols with seo_index=0: canonical → parent category
- Paginated pages: canonical → page 1

ROBOTS META:
- dream_symbols where seo_index=0: <meta name="robots" content="noindex, follow">
- All other published content: <meta name="robots" content="index, follow">
- Admin pages: <meta name="robots" content="noindex, nofollow">

SCHEMA REQUIRED ON EVERY PAGE:
1. BreadcrumbList — minimum 2 levels
2. WebSite + SearchAction on homepage only
3. FAQPage — where faq JSON field exists and is not null
4. Article — knowledge_articles, historical_events
5. HowTo — namaz_guides, hajj_guides (use steps tables)
6. AudioObject — duas with audio_url

INTERNAL LINKING:
- Every Surah page → related Duas, related Hadiths (surah_wazifa, hadith_surah tables)
- Every Dua page → related Wazaif (dua_wazifa table), related Hadiths
- Every Dream Symbol → related symbols (related_dream_symbols table), parent category
- Every Hadith → related Hadiths (hadith_related table), related Duas
- Every Islamic Name → related names (related_names JSON field)

SITEMAP (when generating):
- Include: surahs (priority 0.9), duas (0.8), islamic_names (0.8), hadiths (0.7), wazaif (0.7), knowledge_articles (0.8), cities (0.9, daily), dream_symbols WHERE seo_index=1 (0.6)
- EXCLUDE: dream_symbols WHERE seo_index=0, admin pages, cache URLs, paginated pages except page 1

═══════════════════════════════════════
MULTILINGUAL RULES
═══════════════════════════════════════

The site serves:
- Urdu (primary) — ur locale
- Roman Urdu (same audience, typed differently) — no separate locale, same page
- English (secondary) — en locale, diaspora audience

hreflang (add to every page head):
<link rel="alternate" hreflang="ur" href="{{ url()->current() }}" />
<link rel="alternate" hreflang="en" href="{{ str_replace('/ur/', '/en/', url()->current()) }}" />
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />

═══════════════════════════════════════
LARAVEL CONVENTIONS
═══════════════════════════════════════

Models: App\Models\[Name]
Key models: AllahName, Surah, Ayah, TranslationEnglish, TranslationUrdu, Dua, DuaCategory, Wazifa, DreamSymbol, DreamCategory, IslamicName, Hadith, HadithCollection, City, KnowledgeArticle, HistoricalEvent, HajjGuide, NamazGuide
Routes: routes/web.php
Views: resources/views/[module]/[view].blade.php
Controllers: App\Http\Controllers\[Module]Controller
Filament Admin: App\Filament\Resources\[Name]Resource
SEO polymorphic: $model->seoMeta relationship (App\Models\SeoMeta, metaable_type + metaable_id)

Surah text query pattern:
$surah = Surah::with([
    'ayahs',
    'ayahs.translationEnglish',
    'ayahs.translationUrdu',
    'seoMeta',
    'faqs',
    'contentBlocks',
    'themes'
])->where('slug', $slug)->firstOrFail();

Dream symbol noindex check:
$robotsContent = ($symbol->seo_index == 0 || strlen($symbol->detailed_interpretation_urdu ?? '') < 300) 
    ? 'noindex, follow' 
    : 'index, follow';

═══════════════════════════════════════
ABHI KYA FIX KARNA HAI (Priority Order)
═══════════════════════════════════════

1. [CRITICAL] Dream symbol noindex → Blade template mein robots meta add karo
2. [CRITICAL] Surah pages → ayahs table se content load karo (arabic_text NULL hai)
3. [HIGH] Meta description truncation "Auth..." → substr fix in seeders/commands
4. [HIGH] Schema markup → BreadcrumbList + FAQPage sab pages pe
5. [HIGH] hreflang → layouts/app.blade.php mein add karo
6. [MEDIUM] Cities expand → Pakistan ke 100+ cities add karo
7. [MEDIUM] Sitemap → strategic XML sitemap controller
8. [LOW] lucky_number → frontend se completely block karo
9. [LOW] Dream symbol content quality → top 100 high-traffic symbols ke liye unique content
```

---

## PART 5 — QUICK REFERENCE: What Changed in v18

```
ADDED IN v18:
+ knowledge_articles: meta_title, meta_description, og_image, canonical_url, focus_keyword, schema_type
+ wazaif: meta_title, meta_description, og_image, focus_keyword  
+ dream_symbols: seo_index field
+ historical_events: meta_title, meta_description, canonical_url, og_data, twitter_data
+ seo_metas: now covers 23,586 rows across 20+ model types (was only 500+ Duas)
+ 3 new cities added (total 25)

STILL NOT FIXED:
- Surah arabic_text = NULL (no change)
- Dream symbol duplicate content (noindex field added but logic not in Blade)
- Meta descriptions truncated "Auth..."
- Schema markup = 0 (schema_override_json all NULL)
- hreflang = 0 evidence
- Cities = 25 (need 900+)
- lucky_number still in schema (data NULL but field active)
```

---

*Analysis: islamicwebsite__18_.sql vs __17_.sql + GitHub: noormuhammad2k20-a11y/islamicweb | July 2026*
