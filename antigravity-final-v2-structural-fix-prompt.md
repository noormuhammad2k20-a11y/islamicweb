# FINAL PROMPT v2 — Fix Structural Mismatch + Request-Time Freshness (Competitor-Verified)

> Yeh poora file Antigravity ko ek prompt ke taur par dein. Yeh pichle saare prompts ka **correction + final execution** version hai, based on **live URL-by-URL analysis** of hamariweb.com/islam and jamiafaridiasahiwal.com — not assumptions, actual observed structure.

---

## 0. HARD CONSTRAINT — UNCHANGED

Design/theme/colors/layout/fonts ko bilkul touch nahi karna. Sirf architecture, routing, caching, aur content ki baat hai.

---

## 1. CRITICAL FINDING — WHY THE SITE STILL LOOKS/BEHAVES STATIC

Do alag confirmed root causes hain — dono fix karne hain:

### 1A. Caching/freshness bug (the page never actually updates)
Competitors that currently outrank weaker sites explicitly solve this: **the Islamic-date HTML must be generated fresh on every request (or cache invalidated precisely at local Maghrib/midnight), never served from a stale cached snapshot.**

**Action — verify and fix:**
1. Open every controller/view tied to Hijri date, prayer times, "currently active prayer" — check for `Cache::remember(...)` calls. Confirm TTL is short and tied to a real invalidation event (new day / new prayer_times row inserted), not an arbitrary long TTL (e.g. never `->remember('key', 86400*7, ...)` style long caches on date-sensitive data).



2. Confirm `RefreshIslamicData` scheduled command is **actually executing automatically** — run `php artisan schedule:list`, then check the server's real crontab entry (`crontab -l` on the production server, or the hosting panel's cron job log) — not just confirm the artisan command exists, confirm it has fired automatically in the last 24 hours without you triggering it manually.


3. Add a visible `<!-- generated_at: {timestamp} -->` HTML comment (no visual UI change, just hidden in source) on the homepage and the Islamic Date pages during this debugging phase, so you and the user can literally view-source and see whether the timestamp updates on each request/day. Remove once confirmed working, or keep as a permanent internal debug marker if harmless.


4. Confirm response/full-page caching (if any reverse proxy, OPcache, or route-cache layer is involved) isn't caching the rendered HTML output itself for longer than the data changes — full-page cache TTL on date-sensitive pages must be ≤ the freshness requirement (e.g. a few hours, invalidated at local day-change), never a multi-day cache.

### 1B. Architecture mismatch — nested city pages for Islamic Date don't match real search behavior or real data variance

Confirmed by direct competitor inspection: **the Hijri/Islamic date is the same for an entire country** (it depends on the national moon-sighting authority, not the city). Hamariweb's actual top-ranking pages are **one flat page per country** (`today-islamic-date-in-pakistan.aspx`, `today-islamic-date-in-usa.aspx`, etc.) that **lists cities inline as text within that single page**, never as separate per-city URLs.


Our original master prompt's nested `/islamic-date-today/{country}/{city}` route is **structurally wrong for this specific cluster** — it would create dozens of pages that are 95% identical (same date, same month content, only the city name swapped), which is exactly the Scaled Content Abuse pattern the original master prompt itself warned against in Section 15. This is very likely a real reason new content isn't ranking even where it's seeded.


**Action — restructure this one cluster only:**
1. Change the Islamic Date cluster to a **flat URL per country only**: `/islamic-date-today/{country:slug}` — e.g. `/islamic-date-today/pakistan`, matching the exact phrasing pattern `today islamic date in {country}` that real search queries and top-ranking competitor titles use.


2. **Remove** the separate `/islamic-date-today/{country}/{city}` route entirely from this cluster. Instead, render a **"Today's Date in Major Cities of {Country}"** section inside the single country page — a simple list/table of city names (reusing the existing list/table component styling), since the date value is identical for all of them; this still captures city-name long-tail search intent without creating duplicate pages.


