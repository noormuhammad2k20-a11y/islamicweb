# 🔧 FULL PROMPT — NoorIslam.com: Fix Duplicate Content on 99 Names of Allah Pages

---

## 📌 PROJECT INFO

- **Website:** NoorIslam.com
- **GitHub:** https://github.com/noormuhammad2k20-a11y/islamicweb
- **Stack:** Laravel (PHP 8.2) + MariaDB 10.4
- **Local Dev URL:** http://127.0.0.1:8000
- **Issue Pages (examples):**
  - http://127.0.0.1:8000/99-names-of-allah/al-malik
  - http://127.0.0.1:8000/99-names-of-allah/al-quddus

---

## ❌ PROBLEM — Duplicate Content on All 99 Names Pages

Currently, the following 5 content sections are **identical (hardcoded or repeated)** on every single one of the 99 Names of Allah pages. This is a critical SEO issue because Google sees 99 near-duplicate pages and penalizes them:

| # | Section | Problem |
|---|---------|---------|
| 1 | **Quranic Reference** | Same Quran reference/ayah number shown on every page |
| 2 | **Quran Verse English Translation** | Same translation text shown on every page |
| 3 | **Practical Lessons** | Same bullet points on every page |
| 4 | **Dhikr & Reflection intro text** | Same paragraph on every page |
| 5 | **Explanation & Virtues structure** | Same boilerplate — only the name word changes |

---

## ✅ REQUIRED FIX — 3 Parts

### PART 1 → Create a Laravel Migration

Add the following **new columns** to the `allah_names` table:

```php
// File: database/migrations/YYYY_MM_DD_add_unique_content_to_allah_names_table.php

Schema::table('allah_names', function (Blueprint $table) {
    $table->text('quran_verse_arabic')->nullable()->after('quran_reference');
    $table->text('quran_verse_translation')->nullable()->after('quran_verse_arabic');
    $table->text('explanation')->nullable()->after('quran_verse_translation');
    $table->text('virtues')->nullable()->after('explanation');
    $table->text('practical_lessons')->nullable()->after('virtues');
    $table->text('dhikr_reflection')->nullable()->after('practical_lessons');
});
```

Run: `php artisan migrate`

---

### PART 2 → Create a Seeder with UNIQUE Content for All 99 Names

Create file: `database/seeders/AllahNamesUniqueContentSeeder.php`

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AllahName;

class AllahNamesUniqueContentSeeder extends Seeder
{
    public function run(): void
    {
        $data = $this->getData();

        foreach ($data as $slug => $content) {
            AllahName::where('slug', $slug)->update([
                'quran_reference'        => $content['quran_reference'],
                'quran_verse_arabic'     => $content['quran_verse_arabic'],
                'quran_verse_translation'=> $content['quran_verse_translation'],
                'explanation'            => $content['explanation'],
                'virtues'                => $content['virtues'],
                'practical_lessons'      => $content['practical_lessons'],
                'dhikr_reflection'       => $content['dhikr_reflection'],
            ]);
        }

        $this->command->info('✅ All 99 Allah Names unique content seeded successfully!');
    }

    private function getData(): array
    {
        return [

            // ─────────────────────────────────────────────────
            // #1 — Ar-Rahman | الرَّحْمَنُ | The All-Compassionate
            // ─────────────────────────────────────────────────
            'ar-rahman' => [
                'quran_reference'         => 'Surah Al-Fatiha (1:3)',
                'quran_verse_arabic'      => 'ٱلرَّحْمَٰنِ ٱلرَّحِيمِ',
                'quran_verse_translation' => 'The Most Gracious, the Most Merciful.',
                'explanation'             => 'Ar-Rahman refers to the all-encompassing mercy of Allah that extends to every creation in this world — believer and disbeliever alike. It is the mercy that provides rain, sustenance, and life to all. This name appears 57 times in the Quran and is so significant that an entire surah (Surah Ar-Rahman, 55) is named after it.',
                'virtues'                 => 'Whoever recites "Ya Rahman" 100 times after Fajr will have a sharp memory and a heart softened toward all of creation. The Prophet ﷺ said: "Allah has divided mercy into one hundred parts; He retained with Him ninety-nine parts, and sent down one part to the earth." (Bukhari)',
                'practical_lessons'       => "1. Show mercy to all — not just those who deserve it.\n2. Feed others (animals, birds, the poor) as an act of connecting with Ar-Rahman.\n3. Forgive someone today who wronged you — practice Allah's mercy in your own life.\n4. When you feel hard-hearted, recite 'Ya Rahman' repeatedly to soften the heart.",
                'dhikr_reflection'        => 'Sit quietly after Fajr. Place your hand on your chest. Recite "Ya Rahman" 100 times slowly. With each repetition, feel Allah\'s mercy washing over you like rain. Think of one person today you will be merciful toward — even if they don\'t deserve it.',
            ],

            // ─────────────────────────────────────────────────
            // #2 — Ar-Rahim | الرَّحِيمُ | The All-Merciful
            // ─────────────────────────────────────────────────
            'ar-rahim' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:163)',
                'quran_verse_arabic'      => 'وَإِلَٰهُكُمْ إِلَٰهٌ وَاحِدٌ ۖ لَّا إِلَٰهَ إِلَّا هُوَ الرَّحْمَٰنُ الرَّحِيمُ',
                'quran_verse_translation' => 'Your God is one God; there is no deity except Him, the Most Gracious, the Most Merciful.',
                'explanation'             => 'Ar-Rahim is the special, targeted mercy of Allah exclusively reserved for the believers in the Hereafter. While Ar-Rahman is general mercy for all creation, Ar-Rahim is the intense, personal mercy Allah shows His faithful servants. It appears 114 times in the Quran — once per surah in the Bismillah.',
                'virtues'                 => 'Reciting "Ya Raheem" after every obligatory salah invites Allah\'s special mercy upon your affairs. The Prophet ﷺ encouraged beginning every important act with Bismillah-ir-Rahman-ir-Raheem, connecting us to both dimensions of divine mercy.',
                'practical_lessons'       => "1. Ask forgiveness daily — Ar-Rahim's mercy covers past sins.\n2. Be merciful in your judgments of others; avoid harshness.\n3. Remember: Allah's mercy is greater than any sin you have committed.\n4. Make du'a with full hope — a Raheem God does not turn away sincere repentance.",
                'dhikr_reflection'        => 'After each of your five daily prayers today, close your eyes and say "Ya Raheem" 33 times. Imagine Allah\'s special mercy as a warm light covering your heart. Reflect on one sin you want forgiven and believe with certainty that Ar-Rahim has forgiven it.',
            ],

            // ─────────────────────────────────────────────────
            // #3 — Al-Malik | الْمَلِكُ | The Absolute Ruler
            // ─────────────────────────────────────────────────
            'al-malik' => [
                'quran_reference'         => 'Surah Al-Hashr (59:23)',
                'quran_verse_arabic'      => 'هُوَ اللَّهُ الَّذِي لَا إِلَٰهَ إِلَّا هُوَ الْمَلِكُ الْقُدُّوسُ السَّلَامُ',
                'quran_verse_translation' => 'He is Allah, other than whom there is no deity, the Sovereign, the Pure, the Perfection of Peace.',
                'explanation'             => 'Al-Malik means the King, the absolute Owner and Ruler of the universe. Unlike earthly kings whose power is limited and temporary, Allah\'s kingship is perfect, eternal, and without partner. He owns everything — all wealth, all authority, all existence belongs to Him alone. On the Day of Judgment, He will announce: "Whose is the kingdom today? It is Allah\'s, the One, the Prevailing." (40:16)',
                'virtues'                 => 'Reciting "Ya Malik" after Fajr grants dignity and removes dependence on others. Scholars noted that the one who reflects on Allah as Al-Malik begins to feel free — no longer enslaved to the approval, wealth, or power of other people, because all real power rests with the true King.',
                'practical_lessons'       => "1. Whenever you feel powerless before people — remember, only Al-Malik truly holds power.\n2. Do not bow your dignity before any human; reserve your complete submission for the true King.\n3. Ask Al-Malik directly for provision — He is the one who controls it, not your employer or government.\n4. Recite Surah Al-Mulk nightly — a sunnah that reminds us of Allah's complete sovereignty.",
                'dhikr_reflection'        => 'After Fajr today, sit in sajdah position (or sit cross-legged) and repeat "Ya Malik, Ya Malik" 100 times. With each repetition, mentally hand over one worry — your finances, your family, your future — to the true King. Feel the relief of not being in control yourself.',
            ],

