# 🕌 ANTIGRAVITY MASTER PROMPT — NoorIslam Duas Programmatic SEO v1
## Project: islamicweb (Laravel 11 · MariaDB · Blade · PHP 8.2)
## Target: 95+ Individual Dua Pages with Full SEO, Rich Content, Internal Linking

---

## 📌 CONTEXT & CONSTRAINTS

**Stack:** Laravel 11 | PHP 8.2 | MariaDB | Blade | Tailwind (or custom CSS)  
**Design System:** Deep Islamic Green `#1a4731` | Gold `#c9a227` | White `#ffffff`  
**Font:** Noto Naskh Arabic (Arabic text) | System-UI (Urdu/English body)  
**DB:** `islamicwebsite` — tables already exist: `duas`, `dua_categories`, `dua_dua_category`, `seo_metas`  
**SEO Goal:** Rank every "X ki dua" query in Pakistan — outrank IslamicFinder & HamariWeb  
**APP_URL:** MUST be `https://noorislam.com` — fix `.env.example` canonical bug  
**Bilingual:** Every page has English + Urdu + Roman Urdu content  
**Schema:** FAQPage + Article + BreadcrumbList on every dua page  

---

## 🗂️ PHASE 1 — DATABASE SEEDER: DUA CATEGORIES

### File: `database/seeders/DuaCategorySeeder.php`

Seed these **7 parent categories** + **9 existing** (check for duplicates via `firstOrCreate`):

```php
// Parent Categories (id auto-assigned, use firstOrCreate on slug)
$parents = [
    ['name_english'=>'Daily Routine Duas','name_urdu'=>'روزمرہ کی دعائیں','slug'=>'daily-routine-duas','name_roman_urdu'=>'Rozmarrah Ki Duain','icon_class'=>'fa-calendar-day','seo_title'=>'روزمرہ کی دعائیں - Daily Routine Duas in Urdu & Arabic','seo_description'=>'Sone ki dua se le kar ghar se nikalne tak - tamam rozmarrah ki zaroori duain Arabic, Urdu tarjuma aur Roman Urdu ke sath.'],
    ['name_english'=>'Namaz & Azan Duas','name_urdu'=>'نماز اور اذان کی دعائیں','slug'=>'namaz-azan-duas','name_roman_urdu'=>'Namaz Aur Azan Ki Duain','icon_class'=>'fa-mosque','seo_title'=>'نماز اور اذان کی دعائیں - Namaz Ki Dua in Arabic Urdu','seo_description'=>'Azan se le kar namaz ke baad tak tamam duain - wazu, masjid, ruku, sajda, attahiyat, dua e qunoot with full Arabic text.'],
    ['name_english'=>'Ramadan & Fasting Duas','name_urdu'=>'رمضان اور روزے کی دعائیں','slug'=>'ramadan-fasting-duas','name_roman_urdu'=>'Ramadan Aur Roze Ki Duain','icon_class'=>'fa-moon','seo_title'=>'رمضان اور روزے کی دعائیں - Sehri Iftaar Duas in Urdu','seo_description'=>'Sehri, iftaar, taraweeh, shab e qadr, teen ashron ki duain - poora Ramadan guide Arabic aur Urdu mein.'],
    ['name_english'=>'Sickness & Protection Duas','name_urdu'=>'بیماری اور حفاظت کی دعائیں','slug'=>'sickness-protection-duas','name_roman_urdu'=>'Bimari Aur Hifazat Ki Duain','icon_class'=>'fa-shield-alt','seo_title'=>'بیماری اور حفاظت کی دعائیں - Shifa Ki Dua in Arabic Urdu','seo_description'=>'Bukhar, sar dard, pait dard, khansi, nazre bad - tamam bimariyon ki Islamic duain Hadith ke hawale ke sath.'],
    ['name_english'=>'Needs, Success & Forgiveness','name_urdu'=>'ضرورت، کامیابی اور مغفرت','slug'=>'needs-success-forgiveness','name_roman_urdu'=>'Zaroorat Kamyabi Aur Maghfirat','icon_class'=>'fa-star-and-crescent','seo_title'=>'کامیابی اور مغفرت کی دعائیں - Dua e Hajat & Maghfirat in Urdu','seo_description'=>'Dua e hajat, kamyabi, imtihan, qarz se nijaat, rizq mein barkat - tamam zaroorat ki duain Arabic Urdu ke sath.'],
    ['name_english'=>'Specific Islamic Duas & Manzil','name_urdu'=>'مخصوص اسلامی دعائیں اور منزل','slug'=>'specific-islamic-duas','name_roman_urdu'=>'Makhsoos Islami Duain','icon_class'=>'fa-book-quran','seo_title'=>'مخصوص اسلامی دعائیں - Manzil Dua e Istikhara Dua e Noor in Urdu','seo_description'=>'Manzil, dua e istikhara, dua e noor, dua e kumail, dua e ganjul arsh, nade ali - tamam mashhoor duain mukammal tarjume ke sath.'],
    ['name_english'=>'Occasions & Seasonal Duas','name_urdu'=>'مواقع اور موسمی دعائیں','slug'=>'occasions-seasonal-duas','name_roman_urdu'=>'Mawaqa Aur Mausami Duain','icon_class'=>'fa-calendar-check','seo_title'=>'مواقع کی دعائیں - Safar Jumma Qurbani Barish Ki Dua in Urdu','seo_description'=>'Safar, jumma, chand dekhna, qurbani, barish, naya saal, waldain, aulad - tamam mawaqa ki duain hadith ke sath.'],
];
```

---

## 🗂️ PHASE 2 — MASTER DUAS SEEDER (95 Duas — Full Rich Content)

### File: `database/seeders/DuasMasterSeeder.php`

**CRITICAL INSTRUCTIONS for Antigravity:**
- Every dua MUST have ALL fields populated — NO null for content fields
- `faqs` field = JSON array of 5 FAQs minimum per dua
- `word_by_word_translation` = JSON array of word objects
- `detailed_explanation` = minimum 300 words
- `benefits` = minimum 150 words
- `seo_title` = 60 chars max, keyword-first
- `meta_description` = 155 chars max, includes Roman Urdu keyword
- Use `firstOrCreate(['arabic_text_hash' => md5($arabic)])` to avoid duplicates
- Set `verified_status=1`, `published_status=1` for all
- Set `dua_type='masnoon'` for hadith-based, `'quranic'` for Quran-based

### Seed ALL 95 duas with complete data. Map each keyword → one dua entry:

---

#### GROUP A: DAILY ROUTINE DUAS (13 duas)

**1. sone ki dua** → slug: `sone-ki-dua`
- Arabic: `بِاسْمِكَ اللَّهُمَّ أَمُوتُ وَأَحْيَا`
- Transliteration: Bismika Allahumma amootu wa ahya
- title_english: "Dua Before Sleeping (Sone Ki Dua)"
- title_urdu: "سونے کی دعا"
- title_roman_urdu: "Sone Ki Dua"
- reference_source: Sahih al-Bukhari 6312
- hadith_grade: Sahih
- book_name: Sahih al-Bukhari
- when_to_read: "Bistar par letne ke baad, soone se pehle"
- how_many_times: "Ek baar"
- best_time: "Raat ko soone se pehle"
- occasion: "Before Sleep"
- daily_routine_placement: "Raat"
- difficulty_level: "beginner"
- reading_time: 2
- category_slug: daily-routine-duas

**2. so kar uthne ki dua** → slug: `so-kar-uthne-ki-dua`
- Arabic: `الْحَمْدُ لِلَّهِ الَّذِي أَحْيَانَا بَعْدَ مَا أَمَاتَنَا وَإِلَيْهِ النُّشُورُ`
- Transliteration: Alhamdulillahil-ladhi ahyana ba'da ma amatana wa ilayhin-nushoor
- title_english: "Dua Upon Waking Up (Uthne Ki Dua)"
- title_urdu: "اٹھنے کی دعا"
- title_roman_urdu: "So Kar Uthne Ki Dua"
- reference_source: Sahih al-Bukhari 6312
- category_slug: daily-routine-duas

**3. bathroom jane ki dua** → slug: `bathroom-jane-ki-dua`
- Arabic: `اللَّهُمَّ إِنِّي أَعُوذُ بِكَ مِنَ الْخُبُثِ وَالْخَبَائِثِ`
- Transliteration: Allahumma inni a'udhu bika minal-khubuthi wal-khaba'ith
- title_english: "Dua Entering Bathroom (Bathroom Jane Ki Dua)"
- title_urdu: "بیت الخلاء میں داخل ہونے کی دعا"
- title_roman_urdu: "Bathroom Jane Ki Dua"
- reference_source: Sahih al-Bukhari 142
- category_slug: daily-routine-duas

**4. bathroom se nikalne ki dua** → slug: `bathroom-se-nikalne-ki-dua`
- Arabic: `غُفْرَانَكَ`
- Transliteration: Ghufranaka
- title_english: "Dua Leaving Bathroom (Bathroom Se Nikalne Ki Dua)"
- title_urdu: "بیت الخلاء سے نکلنے کی دعا"
- title_roman_urdu: "Bathroom Se Nikalne Ki Dua"
- reference_source: Sunan Abu Dawud 30, Sahih
- category_slug: daily-routine-duas

**5. khana khane ki dua** → slug: `khana-khane-ki-dua`
- Arabic: `بِسْمِ اللَّهِ وَعَلَى بَرَكَةِ اللَّهِ`
- Transliteration: Bismillahi wa 'ala barakatillah
- title_english: "Dua Before Eating (Khana Khane Ki Dua)"
- title_urdu: "کھانا کھانے سے پہلے کی دعا"
- title_roman_urdu: "Khana Khane Ki Dua"
- reference_source: Sunan Abu Dawud 3767
- category_slug: daily-routine-duas

