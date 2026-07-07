Seeders likwao — yeh best option hai. Yahan reason:

**Manual input (Filament) = months of work** — 114 Surahs × 5+ content blocks × FAQs × themes = 1000+ entries manually.

**Seeders = hours mein done**, aur phir Filament se refine kar saktay ho.

Developer ko yeh exact prompt do:
---------------------------------

**Write automated database seeders for all 10 new SEO tables. Here are the exact requirements:**

**Priority order — seed Tier 1 Surahs first:**Yaseen (36), Al-Baqarah (2), Ar-Rahman (55), Al-Mulk (67), Al-Waqiah (56), Al-Kahf (18), Al-Fatiha (1), Al-Muzammil (73), Al-Hashr (59), Maryam (19).Then seed all remaining 114 Surahs with at minimum stub content so no section appears empty on live pages.

**What each seeder must produce:**

**1\. SurahContentBlockSeeder**For every Surah, seed these block types: overview, revelation\_context, key\_lessons, name\_explanation.For Tier 1 Surahs — write real, unique, accurate content in English and Urdu (150-300 words for overview, 100-200 for revelation\_context).For remaining Surahs — write meaningful stub content (not lorem ipsum — real Islamic content, even if brief).For authentic\_virtues block — ONLY add it if a sahih or hasan hadith genuinely exists for that Surah. Set the authenticity field correctly. Include the exact hadith reference (e.g., "Sahih Muslim, 1881"). Never fabricate.

**2\. SurahFaqSeeder**Minimum 5 FAQs per Surah. Use real data from the surahs table (juz\_start, total\_ayahs, revelation\_type, meaning\_en) to generate dynamic, accurate answers — not hardcoded guesses.Example questions:

*   "Surah \[Name\] kaunse para mein hai?" → Answer: "Para \[juz\_start\]"
    
*   "Surah \[Name\] mein kitni ayat hain?" → Answer: "\[total\_ayahs\] ayat"
    
*   "Surah \[Name\] Meccan hai ya Medinan?" → Answer: "\[revelation\_type\]"
    
*   "Surah \[Name\] ka matlab kya hai?" → Answer: "\[meaning\_en/meaning\_ur\]"
    
*   "Surah \[Name\] ki tilawat kitne minute mein hoti hai?" → Estimate based on total\_ayahs.
    

**3\. SurahThemeSeeder**3-5 themes per Surah. Real thematic content — not generic placeholders.

**4\. SurahImportantAyahSeeder**For Surahs that have specific ayah keywords (from the keyword list below), seed the important ayahs with correct anchor\_id values so deep linking works:

*   Al-Baqarah: last 2 ayat (anchor: last-2-ayat), last 3 ayat, ayat 102, ayat 187
    
*   Al-Hashr: last 3 ayat (anchor: last-3-ayat), last 2 ayat, last 4 ayat
    
*   Al-Kahf: first 10 ayat (anchor: first-10-ayat), last 10 ayat
    
*   Yaseen: ayat 9, ayat 36
    
*   Al-Imran: last 10 ayat, last ruku
    
*   Al-Taubah: last 2 ayat
    
*   Al-Mulk: full (all 30 ayat featured)
    
*   Al-Qalam: last 2 ayat, ayat 51-52
    
*   Al-Muminoon: last 4 ayat
    
*   Al-Ghafir: last 4 ayat
    
*   Al-Furqan: ayat 23, ayat 54, ayat 74
    
*   Al-Bani Israel: ayat 80
    
*   Al-Anfal: ayat 63
    
*   Al-Maidah: ayat 114
    
*   Al-Naml: ayat 62
    
*   Al-Noor: ayat 35
    
*   Al-Room: ayat 21
    
*   Al-Yunus: ayat 81, ayat 85-86
    
*   Al-Taha: ayat 39
    
*   Al-Yusuf: ayat 80
    
*   Al-Anaam: ayat 45
    
*   Al-Araf: ayat 10
    

**5\. SurahRelatedSurahSeeder**Seed meaningful relationships — not random. Use these rules:

*   Same juz → relation\_type: same\_juz
    
*   Paired Surahs (Al-Falaq + An-Nas, Al-Ikhlas + Al-Kafirun) → relation\_type: thematically\_paired
    
*   Same revelation type → relation\_type: same\_revelation\_type
    
*   Seed minimum 3 related Surahs per Surah.
    

**6\. SurahCollectionSeeder**Seed these 6 collections with correct Surah assignments:

*   surah-manzil → Surahs: Al-Fatiha(1), Al-Baqarah(2) ayat 1-5 + 255 + 284-286, Aal-Imran(3) ayat 18+26-27, Al-Araf(7) ayat 54-56, Al-Israa(17) ayat 110-111, Al-Muminoon(23) ayat 115-118, As-Saffat(37) ayat 1-11, Al-Rahman(55), Al-Hashr(59) ayat 21-24, Al-Jinn(72) ayat 1-4, Al-Kafirun(109), Al-Ikhlas(112), Al-Falaq(113), An-Nas(114)
    
*   panj-surah → Surahs: 36(Yaseen), 48(Al-Fath), 55(Ar-Rahman), 56(Al-Waqiah), 67(Al-Mulk)
    
*   4-qul → Surahs: 109(Al-Kafirun), 112(Al-Ikhlas), 113(Al-Falaq), 114(An-Nas)
    
*   last-10-surahs → Surahs: 105 through 114
    
*   short-surahs → All Surahs with total\_ayahs <= 10 (query from DB)
    
*   quran-surah-list → All 114 Surahs ordered by number
    

**7\. SurahRecitationGuideSeeder**Seed these reciters for every Surah (especially Tier 1):

*   Sheikh Abdul Rahman Al-Sudais (Qari Sudais)
    
*   Sheikh Mishary Rashid Alafasy
    
*   Sheikh Abdul Basit Abdul Samad
    
*   Sheikh Dawat-e-Islami (for Surahs mentioned in keywords)Set is\_featured = true for Sudais and Mishary.
    

**8\. SurahLearningPathSeeder**For each Surah, calculate from existing surahs table data:

*   difficulty\_level: Surahs with total\_ayahs <= 20 = beginner, 21-100 = intermediate, 100+ = advanced
    
*   estimated\_reading\_minutes: total\_ayahs × 0.5 minutes (rough estimate)
    
*   Add real memorization tips in English and Urdu for Tier 1 Surahs.
    

**9\. SurahEntitySeeder**Seed major entities (Prophets, Places) that are mentioned across multiple Surahs:Prophets: Ibrahim, Musa, Isa, Yusuf, Nuh, Sulaiman, Dawud, Adam, Muhammad (ﷺ)Places: Makkah, Madinah, Jerusalem, Egypt, Mount Sinai, Cave of HiraThen map them to relevant Surahs via surah\_entity\_map with a relevance\_score.

**10\. SurahSeoMetaSeeder**For all 114 Surahs, seed a row in seo\_metas table (metaable\_type = App\\Models\\Surah) with:

*   title: follow the pattern "Surah \[name\_en\] — Arabic, Urdu Tarjuma & Tafsir | NoorIslam" (keep under 65 chars)
    
*   meta\_description: use real Surah data — "Read Surah \[name\_en\] (\[name\_ar\]) — \[total\_ayahs\] ayahs, \[revelation\_type\], Para \[juz\_start\]. Full Arabic text, Urdu tarjuma, Tafsir, PDF & audio." (keep under 155 chars)
    
*   canonical\_url: https://noorislam.com/surah/\[slug\]
    

**Technical requirements for all seeders:**

*   Use upsert() or updateOrInsert() — seeders must be re-runnable without duplicating data
    
*   Fetch all Surah data from the existing surahs table — never hardcode Surah numbers in content strings
    
*   Add php artisan db:seed --class=SurahContentBlockSeeder etc. to DatabaseSeeder
    
*   Each seeder should output progress: $this->command->info("Seeded Surah: {$surah->name\_en}")
    
*   Wrap each seeder in a try-catch and log errors without stopping the whole seeder
    
*   After all seeders run, flush the Surah cache: Cache::flush() at the end
    

**Run order in DatabaseSeeder:**

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   SurahEntitySeeder  SurahCollectionSeeder  SurahContentBlockSeeder  SurahThemeSeeder  SurahFaqSeeder  SurahImportantAyahSeeder  SurahRelatedSurahSeeder  SurahRecitationGuideSeeder  SurahLearningPathSeeder  SurahSeoMetaSeeder   `

After writing all seeders, run them and confirm all tables have data. Then show me the row counts for each new table.

**Aur developer ko yeh bhi bolo:**

Seeders chalaane ke baad mujhe yeh batao:

*   Har table mein kitni rows hain
    
*   Koi error aaya toh screenshot
    
*   Ek live Surah page ka screenshot (jaise /surah/yaseen) taake main dekh sakoon sab sections show ho rahe hain ya nahi