            // ─────────────────────────────────────────────────
            // #4 — Al-Quddus | الْقُدُّوسُ | The Pure One
            // ─────────────────────────────────────────────────
            'al-quddus' => [
                'quran_reference'         => 'Surah Al-Jumu\'ah (62:1)',
                'quran_verse_arabic'      => 'يُسَبِّحُ لِلَّهِ مَا فِي السَّمَاوَاتِ وَمَا فِي الْأَرْضِ الْمَلِكِ الْقُدُّوسِ الْعَزِيزِ الْحَكِيمِ',
                'quran_verse_translation' => 'Whatever is in the heavens and whatever is on the earth exalts Allah — the Sovereign, the Pure, the Exalted in Might, the Wise.',
                'explanation'             => 'Al-Quddus means the Absolutely Pure — free from every deficiency, fault, partner, or imperfection. All of creation glorifies this purity (tasbih). When the angels said to Allah about creating Adam, they said "wa nahnu nusabbihu bihamdika wa nuqaddisu lak" — "we glorify Your praise and sanctify You." The word "nuqaddisu" comes from Quddus. This name reminds us that everything attributed to Allah must be absolutely free of any human limitation.',
                'virtues'                 => 'Reciting "Subboohun Quddoosun Rabbul Malaa\'ikati war-Rooh" — which the Prophet ﷺ used in ruku and sujood — connects you to the angels\' glorification. Reciting "Ya Quddus" 100 times daily is said to cleanse the heart of jealousy, pride, and spiritual pollution.',
                'practical_lessons'       => "1. Purify your intentions before every act — make it purely for Al-Quddus.\n2. Practice tasbih (SubhanAllah) frequently — it is the verbal recognition of Allah's purity.\n3. The more you recognise Allah's purity, the more you feel your own spiritual impurity and seek tawbah.\n4. Clean your physical environment too — purity of place reflects love for Al-Quddus.",
                'dhikr_reflection'        => 'Before sleeping tonight, make wudu (even if you already have it) and then sit in a clean, quiet space. Recite "Subboohun Quddoosun Rabbul Malaa\'ikati war-Rooh" 33 times. Reflect on one impurity in your character — arrogance, envy, dishonesty — and sincerely ask Al-Quddus to purify it from you.',
            ],

            // ─────────────────────────────────────────────────
            // #5 — As-Salam | السَّلَامُ | The Source of Peace
            // ─────────────────────────────────────────────────
            'as-salam' => [
                'quran_reference'         => 'Surah Al-Hashr (59:23)',
                'quran_verse_arabic'      => 'هُوَ اللَّهُ الَّذِي لَا إِلَٰهَ إِلَّا هُوَ الْمَلِكُ الْقُدُّوسُ السَّلَامُ الْمُؤْمِنُ',
                'quran_verse_translation' => 'He is Allah, other than whom there is no deity — the Sovereign, the Pure, the Perfection of Peace, the Bestower of Faith.',
                'explanation'             => 'As-Salam means the Source and Embodiment of Peace — not just one who grants peace, but One whose very essence IS peace. The greeting of the people of Jannah will be "Salam" (36:58), showing that ultimate peace is inseparable from Allah. Every Muslim salah ends with Assalamu Alaikum — a salutation that channels the divine peace of As-Salam.',
                'virtues'                 => 'Reciting "Ya Salam" 160 times over a sick person has been narrated by Islamic scholars as beneficial for recovery. After each obligatory prayer, the sunnah is to say "Allahumma Anta as-Salam wa minka as-Salam — O Allah, You are Peace and from You comes peace."',
                'practical_lessons'       => "1. When you are anxious, say \"Ya Salam\" repeatedly — you are calling upon the source of all peace.\n2. Spread salaam generously — it distributes divine peace in the world.\n3. Create peace in your home, your words, your relationships — be a reflection of this name.\n4. Before sleeping, recite Ayatul Kursi — it brings the peace of As-Salam into your night.",
                'dhikr_reflection'        => 'Whenever you feel anxious or restless today — pause. Place your hand on your heart and whisper "Ya Salam, Ya Salam, Ya Salam" slowly, 21 times. Feel each repetition as a wave of peace entering your chest. Remember: the Being you are calling on is the very source of all tranquility that exists.',
            ],

            // ─────────────────────────────────────────────────
            // #6 — Al-Mu'min | الْمُؤْمِنُ | The Inspirer of Faith
            // ─────────────────────────────────────────────────
            'al-mumin' => [
                'quran_reference'         => 'Surah Al-Hashr (59:23)',
                'quran_verse_arabic'      => 'الْمُؤْمِنُ الْمُهَيْمِنُ الْعَزِيزُ الْجَبَّارُ الْمُتَكَبِّرُ',
                'quran_verse_translation' => 'The Bestower of Faith, the Overseer, the Exalted in Might, the Compeller, the Superior.',
                'explanation'             => 'Al-Mu\'min comes from the same root as "iman" (faith) and "amana" (safety, trust). Allah is Al-Mu\'min in two senses: (1) He is the one who granted faith (iman) to the believers, and (2) He is the guarantor of security — the One who gives protection from fear. On the Day of Judgment, those who feared Allah will hear: "Enter Paradise in peace and security." Allah is the ultimate source of both belief and safety.',
                'virtues'                 => 'Reciting "Ya Mu\'min" 630 times creates a protective shield around the reciter. Scholars say whoever makes this dhikr sincerely will be protected from the evil of oppressors and enemies. More importantly, Allah grants the heart of the reciter a deeper, more unshakeable iman.',
                'practical_lessons'       => "1. When your faith wavers, ask Al-Mu'min directly to renew it — He is its source.\n2. Trust in Allah's guarantee of safety — fear of people will diminish when you recognize Al-Mu'min.\n3. Strengthen iman through knowledge, dhikr, and the company of believers.\n4. Say \"Allahu Akbar\" when fear strikes — you are affirming the greatness of Al-Mu'min over your fears.",
                'dhikr_reflection'        => 'Think of one thing that you fear right now — a health concern, a relationship, a financial worry. Now recite "Ya Mu\'min" 100 times, and after each ten, say: "I place this fear in Your hands, O Mu\'min." Feel the transfer of burden. You are handing your security over to the only Being who can truly guarantee it.',
            ],

            // ─────────────────────────────────────────────────
            // #7 — Al-Muhaymin | الْمُهَيْمِنُ | The Guardian
            // ─────────────────────────────────────────────────
            'al-muhaymin' => [
                'quran_reference'         => 'Surah Al-Ma\'idah (5:48)',
                'quran_verse_arabic'      => 'وَأَنزَلْنَا إِلَيْكَ الْكِتَابَ بِالْحَقِّ مُصَدِّقًا لِّمَا بَيْنَ يَدَيْهِ مِنَ الْكِتَابِ وَمُهَيْمِنًا عَلَيْهِ',
                'quran_verse_translation' => 'And We have revealed to you the Book in truth, confirming what came before it and as a guardian (muhaymin) over it.',
                'explanation'             => 'Al-Muhaymin is the Overseer and Protector — the One who watches over all things with complete knowledge and control. This name combines three meanings: (1) the Witness who sees all, (2) the Protector who guards all, and (3) the Trustee who has authority over all. The Quran itself is described as a "muhaymin" — a guardian — over previous scriptures, which shows the profound nature of this name.',
                'virtues'                 => 'Reciting "Ya Muhaymin" after wudu with complete concentration purifies both the outer body (through wudu) and the inner self (through the name). It strengthens a person\'s consciousness of being watched by Allah, which is the essence of ihsan — worshipping Allah as if you see Him.',
                'practical_lessons'       => "1. Behave as if Allah is watching — because Al-Muhaymin IS watching. Always.\n2. Build the habit of muraqabah — consciousness of Allah's oversight — in daily actions.\n3. When you are alone and tempted to sin, remember: Al-Muhaymin never looks away.\n4. Find comfort in His oversight — nothing happens to you outside His guardian watch.",
                'dhikr_reflection'        => 'For 10 minutes today, sit in silence after wudu. Recite "Ya Muhaymin" slowly and repeatedly. Between repetitions, ask yourself: "If Al-Muhaymin is watching me right now, what does He see?" Let this question cleanse one hidden habit or thought that does not belong in your life.',
            ],