**6. khana khane ke baad ki dua** → slug: `khana-khane-ke-baad-ki-dua`
- Arabic: `الْحَمْدُ لِلَّهِ الَّذِي أَطْعَمَنَا وَسَقَانَا وَجَعَلَنَا مُسْلِمِينَ`
- Transliteration: Alhamdulillahil-ladhi at'amana wa saqana wa ja'alana muslimin
- title_english: "Dua After Eating (Khana Khane Ke Baad Ki Dua)"
- title_urdu: "کھانا کھانے کے بعد کی دعا"
- title_roman_urdu: "Khana Khane Ke Baad Ki Dua"
- reference_source: Sunan Abu Dawud 3850
- category_slug: daily-routine-duas

**7. pani peene ki dua** → slug: `pani-peene-ki-dua`
- Arabic: `الْحَمْدُ لِلَّهِ الَّذِي جَعَلَهُ عَذْبًا فُرَاتًا بِرَحْمَتِهِ وَلَمْ يَجْعَلْهُ مِلْحًا أُجَاجًا بِذُنُوبِنَا`
- Transliteration: Alhamdulillahil-ladhi ja'alahu adhban furatan bi-rahmatih...
- title_english: "Dua for Drinking Water (Pani Peene Ki Dua)"
- title_roman_urdu: "Pani Peene Ki Dua"
- category_slug: daily-routine-duas

**8. doodh peene ki dua** → slug: `doodh-peene-ki-dua`
- Arabic: `اللَّهُمَّ بَارِكْ لَنَا فِيهِ وَزِدْنَا مِنْهُ`
- Transliteration: Allahumma barik lana fihi wa zidna minhu
- title_english: "Dua for Drinking Milk (Doodh Peene Ki Dua)"
- title_roman_urdu: "Doodh Peene Ki Dua"
- reference_source: Sunan Abu Dawud 3730
- category_slug: daily-routine-duas

**9. ghar se nikalne ki dua** → slug: `ghar-se-nikalne-ki-dua`
- Arabic: `بِسْمِ اللَّهِ تَوَكَّلْتُ عَلَى اللَّهِ وَلَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ`
- Transliteration: Bismillahi tawakkaltu 'alallahi wa la hawla wa la quwwata illa billah
- title_english: "Dua for Leaving Home (Ghar Se Nikalne Ki Dua)"
- title_roman_urdu: "Ghar Se Nikalne Ki Dua"
- reference_source: Sunan Abu Dawud 5095, Sahih
- category_slug: daily-routine-duas

**10. ghar mein dakhil hone ki dua** → slug: `ghar-mein-dakhil-hone-ki-dua`
- Arabic: `اللَّهُمَّ إِنِّي أَسْأَلُكَ خَيْرَ الْمَوْلِجِ وَخَيْرَ الْمَخْرَجِ بِسْمِ اللَّهِ وَلَجْنَا وَبِسْمِ اللَّهِ خَرَجْنَا وَعَلَى اللَّهِ رَبِّنَا تَوَكَّلْنَا`
- Transliteration: Allahumma inni as'aluka khayral-mawliji wa khayral-makhraji...
- title_english: "Dua Entering Home (Ghar Mein Dakhil Hone Ki Dua)"
- title_roman_urdu: "Ghar Mein Dakhil Hone Ki Dua"
- reference_source: Sunan Abu Dawud 5096
- category_slug: daily-routine-duas

**11. aaina dekhne ki dua** → slug: `aaina-dekhne-ki-dua`
- Arabic: `اللَّهُمَّ كَمَا حَسَّنْتَ خَلْقِي فَحَسِّنْ خُلُقِي`
- Transliteration: Allahumma kama hassanta khalqi fa-hassin khuluqi
- title_english: "Dua Looking in Mirror (Aaina Dekhne Ki Dua)"
- title_roman_urdu: "Aaina Dekhne Ki Dua"
- reference_source: Ahmad 3759, Hasan
- category_slug: daily-routine-duas

**12. subah ki dua** → slug: `subah-ki-dua`
- Arabic: `أَصْبَحْنَا وَأَصْبَحَ الْمُلْكُ لِلَّهِ وَالْحَمْدُ لِلَّهِ...`
- title_english: "Morning Dua (Subah Ki Dua)"
- title_roman_urdu: "Subah Ki Dua"
- category_slug: daily-routine-duas

**13. subah shaam ki dua** → slug: `subah-shaam-ki-dua`
- Arabic: `اللَّهُمَّ بِكَ أَصْبَحْنَا وَبِكَ أَمْسَيْنَا وَبِكَ نَحْيَا وَبِكَ نَمُوتُ وَإِلَيْكَ النُّشُورُ`
- Transliteration: Allahumma bika asbahna wa bika amsayna wa bika nahya wa bika namootu wa ilaykan-nushoor
- title_english: "Morning and Evening Dua (Subah Shaam Ki Dua)"
- title_roman_urdu: "Subah Shaam Ki Dua"
- reference_source: Sunan Abu Dawud 5068
- category_slug: daily-routine-duas

---

#### GROUP B: NAMAZ & AZAN DUAS (17 duas)

**14. azan ki dua** → slug: `azan-ki-dua`
- Arabic: Full Azan text
- title_roman_urdu: "Azan Ki Dua"
- category_slug: namaz-azan-duas

**15. azan ke baad ki dua** → slug: `azan-ke-baad-ki-dua`
- Arabic: `اللَّهُمَّ رَبَّ هَذِهِ الدَّعْوَةِ التَّامَّةِ وَالصَّلَاةِ الْقَائِمَةِ...`
- title_roman_urdu: "Azan Ke Baad Ki Dua"
- reference_source: Sahih al-Bukhari 614
- category_slug: namaz-azan-duas

**16. wazu ki dua** → slug: `wazu-ki-dua`
- Arabic: `بِسْمِ اللَّهِ`  (before) + full wadu duas for each step
- title_roman_urdu: "Wazu Ki Dua"
- category_slug: namaz-azan-duas

**17. wazu ke baad ki dua** → slug: `wazu-ke-baad-ki-dua`
- Arabic: `أَشْهَدُ أَنْ لَا إِلَهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ وَأَشْهَدُ أَنَّ مُحَمَّدًا عَبْدُهُ وَرَسُولُهُ اللَّهُمَّ اجْعَلْنِي مِنَ التَّوَّابِينَ وَاجْعَلْنِي مِنَ الْمُتَطَهِّرِينَ`
- title_roman_urdu: "Wazu Ke Baad Ki Dua"
- reference_source: Sahih Muslim 234
- category_slug: namaz-azan-duas

**18. masjid mein dakhil hone ki dua** → slug: `masjid-mein-dakhil-hone-ki-dua`
- Arabic: `اللَّهُمَّ افْتَحْ لِي أَبْوَابَ رَحْمَتِكَ`
- title_roman_urdu: "Masjid Mein Dakhil Hone Ki Dua"
- reference_source: Sahih Muslim 713
- category_slug: namaz-azan-duas

**19. masjid se nikalne ki dua** → slug: `masjid-se-nikalne-ki-dua`
- Arabic: `اللَّهُمَّ إِنِّي أَسْأَلُكَ مِنْ فَضْلِكَ`
- title_roman_urdu: "Masjid Se Nikalne Ki Dua"
- reference_source: Sahih Muslim 713
- category_slug: namaz-azan-duas

**20. namaz ki dua** → slug: `namaz-ki-dua`
- Full namaz duas: Sana, Ta'awwuz, Bismillah guide
- title_roman_urdu: "Namaz Ki Dua"
- category_slug: namaz-azan-duas

**21. namaz ke baad ki dua** → slug: `namaz-ke-baad-ki-dua`
- Subhan Allah 33 + Alhamdulillah 33 + Allahu Akbar 33 + Ayatul Kursi
- title_roman_urdu: "Namaz Ke Baad Ki Dua"
- category_slug: namaz-azan-duas

**22. attahiyat dua** → slug: `attahiyat-dua`
- Arabic: Full Attahiyat + Durood Ibrahim + Dua e Ibrahimiyya
- title_roman_urdu: "Attahiyat Dua"
- category_slug: namaz-azan-duas

**23. ruku ki dua** → slug: `ruku-ki-dua`
- Arabic: `سُبْحَانَ رَبِّيَ الْعَظِيمِ` (x3)
- title_roman_urdu: "Ruku Ki Dua"
- reference_source: Sahih Muslim 772
- category_slug: namaz-azan-duas

**24. sajde ki dua** → slug: `sajde-ki-dua`
- Arabic: `سُبْحَانَ رَبِّيَ الْأَعْلَى` (x3)
- title_roman_urdu: "Sajde Ki Dua"
- reference_source: Sahih Muslim 772
- category_slug: namaz-azan-duas

**25. do sajdon ke darmiyan ki dua** → slug: `do-sajdon-ke-darmiyan-ki-dua`
- Arabic: `رَبِّ اغْفِرْ لِي وَارْحَمْنِي وَاجْبُرْنِي وَارْفَعْنِي وَارْزُقْنِي وَاهْدِنِي وَعَافِنِي وَاعْفُ عَنِّي`
- title_roman_urdu: "Do Sajdon Ke Darmiyan Ki Dua"
- reference_source: Sunan Ibn Majah 898
- category_slug: namaz-azan-duas

**26. witr ki dua** → slug: `witr-ki-dua`
- Arabic: `اللَّهُمَّ إِنَّا نَسْتَعِينُكَ...` (Dua e Qunoot short version)
- title_roman_urdu: "Witr Ki Dua"
- category_slug: namaz-azan-duas

**27. dua e qunoot** → slug: `dua-e-qunoot`
- Arabic: Full Dua e Qunoot — `اللَّهُمَّ اهْدِنِي فِيمَنْ هَدَيْتَ...`
- title_roman_urdu: "Dua E Qunoot"
- reference_source: Sunan Abu Dawud 1425, Sahih
- category_slug: namaz-azan-duas

**28. tahajjud ki dua** → slug: `tahajjud-ki-dua`
- Arabic: `اللَّهُمَّ لَكَ الْحَمْدُ أَنْتَ نُورُ السَّمَاوَاتِ وَالْأَرْضِ...`
- title_roman_urdu: "Tahajjud Ki Dua"
- reference_source: Sahih al-Bukhari 1120
- category_slug: namaz-azan-duas

