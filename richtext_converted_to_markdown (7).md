Ye Prompt 1 ka continuation hai. Pehle wali prompt mein structure ban gaya.

Ab ye 3 cheezen karo:

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📦 PART A: LIBRARIES INSTALL KARO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Project root mein ye commands run karo:

composer require islamic-network/adhan

composer require nesbot/carbon

composer require uploder/hijri-date

composer require league/geotools

Verify karo ke sab install ho gaye:

composer show | grep -E "adhan|carbon|hijri|geotools"

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📊 PART B: REAL KEYWORD DATA — EXACT KEYWORDS

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Ye actual competitor research ke keywords hain jinhe PAGE mein use karna hai.

Inhe sirf meta ya H1 mein nahi — CONTENT, FAQ, H2, H3 sab jagah naturally

lagana hai. Volume ke hisaab se:

🔴 TIER 1 — 15,000+ Monthly Searches (MUST rank):

\- fajr time lahore (71,500/mo)

\- prayer time in lahore (31,500/mo)

\- namaz timing in lahore (31,500/mo)

\- maghrib time lahore (22,140/mo)

\- fajr time (10,050/mo) — generic

\- isha time in lahore (10,050/mo)

\- namaz time (9,200/mo) — generic

\- asr prayer time (6,030/mo)

\- isha namaz time (5,500/mo)

\- zohar namaz time (5,500/mo)

\- azan time lahore (5,445/mo)

🟠 TIER 2 — 5,000–15,000 Monthly Searches:

\- asr time lahore

\- fajar namaz time in lahore

\- fajr time lahore today

\- fajr namaz time lahore

\- azan time in lahore

\- fajar ka time

\- namaz time today

\- fajr namaz time

\- fajr prayer time

\- maghrib time today

\- namaz timing in lahore hanafi

\- fajr azan time lahore

\- today fajr time lahore

\- asar namaz time lahore

\- namaz timing in lahore today

🟡 TIER 3 — 1,000–5,000 Monthly Searches (Long tail gold):

\- fajar — exact word (image pack trigger karta hai)

\- maghrib namaz time

\- namaz fajar ka time

\- maghrib prayer time

\- fajr azan time

\- zuhr time lahore

\- prayers time lahore

\- namaz fajar ka time lahore

\- fajar namaz timing

\- fajr qaza time lahore

\- fajr end time

\- today namaz timing lahore

\- zuhr time

\- namaz timing in lahore ahle sunnat ← IMPORTANT separate audience

\- isha namaz time lahore

\- fajr prayer time in lahore

\- maghrib azan time lahore

\- maghrib namaz (image pack)

\- azan time (generic high vol)

\- namaz e fajr time

\- fajar ki namaz ka time

\- asar ki namaz ka waqt

\- namaz time table (image pack target)

\- isha azan time (23 searches rank)

\- dhuhr time (13 rank position)

\- jumma time in lahore ← Jummah special page bhi chahiye

\- juma time in lahore

\- shia fajr time lahore ← Shia audience alag

\- today prayer timing lahore

\- namaz timing lahore fajr

\- fajr start time today

\- current namaz timing in lahore

\- fajr jamaat timing in lahore ← Jamaat time alag feature chahiye

\- pakistan fajr time ← National level keyword

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🔧 PART C: IN KEYWORDS KO PAGE MEIN LAGAO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Blade view mein ye exact changes karo:

\--- 1. META TITLE (dynamic per city, Lahore example):

Namaz Timing Lahore Today {{ date }} | Fajr Time Lahore | Azan Time Lahore | Prayer Times Lahore

\--- 2. META DESCRIPTION (150–160 chars, dynamic):

"Namaz timing Lahore today {{ date }}. Fajr time Lahore {{ fajr\_time }},

Maghrib {{ maghrib\_time }}. Azan time, Zohar, Asr, Isha timings. Hanafi &

Shafi. Monthly timetable. Hijri date {{ hijri }}."

\--- 3. H1 (ONE per page, city-specific):

Namaz Timing {{ city }} Today | Prayer Times {{ city }} | اوقاتِ نماز {{ city }}
================================================================================

\--- 4. H2 HEADINGS (ye exact phrases use karo as H2s):