            // ─────────────────────────────────────────────────
            // #8 — Al-Aziz | الْعَزِيزُ | The Victorious
            // ─────────────────────────────────────────────────
            'al-aziz' => [
                'quran_reference'         => 'Surah Ibrahim (14:4)',
                'quran_verse_arabic'      => 'فَيُضِلُّ اللَّهُ مَن يَشَاءُ وَيَهْدِي مَن يَشَاءُ ۚ وَهُوَ الْعَزِيزُ الْحَكِيمُ',
                'quran_verse_translation' => 'Allah sends astray whom He wills and guides whom He wills. And He is the Exalted in Might, the Wise.',
                'explanation'             => 'Al-Aziz means the Mighty, the Invincible, the One who is never overcome. The word "Izzah" (honor, might) is the root — and the Quran states that all honor belongs to Allah alone (4:139). Al-Aziz is invincible in three ways: no one can force Him, no one can access Him without His permission, and no one can overcome or diminish Him. This name appears 92 times in the Quran, often paired with Al-Hakim (Wise) or Al-Rahim (Merciful).',
                'virtues'                 => 'Reciting "Ya Aziz" 40 times after Fajr for 40 consecutive days is narrated to bring independence from the need of others — self-sufficiency and honor from Allah. The believer who connects with this name begins to seek honor from Allah instead of from people.',
                'practical_lessons'       => "1. Stop seeking honor (izzah) from people — seek it from Al-Aziz alone.\n2. Remember: your dignity comes from your connection to Allah, not from wealth or status.\n3. When you feel humiliated, recite \"Allahu Akbar\" — you are affirming allegiance to the truly Mighty One.\n4. Do not compromise your deen for worldly honor — Al-Aziz protects those who protect His limits.",
                'dhikr_reflection'        => 'Think of a situation where you felt powerless or humiliated. Now recite "Ya Aziz" 40 times. After each ten, affirm: "My honor is with Allah alone." Feel the shift — from seeking validation from people, to resting in the might of Al-Aziz. Carry this feeling through your interactions today.',
            ],

            // ─────────────────────────────────────────────────
            // #9 — Al-Jabbar | الْجَبَّارُ | The Compeller
            // ─────────────────────────────────────────────────
            'al-jabbar' => [
                'quran_reference'         => 'Surah Al-Hashr (59:23)',
                'quran_verse_arabic'      => 'الْعَزِيزُ الْجَبَّارُ الْمُتَكَبِّرُ ۚ سُبْحَانَ اللَّهِ عَمَّا يُشْرِكُونَ',
                'quran_verse_translation' => 'The Exalted in Might, the Compeller, the Superior — exalted is Allah above whatever they associate with Him.',
                'explanation'             => 'Al-Jabbar comes from "jabara" — to set broken bones, to repair what is fractured. Allah is Al-Jabbar in two profound senses: (1) He compels all things according to His will — nothing resists Him, and (2) He repairs and restores broken hearts, broken lives, broken people. The jabr (setting of a bone) brings healing through what first appears as force. This is why Al-Jabbar is the name for those who feel shattered.',
                'virtues'                 => 'Reciting "Ya Jabbar" brings healing to broken relationships, shattered confidence, and failed circumstances. Scholars note: "If a bone can be set, then Al-Jabbar can repair anything." This name is especially powerful during times of feeling crushed by oppression or helplessness.',
                'practical_lessons'       => "1. When something in your life is broken — a relationship, a dream, your health — call on Al-Jabbar.\n2. Do not submit to oppressors; Al-Jabbar will deal with those who compel others unjustly.\n3. The compulsion of Al-Jabbar in your life (hardships, losses) is often His way of setting you back on the right path.\n4. In sujood, recite \"Subhana Rabbiyal A'la\" — glorifying Al-Jabbar at the point of greatest humility.",
                'dhikr_reflection'        => 'Think of something in your life that feels irreparably broken. In sujood (or with your forehead low if unable), whisper "Ya Jabbar, ajbur kasri — O Jabbar, repair my brokenness" 40 times. Trust that the One who sets fractured bones can repair far greater breaks in your life and heart.',
            ],

            // ─────────────────────────────────────────────────
            // #10 — Al-Mutakabbir | الْمُتَكَبِّرُ | The Greatest
            // ─────────────────────────────────────────────────
            'al-mutakabbir' => [
                'quran_reference'         => 'Surah Az-Zumar (39:36)',
                'quran_verse_arabic'      => 'وَهُوَ الْعَزِيزُ الْحَكِيمُ، إِنَّ اللَّهَ عَزِيزٌ ذُو انتِقَامٍ',
                'quran_verse_translation' => 'Is Allah not sufficient for His servant? And they threaten you with those besides Him. Whoever Allah sends astray — for him there is no guide.',
                'explanation'             => 'Al-Mutakabbir is the Supremely Great — the One to whom all greatness rightfully belongs. Unlike human arrogance (kibr) which is a sin, Allah\'s greatness (takabbur) is His right because He alone possesses true greatness. The Prophet ﷺ said: "Greatness is Allah\'s garment and might is His lower garment" — meaning these attributes belong to Allah exclusively. When humans wear these, they are usurpers.',
                'virtues'                 => 'Reciting "Ya Mutakabbir" before an important meeting or gathering grants presence and dignity without arrogance. Paradoxically, reflecting on Allah\'s supreme greatness cures the human disease of arrogance — because you realize how infinitely small you are beside Al-Mutakabbir.',
                'practical_lessons'       => "1. Every time you feel pride rising in your heart, say \"Ya Mutakabbir\" — remind yourself that greatness belongs to Him.\n2. Recognizing Al-Mutakabbir naturally produces humility (tawadu) in a believer.\n3. Do not be intimidated by powerful people — before Al-Mutakabbir, all human greatness is nothing.\n4. Recite \"SubhanAllahi wa bihamdihi, SubhanAllahil Azeem\" — it is the tasbih that honors the Supreme Greatness of Allah.",
                'dhikr_reflection'        => 'Sit for a moment and imagine the most powerful human being you know or know of — a world leader, a billionaire. Now recite "Ya Mutakabbir" 33 times and with each repetition remind yourself: this person, despite all their power, will one day stand as dust before Al-Mutakabbir. Let this shrink any fear of powerful people in your heart.',
            ],

            // ─────────────────────────────────────────────────
            // #11 — Al-Khaliq | الْخَالِقُ | The Creator
            // ─────────────────────────────────────────────────
            'al-khaliq' => [
                'quran_reference'         => 'Surah Al-Hashr (59:24)',
                'quran_verse_arabic'      => 'هُوَ اللَّهُ الْخَالِقُ الْبَارِئُ الْمُصَوِّرُ ۖ لَهُ الْأَسْمَاءُ الْحُسْنَىٰ',
                'quran_verse_translation' => 'He is Allah, the Creator, the Inventor, the Fashioner; to Him belong the best names.',
                'explanation'             => 'Al-Khaliq is the Creator who brings into existence from nothing (ex nihilo). Human creativity rearranges what already exists — only Al-Khaliq creates from absolute non-existence. The Quran challenges: "Is there any creator (khaliq) other than Allah who provides for you from the heaven and earth?" (35:3). The answer is obviously no. Every act of creation — from galaxies to neurons to the delicate structure of a snowflake — is authored entirely by Al-Khaliq.',
                'virtues'                 => 'Reflecting on Al-Khaliq as you observe nature — the anatomy of a leaf, the movement of clouds, the structure of the human eye — is itself a form of dhikr. The Prophet ﷺ praised those who contemplate creation. For couples seeking children, reciting "Ya Khaliq" with sincere du\'a connects the request to the One who alone has the power to create new life.',
                'practical_lessons'       => "1. Marvel at creation daily — each thing you observe is authored by Al-Khaliq.\n2. When you encounter any form of human creativity, remember: the creative capacity itself was given by Al-Khaliq.\n3. Never say 'I created this' without acknowledging that your own hands, mind, and existence came from Al-Khaliq.\n4. Visit nature — forests, oceans, the night sky — as a deliberate act of knowing Al-Khaliq.",
                'dhikr_reflection'        => 'Today, take 5 minutes to look at something in nature — a plant, the sky, an insect, your own hand. Examine it carefully. Recite "Ya Khaliq" 50 times while observing. Let each repetition deepen your awe of the Being who designed what you are looking at with infinite precision, without a template, from nothing.',
            ],

