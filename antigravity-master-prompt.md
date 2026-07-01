# MASTER BUILD PROMPT — Noor-e-Islam: Database-Driven Laravel SEO Platform

> **Yeh poora file copy karke Antigravity ko ek hi prompt ke taur par de dein.** Is mein project context, exact SEO strategy, database schema, routes, page templates, aur build phases — sab kuch hai. Agent ko yeh poora document end-to-end follow karna hai, koi section skip nahi karna.

---

## 0. ROLE & OPERATING INSTRUCTIONS FOR THE AGENT

You are acting as a senior full-stack Laravel engineer + technical SEO architect. Your job is to take an existing **static single-page HTML/CSS/JS design** ("Noor-e-Islam") and rebuild it into a **full database-driven, multi-page, Laravel + MySQL + AJAX website** that implements an exact, pre-defined SEO content strategy.

Rules for how you work:

1. **Read this entire document before writing any code.** It contains the full architecture, schema, routing, page templates, and SEO rules — do not invent your own structure where one is already specified here.
2. **Do not skip phases.** Build in the order given in Section 19. Each phase must be working and testable before moving to the next.
3. **Where this document gives an exact template (title formula, meta formula, H-tag structure, word count, schema type), implement it exactly** — these are not suggestions, they come from a live competitor audit and must be followed precisely.
4. **Where a package, library, or API version is not pinned**, research the current best/maintained option at build time (ecosystems change) and note your choice in a `DECISIONS.md` file at the project root.
5. **Never generate spun/templated content.** Every city, country, or Surah entry you seed must have genuinely unique narrative text — see Section 15. This is a hard constraint, not a style preference.
6. **Never fabricate religious citations.** Any Hadith/Quran reference must be a real, checkable book + number / Surah:Ayah. If unsure, label it "commonly cited, scholarly verification recommended" rather than inventing a source.
7. **Ask the user only when truly blocked** (missing API key, missing brand asset, ambiguous business decision like domain name or hosting). Do not ask about things already decided in this document.

---

## 1. SOURCE-OF-TRUTH RECONCILIATION (read this first)

Two SEO planning documents were used to build this prompt, and they partially disagree — here is how they were reconciled, and you must follow this reconciliation, not re-derive your own:

- **`seo-domination-strategy.md`** is the **authoritative document**. It is newer, based on a live audit of the two real competitors (hamariweb.com/islam and jamiafaridiasahiwal.com), and explicitly corrects the older research for Google's 2026 ranking rules (FAQ rich-result removal, Scaled Content Abuse enforcement, March 2026 Core Update's originality weighting). Its **URL architecture (nested country→city), page templates, on-page checklist, EEAT rules, and anti-spam rules govern this build.**
- **`deep-research-report.md`** (the "original research file") is used only as a **supplementary data source**: the long-tail keyword table, suggested API names (AlAdhan, Al-Quran Cloud), and example DB field names. Its flat URL slugs (`/islamic-date-today-karachi`), its FAQPage-rich-result CTR assumption, and its "500 pages" pace are **superseded** — do not implement those parts literally.
- **Stack change from both documents:** both source documents assumed a *static* site (Next.js SSG / Astro / Hugo). The user has explicitly requested **Laravel + MySQL, AJAX-enhanced, fully database-driven** instead. Section 5, 9, 10, 11, 12 below translate every "static site" instruction from the source documents into its Laravel-dynamic equivalent — follow those translated versions, not the literal static-site instructions.

---

## 2. CURRENT STATE — WHAT ALREADY EXISTS

The user has one existing asset: a static `index.html` (provided as `_DOCTYPE_html.txt`) — a single-page Islamic site called **Noor-e-Islam** (نورِ اسلام), `lang="ur"`, `dir="ltr"`. It must be treated as **the design system source of truth** — do not redesign it, extract and reuse it.

**Existing sections (currently hardcoded, single page, `#anchor` navigation):**
Top bar (Hijri date + location + socials) → Navbar (logo, anchor nav, mobile menu) → Hero (bismillah, stats) → Prayer-time ticker (hardcoded times) → About → Pillars of Islam → Quran verses carousel (hardcoded slides) → Services → Learn (tabbed) → Events → Testimonials → CTA → Contact form (fake `setTimeout`, no backend) → Newsletter (fake) → Footer → back-to-top + toast notifications.

**What's fake/non-functional today and must become real:** the Hijri date display, the prayer-time ticker, the Quran verse carousel content, the contact form submission, the newsletter signup, "course details / event registration coming soon" placeholders.

