You are working on a Laravel 10+ Islamic website called "Noor-e-Islam" (repository: https://github.com/noormuhammad2k20-a11y/islamicweb). The database schema has been fully analyzed. DO NOT change any existing theme, color scheme, CSS, or design. Only add missing features, pages, routes, controllers, models, seeders, and Blade views — all must integrate seamlessly into the existing layout.

\=== DATABASE TABLES (already exist — do NOT recreate) ===

\- authors, cache, cities, comments, contact\_messages, content\_reviews, countries

\- duas, dua\_categories, dua\_dua\_category, fazilat\_entries, hadith\_topics

\- hajj\_guides, hajj\_steps, hijri\_date\_caches, hijri\_months, historical\_events

\- islamic\_events, islamic\_names, knowledge\_articles, knowledge\_categories

\- namaz\_guides, namaz\_steps, prayer\_times, ramadan\_timings, scholars

\- seo\_metas, site\_settings, subscribers, surahs (114 complete with audio URLs)

\- surah\_ayahs, users, zakat\_configs

\=== HOMEPAGE — enhance existing homepage, keep same layout, add ALL sections below ===

The homepage must display the following live widgets/sections, all functional:

1\. Live Prayer Times widget (auto-detect city via browser geolocation, fallback to Karachi)

2\. Today's Hijri date (from hijri\_date\_caches table)

3\. Ayah of the Day (random ayah from surah\_ayahs with Arabic, Urdu, English)

4\. 99 Names of Allah quick browse (grid of 99 cards)

5\. Quick links: Quran, Duas, Prayer Times, Muslim Names, Hadith, Calculators, Hijri Calendar

6\. Featured Surahs carousel (Al-Fatiha, Al-Baqarah, Yaseen, Al-Mulk, Al-Kahf, Al-Rahman)

7\. Latest Articles section (from knowledge\_articles)

8\. Islamic Events / Upcoming Dates (from islamic\_events)

9\. Ramadan Countdown widget (live days/hours countdown to next Ramadan)

10\. Search bar (global search across surahs, duas, names, articles, hadith)

\=== QURAN SECTION (114 Surah Pages) ===

Route: /quran → Index page showing all 114 surahs in a beautiful grid

Route: /quran/{slug} → Individual Surah page with:

\- Surah name (Arabic + English), number, ayah count, Meccan/Medinan, Juz

\- Embedded audio player (use existing audio\_url from surahs table — quranicaudio.com MP3s)

\- All Ayahs listed: Arabic text + Urdu translation + English translation (from surah\_ayahs)

\- Ayah-by-ayah copy button, share button

\- Fazilat/virtues section (from fazilat\_entries table linked to surah)

\- SEO meta from seo\_metas table (polymorphic: metaable\_type = App\\Models\\Surah)

\- Next/Previous Surah navigation buttons

\- Breadcrumb navigation

Route: /quran/{surah\_slug}/ayah/{ayah\_number} → Individual Ayah page with:

\- Arabic text (large, beautiful Arabic font)

\- Urdu translation

\- English translation

\- Share buttons (WhatsApp, Twitter, Copy)

\- Related duas if any

\- SEO: "Surah \[Name\] Ayah \[N\] in Arabic, Urdu and English"

\=== 99 NAMES OF ALLAH ===

Add migration + model for \`allah\_names\` table with fields:

number(int), arabic(text), transliteration(varchar), meaning\_english(text), meaning\_urdu(text), benefits(text), slug(varchar unique)

Seed all 99 names.

Route: /99-names-of-allah → Grid page of all 99 names

Route: /99-names-of-allah/{slug} → Individual name page with Arabic, transliteration, meanings, benefits, hadith reference

SEO optimized title/description for each page.

\=== MUSLIM NAMES SECTION ===

Add migration for \`islamic\_names\` table (already exists) with these fields if missing:

name(varchar), arabic(varchar), urdu(varchar), meaning(text), origin(varchar), gender(enum: male/female/unisex), first\_letter(varchar), slug(varchar unique), religion\_note(text), is\_popular(boolean)

Seed 500+ Islamic names (male and female).

Routes:

/muslim-names → Main page with filters (male/female/alphabetical/origin)

/muslim-names/boys → All male names

/muslim-names/girls → All female names

/muslim-names/by-letter/{letter} → Names starting with A-Z

/muslim-names/{slug} → Individual name page (name, meaning, Arabic, Urdu, origin, gender, similar names)

All pages SEO optimized. Schema markup (Person schema for name pages).

\=== DUA PAGES ===

Existing tables: duas, dua\_categories, dua\_dua\_category

Routes:

/duas → All categories grid

/duas/{category-slug} → Duas in a category

/duas/{dua-slug} → Individual Dua page:

\- Arabic text (large, calligraphy style)

\- Transliteration

\- English + Urdu translation

\- Reference source

\- Audio player (if available)

\- Copy button, share button, Bookmark button

\- Related duas

\- Comments section (from comments table, polymorphic)

Seed at least 500+ duas across all categories.

\=== HADITH SECTION ===

Existing table: hadith\_topics (slug, name, description)

Add migration for \`hadiths\` table:

topic\_id(FK), arabic\_text(text), english\_translation(text), urdu\_translation(text), reference(varchar), grade(varchar), slug(varchar unique), book\_name(varchar), chapter(varchar)

Seed 500+ hadiths across topics.

Routes:

/hadith → All topics grid

/hadith/{topic-slug} → Hadiths in topic

/hadith/{topic-slug}/{hadith-slug} → Individual Hadith page

SEO: "Hadith on \[Topic\] — \[Book Reference\]"

\=== PRAYER TIMES SECTION ===

Existing tables: prayer\_times (city\_id, date, fajr, sunrise, dhuhr, asr, maghrib, isha, calc\_method), cities, countries

Routes:

/prayer-times → Redirect to detected or selected city

/prayer-times/{country-slug} → Country page listing all cities

/prayer-times/{country-slug}/{city-slug} → City Prayer Times page:

\- Today's prayer times (fajr, sunrise, dhuhr, asr, maghrib, isha) in a beautiful card layout

\- Live countdown to next prayer

\- Monthly prayer timetable (all dates in prayer\_times for this city)

\- Download/Print timetable button

\- City info, timezone, calculation method

\- Ramadan timings if available

SEO: "Prayer Times in \[City\], \[Country\] Today | \[Date\]"

For cities/dates not in DB, fallback to AlAdhan API:

https://api.aladhan.com/v1/timingsByCity?city={city}&country={country}&method=1

\=== HIJRI CALENDAR ===

Existing table: hijri\_date\_caches (gregorian\_date, hijri\_day, hijri\_month, hijri\_month\_number, hijri\_year)

Routes:

/hijri-calendar → Current month Hijri calendar

/hijri-calendar/{year} → Full Hijri year calendar

/hijri-calendar/{year}/{month} → Specific Hijri month calendar

/hijri-calendar/today → Today's Hijri date with converter widget

Features:

\- Beautiful calendar grid showing Hijri dates alongside Gregorian

\- Islamic events highlighted (from islamic\_events table)

\- Hijri-to-Gregorian converter (live JavaScript)

\- Gregorian-to-Hijri converter

\- Next/Prev month navigation

\=== ISLAMIC CALCULATORS (100+ utilities) ===

Route: /calculators → Grid of all calculators

Implement each as a fully functional page with JS logic:

1\. /calculators/zakat → Zakat Calculator

\- Inputs: gold weight, silver weight, cash, business assets, receivables, debts

\- Use zakat\_configs table for gold/silver prices

\- Calculate nisab threshold, eligible amount, 2.5% zakat

2\. /calculators/zakat-on-gold → Gold Zakat specifically

3\. /calculators/zakat-on-silver → Silver Zakat

4\. /calculators/zakat-on-savings → Savings Zakat

5\. /calculators/fidya → Fidya Calculator (missed fasts)

6\. /calculators/kaffarah → Kaffarah Calculator

7\. /calculators/sadaqah → Sadaqah guidance

8\. /calculators/mahr → Mahr/Dowry Calculator

9\. /calculators/inheritance → Islamic Inheritance Calculator (Mirath)

\- Inputs: total estate, surviving relatives (spouse, sons, daughters, father, mother, etc.)

\- Apply Quran-based inheritance shares (Faraid)

10\. /calculators/hijri-converter → Hijri-Gregorian Date Converter

11\. /calculators/prayer-time-estimator → Prayer time estimator by coordinates

12\. /calculators/qibla-direction → Qibla Direction (using browser geolocation + compass bearing)

13\. /calculators/tahajjud-time → Last third of night calculator

14\. /calculators/fasting-hours → Fasting hours by city and date

15\. /calculators/age-in-hijri → Age in Hijri years

16\. /calculators/names-numerology → Islamic name numerology (Abjad)

17\. /calculators/tasbih-counter → Digital Tasbih counter (click to count, reset)

18\. /calculators/ramadan-tracker → Ramadan fasting tracker

19\. /calculators/istikhara → Istikhara guide (not a calculator but utility)

20\. /calculators/quran-reading-plan → Quran completion planner (finish in X days)

Add 80+ more calculators/utilities related to Islamic finance, worship, family law.

\=== NAMAZ GUIDE ===

Existing tables: namaz\_guides, namaz\_steps

Route: /namaz-guide → Overview of all namaz types

Route: /namaz-guide/{slug} → Step-by-step guide for Fajr/Zuhr/Asr/Maghrib/Isha/Jumuah/Witr/Taraweeh

\- Each step with Arabic dua, transliteration, translation, image placeholder

\- Rakah count, required/sunnah/nafil label

\=== HAJJ & UMRAH GUIDE ===

Existing tables: hajj\_guides, hajj\_steps

Route: /hajj-guide → Complete Hajj guide

Route: /hajj-guide/{guide-slug} → Individual guide (Hajj steps, Umrah steps, Ihram, Tawaf, etc.)

Route: /umrah-guide → Umrah guide

Route: /hajj-guide/{guide-slug}/{step-id} → Individual step page

\=== KNOWLEDGE BASE / ARTICLES ===

Existing tables: knowledge\_articles, knowledge\_categories

Route: /islamic-knowledge → All categories

Route: /islamic-knowledge/{category-slug} → Articles in category

Route: /islamic-knowledge/{category-slug}/{article-slug} → Full article

\- Author byline (from authors table)

\- Scholar reviewed badge (from content\_reviews + scholars)

\- Published/updated date

\- Comments (from comments table)

\- Related articles

\=== RAMADAN SECTION ===

Existing table: ramadan\_timings (city\_id, date, sehri, iftar)

Route: /ramadan → Ramadan hub page

Route: /ramadan/timings → City selector for Sehri/Iftar

Route: /ramadan/timings/{city-slug} → Full Ramadan timetable for city

Route: /ramadan/calendar → Ramadan calendar with dates

Route: /ramadan/duas → Ramadan specific duas

Route: /ramadan/fasting-rules → Fasting rules and guidelines

\=== ISLAMIC EVENTS / DATES ===

Existing tables: islamic\_events, hijri\_months, historical\_events

Route: /islamic-events → All Islamic events timeline

Route: /islamic-events/{slug} → Individual event page

\=== SEO REQUIREMENTS ===

Every single page must have:

\- Unique tag pulled from seo\_metas table (polymorphic: metaable\_type + metaable\_id)</p><p class="slate-paragraph"> If no record in seo\_metas, auto-generate from page content</p><p class="slate-paragraph">- <meta name="description"> from seo\_metas or auto-generated</p><p class="slate-paragraph">- <meta name="keywords"></p><p class="slate-paragraph">- Open Graph tags (og:title, og:description, og:url, og:image)</p><p class="slate-paragraph">- Twitter Card tags</p><p class="slate-paragraph">- Canonical URL</p><p class="slate-paragraph">- Schema.org structured data:</p><p class="slate-paragraph"> \* Surah pages: Book/Chapter schema</p><p class="slate-paragraph"> \* Dua pages: Article schema</p><p class="slate-paragraph"> \* Prayer Times: Event schema </p><p class="slate-paragraph"> \* Name pages: Person schema</p><p class="slate-paragraph"> \* Calculator pages: WebApplication schema</p><p class="slate-paragraph">- Sitemap.xml route (auto-generated from all routes)</p><p class="slate-paragraph">- robots.txt</p><p class="slate-paragraph">- hreflang for Urdu (ur) and Arabic (ar) if translations available</p><p class="slate-paragraph">- Breadcrumb structured data on all inner pages</p><p class="slate-paragraph"></p><p class="slate-paragraph">=== SEARCH FUNCTIONALITY ===</p><p class="slate-paragraph">Route: /search?q={query}</p><p class="slate-paragraph">- Search across: surahs (name + number), duas (title), islamic\_names (name + meaning), hadith, knowledge\_articles, prayer\_times (city names)</p><p class="slate-paragraph">- Grouped results by category</p><p class="slate-paragraph">- Highlighted matched terms</p><p class="slate-paragraph">- Pagination</p><p class="slate-paragraph"></p><p class="slate-paragraph">=== ADMIN PANEL (keep existing, extend only) ===</p><p class="slate-paragraph">Do not break existing admin. Add admin CRUD for:</p><p class="slate-paragraph">- Allah's 99 Names (if not already)</p><p class="slate-paragraph">- Islamic Names (bulk import CSV + manual add)</p><p class="slate-paragraph">- Hadith Topics + Hadiths (CRUD)</p><p class="slate-paragraph">- Calculators config (zakat\_configs is already there, extend if needed)</p><p class="slate-paragraph">- Sitemap regeneration button</p><p class="slate-paragraph">- SEO meta bulk editor</p><p class="slate-paragraph"></p><p class="slate-paragraph">=== GLOBAL REQUIREMENTS ===</p><p class="slate-paragraph">1. DO NOT change any existing colors, fonts, CSS classes, or theme</p><p class="slate-paragraph">2. All new pages MUST use the existing layout (@extends('layouts.app') or whatever the master layout is)</p><p class="slate-paragraph">3. All new Blade views must match the existing design pattern</p><p class="slate-paragraph">4. All routes must be registered in web.php with proper naming</p><p class="slate-paragraph">5. All controllers must use proper dependency injection and follow existing code patterns</p><p class="slate-paragraph">6. Every new model must have proper $fillable, relationships, sluggable trait if used</p><p class="slate-paragraph">7. Every new migration must use the existing DB charset utf8mb4\_unicode\_ci</p><p class="slate-paragraph">8. All pages must be mobile responsive (existing CSS handles this, just use same classes)</p><p class="slate-paragraph">9. Arabic text must use font: Amiri or Scheherazade (check if already loaded in layout)</p><p class="slate-paragraph">10. Every page must have a proper <h1> tag for SEO</p><p class="slate-paragraph">11. No broken links — every navigation menu item, button, and CTA must point to a real, working route</p><p class="slate-paragraph">12. Implement lazy loading for images</p><p class="slate-paragraph">13. Prayer times must show a "Next Prayer" countdown timer using JavaScript</p><p class="slate-paragraph">14. Quran audio player must be HTML5 <audio> with play/pause/seek controls</p><p class="slate-paragraph">15. All forms (search, contact, subscribe) must have CSRF protection (@csrf)</p><p class="slate-paragraph">16. Comments system: show approved comments, submit form goes to POST /comments with polymorphic type+id</p><p class="slate-paragraph">17. Social share buttons on: Duas, Ayahs, Articles, Hadith, Names pages</p><p class="slate-paragraph">18. Print-friendly CSS for: Prayer timetables, Duas, Surah pages</p><p class="slate-paragraph">19. Copy to clipboard button on: Duas, Ayahs, Hadith</p><p class="slate-paragraph">20. Newsletter subscribe form (stores to subscribers table)</p><p class="slate-paragraph"></p><p class="slate-paragraph">=== MISSING PAGES TO CREATE (add to main navigation menu) ===</p><p class="slate-paragraph">Ensure EVERY one of these is accessible from navbar/footer with working links:</p><p class="slate-paragraph">- Quran (/quran)</p><p class="slate-paragraph">- Surah List (all 114)</p><p class="slate-paragraph">- All Ayahs (browse by surah)</p><p class="slate-paragraph">- Prayer Times (/prayer-times)</p><p class="slate-paragraph">- Duas (/duas)</p><p class="slate-paragraph">- 99 Names of Allah (/99-names-of-allah)</p><p class="slate-paragraph">- Muslim Names (/muslim-names)</p><p class="slate-paragraph">- Hadith (/hadith)</p><p class="slate-paragraph">- Hijri Calendar (/hijri-calendar)</p><p class="slate-paragraph">- Islamic Calculators (/calculators)</p><p class="slate-paragraph">- Zakat Calculator (/calculators/zakat)</p><p class="slate-paragraph">- Qibla Direction (/calculators/qibla-direction)</p><p class="slate-paragraph">- Namaz Guide (/namaz-guide)</p><p class="slate-paragraph">- Hajj Guide (/hajj-guide)</p><p class="slate-paragraph">- Umrah Guide (/umrah-guide)</p><p class="slate-paragraph">- Ramadan (/ramadan)</p><p class="slate-paragraph">- Islamic Events (/islamic-events)</p><p class="slate-paragraph">- Islamic Knowledge (/islamic-knowledge)</p><p class="slate-paragraph">- Search (/search)</p><p class="slate-paragraph">- Contact (/contact)</p><p class="slate-paragraph">- About (/about)</p><p class="slate-paragraph"></p><p class="slate-paragraph">=== IMPLEMENTATION ORDER ===</p><p class="slate-paragraph">Implement in this exact sequence:</p><p class="slate-paragraph">1. New migrations (allah\_names, hadiths, expand islamic\_names if needed)</p><p class="slate-paragraph">2. Seeders for allah\_names (99 entries), hadiths (500+), islamic\_names (500+)</p><p class="slate-paragraph">3. Models with relationships and scopes</p><p class="slate-paragraph">4. Routes (web.php) — all routes with names</p><p class="slate-paragraph">5. Controllers — one per feature module</p><p class="slate-paragraph">6. Blade views — use existing layout, match existing style</p><p class="slate-paragraph">7. SEO: Update seo\_metas seeder for all key pages</p><p class="slate-paragraph">8. Homepage widgets — integrate all 10 sections</p><p class="slate-paragraph">9. Sitemap and robots.txt routes</p><p class="slate-paragraph">10. Admin panel extensions</p><p class="slate-paragraph"></p><p class="slate-paragraph">Begin with Step 1 now. Show each file's complete code. Do not skip any file. Do not use placeholder comments like "// add logic here" — write complete, working code for every function.</p></x-turndown>