            // ─────────────────────────────────────────────────
            // #12 — Al-Bari' | الْبَارِئُ | The Maker of Order
            // ─────────────────────────────────────────────────
            'al-bari' => [
                'quran_reference'         => 'Surah Al-Hashr (59:24)',
                'quran_verse_arabic'      => 'هُوَ اللَّهُ الْخَالِقُ الْبَارِئُ الْمُصَوِّرُ',
                'quran_verse_translation' => 'He is Allah, the Creator, the Originator (Al-Bari\'), the Fashioner.',
                'explanation'             => 'Al-Bari\' means the One who distinguishes and separates creation — giving each thing its own distinct form, nature, and function. While Al-Khaliq creates from nothing, Al-Bari\' distinguishes each created thing into its particular design and separates it from others. He made the whale distinct from the sparrow, the diamond distinct from the dust — all from the same primordial matter. Al-Bari\' is the name behind all distinction and differentiation in existence.',
                'virtues'                 => 'Reciting "Ya Bari\'" helps in moments of confusion, when paths seem unclear and choices indistinct. It aids in finding clarity — as Al-Bari\' is the Master of distinction. For those who have made mistakes and seek a fresh start, this name is powerful — it speaks to the creation of something new and distinct from what came before.',
                'practical_lessons'       => "1. When confused between two paths, ask Al-Bari' to bring clarity and distinction to your situation.\n2. Appreciate the uniqueness of every human being — Al-Bari' made no two people the same.\n3. Your fingerprint is unique among 8 billion people — this is Al-Bari's signature of individuality.\n4. When starting over after failure, remember: Al-Bari' can make you entirely distinct from who you were.",
                'dhikr_reflection'        => 'Look at the unique prints on your fingers. No one in 8 billion people has exactly these. Recite "Ya Bari\'" 50 times while reflecting: the same God who gave you a unique fingerprint has a unique plan for your life. Ask Al-Bari\' to distinguish a clear path for you from the confusion you face.',
            ],

            // ─────────────────────────────────────────────────
            // #13 — Al-Musawwir | الْمُصَوِّرُ | The Shaper of Beauty
            // ─────────────────────────────────────────────────
            'al-musawwir' => [
                'quran_reference'         => 'Surah Al-Imran (3:6)',
                'quran_verse_arabic'      => 'هُوَ الَّذِي يُصَوِّرُكُمْ فِي الْأَرْحَامِ كَيْفَ يَشَاءُ',
                'quran_verse_translation' => 'It is He who forms you in the wombs however He wills.',
                'explanation'             => 'Al-Musawwir is the Divine Artist — the one who gives every created thing its specific form (sura), appearance, and visual identity. From the womb, He sculpts each human\'s face, frame, and features with absolute precision. The diversity of human faces — that no two people look identical despite shared anatomy — is the signature of Al-Musawwir. This is why changing Allah\'s creation (disfigurement, tattooing the body) is warned against — it opposes the artistry of Al-Musawwir.',
                'virtues'                 => 'Reciting "Ya Musawwir" is specifically narrated for couples seeking children. Scholars mention writing it and placing it in a setting of purity while making du\'a. More broadly, it cultivates gratitude for one\'s own appearance — Al-Musawwir chose how you look, and His choice is perfect.',
                'practical_lessons'       => "1. Be at peace with your physical form — Al-Musawwir shaped it personally.\n2. Never mock anyone's appearance — you are mocking the work of Al-Musawwir.\n3. See beauty in diverse human forms — variety of faces is the art of Al-Musawwir.\n4. Seek inner beauty (akhlaq) as eagerly as outer — Al-Musawwir cares most about the form of the heart.",
                'dhikr_reflection'        => 'Look at your own face in a mirror. Recite "Ya Musawwir" 21 times. Instead of critiquing what you see, say: "This is the form Al-Musawwir chose for me." Spend these moments in genuine acceptance — not forced, but real. Then look at a photo of someone very different from you and feel appreciation for Al-Musawwir\'s infinite artistry.',
            ],

            // ─────────────────────────────────────────────────
            // #14 — Al-Ghaffar | الْغَفَّارُ | The Forgiving
            // ─────────────────────────────────────────────────
            'al-ghaffar' => [
                'quran_reference'         => 'Surah Nuh (71:10)',
                'quran_verse_arabic'      => 'فَقُلْتُ اسْتَغْفِرُوا رَبَّكُمْ إِنَّهُ كَانَ غَفَّارًا',
                'quran_verse_translation' => 'And said: Ask forgiveness of your Lord. Indeed, He is ever Al-Ghaffar (the Perpetual Forgiver).',
                'explanation'             => 'Al-Ghaffar is the Perpetual, Repeated Forgiver — the one who forgives sins again and again without limit. The Arabic intensive form "Ghaffar" (not just Ghafir) indicates constant, ongoing forgiveness. The root "ghafara" means to cover — Allah covers your sins and does not expose them. Al-Ghaffar conceals the sins of His servants not just in this world but on the Day of Judgment. No matter how many times a person sins and repents, Al-Ghaffar forgives — provided the repentance is sincere.',
                'virtues'                 => 'Prophet Nuh (AS) used this name to call his people to istighfar — promising them rain and prosperity in return. The Prophet ﷺ said: "By Allah, I seek forgiveness from Allah and repent to Him more than 70 times a day." Reciting "Astaghfirullah Al-Azim alladhi la ilaha illa huwa al-Hayyal Qayyum wa atubu ilayh" 100 times after Jumu\'ah is among the most beloved acts to Al-Ghaffar.',
                'practical_lessons'       => "1. Never despair — no sin is greater than Al-Ghaffar's capacity to forgive.\n2. Make istighfar a constant habit, not just for specific sins but as a state of being.\n3. Forgive people around you — the more you channel Al-Ghaffar's quality, the more you receive it.\n4. The Prophet ﷺ made istighfar 70+ times daily — if he did this, how much more do we need it?",
                'dhikr_reflection'        => 'Write down (privately, just for yourself) one sin that weighs on you — something you have been carrying for years. Then read Surah Az-Zumar, verse 53 (Allah forgives all sins). Now say "Astaghfirullah" 100 times, slowly, meaning every word. At the end, destroy the paper. Trust that Al-Ghaffar has covered this sin if you repented sincerely.',
            ],