**29. namaz e janaza ki dua** → slug: `namaz-e-janaza-ki-dua`
- Arabic: Full 4 takbeer duas for Salat al-Janazah
- title_roman_urdu: "Namaz E Janaza Ki Dua"
- category_slug: namaz-azan-duas

**30. qabristan ki dua** → slug: `qabristan-ki-dua`
- Arabic: `السَّلَامُ عَلَيْكُمْ أَهْلَ الدِّيَارِ مِنَ الْمُؤْمِنِينَ وَالْمُسْلِمِينَ...`
- title_roman_urdu: "Qabristan Ki Dua"
- reference_source: Sahih Muslim 975
- category_slug: namaz-azan-duas

---

#### GROUP C: RAMADAN & FASTING (11 duas)

**31. sehri ki dua** → slug: `sehri-ki-dua`
- Arabic: `وَبِصَوْمِ غَدٍ نَوَيْتُ مِنْ شَهْرِ رَمَضَانَ`
- title_roman_urdu: "Sehri Ki Dua"
- category_slug: ramadan-fasting-duas

**32. roza kholne ki dua (iftaar)** → slug: `roza-kholne-ki-dua`
- Arabic: `اللَّهُمَّ إِنِّي لَكَ صُمْتُ وَبِكَ آمَنْتُ وَعَلَيْكَ تَوَكَّلْتُ وَعَلَى رِزْقِكَ أَفْطَرْتُ`
- title_roman_urdu: "Roza Kholne Ki Dua"
- category_slug: ramadan-fasting-duas

**33. roza band karne ki dua** → slug: `roza-band-karne-ki-dua`
- Arabic: Niyyat dua for keeping fast
- title_roman_urdu: "Roza Band Karne Ki Dua"
- category_slug: ramadan-fasting-duas

**34. ramadan dua** → slug: `ramadan-dua`
- Arabic: Various Ramadan duas collection
- title_roman_urdu: "Ramadan Dua"
- category_slug: ramadan-fasting-duas

**35. pehle ashre ki dua** → slug: `pehle-ashre-ki-dua`
- Arabic: `يَا حَيُّ يَا قَيُّومُ بِرَحْمَتِكَ أَسْتَغِيثُ`
- title_roman_urdu: "Pehle Ashre Ki Dua"
- category_slug: ramadan-fasting-duas

**36. dusre ashre ki dua** → slug: `dusre-ashre-ki-dua`
- Arabic: `أَسْتَغْفِرُ اللَّهَ رَبِّي مِنْ كُلِّ ذَنْبٍ وَأَتُوبُ إِلَيْهِ`
- title_roman_urdu: "Dusre Ashre Ki Dua"
- category_slug: ramadan-fasting-duas

**37. teesre ashre ki dua** → slug: `teesre-ashre-ki-dua`
- Arabic: `اللَّهُمَّ أَجِرْنَا مِنَ النَّارِ`
- title_roman_urdu: "Teesre Ashre Ki Dua"
- category_slug: ramadan-fasting-duas

**38. taraweeh ki dua** → slug: `taraweeh-ki-dua`
- Arabic: Full Taraweeh dua after every 4 rakaat
- title_roman_urdu: "Taraweeh Ki Dua"
- category_slug: ramadan-fasting-duas

**39. shab e qadr ki dua** → slug: `shab-e-qadr-ki-dua`
- Arabic: `اللَّهُمَّ إِنَّكَ عَفُوٌّ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّي`
- title_roman_urdu: "Shab E Qadr Ki Dua"
- reference_source: Sunan Ibn Majah 3850, Sahih
- category_slug: ramadan-fasting-duas

**40. laylatul qadr dua** → slug: `laylatul-qadr-dua`
- Same as above but English-title version for dual targeting
- title_roman_urdu: "Laylatul Qadr Dua"
- category_slug: ramadan-fasting-duas

**41. shab e barat ki dua** → slug: `shab-e-barat-ki-dua`
- Arabic: Relevant duas for 15th Sha'ban
- title_roman_urdu: "Shab E Barat Ki Dua"
- category_slug: ramadan-fasting-duas

---

#### GROUP D: SICKNESS, PAIN & PROTECTION (12 duas)

**42. shifa ki dua** → slug: `shifa-ki-dua`
- Arabic: `اللَّهُمَّ رَبَّ النَّاسِ اذْهَبِ الْبَاسَ اشْفِ أَنْتَ الشَّافِي لَا شِفَاءَ إِلَّا شِفَاؤُكَ شِفَاءً لَا يُغَادِرُ سَقَمًا`
- title_roman_urdu: "Shifa Ki Dua"
- reference_source: Sahih al-Bukhari 5742
- category_slug: sickness-protection-duas

**43. bimari ki dua** → slug: `bimari-ki-dua`
- `بِسْمِ اللَّهِ أَرْقِيكَ مِنْ كُلِّ شَيْءٍ يُؤْذِيكَ مِنْ شَرِّ كُلِّ نَفْسٍ أَوْ عَيْنِ حَاسِدٍ اللَّهُ يَشْفِيكَ بِسْمِ اللَّهِ أَرْقِيكَ`
- title_roman_urdu: "Bimari Ki Dua"
- reference_source: Sahih Muslim 2186
- category_slug: sickness-protection-duas

**44. bukhar ki dua** → slug: `bukhar-ki-dua`
- Arabic: `بِسْمِ اللَّهِ الْكَبِيرِ أَعُوذُ بِاللَّهِ الْعَظِيمِ مِنْ شَرِّ كُلِّ عِرْقٍ نَعَّارٍ وَمِنْ شَرِّ حَرِّ النَّارِ`
- title_roman_urdu: "Bukhar Ki Dua"
- reference_source: Sunan Ibn Majah 3526, Hasan
- category_slug: sickness-protection-duas

**45. sar dard ki dua** → slug: `sar-dard-ki-dua`
- Arabic: `بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ` + Surah Al-Fatiha (ruqya)
- title_roman_urdu: "Sar Dard Ki Dua"
- category_slug: sickness-protection-duas

**46. dant dard ki dua** → slug: `dant-dard-ki-dua`
- Arabic: `أَعُوذُ بِعِزَّةِ اللَّهِ وَقُدْرَتِهِ مِنْ شَرِّ مَا أَجِدُ وَأُحَاذِرُ`
- title_roman_urdu: "Dant Dard Ki Dua"
- reference_source: Sahih Muslim 2202
- category_slug: sickness-protection-duas

**47. pait dard ki dua** → slug: `pait-dard-ki-dua`
- Arabic: Ruqya for stomach pain
- title_roman_urdu: "Pait Dard Ki Dua"
- category_slug: sickness-protection-duas

**48. dard ki dua** → slug: `dard-ki-dua`
- Arabic: `أَعُوذُ بِعِزَّةِ اللَّهِ وَقُدْرَتِهِ مِنْ شَرِّ مَا أَجِدُ`
- title_roman_urdu: "Dard Ki Dua"
- reference_source: Sahih Muslim 2202
- category_slug: sickness-protection-duas

**49. khansi ki dua** → slug: `khansi-ki-dua`
- Arabic: General ruqya + bismillah method
- title_roman_urdu: "Khansi Ki Dua"
- category_slug: sickness-protection-duas

**50. kharish ki dua** → slug: `kharish-ki-dua`
- Arabic: Ruqya for skin ailments
- title_roman_urdu: "Kharish Ki Dua"
- category_slug: sickness-protection-duas

**51. nazre bad ki dua** → slug: `nazre-bad-ki-dua`
- Arabic: `أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّةِ مِنْ كُلِّ شَيْطَانٍ وَهَامَّةٍ وَمِنْ كُلِّ عَيْنٍ لَامَّةٍ`
- title_roman_urdu: "Nazre Bad Ki Dua"
- reference_source: Sahih al-Bukhari 3371
- category_slug: sickness-protection-duas

**52. neend aane ki dua** → slug: `neend-aane-ki-dua`
- Arabic: Various duas for insomnia
- title_roman_urdu: "Neend Aane Ki Dua"
- category_slug: sickness-protection-duas

**53. hifazat ki dua** → slug: `hifazat-ki-dua`
- Arabic: `بِسْمِ اللَّهِ الَّذِي لَا يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الْأَرْضِ وَلَا فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ`
- title_roman_urdu: "Hifazat Ki Dua"
- reference_source: Sunan Abu Dawud 5088, Sahih
- category_slug: sickness-protection-duas

---

#### GROUP E: NEEDS, SUCCESS & FORGIVENESS (8 duas)

**54. dua e hajat** → slug: `dua-e-hajat`
- Arabic: Full Dua Hajat (2 rakat namaz + dua)
- title_roman_urdu: "Dua E Hajat"
- reference_source: Sunan Ibn Majah 1384, Sahih
- category_slug: needs-success-forgiveness

**55. kamyabi ki dua** → slug: `kamyabi-ki-dua`
- Arabic: `رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ`
- title_roman_urdu: "Kamyabi Ki Dua"
- reference_source: Al-Quran 2:201
- dua_type: quranic
- category_slug: needs-success-forgiveness

**56. imtihan mein kamyabi ki dua** → slug: `imtihan-mein-kamyabi-ki-dua`
- Arabic: `رَبِّ اشْرَحْ لِي صَدْرِي وَيَسِّرْ لِي أَمْرِي`
- title_roman_urdu: "Imtihan Mein Kamyabi Ki Dua"
- reference_source: Al-Quran 20:25-26
- category_slug: needs-success-forgiveness

**57. pareshani ki dua** → slug: `pareshani-ki-dua`
- Arabic: `اللَّهُمَّ إِنِّي أَعُوذُ بِكَ مِنَ الْهَمِّ وَالْحَزَنِ...`
- title_roman_urdu: "Pareshani Ki Dua"
- reference_source: Sahih al-Bukhari 6369
- category_slug: needs-success-forgiveness

**58. qarz ki dua** → slug: `qarz-ki-dua`
- Arabic: `اللَّهُمَّ اكْفِنِي بِحَلَالِكَ عَنْ حَرَامِكَ وَأَغْنِنِي بِفَضْلِكَ عَمَّنْ سِوَاكَ`
- title_roman_urdu: "Qarz Ki Dua"
- reference_source: Sunan al-Tirmidhi 3563, Hasan
- category_slug: needs-success-forgiveness

