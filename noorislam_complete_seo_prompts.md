# 🕌 NoorIslam.com — Complete SEO Audit + AI Prompts
**Version:** v27 | **Pages:** 23,413 | **Date:** July 18, 2026
**GitHub:** github.com/noormuhammad2k20-a11y/islamicweb

---

# PART 1 — CURRENT STATUS (v27 Deep Analysis)

## ✅ What's Now Fixed (Great Progress!)

| Item | Status |
|------|--------|
| Admin email | ✅ `admin@noorislam.com` |
| Backup admin | ✅ `backup-admin@noorislam.com` |
| Islamic Names SEO | ✅ 13,622 pages |
| Dream Symbols SEO | ✅ 5,618 pages |
| Hadith SEO | ✅ 3,504 pages |
| Allah Names content (benefits, explanation, virtues, practical_lessons, dhikr_reflection) | ✅ All unique |
| NULL descriptions | ✅ 0 NULL (all 23,413 filled) |
| Social media links | ✅ Facebook, Twitter, YouTube, Instagram |

---

## ❌ REMAINING ISSUES — MUST FIX

---

### 🔴 ISSUE 1 — 672 Hadith Titles Duplicate Pattern (BIGGEST PROBLEM)

**Problem:** 269 hadiths have the SAME title start — Google sees this as spam:
```
[269x] 'Fighting for the Cause of Allah (Jihaad) Sahih Bukhari #...'
[88x]  'Obligatory Charity Tax (Zakat) Sahih Bukhari #...'
[81x]  'Call to Prayers (Adhaan) Sahih Bukhari #...'
```
Google hates when 269 pages have near-identical titles. This triggers **Panda penalty** — your entire domain ranking drops.

**Fix — Title Formula:**
```
❌ CURRENT:  'Fighting for the Cause of Allah (Jihaad) Sahih Bukhari #1234 | NoorIslam'
✅ CORRECT:  'Hadith #1234: [First 5 words of hadith text] | Bukhari | NoorIslam'
```

**SQL Fix:**
```sql
-- For hadiths, use the hadith's own first words as title
UPDATE seo_metas sm
JOIN hadiths h ON h.id = sm.metaable_id
SET sm.title = CONCAT(
    LEFT(h.english_text, 35),
    '... | Hadith #', h.id, ' | NoorIslam'
)
WHERE sm.metaable_type = 'App\\Models\\Hadith'
AND LENGTH(sm.title) > 60;
```

---

### 🔴 ISSUE 2 — 13 Dua Titles Starting with "- " (Leading Dash Bug)

**Problem:** 13 duas have broken titles — the English/Roman Urdu name is missing:
```
❌ '- سید الاستغفار'         [15 chars — too short, broken]
❌ '- شام کے وقت کی دعا'    [19 chars]
❌ '- استغفار'               [9 chars — worst!]
```
These look terrible in Google search results.

**Fix:**
```sql
-- Find affected duas
SELECT sm.id, sm.metaable_id, sm.title, d.title_english, d.title_roman_urdu
FROM seo_metas sm
JOIN duas d ON d.id = sm.metaable_id
WHERE sm.metaable_type = 'App\\Models\\Dua'
AND sm.title LIKE '- %';

-- Fix using dua's own title fields
UPDATE seo_metas sm
JOIN duas d ON d.id = sm.metaable_id
SET sm.title = CONCAT(
    COALESCE(d.title_roman_urdu, d.title_english, d.title_urdu),
    ' — Masnoon Dua | NoorIslam'
)
WHERE sm.metaable_type = 'App\\Models\\Dua'
AND sm.title LIKE '- %';
```

---

### 🔴 ISSUE 3 — 3 Duas Still Have Hadith Narration as Title (>60 chars)

```
❌ [68c] 'Narrated Anas: The Prophet (ﷺ) said... — 41'
❌ [68c] 'Narrated Ibn Abbas: that he differed with... — 98'
❌ [62c] 'Narrated Amr bin Yahya: (on the authority...'
```
These are hadiths showing as duas — URL is `/dua/narrated-...` which confuses Google.