            // ─────────────────────────────────────────────────
            // #15 — Al-Qahhar | الْقَهَّارُ | The Subduer
            // ─────────────────────────────────────────────────
            'al-qahhar' => [
                'quran_reference'         => 'Surah Yusuf (12:39)',
                'quran_verse_arabic'      => 'أَأَرْبَابٌ مُّتَفَرِّقُونَ خَيْرٌ أَمِ اللَّهُ الْوَاحِدُ الْقَهَّارُ',
                'quran_verse_translation' => 'Are separate lords better or Allah, the One, Al-Qahhar (the Prevailing)?',
                'explanation'             => 'Al-Qahhar means the All-Subduing — the One who completely dominates and overpowers all things. Nothing in creation resists Allah\'s qahr (overpowering). Prophet Yusuf (AS) used this name while in prison to argue for tawheed: why worship multiple powerless gods when Al-Qahhar, the single All-Subduing God, exists? Al-Qahhar subjugates desires, tyrants, enemies, and worldly distractions — all bow before His qahr.',
                'virtues'                 => 'Reciting "Ya Qahhar" 100 times helps overcome worldly attachments — the love of dunya that distracts from the akhirah. It is the name called upon to subdue harmful desires and break the grip of addiction. Allah\'s qahr will defeat every force that opposes truth — this is the comfort of those who are oppressed.',
                'practical_lessons'       => "1. When facing injustice, remember: Al-Qahhar will ultimately subdue every oppressor.\n2. Use this name to battle nafs (ego) — ask Al-Qahhar to overpower your harmful desires.\n3. Nothing that opposes Allah can ultimately prevail — Al-Qahhar subdues all opposition.\n4. Find strength in this name when the enemies of truth seem to be winning — they cannot overcome Al-Qahhar.",
                'dhikr_reflection'        => 'Identify one desire or habit that is subduing YOU — that overpowers your willpower. Now recite "Ya Qahhar" 100 times with this intention: "O Qahhar, subdue this desire in me. What I cannot overpower, You can." Feel the reversal — instead of the habit overpowering you, Al-Qahhar overpowering the habit.',
            ],

            // ─────────────────────────────────────────────────
            // #16 — Al-Wahhab | الْوَهَّابُ | The Giver of All
            // ─────────────────────────────────────────────────
            'al-wahhab' => [
                'quran_reference'         => 'Surah Al-Imran (3:8)',
                'quran_verse_arabic'      => 'رَبَّنَا لَا تُزِغْ قُلُوبَنَا بَعْدَ إِذْ هَدَيْتَنَا وَهَبْ لَنَا مِن لَّدُنكَ رَحْمَةً ۚ إِنَّكَ أَنتَ الْوَهَّابُ',
                'quran_verse_translation' => 'Our Lord, let not our hearts deviate after You have guided us, and grant us from Yourself mercy. Indeed, You are Al-Wahhab (the Bestower).',
                'explanation'             => 'Al-Wahhab is the unrestricted Giver — the One who gives freely, without condition, without expectation of return, and without ever depleting. "Hiba" in Arabic means a pure gift with no strings attached. Allah gives His servants gifts they did not earn: the gift of iman, the gift of life, the gift of health, the gift of time. Al-Wahhab gives not because of what you did, but because of His own generosity.',
                'virtues'                 => 'The du\'a of the people of understanding (Quran 3:8) uses this name: "Wahb lana min ladunka rahmah — bestow upon us from Yourself mercy." Reciting this 40 times after obligatory prayers is reported to open doors of provision from unexpected directions.',
                'practical_lessons'       => "1. Ask Al-Wahhab for gifts beyond what you \"deserve\" — He gives from His own generosity, not based on your merit.\n2. Give generously without expectation of return — mirror Al-Wahhab's quality of pure giving.\n3. Thank Allah for gifts you did not earn: your eyesight, your mind, your iman.\n4. When du'a seems unanswered, remember: Al-Wahhab may be preparing a greater gift than you asked for.",
                'dhikr_reflection'        => 'Make a list of 10 things in your life you received without earning — your existence, your senses, someone\'s love, an opportunity that came from nowhere. For each one, say "Shukran Ya Wahhab." Then make a specific du\'a for one thing you desperately need, asking Al-Wahhab as a gift from His generosity, not as something you deserve.',
            ],

            // ─────────────────────────────────────────────────
            // #17 — Ar-Razzaq | الرَّزَّاقُ | The Sustainer
            // ─────────────────────────────────────────────────
            'ar-razzaq' => [
                'quran_reference'         => 'Surah Adh-Dhariyat (51:58)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ هُوَ الرَّزَّاقُ ذُو الْقُوَّةِ الْمَتِينُ',
                'quran_verse_translation' => 'Indeed, it is Allah who is the Continual Provider (Ar-Razzaq), the firm possessor of strength.',
                'explanation'             => 'Ar-Razzaq is the Supreme Provider of all rizq (sustenance) — not just food, but every form of provision: health, knowledge, relationships, spiritual nourishment, opportunities. The Quran states explicitly: "There is no creature on earth but that upon Allah is its provision" (11:6). Ar-Razzaq provides for the ant inside the rock, the fish at the bottom of the ocean, the bird before dawn — all without being asked.',
                'virtues'                 => 'The Prophet ﷺ recommended reciting "Bismillah" before eating and working — acknowledging Ar-Razzaq as the true source. Reciting "Ya Razzaq" abundantly before starting any business, job application, or significant undertaking connects the effort to its true source of provision.',
                'practical_lessons'       => "1. Never fear poverty when you know Ar-Razzaq — your rizq is guaranteed, even if the path is unclear.\n2. Work hard as a means, but rely entirely on Ar-Razzaq as the source.\n3. Share what you have — giving from your rizq does not diminish it; Ar-Razzaq replenishes what is given for His sake.\n4. If your means of income ends, trust that Ar-Razzaq will open another — He has never let a soul die without its allotted rizq.",
                'dhikr_reflection'        => 'List your three biggest financial anxieties. For each one, recite "Ya Razzaq" 33 times. After each set, say: "This rizq belongs to You, Ya Razzaq — I place it in Your hands." Then commit to one halal action (sadaqah, honest work, cutting haram income) as a practical trust in Ar-Razzaq\'s provision.',
            ],

            // ─────────────────────────────────────────────────
            // #18 — Al-Fattah | الْفَتَّاحُ | The Opener
            // ─────────────────────────────────────────────────
            'al-fattah' => [
                'quran_reference'         => 'Surah Saba\' (34:26)',
                'quran_verse_arabic'      => 'قُلْ يَجْمَعُ بَيْنَنَا رَبُّنَا ثُمَّ يَفْتَحُ بَيْنَنَا بِالْحَقِّ وَهُوَ الْفَتَّاحُ الْعَلِيمُ',
                'quran_verse_translation' => 'Say: Our Lord will bring us together; then He will judge between us in truth. And He is Al-Fattah (the Opener), the Knowing.',
                'explanation'             => 'Al-Fattah is the Opener of all closed doors — in matters of provision, knowledge, victory, guidance, and mercy. The "fath" (opening, victory) of Makkah is named after this concept. Al-Fattah opens the heart to faith, opens the mind to knowledge, opens closed doors of opportunity, opens the chest with tranquility. Surah Al-Fath (The Opening/Victory) captures this name\'s essence — no door remains permanently shut before Al-Fattah.',
                'virtues'                 => 'Reciting "Ya Fattah" after Fajr with hands placed on the chest is narrated to open the heart to success in all matters. The Quran opens with Surah Al-Fatiha — derived from the same root — reminding us that all good things begin with Al-Fattah\'s opening.',
                'practical_lessons'       => "1. Before any important meeting, exam, or interview — say \"Ya Fattah\" and trust the doors will open as decreed.\n2. A closed door is not a permanent barrier — it is Al-Fattah's invitation to knock differently.\n3. When you feel spiritually blocked, recite Surah Al-Fatiha with contemplation — it is the divine opening.\n4. Du'a itself is \"fath\" — the opening of the channel between servant and Lord.",
                'dhikr_reflection'        => 'Think of one door in your life that seems permanently shut — a career opportunity, a relationship repair, a health goal. Place your right hand on your chest and recite "Ya Fattah" 70 times. After the dhikr, make a specific du\'a: "Ya Fattah, if this is good for me in deen and dunya, open this door — and if it is not, open what is better." Then release the outcome with trust.',
            ],