\- "Fajr Time {{ city }} Today — فجر کا وقت"

\- "Azan Time {{ city }} — اذان کا وقت"

\- "Namaz Time Today {{ city }} — آج کی نماز"

\- "Zuhr / Zohar Namaz Time {{ city }}"

\- "Asr Time {{ city }} — عصر کا وقت"

\- "Maghrib Time {{ city }} Today"

\- "Isha Namaz Time {{ city }}"

\- "Monthly Prayer Timetable {{ city }} — ماہانہ نماز شیڈول"

\- "Fajr End Time {{ city }} — فجر کا آخری وقت"

\--- 5. SEO PARAGRAPH (page ke bottom mein, keyword-rich):

Namaz Timing {{ city }} — Complete Prayer Times Guide
-----------------------------------------------------

**Namaz timing {{ city }}** today

{{ date }}. Aaj {{ city }} mein

**fajr time {{ city }}**

{{ fajr\_time }} hai. **Fajr namaz time**

Pakistan mein Karachi method se calculate hoti hai.

**Fajr ka time** ya

**fajar ki namaz ka time**

roz thoda badalta hai — ye page daily auto-update hota hai.

**Azan time {{ city }}** —

**Zohar namaz time** {{ dhuhr\_time }},

**Asr time {{ city }}** {{ asr\_time }},

**Maghrib time {{ city }}** {{ maghrib\_time }},

**Isha namaz time** {{ isha\_time }}.

Ye **namaz time today** ke liye complete schedule hai.

**Namaz timing {{ city }} Hanafi** aur

**namaz timing {{ city }} ahle sunnat** ke liye

Karachi method use hoti hai. Asr time Hanafi aur Shafi mein

farq hota hai — upar selector se change kar saktay hain.

**Fajr end time {{ city }}**

(آخری وقتِ فجر) sunrise par hota hai jo aaj

{{ sunrise\_time }} hai.

**Jumma time in {{ city }}** — Jummah prayer

Zuhr time ke baad hoti hai. Lahore mein Jumma ki namaz

generally 1:00 PM – 2:30 PM ke darmiyan hoti hai.

**Fajr qaza time {{ city }}** — Fajr ki qaza

Zuhr se pehle ada kar saktay hain.

**Fajr jamaat timing {{ city }}**

masjid se puchein kyunki har masjid ki jamaat alag hoti hai.

**Pakistan fajr time** —

Pakistan mein sab se pehle fajr Chitral aur Gilgit mein

hoti hai aur sab se baad mein Gwadar aur Karachi mein.

**Shia fajr time {{ city }}** bhi is page par

available hai — Shia calculation method alag hoti hai.

Upar "Calculation Method" dropdown se change kar saktay hain.

\--- 6. FAQ QUESTIONS (exact high-volume queries as questions):

### Fajr time lahore today?

Fajr time Lahore today {{ date }} is {{ fajr\_time }}.

Fajar namaz time in Lahore starts at {{ fajr\_time }} and

ends at sunrise {{ sunrise\_time }}. Fajr end time Lahore

today is {{ sunrise\_time }}.

### Namaz timing in Lahore today?

Namaz timing Lahore today {{ date }}:

Fajr {{ fajr }}, Sunrise {{ sunrise }},

Zuhr/Dhuhr {{ dhuhr }}, Asr {{ asr }},

Maghrib {{ maghrib }}, Isha {{ isha }}.

Ye timings Hanafi method ke mutabiq hain.

### Azan time in Lahore today?

Azan time Lahore today: Fajr azan {{ fajr }},

Zohar azan {{ dhuhr }}, Asr azan {{ asr }},

Maghrib azan {{ maghrib }}, Isha azan {{ isha }}.

### Maghrib time Lahore today?

Maghrib time Lahore today {{ date }} is {{ maghrib }}.

Maghrib azan time Lahore is same as Maghrib prayer time.

Maghrib namaz time today changes daily.

### Namaz timing Lahore Hanafi?

Namaz timing Lahore Hanafi method (University of Islamic

Sciences Karachi): Fajr {{ fajr }}, Dhuhr {{ dhuhr }},

Asr {{ asr }} (Hanafi shadow = 2x),

