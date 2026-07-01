# CONTINUATION PROMPT — Noor-e-Islam: Phase 3–5 (SEO, Keywords, Full Dynamic Completion)

> Yeh poora file copy karke Antigravity ko ek hi prompt ke taur par de dein. Yeh `antigravity-master-prompt.md` ka direct continuation hai — Phase 0, 1, aur 2 (Wave 1 & 2) already complete ho chuke hain (Filament admin live, bilingual `/ur/` routes, Surah/Fazilat/Hadith/Islamic Calendar dynamic). Ab Phase 3–5 complete karna hai.

---

## 0. HARD CONSTRAINT — READ FIRST

**Design, theme, colors, fonts, layout, CSS custom properties — kuch bhi change nahi karna.** Existing visual identity 100% as-is rehni chahiye. Agar kisi naye feature (jaise converter widget, FAQ accordion, breadcrumb bar, language switcher) ke liye koi naya UI element banana zaroori ho, to wo **sirf existing design tokens/CSS custom properties reuse karke** banayein — koi nayi color, naya font, naya spacing-scale, ya naya visual style introduce nahi karna. Jo bhi naya component banaye, wo dekhne mein lagna chahiye jaise wo hamesha se isi theme ka hissa tha.

Is rule ki violation (chahe "improvement" ki niyat se ho) acceptable nahi hai. Agar koi genuine ambiguity ho (e.g. converter widget ka layout), to closest existing component (card/section style) se inherit karein, na ke naya design banayein.

---

## 1. CONTEXT — WHAT'S ALREADY DONE

Confirmed via repo (`noormuhammad2k20-a11y/islamicweb`, `walkthrough.md`):

- Phase 0–1: Laravel scaffold, migrations, models, base layout, SEO meta/schema service skeleton.
- Phase 2 Wave 1 & 2: Surah engine, Fazilat engine, Hadith collections, Islamic Calendar — sab dynamic. Bilingual `/ur/` routing + `SetLocale` middleware live. Filament admin panel live (`/admin`).

**Not yet done (this is your scope now):**
- Dynamic XML sitemap + sitemap index per cluster.
- `robots.txt` generation rules.
- Hijri↔Gregorian converter as a real working AJAX widget (Section 7 Template H, Section 10 of the master prompt).
- Remaining country/city pages (Prayer Times, Islamic Date, Sehri/Iftar) beyond the Wave-1 top-5 cities.
- Remaining Surah + Fazilat pages beyond the first wave.
- Full keyword-to-page mapping audit (every target keyword from `deep-research-report.md` must resolve to exactly one real, live page).
- `seo_meta` override wiring fully tested on every template type (title/meta/canonical/OG/schema fallback chain).
- `hreflang` tag emission across every EN/UR pair.
- Internal linking audit (hub → sibling → cross-cluster, max-depth-3 rule).
- EEAT population (author bios, scholar-reviewer badges wherever real reviewers exist).
- Core Web Vitals + security final pass (Section 18, 20 of master prompt).

---

## 2. OBJECTIVE FOR THIS PHASE

Make the entire site **fully keyword-driven, fully dynamic, and technically complete for SEO** — zero remaining static/hardcoded content, zero missing schema, zero broken internal-linking rule, zero un-mapped target keyword — **without touching any visual design element.**

---

## 3. KEYWORD → PAGE MAPPING (mandatory first step)

1. Extract the **complete long-tail keyword table** from `deep-research-report.md` (the supplementary data source — keywords only, not its URL/architecture decisions, which are superseded).
2. Cross-reference against the **authoritative cluster/URL structure** in `antigravity-master-prompt.md` Section 5.
3. Produce a `KEYWORD_MAP.md` file at the project root: one row per keyword → exact target URL → current status (`live` / `pending-seed` / `pending-build`).
4. Any keyword with no logical home in the existing cluster structure should be flagged, not silently dropped or forced into a mismatched page — list these separately for the user's decision (do not invent new URL clusters yourself).
5. This map becomes your seeding checklist for Section 5 below.

---

## 4. SITEMAP & ROBOTS (Phase 5 system requirement, master prompt Section 12)

- Build `SitemapController` generating `sitemap_index.xml` + per-cluster sub-sitemaps (`sitemap-dates.xml`, `sitemap-prayer.xml`, `sitemap-surah.xml`, `sitemap-hadith.xml`, etc.), sourced live from the database — never from a static list.
- Cache with short TTL or regenerate via scheduled command; `<lastmod>` must reflect real `updated_at`/`last_verified_at`.
- **Never include an orphan URL** — every sitemap entry must also be reachable via real internal links (per Section 13 checklist).
- Generate `robots.txt`: allow Googlebot, disallow `/admin`, `/ajax`, any `?page=`/`?sort=`/filter query params, reference the sitemap index.

---

## 5. CONTENT SEEDING — REMAINING WAVES (master prompt Section 19, Waves 3–4)

Using the `KEYWORD_MAP.md` priority order:

- Remaining priority country pages + their city pages (Prayer Times, Islamic Date, Sehri/Iftar).
- Remaining Surah pages (after Muzammil/Yaseen/Mulk/Rahman/Waqiah) + their Fazilat pages.
- All 12 Hijri month pages (if not already fully seeded).
- Hadith topic pages — expand coverage per keyword map.
- `/ur/` parallel routes for every page seeded above, not just the original top-30.