            // ─────────────────────────────────────────────────
            // #19 — Al-'Alim | اَلْعَلِيْمُ | The Knower of All
            // ─────────────────────────────────────────────────
            'al-alim' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:29)',
                'quran_verse_arabic'      => 'وَهُوَ بِكُلِّ شَيْءٍ عَلِيمٌ',
                'quran_verse_translation' => 'And He is Knowing of all things.',
                'explanation'             => 'Al-\'Alim is the All-Knowing — with knowledge that is infinite, eternal, and encompasses every particle of existence. He knows the seen and unseen, the past and the future, what is whispered in secrets and what is hidden in hearts. "Not a leaf falls but He knows it, and no grain in the darkness of the earth, and no moist or dry thing but that it is written in a clear record." (6:59). Al-\'Alim\'s knowledge requires no learning, no updating, and no forgetting.',
                'virtues'                 => 'Reciting "Ya Alim" increases one\'s own knowledge and grants understanding. Students, scholars, and seekers of knowledge are advised to recite this name frequently. The Prophet ﷺ taught the du\'a: "Allahumma infa\'ni bima allamtani wa \'allimni ma yanfa\'uni — O Allah, benefit me with what You have taught me and teach me what benefits me."',
                'practical_lessons'       => "1. Nothing you do is hidden from Al-'Alim — your secret good deeds are recorded, and so are your private sins.\n2. Take comfort: Al-'Alim knows your pain even when no one else does.\n3. Seek knowledge as an act of worship — the more you learn about creation, the more you know Al-'Alim.\n4. Before any significant decision, make istikhara — ask Al-'Alim who knows your future to guide your unknowing present.",
                'dhikr_reflection'        => 'Sit quietly and realize: right now, Al-\'Alim knows every thought passing through your mind. Every worry, every secret hope, every hidden grief. Recite "Ya Alim" 50 times slowly. Let this reality — that you are completely known — feel like comfort, not fear. You are completely seen by One who completely loves.',
            ],

            // ─────────────────────────────────────────────────
            // #20 — Al-Qabid | الْقَابِضُ | The Constrictor
            // ─────────────────────────────────────────────────
            'al-qabid' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:245)',
                'quran_verse_arabic'      => 'وَاللَّهُ يَقْبِضُ وَيَبْسُطُ وَإِلَيْهِ تُرْجَعُونَ',
                'quran_verse_translation' => 'And Allah constricts and extends, and to Him you will be returned.',
                'explanation'             => 'Al-Qabid is the Withholder — the One who constricts and holds back provision, life, and expansion according to His wisdom. Importantly, Al-Qabid is always paired with Al-Basit (the Expander) in the Quran — showing that Allah alone controls the ebb and flow of all things. Times of "qabd" (constriction) in life — financial tightness, emotional hardship, reduced capacity — are from Al-Qabid\'s wisdom, not from abandonment.',
                'virtues'                 => 'Understanding Al-Qabid prevents panic in times of scarcity. The believing heart recognizes that both expansion and constriction come from the same Divine source, and neither is permanent. This name teaches contentment (qana\'ah) — accepting what Al-Qabid has held back as His wise measure.',
                'practical_lessons'       => "1. In times of financial or emotional tightness — remember: Al-Qabid is constricting for a purpose.\n2. Constriction often precedes expansion — the tighter the bow is drawn, the farther the arrow flies.\n3. Avoid hoarding — what Allah constricts for you is not yours to grasp tightly.\n4. Be patient in hardship; Al-Qabid and Al-Basit work together in your life's rhythm.",
                'dhikr_reflection'        => 'Reflect on one area of your life that feels constrained right now — money, opportunities, relationships. Recite "Ya Qabid, Ya Basit" alternately, 33 times each. Let the pairing remind you: the same hand that constricts will expand. Ask Al-Qabid to make this constriction a preparation for the expansion you need.',
            ],

            // ─────────────────────────────────────────────────
            // #21 — Al-Basit | الْبَاسِطُ | The Reliever
            // ─────────────────────────────────────────────────
            'al-basit' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:245)',
                'quran_verse_arabic'      => 'وَاللَّهُ يَقْبِضُ وَيَبْسُطُ وَإِلَيْهِ تُرْجَعُونَ',
                'quran_verse_translation' => 'And Allah constricts and extends, and to Him you will be returned.',
                'explanation'             => 'Al-Basit is the Expander — the One who opens up, extends, and grants abundance in provision, breath, heart, and life. When Allah "extends" (basata) His hand, it means He spreads generosity. The same root gives us "bast" — a table spread with food — a fitting image of Al-Basit\'s expansive generosity. After every period of Qabid (constriction), Al-Basit opens what was closed and relieves what was pressed.',
                'virtues'                 => 'Reciting "Ya Basit" before meals expands rizq and brings barakah. It is the name of gratitude and abundance. The Prophet ﷺ said Allah spreads out His hand at night to accept repentance from those who sinned by day, and spreads His hand by day for those who sinned by night — this is Al-Basit\'s constant open invitation.',
                'practical_lessons'       => "1. When abundance arrives, recognize it is from Al-Basit — be generous, not greedy.\n2. Allah stretches provisions for those who give sadaqah — trust the paradox of giving to receive.\n3. Expand your du'a, your gratitude, your generosity — Al-Basit rewards expansion with expansion.\n4. The relief after hardship is Al-Basit at work — \"Indeed, with hardship will be ease.\" (94:5)",
                'dhikr_reflection'        => 'Recite "Ya Basit" 10 times before your next meal. As you eat, think of Al-Basit who grew the food, provided the rain, created your appetite and ability to eat. After eating, give even a small amount of sadaqah today — physically enact the "bast" (spreading) of what Al-Basit gave you.',
            ],

            // #22–#99: The remaining names follow the exact same pattern.
            // AI TASK: Generate all remaining names (#22 through #99) using the same structure:
            // 'slug' => [
            //     'quran_reference'         => 'Surah Name (X:Y)',   — UNIQUE reference per name
            //     'quran_verse_arabic'      => 'Arabic verse text',   — UNIQUE verse per name
            //     'quran_verse_translation' => 'English translation', — UNIQUE translation per name
            //     'explanation'             => '2-3 paragraph explanation of this specific name',
            //     'virtues'                 => 'Specific hadith/scholarly virtue of THIS name',
            //     'practical_lessons'       => "4 numbered unique lessons for THIS name",
            //     'dhikr_reflection'        => 'A specific, unique reflection practice for THIS name',
            // ],

            // REMAINING NAMES TO COMPLETE (slugs):
            // al-khafid, ar-rafi, al-muizz, al-mudhill, as-sami, al-basir, al-hakam,
            // al-adl, al-latif, al-khabir, al-halim, al-azim, al-ghafur, ash-shakur,
            // al-ali, al-kabir, al-hafiz, al-muqit, al-hasib, al-jalil, al-karim,
            // ar-raqib, al-mujib, al-wasi, al-hakim, al-wadud, al-majeed, al-baith,
            // ash-shahid, al-haqq, al-wakil, al-qawi, al-matin, al-wali, al-hamid,
            // al-muhsi, al-mubdi, al-muid, al-muhyi, al-mumit, al-hayy, al-qayyum,
            // al-wajid, al-maajid, al-wahid, al-ahad, as-samad, al-qadir, al-muqtadir,
            // al-muqaddim, al-muakhkhir, al-awwal, al-akhir, az-zahir, al-batin,
            // al-waali, al-mutaali, al-barr, at-tawwab, al-muntaqim, al-afuww,
            // ar-rauf, malik-al-mulk, dhu-al-jalal-wa-al-ikram, al-muqsit, al-jami,
            // al-ghani, al-mughni, al-mani, ad-darr, an-nafi, an-nur, al-hadi,
            // al-badi, al-baqi, al-warith, ar-rashid, as-sabur

        ];
    }
}
```

Register the seeder in `DatabaseSeeder.php`:
```php
$this->call(AllahNamesUniqueContentSeeder::class);
```

Run with:
```bash
php artisan db:seed --class=AllahNamesUniqueContentSeeder
```

---

### PART 3 → Update the Blade Template

Find the blade file for the 99-names-of-allah detail page. It is likely at:
```
resources/views/allah-names/show.blade.php
```
or
```
resources/views/pages/allah-names/show.blade.php
```
or inside a component. Check the route in `routes/web.php` for `99-names-of-allah/{slug}`.

Replace ALL hardcoded sections with dynamic database fields:

#### BEFORE (Hardcoded — same on every page ❌):
```blade
{{-- ❌ WRONG: Same Quranic reference on every page --}}
<section class="quranic-reference">
    <h2>Quranic Reference</h2>
    <p>Surah Al-Hashr (59:24)</p>
    <p class="arabic">هُوَ اللَّهُ الْخَالِقُ الْبَارِئُ الْمُصَوِّرُ</p>
    <p>"He is Allah, the Creator, the Originator, the Fashioner."</p>
