# 🕌 NoorIslam (noorislam.com) — Complete SEO Analysis & Master Prompt
**Website:** noorislam.com | **Tech Stack:** Laravel (PHP) + Blade | **DB:** MariaDB  
**Analysis Date:** July 2026 | **Analyst:** Based on full DB dump + GitHub repo review

---

## 📋 TABLE OF CONTENTS
1. [Website Overview & Content Inventory](#1-website-overview--content-inventory)
2. [Critical SEO Problems — Priority 1 (Fix Immediately)](#2-critical-seo-problems--priority-1-fix-immediately)
3. [High Impact Issues — Priority 2](#3-high-impact-issues--priority-2)
4. [Medium Issues — Priority 3](#4-medium-issues--priority-3)
5. [Opportunities & Growth Strategies](#5-opportunities--growth-strategies)
6. [Technical SEO Checklist](#6-technical-seo-checklist)
7. [Content Strategy by Module](#7-content-strategy-by-module)
8. [Structured Data (Schema) Roadmap](#8-structured-data-schema-roadmap)
9. [Keyword Strategy](#9-keyword-strategy)
10. [Master Prompt for Claude/AI Development](#10-master-prompt-for-claudeai-development)

---

## 1. Website Overview & Content Inventory

NoorIslam is a Laravel-based Islamic content website targeting Urdu, English, and Roman Urdu speakers — primarily Pakistani audience. The database contains the following content modules:

| Module | Table | Status |
|---|---|---|
| Asma ul Husna (99 Names) | `allah_names` | ✅ Rich content, slugs, SEO fields |
| Quran Surahs | `surahs` | ⚠️ Meta present, Arabic text is NULL |
| Ayahs | `ayahs` | ✅ Arabic text populated |
| Translations | `translations_english`, `translations_urdu` | ✅ Present |
| Duas | `duas` + `dua_categories` | ✅ Has SEO meta via `seo_metas` table |
| Wazaif | `wazaif` + `wazifa_categories` | ⚠️ No SEO meta fields |
| Hadiths | `hadiths` | ✅ Rich fields, keywords, tags |
| Dream Symbols (Khwab Tabeer) | `dream_symbols` | 🔴 SEVERE duplicate content |
| Islamic Names | `islamic_names` | ✅ Has seo_title, seo_description |
| Prayer Times | `prayer_times` + `cities` | ✅ Per-city content |
| City Islamic Content | `city_islamic_content` | ✅ Meta title/desc per city |
| Knowledge Articles | `knowledge_articles` | 🔴 NO SEO meta fields at all |
| Historical Events | `historical_events` | ⚠️ Has slug, partial SEO |
| Hajj Guides | `hajj_guides` + `hajj_steps` | ✅ Present |
| Namaz Guides | `namaz_guides` + `namaz_steps` | ✅ Present |
| Islamic Events | `islamic_events` | ✅ Has content |
| Dream Categories | `dream_categories` | ✅ Has slug |
| Scholars | `scholars` | Present |
| Daily/Weekly Quizzes | `daily_quizzes`, `weekly_quizzes` | Interactive feature |
| SEO Meta (Polymorphic) | `seo_metas` | ⚠️ Only covers Duas, inconsistent |

**Total pages estimate: 50,000+ URLs** (Surahs 114 × Ayahs 6236 + Dream symbols 24,000+ + Islamic Names + Cities + Duas + Hadiths)

---

## 2. Critical SEO Problems — Priority 1 (Fix Immediately)

### 🔴 PROBLEM 1: Massive Thin/Duplicate Content in Dream Symbols

**Severity: CRITICAL — Google Penalty Risk**

The `dream_symbols` table contains 24,000+ records. Analysis reveals a dangerous pattern:

**Example duplicates found:**
- "Khwab Mein Kala Saanp Dekhna" → `short_interpretation`: "Khwab mein Kala Saanp Dekhna dekhna islami tabeer ke mutabiq ek khabardar karne wala ishara hai. Khwab mein Saanp dekhna aam tor par kisi pareshani, dushman, ya aazmaish ki alamat ho sakti hai."
- "Khwab Mein Kala Saanp Kaatna" → SAME template, only noun swapped
- "Khwab Mein Kala Saanp Piche Bhagna" → SAME template
- "Khwab Mein Kala Saanp Ghar Mein Dekhna" → SAME template

This means **thousands of pages share near-identical content** with only the keyword swapped. Google classifies this as "doorway pages" or "thin content" — a direct cause of algorithmic penalties (Panda/Helpful Content Update).

**Fixes Required:**
1. Add `canonical_url` tags on all near-duplicate dream symbol pages pointing to the parent category or primary symbol.
2. Add `noindex` meta tag to derivative/thin dream symbol pages (e.g., "Kala Saanp Kaatna", "Kala Saanp Piche Bhagna") and keep only the richest page indexed.
3. Implement `dream_categories` as hub pages with unique, comprehensive content, and make sub-symbols variations within the hub page (not separate URLs).
4. For top 500 dream symbols: rewrite `detailed_interpretation_urdu` and `detailed_interpretation_english` with truly unique, scholar-referenced content — minimum 400 words each.
5. Add `robots.txt` disallow for low-value generated dream symbol URLs or use `?variant` pattern with canonical.

**Database Fix:**
```sql
-- Flag thin content dream symbols for noindex
ALTER TABLE dream_symbols ADD COLUMN seo_index TINYINT(1) DEFAULT 1;
UPDATE dream_symbols 
SET seo_index = 0 
WHERE LENGTH(detailed_interpretation_urdu) < 500 
   OR detailed_interpretation_urdu IS NULL;
```

---

### 🔴 PROBLEM 2: Surah Pages Have NULL Arabic/Urdu/English Text

**Severity: CRITICAL — Empty Pages**

```sql
-- Evidence from DB:
(1, 1, NULL, NULL, NULL, NULL, NULL, '2026-07-05', ...) -- Al-Faatiha has NO text!
(2, 2, NULL, NULL, NULL, NULL, NULL, '2026-07-05', ...) -- Al-Baqara has NO text!
```

The `surahs` table has `arabic_text`, `urdu_translation`, `english_translation` — ALL NULL. Ayahs are in a separate `ayahs` table, but surah-level rich text for the page is empty.

**Problem:** Surah pages rank for competitive keywords ("Surah Yaseen", "Surah Al-Baqara") but serve as shell pages. Page views confirm "surah/yaseen" gets traffic (13 views on one day) but zero content to satisfy it.

**Fixes Required:**
1. Populate `surahs.arabic_text` with compiled full surah text from `ayahs` table.
2. Add `surah_content_blocks` content to surah pages (table exists — use it).
3. Each surah page needs: tafsir summary, virtues (fazilat), when to recite, key lessons, related hadiths.
4. Add Schema markup: `Article` + `WebPage` with `about` pointing to Quran chapter.

---

### 🔴 PROBLEM 3: knowledge_articles Table Has ZERO SEO Fields

**Severity: CRITICAL — Unoptimized Content**

```sql
CREATE TABLE `knowledge_articles` (
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  -- NO meta_title, NO meta_description, NO og_image, NO canonical_url
)
```

Articles are the most valuable SEO asset (long-form content) yet they have no SEO meta fields at all.

**Fix Immediately:**
```sql
ALTER TABLE knowledge_articles 
ADD COLUMN meta_title VARCHAR(255) NULL AFTER title,
ADD COLUMN meta_description TEXT NULL AFTER meta_title,
ADD COLUMN og_image VARCHAR(255) NULL,
ADD COLUMN canonical_url VARCHAR(255) NULL,
ADD COLUMN focus_keyword VARCHAR(255) NULL,
ADD COLUMN schema_type VARCHAR(100) DEFAULT 'Article';
```

---

### 🔴 PROBLEM 4: seo_metas Table is Incomplete & Inconsistent

**Severity: HIGH — SEO Chaos**

The `seo_metas` table is a polymorphic table (metaable_type + metaable_id) used for Duas only. Other content types (Wazaif, Islamic Names, Hadiths, Knowledge Articles, Dream Categories) either use inline SEO fields or have nothing.

This creates 3 competing SEO systems:
- System A: `seo_metas` polymorphic table (only Duas)
- System B: Inline fields (`seo_title`, `seo_description`) in each table (Islamic Names, Dream Symbols, Dua Categories)
- System C: No SEO at all (Knowledge Articles, Wazaif, Historical Events)

**Fix:** Standardize to ONE system. Recommendation: use inline fields on every table (easier for Filament admin panel). Migrate `seo_metas` data into each table's own SEO columns.

---

### 🔴 PROBLEM 5: Wazaif Table Has NO SEO Meta Fields

**Severity: HIGH**

`wazaif` table has `slug` but NO `meta_title`, `meta_description`, `og_image`, or `canonical_url`. With 165+ wazaif pages, these are all running with auto-generated or empty meta tags.

**Fix:**
```sql
ALTER TABLE wazaif 
ADD COLUMN meta_title VARCHAR(255) NULL,
ADD COLUMN meta_description TEXT NULL,
ADD COLUMN og_image VARCHAR(255) NULL,
ADD COLUMN focus_keyword VARCHAR(150) NULL;
```

---

## 3. High Impact Issues — Priority 2

### ⚠️ ISSUE 1: Meta Descriptions are Templated & Repetitive

**Evidence from seo_metas:**
- "NoorIslam par - [Urdu Name] Arabic, Urdu tarjuma aur Roman Urdu mein parhen. Complete benefits aur hadith references ke sath."

This exact sentence pattern repeats across ALL dua entries, only the name changes. Google shows meta descriptions in SERPs — if all your 500+ dua pages show the same description, click-through rate (CTR) will be near zero.

**Fix:** Write unique meta descriptions that include:
- The specific benefit of the dua (e.g., "Sayyidul Istighfar parh kar gunaho ki muafi maango — complete Arabic text, Urdu tarjuma, aur hadith reference ke sath")
- Primary keyword in first 60 characters
- A call to action (parhen, seekhen, download karen)
- Length: 140–160 characters

---

### ⚠️ ISSUE 2: Meta Titles Follow Generic Pattern for Surahs

**Evidence:**
- "Surah Al-Faatiha - Arabic, Urdu & English"
- "Surah Al-Baqara - Arabic, Urdu & English"
- "Surah Aal-i-Imraan - Arabic, Urdu & English"

Same formula: "Surah [Name] - Arabic, Urdu & English". No differentiation. Competitors with better titles will outrank.

**Better Formula Examples:**
- "Surah Al-Faatiha — Read Arabic Text, Urdu & English Translation | NoorIslam" (for common surahs)
- "Surah Yaseen PDF | Arabic Text, Urdu Tarjuma, Fazilat | NoorIslam" (for high-traffic surahs)
- "Ayatul Kursi — Complete Arabic, Transliteration, Urdu, English | NoorIslam"

---

### ⚠️ ISSUE 3: No hreflang Tags for Multilingual Content

The site serves Urdu (`ur`), Roman Urdu (no ISO code), and English content — often on the same page. Without `hreflang` tags, Google doesn't know which language version to show which user.

**Fix in `<head>` of every page:**
```html
<link rel="alternate" hreflang="ur" href="https://noorislam.com/ur/surah/yaseen" />
<link rel="alternate" hreflang="en" href="https://noorislam.com/en/surah/yaseen" />
<link rel="alternate" hreflang="x-default" href="https://noorislam.com/surah/yaseen" />
```

Or if language is on same URL: use `Content-Language` HTTP header per page type.

---

### ⚠️ ISSUE 4: Prayer Times Pages — Missed Local SEO Opportunity

**Current cities table:** Only 22 cities. Pakistan alone has 100+ major cities with prayer time searches.

**What's missing:**
- No `robots_meta` or `sitemap_priority` per city
- `prayer_page_contents` table exists but unclear if cities without entries get generic pages
- No FAQ Schema for prayer time pages ("What time is Fajr in Karachi today?")
- No `dateModified` schema (prayer times change daily — must signal freshness to Google)

**Opportunity:** Prayer time searches are HIGH VOLUME, LOW COMPETITION for local city + "namaz time" queries. Every Pakistani city is a separate keyword cluster.

**Fix:**
1. Add 500+ Pakistani cities to `cities` table
2. Add FAQ Schema per city: "Karachi mein aaj Fajr ka waqt kya hai?"
3. Add `lastmod` to sitemap for prayer pages (changes daily)
4. City pages should have `LocalBusiness` or `EventSchedule` schema

---

### ⚠️ ISSUE 5: No robots.txt or sitemap.xml Strategy Visible

From the DB, there's no `sitemap_config` table or sitemap-related settings. A website with 50,000+ URLs needs a strategic sitemap plan.

**Required sitemap structure:**
```
sitemap_index.xml
├── sitemap_surahs.xml (114 URLs, priority 0.9)
├── sitemap_duas.xml (~500 URLs, priority 0.8)
├── sitemap_dream_symbols.xml (indexed only, ~2000 URLs, priority 0.6)
├── sitemap_islamic_names.xml (priority 0.7)
├── sitemap_hadiths.xml (priority 0.7)
├── sitemap_wazaif.xml (priority 0.7)
├── sitemap_cities.xml (prayer times, priority 0.9, daily changefreq)
├── sitemap_knowledge_articles.xml (priority 0.8)
└── sitemap_historical_events.xml (priority 0.5)
```

**Exclude from sitemap:**
- All `noindex` dream symbols
- Admin/cache URLs
- Duplicate/thin content URLs

---

### ⚠️ ISSUE 6: islamic_names Table — Lucky Numbers, Lucky Colors are Unislamic

**SEO + Credibility Risk:**

The `islamic_names` table has fields: `lucky_number`, `lucky_color`, `lucky_stone`. These are numerology/astrology concepts that are considered against Islamic teachings. If the site is presenting itself as an authentic Islamic resource, displaying lucky numbers will:
1. Damage credibility among religious users
2. Create negative brand signals for "Islamic authenticity" searches
3. Could cause Google's Quality Rater to flag as misleading (YMYL content)

**Fix:** Either remove these fields from public display (keep in DB for legacy data), or replace with: `numerological_note: "Lucky numbers are not endorsed in Islam — this is for informational reference only."` Better yet: delete these from the frontend entirely and redirect focus to Islamic significance content.

---

## 4. Medium Issues — Priority 3

### 📌 ISSUE 1: OG Images Use Predictable Naming Pattern (SEO + CTR Impact)

**Evidence:**
```
https://noorislam.com/images/duas/og-sayyidul-istighfar-morning.jpg
https://noorislam.com/images/duas/og-o-allah-by-you-we.jpg
```

OG images likely exist but need to be:
- 1200×630px minimum
- Include Arabic calligraphy + dua name for visual branding
- Include NoorIslam logo (brand recognition in social shares)
- Auto-generated server-side for new content (use Laravel Imagick or a service)

### 📌 ISSUE 2: Hadiths Table Has Good Fields But Needs FAQ Schema

The `hadiths` table has `key_lessons` (JSON), `keywords` (JSON), `explanation`, `practical_applications` — excellent content depth. However, to rank for "hadith about [topic]" queries, each hadith page needs:
- FAQ Schema using the `key_lessons` JSON
- `HowTo` or `Article` schema
- Breadcrumb schema: Home → Hadiths → [Collection] → [Hadith]

### 📌 ISSUE 3: No Internal Linking Strategy in DB

Tables have `related_dream_symbols`, `related_hadiths`, `dua_related_dua`, `surah_related_surahs` — but these are sparsely populated. Internal links pass PageRank between pages and help Google understand site structure.

**Fix:** Populate all `related_*` junction tables with at least 3-5 related items per record. Use topical proximity (e.g., all Dua about sleep link to each other, all Surahs about forgiveness link to each other).

### 📌 ISSUE 4: URL Slugs — Some Problematic Patterns

**Dream symbols example:**
- Slug: would be `/khwab-mein-kala-saanp-dekhna`
- Better practice for Urdu Roman content: ensure slugs are lowercase, hyphenated, no Urdu script in URL

**Check:** `slug` field should NEVER contain:
- Urdu/Arabic script characters (server encoding issues)
- Uppercase letters
- Spaces or underscores
- Special characters

### 📌 ISSUE 5: No Canonical Tags on Paginated Content

If surahs, duas, or dream symbols are listed on paginated pages (`?page=2`), there must be `rel="canonical"` tags pointing to the first page, or proper `rel="next"`/`rel="prev"` (though Google dropped next/prev, canonical still matters).

### 📌 ISSUE 6: knowledge_articles Has No Author SEO (E-E-A-T)

For YMYL (Your Money/Your Life) content — and Islamic guidance is YMYL — Google's Quality Raters check for:
- Author expertise (E-E-A-T: Experience, Expertise, Authoritativeness, Trustworthiness)
- Scholar references
- Source citations

The `knowledge_articles` table has an `author` field but it's just a varchar. The `authors` table exists separately but is likely not linked.

**Fix:** Join `knowledge_articles` with `authors` table. Display author bio, scholarly credentials, and use `Person` schema for the author on every article page.

---

## 5. Opportunities & Growth Strategies

### 🚀 OPPORTUNITY 1: Islamic Dream Interpretation (Khwab Tabeer) — HIGHEST TRAFFIC POTENTIAL

Despite the duplicate content problem, this niche has enormous search volume in Urdu:
- "khwab mein saanp dekhna" — very high volume
- "khwab mein pani dekhna" — very high volume
- "khwab tabeer" — brand query

**Strategy:** Consolidate 24,000 thin dream symbol pages into ~2,000 rich, unique, scholar-referenced hub pages. Each hub covers one dream symbol (e.g., "Saanp") with ALL its variations (seeing, biting, chasing, killing) on ONE page with sections. Use anchor links within the page. This reduces URL count but massively increases content quality per page.

### 🚀 OPPORTUNITY 2: Prayer Times — City-Specific SEO in Pakistan

**Current:** 22 cities in DB  
**Opportunity:** Pakistan has 900+ tehsils. Every person searches "[city name] namaz time" or "[city name] prayer times today".

**Strategy:**
1. Add all 900+ Pakistani cities with lat/long
2. Auto-generate prayer times using calculation API
3. Create unique, humanly-written city articles in `city_prayer_contents` (already has `article_urdu` field — USE IT)
4. Ramadan-specific prayer time pages (sehri/iftar times) — very high seasonal traffic

### 🚀 OPPORTUNITY 3: Islamic Names — Underserved Long-Tail Keywords

"[Name] ka matlab" (meaning of name in Urdu) is a massive search category. `islamic_names` table has excellent fields: `detailed_meaning`, `seo_title`, `seo_description`, `faq`, `biography`, `famous_personalities`.

**Strategy:**
1. Every name page should target "[name] ka matlab in Urdu", "[name] name meaning", "[name] Islamic meaning"
2. FAQ Schema from `faq` JSON field
3. Add "Names Starting with [Letter]" hub pages using `initial_letter` field
4. Add "Baby Names for Boys/Girls" category landing pages

### 🚀 OPPORTUNITY 4: Ramadan Content Hub

Tables: `ramadan_sections`, `ramadan_timings`, `hijri_months`, `islamic_events`

Ramadan is the single biggest Islamic search spike globally. A dedicated Ramadan hub with:
- Ramadan 2027 prayer times (start ranking early)
- Sehri/Iftar duas
- Tarawih guides
- Laylatul Qadr content
- Ramadan Hadith series

This can generate 10x normal traffic in March-April annually.

### 🚀 OPPORTUNITY 5: Schema-Rich Hajj & Umrah Guide

`hajj_guides` + `hajj_steps` tables exist. Hajj/Umrah guide content with:
- `HowTo` Schema (step by step)
- FAQ Schema
- Map embeds for locations (Mina, Arafat, Muzdalifah)

This targets "how to perform hajj step by step" — evergreen, high-intent queries.

### 🚀 OPPORTUNITY 6: Daily Islamic Content for Return Visitors & Search Freshness

Tables: `daily_quizzes`, `weekly_quizzes`, `historical_events` (by Hijri date), `moon_phases`

Use these for:
- "Islamic event today" — today's Islamic calendar content
- Daily hadith widget (indexed by search engines as fresh content)
- Daily quiz page (gamification + return visits)

---

## 6. Technical SEO Checklist

| Item | Status | Action Required |
|---|---|---|
| SSL/HTTPS | Assumed OK (noorislam.com) | Verify |
| Mobile responsiveness | Blade templates — check | Test on mobile |
| Core Web Vitals (LCP, CLS, FID) | Unknown | Run PageSpeed Insights |
| Arabic text rendering | `utf8mb4` charset ✅ | Test RTL rendering |
| Canonical tags | Partial (seo_metas has canonical_url) | Implement sitewide |
| Meta robots | Not visible in DB | Add `<meta name="robots">` |
| Structured data/Schema | Mostly absent | Implement per section |
| XML Sitemap | Not in DB | Create strategic sitemap |
| robots.txt | Not in DB | Create with proper disallows |
| 301 Redirects | `old_english_slug` in dream_symbols ✅ | Ensure redirects work |
| Image alt text | Unknown | Add alt text to all images |
| Page speed | Laravel without caching = slow | Enable Laravel cache, CDN |
| Breadcrumbs | No evidence in DB | Add BreadcrumbList schema |
| Internal linking | Sparse `related_*` tables | Populate junction tables |
| hreflang | Not in DB | Add for ur/en |
| 404 pages | Default Laravel | Custom Islamic 404 |
| Pagination | Unknown | Add canonical/rel="next" |

---

## 7. Content Strategy by Module

### Quran Module
- Each Surah page: 1,500+ words covering tafsir summary, key ayahs, themes, virtues, how/when to recite
- Ayah-level pages for famous ayahs: Ayatul Kursi, Surah Yaseen verse 9, etc.
- Inter-link: Surah → Related Hadiths → Related Duas → Related Dream Symbols

### Dua Module (Currently Best SEO)
- `seo_metas` is populated — this is the most complete module
- Improvement: Add FAQ Schema per dua (common questions about the dua)
- Add audio player SEO (`AudioObject` schema for `audio_url` field)
- Create Dua category hub pages with unique introductory content

### Dream Symbols Module (Currently Worst SEO)
- Consolidate thin pages → hub pages
- Minimum 600 words per unique dream symbol
- Add scholar attribution: use `scholar_reference` field prominently
- Add FAQ Schema: "Is it good to dream about X?" / "What does X mean in Islam?"

### Islamic Names Module
- Good foundation (has `seo_title`, `seo_description`, `faq`)
- Add `Person` schema for famous historical bearers of the name
- Add "Compare Names" feature for user engagement (reduces bounce rate)
- Featured snippets target: "What does [name] mean?" → Answer box format

### Hadiths Module
- Rich fields (`explanation`, `practical_applications`, `key_lessons`) — use them all
- `HadithCollection` isn't a standard schema but use `Article` + `Person` (for narrator)
- Create topic cluster pages: "Hadiths about Forgiveness", "Hadiths about Patience"

### Knowledge Articles Module
- Add SEO meta fields (migration required)
- Minimum article length: 800 words for core topics
- Add author schema
- Link articles to relevant Duas, Hadiths, Surahs internally

---

## 8. Structured Data (Schema) Roadmap

### Priority 1 Schemas (Implement First)

**BreadcrumbList — Every Page:**
```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type": "ListItem", "position": 1, "name": "Home", "item": "https://noorislam.com"},
    {"@type": "ListItem", "position": 2, "name": "Duas", "item": "https://noorislam.com/duas"},
    {"@type": "ListItem", "position": 3, "name": "Sayyidul Istighfar", "item": "https://noorislam.com/dua/sayyidul-istighfar-morning"}
  ]
}
```

**FAQPage — Islamic Names, Duas, Dream Symbols:**
```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Ahmad ka matlab kya hai?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Ahmad ka matlab 'bahut tarif kiya gaya' hai..."
    }
  }]
}
```

**Article — Knowledge Articles, Historical Events:**
```json
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "...",
  "author": {"@type": "Person", "name": "..."},
  "datePublished": "...",
  "dateModified": "..."
}
```

### Priority 2 Schemas

**HowTo — Namaz Guides, Hajj Steps:**
Use `namaz_steps` and `hajj_steps` tables to populate step-by-step HowTo schema.

**Event — Islamic Events, Ramadan:**
Use `islamic_events` and `islamic_year_events` tables for Event schema.

**WebSite + SearchAction — Homepage:**
```json
{
  "@type": "WebSite",
  "url": "https://noorislam.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://noorislam.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
```

---

## 9. Keyword Strategy

### Tier 1 — High Volume, High Competition (Long-term targets)
- Surah Yaseen
- Namaz time Karachi / Lahore / Islamabad
- Ayatul Kursi
- Islamic names for boys/girls
- Khwab tabeer

### Tier 2 — Medium Volume, Medium Competition (3-6 month targets)
- [City name] namaz time (all 900 Pakistani cities)
- [Islamic name] ka matlab in Urdu
- Khwab mein [specific symbol] dekhna
- Asma ul Husna benefits
- [Hadith topic] hadith in Urdu
- Dua for [specific situation]

### Tier 3 — Low Volume, Low Competition (Quick wins — target immediately)
- Wazifa for [specific need] in Urdu
- [Specific dua name] in Arabic and Urdu
- Islamic history [specific event]
- Hajj steps in Urdu
- Namaz guide for beginners in Urdu

### Language Targeting
- **Primary:** Urdu (ur) — largest audience, Urdu keywords
- **Secondary:** Roman Urdu — same audience, typed in Roman script
- **Tertiary:** English (en) — diaspora audience, international Muslims
- **Avoid:** Arabic UI without proper hreflang (causes confusion)

---

## 10. Master Prompt for Claude/AI Development

Use this prompt when working with Claude or any AI assistant on this project:

---

```
SYSTEM CONTEXT — NoorIslam Website (noorislam.com)

You are working on NoorIslam, a Pakistani Islamic content website built with Laravel (PHP) + Blade templates. The database is MariaDB with utf8mb4 charset. The site targets Urdu, Roman Urdu, and English-speaking Muslim audiences primarily in Pakistan.

TECH STACK:
- Backend: Laravel 10+ (PHP 8.2)
- Frontend: Blade templates + HTML/CSS
- DB: MariaDB 10.4 (locally at 127.0.0.1:3307)
- Admin Panel: Filament (PHP admin)
- Package Manager: Composer (PHP) + npm (JS)

CONTENT MODULES (DB Tables):
- allah_names: 99 Names of Allah with Arabic, transliteration, meaning_en/ur, explanation, virtues, slug, dhikr_count
- surahs: 114 Quran chapters — has slug, meta_title, meta_description, meta_keywords — BUT arabic_text is NULL (text comes from ayahs table)
- ayahs: Individual Quran verses with arabic_text, juz, page_number, surah_id
- translations_english / translations_urdu: Translation text per ayah
- duas: Islamic supplications with Arabic, Urdu, English, benefits, reference — SEO via polymorphic seo_metas table
- dua_categories: Has seo_title, seo_description, parent_id (hierarchical)
- wazaif: Islamic wazaif/adhkar — has slug, benefits, reference — NO SEO meta fields (needs migration)
- dream_symbols: 24,000+ Khwab Tabeer entries — HAS SEVERE THIN CONTENT PROBLEM (thousands of near-duplicate pages differing only by keyword — needs noindex or consolidation)
- dream_categories: Hierarchical dream categories with slug
- islamic_names: Baby/Islamic names with gender, meaning_en/ur, seo_title, seo_description, faq (JSON), lucky_number (DO NOT display — unislamic), initial_letter, is_quranic, is_prophet_name
- hadiths: Rich hadith data with arabic_text, english_translation, urdu_translation, grade, explanation, key_lessons (JSON), tags (JSON), keywords (JSON)
- hadith_collections / hadith_books / hadith_chapters: Organizational structure
- cities: 22 cities with lat/long, timezone, prayer_calc_method, meta_title, meta_description
- city_prayer_contents: Unique articles per city about prayer (article_en, article_urdu)
- prayer_times: Calculated prayer times per city
- knowledge_articles: Long-form articles — NO SEO meta fields (critical missing — needs migration)
- knowledge_categories: Article categories
- historical_events: Islamic historical events with hijri_day, hijri_month, slug, description
- islamic_events / islamic_year_events: Annual Islamic calendar events
- hajj_guides / hajj_steps: Hajj/Umrah step-by-step content
- namaz_guides / namaz_steps: Prayer guide step-by-step
- seo_metas: Polymorphic SEO table (only used for Duas currently) — fields: title, meta_description, canonical_url, og_image, schema_override_json
- site_settings: Key-value store — site_name="Noor-e-Islam", contact_email="info@noorislam.com"
- scholars / authors: Author/scholar profiles (E-E-A-T support)
- page_views: URL-level view counter (page_url, views, date)
- surah_faqs / surah_content_blocks / surah_themes: Rich Surah supporting content
- ramadan_sections / ramadan_timings: Ramadan-specific content
- hijri_months / moon_phases: Islamic calendar support

KEY SEO PROBLEMS TO ALWAYS KEEP IN MIND:
1. dream_symbols has ~24,000 thin/duplicate pages — always add noindex or canonical when generating these pages
2. knowledge_articles has NO meta_title or meta_description — always reference the migration needed
3. surahs.arabic_text is NULL — content comes from joining ayahs + translations tables
4. wazaif has NO SEO meta — default to slug-based titles until migration
5. islamic_names has lucky_number/lucky_color — NEVER display these (unislamic, credibility damage)
6. seo_metas only covers Duas — other modules use inline seo_title/seo_description or nothing

SEO STANDARDS FOR THIS PROJECT:
- Meta title: 50-60 chars, include primary keyword + "NoorIslam" brand
- Meta description: 140-160 chars, unique per page, include CTA in Urdu or English
- Canonical URLs: Always set, especially for paginated and multi-language pages
- Language: Pages serve ur + en content — need hreflang tags
- Schema: BreadcrumbList on all pages, FAQPage on Names/Duas/Dream Symbols, Article on knowledge_articles, HowTo on hajj/namaz guides
- Slugs: Always lowercase, hyphenated English/Roman Urdu, no Urdu script in URL
- OG Images: 1200x630px, stored at /images/[module]/og-[slug].jpg
- noindex: Add to all dream_symbols where detailed_interpretation_urdu LENGTH < 500 chars or IS NULL
- Internal links: Always suggest linking related content (Dua ↔ Surah ↔ Hadith ↔ Dream Symbol)

AUDIENCE:
- Primary: Pakistani Muslims, Urdu speakers, mobile-first
- Secondary: Pakistani diaspora (UK, UAE, US, Canada) — English + Urdu
- Age: 18-50, religious practice-oriented
- Devices: 80%+ mobile (optimize for mobile-first)
- Search behavior: Searches in Urdu script + Roman Urdu + English queries

BUSINESS GOALS:
- Rank for prayer times in 900+ Pakistani cities
- Rank for Islamic dream interpretation (khwab tabeer) in Urdu
- Rank for Islamic baby names in Urdu
- Rank for Quran surahs, duas, and hadiths
- Build authority as the #1 Islamic reference in Urdu

LARAVEL CONVENTIONS:
- Models: App\Models\[ModelName]
- Routes: In routes/web.php
- Views: resources/views/[module]/[view].blade.php
- Controllers: App\Http\Controllers\[Module]Controller
- Migrations: database/migrations/
- Filament admin resources: App\Filament\Resources\

When writing any code, migration, blade template, or controller method for this project, always:
1. Consider the SEO impact (add meta tags, canonical, schema where needed)
2. Handle null arabic_text in surahs gracefully (join with ayahs)
3. Add noindex for thin dream_symbol pages
4. Include breadcrumb data for schema
5. Use utf8mb4 for any new tables/columns
6. Reference `seo_metas` polymorphically for Duas, inline fields for other modules
7. Never display lucky_number, lucky_color, lucky_stone from islamic_names
```

---

## Quick Reference: Most Urgent Database Migrations

```sql
-- 1. Add SEO fields to knowledge_articles
ALTER TABLE knowledge_articles 
ADD COLUMN meta_title VARCHAR(255) NULL AFTER title,
ADD COLUMN meta_description TEXT NULL AFTER meta_title,
ADD COLUMN og_image VARCHAR(255) NULL,
ADD COLUMN canonical_url VARCHAR(255) NULL,
ADD COLUMN focus_keyword VARCHAR(150) NULL;

-- 2. Add SEO fields to wazaif
ALTER TABLE wazaif 
ADD COLUMN meta_title VARCHAR(255) NULL,
ADD COLUMN meta_description TEXT NULL,
ADD COLUMN og_image VARCHAR(255) NULL;

-- 3. Add noindex control to dream_symbols
ALTER TABLE dream_symbols 
ADD COLUMN seo_index TINYINT(1) DEFAULT 1 COMMENT '0=noindex, 1=index';

-- 4. Mark thin dream symbols as noindex
UPDATE dream_symbols 
SET seo_index = 0 
WHERE (detailed_interpretation_urdu IS NULL OR LENGTH(detailed_interpretation_urdu) < 500)
AND (detailed_interpretation_english IS NULL OR LENGTH(detailed_interpretation_english) < 300);

-- 5. Add SEO fields to historical_events (if not present)
ALTER TABLE historical_events 
ADD COLUMN meta_title VARCHAR(255) NULL,
ADD COLUMN meta_description TEXT NULL;
```

---

## Summary Score Card

| Category | Current Score | Target | Priority |
|---|---|---|---|
| Thin Content (Dream Symbols) | 1/10 | 7/10 | 🔴 Immediate |
| Meta Tags Coverage | 4/10 | 9/10 | 🔴 Immediate |
| Structured Data / Schema | 1/10 | 8/10 | 🔴 Immediate |
| Content Depth (Surahs) | 3/10 | 9/10 | 🔴 Immediate |
| URL Structure | 7/10 | 9/10 | ⚠️ 30 days |
| Internal Linking | 3/10 | 8/10 | ⚠️ 30 days |
| City/Local SEO | 2/10 | 9/10 | ⚠️ 60 days |
| E-E-A-T Signals | 2/10 | 7/10 | ⚠️ 60 days |
| hreflang / Multilingual | 0/10 | 7/10 | ⚠️ 60 days |
| Page Speed / Core Web Vitals | Unknown | 7/10 | ⚠️ 60 days |
| Sitemap Strategy | 0/10 | 9/10 | ⚠️ 30 days |

**Overall SEO Health: 3/10 — Major work needed, but enormous potential.**

---

*Analysis based on: islamicwebsite__17_.sql (MariaDB dump, July 2026) + GitHub repo: noormuhammad2k20-a11y/islamicweb*