**59. maghfirat ki dua** → slug: `maghfirat-ki-dua`
- Arabic: `رَبَّنَا ظَلَمْنَا أَنفُسَنَا وَإِن لَّمْ تَغْفِرْ لَنَا وَتَرْحَمْنَا لَنَكُونَنَّ مِنَ الْخَاسِرِينَ`
- title_roman_urdu: "Maghfirat Ki Dua"
- category_slug: needs-success-forgiveness

**60. rizq ki dua** → slug: `rizq-ki-dua`
- Arabic: `اللَّهُمَّ إِنِّي أَسْأَلُكَ رِزْقًا طَيِّبًا وَعِلْمًا نَافِعًا وَعَمَلًا مُتَقَبَّلًا`
- title_roman_urdu: "Rizq Ki Dua"
- reference_source: Sunan Ibn Majah 925
- category_slug: needs-success-forgiveness

**61. dua e mustajab** → slug: `dua-e-mustajab`
- Arabic: Collection of most accepted duas from Quran & Sunnah
- title_roman_urdu: "Dua E Mustajab"
- category_slug: needs-success-forgiveness

---

#### GROUP F: SPECIFIC ISLAMIC DUAS & MANZIL (17 duas)

**62. manzil dua** → slug: `manzil-dua`
- Arabic: Full Manzil collection (Surah Fatiha + relevant ayaat)
- title_roman_urdu: "Manzil Dua"
- detailed_explanation: 500+ words on Manzil history, benefits, how to read
- category_slug: specific-islamic-duas

**63. dua e istikhara** → slug: `dua-e-istikhara`
- Arabic: `اللَّهُمَّ إِنِّي أَسْتَخِيرُكَ بِعِلْمِكَ وَأَسْتَقْدِرُكَ بِقُدْرَتِكَ...`
- title_roman_urdu: "Dua E Istikhara"
- reference_source: Sahih al-Bukhari 1162
- category_slug: specific-islamic-duas

**64. dua e jameela** → slug: `dua-e-jameela`
- Arabic: Full Dua e Jameela text
- title_roman_urdu: "Dua E Jameela"
- category_slug: specific-islamic-duas

**65. dua e noor** → slug: `dua-e-noor`
- Arabic: `اللَّهُمَّ اجْعَلْ فِي قَلْبِي نُورًا وَفِي لِسَانِي نُورًا...`
- title_roman_urdu: "Dua E Noor"
- reference_source: Sahih al-Bukhari 6316
- category_slug: specific-islamic-duas

**66. dua e tawassul** → slug: `dua-e-tawassul`
- Arabic: Full Dua e Tawassul
- title_roman_urdu: "Dua E Tawassul"
- category_slug: specific-islamic-duas

**67. dua e ahad** → slug: `dua-e-ahad`
- Arabic: Full Dua e Ahad (Shia tradition — note in authenticity_notes)
- title_roman_urdu: "Dua E Ahad"
- category_slug: specific-islamic-duas

**68. dua e faraj** → slug: `dua-e-faraj`
- Arabic: Full Dua e Faraj text
- title_roman_urdu: "Dua E Faraj"
- category_slug: specific-islamic-duas

**69. dua e mujeer** → slug: `dua-e-mujeer`
- Arabic: Full Dua e Mujeer (100 names Dua)
- title_roman_urdu: "Dua E Mujeer"
- category_slug: specific-islamic-duas

**70. dua e ganjul arsh** → slug: `dua-e-ganjul-arsh`
- Arabic: Full Dua Ganjul Arsh
- title_roman_urdu: "Dua E Ganjul Arsh"
- category_slug: specific-islamic-duas

**71. dua e kumail** → slug: `dua-e-kumail`
- Arabic: Full Dua Kumail (attributed to Imam Ali R.A.)
- title_roman_urdu: "Dua E Kumail"
- category_slug: specific-islamic-duas

**72. dua e anas** → slug: `dua-e-anas`
- Arabic: Dua taught to Anas R.A.
- title_roman_urdu: "Dua E Anas"
- category_slug: specific-islamic-duas

**73. dua abu darda** → slug: `dua-abu-darda`
- Arabic: Famous dua of Abu Darda R.A.
- title_roman_urdu: "Dua Abu Darda"
- category_slug: specific-islamic-duas

**74. nade ali dua** → slug: `nade-ali-dua`
- Arabic: Full Nade Ali text
- title_roman_urdu: "Nade Ali Dua"
- category_slug: specific-islamic-duas

**75. hasbi allah dua** → slug: `hasbi-allah-dua`
- Arabic: `حَسْبُنَا اللَّهُ وَنِعْمَ الْوَكِيلُ`
- reference_source: Al-Quran 3:173
- title_roman_urdu: "Hasbi Allah Dua"
- category_slug: specific-islamic-duas

**76. rabbi jalni dua** → slug: `rabbi-jalni-dua`
- Arabic: `رَبِّ اجْعَلْنِي مُقِيمَ الصَّلَاةِ وَمِن ذُرِّيَّتِي`
- title_roman_urdu: "Rabbi Jalni Dua"
- reference_source: Al-Quran 14:40
- category_slug: specific-islamic-duas

**77. allahumma inni as aluka dua** → slug: `allahumma-inni-as-aluka-dua`
- Arabic: `اللَّهُمَّ إِنِّي أَسْأَلُكَ الْجَنَّةَ وَأَعُوذُ بِكَ مِنَ النَّارِ`
- title_roman_urdu: "Allahumma Inni As Aluka Dua"
- reference_source: Sunan Abu Dawud 792
- category_slug: specific-islamic-duas

**78. dua e imam e zamana** → slug: `dua-e-imam-e-zamana`
- Arabic: Dua for Imam Mahdi's return
- title_roman_urdu: "Dua E Imam E Zamana"
- category_slug: specific-islamic-duas

---

#### GROUP G: OCCASIONS, WEATHER & MISC (15 duas)

**79. safar ki dua** → slug: `safar-ki-dua`
- Arabic: `اللَّهُ أَكْبَرُ اللَّهُ أَكْبَرُ اللَّهُ أَكْبَرُ سُبْحَانَ الَّذِي سَخَّرَ لَنَا هَذَا...`
- title_roman_urdu: "Safar Ki Dua"
- reference_source: Sahih Muslim 1342
- category_slug: occasions-seasonal-duas

**80. jumma mubarak dua** → slug: `jumma-mubarak-dua`
- Arabic: Durood collection + Friday duas
- title_roman_urdu: "Jumma Mubarak Dua"
- category_slug: occasions-seasonal-duas

**81. chand dekhne ki dua** → slug: `chand-dekhne-ki-dua`
- Arabic: `اللَّهُمَّ أَهِلَّهُ عَلَيْنَا بِالْأَمْنِ وَالْإِيمَانِ وَالسَّلَامَةِ وَالْإِسْلَامِ...`
- title_roman_urdu: "Chand Dekhne Ki Dua"
- reference_source: Sunan al-Tirmidhi 3451
- category_slug: occasions-seasonal-duas

**82. qurbani ki dua** → slug: `qurbani-ki-dua`
- Arabic: `بِسْمِ اللَّهِ وَاللَّهُ أَكْبَرُ اللَّهُمَّ مِنْكَ وَلَكَ اللَّهُمَّ تَقَبَّلْ مِنِّي`
- title_roman_urdu: "Qurbani Ki Dua"
- reference_source: Sahih Muslim 1966
- category_slug: occasions-seasonal-duas

**83. dua e ashura** → slug: `dua-e-ashura`
- Arabic: Duas for 10th Muharram
- title_roman_urdu: "Dua E Ashura"
- category_slug: occasions-seasonal-duas

**84. barish ki dua** → slug: `barish-ki-dua`
- Arabic: `اللَّهُمَّ صَيِّبًا نَافِعًا`
- title_roman_urdu: "Barish Ki Dua"
- reference_source: Sahih al-Bukhari 1032
- category_slug: occasions-seasonal-duas

**85. barish rukne ki dua** → slug: `barish-rukne-ki-dua`
- Arabic: `مُطِرْنَا بِفَضْلِ اللَّهِ وَرَحْمَتِهِ`
- title_roman_urdu: "Barish Rukne Ki Dua"
- reference_source: Sahih al-Bukhari 1038
- category_slug: occasions-seasonal-duas

**86. naye saal ki dua** → slug: `naye-saal-ki-dua`
- Arabic: Islamic New Year duas (Islamic + Gregorian context)
- title_roman_urdu: "Naye Saal Ki Dua"
- category_slug: occasions-seasonal-duas

**87. waldain k liye dua** → slug: `waldain-ke-liye-dua`
- Arabic: `رَبِّ ارْحَمْهُمَا كَمَا رَبَّيَانِي صَغِيرًا`
- title_roman_urdu: "Waldain Ke Liye Dua"
- reference_source: Al-Quran 17:24
- dua_type: quranic
- category_slug: occasions-seasonal-duas

**88. aulad k liye dua** → slug: `aulad-ke-liye-dua`
- Arabic: `رَبِّ هَبْ لِي مِن لَّدُنكَ ذُرِّيَّةً طَيِّبَةً إِنَّكَ سَمِيعُ الدُّعَاءِ`
- title_roman_urdu: "Aulad Ke Liye Dua"
- reference_source: Al-Quran 3:38
- category_slug: occasions-seasonal-duas

**89. hamal ki hifazat ki dua** → slug: `hamal-ki-hifazat-ki-dua`
- Arabic: Duas for pregnancy protection
- title_roman_urdu: "Hamal Ki Hifazat Ki Dua"
- category_slug: occasions-seasonal-duas

**90. humbistari ki dua** → slug: `humbistari-ki-dua`
- Arabic: `بِسْمِ اللَّهِ اللَّهُمَّ جَنِّبْنَا الشَّيْطَانَ وَجَنِّبِ الشَّيْطَانَ مَا رَزَقْتَنَا`
- title_roman_urdu: "Humbistari Ki Dua"
- reference_source: Sahih al-Bukhari 6388
- category_slug: occasions-seasonal-duas