</section>

{{-- ❌ WRONG: Same practical lessons on every page --}}
<section class="practical-lessons">
    <h2>Practical Lessons</h2>
    <p>Recite this name regularly to gain its blessings...</p>
</section>

{{-- ❌ WRONG: Same dhikr intro on every page --}}
<section class="dhikr-reflection">
    <h2>Dhikr & Reflection</h2>
    <p>Regular dhikr of Allah's names brings peace and blessings...</p>
</section>

{{-- ❌ WRONG: Same explanation/virtues on every page --}}
<section class="explanation">
    <h2>Explanation & Virtues</h2>
    <p>This is one of the beautiful names of Allah...</p>
</section>
```

#### AFTER (Dynamic — unique per name ✅):
```blade
{{-- ✅ CORRECT: Unique Quranic reference from database --}}
@if($name->quran_reference)
<section class="quranic-reference">
    <h2>Quranic Reference</h2>
    <p class="reference-location">{{ $name->quran_reference }}</p>
    @if($name->quran_verse_arabic)
        <p class="arabic-verse" dir="rtl" lang="ar">{{ $name->quran_verse_arabic }}</p>
    @endif
    @if($name->quran_verse_translation)
        <p class="verse-translation">{{ $name->quran_verse_translation }}</p>
    @endif
</section>
@endif

{{-- ✅ CORRECT: Unique explanation from database --}}
@if($name->explanation)
<section class="explanation">
    <h2>Meaning & Explanation of {{ $name->transliteration }}</h2>
    <div class="explanation-content">
        {!! nl2br(e($name->explanation)) !!}
    </div>
</section>
@endif

{{-- ✅ CORRECT: Unique virtues from database --}}
@if($name->virtues)
<section class="virtues">
    <h2>Virtues & Spiritual Benefits</h2>
    <div class="virtues-content">
        {!! nl2br(e($name->virtues)) !!}
    </div>
</section>
@endif

{{-- ✅ CORRECT: Unique practical lessons from database --}}
@if($name->practical_lessons)
<section class="practical-lessons">
    <h2>Practical Lessons from {{ $name->transliteration }}</h2>
    <div class="lessons-content">
        {!! nl2br(e($name->practical_lessons)) !!}
    </div>
</section>
@endif

{{-- ✅ CORRECT: Unique dhikr & reflection from database --}}
@if($name->dhikr_reflection)
<section class="dhikr-reflection">
    <h2>Dhikr & Reflection</h2>
    <div class="dhikr-content">
        {!! nl2br(e($name->dhikr_reflection)) !!}
    </div>