**What's structurally missing today (per the SEO strategy) and must be newly built:** every page outside this one homepage — there is currently no Islamic Date hub, no country/city pages, no Prayer Times pages, no Sehri/Iftar pages, no Surah pages, no Fazilat pages, no Hadith pages, no About/Author/Scholar/Contact/Privacy pages, no Urdu (`/ur/`) parallel routes, no sitemap, no schema markup, no breadcrumbs, no comments system.

---

## 3. NON-NEGOTIABLE SEO RULES (2026, from `seo-domination-strategy.md`)

Design every template and every page around these rules — they are constraints on the whole build, not a separate task:

- **Answer-first layout.** The direct answer (date / prayer time / Surah text) must appear above the fold, before explanatory text — no scrolling needed to get the answer.
- **FAQ content stays, FAQ rich-snippet hope goes.** Google removed FAQ dropdown rich results from classic search (May 7, 2026). Still write visible FAQ content (H3 question + paragraph answer) for semantic/AI-Overview value, and still emit `FAQPage` schema — but never market or build around a rich-snippet appearing.
- **Scaled Content Abuse is actively enforced.** Templated pages with no genuinely unique value per page are treated as spam, AI-written or not. Every city/country/Surah page must carry real, distinct data and at least one genuinely unique paragraph (see Section 15).
- **Originality is a ranking lever, not décor.** The Hijri-Gregorian converter tool, the per-country moon-sighting-authority explanations, and the per-city calculation-method transparency are the site's actual differentiators versus both competitors — they must be built as real, working features, not static text.
- **No backlink strategy exists or is planned.** All ranking authority must come from on-page EEAT, internal linking depth, and technical excellence.
- **EEAT is mandatory on every content page**, not just an About page: visible author bio + (for religious content) a scholar-reviewer badge, both backed by real DB records, never placeholder text in production.
- **Mobile-first, Core Web Vitals compliant:** LCP < 2.5s, INP < 200ms, CLS < 0.1.
- **Internal linking is the backlink substitute:** every leaf page must link to (a) its parent hub, (b) ≥2 sibling pages in its cluster, (c) ≥1 page in a different cluster. Max depth from homepage: 3 clicks.
- **Bilingual (Urdu + English) is a structural requirement**, not a nice-to-have — see Section 16.
- **Publish in realistic waves** (Section 19), never a single bulk dump of hundreds of auto-generated pages on day one.

---

## 4. TECH STACK