**91. lab pe aati hai dua** → slug: `lab-pe-aati-hai-dua`
- Arabic: Poem/Dua by Allama Iqbal context + Islamic duas it references
- title_roman_urdu: "Lab Pe Aati Hai Dua"
- category_slug: occasions-seasonal-duas

**92. dua for death (marne ki dua)** → slug: `marne-ki-dua`
- Arabic: `اللَّهُمَّ اغْفِرْ لِي وَارْحَمْنِي وَأَلْحِقْنِي بِالرَّفِيقِ الْأَعْلَى`
- title_roman_urdu: "Marne Ki Dua"
- reference_source: Sahih al-Bukhari 4439
- category_slug: occasions-seasonal-duas

**93. dua khatam quran** → slug: `dua-khatam-quran`
- Arabic: Full Dua Khatam ul Quran text
- title_roman_urdu: "Dua Khatam Quran"
- category_slug: occasions-seasonal-duas

---

## 🗂️ PHASE 3 — MIGRATION: ADD MISSING COLUMN

Check if `duas` table is missing `category_slug` (it uses pivot table). Use existing `dua_dua_category` pivot. No new migration needed unless a column is actually missing.

**However, add this migration if not exists:**
```php
// File: database/migrations/2026_07_05_add_meta_fields_to_dua_categories.php
// Add: seo_title, seo_description, name_roman_urdu, slug_urdu to dua_categories
// (already in schema — skip if columns exist, use Schema::hasColumn check)
```

---

## 🗂️ PHASE 4 — MODEL UPDATES

### File: `app/Models/Dua.php`
Add/verify:
```php
protected $fillable = [/* all 68 fields */];
protected $casts = [
    'faqs' => 'array',
    'word_by_word_translation' => 'array', 
    'difficult_words_meanings' => 'array',
    'recommended_occasions' => 'array',
    'tags' => 'array',
    'open_graph' => 'array',
    'twitter_card' => 'array',
];

public function categories(): BelongsToMany {
    return $this->belongsToMany(DuaCategory::class, 'dua_dua_category');
}

public function seoMeta(): MorphOne {
    return $this->morphOne(SeoMeta::class, 'metaable');
}

public function relatedDuas(): BelongsToMany {
    return $this->belongsToMany(Dua::class, 'dua_related_dua', 'dua_id', 'related_dua_id');
}

// SEO helper
public function getCanonicalUrlAttribute(): string {
    return config('app.url') . '/dua/' . $this->seo_slug;
}

// Schema.org JSON-LD
public function generateSchema(): array {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $this->seo_title ?? $this->title_english,
        'description' => $this->meta_description ?? $this->short_meaning,
        'inLanguage' => ['ur', 'en'],
        'datePublished' => $this->created_at?->toISOString(),
        'dateModified' => $this->updated_at?->toISOString(),
        'author' => ['@type'=>'Organization','name'=>'NoorIslam'],
        'publisher' => ['@type'=>'Organization','name'=>'NoorIslam','logo'=>['@type'=>'ImageObject','url'=>config('app.url').'/images/logo.png']],
    ];
}

public function generateFaqSchema(): array {
    if (empty($this->faqs)) return [];
    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => collect($this->faqs)->map(fn($faq) => [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => ['@type'=>'Answer','text'=>$faq['answer']],
        ])->toArray(),
    ];
}
```

### File: `app/Models/DuaCategory.php`
```php
public function duas(): BelongsToMany {
    return $this->belongsToMany(Dua::class, 'dua_dua_category');
}
public function parent(): BelongsTo {
    return $this->belongsTo(DuaCategory::class, 'parent_id');
}
public function children(): HasMany {
    return $this->hasMany(DuaCategory::class, 'parent_id');
}
public function seoMeta(): MorphOne {
    return $this->morphOne(SeoMeta::class, 'metaable');
}
```

---

## 🗂️ PHASE 5 — CONTROLLER

### File: `app/Http/Controllers/DuaController.php`

```php
<?php
namespace App\Http\Controllers;

use App\Models\Dua;
use App\Models\DuaCategory;
use Illuminate\Http\Request;

class DuaController extends Controller
{
    // /duas — Category listing hub page
    public function index()
    {
        $categories = DuaCategory::whereNull('parent_id')
            ->with(['duas' => fn($q) => $q->limit(6), 'children'])
            ->withCount('duas')
            ->get();
        
        $featuredDuas = Dua::where('is_featured', 1)
            ->where('published_status', 1)
            ->limit(8)->get();
        
        $totalDuas = Dua::where('published_status', 1)->count();
        
        $seo = [
            'title' => 'تمام دعائیں - All Islamic Duas in Urdu & Arabic | NoorIslam',
            'description' => 'Sone ki dua, namaz ki dua, shifa ki dua aur 95+ Islamic duain mukammal Arabic text, Urdu tarjuma, Roman Urdu aur hadith hawale ke sath. NoorIslam par tamam zaroorat ki duain.',
            'canonical' => config('app.url') . '/duas',
        ];
        
        return view('duas.index', compact('categories', 'featuredDuas', 'totalDuas', 'seo'));
    }

    // /duas/category/{slug} — Category page
    public function category(string $slug)
    {
        $category = DuaCategory::where('slug', $slug)
            ->orWhere('slug_urdu', $slug)
            ->with(['duas' => fn($q) => $q->where('published_status', 1)->orderBy('is_featured','desc'), 'parent', 'children'])
            ->firstOrFail();
        
        $duas = $category->duas()->where('published_status', 1)->paginate(20);
        
        $relatedCategories = DuaCategory::whereNull('parent_id')
            ->where('id', '!=', $category->id)->limit(6)->get();
        
        $seo = [
            'title' => $category->seo_title ?? $category->name_english . ' - ' . $category->name_urdu . ' | NoorIslam',
            'description' => $category->seo_description ?? 'NoorIslam par ' . $category->name_roman_urdu . ' ki tamam duain mukammal Arabic, Urdu tarjuma aur hadith reference ke sath parhen.',
            'canonical' => config('app.url') . '/duas/category/' . $category->slug,
        ];
        
        return view('duas.category', compact('category', 'duas', 'relatedCategories', 'seo'));
    }

    // /dua/{slug} — Individual Dua Page (MAIN SEO PAGE)
    public function show(string $slug)
    {
        $dua = Dua::where('seo_slug', $slug)
            ->where('published_status', 1)
            ->with(['categories', 'seoMeta', 'relatedDuas' => fn($q) => $q->limit(6)])
            ->firstOrFail();
        
        // Get related duas from same category
        $relatedDuas = Dua::whereHas('categories', fn($q) => 
                $q->whereIn('dua_categories.id', $dua->categories->pluck('id'))
            )
            ->where('id', '!=', $dua->id)
            ->where('published_status', 1)
            ->limit(8)->get();
        
        // Prev / Next navigation
        $prevDua = Dua::where('id', '<', $dua->id)->where('published_status', 1)->orderBy('id','desc')->first();
        $nextDua = Dua::where('id', '>', $dua->id)->where('published_status', 1)->orderBy('id','asc')->first();
        
        $seo = [
            'title' => $dua->seo_title ?? $dua->meta_title ?? $dua->title_roman_urdu . ' - ' . $dua->title_urdu . ' | NoorIslam',
            'description' => $dua->meta_description ?? $dua->short_meaning,
            'canonical' => config('app.url') . '/dua/' . $dua->seo_slug,
            'schema_article' => $dua->generateSchema(),
            'schema_faq' => $dua->generateFaqSchema(),
            'schema_breadcrumb' => $this->generateBreadcrumb($dua),
        ];
        
        return view('duas.show', compact('dua', 'relatedDuas', 'prevDua', 'nextDua', 'seo'));
    }
    
    private function generateBreadcrumb(Dua $dua): array
    {
        $items = [
            ['name' => 'Home', 'url' => config('app.url')],
            ['name' => 'Duas', 'url' => config('app.url') . '/duas'],
        ];
        if ($dua->categories->first()) {
            $cat = $dua->categories->first();
            $items[] = ['name' => $cat->name_english, 'url' => config('app.url') . '/duas/category/' . $cat->slug];
        }
        $items[] = ['name' => $dua->title_english, 'url' => config('app.url') . '/dua/' . $dua->seo_slug];
        
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($items)->map(fn($item, $i) => [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $item['name'],
                'item' => $item['url'],
            ])->toArray(),
        ];
    }
}
```

---

## 🗂️ PHASE 6 — ROUTES

### File: `routes/web.php` — ADD these routes:

```php
// Duas Hub
Route::get('/duas', [DuaController::class, 'index'])->name('duas.index');
Route::get('/duas/category/{slug}', [DuaController::class, 'category'])->name('duas.category');
Route::get('/dua/{slug}', [DuaController::class, 'show'])->name('duas.show');

// Urdu URL aliases (bilingual slug support)
Route::get('/ur/duas', [DuaController::class, 'index'])->name('ur.duas.index');
Route::get('/ur/dua/{slug}', [DuaController::class, 'show'])->name('ur.duas.show');
```

---

## 🗂️ PHASE 7 — BLADE VIEWS (FULL DESIGN SYSTEM)

### Design Tokens (use existing #1a4731 / #c9a227 system):
```css
:root {
  --islamic-green: #1a4731;
  --islamic-green-light: #2d6a4f;
  --gold: #c9a227;
  --gold-light: #e8c547;
  --text-primary: #1a1a1a;
  --text-secondary: #555;
  --bg-light: #f8f4ee;
  --bg-card: #ffffff;
  --arabic-font: 'Noto Naskh Arabic', 'Amiri', serif;
}
```

---

### File: `resources/views/duas/show.blade.php`

**This is the MOST IMPORTANT view — full programmatic SEO page.**