</section>
@endif
```

---

### PART 4 → Verify the Controller Passes the Model

In the AllahName controller (likely `app/Http/Controllers/AllahNameController.php`), ensure `show()` passes the full model:

```php
public function show(string $slug): View
{
    $name = AllahName::where('slug', $slug)->firstOrFail();
    
    return view('allah-names.show', compact('name'));
}
```

---

## 📊 DATABASE TABLE REFERENCE

**Current `allah_names` table columns:**
```
id | number | arabic | transliteration | meaning_english | meaning_urdu |
benefits | quran_reference | dhikr_count | dua_text | audio_url | slug |
created_at | updated_at
```

**New columns to add (via migration):**
```
quran_verse_arabic | quran_verse_translation | explanation |
virtues | practical_lessons | dhikr_reflection
```

---

## 📋 ALL 99 NAMES — Reference List for Content Generation

Use this table to ensure ALL 99 names get unique content:

```
#1  | Ar-Rahman     (الرَّحْمَنُ)    | The All-Compassionate         | slug: ar-rahman
#2  | Ar-Rahim      (الرَّحِيمُ)     | The All-Merciful              | slug: ar-rahim
#3  | Al-Malik      (الْمَلِكُ)      | The Absolute Ruler            | slug: al-malik
#4  | Al-Quddus     (الْقُدُّوسُ)    | The Pure One                  | slug: al-quddus
#5  | As-Salam      (السَّلَامُ)     | The Source of Peace           | slug: as-salam
#6  | Al-Mu'min     (الْمُؤْمِنُ)    | The Inspirer of Faith         | slug: al-mumin
#7  | Al-Muhaymin   (الْمُهَيْمِنُ)  | The Guardian                  | slug: al-muhaymin
#8  | Al-Aziz       (الْعَزِيزُ)     | The Victorious                | slug: al-aziz
#9  | Al-Jabbar     (الْجَبَّارُ)    | The Compeller                 | slug: al-jabbar
#10 | Al-Mutakabbir (الْمُتَكَبِّرُ) | The Greatest                  | slug: al-mutakabbir
#11 | Al-Khaliq     (الْخَالِقُ)     | The Creator                   | slug: al-khaliq
#12 | Al-Bari'      (الْبَارِئُ)     | The Maker of Order            | slug: al-bari
#13 | Al-Musawwir   (الْمُصَوِّرُ)   | The Shaper of Beauty          | slug: al-musawwir
#14 | Al-Ghaffar    (الْغَفَّارُ)    | The Forgiving                 | slug: al-ghaffar
#15 | Al-Qahhar     (الْقَهَّارُ)    | The Subduer                   | slug: al-qahhar
#16 | Al-Wahhab     (الْوَهَّابُ)    | The Giver of All              | slug: al-wahhab
#17 | Ar-Razzaq     (الرَّزَّاقُ)    | The Sustainer                 | slug: ar-razzaq
#18 | Al-Fattah     (الْفَتَّاحُ)    | The Opener                    | slug: al-fattah
#19 | Al-'Alim      (اَلْعَلِيْمُ)   | The Knower of All             | slug: al-alim
#20 | Al-Qabid      (الْقَابِضُ)     | The Constrictor               | slug: al-qabid
#21 | Al-Basit      (الْبَاسِطُ)     | The Reliever                  | slug: al-basit
#22 | Al-Khafid     (الْخَافِضُ)     | The Abaser                    | slug: al-khafid
#23 | Ar-Rafi       (الرَّافِعُ)     | The Exalter                   | slug: ar-rafi
#24 | Al-Mu'izz     (الْمُعِزُّ)     | The Bestower of Honors        | slug: al-muizz
#25 | Al-Mudhill    (المُذِلُّ)      | The Humiliator                | slug: al-mudhill
#26 | As-Sami       (السَّمِيعُ)     | The Hearer of All             | slug: as-sami
#27 | Al-Basir      (الْبَصِيرُ)     | The Seer of All               | slug: al-basir
#28 | Al-Hakam      (الْحَكَمُ)      | The Judge                     | slug: al-hakam
#29 | Al-'Adl       (الْعَدْلُ)      | The Just                      | slug: al-adl
#30 | Al-Latif      (اللَّطِيفُ)     | The Subtle One                | slug: al-latif
#31 | Al-Khabir     (الْخَبِيرُ)     | The All-Aware                 | slug: al-khabir
#32 | Al-Halim      (الْحَلِيمُ)     | The Forbearing                | slug: al-halim
#33 | Al-'Azim      (الْعَظِيمُ)     | The Magnificent               | slug: al-azim
#34 | Al-Ghafur     (الْغَفُورُ)     | The Forgiver and Hider        | slug: al-ghafur
#35 | Ash-Shakur    (الشَّكُورُ)     | The Rewarder of Thankfulness  | slug: ash-shakur
#36 | Al-'Ali       (الْعَلِيُّ)     | The Highest                   | slug: al-ali
#37 | Al-Kabir      (الْكَبِيرُ)     | The Greatest                  | slug: al-kabir
#38 | Al-Hafiz      (الْحَفِيظُ)     | The Preserver                 | slug: al-hafiz
#39 | Al-Muqit      (المُقيِت)       | The Nourisher                 | slug: al-muqit
#40 | Al-Hasib      (الْحَسِيبُ)     | The Accounter                 | slug: al-hasib
#41 | Al-Jalil      (الْجَلِيلُ)     | The Mighty                    | slug: al-jalil
#42 | Al-Karim      (الْكَرِيمُ)     | The Generous                  | slug: al-karim
#43 | Ar-Raqib      (الرَّقِيبُ)     | The Watchful One              | slug: ar-raqib
#44 | Al-Mujib      (الْمُجِيبُ)     | The Responder to Prayer       | slug: al-mujib
#45 | Al-Wasi       (الْوَاسِعُ)     | The All-Comprehending         | slug: al-wasi
#46 | Al-Hakim      (الْحَكِيمُ)     | The Perfectly Wise            | slug: al-hakim
#47 | Al-Wadud      (الْوَدُودُ)     | The Loving One                | slug: al-wadud
#48 | Al-Majeed     (الْمَجِيدُ)     | The Majestic One              | slug: al-majeed
#49 | Al-Ba'ith     (الْبَاعِثُ)     | The Resurrector               | slug: al-baith
#50 | Ash-Shahid    (الشَّهِيدُ)     | The Witness                   | slug: ash-shahid
#51 | Al-Haqq       (الْحَقُّ)       | The Truth                     | slug: al-haqq
#52 | Al-Wakil      (الْوَكِيلُ)     | The Trustee                   | slug: al-wakil
#53 | Al-Qawi       (الْقَوِيُّ)     | The Possessor of All Strength | slug: al-qawi
#54 | Al-Matin      (الْمَتِينُ)     | The Forceful One              | slug: al-matin
#55 | Al-Wali       (الْوَلِيُّ)     | The Governor                  | slug: al-wali
#56 | Al-Hamid      (الْحَمِيدُ)     | The Praised One               | slug: al-hamid
#57 | Al-Muhsi      (الْمُحْصِي)     | The Appraiser                 | slug: al-muhsi
#58 | Al-Mubdi      (الْمُبْدِئُ)    | The Originator                | slug: al-mubdi
#59 | Al-Mu'id      (الْمُعِيدُ)     | The Restorer                  | slug: al-muid
#60 | Al-Muhyi      (الْمُحْيِي)     | The Giver of Life             | slug: al-muhyi
#61 | Al-Mumit      (اَلْمُمِيتُ)    | The Taker of Life             | slug: al-mumit
#62 | Al-Hayy       (الْحَيُّ)       | The Ever Living One           | slug: al-hayy
#63 | Al-Qayyum     (الْقَيُّومُ)    | The Self-Existing One         | slug: al-qayyum
#64 | Al-Wajid      (الْوَاجِدُ)     | The Finder                    | slug: al-wajid
#65 | Al-Maajid     (الْمَاجِدُ)     | The Glorious                  | slug: al-maajid
#66 | Al-Wahid      (الْواحِدُ)      | The Only One                  | slug: al-wahid
#67 | Al-Ahad       (اَلاَحَدُ)      | The One                       | slug: al-ahad
#68 | As-Samad      (الصَّمَدُ)      | The Satisfier of All Needs    | slug: as-samad
#69 | Al-Qadir      (الْقَادِرُ)     | The All Powerful              | slug: al-qadir
#70 | Al-Muqtadir   (الْمُقْتَدِرُ)  | The Creator of All Power      | slug: al-muqtadir
#71 | Al-Muqaddim   (الْمُقَدِّمُ)   | The Expediter                 | slug: al-muqaddim
#72 | Al-Mu'akhkhir (الْمُؤَخِّرُ)   | The Delayer                   | slug: al-muakhkhir
#73 | Al-Awwal      (الأوَّلُ)       | The First                     | slug: al-awwal
#74 | Al-Akhir      (الآخِرُ)        | The Last                      | slug: al-akhir
#75 | Az-Zahir      (الظَّاهِرُ)     | The Manifest One              | slug: az-zahir
#76 | Al-Batin      (الْبَاطِنُ)     | The Hidden One                | slug: al-batin
#77 | Al-Waali      (الْوَالِي)      | The Protecting Friend         | slug: al-waali
#78 | Al-Muta'ali   (الْمُتَعَالِي)  | The Supreme One               | slug: al-mutaali
#79 | Al-Barr       (الْبَرُّ)       | The Doer of Good              | slug: al-barr
#80 | At-Tawwab     (التَّوَابُ)     | The Guide to Repentance       | slug: at-tawwab
#81 | Al-Muntaqim   (الْمُنْتَقِمُ)  | The Avenger                   | slug: al-muntaqim
#82 | Al-'Afuww     (العَفُوُّ)       | The Forgiver                  | slug: al-afuww
#83 | Ar-Ra'uf      (الرَّؤُوفُ)     | The Clement                   | slug: ar-rauf
#84 | Malik-al-Mulk (مَالِكُ ٱلْمُلْكُ) | The Owner of All           | slug: malik-al-mulk
#85 | Dhu-al-Jalal  (ذُو ٱلْجَلَٰلِ وَٱلْإِكْرَامُ) | Lord of Majesty | slug: dhu-al-jalal-wa-al-ikram
#86 | Al-Muqsit     (الْمُقْسِطُ)    | The Equitable One             | slug: al-muqsit
#87 | Al-Jami       (الْجَامِعُ)     | The Gatherer                  | slug: al-jami
#88 | Al-Ghani      (الْغَنِيُّ)     | The Rich One                  | slug: al-ghani
#89 | Al-Mughni     (الْمُغْنِي)     | The Enricher                  | slug: al-mughni
#90 | Al-Mani'      (اَلْمَانِعُ)    | The Preventer of Harm         | slug: al-mani
#91 | Ad-Darr       (الضَّارَّ)      | The Creator of The Harmful    | slug: ad-darr
#92 | An-Nafi       (النَّافِعُ)     | The Creator of Good           | slug: an-nafi
#93 | An-Nur        (النُّورُ)       | The Light                     | slug: an-nur
#94 | Al-Hadi       (الْهَادِي)      | The Guide                     | slug: al-hadi
#95 | Al-Badi       (الْبَدِيعُ)     | The Originator                | slug: al-badi
#96 | Al-Baqi       (اَلْبَاقِي)     | The Everlasting One           | slug: al-baqi
#97 | Al-Warith     (الْوَارِثُ)     | The Inheritor of All          | slug: al-warith
#98 | Ar-Rashid     (الرَّشِيدُ)     | The Righteous Teacher         | slug: ar-rashid
#99 | As-Sabur      (الصَّبُورُ)     | The Patient One               | slug: as-sabur
```

---

## 🎯 AI TASK SUMMARY

You are working on the Laravel project at: https://github.com/noormuhammad2k20-a11y/islamicweb

**Complete these tasks in order:**

1. **Create the migration** — Add 6 new columns to `allah_names` table (listed in Part 1 above)
2. **Complete the seeder** — Names #1–#21 are already written above. Generate #22–#99 following the exact same structure. Each name MUST have:
   - A **different** Quran verse (authentic reference where this name or its root appears)
   - A **different** Arabic verse text
   - A **different** English translation
   - A **unique** 2–3 paragraph explanation specific to that name
   - **Unique** virtues/hadiths specific to that name
   - **4 unique** practical lessons specific to that name
   - A **unique** dhikr & reflection practice specific to that name
3. **Update the Blade template** — Replace ALL hardcoded sections with dynamic `$name->field` outputs (Part 3 above)
4. **Verify the controller** — Ensure the AlahName model is passed to the view (Part 4)
5. **Run:** `php artisan migrate && php artisan db:seed --class=AllahNamesUniqueContentSeeder`
6. **Test:** Visit `/99-names-of-allah/al-malik` and `/99-names-of-allah/al-quddus` and confirm they show DIFFERENT content in all 5 sections

---

*Generated for NoorIslam.com | Audit v2.6 | July 18, 2026*