Maghrib {{ maghrib }}, Isha {{ isha }}.

Namaz timing Lahore Ahle Sunnat bhi same Hanafi method hai.

### Fajar ka time kya hai?

Fajar ka time aaj {{ city }} mein {{ fajr }} hai.

Fajar ki namaz ka time subah sadiq se shuru hota hai

aur sunrise tak rehta hai. Aaj fajr end time {{ sunrise }} hai.

### Jumma time in Lahore?

Jumma time in Lahore is at Zuhr time which today is {{ dhuhr }}.

Juma ki namaz Zuhr ke waqt mein ada hoti hai.

Most mosques in Lahore hold Jummah between 1:00 PM and 2:30 PM.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🆕 PART D: 3 EXTRA FEATURES (competitor se aage)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1\. JAMAAT TIMES FEATURE:

\- Prayer cards mein extra row add karo "Jamaat Time"

\- Admin panel se har city ki masjid e quba ki jamaat time

manually set ho sake (ya default +30 min from prayer time)

\- Keyword: "fajr jamaat timing lahore" (search mein hai)

2\. FAJR TOMORROW FEATURE:

\- Page ke bottom mein ek card: "Tomorrow's Fajr Time"

\- Keyword: "fajr time in lahore tomorrow" rank karta hai

\- Code: getNextDayPrayer() function banao

3\. NAMAAZ TIME TABLE (IMAGE):

\- Monthly timetable ka screenshot/image bhi generate karo

\- Google Image Search se traffic aata hai

\- Keyword "namaz time table" image pack show karta hai

\- HTML2Canvas se client-side image download button lagao

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

🌐 PART E: CITY-SPECIFIC PAGE TITLES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Har city page ka title alag hona chahiye. Ye pattern use karo:

getSeoData() function mein ye logic add karo:

$cityTitles = \[

'Lahore' => "Namaz Timing Lahore Today {$dateStr} | Fajr Time Lahore | Azan Time Lahore",

'Karachi' => "Namaz Timing Karachi Today {$dateStr} | Prayer Times Karachi | Fajr Karachi",

'Islamabad' => "Namaz Timing Islamabad Today {$dateStr} | Prayer Times Islamabad | Fajr Time",

'Rawalpindi' => "Namaz Timing Rawalpindi {$dateStr} | Fajr Time Rawalpindi | Azan Time",

'Faisalabad' => "Namaz Timing Faisalabad Today {$dateStr} | Prayer Times Faisalabad",

'Peshawar' => "Namaz Timing Peshawar Today {$dateStr} | Fajr Time Peshawar | Azan",

'Quetta' => "Namaz Timing Quetta Today {$dateStr} | Prayer Times Quetta | Fajr Time",

'Multan' => "Namaz Timing Multan Today {$dateStr} | Fajr Time Multan | Azan Time",

// Baaki sab cities ke liye default:

'default' => "Namaz Timing {$city} Today {$dateStr} | Prayer Times {$city} Pakistan",

\];

return $cityTitles\[$city\] ?? str\_replace(\['{$city}','{$dateStr}'\],

\[$city, $dateStr\], $cityTitles\['default'\]);

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

⚙️ PART F: ROBOTS.TXT + GOOGLE INDEXING

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

public/robots.txt mein ye likho:

User-agent: \*

Allow: /prayer-times

Allow: /prayer-times/

Disallow: /admin

Disallow: /api/

Sitemap: https://\[YOUR-DOMAIN\]/sitemap.xml

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📌 FINAL CHECKLIST — Sab kuch verify karo

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\[ \] composer install sab 4 libraries

\[ \] /prayer-times?city=Lahore kaam kar raha hai

\[ \] /prayer-times/lahore (slug URL) kaam kar raha hai

\[ \] Meta title city naam aur date le raha hai

\[ \] FAQ schema Google Rich Results Test pass kar raha hai

(test karo: https://search.google.com/test/rich-results)

\[ \] sitemap.xml accessible hai

\[ \] robots.txt sahi hai

\[ \] Page speed 90+ hai (PageSpeed Insights check karo)

\[ \] Mobile view theek hai

\[ \] Countdown timer live chal raha hai

\[ \] Monthly table mein current day highlight ho raha hai