```html
@extends('layouts.app')

@section('head')
{{-- === CRITICAL SEO META TAGS === --}}
<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<link rel="canonical" href="{{ $seo['canonical'] }}">
<meta property="og:title" content="{{ $seo['title'] }}">
<meta property="og:description" content="{{ $seo['description'] }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ $seo['canonical'] }}">
<meta property="og:image" content="{{ config('app.url') }}/images/dua-og-default.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo['title'] }}">
<link rel="alternate" hreflang="ur" href="{{ str_replace(config('app.url'), config('app.url').'/ur', $seo['canonical']) }}">
<link rel="alternate" hreflang="en" href="{{ $seo['canonical'] }}">
<link rel="alternate" hreflang="x-default" href="{{ $seo['canonical'] }}">

{{-- === SCHEMA MARKUP (3 schemas) === --}}
<script type="application/ld+json">{{ json_encode($seo['schema_breadcrumb'], JSON_UNESCAPED_UNICODE) }}</script>
<script type="application/ld+json">{{ json_encode($seo['schema_article'], JSON_UNESCAPED_UNICODE) }}</script>
@if(!empty($seo['schema_faq']))
<script type="application/ld+json">{{ json_encode($seo['schema_faq'], JSON_UNESCAPED_UNICODE) }}</script>
@endif
@endsection

@section('content')
<div class="dua-page" itemscope itemtype="https://schema.org/Article">

  {{-- === BREADCRUMB === --}}
  <nav class="breadcrumb-nav" aria-label="Breadcrumb">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">🏠 Home</a></li>
      <li><a href="{{ route('duas.index') }}">Duas</a></li>
      @foreach($dua->categories as $cat)
        <li><a href="{{ route('duas.category', $cat->slug) }}">{{ $cat->name_english }}</a></li>
      @endforeach
      <li aria-current="page">{{ $dua->title_english }}</li>
    </ol>
  </nav>

  {{-- === HERO HEADER === --}}
  <header class="dua-hero" style="background: linear-gradient(135deg, var(--islamic-green) 0%, var(--islamic-green-light) 100%);">
    <div class="container">
      <div class="dua-category-badge">
        @foreach($dua->categories as $cat)
          <a href="{{ route('duas.category', $cat->slug) }}" class="badge-gold">
            <i class="fas {{ $cat->icon_class }}"></i> {{ $cat->name_roman_urdu ?? $cat->name_english }}
          </a>
        @endforeach
      </div>
      <h1 class="dua-title-roman" itemprop="headline">{{ $dua->title_roman_urdu }}</h1>
      <h2 class="dua-title-urdu">{{ $dua->title_urdu }}</h2>
      <p class="dua-short-meaning" itemprop="description">{{ $dua->short_meaning }}</p>
      
      <div class="dua-meta-badges">
        @if($dua->when_to_read)
          <span class="meta-badge"><i class="fas fa-clock"></i> {{ $dua->when_to_read }}</span>
        @endif
        @if($dua->how_many_times)
          <span class="meta-badge"><i class="fas fa-redo"></i> {{ $dua->how_many_times }}</span>
        @endif
        @if($dua->hadith_grade)
          <span class="meta-badge grade-{{ strtolower($dua->hadith_grade) }}">
            <i class="fas fa-check-circle"></i> {{ $dua->hadith_grade }}
          </span>
        @endif
      </div>
    </div>
  </header>

  <div class="container dua-content-grid">
    <main class="dua-main">

      {{-- === ARABIC TEXT CARD (PRIMARY CONTENT) === --}}
      <section class="arabic-card" aria-label="Arabic Dua Text">
        <div class="arabic-text" dir="rtl" lang="ar">
          {{ $dua->arabic_text }}
        </div>
        <button class="copy-btn" onclick="copyArabic()" aria-label="Copy Arabic text">
          <i class="fas fa-copy"></i> Copy Arabic
        </button>
        <button class="listen-btn" onclick="readAloud()" aria-label="Listen to dua">
          <i class="fas fa-volume-up"></i> Listen
        </button>
      </section>

      {{-- === TRANSLITERATION === --}}
      <section class="transliteration-card">
        <h2 class="section-heading"><span class="gold-line"></span> Roman Urdu / Transliteration</h2>
        <p class="transliteration-text">{{ $dua->transliteration }}</p>
      </section>

      {{-- === URDU TRANSLATION === --}}
      <section class="translation-card">
        <h2 class="section-heading"><span class="gold-line"></span> اردو ترجمہ (Urdu Translation)</h2>
        <p class="translation-text" dir="rtl" lang="ur">{{ $dua->translation }}</p>
      </section>

      {{-- === WORD BY WORD (if available) === --}}
      @if($dua->word_by_word_translation)
      <section class="word-by-word-card">
        <h2 class="section-heading"><span class="gold-line"></span> Word by Word Meaning (لفظ بہ لفظ ترجمہ)</h2>
        <div class="word-grid" dir="rtl">
          @foreach($dua->word_by_word_translation as $word)
          <div class="word-item">
            <span class="word-arabic">{{ $word['arabic'] }}</span>
            <span class="word-urdu">{{ $word['urdu'] }}</span>
            <span class="word-english">{{ $word['english'] }}</span>
          </div>
          @endforeach
        </div>
      </section>
      @endif

      {{-- === HADITH REFERENCE === --}}
      @if($dua->reference_source || $dua->hadith_reference)
      <section class="hadith-reference-card">
        <h2 class="section-heading"><span class="gold-line"></span> حوالہ / Hadith Reference</h2>
        <div class="reference-box">
          <i class="fas fa-book-open"></i>
          <div>
            <strong>{{ $dua->book_name ?? $dua->collection_name }}</strong>
            @if($dua->hadith_number) — Hadith #{{ $dua->hadith_number }} @endif
            @if($dua->hadith_grade) <span class="grade-badge">{{ $dua->hadith_grade }}</span> @endif
            @if($dua->reference_source) <p>{{ $dua->reference_source }}</p> @endif
            @if($dua->narrator) <p class="narrator">Narrator: {{ $dua->narrator }}</p> @endif
          </div>
        </div>
      </section>
      @endif

      {{-- === DETAILED EXPLANATION (200+ words — SEO content body) === --}}
      <section class="explanation-card" itemprop="articleBody">
        <h2 class="section-heading"><span class="gold-line"></span> تفصیلی وضاحت (Detailed Explanation)</h2>
        <div class="explanation-content">
          {!! nl2br(e($dua->detailed_explanation)) !!}
        </div>
      </section>

      {{-- === BENEFITS === --}}
      @if($dua->benefits)
      <section class="benefits-card">
        <h2 class="section-heading"><span class="gold-line"></span> فوائد اور برکات (Benefits & Virtues)</h2>
        <div class="benefits-content">
          {!! nl2br(e($dua->benefits)) !!}
        </div>
        @if($dua->practical_benefits)
        <div class="practical-benefits">
          <h3>Amaliat Fayde (Practical Benefits)</h3>
          {!! nl2br(e($dua->practical_benefits)) !!}
        </div>
        @endif
      </section>
      @endif

      {{-- === HOW TO READ === --}}
      <section class="how-to-read-card">
        <h2 class="section-heading"><span class="gold-line"></span> کیسے پڑھیں (How to Read)</h2>
        <div class="how-to-grid">
          @if($dua->when_to_read)
          <div class="how-item">
            <i class="fas fa-clock gold"></i>
            <strong>Kab Parhen:</strong> {{ $dua->when_to_read }}
          </div>
          @endif
          @if($dua->how_many_times)
          <div class="how-item">
            <i class="fas fa-redo gold"></i>
            <strong>Kitni Baar:</strong> {{ $dua->how_many_times }}
          </div>
          @endif
          @if($dua->best_time)
          <div class="how-item">
            <i class="fas fa-star gold"></i>
            <strong>Best Waqt:</strong> {{ $dua->best_time }}
          </div>
          @endif
        </div>
        @if($dua->common_mistakes)
        <div class="common-mistakes">
          <h3><i class="fas fa-exclamation-triangle"></i> Aam Ghaltiyan (Common Mistakes)</h3>
          {!! nl2br(e($dua->common_mistakes)) !!}
        </div>
        @endif
      </section>

      {{-- === IMPORTANT NOTES === --}}
      @if($dua->important_notes || $dua->authenticity_notes)
      <section class="notes-card">
        <h2 class="section-heading"><span class="gold-line"></span> اہم نوٹس (Important Notes)</h2>
        @if($dua->important_notes)
        <div class="notes-box">{!! nl2br(e($dua->important_notes)) !!}</div>
        @endif
        @if($dua->authenticity_notes)
        <div class="authenticity-box">
          <i class="fas fa-shield-alt"></i> <strong>Authenticity:</strong> {!! nl2br(e($dua->authenticity_notes)) !!}
        </div>
        @endif
      </section>
      @endif

      {{-- === LESSONS LEARNED === --}}
      @if($dua->lessons_learned)
      <section class="lessons-card">
        <h2 class="section-heading"><span class="gold-line"></span> Seekhne Ke Nuqaat (Lessons Learned)</h2>
        {!! nl2br(e($dua->lessons_learned)) !!}
      </section>
      @endif

      {{-- === FAQ SECTION (Schema FAQPage — Google Featured Snippets) === --}}
      @if($dua->faqs && count($dua->faqs) > 0)
      <section class="faq-section" aria-label="Frequently Asked Questions">
        <h2 class="section-heading"><span class="gold-line"></span> اکثر پوچھے گئے سوالات (FAQ)</h2>
        <div class="faq-accordion">
          @foreach($dua->faqs as $i => $faq)
          <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-{{ $i }}" itemprop="name">
              <span>{{ $faq['question'] }}</span>
              <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" id="faq-{{ $i }}" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">{{ $faq['answer'] }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      @endif

      {{-- === PREV / NEXT NAVIGATION === --}}
      <nav class="dua-pagination" aria-label="Previous and Next Dua">
        @if($prevDua)
        <a href="{{ route('duas.show', $prevDua->seo_slug) }}" class="prev-dua">
          <i class="fas fa-arrow-right"></i> {{ $prevDua->title_roman_urdu }}
        </a>
        @endif
        @if($nextDua)
        <a href="{{ route('duas.show', $nextDua->seo_slug) }}" class="next-dua">
          {{ $nextDua->title_roman_urdu }} <i class="fas fa-arrow-left"></i>
        </a>
        @endif
      </nav>

    </main>

    {{-- === SIDEBAR === --}}
    <aside class="dua-sidebar">
      
      {{-- Quick Info Box --}}
      <div class="sidebar-card quick-info">
        <h3 class="sidebar-heading">Quick Info</h3>
        <ul>
          @if($dua->dua_type) <li><strong>Type:</strong> {{ ucfirst($dua->dua_type) }}</li> @endif
          @if($dua->difficulty_level) <li><strong>Level:</strong> {{ ucfirst($dua->difficulty_level) }}</li> @endif
          @if($dua->reading_time) <li><strong>Read Time:</strong> {{ $dua->reading_time }} min</li> @endif
          @if($dua->occasion) <li><strong>Occasion:</strong> {{ $dua->occasion }}</li> @endif
        </ul>
      </div>

      {{-- Category Navigation --}}
      <div class="sidebar-card">
        <h3 class="sidebar-heading">Dua Categories</h3>
        <ul class="sidebar-category-list">
          @foreach(\App\Models\DuaCategory::whereNull('parent_id')->withCount('duas')->get() as $cat)
          <li>
            <a href="{{ route('duas.category', $cat->slug) }}" class="{{ $dua->categories->contains('id', $cat->id) ? 'active' : '' }}">
              <i class="fas {{ $cat->icon_class }}"></i>
              {{ $cat->name_roman_urdu ?? $cat->name_english }}
              <span class="count">{{ $cat->duas_count }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>

      {{-- Related Duas --}}
      @if($relatedDuas->count() > 0)
      <div class="sidebar-card">
        <h3 class="sidebar-heading">Related Duas</h3>
        <ul class="related-duas-list">
          @foreach($relatedDuas as $related)
          <li>
            <a href="{{ route('duas.show', $related->seo_slug) }}">
              <span class="related-arabic">{{ Str::limit($related->arabic_text, 30) }}</span>
              <span class="related-roman">{{ $related->title_roman_urdu }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      @endif

      {{-- Share Widget --}}
      <div class="sidebar-card share-widget">
        <h3 class="sidebar-heading">Share This Dua</h3>
        <div class="share-buttons">
          <a href="https://wa.me/?text={{ urlencode($dua->title_roman_urdu . ' - ' . $seo['canonical']) }}" target="_blank" class="share-wa">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
          <button onclick="copyPageLink()" class="share-copy">
            <i class="fas fa-link"></i> Copy Link
          </button>
        </div>
      </div>

    </aside>
  </div>

  {{-- === BOTTOM INTERNAL LINKING GRID === --}}
  <section class="all-categories-section">
    <div class="container">
      <h2 class="section-heading center"><span class="gold-line"></span> Aur Duain Dekhen (More Duas)</h2>
      <div class="category-grid">
        @foreach(\App\Models\DuaCategory::whereNull('parent_id')->with(['duas' => fn($q) => $q->limit(5)])->get() as $cat)
        <div class="category-card">
          <div class="category-icon"><i class="fas {{ $cat->icon_class }}"></i></div>
          <h3><a href="{{ route('duas.category', $cat->slug) }}">{{ $cat->name_roman_urdu }}</a></h3>
          <ul>
            @foreach($cat->duas as $d)
            <li><a href="{{ route('duas.show', $d->seo_slug) }}">{{ $d->title_roman_urdu }}</a></li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>
    </div>
  </section>

</div>

@push('scripts')
<script>
function copyArabic() {
    navigator.clipboard.writeText(`{{ addslashes($dua->arabic_text) }}`);
    showToast('Arabic text copied!');
}
function copyPageLink() {
    navigator.clipboard.writeText(window.location.href);
    showToast('Link copied!');
}
function readAloud() {
    const utterance = new SpeechSynthesisUtterance(`{{ addslashes($dua->transliteration) }}`);
    utterance.lang = 'ar-SA';
    window.speechSynthesis.speak(utterance);
}
function showToast(msg) {
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 3000);
}
// FAQ accordion
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', !expanded);
        btn.nextElementSibling.style.display = expanded ? 'none' : 'block';
    });
});
</script>
@endpush
@endsection
```