| Layer | Choice | Notes |
|---|---|---|
| Backend framework | **Laravel** (latest stable LTS at build time) | Verify current version before scaffolding. |
| Database | **MySQL** (or MariaDB) | Use Eloquent migrations for every table in Section 7. |
| Templating | **Blade** | All primary, crawlable page content is **server-rendered Blade** — see hard rule in Section 10. |
| Frontend interactivity | **Vanilla JS / fetch() or lightweight jQuery**, calling Laravel **AJAX/JSON endpoints** | Reuse the existing JS patterns in the uploaded file (toast system, mobile menu, carousel) — extend them to call real endpoints instead of `setTimeout` fakes. |
| Styling | Existing CSS lifted as-is into a compiled asset (via Vite, Laravel's default bundler) | Do not redesign; only extend with new component styles using the same custom-property design tokens. |
| Caching | Laravel cache (file/Redis) for daily-changing data (Hijri date, prayer times) | See Section 11. |
| Scheduling | Laravel Task Scheduler (`schedule:run` via server cron) | Replaces the "static rebuild cron" concept from the source documents. |
| Admin | A CRUD admin (Laravel Filament, or a hand-built `/admin` panel guarded by Laravel's auth) | Needed to manage cities, Surahs, Fazilat entries, comments moderation, SEO overrides — see Section 17. |
| External data | AlAdhan API (prayer times + Hijri/Umm al-Qura conversion) and a Quran text/translation source (e.g. Al-Quran Cloud API or a licensed static dataset) | Verify these APIs are still active/current at build time; always cache responses and have a last-known-good fallback so a third-party outage never breaks a page. |

---

## 5. FULL SITE ARCHITECTURE (Laravel routes, nested per strategy doc Part 3)

```
GET  /                                              → HomeController@index   (the existing design, made dynamic)
GET  /about                                         → PageController@about
GET  /contact                                       → PageController@contact
GET  /privacy-policy                                → PageController@privacy

# CLUSTER 1 — Islamic Date / Hijri Calendar
GET  /islamic-date-today                            → IslamicDateController@hub
GET  /islamic-date-today/{country:slug}              → IslamicDateController@country
GET  /islamic-date-today/{country:slug}/{city:slug}  → IslamicDateController@city
GET  /hijri-gregorian-converter                      → ConverterController@show
GET  /islamic-calendar/{month:slug}                  → HijriMonthController@show      (12 routes, seeded)
GET  /islamic-calendar/{year}                        → HijriYearController@show

# CLUSTER 2 — Prayer Times
GET  /prayer-times                                   → PrayerTimesController@hub
GET  /prayer-times/{city:slug}                       → PrayerTimesController@city

# CLUSTER 3 — Sehri / Iftar (Ramadan)
GET  /ramadan/{year}                                 → RamadanController@hub
GET  /ramadan/{year}/sehri-iftar/{city:slug}          → RamadanController@city

# CLUSTER 4 — Surah / Quran
GET  /surah                                          → SurahController@hub
GET  /surah/{surah:slug}                              → SurahController@show

# CLUSTER 5 — Fazilat (Virtues)
GET  /surah/{surah:slug}/fazilat                      → FazilatController@show

# CLUSTER 6 — Hadith
GET  /hadith/topics                                  → HadithController@hub
GET  /hadith/topics/{topic:slug}                      → HadithController@show

# Bilingual mirror — every public route above also exists prefixed with /ur/
# e.g. GET /ur/islamic-date-today/{country}/{city} → same controllers, locale=ur

# System
GET  /sitemap_index.xml                              → SitemapController@index
GET  /sitemap-dates.xml / sitemap-prayer.xml / sitemap-surah.xml / ...
GET  /robots.txt                                     → static, generated at deploy

# AJAX / JSON endpoints (see Section 10 for the full whitelist)
POST /ajax/contact
POST /ajax/newsletter
POST /ajax/comments/{type}/{id}
GET  /ajax/hijri-convert
GET  /ajax/cities/search
GET  /ajax/prayer-times/{city:slug}/today
```

**Routing rule:** every cluster route must use **Route Model Binding on slug**, return a real Eloquent model (404 via Laravel's normal not-found handling if the slug doesn't exist — never a soft client-side "not found" message), and every controller method must pass breadcrumb + internal-link data per Section 6's per-template "internal links out" requirement.

---

## 6. DATABASE SCHEMA

Build these as Eloquent migrations + models. Add `created_at`/`updated_at` to all; add `last_verified_at` (timestamp) to any table whose content should display a "Last updated" stamp (Section 11).

| Table | Key columns |
|---|---|
| `countries` | `name`, `slug`, `flag_code`, `moon_sighting_authority`, `default_timezone` |
| `cities` | `country_id` FK, `name`, `slug`, `latitude`, `longitude`, `timezone`, `prayer_calc_method`, `local_context_note` (text — for the genuinely-unique paragraph requirement) |
| `hijri_date_cache` | `gregorian_date`, `hijri_day`, `hijri_month`, `hijri_year`, `source`, `fetched_at` — refreshed daily by scheduler |
| `prayer_times` | `city_id` FK, `date`, `fajr`, `sunrise`, `dhuhr`, `asr`, `maghrib`, `isha`, `calc_method`, `fetched_at` |
| `ramadan_timings` | `city_id` FK, `ramadan_year`, `date`, `sehri_time`, `iftar_time` |
| `hijri_months` | `month_number` (1–12), `name_ar`, `name_ur`, `name_en`, `slug`, `significance_content` (long, original, citation-backed) |
| `islamic_events` | `name`, `hijri_month_id` FK, `hijri_day`, `description`, `event_type` |
| `surahs` | `number`, `name_ar`, `name_ur`, `name_en`, `slug`, `ayah_count`, `para_juz`, `revelation_place` (makki/madani), `arabic_text` (longtext, or normalize into `surah_ayahs` if you want verse-by-verse), `urdu_translation`, `english_translation`, `audio_url`, `pdf_url` |
| `surah_ayahs` *(optional normalization)* | `surah_id` FK, `ayah_number`, `arabic_text`, `urdu_translation`, `english_translation` |
| `fazilat_entries` | `surah_id` FK, `question`, `answer`, `hadith_reference`, `verification_status` enum(`verified`,`commonly_cited`) |
| `hadith_topics` | `topic_name`, `slug`, `content`, `hadith_book`, `hadith_number` |
| `authors` | `name`, `credential`, `bio`, `photo_path` |
| `scholars` | `name`, `institution`, `credential`, `photo_path` |
| `content_reviews` | polymorphic: `reviewable_id`, `reviewable_type`, `author_id` FK nullable, `scholar_id` FK nullable, `reviewed_at` |
| `comments` | polymorphic: `commentable_id`, `commentable_type`, `name`, `city`, `body`, `status` enum(`pending`,`approved`,`spam`), `ip_address` |
| `seo_meta` | polymorphic: `metaable_id`, `metaable_type`, `title`, `meta_description`, `canonical_url`, `og_image`, `schema_override_json` — lets the admin override any auto-generated SEO field per page |
| `subscribers` | `email`, `status`, `subscribed_at` |
| `contact_messages` | `first_name`, `last_name`, `email`, `phone`, `subject`, `message`, `status` |
| `site_settings` | `key`, `value` — global config (social URLs, site name, default OG image, etc.) |

**Bilingual data:** use a translation strategy (either a dedicated `*_translations` table per translatable model, or a package such as Laravel's translatable approach — verify current best-practice package at build time) so every content table can carry an `ur` and `en` version of its text fields without duplicating rows.

---

## 7. PAGE TEMPLATES — exact spec per cluster (implement literally)

For every template below: `<h1>` once, matches intent; title tag 50–60 chars and unique per row in DB (enforce a unique constraint or validation, this is the #1 spinning risk flagged in the audit); meta description 140–155 chars; first 100 words answer the query directly; `<time datetime="...">` wraps any date/last-updated value; visible breadcrumb + `BreadcrumbList` schema; minimum 4 outbound internal links (hub, sibling, cross-cluster, the converter tool).

### Template A — Country Islamic Date (`/islamic-date-today/{country}`)
- Title: `Islamic Date Today in {Country} — {HijriDay} {HijriMonth} {HijriYear} AH`
- Meta: `Today's Islamic (Hijri) date in {Country} is {HijriDay} {HijriMonth} {HijriYear}, based on {MoonAuthority}. Updated daily with Gregorian date {GregDate}.`
- Above fold: Hijri + Gregorian date side by side (EN + UR script).
- H2 blocks: *What is today's Islamic date in {Country}?* / *Which moon-sighting authority does {Country} follow?* (name the real committee — this is the originality lever) / *This month — {HijriMonth} {HijriYear}* (100–150 unique words, vary the local angle per country, never copy-pasted) / *Cities in {Country}* (internal links) / *Frequently Asked Questions* (visible H3s).
- Word count: 500–700 unique words. Schema: `WebPage` + `BreadcrumbList` + `Organization` + `FAQPage`.
- Links out: parent hub, 3–4 city pages, 1 prayer-times page, 1 Surah page.

### Template B — City Sub-Page (`/islamic-date-today/{country}/{city}`)
Same as Template A, 300–400 words, plus a **"Prayer Times in {City} Today"** mini-widget linking to `/prayer-times/{city}`.

### Template C — Hijri Month (`/islamic-calendar/{month}`)
- Title: `{Month} {Year} Islamic Calendar — Hijri to Gregorian Dates`. H1: `{Month} {HijriYear} Islamic Calendar`.
- Full month grid (Hijri↔Gregorian). H2: *Significance of {Month}* (300–500 words, real Quran/Hadith citation format Surah:Ayah / Book+Number — never invent one). H2: *Important dates in {Month}*.
- Links: prev/next month, year hub, relevant Surah/Fazilat. Schema: `Event` for any named observance, `WebPage`.

### Template D — Prayer Times (`/prayer-times/{city}`)
- Title: `Prayer Times in {City} Today — Fajr, Zuhr, Asr, Maghrib, Isha`
- Meta: `Today's prayer timetable for {City}: Fajr {time}, Zuhr {time}, Asr {time}, Maghrib {time}, Isha {time}. Calculated using {Method} for {Date}.`
- Above fold: 5-prayer table. H2: *Calculation method used for {City}* (name the method + angle parameters explicitly — neither competitor explains this). H2: *Monthly prayer calendar*. H2: *Sehri & Iftar in {City}* (during Ramadan window, cross-link Cluster 3).
- Word count: 400–600. Schema: `WebPage`, `BreadcrumbList`.

### Template E — Sehri/Iftar (`/ramadan/{year}/sehri-iftar/{city}`)
- Title: `Sehri & Iftar Time in {City} Today — Ramadan {Year}`. Above fold: today's Sehri + Iftar, large/bold.
- H2: *Full Ramadan {Year} Sehri/Iftar calendar for {City}* (table). H2: *Fasting rules and intentions (Niyyah)* (original, sourced).
- Links: Surah Baqarah/Yaseen, prayer-times page, Eid date page. Schema: `WebPage`, `Event`.

### Template F — Surah Page (`/surah/{name}`)
- Title: `Surah {Name} — Arabic Text, Urdu & English Translation, Audio`
- Full Arabic + Urdu + English translation, audio/PDF (only content you have rights to host/embed). H2s: *Arabic Text* / *Urdu Translation* / *English Translation* / *Audio / PDF Download* / *Para/Juz, Ayah count, Place of Revelation*.
- Links to its own `/fazilat`, today's Islamic date, nearest prayer time. Word count: 1000–2000+ words (justified by genuine verse content, not padding). Schema: `Article`/`CreativeWork`, `BreadcrumbList`, `Organization`.

### Template G — Fazilat (`/surah/{name}/fazilat`)
- Title: `Surah {Name} Ki Fazilat — Benefits & Virtues (With Hadith References)`
- Visible Q&A (H3+paragraph), every answer cites a real, checkable hadith source — if unverified, label clearly as "commonly cited, scholarly verification recommended."
- Links back to Surah page + scholar-reviewed badge. Word count: 400–600. Schema: `FAQPage`, `WebPage`.

### Template H — Hijri-Gregorian Converter (`/hijri-gregorian-converter`)
This is the site's **#1 originality asset** — build it as a genuinely working interactive tool (AJAX-backed, see Section 10), not decoration. H2: *How Hijri-Gregorian conversion works* (real explanation). H2: *Why the date can differ by country* (moon-sighting vs calculated methods, explained honestly). Embed a lightweight version of this same widget on the highest-traffic date pages too (Template A/B), not just its own page.

---

## 8. FRONTEND → BLADE CONVERSION PLAN

1. **Extract** the `<head>` font/icon links and the full `<style>` block from the uploaded design into `resources/css/app.css` (built via Vite) — keep every CSS custom property unchanged.
2. **Build `resources/views/layouts/app.blade.php`**: top-bar + navbar + mobile-menu + `@yield('content')` / `{{ $slot }}` + footer + toast container + back-to-top button — lifted directly from the uploaded markup, with the Hijri-date top-bar value now pulled from `hijri_date_cache` instead of hardcoded.
3. **Expand the navbar** beyond the current single-page anchors. Replace `#about`, `#pillars`, etc. with real routes, and add top-level entries for each cluster hub: Home, Islamic Date, Prayer Times, Quran/Surah, Ramadan (seasonal, shown near Ramadan), About, Contact — keep the existing visual style (pill nav, gold CTA button) untouched.
4. **Turn repeating UI into Blade components** (`resources/views/components/`): `breadcrumb.blade.php` (with `BreadcrumbList` JSON-LD), `faq-block.blade.php` (visible Q&A + `FAQPage` JSON-LD), `author-box.blade.php`, `scholar-badge.blade.php`, `comments.blade.php` (list + AJAX submit form), `prayer-widget.blade.php` (the 5-prayer chip ticker, now city-aware), `quran-carousel.blade.php` (now pulling real ayah data instead of hardcoded slides), `language-switcher.blade.php`, `hijri-converter-widget.blade.php`.
5. **Rebuild the existing homepage sections as dynamic**: Hero stays mostly as-is; Prayer ticker pulls today's `prayer_times` row for a default/detected city; Quran carousel pulls from `surahs`/`surah_ayahs`; Events section pulls from `islamic_events`; Contact form posts to `/ajax/contact`; Newsletter posts to `/ajax/newsletter`.
6. **Do not change the visual design.** Every new page (Surah, Prayer Times, Islamic Date, etc.) must reuse the same header/footer/typography/color system as the homepage so the whole site feels like one product, not a bolt-on.

---

## 9. WHAT MUST STAY SERVER-RENDERED (hard rule — do not violate)

Per Section 6.1 of the SEO strategy: Google must see **fully-rendered, crawlable HTML**, not client-rendered-only content. This is a hard constraint for this Laravel build:

- **Every cluster page's primary content** (the date, the prayer times, the Surah text, the Fazilat Q&A, the breadcrumb, the schema, the internal links) **must be rendered server-side in the initial Blade response.** Never fetch primary page content via AJAX after page load.
- AJAX is for **enhancement and interaction only**, never for delivering content that should be indexed.

---

## 10. AJAX SPECIFICATION (the explicit whitelist)

Build these as real Laravel routes (`routes/api.php` or a `/ajax` prefixed group in `web.php`), CSRF-protected, validated with Form Requests, rate-limited (`throttle` middleware), with honeypot or equivalent spam protection on public-facing forms:

| Feature | Endpoint | Behavior |
|---|---|---|
| Contact form | `POST /ajax/contact` | Validate, store in `contact_messages`, send notification email, return JSON → replace the current fake `setTimeout` in the uploaded JS with a real `fetch()` call, keep the existing toast UX. |
| Newsletter | `POST /ajax/newsletter` | Validate email, upsert into `subscribers`, return JSON, same toast pattern. |
| Comments | `POST /ajax/comments/{type}/{id}` | Store as `status=pending`, return JSON confirming "awaiting moderation" — never auto-approve. |
| Hijri↔Gregorian converter | `GET /ajax/hijri-convert?date=...&direction=...` | Server-side calculation/cache lookup, return JSON, render result client-side in the Template H widget without a full page reload. |
| City search/autocomplete | `GET /ajax/cities/search?q=...` | Used on Prayer Times / Islamic Date hub pages to let users jump to their city quickly. |
| Live prayer ticker refresh | `GET /ajax/prayer-times/{city}/today` | Optional: re-fetch today's already-cached times to highlight the "currently active" prayer client-side (mirrors the existing JS logic in the uploaded file, now driven by real data instead of the hardcoded `times` array). |

**Explicitly forbidden as AJAX:** rendering the actual Islamic Date page content, Prayer Times page content, Surah text, or Fazilat Q&A via a JS fetch into an empty shell. Those are full server-rendered Blade routes per Section 9.

---

## 11. DATA SOURCES & THE FRESHNESS ENGINE (Laravel equivalent of the "static rebuild cron")

- Build a Laravel **Scheduled Command** (`app/Console/Commands/RefreshIslamicData.php`) that runs daily, before Fajr (schedule it in local Pakistan time with appropriate buffer):
  - Calls the prayer-times API for every active city → upserts into `prayer_times`.
  - Calls the Hijri-date source → upserts into `hijri_date_cache`.
  - During the Ramadan window, also refreshes `ramadan_timings`.
- Always **cache the last successful fetch** and fall back to it (with the visible "Last updated" stamp reflecting the real cache time) if the external API is temporarily down — never show a broken or blank value.
- Add `Schedule::command(...)->dailyAt('04:00')` (adjust to local pre-Fajr time) in `app/Console/Kernel.php`, and document the server cron entry needed (`* * * * * php artisan schedule:run`) in `DECISIONS.md`.
- Every dynamic page must render a visible `<time datetime="...">Last updated: {date} {time}</time>` stamp tied to the real `fetched_at`/`last_verified_at` column — never a fake auto-incrementing date.

---

## 12. SEO TECHNICAL IMPLEMENTATION IN LARAVEL

- **`<title>` / meta description / canonical / OG tags**: build a small `SeoMeta` trait or service that every controller calls, checking the `seo_meta` override table first, falling back to the per-template formula in Section 7.
- **JSON-LD**: a Blade component per schema type (`<x-schema.webpage>`, `<x-schema.faq>`, `<x-schema.article>`, `<x-schema.breadcrumb>`, `<x-schema.organization>`, `<x-schema.event>`) — schema must only describe content that is actually visible on the page (mismatched schema is a known spam trigger).
- **Sitemap**: generate `sitemap_index.xml` + per-cluster sub-sitemaps dynamically from the database (a scheduled command regenerating cached XML, or generated on request with response caching) — must always reflect real published URLs with accurate `<lastmod>`.
- **`robots.txt`**: allow Googlebot; disallow `/admin`, `/ajax`, any future filter/sort query params.
- **`hreflang`**: every page that has a `/ur/` counterpart must emit `hreflang="en"` / `hreflang="ur"` / `hreflang="x-default"` link tags.
- **Canonical**: self-referencing by default; point to the EN version from its UR counterpart only if you decide UR is a near-duplicate rather than fully distinct content (the strategy doc recommends genuinely distinct translated content, in which case both should self-canonicalize).
- **No infinite crawl traps**: cap navigable Hijri year ranges (±2 years), `noindex` anything outside that, never expose unbounded `?page=`/`?sort=` URLs.
- **Performance**: WebP/AVIF images with explicit width/height, `font-display: swap`, lazy-load below-the-fold images and calendar grids, inline critical CSS, defer non-critical JS, response caching on data-heavy pages.

---

## 13. ON-PAGE SEO ENFORCEMENT CHECKLIST (apply to every page, every template)

- [ ] Exactly one `<h1>` per page, matching the target query intent.
- [ ] Title tag 50–60 chars, **unique across the whole `seo_meta`/per-model title field** — enforce with a DB unique index or validation rule, this was flagged as the #1 spinning risk.
- [ ] Meta description 140–155 chars, dynamic variables filled in, soft (not clickbait) call to action.
- [ ] URL matches the slug structure in Section 5 exactly.
- [ ] First 100 words answer the query directly.
- [ ] At least one genuinely unique paragraph per page — no two city/country pages share identical sentences beyond the data table.
- [ ] All images have descriptive `alt` text.
- [ ] Minimum 4 outbound internal links (hub, sibling, cross-cluster, converter/tool).
- [ ] `<time datetime="...">` on every date/last-updated value.
- [ ] Visible breadcrumb + matching `BreadcrumbList` schema.
- [ ] `rel="canonical"` correct on every near-duplicate pair (EN/UR).

---

## 14. EEAT SYSTEM (the backlink substitute — build as real DB-backed features, not static text)

- Every content page renders an **author box** (footer block) pulled from `authors`: name, credential, short bio.
- Every religious-content page (Surah, Fazilat, Hadith) renders a **scholar-reviewer badge** pulled from `scholars` via `content_reviews` — if no real scholar partnership exists yet, do not fake one; leave the badge logic built but unpopulated until a real reviewer is added.
- Build real **About** (editorial team, scholar reviewer, methodology), **Contact** (real email, ideally phone/address), and **Privacy Policy / Disclaimer** (dates may vary by local moon sighting — confirm with your local mosque) pages.
- **`Organization` schema with `sameAs`** linking real social profiles (the social icons already exist in the uploaded design's top bar — wire them to real URLs from `site_settings`).
- **Comments enabled** (moderated, `status=pending` by default) on every major content page — see Section 10.

---

## 15. AVOIDING SCALED CONTENT ABUSE — content-seeding discipline

This governs how you (or the admin user) populate `cities`, `countries`, and `surahs` data — not just code:

**Do:**
- Write each city/country's `local_context_note` as genuinely different narrative — vary the angle (local holiday observance, local mosque practice, local population context), never the same paragraph with the noun swapped.
- Lead with real, accurate, verifiable data (correct moon-sighting authority per country, correct calculation method per city).
- Ship the Hijri-Gregorian converter as a real interactive feature (Section 7, Template H) — this is explicitly called out as the kind of "real utility" Google rewards.
- Seed content in the realistic waves defined in Section 19, not all at once.

**Don't:**
- Don't auto-generate the same paragraph across 50 cities via find-and-replace, even though that would be technically trivial in a database-driven build — this is exactly the failure mode the strategy doc warns about.
- Don't ship a visible keyword-stuffed "tags" block (jamiafaridiasahiwal's pattern) — it's flagged as a low-value-content signal to avoid copying, even though it currently appears on a ranking competitor page.
- Don't emit `FAQPage` schema for FAQs that aren't visibly rendered on the page.
- Don't fabricate Hadith citations or invented statistics to pad word count.

---

## 16. BILINGUAL (URDU + ENGLISH) IMPLEMENTATION

- Implement **Option A from the strategy doc**: true parallel routes under `/ur/...` mirroring every cluster route in Section 5, each rendering fully translated content (not just the date numerals) from the bilingual schema described in Section 6.
- Visible **language switcher** component (Section 8) on every page, linked via correct `hreflang` pairs (Section 12).
- In the **English-language pages' body copy**, naturally include Roman Urdu query phrasing (e.g. "chand ki tarikh", "aaj ki islamic tareekh") where it fits the explanatory paragraphs — this targets a phrasing pattern neither competitor fully owns.
- The uploaded design is already `lang="ur"` at the `<html>` level on a primarily-English-labelled UI — standardize this: `lang="en"` on `/...` routes, `lang="ur" dir="rtl"` on `/ur/...` routes (true Urdu script pages need `dir="rtl"`, unlike the current file's `dir="ltr"`).

---

## 17. ADMIN PANEL REQUIREMENTS

Build authenticated CRUD screens (Laravel Filament recommended for speed, or a hand-built `/admin` area — verify Filament's current version/fit at build time) for:

- Countries, Cities (with the unique-narrative `local_context_note` field clearly labeled as required, not optional, to discourage thin entries).
- Surahs, Surah Ayahs (if normalized), Fazilat entries (with `verification_status` enum enforced in the UI).
- Hijri Months, Islamic Events, Hadith Topics.
- Authors, Scholars, and the polymorphic `content_reviews` linking screen.
- Comments moderation queue (approve/reject/spam).
- `seo_meta` override screen, searchable by page.
- Contact messages inbox, newsletter subscriber export.
- `site_settings` (social links, default OG image, site name, contact email).

---

## 18. SECURITY & PERFORMANCE

- CSRF tokens on all AJAX POSTs (Laravel default `@csrf` + meta tag pattern already compatible with the existing vanilla-JS structure).
- Rate-limit all public AJAX endpoints (`throttle:contact`, `throttle:comments`, etc.).
- Honeypot field or equivalent on contact/comment/newsletter forms (no need for an intrusive CAPTCHA unless spam volume demands it later).
- Validate and sanitize all comment input before storage; never trust client-side validation alone.
- `.env` correctly excludes secrets from version control; document required keys (`ALADHAN_API_KEY` if applicable, mail driver, DB credentials) in `DECISIONS.md`.
- Image optimization pipeline (WebP conversion) for any uploaded admin images (author photos, OG images).
- Response caching (route-cache or full-page cache with a short TTL) on the data-heavy daily pages to keep LCP under target without sacrificing freshness.

---

## 19. BUILD PHASES (map the 90-day content roadmap onto dev work — build in this order)

| Phase | What to build | Output |
|---|---|---|
| **Phase 0 — Setup** | Laravel project scaffold, DB connection, Vite asset pipeline with the lifted design tokens/CSS, base layout + navbar/footer from Section 8 | A working homepage shell with the real navbar wired to placeholder routes |
| **Phase 1 — Foundation** | All migrations from Section 6, all models + relationships, `robots.txt`, sitemap skeleton, GSC-ready meta/schema service from Section 12, About/Contact/Privacy pages, Author/Scholar admin screens | Technical SEO foundation live and testable in Google's Rich Results Test |
| **Phase 2 — Wave 1** | Islamic Date hub + Pakistan country page + top 5 city pages, Prayer Times hub + top 5 cities, Sehri/Iftar for top 5 cities, the Hijri-Gregorian Converter (Template H, real AJAX), homepage made fully dynamic (real prayer ticker, real Hijri date, contact form + newsletter wired to real endpoints) | ~40–60 working pages, core AJAX features functional |
| **Phase 3 — Wave 2** | Remaining priority country pages, remaining city prayer pages, top 15 Surah pages (Yaseen, Mulk, Rahman, Muzammil, Waqiah first) + their Fazilat pages, comments system live and moderated | ~150–200 pages |
| **Phase 4 — Wave 3** | All 12 Hijri month pages, remaining Surah pages, Hadith topic pages, `/ur/` parallel routes for the top 30 highest-priority URLs | ~300–350 pages |
| **Phase 5 — Wave 4 / hardening** | Remaining long-tail city/Surah coverage, full bilingual coverage, admin panel polish, performance pass (Core Web Vitals audit + fixes), security review, final sitemap/schema validation across every template | Launch-ready |

Each phase must end with: a working build, passing schema validation (Rich Results Test) on every new template type, and a sitemap that accurately reflects only real, live, internally-linked URLs — never sitemap-only orphan pages.

---

## 20. DEFINITION OF DONE — acceptance checklist

- [ ] Zero static/hardcoded data remains in any Blade view that should come from the database (prayer times, Hijri date, Quran verses, events).
- [ ] Every page in Section 7 implements its exact title/meta/H-tag/schema/word-count spec.
- [ ] No client-rendered-only primary content anywhere (Section 9 verified by viewing page source, not just DevTools-rendered DOM).
- [ ] All AJAX endpoints in Section 10 are functional, validated, rate-limited, and CSRF-protected.
- [ ] Sitemap, robots.txt, canonical tags, and hreflang pairs are correct and pass validation.
- [ ] Every templated content page has a genuinely unique narrative paragraph (manual spot-check across at least 5 city pages).
- [ ] Author/Scholar EEAT blocks render correctly wherever populated.
- [ ] Core Web Vitals targets met on at least the homepage and one page per cluster (Lighthouse audit attached to `DECISIONS.md`).
- [ ] `/ur/` bilingual routes exist and are correctly tagged with `hreflang`.
- [ ] Admin panel can fully manage every content type without a developer touching the database directly.

---

## 21. APPENDIX — WAVE 1 SEED PRIORITY (from the keyword research, condensed)

Seed these first, since they map to the highest-priority keywords identified in the research:

- **Prayer Times cities (High priority):** Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad.
- **Sehri/Iftar cities:** Karachi, Lahore, Islamabad, Faisalabad, Hyderabad.
- **Islamic Date countries:** Pakistan (with Karachi/Lahore/Islamabad city pages), then Saudi Arabia, UAE, USA, UK, Canada.
- **Surahs (High priority first):** Muzammil, Yaseen, Mulk, Rahman, Waqiah — each with its Fazilat page.
- **Converter tool:** ship in Wave 1, embedded into the Pakistan Islamic Date page as well as its own `/hijri-gregorian-converter` page.

---

## 22. FINAL DIRECTIVE

Re-read Sections 3, 9, and 15 before generating any new page template or seeding any new content batch — they are the rules most likely to be silently violated by an agent optimizing for speed (client-rendering content for convenience, or spinning city paragraphs to save time). Every page you ship must pass: *"Would this survive a manual Google quality-rater review, not just a bot crawl?"*