**Fix:** Either remove from duas table or reassign `content_type = 'Hadith Reference'` and 301 redirect to hadith page.

---

### 🔴 ISSUE 4 — City SEO: Karachi Title Has BLANK Name

**Problem found in v27:**
```
❌ 'Prayer Times in  | NoorIslam'   ← Karachi name is BLANK!
❌ 'in , pakistan'                   ← description also blank
✅ 'Prayer Times in Lahore | NoorIslam'  ← Lahore is fine
```

**Fix:**
```sql
UPDATE seo_metas sm
JOIN cities c ON c.id = sm.metaable_id
SET 
    sm.title = CONCAT('Prayer Times in ', c.name, ' | NoorIslam'),
    sm.meta_description = CONCAT(
        'Accurate daily Namaz and Azan timings in ', c.name, 
        ', Pakistan. Get today\'s Fajr, Dhuhr, Asr, Maghrib, and Isha times. Authentic Islamic schedule on NoorIslam.'
    )
WHERE sm.metaable_type = 'App\\Models\\City'
AND sm.title LIKE 'Prayer Times in  |%';
```

---

### 🔴 ISSUE 5 — 75 Wazifa Titles Urdu-Only (English Keywords Missing)

**Problem:** 75 of 97 wazifa titles have NO English/Roman Urdu text:
```
❌ 'رزق کی وسعت کا وظیفہ | NoorIslam'
❌ 'شادی کا وظیفہ — وظیفہ | NoorIslam'
```
Pakistani users search in Roman Urdu (e.g., "rizq ka wazifa", "shadi ka wazifa"). English-only Urdu script titles miss ALL Roman Urdu searches.

**Fix Formula:**
```
✅ 'Rizq Ka Wazifa — رزق کی وسعت | NoorIslam'
✅ 'Shadi Ka Wazifa — شادی | NoorIslam'
✅ 'Shifa Ka Wazifa — شفا | NoorIslam'
```

---

### 🟡 ISSUE 6 — 98 Surah Descriptions Too Short (< 130 chars)

**Problem:** Most surah descriptions are 117–127 chars. Google shows up to 155 chars. Missing 30–40 chars = missing important keywords.

**Current:**
```
[124c] Read Surah Al-Faatiha (سُورَةُ ٱلْفَاتِحَةِ) — 7 ayahs, Meccan, Para 1. Full Arabic text, Urdu tarjuma, Tafsir
```

**Improved (150c):**
```
Read Surah Al-Faatiha (سُورَةُ ٱلْفَاتِحَةِ) — 7 ayahs, Meccan, Para 1. Full Arabic text, Urdu tarjuma, Tafsir, PDF download aur audio recitation NoorIslam par.
```

---

### 🟡 ISSUE 7 — Allah Names: 14 Quran Verse Duplicates

**Problem:** Multiple names share the same Quran verse because they appear together in one ayah (e.g., Al-Malik, Al-Quddus, As-Salam all from Surah Al-Hashr 59:23).

```
[4x] Surah Al-Hashr (59:23) — same verse for 4 different names
[4x] Surah Al-Hadid (57:3)  — same verse for 4 different names
[3x] same Arabic verse text  — Al-Awwal, Al-Akhir, Az-Zahir, Al-Batin
```