---

### File: `resources/views/duas/index.blade.php`

Full duas hub page with:
- H1: "تمام دعائیں — All Islamic Duas in Urdu & Arabic"
- Category grid (7 parent cats with icon, count, description)
- Featured Duas section
- Search bar (JS filter)
- Benefits intro paragraph (200 words for SEO)
- Schema: WebPage + ItemList

---

### File: `resources/views/duas/category.blade.php`

Category listing page with:
- H1: Category name (Roman Urdu) + Urdu H2
- Category description (200 words SEO text)
- Paginated duas grid (20 per page)
- Each card: Arabic snippet + Roman Urdu title + short meaning + "Read More" button
- Sidebar: all other categories (internal linking)
- Schema: CollectionPage + ItemList

---

## 🗂️ PHASE 8 — CSS (APPEND TO existing stylesheet)

### File: `public/css/duas.css` (new file, import in layouts/app.blade.php)

```css
/* ===== DUA PAGE STYLES ===== */
.dua-hero {
    padding: 3rem 0;
    color: #fff;
    text-align: center;
}
.dua-title-roman {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--gold);
    margin-bottom: 0.5rem;
}
.dua-title-urdu {
    font-size: 1.8rem;
    color: #fff;
    font-family: var(--arabic-font);
    direction: rtl;
}
.badge-gold {
    background: var(--gold);
    color: var(--islamic-green);
    padding: 0.3rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.85rem;
    display: inline-block;
    margin: 0.2rem;
}
.meta-badge {
    background: rgba(255,255,255,0.2);
    color: #fff;
    padding: 0.25rem 0.8rem;
    border-radius: 15px;
    font-size: 0.8rem;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    margin: 0.2rem;
}
.arabic-card {
    background: linear-gradient(135deg, #f8f4ee, #fff);
    border: 2px solid var(--gold);
    border-radius: 16px;
    padding: 2.5rem;
    text-align: center;
    margin-bottom: 2rem;
}
.arabic-text {
    font-family: var(--arabic-font);
    font-size: 2rem;
    line-height: 3;
    color: var(--islamic-green);
    direction: rtl;
    margin-bottom: 1.5rem;
}
.copy-btn, .listen-btn {
    background: var(--islamic-green);
    color: var(--gold);
    border: none;
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    margin: 0.3rem;
    transition: all 0.2s;
}
.copy-btn:hover, .listen-btn:hover {
    background: var(--gold);
    color: var(--islamic-green);
}
.section-heading {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--islamic-green);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.7rem;
}
.gold-line {
    display: inline-block;
    width: 4px;
    height: 24px;
    background: var(--gold);
    border-radius: 2px;
}
.transliteration-text {
    font-size: 1.15rem;
    color: #333;
    line-height: 2;
    font-style: italic;
    background: #f0f7f4;
    padding: 1.2rem;
    border-radius: 8px;
    border-left: 4px solid var(--gold);
}
.translation-text {
    font-family: var(--arabic-font);
    font-size: 1.3rem;
    line-height: 2.5;
    direction: rtl;
    color: #222;
    background: #fff9f0;
    padding: 1.2rem;
    border-radius: 8px;
    border-right: 4px solid var(--gold);
}
.word-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
    justify-content: flex-end;
}
.word-item {
    background: #f0f7f4;
    border: 1px solid #c5e1d0;
    border-radius: 8px;
    padding: 0.8rem;
    text-align: center;
    min-width: 80px;
}
.word-arabic {
    display: block;
    font-family: var(--arabic-font);
    font-size: 1.3rem;
    color: var(--islamic-green);
}
.word-urdu { display: block; font-size: 0.8rem; color: #555; direction: rtl; }
.word-english { display: block; font-size: 0.75rem; color: #888; }
.reference-box {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
    background: #f8f4ee;
    border-radius: 10px;
    padding: 1.2rem;
    border-left: 4px solid var(--islamic-green);
}
.grade-badge {
    background: #2d6a4f;
    color: #fff;
    padding: 0.2rem 0.6rem;
    border-radius: 4px;
    font-size: 0.8rem;
}
.how-to-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}
.how-item {
    background: #f0f7f4;
    border-radius: 10px;
    padding: 1rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
}
.gold { color: var(--gold); }
.faq-item {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 0.8rem;
    overflow: hidden;
}
.faq-question {
    width: 100%;
    background: #f8f8f8;
    border: none;
    padding: 1rem 1.2rem;
    text-align: left;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: var(--islamic-green);
    transition: background 0.2s;
}
.faq-question:hover { background: #f0f7f4; }
.faq-answer {
    display: none;
    padding: 1rem 1.2rem;
    color: #444;
    line-height: 1.7;
    border-top: 1px solid #eee;
}
.dua-content-grid {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 2.5rem;
    padding: 2rem 0;
}
@media (max-width: 900px) {
    .dua-content-grid { grid-template-columns: 1fr; }
}
.sidebar-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.2rem;
    box-shadow: 0 2px 12px rgba(26,71,49,0.08);
    margin-bottom: 1.5rem;
    border-top: 3px solid var(--gold);
}
.sidebar-heading {
    font-size: 1rem;
    font-weight: 700;
    color: var(--islamic-green);
    margin-bottom: 0.8rem;
}
.sidebar-category-list { list-style: none; padding: 0; }
.sidebar-category-list li a {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.5rem 0;
    color: #333;
    text-decoration: none;
    border-bottom: 1px solid #f0f0f0;
    font-size: 0.9rem;
    transition: color 0.2s;
}
.sidebar-category-list li a:hover,
.sidebar-category-list li a.active { color: var(--islamic-green); font-weight: 600; }
.sidebar-category-list .count {
    margin-left: auto;
    background: var(--islamic-green);
    color: #fff;
    font-size: 0.7rem;
    padding: 0.1rem 0.5rem;
    border-radius: 10px;
}
.related-duas-list { list-style: none; padding: 0; }
.related-duas-list li a {
    display: flex;
    flex-direction: column;
    padding: 0.6rem 0;
    border-bottom: 1px solid #f0f0f0;
    text-decoration: none;
}
.related-arabic { font-family: var(--arabic-font); font-size: 0.95rem; direction: rtl; color: var(--islamic-green); }
.related-roman { font-size: 0.8rem; color: #777; }
.share-buttons { display: flex; gap: 0.8rem; }
.share-wa {
    background: #25D366;
    color: #fff;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}
.share-copy {
    background: var(--islamic-green);
    color: var(--gold);
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    cursor: pointer;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}
.dua-pagination {
    display: flex;
    justify-content: space-between;
    padding: 1.5rem 0;
    border-top: 1px solid #e0e0e0;
    margin-top: 2rem;
}
.prev-dua, .next-dua {
    color: var(--islamic-green);
    text-decoration: none;
    font-weight: 600;
    padding: 0.6rem 1.2rem;
    border: 2px solid var(--islamic-green);
    border-radius: 8px;
    transition: all 0.2s;
}
.prev-dua:hover, .next-dua:hover {
    background: var(--islamic-green);
    color: var(--gold);
}
.all-categories-section {
    background: #f0f7f4;
    padding: 3rem 0;
    margin-top: 3rem;
}
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
}
.category-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    border-top: 3px solid var(--gold);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.category-icon {
    font-size: 2rem;
    color: var(--gold);
    margin-bottom: 0.8rem;
}
.category-card h3 a {
    color: var(--islamic-green);
    font-size: 1rem;
    font-weight: 700;
    text-decoration: none;
}
.category-card ul {
    list-style: none;
    padding: 0;
    margin-top: 0.5rem;
}
.category-card ul li a {
    font-size: 0.85rem;
    color: #555;
    text-decoration: none;
    display: block;
    padding: 0.25rem 0;
    border-bottom: 1px dotted #e0e0e0;
}
.category-card ul li a:hover { color: var(--islamic-green); }
.toast {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: var(--islamic-green);
    color: var(--gold);
    padding: 0.8rem 1.5rem;
    border-radius: 8px;
    z-index: 9999;
    font-weight: 600;
    animation: fadeInOut 3s forwards;
}
@keyframes fadeInOut {
    0% { opacity: 0; transform: translateY(10px); }
    15% { opacity: 1; transform: translateY(0); }
    85% { opacity: 1; }
    100% { opacity: 0; }
}
.breadcrumb-nav { padding: 0.8rem 0; background: #f8f4ee; }
.breadcrumb { list-style: none; display: flex; gap: 0.5rem; padding: 0; margin: 0; font-size: 0.85rem; flex-wrap: wrap; }
.breadcrumb li:not(:last-child)::after { content: " › "; color: #999; }
.breadcrumb li a { color: var(--islamic-green); text-decoration: none; }
.breadcrumb li a:hover { color: var(--gold); }
```