**Non-negotiable per master prompt Section 15:**
- Every city/country/Surah `local_context_note` (or equivalent unique paragraph) must be genuinely distinct — no find-and-replace spinning. Vary the angle: local moon-sighting practice, local mosque custom, local population context, etc.
- Real, verifiable data only (correct moon-sighting authority, correct calc method per city). Never fabricate Hadith references — use `verification_status = commonly_cited` where unverifiable, never invent a citation.
- Seed in batches, not one bulk dump — commit/checkpoint per cluster so it stays reviewable.

---

## 6. SEO TECHNICAL COMPLETION (master prompt Section 12–13)

- Audit every controller: confirm `SeoMeta` service is called, `seo_meta` override table takes priority, per-template formula (master prompt Section 7) is the fallback — test with at least one override and one fallback case per template type.
- Confirm every schema Blade component (`webpage`, `faq`, `article`, `breadcrumb`, `organization`, `event`) only emits schema for content **actually visible on that page** — run Google's Rich Results Test against one URL per cluster and fix mismatches.
- Emit `hreflang="en"` / `hreflang="ur"` / `hreflang="x-default"` on every page that has a `/ur/` counterpart; verify both directions (EN→UR and UR→EN) are present and correct.
- Self-canonicalize EN and UR pages (per Section 12 — they're distinct translated content, not duplicates).
- Confirm title tags remain unique across the whole site (DB-level unique constraint or validation) — re-check after this wave's seeding, since this is explicitly flagged as the #1 spinning risk.

---

## 7. INTERNAL LINKING AUDIT

For every newly seeded and every previously existing leaf page, verify (per Section 3/13 of the master prompt):
- Link to its parent hub.
- ≥2 sibling links within its own cluster.
- ≥1 cross-cluster link.
- Link to the Hijri-Gregorian converter tool where relevant (Islamic Date cluster especially).
- Max 3 clicks from homepage to any page — if any page violates this, fix the hub/listing pages' pagination or grouping (not by adding a hidden sitemap-only link).

Build this as a small internal Artisan command (`php artisan seo:audit-links`) that reports violations, so it's repeatable as new content is added later.

---

## 8. HIJRI–GREGORIAN CONVERTER (real working feature, master prompt Section 7 Template H + Section 10)

- Build the real AJAX endpoint `GET /ajax/hijri-convert?date=...&direction=...`, server-side calculation/cache-backed, JSON response.
- Build the `/hijri-gregorian-converter` standalone page AND embed the same widget inside the Pakistan Islamic Date page.
- Widget UI must use **existing design tokens only** — same input/button/card styling already present elsewhere on the site (reuse the existing form/card component patterns from the contact form or city-search component, do not invent new visual treatment).
- No full page reload on conversion — result renders inline via the existing toast/inline-feedback pattern already used elsewhere in the JS.

---

## 9. EEAT COMPLETION (master prompt Section 14)

- Populate `authors` records and ensure every content page's author box renders from real data, not placeholder text.
- For Surah/Fazilat/Hadith pages, wire `content_reviews` to real `scholars` entries **only where a real reviewer actually exists** — leave the badge logic built but hidden/unpopulated otherwise (never fake a scholar review).
- Confirm `Organization` schema `sameAs` links to the real social URLs already in `site_settings`.

---

## 10. FINAL TECHNICAL PASS (master prompt Section 18, 20)

- Lighthouse audit on homepage + one page per cluster; fix any LCP/INP/CLS regression introduced by new content (without altering visual design — fix via lazy-loading, image sizing, deferred JS, not by changing layout).
- Confirm CSRF + rate limiting + honeypot still active on all AJAX endpoints after this wave's additions.
- Re-run the full Definition of Done checklist (master prompt Section 20) and report status against every line item in a `PHASE_3_5_COMPLETION.md` file.

---

## 11. WHAT NOT TO DO (repeat of the hard constraints — do not violate)

- Do not change any color, font, spacing, layout, or visual component style anywhere on the site.
- Do not introduce a new design language for new pages/widgets — extend the existing one only.
- Do not auto-spin city/country/Surah paragraphs via templating tricks.
- Do not emit `FAQPage` schema for FAQ content that isn't visibly rendered.
- Do not bulk-dump all remaining pages in one commit — follow the wave structure.
- Do not invent new URL clusters to "fit" a leftover keyword — flag it for the user instead.

---

## 12. DELIVERABLES AT THE END OF THIS PHASE

1. `KEYWORD_MAP.md` — every target keyword mapped to a live URL.
2. Working dynamic sitemap + robots.txt.
3. Working Hijri-Gregorian converter (page + embedded widget).
4. All Wave 3–4 content seeded with genuinely unique narrative text.
5. `hreflang`/canonical verified across all EN/UR pairs.
6. Internal-linking audit command + clean report.
7. `PHASE_3_5_COMPLETION.md` mapping every Section 20 checklist item to its current status.
8. Zero visual/design changes — confirm this explicitly in your summary to the user.