This is NOT necessarily a problem (it's Quranically accurate) BUT the page template must highlight WHICH PART of the verse refers to THIS specific name. Otherwise pages look duplicate to Google.

**Fix in Blade template:**
```html
{{-- Highlight the specific name in the verse --}}
{!! str_replace($allahName->arabic, '<mark class="highlight">'.$allahName->arabic.'</mark>', $allahName->quran_verse_arabic) !!}
```

---

### 🟡 ISSUE 8 — Surah FAQs: Urdu Answers All NULL

**571 FAQ entries** but `question_ur` and `answer_ur` are all NULL. This means:
- Your FAQ Schema only works for Roman Urdu/English speakers
- Urdu speakers searching Urdu questions won't get your rich snippets

**Priority:** Fill `question_ur` and `answer_ur` for top 20 surahs first (Yaseen, Al-Baqara, Al-Mulk, Al-Kahf, Al-Waqiah, Al-Rahman, Al-Fatiha, etc.)

---

### 🟡 ISSUE 9 — NO Sitemap.xml (Critical for 23,413 pages!)

No sitemap migration found. With 23,413 pages, Google won't find them without a sitemap.

```bash
composer require spatie/laravel-sitemap
php artisan make:command GenerateSitemap
```

```php
// app/Console/Commands/GenerateSitemap.php
SitemapIndex::create()
    ->add('/sitemap-surahs.xml')
    ->add('/sitemap-duas.xml')
    ->add('/sitemap-hadiths.xml')
    ->add('/sitemap-names.xml')
    ->add('/sitemap-dreams.xml')
    ->add('/sitemap-wazaif.xml')
    ->writeToFile(public_path('sitemap.xml'));

// Individual sitemaps
Sitemap::create()
    ->add(Surah::all()->map(fn($s) => Url::create("/surah/{$s->slug}")->setPriority(0.9)))
    ->writeToFile(public_path('sitemap-surahs.xml'));

Sitemap::create()
    ->add(IslamicName::all()->chunk(1000, fn($names) => 
        $names->map(fn($n) => Url::create("/islamic-names/{$n->slug}")->setPriority(0.7))))
    ->writeToFile(public_path('sitemap-names.xml'));
```

---

### 🟡 ISSUE 10 — Schema.org / JSON-LD Missing on All Pages

No structured data implementation found. This means:
- No FAQ rich snippets (even though 571 FAQs exist!)
- No breadcrumb trails in Google results
- No sitelinks search box
- No HowTo snippets for duas

---

# PART 2 — COMPLETE AI PROMPTS

---

## PROMPT 1 — Fix 672 Hadith Titles (Most Urgent)

```
You are an Islamic SEO specialist for NoorIslam.com, a Pakistani Islamic website.

Your task: Generate a unique, SEO-optimized title for a Hadith page.

STRICT RULES:
- Title MUST be 45–58 characters (HARD LIMIT)
- Format: "[Topic] — Hadith #[Number] | [Collection] | NoorIslam"
- OR: "[First 6 words of hadith]... | #[Num] | NoorIslam"  
- Include the hadith NUMBER to make it unique
- Include collection name (Bukhari / Muslim / Abu Dawud etc.)
- DO NOT start all titles with the same chapter name
- Language: English (this site serves English + Roman Urdu audience)

Hadith details:
- Hadith Number: [NUMBER]
- Collection: [COLLECTION_NAME] (e.g., Sahih Bukhari)
- Chapter/Book: [CHAPTER_NAME]
- Narrator: [NARRATOR]
- English Text (first 100 chars): [HADITH_TEXT_START]

Examples of GOOD titles (45-58 chars):
✅ "Jihaad Hadith #1234 — Battle Reward | Bukhari | NoorIslam"   [57c]
✅ "Whoever fights for Allah's cause... #1190 | NoorIslam"        [52c]
✅ "Zakat on Gold & Silver | Hadith #1405 | Bukhari | NoorIslam" [58c]

Examples of BAD titles:
❌ "Fighting for the Cause of Allah (Jihaad) Sahih Bukhari #1234 | NoorIslam"  [too long, repetitive chapter]
❌ "Hadith | NoorIslam"  [too short, no unique info]

Output JSON only, no markdown:
{
  "title": "...",
  "meta_description": "..."
}

Meta description rules:
- 145–155 characters EXACTLY
- Include: hadith number, collection name, narrator, topic keyword, "NoorIslam par parhen"
- Roman Urdu + English mix for Pakistani audience
```

---

## PROMPT 2 — Fix 13 Broken Dua Titles (Leading Dash)

```
You are an Islamic SEO expert for NoorIslam.com.

Task: Generate a proper SEO title for a Dua page whose current title is broken (starts with "- ").

RULES:
- Title: 45–58 characters
- Format: "[Dua Name in Roman Urdu] — [Key Benefit/Occasion] | NoorIslam"
- Must include the dua name in Roman Urdu (transliterated)
- Should hint at what the dua is for
- Language: Roman Urdu + English

Dua Details:
- Arabic name: [ARABIC_NAME]
- Urdu name: [URDU_NAME]
- English name: [ENGLISH_NAME]
- Occasion/Category: [CATEGORY]
- Reference: [HADITH_REF]
- Short meaning: [MEANING]

GOOD examples:
✅ "Sayyidul Istighfar — Best Dua for Forgiveness | NoorIslam"  [57c]
✅ "Sham Ki Dua — Evening Azkar | Arabic & Urdu | NoorIslam"    [54c]
✅ "Khaane Ke Baad Ki Dua — After Meal | NoorIslam"             [48c]

Output JSON only:
{
  "title": "...",
  "meta_description": "..."
}

Description rules: 145–155 chars, include occasion, "Arabic text", "Urdu tarjuma", "Hadith reference", benefit
```

---

## PROMPT 3 — 75 Wazifa Titles (Add Roman Urdu Keywords)

```
You are an Islamic SEO expert for NoorIslam.com targeting Pakistani Muslims.

Task: Generate bilingual SEO title for a Wazifa page currently having Urdu-only title.

PROBLEM: Pakistani users search in Roman Urdu (e.g., "rizq ka wazifa") but current titles are Urdu script only — missing all Roman Urdu search traffic.

RULES:
- Title: 45–58 characters
- Format: "[Roman Urdu Name] — [Urdu Script] | NoorIslam"
- Must have BOTH Roman Urdu transliteration AND Urdu script
- Start with Roman Urdu (for search matching)

Wazifa Details:
- Title Urdu: [URDU_TITLE]
- Title English: [ENGLISH_TITLE]
- Arabic text: [ARABIC]
- Purpose/Benefit: [BENEFIT]
- Reference: [REFERENCE]

GOOD examples:
✅ "Rizq Ka Wazifa — رزق کی وسعت | NoorIslam"          [43c]
✅ "Shadi Ka Wazifa — شادی | Authentic | NoorIslam"     [48c]
✅ "Shifa Ka Wazifa — شفا کا وظیفہ | NoorIslam"        [45c]
✅ "Aulad Ka Wazifa — اولاد کی خواہش | NoorIslam"      [45c]
✅ "Nazar Bad Ka Wazifa — نظربد | NoorIslam"            [41c]

BAD:
❌ "رزق کی وسعت کا وظیفہ | NoorIslam"  [Urdu only, no Roman Urdu]
❌ "Wazifa for Rizq | NoorIslam"         [English only, too generic]

Output JSON only:
{
  "title": "...",
  "meta_description": "..."
}
Description: 148–155 chars, include purpose, Arabic text mention, "Authentic", "with method", "NoorIslam par"
```

---

## PROMPT 4 — Surah Descriptions (Extend to 150 chars)

```
You are an Islamic SEO expert for NoorIslam.com.

Task: Extend a Surah meta description from ~120 chars to exactly 148–155 chars.

Current description format:
"Read Surah [Name] ([Arabic]) — [X] ayahs, [Meccan/Medinan], Para [N]. Full Arabic text, Urdu tarjuma, Tafsir"

Add to the end (choose most relevant):
- ", PDF download aur audio recitation" (if surah is popular)
- ", aur sabaq NoorIslam par" 
- ", aur wazaif NoorIslam par"
- ", benefits aur tafsir"

RULES:
- Final length: 148–155 chars EXACTLY
- Keep existing content, just extend
- Urdu words: "aur" (and), "ke sath" (with), "parhen" (read), "NoorIslam par" (on NoorIslam)
- End with "NoorIslam par." or "NoorIslam par parhen."

Surah details:
- Name: [SURAH_NAME]
- Arabic: [ARABIC_NAME]
- Ayahs: [COUNT]
- Type: [Meccan/Medinan]
- Para: [JUZZ_NUMBER]
- Current description: [CURRENT_DESC]
- Is famous surah (Yaseen/Mulk/Kahf etc.)? [YES/NO]

Output JSON only:
{
  "meta_description": "..."
}
```

---

## PROMPT 5 — Allah Names Quran Verse Disambiguation

```
You are an Islamic scholar and SEO expert for NoorIslam.com.

Problem: Multiple Allah names share the same Quran verse (because they appear together in one ayah). 
This creates near-duplicate content across pages.

Task: Write a UNIQUE "Quranic Context" paragraph (80–120 words) for each name explaining:
1. WHY this specific verse was chosen for this name
2. What THIS name specifically means in THIS verse
3. How it differs from the other names in the same verse

Allah Name: [NAME] ([ARABIC])
Quran Reference: [SURAH_NAME] ([REF])
Full Verse Arabic: [VERSE_ARABIC]
Full Verse Translation: [VERSE_ENGLISH]
Other names in same verse: [OTHER_NAMES]
This name's meaning: [MEANING]

Output a unique paragraph in English (80–120 words) that distinguishes THIS name's role in the verse.
Do NOT use phrases like "this verse also mentions..." — focus only on THIS name.

Example (for Al-Malik from Surah Al-Hashr 59:23):
"Surah Al-Hashr 59:23 opens this divine description with Al-Malik — the Absolute King — establishing sovereignty as the foundation of all Allah's other qualities mentioned in the verse. Before mentioning purity (Al-Quddus) or peace (As-Salam), the Quran first affirms kingship. This sequence is deliberate: all other divine attributes flow from absolute ownership and rule. Al-Malik here emphasizes that unlike earthly monarchs who inherit or seize power, Allah's sovereignty is intrinsic, eternal, and requires no army, minister, or legitimacy from outside."
```

---

## PROMPT 6 — Surah FAQ Urdu Translation

```
You are an Islamic scholar specializing in Pakistani Islamic education.

Task: Translate the following Surah FAQ from Roman Urdu/English to proper Urdu script.

RULES:
- Use simple, clear Urdu (not Persian-heavy)
- Keep Islamic terms in Arabic (e.g., سورہ, نماز, مکی, مدنی)
- Numbers in Urdu (ایک، دو، سات...)
- Answer should be 1–2 sentences max (matching the brevity of English answer)

FAQ to translate:
Question (Roman Urdu): [QUESTION_EN]
Answer (Roman Urdu): [ANSWER_EN]

Output JSON only:
{
  "question_ur": "...",
  "answer_ur": "..."
}

Example:
Input:  Q: "Surah Al-Faatiha mein kitni ayat hain?" A: "Is Surah mein 7 ayat hain."
Output: {"question_ur": "سورۃ الفاتحہ میں کتنی آیات ہیں؟", "answer_ur": "اس سورۃ میں سات آیات ہیں۔"}
```

---

## PROMPT 7 — Islamic Names (Missing 117 entries)

```
You are an Islamic names SEO expert for NoorIslam.com.

Task: Generate SEO meta for an Islamic name page.
Total names: 13,622. Currently missing 117 entries.

RULES:
- Title: 40–55 chars. Format: "[Name] — Islamic [Boy/Girl] Name Meaning | NoorIslam"
- Description: 148–155 chars exactly
- Include: name in English, Arabic script, Urdu meaning, gender, significance
- Pakistani audience — mix Roman Urdu + English
- For rare names, mention "less common" or "unique Islamic name"

Name Details:
- Name (English): [NAME]
- Name (Arabic): [ARABIC]
- Name (Urdu): [URDU]
- Gender: [Boy/Girl/Unisex]
- Meaning (English): [MEANING_EN]
- Meaning (Urdu): [MEANING_UR]
- Is Quranic: [YES/NO]
- Origin: [Arabic/Persian/Turkish]

GOOD title examples:
✅ "Muhammad — Islamic Boy Name Meaning | NoorIslam"    [47c]
✅ "Fatima — Islamic Girl Name Meaning | NoorIslam"     [45c]
✅ "Zainab — Islamic Girl Name & Meaning | NoorIslam"   [47c]

GOOD description example (150c):
"Muhammad (محمد) — Islamic boy name meaning 'The Praised One'. Quranic name, most popular in Pakistan. Full meaning in Urdu: تعریف کیا گیا. NoorIslam par complete details."

Output JSON only:
{
  "title": "...",
  "meta_description": "..."
}
```

---

## PROMPT 8 — Schema.org JSON-LD Generator

```
You are a technical SEO expert. Generate Schema.org JSON-LD structured data for the following page types on NoorIslam.com.

Page Type: [DUA / SURAH / ALLAH_NAME / ISLAMIC_NAME / HADITH / WAZIFA / DREAM_SYMBOL / PRAYER_TIMES]

For each type, output complete valid JSON-LD using these schemas:

DUA page → @type: "HowTo" (steps to recite) + "Prayer"
SURAH page → @type: "Chapter" (isPartOf: Quran Book) + FAQPage (if FAQs exist)
ALLAH_NAME → @type: "DefinedTerm" + Article
ISLAMIC_NAME → @type: "DefinedTerm" 
HADITH → @type: "Article" with author=Prophet Muhammad ﷺ
WAZIFA → @type: "HowTo" (method steps)
DREAM_SYMBOL → @type: "Article" (articleSection: Islamic Dream Interpretation)
PRAYER_TIMES → @type: "Event" (recurring) + LocalBusiness (city mosque)

Also always include:
- BreadcrumbList schema
- WebSite schema (homepage only, with SearchAction)
- Organization schema

Page data:
[Paste the page's title, description, content here]

Output only valid JSON-LD, one <script> block per schema type, no explanation.
```

---

# PART 3 — COMPLETE IMPLEMENTATION CHECKLIST

## 🔴 WEEK 1 — Before Going Live

### Database Fixes
- [ ] Fix 672 hadith titles (use Prompt 1 above) — **Run Laravel Seeder**
- [ ] Fix 13 dua titles with leading "- " (use Prompt 2) — **SQL Update**
- [ ] Fix 3 hadith-as-dua titles — **Remove or 301 redirect**
- [ ] Fix Karachi city blank title — **SQL Update**
- [ ] Extend 98 surah descriptions to 150+ chars (use Prompt 4)
- [ ] Fix 75 wazifa titles — add Roman Urdu (use Prompt 3)

### Laravel Production
```bash
# .env settings
APP_ENV=production
APP_DEBUG=false
APP_URL=https://noorislam.com

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis
```

### robots.txt (create in /public/)
```
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /api/
Disallow: /login
Disallow: /register

Sitemap: https://noorislam.com/sitemap.xml
```

---

## 🟡 WEEK 2 — SEO Technical

### Sitemap (23,413 pages need this urgently)
```bash
composer require spatie/laravel-sitemap
```
```php
// Schedule in app/Console/Kernel.php
$schedule->command('sitemap:generate')->daily();
```
Submit to Google Search Console: `https://noorislam.com/sitemap.xml`

### Meta Tags in Blade Layout
```html
{{-- In layouts/app.blade.php <head> --}}
<title>{{ $seoMeta->title ?? config('app.name') }}</title>
<meta name="description" content="{{ $seoMeta->meta_description ?? '' }}">
<link rel="canonical" href="{{ $seoMeta->canonical_url ?? url()->current() }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $seoMeta->title ?? '' }}">
<meta property="og:description" content="{{ $seoMeta->meta_description ?? '' }}">
<meta property="og:image" content="{{ $seoMeta->og_image ?? asset('/images/og-default.jpg') }}">
<meta property="og:url" content="{{ $seoMeta->canonical_url ?? url()->current() }}">
<meta property="og:site_name" content="NoorIslam">
<meta property="og:locale" content="ur_PK">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@noorislam">
<meta name="twitter:title" content="{{ $seoMeta->title ?? '' }}">
<meta name="twitter:description" content="{{ $seoMeta->meta_description ?? '' }}">
<meta name="twitter:image" content="{{ $seoMeta->og_image ?? asset('/images/og-default.jpg') }}">

{{-- hreflang --}}
<link rel="alternate" hreflang="ur-PK" href="{{ url()->current() }}">
<link rel="alternate" hreflang="en" href="{{ url()->current() }}">
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">
```

### Schema.org — Add to Each Page Type
```html
{{-- Surah page --}}
@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Chapter",
  "name": "{{ $surah->name_english }}",
  "position": {{ $surah->number }},
  "isPartOf": {"@type": "Book", "name": "The Holy Quran"},
  "inLanguage": ["ar", "ur", "en"]
}
</script>

{{-- FAQ Schema (if FAQs exist) --}}
@if($surah->faqs->count())
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($surah->faqs->take(5) as $faq)
    {
      "@type": "Question",
      "name": "{{ $faq->question_en }}",
      "acceptedAnswer": {"@type": "Answer", "text": "{{ $faq->answer_en }}"}
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif
@endpush
```

---

## 🟢 WEEK 3-4 — Content & Ranking

### Priority Content to Add
- [ ] Surah FAQs Urdu translation (use Prompt 6) — top 20 surahs first
- [ ] Allah Names: unique Quranic context paragraphs for 14 shared-verse names (use Prompt 5)
- [ ] Tafsir content: currently 0 records — add even 2–3 paragraph tafsir per surah
- [ ] Wazaif `urdu_translation` — currently NULL for most entries

### Backlink Strategy
Target these for backlinks:
1. IslamicFinder.com — "Also see our dua collection"
2. Sunnah.com — reference links  
3. Tanzil.net — Quran reference
4. Pakistani Islamic blogs (hamariweb.com, urdupoint.com)
5. Guest posts: "Complete wazu ki dua guide" on Islamic blogs

---

## 📊 FINAL SEO SCORE CARD

| Category | Current Score | Target | Status |
|----------|--------------|--------|--------|
| Meta Titles | 65/100 | 95/100 | 672 hadith too long |
| Meta Descriptions | 82/100 | 95/100 | Surah descs short |
| Page Coverage | 98/100 | 100/100 | 117 names missing |
| Schema Markup | 0/100 | 90/100 | ❌ Not implemented |
| Sitemap | 0/100 | 100/100 | ❌ Not created |
| Canonicals | 90/100 | 100/100 | City blank name |
| robots.txt | 0/100 | 100/100 | ❌ Not created |
| Site Speed | ?/100 | 90/100 | Need to test |
| Core Web Vitals | ?/100 | 85/100 | Need to test |
| Backlinks | 0/100 | 50/100 | New site |
| **OVERALL** | **43/100** | **92/100** | Fix above 🚀 |

---

## 🔑 TOP KEYWORDS — USE IN ALL CONTENT

| Keyword | Monthly Searches | Priority |
|---------|----------------|---------|
| surah yasin | 201,000 | 🔴 |
| islamic names | 201,000 | 🔴 |
| khwab ki tabeer | 201,000 | 🔴 |
| surah kahf | 110,000 | 🔴 |
| wazu ki dua | 90,500 | 🔴 |
| allah ke 99 naam | 90,500 | 🔴 |
| sone ki dua | 74,000 | 🔴 |
| muslim girl names | 74,000 | 🔴 |
| subah ki dua | 60,500 | 🟡 |
| rizq ka wazifa | 49,500 | 🟡 |
| hadith in urdu | 49,500 | 🟡 |
| namaz ki dua | 49,500 | 🟡 |
| dua e istikhara | 33,100 | 🟡 |
| prayer times karachi | 33,100 | 🟡 |
| islamic boy names | 33,100 | 🟡 |

---

## 🚀 GOOGLE SEARCH CONSOLE — Step by Step

```
1. Go to: search.google.com/search-console
2. Add property: noorislam.com (Domain property)
3. Copy DNS TXT verification record
4. Paste in your hosting DNS panel (cPanel → Zone Editor)
5. Wait 5–10 mins, verify
6. Sitemaps → Add: sitemap.xml
7. URL Inspection → Enter homepage URL → Request Indexing
8. URL Inspection → Enter these priority pages:
   /surah/al-faatiha
   /surah/yaseen
   /dua/wazu-ki-dua
   /99-names-of-allah
   /islamic-names
   /prayer-times/karachi
9. Check Core Web Vitals report weekly
10. Check Coverage report for any crawl errors
```

---

*Full audit of islamicwebsite__27_.sql — 126,556 lines, 105 tables, 23,413 SEO pages*
*Generated by Claude for NoorIslam.com | July 18, 2026*