3. **Do not apply this change to Prayer Times or Sehri/Iftar clusters** — those genuinely vary by city (latitude/longitude/calculation method), so the existing nested `/prayer-times/{city}` and `/ramadan/{year}/sehri-iftar/{city}` routes are correct and must stay as-is.
4. Update the sitemap generator, internal-linking audit command, and `hreflang` logic to reflect the removed city-level Islamic Date routes (redirect any already-indexed old city-level Islamic Date URLs with a 301 to the parent country page — never leave a 404 for a URL Google may have already crawled).

---

## 2. URL & TITLE PATTERN — MATCH REAL SEARCH PHRASING EXACTLY

Observed top-ranking title/URL patterns (use as the literal formula, not just inspiration):

| Cluster | URL pattern to use | Title formula |
|---|---|---|
| Islamic Date (country) | `/islamic-date-today/{country}` | `Islamic Date Today in {Country} — {HijriDay} {HijriMonth} {HijriYear} AH` |
| Islamic Date (worldwide hub) | `/islamic-date-today` | `Islamic Date Today — Hijri Date Worldwide, {HijriDay} {HijriMonth} {HijriYear}` |
| Prayer Times (city) | `/prayer-times/{city}` | `{City} Prayer Times Today — Fajr, Dhuhr, Asr, Maghrib, Isha` |
| Sehri/Iftar (city) | `/ramadan/{year}/sehri-iftar/{city}` | `Sehri & Iftar Time in {City} Today — Ramadan {Year}` |
| Converter | `/hijri-gregorian-converter` | `Hijri to Gregorian Date Converter — Free Online Tool` |

This matches exactly how the top-ranking competitor pages phrase both URL and `<title>` — a structural ranking factor, not decoration.

---

## 3. VISIBLE FAQ CONTENT — MATCH REAL QUERY PATTERNS

Top-ranking newer competitors are winning partly through FAQ blocks that answer the **actual differential confusion** users search for, not generic filler. Implement these exact-style Q&As (rewritten in your own words, never copied) as visible H3+paragraph blocks with `FAQPage` schema, on the relevant pages:

- *Why does today's Islamic date differ between {Country} and Saudi Arabia?* (Islamic Date country pages)
- *What is the difference between the Umm al-Qura calendar and local moon-sighting?* (Islamic Date hub + converter page)
- *Why does the Islamic day start at sunset, not midnight?* (Islamic Date hub)
- *Why do Hijri dates shift earlier each Gregorian year?* (Islamic Date hub)
- *Which moon-sighting authority does {Country} follow?* (already in the original spec — keep)

---

## 4. RE-VERIFY EVERYTHING FROM THE PREVIOUS PHASE, WITH PROOF

Before claiming this phase complete, Antigravity must show, not just state:

1. Screenshot or pasted output of `crontab -l` (or hosting panel scheduled-task screen) showing the scheduler entry is live on the actual production server.
2. Two consecutive days of `hijri_date_caches`/`prayer_times` rows with `fetched_at` timestamps roughly 24 hours apart, generated **without manual trigger** — proof the cron is really running unattended.
3. A before/after row count table for `countries`, `cities`, `surahs`, `hadith_topics`, `islamic_events`, exactly like the previous `STATUS_REPORT.md` format, now updated.
4. Confirmation that the Islamic Date cluster has been restructured per Section 1B, with old city-level URLs 301-redirected (list the redirects).
5. View-source proof (paste the relevant HTML snippet) that the homepage's Hijri date / prayer ticker is reading live DB values, not a hardcoded Blade array.

---

## 5. WHAT NOT TO DO

- Do not re-seed or re-architect Prayer Times / Sehri-Iftar city pages — they are correctly structured already; only the Islamic Date cluster has the nested-city problem.
- Do not just say "done" again without the proof items in Section 4 — the last two completion reports were not verifiable and the underlying problem persisted.
- Do not touch design/theme/colors/layout.
- Do not add backlinks or rely on any off-page tactic.
- Do not fabricate FAQ answers or citations — paraphrase the real explanatory facts in your own words.

---

## 6. DELIVERABLE

An updated `STATUS_REPORT.md` containing all 5 proof items from Section 4, plus a short note confirming the Islamic Date cluster URL change is live and the sitemap reflects it.