---

## 🗂️ PHASE 9 — SEO META SEEDER

### File: `database/seeders/DuaSeoMetaSeeder.php`

After seeding duas, auto-generate `seo_metas` for every dua:

```php
$duas = \App\Models\Dua::all();
foreach ($duas as $dua) {
    \App\Models\SeoMeta::updateOrCreate(
        ['metaable_type' => \App\Models\Dua::class, 'metaable_id' => $dua->id],
        [
            'title' => $dua->seo_title ?? ($dua->title_roman_urdu . ' - ' . $dua->title_urdu . ' | NoorIslam'),
            'meta_description' => $dua->meta_description ?? Str::limit($dua->short_meaning, 155),
            'canonical_url' => config('app.url') . '/dua/' . $dua->seo_slug,
            'og_image' => config('app.url') . '/images/duas/og-' . $dua->seo_slug . '.jpg',
        ]
    );
}
// Also seed seo_metas for categories
$cats = \App\Models\DuaCategory::all();
foreach ($cats as $cat) {
    \App\Models\SeoMeta::updateOrCreate(
        ['metaable_type' => \App\Models\DuaCategory::class, 'metaable_id' => $cat->id],
        [
            'title' => $cat->seo_title ?? ($cat->name_roman_urdu . ' Ki Tamam Duain | NoorIslam'),
            'meta_description' => $cat->seo_description ?? ('NoorIslam par ' . $cat->name_roman_urdu . ' ki duain mukammal Arabic, Urdu aur Roman Urdu mein parhen.'),
            'canonical_url' => config('app.url') . '/duas/category/' . $cat->slug,
        ]
    );
}
```

---

## 🗂️ PHASE 10 — SITEMAP UPDATE

### File: `app/Console/Commands/GenerateDuasSitemap.php`

```php
// Artisan command: php artisan sitemap:duas
// Generates: public/sitemap-duas.xml
// Include all /dua/{slug} URLs with:
//   <changefreq>monthly</changefreq>
//   <priority>0.8</priority>
//   <lastmod>{updated_at}</lastmod>
// Also include /duas and /duas/category/{slug} with priority 0.9
```

Add to `public/sitemap-index.xml`:
```xml
<sitemap>
  <loc>https://noorislam.com/sitemap-duas.xml</loc>
  <lastmod>{{ now()->toDateString() }}</lastmod>
</sitemap>
```

---

## 🗂️ PHASE 11 — INTERNAL LINKING RULES

Every dua page MUST link to:
1. **Parent category page** (breadcrumb + hero badge)
2. **6-8 related duas** from same category (sidebar)
3. **All 7 category hubs** (bottom section grid)
4. **Prev/Next dua** (pagination nav)
5. **Homepage** (breadcrumb)

Every category page MUST link to:
1. All duas in that category (paginated)
2. All other categories (sidebar)
3. Featured/top duas (first 3 featured)

Duas Index (`/duas`) MUST link to:
1. All 7 category hubs
2. 8 featured duas
3. Most searched duas (Top 10 by keyword volume)

---

## 🗂️ PHASE 12 — SEEDER REGISTRATION

### File: `database/seeders/DatabaseSeeder.php`

```php
$this->call([
    DuaCategorySeeder::class,    // Run first
    DuasMasterSeeder::class,     // Run second (95 duas)
    DuaSeoMetaSeeder::class,     // Run last
]);
```

**Run order:**
```bash
php artisan db:seed --class=DuaCategorySeeder
php artisan db:seed --class=DuasMasterSeeder
php artisan db:seed --class=DuaSeoMetaSeeder
php artisan sitemap:duas
php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan cache:clear
```

---

## ✅ CONTENT QUALITY REQUIREMENTS (Per Dua)

Each dua seeded must have:

| Field | Requirement |
|-------|-------------|
| `arabic_text` | Authentic Arabic — NOT placeholder |
| `transliteration` | Full Roman Urdu/English transliteration |
| `translation` | Urdu translation (100+ words for long duas) |
| `short_meaning` | 1-2 sentence summary in English + Urdu |
| `detailed_explanation` | Minimum 300 words — context, history, significance |
| `benefits` | Minimum 150 words — spiritual + practical |
| `when_to_read` | Specific timing (e.g., "Soone se pehle bistar par") |
| `how_many_times` | Specific count |
| `reference_source` | Book name + hadith number |
| `hadith_grade` | Sahih / Hasan / Da'if / Maudu |
| `faqs` | JSON array of 5 FAQs minimum |
| `word_by_word_translation` | JSON array for short duas |
| `seo_title` | Keyword-first, 60 chars max |
| `meta_description` | 155 chars, includes Roman Urdu keyword |
| `seo_slug` | Exact Roman Urdu keyword (e.g., `sone-ki-dua`) |
| `keywords` | 10+ comma-separated keywords |
| `tags` | JSON array of tags |
| `difficulty_level` | beginner / intermediate / advanced |
| `reading_time` | Minutes (int) |
| `published_status` | 1 |
| `verified_status` | 1 |

---

## ✅ FAQ TEMPLATE (Per Dua — Minimum 5 FAQs)

Use this structure for `faqs` JSON field:

```json
[
  {
    "question": "{title_roman_urdu} kab parhi jaati hai?",
    "answer": "{when_to_read} - detailed answer with Islamic context..."
  },
  {
    "question": "{title_roman_urdu} ki fazilat kya hai?",
    "answer": "Is dua ki fazilat hadith mein bayaan hui hai ke..."
  },
  {
    "question": "{title_roman_urdu} kitni baar parhi jaaye?",
    "answer": "{how_many_times} - Hadith ke mutabiq..."
  },
  {
    "question": "Kya {title_roman_urdu} Quran se hai ya Hadith se?",
    "answer": "Yeh dua {dua_type} hai. Reference: {reference_source}."
  },
  {
    "question": "{title_roman_urdu} ka Urdu mein matlab kya hai?",
    "answer": "{translation} - is dua ka matlab hai ke..."
  }
]
```

---

## ✅ .ENV FIX

```env
APP_URL=https://noorislam.com
APP_ENV=production
```

Make sure `config/app.php` uses `env('APP_URL')` for canonical generation.

---

## ✅ FINAL CHECKLIST

- [ ] `DuaCategorySeeder` — 7 new parents + 9 existing (no duplicates)
- [ ] `DuasMasterSeeder` — 93+ duas with ALL fields populated
- [ ] `DuaSeoMetaSeeder` — seo_metas for all duas + categories
- [ ] `DuaController` — index, category, show methods
- [ ] Routes — `/duas`, `/duas/category/{slug}`, `/dua/{slug}`
- [ ] `duas/show.blade.php` — full page with 12 sections
- [ ] `duas/index.blade.php` — hub page
- [ ] `duas/category.blade.php` — listing page
- [ ] `public/css/duas.css` — full stylesheet
- [ ] Sitemap command + sitemap-duas.xml
- [ ] APP_URL fixed to production domain
- [ ] All Arabic text authentic (not placeholder)
- [ ] All 3 Schema.org markups (Article + FAQPage + BreadcrumbList)
- [ ] Internal linking on every page
- [ ] Mobile responsive CSS
- [ ] Bilingual (English + Urdu + Roman Urdu) on every page
- [ ] WhatsApp share button (critical for Pakistan market)
- [ ] Copy Arabic button + Web Speech API listen button
- [ ] FAQ accordion with proper ARIA

---

*Antigravity v1 — NoorIslam Duas Programmatic SEO — Generated 2026-07-05*
