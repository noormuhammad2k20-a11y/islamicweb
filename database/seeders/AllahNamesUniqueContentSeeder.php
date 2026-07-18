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
            // ─────────────────────────────────────────────────
            // #22 — Al-Khafid | الْخَافِضُ | The Abaser
            // ─────────────────────────────────────────────────
            'al-khafid' => [
                'quran_reference'         => 'Surah Al-Waqi\'ah (56:3)',
                'quran_verse_arabic'      => 'خَافِضَةٌ رَّافِعَةٌ',
                'quran_verse_translation' => 'Bringing down [some] and elevating [others].',
                'explanation'             => 'Al-Khafid is the One who abases, humbles, and lowers. Allah lowers the arrogant, the oppressors, and the enemies of truth. He lowers whom He wills through His justice, removing their honor, rank, and worldly status. At the same time, this attribute works with Ar-Rafi (The Exalter) — Allah lowers the false to elevate the truth, and humbles the ego so the soul can rise.',
                'virtues'                 => 'Reflecting on Al-Khafid protects the heart from arrogance (kibr). Those who humble themselves before Allah are promised elevation, while those who act with pride invite the abasement of Al-Khafid. The Prophet ﷺ said: "No one humbles himself for the sake of Allah except that Allah elevates him." (Muslim)',
                'practical_lessons'       => "1. Never look down on anyone — Al-Khafid can lower you and raise them in an instant.\n2. When your ego swells, remind yourself of Al-Khafid to bring your nafs back to reality.\n3. Recognize that the humiliation of oppressors in this world or the next is the work of Al-Khafid.\n4. Bow deeply in ruku and sujood, physically lowering yourself to avoid being spiritually lowered.",
                'dhikr_reflection'        => 'In your next sujood, consciously think about one thing you take pride in (wealth, status, knowledge). Whisper "Ya Khafid" and ask Allah to lower your ego and attachment to it, so that your heart may be elevated in His sight.',
            ],

            // ─────────────────────────────────────────────────
            // #23 — Ar-Rafi | الرَّافِعُ | The Exalter
            // ─────────────────────────────────────────────────
            'ar-rafi' => [
                'quran_reference'         => 'Surah Al-Mujadila (58:11)',
                'quran_verse_arabic'      => 'يَرْفَعِ اللَّهُ الَّذِينَ آمَنُوا مِنكُمْ وَالَّذِينَ أُوتُوا الْعِلْمَ دَرَجَاتٍ',
                'quran_verse_translation' => 'Allah will raise those who have believed among you and those who were given knowledge, by degrees.',
                'explanation'             => 'Ar-Rafi is the One who exalts, elevates, and raises ranks. He elevates the believers, the scholars, and the righteous in status, both in this world and in the Hereafter. He raises the heavens without pillars and raises the rank of His Prophets. While people try to elevate themselves through wealth or social climbing, true and lasting elevation only comes from Ar-Rafi.',
                'virtues'                 => 'Reciting "Ya Rafi" regularly is said to increase a person in honor and spiritual rank. When sitting between the two prostrations in prayer, the Prophet ﷺ would say "Warfa\'ni" (and raise me) — directly calling upon this attribute of Allah.',
                'practical_lessons'       => "1. Seek elevation through knowledge and faith, as Allah explicitly promises to raise those who possess them.\n2. Do not compromise your religion to seek promotion at work or in society — true promotion is from Ar-Rafi.\n3. Help elevate others — lift people up when they are down.\n4. Ask Allah for the highest ranks of Jannah (Al-Firdaus).",
                'dhikr_reflection'        => 'Between your prostrations in prayer, when you say "Warfa\'ni" (and raise me), pause for a second. Think not of worldly promotion, but of being raised in the eyes of Allah. Recite "Ya Rafi" 10 times after prayer, asking Him to elevate your character.',
            ],

            // ─────────────────────────────────────────────────
            // #24 — Al-Mu'izz | الْمُعِزُّ | The Bestower of Honors
            // ─────────────────────────────────────────────────
            'al-muizz' => [
                'quran_reference'         => 'Surah Al-Imran (3:26)',
                'quran_verse_arabic'      => 'وَتُعِزُّ مَن تَشَاءُ وَتُذِلُّ مَن تَشَاءُ ۖ بِيَدِكَ الْخَيْرُ',
                'quran_verse_translation' => 'You honor whom You will, and You humble whom You will. In Your hand is [all] good.',
                'explanation'             => 'Al-Mu\'izz is the Giver of Honor, Dignity, and Power. True honor (izzah) belongs entirely to Allah, and He bestows it upon His prophets and believers. When Al-Mu\'izz grants honor, no one can humiliate that person. This honor is not the superficial respect gained through money or fear, but a deep, unshakeable dignity that commands respect from the hearts of creation.',
                'virtues'                 => 'Reciting "Ya Mu\'izz" 140 times after Isha prayer, especially on Monday or Friday nights, is mentioned by scholars to develop an awe-inspiring presence and protection from the fear of creation.',
                'practical_lessons'       => "1. Seek honor through obedience to Allah, not through conforming to societal trends.\n2. Treat others with dignity, reflecting the honoring nature of Al-Mu'izz.\n3. Stop seeking validation from people; human validation is temporary, Divine honor is eternal.\n4. Defend the honor of your fellow Muslims when they are spoken ill of.",
                'dhikr_reflection'        => 'Reflect on a time you compromised your values to fit in or gain someone\'s approval. Recite "Ya Mu\'izz" 40 times, affirming that only Allah can truly honor you. Resolve to seek honor solely through actions that please Him.',
            ],

            // ─────────────────────────────────────────────────
            // #25 — Al-Mudhill | المُذِلُّ | The Humiliator
            // ─────────────────────────────────────────────────
            'al-mudhill' => [
                'quran_reference'         => 'Surah Al-Imran (3:26)',
                'quran_verse_arabic'      => 'وَتُعِزُّ مَن تَشَاءُ وَتُذِلُّ مَن تَشَاءُ',
                'quran_verse_translation' => 'You honor whom You will, and You humble (abase) whom You will.',
                'explanation'             => 'Al-Mudhill is the One who brings low, degrades, and humbles. He strips away honor from the arrogant, the oppressors, and those who rebel against His laws. This humiliation (dhull) is the removal of His protection and support. Just as Al-Mu\'izz honors the righteous, Al-Mudhill brings down the tyrants of history, reducing their empires to dust and their names to cautionary tales.',
                'virtues'                 => 'Understanding Al-Mudhill creates a healthy fear of Allah\'s justice. It serves as a spiritual safeguard against tyranny and arrogance. Reciting "Ya Mudhill" 75 times is historically used as a du\'a for protection against harm from oppressors or jealous enemies.',
                'practical_lessons'       => "1. Fear the humiliation of the Hereafter more than the humiliation of this world.\n2. Do not oppress anyone, lest Al-Mudhill makes an example out of you.\n3. Recognize that sin inherently carries humiliation, even if it brings temporary pleasure.\n4. When wronged, trust that Al-Mudhill will ultimately deal with the oppressor.",
                'dhikr_reflection'        => 'Think of Pharoah, Abu Jahl, or modern tyrants. Their power seemed absolute, yet Al-Mudhill brought them to ruin. Recite "Ya Mudhill" 33 times when you feel overwhelmed by injustice in the world, finding peace in the certainty of His ultimate justice.',
            ],

            // ─────────────────────────────────────────────────
            // #26 — As-Sami | السَّمِيعُ | The Hearer of All
            // ─────────────────────────────────────────────────
            'as-sami' => [
                'quran_reference'         => 'Surah Ghafir (40:56)',
                'quran_verse_arabic'      => 'فَاسْتَعِذْ بِاللَّهِ ۖ إِنَّهُ هُوَ السَّمِيعُ الْبَصِيرُ',
                'quran_verse_translation' => 'So seek refuge in Allah. Indeed, it is He who is the Hearing, the Seeing.',
                'explanation'             => 'As-Sami is the All-Hearing. He hears every sound in the universe — from the loud thunder to the quiet footsteps of an ant. More profoundly, As-Sami hears the unspoken prayers of the heart, the silent tears, and the hidden fears. He hears every language, every whisper, and every cry for help simultaneously, without one voice distracting Him from another.',
                'virtues'                 => 'Reciting "Ya Sami" increases one\'s awareness of their speech. It guarantees the believer that their du\'a is never lost in the void. "Sami\' Allahu liman hamidah" (Allah hears the one who praises Him) is said in every prayer, a constant reminder of this beautiful attribute.',
                'practical_lessons'       => "1. Guard your tongue — As-Sami hears every word of backbiting or lying you utter.\n2. Speak to Allah in your own language, in your own way; He understands completely.\n3. When you feel unheard by the world, pour your heart out to As-Sami.\n4. Listen attentively to others, practicing a human reflection of this divine quality.",
                'dhikr_reflection'        => 'Go to a quiet place where you cannot be heard by anyone. Whisper your deepest worry. Then recite "Ya Sami, You hear me" 10 times. Feel the profound comfort that the Creator of the heavens just listened to your whisper with complete attention.',
            ],

            // ─────────────────────────────────────────────────
            // #27 — Al-Basir | الْبَصِيرُ | The Seer of All
            // ─────────────────────────────────────────────────
            'al-basir' => [
                'quran_reference'         => 'Surah Al-Hujurat (49:18)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ يَعْلَمُ غَيْبَ السَّمَاوَاتِ وَالْأَرْضِ ۚ وَاللَّهُ بَصِيرٌ بِمَا تَعْمَلُونَ',
                'quran_verse_translation' => 'Indeed, Allah knows the unseen [aspects] of the heavens and the earth. And Allah is Seeing of what you do.',
                'explanation'             => 'Al-Basir is the All-Seeing. He sees everything in the physical and spiritual realms. He sees the black ant on the black rock in the blackest night. He sees the intentions hidden in the depths of the heart. Nothing escapes His vision. His seeing is not limited by light, distance, or barriers. Al-Basir sees both your outward actions and the inward sincerity behind them.',
                'virtues'                 => 'Cultivating awareness of Al-Basir is the path to Ihsan (excellence) — to worship Allah as if you see Him, knowing that even if you do not see Him, He sees you. Reciting "Ya Basir" 100 times before Jumu\'ah prayer is said to grant spiritual insight and light to the eyes and heart.',
                'practical_lessons'       => "1. When alone and tempted to sin, say aloud: \"Al-Basir sees me.\"\n2. Do good deeds in secret, knowing that Al-Basir is the only audience you need.\n3. Do not judge others solely by their outward appearance; only Al-Basir sees the whole picture.\n4. Seek \"basirah\" (spiritual insight) to see the truth of matters, not just the surface.",
                'dhikr_reflection'        => 'Close your eyes. Imagine you are in a pitch-black room where no human can see you. Now realize that Al-Basir sees you as clearly as in the midday sun. Recite "Ya Basir" 33 times, asking Him to purify the actions you do when no one else is watching.',
            ],

            // ─────────────────────────────────────────────────
            // #28 — Al-Hakam | الْحَكَمُ | The Judge
            // ─────────────────────────────────────────────────
            'al-hakam' => [
                'quran_reference'         => 'Surah Al-An\'am (6:114)',
                'quran_verse_arabic'      => 'أَفَغَيْرَ اللَّهِ أَبْتَغِي حَكَمًا وَهُوَ الَّذِي أَنزَلَ إِلَيْكُمُ الْكِتَابَ مُفَصَّلًا',
                'quran_verse_translation' => '[Say], "Then is it other than Allah I should seek as judge while it is He who has revealed to you the Book explained in detail?"',
                'explanation'             => 'Al-Hakam is the Supreme Judge, the Ultimate Arbitrator. He is the one who delivers justice, establishes the rules, and settles all disputes. His judgment is flawless, free from bias, error, or influence. On the Day of Judgment, Al-Hakam will have the final word on every disagreement humanity ever had. His decrees in this world (Shariah) are the standard of ultimate justice.',
                'virtues'                 => 'Reciting "Ya Hakam" 99 times during the last third of the night is said to fill the heart with spiritual secrets and an understanding of divine decrees. It brings peace to those who have been wronged in worldly courts, knowing the Ultimate Judge has yet to rule.',
                'practical_lessons'       => "1. Accept Allah's laws and commands as the final, perfect judgment for human life.\n2. Do not despair if you are wronged and receive no justice here; Al-Hakam's court is waiting.\n3. Be fair when you are placed in a position to judge between people.\n4. Avoid judging others' intentions; leave the judgment of the heart to Al-Hakam.",
                'dhikr_reflection'        => 'Think of a situation where you were treated unfairly and couldn\'t defend yourself. Visualize handing the "case file" of that situation over to Al-Hakam. Recite "Ya Hakam" 33 times, actively releasing your need for worldly vindication and trusting His ultimate verdict.',
            ],

            // ─────────────────────────────────────────────────
            // #29 — Al-'Adl | الْعَدْلُ | The Just
            // ─────────────────────────────────────────────────
            'al-adl' => [
                'quran_reference'         => 'Surah Al-An\'am (6:115)',
                'quran_verse_arabic'      => 'وَتَمَّتْ كَلِمَتُ رَبِّكَ صِدْقًا وَعَدْلًا ۚ لَّا مُبَدِّلَ لِكَلِمَاتِهِ',
                'quran_verse_translation' => 'And the word of your Lord has been fulfilled in truth and in justice. None can alter His words.',
                'explanation'             => 'Al-\'Adl is the Embodiment of Absolute Justice. He is equitable and fair, never oppressing a soul even by the weight of an atom (4:40). Al-\'Adl puts everything in its proper place. His justice is perfect because it is combined with His infinite knowledge (Al-\'Alim) and mercy (Ar-Rahman). Every decree, every hardship, and every reward from Allah is fundamentally just, even if human limited understanding cannot immediately perceive it.',
                'virtues'                 => 'Writing or reciting "Ya \'Adl" on Friday nights is mentioned by scholars as a means to inspire obedience and fairness in others. Understanding this name removes anger at the Divine decree, as the believer knows Al-\'Adl never wrongs anyone.',
                'practical_lessons'       => "1. Practice justice in your own life — with your family, employees, and even your enemies.\n2. When you face hardship, never say \"this is unfair\"; trust the justice of Al-'Adl.\n3. Stand up for justice in society; the Quran commands believers to be \"maintainers of justice\" (4:135).\n4. Balance your time and rights justly between your Creator, yourself, and your family.",
                'dhikr_reflection'        => 'Identify one area where you might be acting unfairly (favoring one child, judging a colleague harshly, neglecting a duty). Recite "Ya \'Adl" 50 times, asking Allah to make you an instrument of His justice and to remove bias from your heart.',
            ],

            // ─────────────────────────────────────────────────
            // #30 — Al-Latif | اللَّطِيفُ | The Subtle One
            // ─────────────────────────────────────────────────
            'al-latif' => [
                'quran_reference'         => 'Surah Al-Mulk (67:14)',
                'quran_verse_arabic'      => 'أَلَا يَعْلَمُ مَنْ خَلَقَ وَهُوَ اللَّطِيفُ الْخَبِيرُ',
                'quran_verse_translation' => 'Does He who created not know, while He is the Subtle, the Acquainted?',
                'explanation'             => 'Al-Latif means the Subtle, the Gentle, the One who understands the finest mysteries. Lutf (subtlety) means achieving a goal in a gentle, almost imperceptible way. Allah brings about immense changes in our lives through tiny, unseen steps. He sends His mercy in ways we don\'t even realize. He knows the most subtle, hidden details of your heart and situation, and He resolves your problems with a gentle, invisible hand.',
                'virtues'                 => 'Reciting "Ya Latif" 129 times is a famous practice in times of distress, depression, or seemingly impossible situations. Believers call on Al-Latif to resolve their severe trials gently, without crushing them in the process.',
                'practical_lessons'       => "1. Look for the hidden blessings in your trials — that is the lutf (subtlety) of Allah.\n2. Be gentle (latif) with people; do not be harsh in your advice or corrections.\n3. Trust that Allah is working behind the scenes of your life, even when everything seems stagnant.\n4. When asking for a way out of hardship, ask Allah to grant it with \"lutf\" (gentleness).",
                'dhikr_reflection'        => 'Think of a massive problem you are facing. Instead of asking for a dramatic, loud rescue, ask for a subtle one. Recite "Ya Latif" 129 times. Feel the tension ease as you realize Al-Latif can untangle your problem so gently that you won\'t even feel the knot untying.',
            ],

            // ─────────────────────────────────────────────────
            // #31 — Al-Khabir | الْخَبِيرُ | The All-Aware
            // ─────────────────────────────────────────────────
            'al-khabir' => [
                'quran_reference'         => 'Surah Al-Hujurat (49:13)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ عَلِيمٌ خَبِيرٌ',
                'quran_verse_translation' => 'Indeed, Allah is Knowing and Acquainted.',
                'explanation'             => 'Al-Khabir is the All-Aware, the One who knows the internal qualities and hidden realities of all things. While Al-\'Alim knows the facts, Al-Khabir knows the inner essence, the hidden motives, and the deep truth of the matter. He knows exactly what is happening in the darkest corners of the earth and the deepest recesses of the human soul. Nothing is hidden from His awareness.',
                'virtues'                 => 'Reciting "Ya Khabir" repeatedly helps a person overcome bad habits and hidden desires, as they become acutely aware that Allah knows their inner reality. It is also recited to discover hidden truths or find lost items.',
                'practical_lessons'       => "1. Purify your secret intentions; Al-Khabir is completely aware of your true motives.\n2. Do not try to deceive people, for you can never deceive Al-Khabir.\n3. Find comfort in knowing that Al-Khabir understands your complex emotions perfectly.\n4. When you are confused about a situation, ask Al-Khabir to reveal the truth of it to you.",
                'dhikr_reflection'        => 'Sit in silence. Bring to mind a complex situation where you don\'t know the right path or the true motives of others. Recite "Ya Khabir" 40 times. Trust that the All-Aware is handling the unseen variables, and ask Him to guide you based on His perfect awareness.',
            ],

            // ─────────────────────────────────────────────────
            // #32 — Al-Halim | الْحَلِيمُ | The Forbearing
            // ─────────────────────────────────────────────────
            'al-halim' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:225)',
                'quran_verse_arabic'      => 'وَاللَّهُ غَفُورٌ حَلِيمٌ',
                'quran_verse_translation' => 'And Allah is Forgiving and Forbearing.',
                'explanation'             => 'Al-Halim is the Forbearing, the Clement, the One who delays punishment. Despite His immense power and full knowledge of our sins, Al-Halim does not rush to punish. He gives respite, allowing time for repentance. If Allah punished us immediately for every wrong, "He would not leave upon the earth any creature" (35:45). Hilm is the beautiful patience of the powerful who chooses mercy over immediate retribution.',
                'virtues'                 => 'Reciting "Ya Halim" cools anger and brings tranquility. The Prophet ﷺ praised a companion saying, "You possess two qualities beloved to Allah: Hilm (forbearance) and deliberation." Connecting with Al-Halim makes a person less reactive and more forgiving.',
                'practical_lessons'       => "1. When someone angers you, delay your reaction — practice the hilm (forbearance) of Al-Halim.\n2. Use the time Allah gives you to repent; do not mistake His forbearance for approval of your sin.\n3. Be patient with the mistakes of your children and family members.\n4. Thank Allah daily that He does not punish you instantly for your shortcomings.",
                'dhikr_reflection'        => 'Think of a person who frequently tests your patience. Imagine the restraint Allah shows toward all of humanity\'s sins every single day. Recite "Ya Halim" 33 times, asking Allah to pour that divine forbearance into your heart so you can tolerate others gracefully.',
            ],

            // ─────────────────────────────────────────────────
            // #33 — Al-'Azim | الْعَظِيمُ | The Magnificent
            // ─────────────────────────────────────────────────
            'al-azim' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:255) [Ayatul Kursi]',
                'quran_verse_arabic'      => 'وَهُوَ الْعَلِيُّ الْعَظِيمُ',
                'quran_verse_translation' => 'And He is the Most High, the Most Great.',
                'explanation'             => 'Al-\'Azim is the Magnificent, the Supremely Great. His greatness is beyond human comprehension. Everything in creation is insignificantly small compared to His majesty. The word "Azim" comes from "Azm" (bone), signifying core strength and grandeur. When a believer truly understands the magnificence of Al-\'Azim, the problems, tyrants, and distractions of the world become vanishingly small in their eyes.',
                'virtues'                 => 'In every Ruku (bowing) in prayer, we say "Subhana Rabbiyal \'Azim" (Glory be to my Lord, the Magnificent). The Prophet ﷺ said that reciting "SubhanAllahi wa bihamdihi, SubhanAllahil \'Azim" are two phrases light on the tongue but heavy on the scales.',
                'practical_lessons'       => "1. Whenever a problem seems too big, remind yourself that Al-'Azim is infinitely greater.\n2. Show profound respect in your prayer; you are standing before The Magnificent.\n3. Purify your heart from admiring worldly wealth and power over the majesty of Allah.\n4. Speak of Allah with the utmost respect and reverence in your daily conversations.",
                'dhikr_reflection'        => 'Look up at the night sky or imagine the vastness of the universe. Then realize that all of it is like a ring thrown in a desert compared to the Kursi of Allah. Recite "SubhanAllahil \'Azim" 50 times, feeling your worldly worries shrink in the face of His magnificence.',
            ],

            // ─────────────────────────────────────────────────
            // #34 — Al-Ghafur | الْغَفُورُ | The Forgiver and Hider
            // ─────────────────────────────────────────────────
            'al-ghafur' => [
                'quran_reference'         => 'Surah Az-Zumar (39:53)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ يَغْفِرُ الذُّنُوبَ جَمِيعًا ۚ إِنَّهُ هُوَ الْغَفُورُ الرَّحِيمُ',
                'quran_verse_translation' => 'Indeed, Allah forgives all sins. Indeed, it is He who is the Forgiving, the Merciful.',
                'explanation'             => 'Al-Ghafur is the perfectly Forgiving. While Al-Ghaffar emphasizes the *quantity* of forgiveness (forgiving repeatedly), Al-Ghafur emphasizes the *quality* and *depth* of forgiveness (forgiving major sins, completely covering them). Al-Ghafur covers the sin, protects the sinner from its consequences, and wipes the slate clean. He is so forgiving that He transforms the sins of the repentant into good deeds (25:70).',
                'virtues'                 => 'Reciting "Ya Ghafur" brings relief from the heavy burden of guilt. The Prophet ﷺ taught Abu Bakr a special du\'a for prayer: "O Allah, I have wronged myself greatly, and none forgives sins but You. So grant me forgiveness from Yourself... Indeed You are Al-Ghafur, Ar-Rahim."',
                'practical_lessons'       => "1. Never lose hope in Allah's mercy, no matter how severe your past sins are.\n2. Cover the faults of others; if you expose people, Allah may expose you.\n3. Forgive yourself after you have sincerely repented; do not hold onto what Al-Ghafur has erased.\n4. Make istighfar a daily practice, washing your soul continually.",
                'dhikr_reflection'        => 'Think of a past mistake that brings you deep shame. Hold that feeling for a moment, then recite "Ya Ghafur" 70 times. With each repetition, visualize that sin being covered in a beautiful white cloth, hidden forever by the Ultimate Forgiver.',
            ],

            // ─────────────────────────────────────────────────
            // #35 — Ash-Shakur | الشَّكُورُ | The Rewarder of Thankfulness
            // ─────────────────────────────────────────────────
            'ash-shakur' => [
                'quran_reference'         => 'Surah Fatir (35:30)',
                'quran_verse_arabic'      => 'إِنَّهُ غَفُورٌ شَكُورٌ',
                'quran_verse_translation' => 'Indeed, He is Forgiving and Appreciative.',
                'explanation'             => 'Ash-Shakur is the Most Appreciative, the Multiplier of Rewards. While humans might show gratitude (shukr) for a massive favor, Allah is Ash-Shakur — He shows immense appreciation for even the smallest good deed. You give a date in charity, and He grows it like a mountain. You take one step toward Him, and He comes to you at speed. Ash-Shakur never lets the smallest effort of a believer go unrewarded.',
                'virtues'                 => 'Reciting "Ya Shakur" 41 times over water and drinking it is said to lift heaviness from the heart. Reflecting on this name cures the feeling of being unappreciated by people, because the believer knows Ash-Shakur notices every unseen effort.',
                'practical_lessons'       => "1. Do not belittle any good deed — Ash-Shakur appreciates even half a date given in charity.\n2. Show immense gratitude to Allah (be a 'shakir') because He is Ash-Shakur.\n3. Thank people; the Prophet ﷺ said, \"Whoever does not thank people has not thanked Allah.\"\n4. When you feel unappreciated at work or home, remind yourself that your ultimate reward is with Ash-Shakur.",
                'dhikr_reflection'        => 'Bring to mind a small, hidden good deed you did that no one ever noticed or thanked you for. Recite "Ya Shakur" 33 times. Let your heart be filled with the warmth of knowing that the Lord of the Worlds saw it, appreciated it, and preserved it for you.',
            ],

            // ─────────────────────────────────────────────────
            // #36 — Al-'Ali | الْعَلِيُّ | The Highest
            // ─────────────────────────────────────────────────
            'al-ali' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:255)',
                'quran_verse_arabic'      => 'وَهُوَ الْعَلِيُّ الْعَظِيمُ',
                'quran_verse_translation' => 'And He is the Most High, the Most Great.',
                'explanation'             => 'Al-\'Ali is the Most High, the Exalted. He is high in His essence, above His creation, and high in His attributes, possessing ultimate perfection. No one can reach His status. Everything else is lowly in comparison. When believers prostrate, putting their highest physical part (the forehead) on the lowest ground (the dirt), they declare the absolute highness of Al-\'Ali.',
                'virtues'                 => 'In every Sujood (prostration) we say "Subhana Rabbiyal A\'la" (Glory to my Lord, the Most High). Reciting "Ya \'Ali" frequently is said to bring elevation in faith and destiny. It removes the fear of high-ranking people, as the believer recognizes only One is truly High.',
                'practical_lessons'       => "1. Lower yourself in humility before Allah to acknowledge His absolute highness.\n2. Do not act with arrogance or superiority over others; you are not 'high'.\n3. Aim high in your spiritual goals, seeking the highest levels of Paradise (Firdaus).\n4. When facing a \"higher-up\" at work who intimidates you, remember Al-'Ali.",
                'dhikr_reflection'        => 'Go into sujood. Feel the ground against your forehead. In this position of ultimate lowliness, whisper "Ya \'Ali, Ya \'Ali, Ya \'Ali" 10 times. Feel the beautiful contrast between your servant-hood and His majestic highness.',
            ],

            // ─────────────────────────────────────────────────
            // #37 — Al-Kabir | الْكَبِيرُ | The Greatest
            // ─────────────────────────────────────────────────
            'al-kabir' => [
                'quran_reference'         => 'Surah Ar-Ra\'d (13:9)',
                'quran_verse_arabic'      => 'عَالِمُ الْغَيْبِ وَالشَّهَادَةِ الْكَبِيرُ الْمُتَعَالِ',
                'quran_verse_translation' => '[He is] Knower of the unseen and the witnessed, the Grand, the Exalted.',
                'explanation'             => 'Al-Kabir is the Incomparably Great. His greatness is not physical size, but absolute grandeur in essence, power, and existence. Everything else is small (saghir) in comparison. This is why Muslims say "Allahu Akbar" (Allah is Greater) — greater than our problems, greater than our fears, greater than the world. Al-Kabir encompasses all greatness.',
                'virtues'                 => 'The phrase "Allahu Akbar" (Takbeer) is the most repeated phrase in a Muslim\'s life — used to call to prayer, enter prayer, and celebrate Eid. Reciting "Ya Kabir" 100 times daily is said to grant a person respect and gravitas among their peers.',
                'practical_lessons'       => "1. Start every major task with 'Allahu Akbar' to remind yourself of His greatness.\n2. Never magnify your problems more than you magnify Allah.\n3. Show respect to your elders (the 'kibar' among you) as a reflection of honoring greatness.\n4. Shrink your ego; in the presence of Al-Kabir, there is no room for human pride.",
                'dhikr_reflection'        => 'Write down your biggest fear right now. Next to it, write "ALLAHU AKBAR". Recite "Ya Kabir" 33 times. With every repetition, visualize your fear shrinking and the presence of Allah expanding until the fear disappears completely.',
            ],

            // ─────────────────────────────────────────────────
            // #38 — Al-Hafiz | الْحَفِيظُ | The Preserver
            // ─────────────────────────────────────────────────
            'al-hafiz' => [
                'quran_reference'         => 'Surah Hud (11:57)',
                'quran_verse_arabic'      => 'إِنَّ رَبِّي عَلَىٰ كُلِّ شَيْءٍ حَفِيظٌ',
                'quran_verse_translation' => 'Indeed, my Lord is, over all things, Guardian (Preserver).',
                'explanation'             => 'Al-Hafiz is the Preserver, the Protector, the Guardian. He preserves the heavens and the earth from collapsing. He preserves the Quran from alteration. He preserves the records of our deeds perfectly. Most beautifully, He preserves and protects the believer from harm, from straying, and from the whispers of Shaytan. When you entrust something to Al-Hafiz, it is never lost.',
                'virtues'                 => 'Reciting Ayatul Kursi brings the protection of Al-Hafiz over a home or person. Saying "Ya Hafiz" 99 times before traveling or in times of danger serves as a spiritual shield. The Prophet ﷺ said: "Be mindful of Allah, and He will protect (hifdh) you."',
                'practical_lessons'       => "1. Trust Allah to protect your children and loved ones when they are out of your sight.\n2. Preserve Allah's commands (pray on time, guard your gaze) and He will preserve you.\n3. Recite the morning and evening adhkar for daily protection.\n4. Do not panic about losing your wealth or health; Al-Hafiz is the ultimate guardian.",
                'dhikr_reflection'        => 'Think of the person or thing you are most terrified of losing. Say: "O Allah, I entrust them to You, for You do not lose what is entrusted to You." Recite "Ya Hafiz" 33 times, feeling the anxiety of hyper-vigilance leave your body as you hand the protection over to Him.',
            ],

            // ─────────────────────────────────────────────────
            // #39 — Al-Muqit | المُقيِت | The Nourisher
            // ─────────────────────────────────────────────────
            'al-muqit' => [
                'quran_reference'         => 'Surah An-Nisa (4:85)',
                'quran_verse_arabic'      => 'وَكَانَ اللَّهُ عَلَىٰ كُلِّ شَيْءٍ مُّقِيتًا',
                'quran_verse_translation' => 'And ever is Allah, over all things, a Keeper (Nourisher).',
                'explanation'             => 'Al-Muqit is the Sustainer and the Nourisher. While Ar-Razzaq gives provision generally, Al-Muqit provides the precise, exact amount of nourishment needed to sustain life at every specific moment. He gives the body its physical food (qut), the mind its knowledge, and the heart its spiritual nourishment. He oversees and sustains all things, giving everyone exactly what they need to survive today.',
                'virtues'                 => 'Reciting "Ya Muqit" over water and having a misbehaving child drink it is a traditional practice to nourish their heart with good character. It is the perfect name to call upon when you feel spiritually empty and starved.',
                'practical_lessons'       => "1. Eat with gratitude, recognizing that the exact calories and nutrients were designed by Al-Muqit for you today.\n2. Nourish your soul with the Quran just as you nourish your body with food.\n3. Don't worry about tomorrow's sustenance; Al-Muqit provides exactly what is needed day by day.\n4. Feed the hungry, participating in the physical nourishment of Allah's creation.",
                'dhikr_reflection'        => 'Place your hand over your stomach, then over your heart. Recite "Ya Muqit" 40 times. Ask Him: "O Nourisher, just as You sustain my body with food, do not let my soul starve. Nourish my heart with Your remembrance."',
            ],

            // ─────────────────────────────────────────────────
            // #40 — Al-Hasib | الْحَسِيبُ | The Accounter
            // ─────────────────────────────────────────────────
            'al-hasib' => [
                'quran_reference'         => 'Surah An-Nisa (4:86)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ كَانَ عَلَىٰ كُلِّ شَيْءٍ حَسِيبًا',
                'quran_verse_translation' => 'Indeed, Allah is ever, over all things, an Accountant.',
                'explanation'             => 'Al-Hasib means both the Accounter and the Sufficient One. First, He keeps a precise, flawless account of every single deed, word, and thought, and will judge accordingly. Second, "Hasb" means sufficient; Allah is entirely sufficient for His servants. When a believer says "Hasbunallah wa ni\'mal wakil" (Allah is sufficient for us), they are invoking Al-Hasib to take care of their affairs completely.',
                'virtues'                 => 'Reciting "Hasbunallahu wa ni\'mal wakil" was the practice of Prophet Ibrahim (AS) when thrown into the fire, and the Prophet Muhammad ﷺ at Uhud. Reciting "Ya Hasib" 70 times on Thursdays is said to protect one from fear of being robbed or wronged.',
                'practical_lessons'       => "1. Take account of your own deeds (muhasabah) before you are taken to account by Al-Hasib.\n2. When facing an overwhelming enemy or problem, declare that Allah is sufficient for you.\n3. Do not waste time or money; Al-Hasib will ask you how you spent both.\n4. Be exact and fair in your financial dealings with others.",
                'dhikr_reflection'        => 'At the end of your day, sit quietly for 3 minutes. Review your actions of the day — the good and the bad. Then recite "Ya Hasib" 33 times. Ask Him to forgive the bad in your account and accept the good, and declare that His mercy is sufficient for you.',
            ],

            // ─────────────────────────────────────────────────
            // #41 — Al-Jalil | الْجَلِيلُ | The Mighty
            // ─────────────────────────────────────────────────
            'al-jalil' => [
                'quran_reference'         => 'Surah Ar-Rahman (55:27)',
                'quran_verse_arabic'      => 'وَيَبْقَىٰ وَجْهُ رَبِّكَ ذُو الْجَلَالِ وَالْإِكْرَامِ',
                'quran_verse_translation' => 'And there will remain the Face of your Lord, Owner of Majesty and Honor.',
                'explanation'             => 'Al-Jalil is the Majestic, the Mighty, the One whose essential greatness is beyond description. Jalal refers to greatness in attributes (like power, glory, and anger). When we look at a beautiful sunset, we see Allah\'s Jamal (Beauty). When we look at a terrifying thunderstorm or a towering mountain, we see a reflection of His Jalal (Majesty). Al-Jalil inspires a profound, trembling awe and respect in the hearts of those who know Him.',
                'virtues'                 => 'Reciting "Ya Jalil" frequently is said to grant a person an aura of dignity and respect. It removes the fear of worldly powers, replacing it with the awe of the Divine. The Prophet ﷺ said: "Keep strictly to \'Ya Dhal-Jalali wal-Ikram\'." (Tirmidhi)',
                'practical_lessons'       => "1. Approach your prayers with awe; you are speaking to the Majestic.\n2. Balance your love of Allah (from His Beauty) with your reverence/fear of Allah (from His Majesty).\n3. Do not treat the commands of Allah lightly; they come from Al-Jalil.\n4. Seek out the grand phenomena in nature (oceans, mountains) to witness His Jalal.",
                'dhikr_reflection'        => 'Think of the most awe-inspiring, terrifyingly powerful thing you have ever seen in nature (a severe storm, a massive waterfall). Now multiply that awe infinitely. Recite "Ya Jalil" 33 times, letting a healthy, reverent fear of Allah settle into your heart, washing away trivial worldly anxieties.',
            ],

            // ─────────────────────────────────────────────────
            // #42 — Al-Karim | الْكَرِيمُ | The Generous
            // ─────────────────────────────────────────────────
            'al-karim' => [
                'quran_reference'         => 'Surah Al-Infitar (82:6)',
                'quran_verse_arabic'      => 'يَا أَيُّهَا الْإِنسَانُ مَا غَرَّكَ بِرَبِّكَ الْكَرِيمِ',
                'quran_verse_translation' => 'O mankind, what has deceived you concerning your Lord, the Generous?',
                'explanation'             => 'Al-Karim is the Most Generous, the Noble. His generosity is absolute: He gives without being asked, He gives to those who do not deserve it, and He gives without reminding the receiver of His favors. When Al-Karim forgives, He doesn\'t just pardon; He completely erases the sin and often replaces it with a reward. He gives infinitely, and His treasury never decreases.',
                'virtues'                 => 'Reciting "Ya Karim" before sleeping is a practice for those seeking peace and abundance. During Ramadan, the Prophet ﷺ taught Aisha (RA) to say: "Allahumma innaka \'Afuwwun Karim, tuhibbul-\'afwa fa\'fu \'anni" (O Allah, You are Pardoning and Generous, You love to pardon, so pardon me).',
                'practical_lessons'       => "1. Be generous to others (karam) — host guests beautifully, give gifts, and forgive easily.\n2. Ask Allah for great things; do not make small du'as to a Generous God.\n3. Do not abuse His generosity by continuing to sin without repentance.\n4. Overlook the faults of others, just as Al-Karim overlooks yours.",
                'dhikr_reflection'        => 'Hold your hands up in du\'a. Think of the fact that the Prophet ﷺ said Allah is "Hayy, Karim" (Shy and Generous) — He is too shy to let a servant raise their hands to Him and return them empty. Recite "Ya Karim" 33 times, then ask for your deepest desire with absolute certainty He will give you what is best.',
            ],

            // ─────────────────────────────────────────────────
            // #43 — Ar-Raqib | الرَّقِيبُ | The Watchful One
            // ─────────────────────────────────────────────────
            'ar-raqib' => [
                'quran_reference'         => 'Surah An-Nisa (4:1)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ كَانَ عَلَيْكُمْ رَقِيبًا',
                'quran_verse_translation' => 'Indeed Allah is ever, over you, an Observer.',
                'explanation'             => 'Ar-Raqib is the Ever-Watchful. He observes every movement, every stillness, every thought, and every breath. Nothing escapes His vigilance. He watches over His creation with the care of a protector and the exactness of an accountant. This name is the foundation of the spiritual state of Muraqabah (mindfulness) — the constant awareness that the Divine Eye is upon you at all times.',
                'virtues'                 => 'Reciting "Ya Raqib" 7 times over one\'s family or property is a traditional practice for protection. Meditating on this name is the fastest way to cure the habit of sinning in secret, as it builds an unshakeable consciousness of Allah\'s presence.',
                'practical_lessons'       => "1. Develop Muraqabah: pause before acting and ask, \"What is Ar-Raqib seeing me do right now?\"\n2. Protect your private moments; character is what you do when only Ar-Raqib is watching.\n3. Take comfort that Ar-Raqib sees your silent struggles and hidden tears.\n4. Watch over your own heart and thoughts, just as He watches over you.",
                'dhikr_reflection'        => 'Sit alone in a room. Put away your phone. Close your eyes and vividly imagine a gentle, majestic gaze resting upon you. You are completely seen. Recite "Ya Raqib" 50 times. Let this watchfulness feel not like a spy, but like a loving Guardian who never takes His eyes off you.',
            ],

            // ─────────────────────────────────────────────────
            // #44 — Al-Mujib | الْمُجِيبُ | The Responder to Prayer
            // ─────────────────────────────────────────────────
            'al-mujib' => [
                'quran_reference'         => 'Surah Hud (11:61)',
                'quran_verse_arabic'      => 'فَاسْتَغْفِرُوهُ ثُمَّ تُوبُوا إِلَيْهِ ۚ إِنَّ رَبِّي قَرِيبٌ مُّجِيبٌ',
                'quran_verse_translation' => 'So ask forgiveness of Him and then repent to Him. Indeed, my Lord is near and responsive.',
                'explanation'             => 'Al-Mujib is the Responder, the Answerer of prayers. Allah does not just hear our du\'as; He actively responds to them. Every single sincere prayer is answered by Al-Mujib in one of three ways: He gives exactly what was asked, He diverts an equivalent harm, or He saves the reward for the Hereafter. He responds to the plea of the distressed, the cry of the oppressed, and the whisper of the repentant.',
                'virtues'                 => 'Reciting "Ya Mujib" repeatedly, especially after making a heartfelt du\'a, solidifies certainty (yaqeen) in the answer. The Quran says: "Call upon Me; I will respond to you" (40:60) — a direct guarantee from Al-Mujib.',
                'practical_lessons'       => "1. Never stop making du'a; Al-Mujib has guaranteed a response.\n2. Respond promptly to the call of Allah (prayer, charity) if you want Him to respond to your call.\n3. Respond to the needs of people when they ask you for help.\n4. Have beautiful patience if the answer is delayed, trusting Al-Mujib's timing.",
                'dhikr_reflection'        => 'Recall a specific time in the past when you were desperate, you made a du\'a, and Allah answered it. Relive that feeling of relief. Now recite "Ya Mujib" 33 times, carrying that same certainty into your present problems. Ask, and know He is answering.',
            ],

            // ─────────────────────────────────────────────────
            // #45 — Al-Wasi | الْوَاسِعُ | The All-Comprehending
            // ─────────────────────────────────────────────────
            'al-wasi' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:268)',
                'quran_verse_arabic'      => 'وَاللَّهُ يَعِدُكُم مَّغْفِرَةً مِّنْهُ وَفَضْلًا ۗ وَاللَّهُ وَاسِعٌ عَلِيمٌ',
                'quran_verse_translation' => 'And Allah promises you forgiveness from Him and bounty. And Allah is all-Encompassing and Knowing.',
                'explanation'             => 'Al-Wasi is the Vast, the All-Encompassing. His mercy is vast, His knowledge is vast, His provision is vast. He cannot be restricted or contained. When humans feel cornered, stressed, or limited, Al-Wasi brings expansion. "My mercy encompasses (wasi\'at) all things" (7:156). His capacity to forgive, to provide, and to understand has no borders and no limits.',
                'virtues'                 => 'Reciting "Ya Wasi" is traditionally recommended for someone facing financial constriction or feelings of claustrophobia in life. It expands the chest, opens doors of provision, and removes narrow-mindedness.',
                'practical_lessons'       => "1. Never think your sins are too big — Al-Wasi's mercy is vaster.\n2. When you feel stuck or suffocated by life, call upon the Vast One to create an opening.\n3. Have a \"vast\" heart; be accommodating and forgiving to others' faults.\n4. Do not limit your du'as to small things; you are asking the Boundless.",
                'dhikr_reflection'        => 'Go outside and look at the vast expanse of the sky. Breathe in deeply. Think of how small your current problem is within this vast universe, and how much smaller it is to the Creator of it all. Recite "Ya Wasi" 33 times, inhaling deeply with each repetition, feeling your chest and mind expand.',
            ],

            // ─────────────────────────────────────────────────
            // #46 — Al-Hakim | الْحَكِيمُ | The Perfectly Wise
            // ─────────────────────────────────────────────────
            'al-hakim' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:269)',
                'quran_verse_arabic'      => 'يُؤْتِي الْحِكْمَةَ مَن يَشَاءُ ۚ وَمَن يُؤْتَ الْحِكْمَةَ فَقَدْ أُوتِيَ خَيْرًا كَثِيرًا',
                'quran_verse_translation' => 'He gives wisdom to whom He wills, and whoever has been given wisdom has certainly been given much good.',
                'explanation'             => 'Al-Hakim is the Perfectly Wise. Every command, every prohibition, every decree, and every event in the universe is executed with perfect wisdom. Sometimes His wisdom is apparent to us; often, it is hidden. The delay of a prayer\'s answer, a sudden loss, or an unexpected gain — all are orchestrated by Al-Hakim. Wisdom (hikmah) is putting everything in its exact right place, at the exact right time.',
                'virtues'                 => 'Reciting "Ya Hakim" opens the mind to understand the deeper meanings of the Quran and the realities of life. It cures the heart of questioning Allah\'s decree (asking "Why me?"). The Prophet ﷺ was sent to teach both the Book and "Al-Hikmah" (Wisdom).',
                'practical_lessons'       => "1. Trust Allah's timing — a delay is often His wisdom protecting you.\n2. Seek wisdom in your own life; think before you speak or act.\n3. Stop questioning the \"Why\" behind your trials; surrender to the wisdom of Al-Hakim.\n4. Study the Seerah and the Quran to absorb divine wisdom into your daily decisions.",
                'dhikr_reflection'        => 'Think of a past tragedy or disappointment in your life that, years later, you realized was actually a blessing in disguise. That is Al-Hakim at work. Now, look at a current disappointment. Recite "Ya Hakim" 40 times, trusting that this too has a perfect, hidden wisdom you will one day understand.',
            ],

            // ─────────────────────────────────────────────────
            // #47 — Al-Wadud | الْوَدُودُ | The Loving One
            // ─────────────────────────────────────────────────
            'al-wadud' => [
                'quran_reference'         => 'Surah Al-Buruj (85:14)',
                'quran_verse_arabic'      => 'وَهُوَ الْغَفُورُ الْوَدُودُ',
                'quran_verse_translation' => 'And He is the Forgiving, the Affectionate (Loving).',
                'explanation'             => 'Al-Wadud is the Most Loving, the Affectionate. While "Hubb" is internal love, "Wudd" is love expressed through action. Allah does not just love His servants; He expresses it by providing for them, guiding them, and forgiving them. He is the source of all affection in the universe. If Allah loves a servant, He calls Jibreel and says, "I love so-and-so, therefore love him," and that love is spread across the earth.',
                'virtues'                 => 'Reciting "Ya Wadud" 1,000 times (as practiced by some scholars) is said to resolve disputes between spouses or family members, pouring affection back into broken relationships. It cures the feeling of being unloved or isolated.',
                'practical_lessons'       => "1. Express your love to others through actions (wudd), not just feelings.\n2. Remember that every blessing you have is a love letter from Al-Wadud.\n3. Love Allah more than anything else; He is the source of all the love you seek.\n4. When you feel lonely, call on Al-Wadud; His love is constantly reaching out to you.",
                'dhikr_reflection'        => 'Place your hand on your heart. Think of the fact that the Creator of the galaxies actively expresses love for you every time your heart beats. Recite "Ya Wadud" 100 times. With every repetition, visualize divine affection enveloping you, and send that affection outward to someone you are in conflict with.',
            ],

            // ─────────────────────────────────────────────────
            // #48 — Al-Majeed | الْمَجِيدُ | The Majestic One
            // ─────────────────────────────────────────────────
            'al-majeed' => [
                'quran_reference'         => 'Surah Hud (11:73)',
                'quran_verse_arabic'      => 'رَحْمَتُ اللَّهِ وَبَرَكَاتُهُ عَلَيْكُمْ أَهْلَ الْبَيْتِ ۚ إِنَّهُ حَمِيدٌ مَّجِيدٌ',
                'quran_verse_translation' => 'The mercy of Allah and His blessings be upon you, people of the house. Indeed, He is Praiseworthy and Honorable (Majestic).',
                'explanation'             => 'Al-Majeed is the Glorious, the Majestic. This name combines ultimate power, absolute honor, and boundless generosity. Something is "majeed" when its goodness is abundant and its status is incredibly high. The Quran is referred to as "Quranun Majeed" (A Glorious Quran) because of its endless depth and honor. Allah\'s majesty is characterized by His beautiful treatment of His creation.',
                'virtues'                 => 'We recite this name daily in every prayer during the Durood (Salawat) upon the Prophet ﷺ: "Innaka Hameedun Majeed." Reciting "Ya Majeed" frequently is said to cure the heart of depression and grant the reciter respect and honor in their community.',
                'practical_lessons'       => "1. Treat the Quran with immense respect; it is the word of Al-Majeed.\n2. Do not debase yourself with petty arguments or sins; strive for noble (majeed) character.\n3. Send abundant blessings on the Prophet ﷺ to connect with this name.\n4. Strive for excellence (Ihsan) in your work to reflect a fraction of His glory.",
                'dhikr_reflection'        => 'Sit in the posture of Tashahhud. Recite the second half of the Durood: "Allahumma barik \'ala Muhammad... innaka Hameedun Majeed." Repeat the phrase "Innaka Hameedun Majeed" 33 times. Let the glory and majesty of Allah elevate your thoughts above the petty stresses of the day.',
            ],

            // ─────────────────────────────────────────────────
            // #49 — Al-Ba'ith | الْبَاعِثُ | The Resurrector
            // ─────────────────────────────────────────────────
            'al-baith' => [
                'quran_reference'         => 'Surah Al-Hajj (22:7)',
                'quran_verse_arabic'      => 'وَأَنَّ السَّاعَةَ آتِيَةٌ لَّا رَيْبَ فِيهَا وَأَنَّ اللَّهَ يَبْعَثُ مَن فِي الْقُبُورِ',
                'quran_verse_translation' => 'And [that they may know] that the Hour is coming - no doubt about it - and that Allah will resurrect those in the graves.',
                'explanation'             => 'Al-Ba\'ith is the Resurrector, the Awakener. He is the One who will raise the dead from their graves on the Day of Judgment. But He is also the Ba\'ith in this life: He awakens hearts from the sleep of heedlessness (ghaflah), He sends (mab\'uth) prophets to awaken nations, and He resurrects dead hopes and barren lands. He brings life to what was assumed to be permanently dead.',
                'virtues'                 => 'Reciting "Ya Ba\'ith" 100 times before sleeping, with hands placed on the chest, is mentioned by scholars as a way to awaken the heart with spiritual light and wisdom. It instills a deep, living certainty in the Hereafter.',
                'practical_lessons'       => "1. Live every day with the certainty that you will be resurrected and questioned.\n2. Do not give up on a \"dead\" relationship or a \"dead\" heart; Al-Ba'ith can awaken it.\n3. Wake up for Tahajjud — it is a daily resurrection from the \"minor death\" of sleep.\n4. Strive to awaken others to the truth with gentle reminders.",
                'dhikr_reflection'        => 'When you wake up tomorrow morning, immediately say the Sunnah du\'a: "Alhamdulillahil-ladhi ahyana ba\'da ma amatana wa ilayhin-nushur" (Praise be to Allah who gave us life after giving us death, and to Him is the resurrection). Then whisper "Ya Ba\'ith" 10 times, asking Him to awaken your heart for the day.',
            ],

            // ─────────────────────────────────────────────────
            // #50 — Ash-Shahid | الشَّهِيدُ | The Witness
            // ─────────────────────────────────────────────────
            'ash-shahid' => [
                'quran_reference'         => 'Surah Fussilat (41:53)',
                'quran_verse_arabic'      => 'أَوَلَمْ يَكْفِ بِرَبِّكَ أَنَّهُ عَلَىٰ كُلِّ شَيْءٍ شَهِيدٌ',
                'quran_verse_translation' => 'Is it not sufficient concerning your Lord that He is, over all things, a Witness?',
                'explanation'             => 'Ash-Shahid is the Ultimate Witness. While Al-Khabir refers to His knowledge of hidden things, Ash-Shahid refers to His absolute witnessing of outward events. He is present everywhere, witnessing every action, hearing every word. On the Day of Judgment, He will be the Witness against humanity. Nothing escapes His sight, and no injustice goes unrecorded by the Divine Witness.',
                'virtues'                 => 'Reciting "Ya Shahid" 21 times with one\'s hand on the head of a disobedient child or over oneself is historically practiced to instill a sense of Allah\'s presence and correct behavior. It builds the highest level of faith (Ihsan).',
                'practical_lessons'       => "1. Never say \"nobody saw me.\" Ash-Shahid always sees.\n2. If you are falsely accused, take comfort: Ash-Shahid knows your innocence.\n3. Be a truthful witness in your own life, even if it is against yourself (Quran 4:135).\n4. Perform your prayers as if you are standing directly in the view of the Witness.",
                'dhikr_reflection'        => 'Think of a good deed you did entirely in secret, or a pain you suffered alone. Say: "O Allah, You were my Witness." Recite "Ya Shahid" 40 times. Feel the profound peace of knowing your hidden struggles and secret tears were officially recorded by the King of the Heavens.',
            ],

            // ─────────────────────────────────────────────────
            // #51 — Al-Haqq | الْحَقُّ | The Truth
            // ─────────────────────────────────────────────────
            'al-haqq' => [
                'quran_reference'         => 'Surah Ta-Ha (20:114)',
                'quran_verse_arabic'      => 'فَتَعَالَى اللَّهُ الْمَلِكُ الْحَقُّ',
                'quran_verse_translation' => 'So high [above all] is Allah, the Sovereign, the Truth.',
                'explanation'             => 'Al-Haqq is the Absolute Truth, the Real, the One whose existence is undeniable and necessary. Everything in this world is temporary and subject to illusion, but Allah is the permanent reality. His promise is truth, His meeting is truth, and His word is truth. To align oneself with Al-Haqq is to align with reality itself; to oppose Him is to live in falsehood (Batil).',
                'virtues'                 => 'The Prophet ﷺ used to say in his Tahajjud du\'a: "Antal-Haqq, wa wa\'dukal-haqq, wa qawlukal-haqq..." (You are the Truth, Your promise is true, Your word is true). Reciting "Ya Haqq" helps clear away confusion and anchors the heart in absolute reality.',
                'practical_lessons'       => "1. Speak the truth even when it is difficult, for you are a servant of Al-Haqq.\n2. Do not chase the illusions of this world (wealth, fame); they are fleeting, while He is real.\n3. Stand against falsehood (batil) in all its forms.\n4. When you are lost in confusion, pray for Al-Haqq to show you the reality of things.",
                'dhikr_reflection'        => 'Think of a situation where you are being tempted by a comfortable lie or illusion. Recite "Ya Haqq" 33 times, asking Allah to strip away the falsehood and give you the courage to face reality, no matter how harsh it seems.',
            ],

            // ─────────────────────────────────────────────────
            // #52 — Al-Wakil | الْوَكِيلُ | The Trustee
            // ─────────────────────────────────────────────────
            'al-wakil' => [
                'quran_reference'         => 'Surah Al-Ahzab (33:3)',
                'quran_verse_arabic'      => 'وَتَوَكَّلْ عَلَى اللَّهِ ۚ وَكَفَىٰ بِاللَّهِ وَكِيلًا',
                'quran_verse_translation' => 'And rely upon Allah; and sufficient is Allah as Disposer of affairs.',
                'explanation'             => 'Al-Wakil is the Ultimate Trustee, the Disposer of Affairs. A "wakil" in this world is someone you appoint to handle matters you cannot handle yourself, like a lawyer. But a human wakil can fail, betray, or die. Allah as Al-Wakil is perfect; when you delegate your affairs to Him (Tawakkul), He manages them better than you ever could. He does not take away your effort, but He guarantees the outcome that is best for you.',
                'virtues'                 => 'Saying "Hasbunallahu wa ni\'mal Wakil" (Allah is sufficient for us, and He is the best Disposer of affairs) is a massive shield. It was the statement of Ibrahim (AS) in the fire. It brings profound peace to the anxious heart.',
                'practical_lessons'       => "1. Tie your camel (do your part) and then trust Al-Wakil with the outcome.\n2. Stop trying to micromanage the universe; you are not the manager.\n3. Say \"Hasbunallahu wa ni'mal Wakil\" whenever fear or anxiety strikes.\n4. Do not rely on your own intelligence or wealth; they are weak trustees.",
                'dhikr_reflection'        => 'Write down the three biggest worries keeping you awake at night. Now, imagine putting them in a box and handing them to Al-Wakil. Recite "Hasbunallahu wa ni\'mal Wakil" 100 times. Actively let go of the need to control the outcome.',
            ],

            // ─────────────────────────────────────────────────
            // #53 — Al-Qawi | الْقَوِيُّ | The Possessor of All Strength
            // ─────────────────────────────────────────────────
            'al-qawi' => [
                'quran_reference'         => 'Surah Al-Anfal (8:52)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ قَوِيٌّ شَدِيدُ الْعِقَابِ',
                'quran_verse_translation' => 'Indeed, Allah is Powerful and severe in penalty.',
                'explanation'             => 'Al-Qawi is the Most Strong, the Possessor of infinite physical and spiritual strength. His strength does not diminish, requires no effort, and can overcome any force in the universe. While Al-\'Azim refers to His majestic grandeur, Al-Qawi refers to the absolute, irresistible power by which He executes His will. The strongest human tyrants are utterly powerless before Al-Qawi.',
                'virtues'                 => 'Reciting "Ya Qawi" grants spiritual and physical strength to the weak. It is called upon when a believer is facing an adversary who seems unbeatable, reminding the heart that all strength in the universe belongs originally to Allah.',
                'practical_lessons'       => "1. Never fear the power of creation when you are connected to the Creator of power.\n2. Do not use your physical or social strength to oppress the weak.\n3. Recite \"La hawla wa la quwwata illa billah\" to acknowledge that you have no strength without Him.\n4. When you feel burnt out or exhausted, ask Al-Qawi to lend you strength.",
                'dhikr_reflection'        => 'When you feel physically exhausted or mentally drained by life\'s demands, sit quietly. Recite "La hawla wa la quwwata illa billah" (There is no power nor strength except through Allah) 100 times. Feel yourself unplugging from your own limited battery and plugging into the Infinite Source.',
            ],

            // ─────────────────────────────────────────────────
            // #54 — Al-Matin | الْمَتِينُ | The Forceful One
            // ─────────────────────────────────────────────────
            'al-matin' => [
                'quran_reference'         => 'Surah Adh-Dhariyat (51:58)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ هُوَ الرَّزَّاقُ ذُو الْقُوَّةِ الْمَتِينُ',
                'quran_verse_translation' => 'Indeed, it is Allah who is the [continual] Provider, the firm possessor of strength.',
                'explanation'             => 'Al-Matin is the Firm, the Steadfast, the Unshakable. While Al-Qawi means having absolute strength, Al-Matin means that this strength is perfectly firm, enduring, and cannot be moved or exhausted. A rope that is "matin" is one that cannot be snapped. Allah\'s decrees are matin, His promises are matin, and His power does not experience fatigue or weakness. "And We did not experience any weariness" (50:38).',
                'virtues'                 => 'Reciting "Ya Matin" provides firmness in faith, especially during times of trial when doubts arise. For nursing mothers facing difficulty, scholars have traditionally advised calling upon Al-Matin for endurance and provision.',
                'practical_lessons'       => "1. Be firm and steadfast (matin) in your religion; do not sway with every wind of culture.\n2. Rely on Allah as your unshakeable foundation when your life feels unstable.\n3. Do not assume your sins can \"exhaust\" Allah's mercy; His attributes are firm.\n4. Build your life on the solid rock of faith, not the shifting sands of worldly success.",
                'dhikr_reflection'        => 'Think of an area where your faith or resolve feels weak and easily shaken. Visualize planting your feet on an unmovable mountain. Recite "Ya Matin" 33 times, asking Allah to grant your heart the firmness to withstand the storms of doubt and desire.',
            ],

            // ─────────────────────────────────────────────────
            // #55 — Al-Wali | الْوَلِيُّ | The Governor
            // ─────────────────────────────────────────────────
            'al-wali' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:257)',
                'quran_verse_arabic'      => 'اللَّهُ وَلِيُّ الَّذِينَ آمَنُوا يُخْرِجُهُم مِّنَ الظُّلُمَاتِ إِلَى النُّورِ',
                'quran_verse_translation' => 'Allah is the ally of those who believe. He brings them out from darknesses into the light.',
                'explanation'             => 'Al-Wali is the Protective Friend, the Ally, the Patron. A "wali" is someone who is close to you, loves you, and takes responsibility for your well-being. Allah is the Wali of the believers — He guides them, defends them, and brings them from darkness to light. If Allah is your Wali, you need no other protector. He takes personal care of the affairs of those who devote themselves to Him.',
                'virtues'                 => 'Reciting "Ya Wali" builds a profound sense of intimacy and friendship with Allah. The Prophet ﷺ said that Allah declares: "Whoever shows enmity to a Wali of Mine, I declare war against him." Being a friend of Al-Wali offers the ultimate cosmic protection.',
                'practical_lessons'       => "1. Take Allah as your closest friend and ally before you rely on people.\n2. Strive to become a \"Wali\" (friend) of Allah through obligatory and voluntary worship.\n3. Do not take the enemies of Allah as your protective allies.\n4. Show loyalty to the believers, as they are the friends of your Friend.",
                'dhikr_reflection'        => 'Reflect on who you call first when you are in trouble. If it is not Allah, your reliance needs shifting. Recite "Ya Wali" 50 times, consciously deciding to make Allah your primary ally, trusting that His friendship is the only one that will never fail you.',
            ],

            // ─────────────────────────────────────────────────
            // #56 — Al-Hamid | الْحَمِيدُ | The Praised One
            // ─────────────────────────────────────────────────
            'al-hamid' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:267)',
                'quran_verse_arabic'      => 'وَاعْلَمُوا أَنَّ اللَّهَ غَنِيٌّ حَمِيدٌ',
                'quran_verse_translation' => 'And know that Allah is Free of need and Praiseworthy.',
                'explanation'             => 'Al-Hamid is the Praiseworthy. He is inherently deserving of all praise, regardless of whether anyone actually praises Him. All perfection, beauty, and blessings originate from Him, making Him the ultimate object of "Hamd". When we say "Alhamdulillah," we are acknowledging that all praise essentially belongs to Al-Hamid. He is praised in times of joy and in times of sorrow, because His decree is always perfect.',
                'virtues'                 => 'Saying "Alhamdulillah" fills the scales on the Day of Judgment. The Prophet ﷺ taught that Allah is pleased with a servant who praises Him after every meal and drink. Recognizing Al-Hamid cures the heart of complaining and ingratitude.',
                'practical_lessons'       => "1. Cultivate the habit of saying \"Alhamdulillah\" for everything, good or bad.\n2. Do not seek praise for yourself; redirect all praise to Al-Hamid.\n3. Recognize that every blessing you have is a reason to praise Him.\n4. In times of calamity, say \"Alhamdulillah 'ala kulli haal\" (Praise be to Allah in every circumstance).",
                'dhikr_reflection'        => 'Look around you right now and find three things you usually take for granted (your eyesight, the roof over your head, your next breath). Recite "Alhamdulillah" 33 times, actively directing the praise to Al-Hamid for these specific blessings.',
            ],

            // ─────────────────────────────────────────────────
            // #57 — Al-Muhsi | الْمُحْصِي | The Appraiser
            // ─────────────────────────────────────────────────
            'al-muhsi' => [
                'quran_reference'         => 'Surah Maryam (19:94)',
                'quran_verse_arabic'      => 'لَّقَدْ أَحْصَاهُمْ وَعَدَّهُمْ عَدًّا',
                'quran_verse_translation' => 'He has enumerated them and counted them a [full] counting.',
                'explanation'             => 'Al-Muhsi is the Accounter, the Numberer of All. He knows the exact number of every single thing in existence — the number of grains of sand, the number of leaves on every tree, the number of breaths every human will take. More importantly, He accounts for every single deed, word, and intention of humanity. Nothing is lost in His calculation. "And they will find what they did present [before them]" (18:49).',
                'virtues'                 => 'Understanding Al-Muhsi brings a powerful sense of accountability (taqwa). Reciting "Ya Muhsi" is used to develop focus and a sharp memory, as it connects the mind to the One who perfectly retains all information.',
                'practical_lessons'       => "1. Be mindful of your small sins; Al-Muhsi counts them all, even if you forget them.\n2. Take comfort that your small good deeds are also perfectly counted and will not be lost.\n3. Make \"muhasabah\" (self-accounting) a daily habit before sleeping.\n4. Realize that your time on earth is a specific number of breaths counted by Al-Muhsi; do not waste them.",
                'dhikr_reflection'        => 'Take a deep breath. Realize that Al-Muhsi knows exactly how many breaths you have left in this life. Recite "Ya Muhsi" 33 times. Ask Him to help you make the remaining count of your life heavy with good deeds, and to forgive the count of your sins.',
            ],

            // ─────────────────────────────────────────────────
            // #58 — Al-Mubdi | الْمُبْدِئُ | The Originator
            // ─────────────────────────────────────────────────
            'al-mubdi' => [
                'quran_reference'         => 'Surah Al-Buruj (85:13)',
                'quran_verse_arabic'      => 'إِنَّهُ هُوَ يُبْدِئُ وَيُعِيدُ',
                'quran_verse_translation' => 'Indeed, it is He who originates [creation] and repeats.',
                'explanation'             => 'Al-Mubdi is the Originator, the One who begins creation from nothing. Before anything existed, there was only Allah. He initiated the universe, life, and the human soul without a prior model or precedent. Everything that begins, begins by His command. Understanding Al-Mubdi reminds us that our origin is divine, and we belong entirely to the One who started our existence.',
                'virtues'                 => 'Reciting "Ya Mubdi" helps when starting new ventures, projects, or phases of life, seeking the blessing of the Originator. For pregnant women, calling on Al-Mubdi is a beautiful way to reflect on the new life originating within them by His command.',
                'practical_lessons'       => "1. When starting a new project, say Bismillah to connect your beginning with The Originator.\n2. Do not be afraid to start over in life; Al-Mubdi can originate a new path for you at any time.\n3. Remember your humble origins — you were originated from dust and a drop of fluid.\n4. Acknowledge that the ability to originate ideas (creativity) is a tiny reflection of Al-Mubdi's gift to you.",
                'dhikr_reflection'        => 'Think of a new chapter you are trying to start in your life (a new habit, a new job, repentance from an old sin). Recite "Ya Mubdi" 40 times. Ask the Originator to bless this new beginning and make it a source of khayr (goodness) for your life.',
            ],

            // ─────────────────────────────────────────────────
            // #59 — Al-Mu'id | الْمُعِيدُ | The Restorer
            // ─────────────────────────────────────────────────
            'al-muid' => [
                'quran_reference'         => 'Surah Yunus (10:4)',
                'quran_verse_arabic'      => 'إِنَّهُ يَبْدَأُ الْخَلْقَ ثُمَّ يُعِيدُهُ',
                'quran_verse_translation' => 'Indeed, He begins the [process of] creation and then repeats it.',
                'explanation'             => 'Al-Mu\'id is the Restorer, the One who brings back. Just as He originated creation (Al-Mubdi), He will restore it to life after death. He repeats creation continuously — restoring the dead earth with rain, restoring health after sickness, and ultimately restoring our bodies on the Day of Resurrection. Al-Mu\'id is the promise that death and loss are not final; restoration is a divine guarantee.',
                'virtues'                 => 'Reciting "Ya Mu\'id" is historically practiced for the safe return of lost items, lost people, or even lost faith. It brings hope to those who have lost something precious, reminding them that the Restorer can bring it back in this life or the next.',
                'practical_lessons'       => "1. When you lose something, say \"Inna lillahi wa inna ilayhi raji'un\"; trust Al-Mu'id to restore it or replace it.\n2. Live with absolute certainty in the Resurrection; you will be restored.\n3. If your faith fades, ask Al-Mu'id to restore it to its former strength.\n4. Do not despair over broken health or broken wealth; He is the Master of restoration.",
                'dhikr_reflection'        => 'Bring to mind a state of faith or a blessing that you have lost and wish to get back. Recite "Ya Mu\'id" 70 times. Ask Allah to restore what was lost, or to restore your heart with peace if the loss was His decree.',
            ],

            // ─────────────────────────────────────────────────
            // #60 — Al-Muhyi | الْمُحْيِي | The Giver of Life
            // ─────────────────────────────────────────────────
            'al-muhyi' => [
                'quran_reference'         => 'Surah Ar-Rum (30:50)',
                'quran_verse_arabic'      => 'فَانظُرْ إِلَىٰ آثَارِ رَحْمَتِ اللَّهِ كَيْفَ يُحْيِي الْأَرْضَ بَعْدَ مَوْتِهَا ۚ إِنَّ ذَٰلِكَ لَمُحْيِي الْمَوْتَىٰ',
                'quran_verse_translation' => 'So observe the effects of the mercy of Allah - how He gives life to the earth after its lifelessness. Indeed, that [same one] will give life to the dead.',
                'explanation'             => 'Al-Muhyi is the Giver of Life. He grants biological life to bodies, spiritual life to hearts through faith, and intellectual life to minds through knowledge. Just as He brings dead, barren land to life with rain, He brings dead hearts to life with the Quran. Life is solely in His hands; doctors can treat, but only Al-Muhyi can breathe life.',
                'virtues'                 => 'Reciting "Ya Muhyi" brings spiritual vitality to a deadened, depressed heart. It is recited for healing from severe illness. The Prophet ﷺ taught us to say upon waking: "Alhamdulillahil-ladhi ahyana..." (Praise be to Allah who gave us life...).',
                'practical_lessons'       => "1. Enliven your heart with the Quran; it is the rain for the soul sent by Al-Muhyi.\n2. Do not take waking up for granted; it is a daily gift of life from Al-Muhyi.\n3. Strive to bring \"life\" to others — through charity, teaching, or simply a smile.\n4. When dealing with severe illness, rely on Al-Muhyi first, and medical treatment second.",
                'dhikr_reflection'        => 'Place your fingers on your pulse. Feel the rhythm of life in your veins. That beat is sustained exclusively by Al-Muhyi. Recite "Ya Muhyi" 33 times. Ask Him to not only keep your body alive, but to make your heart truly alive with His love.',
            ],

            // ─────────────────────────────────────────────────
            // #61 — Al-Mumit | اَلْمُمِيتُ | The Taker of Life
            // ─────────────────────────────────────────────────
            'al-mumit' => [
                'quran_reference'         => 'Surah Al-Muminun (23:80)',
                'quran_verse_arabic'      => 'وَهُوَ الَّذِي يُحْيِي وَيُمِيتُ وَلَهُ اخْتِلَافُ اللَّيْلِ وَالنَّهَارِ',
                'quran_verse_translation' => 'And it is He who gives life and causes death, and His is the alternation of the night and the day.',
                'explanation'             => 'Al-Mumit is the Creator of Death, the Destroyer. Just as life is a creation of Allah, so is death. "He who created death and life to test you" (67:2). Al-Mumit determines the exact moment, place, and cause of every creature\'s death. He also causes the "death" of the ego (nafs) when a believer submits fully. Death is not a random accident; it is the precise decree of Al-Mumit.',
                'virtues'                 => 'Reflecting on Al-Mumit destroys the love of dunya and cures the fear of created things. Reciting "Ya Mumit" is historically practiced to subdue one\'s own ego and harmful desires, "putting to death" the base inclinations of the soul.',
                'practical_lessons'       => "1. Remember death often; it is the \"destroyer of pleasures\" and the ultimate reality check.\n2. Put to death your bad habits and ego before biological death reaches you.\n3. Do not fear enemies; they cannot cause your death unless Al-Mumit has decreed it.\n4. Live a life of purpose, knowing that Al-Mumit has set an exact expiration date on your time here.",
                'dhikr_reflection'        => 'Imagine the moment your soul will be taken. Are you ready for what comes next? Recite "Ya Mumit" 33 times. Ask Allah to put to death your love for the temporary world and your harmful desires, and to grant you a good ending (Husn al-Khatimah).',
            ],

            // ─────────────────────────────────────────────────
            // #62 — Al-Hayy | الْحَيُّ | The Ever Living One
            // ─────────────────────────────────────────────────
            'al-hayy' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:255) [Ayatul Kursi]',
                'quran_verse_arabic'      => 'اللَّهُ لَا إِلَٰهَ إِلَّا هُوَ الْحَيُّ الْقَيُّومُ',
                'quran_verse_translation' => 'Allah - there is no deity except Him, the Ever-Living, the Sustainer of [all] existence.',
                'explanation'             => 'Al-Hayy is the Ever-Living, the One whose life is perfect, eternal, and without beginning or end. Every other life is borrowed, fragile, and destined for death. Allah\'s life requires no sustenance, no sleep, and no maintenance. "And rely upon the Ever-Living who does not die" (25:58). Because He is perfectly alive, all His other attributes (Hearing, Seeing, Power) are also perfect.',
                'virtues'                 => 'The combination of "Ya Hayyu Ya Qayyum" is considered by many scholars to be the Greatest Name of Allah (Ism al-A\'zam). The Prophet ﷺ would call upon these names when he was severely distressed: "Ya Hayyu Ya Qayyum, bi-rahmatika astaghith" (O Ever-Living, O Sustainer, by Your mercy I seek help).',
                'practical_lessons'       => "1. Rely only on the Ever-Living; anyone else you rely on will eventually die or fail you.\n2. Use the du'a \"Ya Hayyu Ya Qayyum\" when you are in desperate need of rescue.\n3. Connect your temporary life to the Ever-Living to give your actions eternal value.\n4. Do not grieve excessively over those who die; they have returned to the Ever-Living.",
                'dhikr_reflection'        => 'Think of a distress that makes you feel helpless. Recite "Ya Hayyu Ya Qayyum, bi-rahmatika astaghith" 40 times. Feel the shift in your heart as you transfer your reliance from weak, dying creation to the Perfect, Ever-Living Creator.',
            ],

            // ─────────────────────────────────────────────────
            // #63 — Al-Qayyum | الْقَيُّومُ | The Self-Existing One
            // ─────────────────────────────────────────────────
            'al-qayyum' => [
                'quran_reference'         => 'Surah Taha (20:111)',
                'quran_verse_arabic'      => 'وَعَنَتِ الْوُجُوهُ لِلْحَيِّ الْقَيُّومِ',
                'quran_verse_translation' => 'And [all] faces will be humbled before the Ever-Living, the Sustainer of existence.',
                'explanation'             => 'Al-Qayyum is the Sustainer, the Self-Subsisting. He exists entirely without need of anything, yet absolutely everything depends on Him to exist for even a millisecond. If Al-Qayyum withdrew His sustaining power for a moment, the universe would collapse into nothingness. He does not sleep or slumber (2:255) because His constant attention is required to sustain reality.',
                'virtues'                 => 'Reciting "Ya Qayyum" removes lethargy, laziness, and heedlessness. When combined with Al-Hayy, it is the ultimate appeal to Allah\'s essence. Calling upon Al-Qayyum reminds the believer that Allah is actively managing their life right now.',
                'practical_lessons'       => "1. Acknowledge your absolute dependence on Allah for every breath and heartbeat.\n2. Do not be arrogant; you are not self-sustaining, you are entirely dependent.\n3. When you are exhausted from managing your affairs, hand them over to Al-Qayyum.\n4. Stand in Qiyam (night prayer) to emulate a fraction of the vigilance associated with this name.",
                'dhikr_reflection'        => 'Visualize the earth spinning in space, the stars holding their places, and your own cells functioning perfectly. None of it is on autopilot; Al-Qayyum is holding it all. Recite "Ya Qayyum" 33 times, resting in the comfort that the universe, and your life, is in capable hands.',
            ],

            // ─────────────────────────────────────────────────
            // #64 — Al-Wajid | الْوَاجِدُ | The Finder
            // ─────────────────────────────────────────────────
            'al-wajid' => [
                'quran_reference'         => 'Surah Ad-Duha (93:7)',
                'quran_verse_arabic'      => 'وَوَجَدَكَ ضَالًّا فَهَدَىٰ',
                'quran_verse_translation' => 'And He found you lost and guided [you].',
                'explanation'             => 'Al-Wajid is the Finder, the Resourceful, the One who lacks nothing. He finds whatever He wants, whenever He wants. Nothing can hide from Him, and He is never incapable of retrieving what He seeks. It also means the Rich One who possesses all things. When you lose something, Al-Wajid is the one who knows its exact location and can return it to you.',
                'virtues'                 => 'Reciting "Ya Wajid" is historically practiced to find lost items, or to find a lost sense of direction in life. It builds the heart\'s richness (ghina), making a person feel they lack nothing because they have Allah.',
                'practical_lessons'       => "1. If you have Allah, you have lost nothing; if you lose Allah, you have gained nothing.\n2. Do not despair when you are \"lost\" in life; Al-Wajid can always find you and guide you.\n3. Seek richness of the heart, not just richness of the pocket.\n4. Trust that whatever you need, Al-Wajid possesses it and can bring it to you.",
                'dhikr_reflection'        => 'Think of a time you felt completely lost — spiritually, emotionally, or directionally — and Allah guided you back. Recite "Ya Wajid" 33 times, thanking Him for finding you when you were wandering, and asking Him to always keep you on His path.',
            ],

            // ─────────────────────────────────────────────────
            // #65 — Al-Maajid | الْمَاجِدُ | The Glorious
            // ─────────────────────────────────────────────────
            'al-maajid' => [
                'quran_reference'         => 'Surah Al-Buruj (85:15)',
                'quran_verse_arabic'      => 'ذُو الْعَرْشِ الْمَجِيدُ',
                'quran_verse_translation' => 'Honorable Owner of the Throne.',
                'explanation'             => 'Al-Maajid (similar to Al-Majeed) is the Glorious, the Noble, the Magnificent. While Al-Majeed refers to the abundance of His glory and majesty, Al-Maajid emphasizes His inherent nobility and the beautiful way He treats His creation. He is noble in His forgiveness, glorious in His giving, and magnificent in His patience. His glory is perfect and untarnished by the sins of humanity.',
                'virtues'                 => 'Reciting "Ya Maajid" purifies the heart and grants the reciter a noble character. It is recited to attain honor in this world and the next, by attaching oneself to the Source of all nobility.',
                'practical_lessons'       => "1. Act with nobility (majd) in your dealings with others; do not be petty or vindictive.\n2. Recognize that true glory belongs to Allah alone; human glory is an illusion.\n3. Praise Allah abundantly using the Salawat (Durood) to connect with His majesty.\n4. Do not demean yourself with sins; you are a servant of The Glorious.",
                'dhikr_reflection'        => 'Reflect on a time you acted pettily or held a grudge. Recite "Ya Maajid" 33 times. Ask Allah to elevate your character, to make you noble and magnanimous in how you treat those who have wronged you, reflecting a tiny sliver of His glory.',
            ],

            // ─────────────────────────────────────────────────
            // #66 — Al-Wahid | الْواحِدُ | The Only One
            // ─────────────────────────────────────────────────
            'al-wahid' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:163)',
                'quran_verse_arabic'      => 'وَإِلَٰهُكُمْ إِلَٰهٌ وَاحِدٌ',
                'quran_verse_translation' => 'And your god is one God.',
                'explanation'             => 'Al-Wahid is the One, the Unique, the Indivisible. He is One in His essence (having no partners), One in His attributes (none is like Him), and One in His actions (He alone creates and sustains). The entire message of Islam (Tawheed) revolves around this name. Recognizing Al-Wahid means recognizing that there is no other source of power, no other being worthy of worship, and no other ultimate reality.',
                'virtues'                 => 'Reciting "Ya Wahid" cures the heart of associating partners with Allah (shirk) — both obvious shirk and hidden shirk (like doing deeds for showing off). It unifies a distracted, fragmented mind, bringing it to single-minded focus on the Creator.',
                'practical_lessons'       => "1. Unify your intentions; do everything for Al-Wahid alone, not for the praise of people.\n2. Do not fear multiple enemies or problems; they are all under the control of the One.\n3. Recite Surah Al-Ikhlas frequently, as it is the pure definition of His Oneness.\n4. Let the Oneness of Allah unify your life, bringing all your scattered goals under the umbrella of His pleasure.",
                'dhikr_reflection'        => 'Think of how scattered your mind and heart are — worrying about this person\'s opinion, that financial problem, this future event. Recite "Ya Wahid" 100 times. With each repetition, gather your scattered concerns and surrender them all to the One.',
            ],

            // ─────────────────────────────────────────────────
            // #67 — Al-Ahad | اَلاَحَدُ | The One
            // ─────────────────────────────────────────────────
            'al-ahad' => [
                'quran_reference'         => 'Surah Al-Ikhlas (112:1)',
                'quran_verse_arabic'      => 'قُلْ هُوَ اللَّهُ أَحَدٌ',
                'quran_verse_translation' => 'Say, "He is Allah, [who is] One,"',
                'explanation'             => 'Al-Ahad is the Absolute One. While "Wahid" means one (as opposed to two or three), "Ahad" implies a uniqueness that cannot even be counted or compared. It is a more intense, exclusive oneness. He has no second, no equal, no parent, and no offspring. Bilal (RA) famously chanted "Ahad, Ahad" while being tortured, drawing strength from the absolute, incomparable Oneness of Allah against the multiplicity of idols.',
                'virtues'                 => 'Reciting Surah Al-Ikhlas (which centers on Al-Ahad) is equal to one-third of the Quran. Calling upon Allah by "Al-Ahad" is part of the Greatest Name. It grants unshakeable fortitude in the face of oppression or overwhelming odds.',
                'practical_lessons'       => "1. Stand firm on Tawheed (monotheism) even if the whole world stands against you.\n2. Remember Bilal (RA); let the oneness of Allah be your strength in severe trials.\n3. Do not compare Allah to anything in creation; He is Ahad (Incomparable).\n4. Seek your unique, individual relationship with the Absolute One.",
                'dhikr_reflection'        => 'Visualize Bilal (RA) under the burning rock in the desert, his body crushed but his soul soaring as he whispered "Ahad, Ahad." Recite "Ahad, Ahad" 33 times yourself, asking Allah to grant you a fraction of that unshakeable, pure faith in His Oneness.',
            ],

            // ─────────────────────────────────────────────────
            // #68 — As-Samad | الصَّمَدُ | The Satisfier of All Needs
            // ─────────────────────────────────────────────────
            'as-samad' => [
                'quran_reference'         => 'Surah Al-Ikhlas (112:2)',
                'quran_verse_arabic'      => 'اللَّهُ الصَّمَدُ',
                'quran_verse_translation' => 'Allah, the Eternal Refuge.',
                'explanation'             => 'As-Samad is the Eternal Refuge, the Self-Sufficient Master whom all creatures need, but who needs no one. He does not eat, drink, or sleep. Every atom in the universe turns to As-Samad for its existence and needs. A "Samad" in Arabic is the chief to whom everyone turns in times of crisis, and who never turns anyone away. Allah is the ultimate Samad — the only true refuge when all worldly doors close.',
                'virtues'                 => 'The Prophet ﷺ heard a man make du\'a saying: "O Allah, I ask You by virtue of the fact that You are Allah, the One, As-Samad..." The Prophet ﷺ said: "He has asked Allah by His Greatest Name, which if He is asked by it, He gives, and if He is supplicated by it, He answers." (Tirmidhi)',
                'practical_lessons'       => "1. Turn to As-Samad first in times of need, before you turn to people.\n2. Reduce your dependencies on worldly things to emulate a shadow of His self-sufficiency.\n3. Be a refuge for people in need, helping them for the sake of Allah.\n4. Memorize and regularly use the du'a containing this name (mentioned above) for your most urgent needs.",
                'dhikr_reflection'        => 'Identify the person or thing you lean on most heavily for emotional or financial support. Now imagine it being removed. Recite "Ya Samad" 50 times, training your heart to lean entirely on the Eternal Refuge who will never die and never fail you.',
            ],

            // ─────────────────────────────────────────────────
            // #69 — Al-Qadir | الْقَادِرُ | The All Powerful
            // ─────────────────────────────────────────────────
            'al-qadir' => [
                'quran_reference'         => 'Surah Al-An\'am (6:65)',
                'quran_verse_arabic'      => 'قُلْ هُوَ الْقَادِرُ عَلَىٰ أَن يَبْعَثَ عَلَيْكُمْ عَذَابًا',
                'quran_verse_translation' => 'Say, "He is the [one] Able to send upon you affliction..."',
                'explanation'             => 'Al-Qadir is the Capable, the All-Powerful. He has the absolute ability to do whatever He wills, whenever He wills, however He wills. Nothing in the heavens or earth can frustrate His ability. His power is not theoretical; it is actively demonstrating its capability at every moment in the precise functioning of the universe. When Allah decrees a thing, He simply says "Be," and it is.',
                'virtues'                 => 'Reciting "Ya Qadir" gives strength to overcome seemingly impossible obstacles. When you are faced with a situation that defies human logic or capability, calling on Al-Qadir reminds you that Divine capability operates outside the bounds of physics and probability.',
                'practical_lessons'       => "1. Never say a situation is \"impossible\"; it may be impossible for you, but not for Al-Qadir.\n2. When making du'a, ask for big things, fully believing He is capable of granting them.\n3. Do not be arrogant about your own abilities; your capability is borrowed from Al-Qadir.\n4. Find peace in knowing that Al-Qadir is fully capable of protecting you from harm.",
                'dhikr_reflection'        => 'Think of an obstacle in your life that seems totally impossible to overcome — a financial mountain, a terminal illness, a broken relationship. Recite "Ya Qadir" 100 times. With each repetition, remind yourself that the One who created the universe from nothing is fully capable of removing this obstacle instantly.',
            ],

            // ─────────────────────────────────────────────────
            // #70 — Al-Muqtadir | الْمُقْتَدِرُ | The Creator of All Power
            // ─────────────────────────────────────────────────
            'al-muqtadir' => [
                'quran_reference'         => 'Surah Al-Qamar (54:42)',
                'quran_verse_arabic'      => 'فَأَخَذْنَاهُمْ أَخْذَ عَزِيزٍ مُّقْتَدِرٍ',
                'quran_verse_translation' => '...so We seized them with a seizure of one Exalted in Might and Perfect in Ability.',
                'explanation'             => 'Al-Muqtadir is the Omnipotent, the Creator of All Power. While Al-Qadir means He has the ability, Al-Muqtadir implies that He actively exercises this perfect power over everything. He determines the exact measure, extent, and limits of all power in the universe. The power of a king, a storm, or an atomic bomb are all dictated and contained by Al-Muqtadir.',
                'virtues'                 => 'Reciting "Ya Muqtadir" upon waking up is said to help one manage their daily affairs with competence and success. It is the name invoked by those who feel completely overwhelmed by the forces of life, bringing their heart back to the Ultimate Source of control.',
                'practical_lessons'       => "1. Recognize that whoever has power over you only has it because Al-Muqtadir allowed it.\n2. Use whatever power or influence you have justly, knowing you will answer to the Omnipotent.\n3. When overwhelmed by the forces of nature or society, seek refuge in Al-Muqtadir.\n4. Do not abuse your authority over those weaker than you.",
                'dhikr_reflection'        => 'Bring to mind a powerful force that intimidates you (a corrupt government, a severe disease, a powerful individual). Recite "Ya Muqtadir" 33 times. Realize that this force is like a puppet on a string, and Al-Muqtadir holds the string.',
            ],

            // ─────────────────────────────────────────────────
            // #71 — Al-Muqaddim | الْمُقَدِّمُ | The Expediter
            // ─────────────────────────────────────────────────
            'al-muqaddim' => [
                'quran_reference'         => 'Surah Qaf (50:28)',
                'quran_verse_arabic'      => 'قَالَ لَا تَخْتَصِمُوا لَدَيَّ وَقَدْ قَدَّمْتُ إِلَيْكُم بِالْوَعِيدِ',
                'quran_verse_translation' => '[Allah] will say, "Do not dispute before Me, while I had already presented to you the warning."',
                'explanation'             => 'Al-Muqaddim is the Expediter, the One who brings forward. He brings forward whom He wills in status, in time, and in provision. He brought forward the Prophet Muhammad ﷺ above all other prophets. He brings forward certain events in our lives according to His wisdom. Whenever someone achieves a high rank in faith or society, it is because Al-Muqaddim has brought them forward.',
                'virtues'                 => 'The Prophet ﷺ used to say in his du\'a: "Antal-Muqaddimu wa Antal-Mu\'akhkhir" (You are the One who brings forward and You are the One who delays). Reciting "Ya Muqaddim" helps a person advance in their spiritual journey and achieve success in their righteous endeavors.',
                'practical_lessons'       => "1. Ask Al-Muqaddim to bring you forward in piety, knowledge, and closeness to Him.\n2. Do not be jealous if someone else is brought forward in worldly success; it is His decree.\n3. Rush to do good deeds, seeking to be \"brought forward\" on the Day of Judgment.\n4. When you want a halal project to succeed quickly, invoke Al-Muqaddim.",
                'dhikr_reflection'        => 'Identify a spiritual goal you have been procrastinating on (e.g., praying on time, giving charity, forgiving someone). Recite "Ya Muqaddim" 33 times, asking Allah to bring this good deed forward in your life, removing your laziness and hesitation.',
            ],

            // ─────────────────────────────────────────────────
            // #72 — Al-Mu'akhkhir | الْمُؤَخِّرُ | The Delayer
            // ─────────────────────────────────────────────────
            'al-muakhkhir' => [
                'quran_reference'         => 'Surah Ibrahim (14:42)',
                'quran_verse_arabic'      => 'إِنَّمَا يُؤَخِّرُهُمْ لِيَوْمٍ تَشْخَصُ فِيهِ الْأَبْصَارُ',
                'quran_verse_translation' => 'He only delays them for a Day when eyes will stare [in horror].',
                'explanation'             => 'Al-Mu\'akhkhir is the Delayer, the One who puts back. Just as He brings things forward, He delays things according to His perfect wisdom. He delays the punishment of the oppressors to give them time to repent (or to multiply their sins). He delays the answer to a du\'a because the timing is not yet right. Understanding Al-Mu\'akhkhir cures impatience and the frustration of waiting.',
                'virtues'                 => 'Calling upon Al-Mu\'akhkhir brings patience (sabr) to a restless heart. It helps the believer understand that a delay is not a denial. The Prophet ﷺ paired this name with Al-Muqaddim in his night prayers, recognizing Allah\'s absolute control over timing.',
                'practical_lessons'       => "1. When your du'a is delayed, trust the wisdom of Al-Mu'akhkhir; the timing is perfect.\n2. Do not mistake the delay of Allah's punishment for an approval of your sins.\n3. Delay your anger and desires for the sake of Allah.\n4. Do not rush what Allah has delayed, for trying to force His timing only brings hardship.",
                'dhikr_reflection'        => 'Think of something you have been waiting for anxiously (a job, a spouse, a child, a resolution). Feel the frustration of the wait. Now recite "Ya Mu\'akhkhir" 40 times. Submit to His timing. Tell Him: "You delayed this for a reason, and I trust Your reason more than my desire."',
            ],

            // ─────────────────────────────────────────────────
            // #73 — Al-Awwal | الأوَّلُ | The First
            // ─────────────────────────────────────────────────
            'al-awwal' => [
                'quran_reference'         => 'Surah Al-Hadid (57:3)',
                'quran_verse_arabic'      => 'هُوَ الْأَوَّلُ وَالْآخِرُ وَالظَّاهِرُ وَالْبَاطِنُ',
                'quran_verse_translation' => 'He is the First and the Last, the Ascendant and the Intimate.',
                'explanation'             => 'Al-Awwal is the First, the One whose existence has no beginning. Before there was time, space, or creation, there was Allah. Everything else in existence was preceded by non-existence, except Al-Awwal. Because He is the First, He is the original cause of all things, the Provider of all blessings, and the One to whom all primary devotion is due.',
                'virtues'                 => 'The Prophet ﷺ explained this name saying: "O Allah, You are the First, there is nothing before You..." (Muslim). Reciting "Ya Awwal" helps one start new endeavors with success, and reminds the heart that Allah must be the first priority in life.',
                'practical_lessons'       => "1. Make Allah your first thought when you wake up, and your first priority in every decision.\n2. Acknowledge that every blessing you have originated from Al-Awwal, not your own effort.\n3. Be the \"first\" to do good deeds, to forgive, and to offer salam.\n4. When dealing with root causes of problems, turn to the First Cause to fix them.",
                'dhikr_reflection'        => 'Look at any blessing you have (your car, your home, your family). Trace it back. Your job bought the car, your boss gave you the job, your degree got you the boss... trace it all the way back until you reach the Origin. Recite "Ya Awwal" 33 times, attributing all success to the First.',
            ],

            // ─────────────────────────────────────────────────
            // #74 — Al-Akhir | الآخِرُ | The Last
            // ─────────────────────────────────────────────────
            'al-akhir' => [
                'quran_reference'         => 'Surah Al-Hadid (57:3)',
                'quran_verse_arabic'      => 'هُوَ الْأَوَّلُ وَالْآخِرُ وَالظَّاهِرُ وَالْبَاطِنُ',
                'quran_verse_translation' => 'He is the First and the Last, the Ascendant and the Intimate.',
                'explanation'             => 'Al-Akhir is the Last, the One whose existence has no end. When all of creation perishes and the universe is destroyed, Al-Akhir will remain. "Everyone upon the earth will perish, and there will remain the Face of your Lord" (55:26-27). He is the ultimate destination to which all things return. Relying on Al-Akhir means building for eternity, not for the temporary world.',
                'virtues'                 => 'The Prophet ﷺ prayed: "...and You are the Last, there is nothing after You." Reciting "Ya Akhir" detaches the heart from the love of the temporary world (dunya) and attaches it to the eternal Hereafter (Akhirah). It is a profound cure for grief over worldly losses.',
                'practical_lessons'       => "1. Do not obsess over accumulating worldly wealth; it will perish, only Al-Akhir remains.\n2. Ensure your ultimate goal and final intention in every action is for Allah, the Last.\n3. Make your last deeds your best deeds, praying for a good ending (Husn al-Khatimah).\n4. Seek comfort in Al-Akhir when you lose a loved one, knowing you will all return to Him.",
                'dhikr_reflection'        => 'Imagine the end of the world. The stars falling, the mountains crumbling, every living thing passing away. Complete silence. Only Al-Akhir remains. Recite "Ya Akhir" 33 times. Ask Him to make your final destination Jannah, close to Him, the only eternal reality.',
            ],

            // ─────────────────────────────────────────────────
            // #75 — Az-Zahir | الظَّاهِرُ | The Manifest One
            // ─────────────────────────────────────────────────
            'az-zahir' => [
                'quran_reference'         => 'Surah Al-Hadid (57:3)',
                'quran_verse_arabic'      => 'هُوَ الْأَوَّلُ وَالْآخِرُ وَالظَّاهِرُ وَالْبَاطِنُ',
                'quran_verse_translation' => 'He is the First and the Last, the Ascendant (Manifest) and the Intimate.',
                'explanation'             => 'Az-Zahir is the Manifest, the Ascendant, the Evident. He is manifest through His signs, His creation, and His attributes. Though we cannot see Him with physical eyes, His existence is the most obvious and apparent reality in the universe. The design of a leaf, the laws of physics, the human conscience — all scream the existence of Az-Zahir. The Prophet ﷺ said: "...You are the Manifest, there is nothing above You."',
                'virtues'                 => 'Reciting "Ya Zahir" grants clarity of vision and understanding. It opens the inner eyes to see the signs of Allah in the physical world. It also grants victory over enemies, as Az-Zahir means the Ascendant who is above all creation.',
                'practical_lessons'       => "1. Look for the signs of Allah in nature, science, and history; He is Manifest in them all.\n2. Do not demand physical proof of Allah when the intellectual and spiritual proofs are overwhelmingly evident.\n3. Live a transparent life; do not be a hypocrite whose outward actions contradict their inward state.\n4. Call upon Az-Zahir when the truth of a matter is hidden and you need it made clear.",
                'dhikr_reflection'        => 'Look closely at a complex object around you — a flower, your fingerprint, or even the sky. Contemplate its intelligent design. Recite "Ya Zahir" 50 times. With each recitation, acknowledge that the Creator is vividly manifest and evident in the perfection of His creation.',
            ],

            // ─────────────────────────────────────────────────
            // #76 — Al-Batin | الْبَاطِنُ | The Hidden One
            // ─────────────────────────────────────────────────
            'al-batin' => [
                'quran_reference'         => 'Surah Al-Hadid (57:3)',
                'quran_verse_arabic'      => 'هُوَ الْأَوَّلُ وَالْآخِرُ وَالظَّاهِرُ وَالْبَاطِنُ ۖ وَهُوَ بِكُلِّ شَيْءٍ عَلِيمٌ',
                'quran_verse_translation' => 'He is the First and the Last, the Ascendant and the Intimate (Hidden). And He is, of all things, Knowing.',
                'explanation'             => 'Al-Batin is the Hidden, the Intimate, the One who cannot be perceived by the physical senses. While Az-Zahir means His existence is obvious through His creation, Al-Batin means His essence is veiled from human sight in this world. It also means He is the Intimate One who knows the deepest, most hidden secrets of the heart. "There is nothing nearer to you than Him."',
                'virtues'                 => 'Reciting "Ya Batin" is historically practiced to purify the heart from hidden diseases like envy and showing off (riya\'). It helps the believer develop sincerity (ikhlas), knowing that Al-Batin sees what no one else sees.',
                'practical_lessons'       => "1. Purify your hidden intentions; Al-Batin cares more about your heart than your outward actions.\n2. Do not judge others by their outward appearance; their hidden state is known only to Al-Batin.\n3. Keep some of your good deeds hidden to build a secret relationship with Him.\n4. When you feel misunderstood by people, take comfort that Al-Batin understands you perfectly.",
                'dhikr_reflection'        => 'Close your eyes. Think of a secret fear, hope, or pain that you have never spoken aloud to anyone. Recite "Ya Batin" 33 times. Feel the comfort of knowing that the Hidden One is intimately aware of your hidden feelings, and you do not need to explain them to Him.',
            ],

            // ─────────────────────────────────────────────────
            // #77 — Al-Wali | الْوَالِي | The Governor
            // ─────────────────────────────────────────────────
            'al-waali' => [
                'quran_reference'         => 'Surah Ar-Ra\'d (13:11)',
                'quran_verse_arabic'      => 'وَمَا لَهُم مِّن دُونِهِ مِن وَالٍ',
                'quran_verse_translation' => '...and there is not for them besides Him any patron (governor).',
                'explanation'             => 'Al-Waali (with a long "a", distinct from Al-Wali #55) is the Governor, the Sole Manager. A "waali" in Arabic is the governor of a province who manages all its affairs, dispenses justice, and protects its borders. Allah is the Supreme Governor of the entire universe. Every atom, every planet, and every human life is under His direct administration and management.',
                'virtues'                 => 'Recognizing Al-Waali brings a sense of order to a chaotic life. Reciting "Ya Waali" is traditionally advised for those in positions of leadership to seek divine help in governing their families, businesses, or communities justly.',
                'practical_lessons'       => "1. Submit to the governance of Al-Waali in your daily life by following His laws.\n2. If you are in a position of authority, govern with justice, knowing you are a representative of The Governor.\n3. Do not stress over the administration of the universe; it has a Perfect Manager.\n4. Ask Al-Waali to manage your affairs when your life feels out of control.",
                'dhikr_reflection'        => 'Look at an area of your life that feels chaotic or unmanageable right now. Recite "Ya Waali" 33 times. Hand over the management of this chaotic situation to the Supreme Governor, asking Him to bring order and peace to it.',
            ],

            // ─────────────────────────────────────────────────
            // #78 — Al-Muta'ali | الْمُتَعَالِي | The Most Exalted
            // ─────────────────────────────────────────────────
            'al-mutaali' => [
                'quran_reference'         => 'Surah Ar-Ra\'d (13:9)',
                'quran_verse_arabic'      => 'عَالِمُ الْغَيْبِ وَالشَّهَادَةِ الْكَبِيرُ الْمُتَعَالِ',
                'quran_verse_translation' => '[He is] Knower of the unseen and the witnessed, the Grand, the Exalted.',
                'explanation'             => 'Al-Muta\'ali is the Supremely Exalted, the One who is elevated far beyond any attributes of creation. He is exalted above any flaw, any limit, and any human comprehension. No matter how great we imagine Allah to be, He is Muta\'ali (infinitely higher). He is exalted above the falsehoods attributed to Him by those who associate partners with Him.',
                'virtues'                 => 'Reciting "Ya Muta\'ali" instills deep humility and cures arrogance. It reminds the believer of their smallness in comparison to the Supremely Exalted. It is a powerful name to invoke when one feels overwhelmed by the arrogance of people in power.',
                'practical_lessons'       => "1. Whenever you achieve success, say \"Allahu Akbar\" to remind yourself that He is the Exalted.\n2. Lower your gaze and your ego; arrogance does not befit a servant of Al-Muta'ali.\n3. Exalt Allah in your speech by constantly saying \"SubhanAllah\" (Glory be to Allah).\n4. Do not let the grandeur of worldly kings intimidate you; they are nothing before The Exalted.",
                'dhikr_reflection'        => 'Go into Sujood (prostration), placing your forehead on the ground. In this lowest physical position, recite "Subhana Rabbiyal-A\'la" (Glory to my Lord, the Most High) followed by "Ya Muta\'ali" 10 times. Feel the contrast between your lowliness and His ultimate exaltation.',
            ],

            // ─────────────────────────────────────────────────
            // #79 — Al-Barr | الْبَرُّ | The Source of All Goodness
            // ─────────────────────────────────────────────────
            'al-barr' => [
                'quran_reference'         => 'Surah At-Tur (52:28)',
                'quran_verse_arabic'      => 'إِنَّا كُنَّا مِن قَبْلُ نَدْعُوهُ ۖ إِنَّهُ هُوَ الْبَرُّ الرَّحِيمُ',
                'quran_verse_translation' => 'Indeed, we used to supplicate Him before. Indeed, it is He who is the Beneficent (Source of Goodness), the Merciful.',
                'explanation'             => 'Al-Barr is the Source of all goodness, the Beneficent, the Gentle. "Birr" in Arabic implies expansive goodness, kindness, and fulfilling promises. Allah is Al-Barr because His goodness encompasses all creation. He is kind even to the rebellious, giving them air, water, and time to repent. He multiplies the reward for a good deed by ten, but writes a bad deed as only one — this is from His "Birr".',
                'virtues'                 => 'Reciting "Ya Barr" softens the heart and makes one gentle towards others. It is highly recommended to recite this name for the well-being and spiritual protection of one\'s children, as Al-Barr is the ultimate source of gentle care.',
                'practical_lessons'       => "1. Show \"Birr\" (goodness/kindness) to your parents; it is the highest form of goodness in Islam.\n2. Be expansive in your charity and kindness, reflecting the nature of Al-Barr.\n3. Trust that Allah's intentions toward you are always rooted in absolute goodness.\n4. Never lose hope in His kindness, even when you make mistakes.",
                'dhikr_reflection'        => 'Think of a time Allah treated you with immense gentleness when you actually deserved punishment or hardship. Recite "Ya Barr" 33 times, allowing your heart to melt with gratitude for His expansive, unearned goodness.',
            ],

            // ─────────────────────────────────────────────────
            // #80 — At-Tawwab | التَّوَّابُ | The Acceptor of Repentance
            // ─────────────────────────────────────────────────
            'at-tawwab' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:37)',
                'quran_verse_arabic'      => 'فَتَلَقَّىٰ آدَمُ مِن رَّبِّهِ كَلِمَاتٍ فَتَابَ عَلَيْهِ ۚ إِنَّهُ هُوَ التَّوَّابُ الرَّحِيمُ',
                'quran_verse_translation' => 'Then Adam received from his Lord [some] words, and He accepted his repentance. Indeed, it is He who is the Accepting of repentance, the Merciful.',
                'explanation'             => 'At-Tawwab is the Oft-Returning, the Acceptor of Repentance. "Tawbah" literally means to return. Allah is At-Tawwab because He constantly returns to His servants with forgiveness when they return to Him in repentance. He does not just accept repentance once; He accepts it repeatedly, endlessly, every time the servant sincerely turns back, no matter how many times they break their promise.',
                'virtues'                 => 'Reciting "Ya Tawwab" is the ultimate cure for the despair caused by repeated sinning. The Prophet ﷺ would repent to Allah over 100 times a day. Calling on At-Tawwab facilitates the ability to make sincere repentance.',
                'practical_lessons'       => "1. Never say \"Allah will not forgive me this time\"; At-Tawwab loves those who repeatedly repent.\n2. Accept the apologies of people who wrong you; be \"returning\" in your own forgiveness.\n3. Make \"Istighfar\" a daily habit, not just something you do after a major sin.\n4. When you slip, do not run away from Allah; run back to Him immediately.",
                'dhikr_reflection'        => 'Bring to mind a sin you struggle with repeatedly, one that makes you feel hypocritical. Recite "Ya Tawwab" 100 times. With each repetition, visualize yourself turning your face away from the sin and returning it back to the One whose door is always open.',
            ],

            // ─────────────────────────────────────────────────
            // #81 — Al-Muntaqim | الْمُنْتَقِمُ | The Avenger
            // ─────────────────────────────────────────────────
            'al-muntaqim' => [
                'quran_reference'         => 'Surah As-Sajdah (32:22)',
                'quran_verse_arabic'      => 'وَمَنْ أَظْلَمُ مِمَّن ذُكِّرَ بِآيَاتِ رَبِّهِ ثُمَّ أَعْرَضَ عَنْهَا ۚ إِنَّا مِنَ الْمُجْرِمِينَ مُنتَقِمُونَ',
                'quran_verse_translation' => 'And who is more unjust than one who is reminded of the verses of his Lord; then he turns away from them? Indeed We, from the criminals, will take retribution (revenge).',
                'explanation'             => 'Al-Muntaqim is the Avenger, the Exacting, the One who takes retribution. He does not seek revenge out of anger or petty emotion, but out of perfect justice. When tyrants oppress the weak, and the weak have no one to defend them, Al-Muntaqim steps in. He delays His retribution to give time for repentance, but when He strikes the stubborn oppressors, His retribution is severe and exact.',
                'virtues'                 => 'Understanding Al-Muntaqim brings profound comfort to the victims of injustice. It prevents the believer from taking the law into their own hands, trusting that the Ultimate Avenger will ensure no ounce of oppression goes unpunished.',
                'practical_lessons'       => "1. If you are oppressed, make du'a; the du'a of the oppressed goes straight to Al-Muntaqim.\n2. Do not seek personal revenge; hand the matter over to Allah's perfect justice.\n3. Beware of oppressing anyone (your spouse, your employee), lest Al-Muntaqim take retribution on their behalf.\n4. Balance your hope in His mercy with a healthy fear of His retribution.",
                'dhikr_reflection'        => 'Think of a situation where you or someone else was severely wronged and unable to get justice. Recite "Ya Muntaqim" 33 times, not out of malice, but to find peace in handing the case over to the Supreme Judge who never lets the oppressor escape.',
            ],

            // ─────────────────────────────────────────────────
            // #82 — Al-Afuww | الْعَفُوُّ | The Pardoner
            // ─────────────────────────────────────────────────
            'al-afuww' => [
                'quran_reference'         => 'Surah An-Nisa (4:149)',
                'quran_verse_arabic'      => 'إِن تُبْدُوا خَيْرًا أَوْ تُخْفُوهُ أَوْ تَعْفُوا عَن سُوءٍ فَإِنَّ اللَّهَ كَانَ عَفُوًّا قَدِيرًا',
                'quran_verse_translation' => 'If [instead] you show [some] good or conceal it or pardon an offense - indeed, Allah is ever Pardoning and Competent.',
                'explanation'             => 'Al-Afuww is the Pardoner, the Effacer of sins. While Al-Ghaffar (The Forgiver) covers the sin so others do not see it, Al-Afuww completely erases the sin from the record as if it never happened. "Afuww" literally means the wind that blows across the desert, completely erasing the footprints. On the Day of Judgment, a pardoned sin will not even be mentioned or questioned.',
                'virtues'                 => 'This is the specific name to invoke on Laylatul Qadr (The Night of Decree). Aisha (RA) asked the Prophet ﷺ what to say if she caught the night. He said: "Allahumma innaka Afuwwun, tuhibbul-afwa, fa\'fu anni" (O Allah, You are the Pardoner, You love to pardon, so pardon me).',
                'practical_lessons'       => "1. Beg for \"Afaf\" (pardon) so your sins are completely wiped from your record.\n2. Pardon people who wrong you; Allah loves to pardon those who pardon others.\n3. Recite the du'a of Laylatul Qadr frequently, especially in the last 10 nights of Ramadan.\n4. Do not hold grudges; let the wind of forgiveness wipe away the footprints of pain.",
                'dhikr_reflection'        => 'Think of a person who has wronged you, whose apology you have refused to accept. Recite "Allahumma innaka Afuwwun tuhibbul-afwa fa\'fu anni" 33 times. Realize that if you want Allah to completely erase your massive sins, you must be willing to erase the small offenses of others.',
            ],

            // ─────────────────────────────────────────────────
            // #83 — Ar-Ra'uf | الرَّؤُوفُ | The Most Kind
            // ─────────────────────────────────────────────────
            'ar-rauf' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:143)',
                'quran_verse_arabic'      => 'إِنَّ اللَّهَ بِالنَّاسِ لَرَءُوفٌ رَّحِيمٌ',
                'quran_verse_translation' => 'Indeed Allah is, to the people, Kind and Merciful.',
                'explanation'             => 'Ar-Ra\'uf is the Most Kind, the Most Compassionate. While Rahma (mercy) can sometimes involve putting a person through hardship for their own good (like a bitter medicine), Ra\'fa (compassion/kindness) is mercy without any pain. It is an intense, tender affection. Allah is Ar-Ra\'uf because He warns us of the Fire, He makes the religion easy (not burdensome), and He treats our weaknesses with extreme gentleness.',
                'virtues'                 => 'Reciting "Ya Ra\'uf" brings immense gentleness to one\'s character. It is invoked when seeking relief from severe hardship, asking Allah to bypass the "bitter medicine" of trials and deal with us using pure, painless kindness.',
                'practical_lessons'       => "1. Be \"Ra'uf\" (tender and kind) to children, the elderly, and animals.\n2. Appreciate the ease of Islam (e.g., praying sitting down if sick); this is from His Ra'fa.\n3. Do not be harsh in advising others; adopt the gentleness of Ar-Ra'uf.\n4. When tested, ask Allah to deal with you through His Ra'fa, not just His justice.",
                'dhikr_reflection'        => 'Consider how harshly you often judge yourself for your mistakes. Now consider the tender, pure kindness of Ar-Ra\'uf. Recite "Ya Ra\'uf" 33 times. Let His divine tenderness melt away your harshness, both toward yourself and toward others.',
            ],

            // ─────────────────────────────────────────────────
            // #84 — Malik-ul-Mulk | مَالِكُ الْمُلْكِ | The Owner of All Sovereignty
            // ─────────────────────────────────────────────────
            'malik-ul-mulk' => [
                'quran_reference'         => 'Surah Ali \'Imran (3:26)',
                'quran_verse_arabic'      => 'قُلِ اللَّهُمَّ مَالِكَ الْمُلْكِ تُؤْتِي الْمُلْكَ مَن تَشَاءُ وَتَنزِعُ الْمُلْكَ مِمَّن تَشَاءُ',
                'quran_verse_translation' => 'Say, "O Allah, Owner of Sovereignty, You give sovereignty to whom You will and You take sovereignty away from whom You will..."',
                'explanation'             => 'Malik-ul-Mulk is the Owner of All Sovereignty, the Master of the Kingdom. Every king, CEO, president, or landlord only has temporary, borrowed ownership. Allah owns the kingdom and He owns the kings. He does whatever He wishes in His kingdom, and no one can question His decree. He grants authority to test people, and strips it away to humble them.',
                'virtues'                 => 'Reciting "Ya Malik-ul-Mulk" detaches the heart from the illusion of worldly power and ownership. The Prophet ﷺ taught that making du\'a with this verse (3:26) is a powerful way to relieve massive debts, as you are asking the Owner of all wealth to intervene.',
                'practical_lessons'       => "1. Do not act arrogantly about your house, car, or job title; you are just a temporary custodian.\n2. Submit to the decrees of the Owner; He has the right to do what He wills with His property (you).\n3. Use whatever authority you have been given to serve Him, before it is taken away.\n4. When facing debt, recite Surah Ali 'Imran 3:26 and ask the True Owner to assist you.",
                'dhikr_reflection'        => 'Look at the things you consider "yours" (your phone, your house, your children). Say out loud: "This belongs to Malik-ul-Mulk." Recite "Ya Malik-ul-Mulk" 33 times. Feel the anxiety of ownership lift off your shoulders as you realize you are merely a custodian.',
            ],

            // ─────────────────────────────────────────────────
            // #85 — Zul-Jalali-wal-Ikram | ذُو الْجَلَالِ وَالْإِكْرَامِ | Lord of Majesty and Bounty
            // ─────────────────────────────────────────────────
            'zul-jalali-wal-ikram' => [
                'quran_reference'         => 'Surah Ar-Rahman (55:27)',
                'quran_verse_arabic'      => 'وَيَبْقَىٰ وَجْهُ رَبِّكَ ذُو الْجَلَالِ وَالْإِكْرَامِ',
                'quran_verse_translation' => 'And there will remain the Face of your Lord, Owner of Majesty and Honor.',
                'explanation'             => 'Zul-Jalali-wal-Ikram is the Possessor of Majesty and Honor. This majestic name combines two concepts: "Jalal" (Majesty/Awe/Might) which makes us fear and respect Him, and "Ikram" (Bounty/Honor/Generosity) which makes us love and hope in Him. He is terrifying in His majesty, yet endlessly generous in His bounty. We worship Him balancing between profound awe and profound love.',
                'virtues'                 => 'The Prophet ﷺ said, "Be constant with: Ya Dhal-Jalali wal-Ikram" (Tirmidhi). He instructed us to repeat it frequently in our du\'as. Whenever the Prophet ﷺ finished his prayer, he would say: "Allahumma antas-salam... tabarakta ya Dhal-Jalali wal-Ikram." (O Allah... Blessed are You, O Possessor of Majesty and Honor).',
                'practical_lessons'       => "1. Balance your faith between fear (Jalal) and hope (Ikram).\n2. Include this beautiful phrase frequently in your personal du'as.\n3. Honor Allah by obeying Him, and He will honor (Ikram) you in this world and the next.\n4. When you witness the terrifying power of nature (storms, earthquakes), remember His Jalal.",
                'dhikr_reflection'        => 'Sit quietly and alternate between two thoughts: the terrifying vastness of the universe (Jalal) and the delicate sweetness of the fruit you ate today (Ikram). Recite "Ya Dhal-Jalali wal-Ikram" 33 times, feeling your heart balance perfectly between awe and love.',
            ],

            // ─────────────────────────────────────────────────
            // #86 — Al-Muqsit | الْمُقْسِطُ | The Equitable One
            // ─────────────────────────────────────────────────
            'al-muqsit' => [
                'quran_reference'         => 'Surah Al-Anbiya (21:47)',
                'quran_verse_arabic'      => 'وَنَضَعُ الْمَوَازِينَ الْقِسْطَ لِيَوْمِ الْقِيَامَةِ فَلَا تُظْلَمُ نَفْسٌ شَيْئًا',
                'quran_verse_translation' => 'And We place the scales of justice for the Day of Resurrection, so no soul will be treated unjustly at all.',
                'explanation'             => 'Al-Muqsit is the Equitable, the Just. While Al-\'Adl is the One who is absolutely Just, Al-Muqsit implies the One who implements equity and fairness, even satisfying the wronged party. If someone wrongs you, Al-Muqsit will ensure you get your rights back on the Day of Judgment. Remarkably, He is so Equitable that He may even provide the oppressor with enough blessings to give to the oppressed, thereby satisfying both parties.',
                'virtues'                 => 'Reciting "Ya Muqsit" cures the heart of bias and helps one judge fairly. The Prophet ﷺ said: "The just (Al-Muqsitun) will be on pulpits of light on the right hand of the Merciful... those who are just in their ruling, their families, and all that they are responsible for." (Muslim)',
                'practical_lessons'       => "1. Be fair (muqsit) in treating your children, your spouses, and your employees equally.\n2. Do not let hatred of a people prevent you from being just (Quran 5:8).\n3. Trust that any unfairness you experience in this world will be perfectly balanced by Al-Muqsit.\n4. Stand up for equity and justice in society.",
                'dhikr_reflection'        => 'Examine your life for any area where you are playing favorites (with children, employees, or friends). Recite "Ya Muqsit" 33 times. Ask the Equitable One to help you remove bias from your heart and act with pure fairness in all your dealings.',
            ],

            // ─────────────────────────────────────────────────
            // #87 — Al-Jami' | الْجَامِعُ | The Gatherer
            // ─────────────────────────────────────────────────
            'al-jami' => [
                'quran_reference'         => 'Surah Ali \'Imran (3:9)',
                'quran_verse_arabic'      => 'رَبَّنَا إِنَّكَ جَامِعُ النَّاسِ لِيَوْمٍ لَّا رَيْبَ فِيهِ',
                'quran_verse_translation' => 'Our Lord, surely You will gather the people for a Day about which there is no doubt.',
                'explanation'             => 'Al-Jami\' is the Gatherer, the Assembler. He gathers dissimilar things together to create harmony (like gathering the soul and the body, or oxygen and hydrogen to make water). He gathers the hearts of the believers in love. Ultimately, He is the One who will gather all of humanity — from Adam to the last person — in one place on the Day of Judgment for accountability.',
                'virtues'                 => 'Reciting "Ya Jami\'" is traditionally practiced to find lost items, or to reunite loved ones who have been separated. It is also recited to gather one\'s scattered thoughts and regain mental focus and concentration.',
                'practical_lessons'       => "1. Live every day preparing for the ultimate Gathering on the Day of Judgment.\n2. Be a \"gatherer\" of people; unite families and communities rather than dividing them.\n3. Ask Al-Jami' to gather your heart upon faith, preventing your desires from scattering you.\n4. When you lose something, pray: \"O Gatherer of people on a Day about which there is no doubt, gather me with my lost item.\"",
                'dhikr_reflection'        => 'If you feel disconnected from someone you love, or if your mind feels completely scattered and unable to focus, recite "Ya Jami\'" 100 times. Ask the Gatherer to unite your heart with your loved ones, and to gather your thoughts upon His remembrance.',
            ],

            // ─────────────────────────────────────────────────
            // #88 — Al-Ghani | الْغَنِيُّ | The Rich One
            // ─────────────────────────────────────────────────
            'al-ghani' => [
                'quran_reference'         => 'Surah Muhammad (47:38)',
                'quran_verse_arabic'      => 'وَاللَّهُ الْغَنِيُّ وَأَنتُمُ الْفُقَرَاءُ',
                'quran_verse_translation' => '...And Allah is the Free of need (the Rich), while you are the needy.',
                'explanation'             => 'Al-Ghani is the Self-Sufficient, the Absolutely Rich. He has no needs whatsoever. He does not need our prayers, our charity, or our belief; we need them. If the entire world became saints, it would not add to His kingdom, and if they all became sinners, it would not subtract from it. He is rich in His essence, completely independent of all His creation.',
                'virtues'                 => 'Reciting "Ya Ghani" cures the heart of the fear of poverty. It builds "Ghina al-Nafs" (richness of the soul), which the Prophet ﷺ defined as true wealth. It detaches the heart from begging creation and attaches it to the Creator.',
                'practical_lessons'       => "1. Acknowledge your absolute poverty (faqir) before the Absolute Richness (Ghani) of Allah.\n2. Do not worship Allah doing Him a \"favor\"; your worship is a need of your own soul.\n3. Seek true wealth in contentment, not in the accumulation of things.\n4. Give charity freely, knowing you are dealing with The Rich One who will multiply it.",
                'dhikr_reflection'        => 'Visualize yourself standing empty-handed, a beggar at the door of a King who owns the universe. Recite "Ya Ghani" 100 times. Embrace your absolute poverty before Him, and feel the immense relief that your provider is entirely self-sufficient and infinitely rich.',
            ],

            // ─────────────────────────────────────────────────
            // #89 — Al-Mughni | الْمُغْنِي | The Enricher
            // ─────────────────────────────────────────────────
            'al-mughni' => [
                'quran_reference'         => 'Surah An-Najm (53:48)',
                'quran_verse_arabic'      => 'وَأَنَّهُ هُوَ أَغْنَىٰ وَأَقْنَىٰ',
                'quran_verse_translation' => 'And that it is He who enriches and suffices.',
                'explanation'             => 'Al-Mughni is the Enricher, the Bestower of Wealth. While Al-Ghani refers to His own internal richness, Al-Mughni refers to His action of enriching His creation. He grants material wealth to whom He wills to test them, and He grants spiritual wealth (contentment and faith) to whom He loves. He enriches the mind with knowledge, the heart with tranquility, and the body with health.',
                'virtues'                 => 'Reciting "Ya Mughni" is historically practiced by those facing financial distress or seeking lawful sustenance. More importantly, it is invoked to seek spiritual enrichment — asking Allah to make the heart so rich in faith that it desires nothing but Him.',
                'practical_lessons'       => "1. When you seek a job or financial stability, ask Al-Mughni, not just the employer.\n2. Do not look down on the poor; the One who enriched you can easily enrich them.\n3. Seek spiritual enrichment first; material wealth without a rich heart is a curse.\n4. Give zakat and sadaqah to actively participate in Al-Mughni's system of enriching others.",
                'dhikr_reflection'        => 'Identify a specific area where you feel impoverished (lack of money, lack of patience, lack of knowledge). Recite "Ya Mughni" 40 times. Ask the Enricher to fill that empty space in your life from His endless treasury, in a way that brings you closer to Him.',
            ],

            // ─────────────────────────────────────────────────
            // #90 — Al-Mani' | الْمَانِعُ | The Preventer of Harm
            // ─────────────────────────────────────────────────
            'al-mani' => [
                'quran_reference'         => 'Surah Al-Mulk (67:21)',
                'quran_verse_arabic'      => 'أَمَّنْ هَٰذَا الَّذِي يَرْزُقُكُمْ إِنْ أَمْسَكَ رِزْقَهُ',
                'quran_verse_translation' => 'Or who is it that could provide for you if He withheld His provision?',
                'explanation'             => 'Al-Mani\' is the Preventer, the Withholder, the Defender. He prevents harm from reaching His servants by intercepting accidents and calamities. Conversely, He may withhold (prevent) wealth, a specific job, or a marriage from a person because He knows it would cause them spiritual or physical harm. His withholding is actually a form of His protection and mercy.',
                'virtues'                 => 'The Prophet ﷺ used to say after every prayer: "O Allah, none can prevent what You give, and none can give what You prevent." Reciting "Ya Mani\'" is a powerful shield against harm, magic, and the plots of enemies.',
                'practical_lessons'       => "1. When a door is slammed in your face (a job rejection, a broken engagement), say Alhamdulillah; Al-Mani' just protected you.\n2. Use the Prophet's du'a mentioned above to acknowledge His ultimate control.\n3. Do not try to force a matter that Allah has clearly withheld.\n4. Trust that His \"No\" is often a disguised \"I am protecting you.\"",
                'dhikr_reflection'        => 'Think of a time you desperately wanted something, you prayed for it, but Allah prevented it from happening. Looking back now, can you see the bullet you dodged? Recite "Ya Mani\'" 33 times, thanking Him for the times His loving prevention saved you from your own desires.',
            ],

            // ─────────────────────────────────────────────────
            // #91 — Ad-Darr | الضَّارُّ | The Creator of The Harmful
            // ─────────────────────────────────────────────────
            'ad-darr' => [
                'quran_reference'         => 'Surah Al-An\'am (6:17)',
                'quran_verse_arabic'      => 'وَإِن يَمْسَسْكَ اللَّهُ بِضُرٍّ فَلَا كَاشِفَ لَهُ إِلَّا هُوَ',
                'quran_verse_translation' => 'And if Allah should touch you with adversity, there is no remover of it except Him.',
                'explanation'             => 'Ad-Darr is the Afflicter, the Creator of the Harmful. In Islam, both good and adversity originate from Allah\'s decree. He creates adversity (illness, loss, trials) to test faith, to cleanse sins, or to wake a person up from heedlessness. Adversity is a tool of the Divine Surgeon; it hurts, but its purpose is ultimately to heal and save the patient. (Often paired with An-Nafi\').',
                'virtues'                 => 'Recognizing Ad-Darr removes the fear of creation. If all of humanity gathered to harm you, they could not, unless Ad-Darr decreed it. Reciting this name paired with An-Nafi\' brings absolute Tawakkul (trust), realizing that all pain and pleasure are in His hands alone.',
                'practical_lessons'       => "1. When affliction strikes, do not complain to creation; take your pain directly to the Creator of the affliction.\n2. View hardships as bitter medicine prescribed by a Loving Doctor.\n3. Fear Allah alone; do not fear curses, magic, or enemies, as they have no independent power to harm.\n4. Repent when affliction hits, as it is often meant to redirect you to the Straight Path.",
                'dhikr_reflection'        => 'Focus on a current physical or emotional pain in your life. Understand that this pain did not bypass Allah\'s permission; He allowed it for your growth. Recite "Ya Darr" 10 times, followed immediately by "Ya Nafi\'" (The Benefiter). Surrender to the pain as a purification, not a punishment.',
            ],

            // ─────────────────────────────────────────────────
            // #92 — An-Nafi' | النَّافِعُ | The Benefiter
            // ─────────────────────────────────────────────────
            'an-nafi' => [
                'quran_reference'         => 'Surah Al-An\'am (6:17)',
                'quran_verse_arabic'      => 'وَإِن يَمْسَسْكَ بِخَيْرٍ فَهُوَ عَلَىٰ كُلِّ شَيْءٍ قَدِيرٌ',
                'quran_verse_translation' => '...And if He touches you with good - then He is over all things competent.',
                'explanation'             => 'An-Nafi\' is the Benefiter, the Source of Good. Every single benefit, advantage, profit, or good health that reaches you comes directly from An-Nafi\'. Food only benefits the body because He allows it; medicine only cures because He makes it beneficial. He is the ultimate source of all utility and goodness in the universe.',
                'virtues'                 => 'Reciting "Ya Nafi\'" is historically practiced before embarking on a new business, taking medicine, or starting a journey, asking Allah to place benefit and success in the endeavor. It cures the heart of relying on the "means" rather than the "Creator of the means".',
                'practical_lessons'       => "1. Before you take medicine, say Bismillah; the pill is just dust, An-Nafi' is the cure.\n2. Strive to be a \"Nafi'\" (beneficial) person to others; the Prophet ﷺ said the best of people are those most beneficial to people.\n3. Thank An-Nafi' for the invisible benefits working inside your body right now.\n4. When starting a study session, ask An-Nafi' to make the knowledge beneficial (Ilman Nafi'an).",
                'dhikr_reflection'        => 'Hold a glass of water. Realize that this water cannot quench your thirst unless An-Nafi\' gives it the ability to benefit you. Drink it, say Alhamdulillah, and recite "Ya Nafi\'" 33 times, asking Him to make everything you consume beneficial for your body and soul.',
            ],

            // ─────────────────────────────────────────────────
            // #93 — An-Nur | النُّورُ | The Light
            // ─────────────────────────────────────────────────
            'an-nur' => [
                'quran_reference'         => 'Surah An-Nur (24:35)',
                'quran_verse_arabic'      => 'اللَّهُ نُورُ السَّمَاوَاتِ وَالْأَرْضِ',
                'quran_verse_translation' => 'Allah is the Light of the heavens and the earth.',
                'explanation'             => 'An-Nur is the Light. He is the Creator of physical light (the sun, stars) which illuminates the eyes, and the Creator of spiritual light (faith, the Quran, prophecy) which illuminates the heart. Without An-Nur, the universe is absolute physical darkness, and the soul is in absolute spiritual darkness. He guides whom He wills to His Light.',
                'virtues'                 => 'Reciting "Ya Nur" brings illumination to the face and the heart. The Prophet ﷺ used to make a profound du\'a: "O Allah, place light in my heart, light in my sight, light in my hearing... make me light." Reciting this name dispels the darkness of depression and confusion.',
                'practical_lessons'       => "1. Read the Quran daily; it is described as a Light that will guide you out of dark situations.\n2. Guard your prayers; the Prophet ﷺ said \"The prayer is a light.\"\n3. Lower your gaze from haram, and An-Nur will grant you \"firasa\" (spiritual insight/light).\n4. Memorize and recite the Prophet's du'a for light.",
                'dhikr_reflection'        => 'Sit in a dark room. Feel the disorientation of darkness. Now turn on a small lamp. Notice how quickly the darkness vanishes. Recite "Ya Nur" 100 times. Ask the Ultimate Light to illuminate the dark corners of your mind, your grave, and your path across the Sirat (the bridge).',
            ],

            // ─────────────────────────────────────────────────
            // #94 — Al-Hadi | الْهَادِي | The Guide
            // ─────────────────────────────────────────────────
            'al-hadi' => [
                'quran_reference'         => 'Surah Al-Hajj (22:54)',
                'quran_verse_arabic'      => 'وَإِنَّ اللَّهَ لَهَادِ الَّذِينَ آمَنُوا إِلَىٰ صِرَاطٍ مُّسْتَقِيمٍ',
                'quran_verse_translation' => '...And indeed, Allah is the Guide of those who have believed to a straight path.',
                'explanation'             => 'Al-Hadi is the Guide. He guides animals to their migration routes, babies to their mother\'s milk, and human hearts to the truth of Islam. Guidance is solely in His hands; even the Prophet ﷺ could not guide those he loved if Allah did not decree it (28:56). Al-Hadi provides the map (the Quran), the compass (the intellect), and the internal pull (Fitrah) to find Him.',
                'virtues'                 => 'We ask Al-Hadi for guidance at least 17 times a day in Surah Al-Fatiha: "Ihdinas-Siratal-Mustaqim" (Guide us to the straight path). Reciting "Ya Hadi" is powerful for someone feeling lost in life, facing a difficult decision, or seeking guidance for a straying loved one.',
                'practical_lessons'       => "1. Never take your faith for granted; it is a gift from Al-Hadi that can be lost if not cherished.\n2. When making a tough choice, pray Istikhara and trust Al-Hadi to guide your heart.\n3. Do not despair over a family member who doesn't practice; their guidance is in the hands of Al-Hadi.\n4. Be a gentle guide for others to Islam, acting as a signpost for Al-Hadi.",
                'dhikr_reflection'        => 'Think of a major crossroads you are facing right now where you don\'t know which way to turn. Recite "Ihdinas-Siratal-Mustaqim" 10 times, followed by "Ya Hadi" 33 times. Relax your mind, trusting that the Ultimate Guide will steer your heart to the right decision.',
            ],

            // ─────────────────────────────────────────────────
            // #95 — Al-Badi' | الْبَدِيعُ | The Incomparable
            // ─────────────────────────────────────────────────
            'al-badi' => [
                'quran_reference'         => 'Surah Al-Baqarah (2:117)',
                'quran_verse_arabic'      => 'بَدِيعُ السَّمَاوَاتِ وَالْأَرْضِ',
                'quran_verse_translation' => 'Originator (Incomparable Creator) of the heavens and the earth.',
                'explanation'             => 'Al-Badi\' is the Incomparable, the Originator of beauty. "Bid\'ah" means something completely unprecedented. Allah is Al-Badi\' because He created the universe without any prior blueprint, model, or prototype. His creation is stunningly beautiful and entirely original. Furthermore, He is Incomparable in His essence — there is absolutely nothing like Him in existence.',
                'virtues'                 => 'Reciting "Ya Badi\' as-samawati wal-ard" (O Originator of the heavens and earth) is considered one of the ways to invoke the Greatest Name of Allah. It opens the doors of divine inspiration, creativity, and solutions to seemingly unsolvable, unprecedented problems.',
                'practical_lessons'       => "1. Look at the stunning variety of flowers, galaxies, and faces; marvel at the art of Al-Badi'.\n2. Avoid \"Bid'ah\" (innovation) in religion; the religion is complete. But use innovation in worldly sciences to benefit humanity.\n3. When faced with a problem you've never seen before, ask Al-Badi' for a unique solution.\n4. Acknowledge that any creativity you possess is just a spark from the Originator of creativity.",
                'dhikr_reflection'        => 'Look closely at your own fingerprint. It is entirely unique; never before seen in human history, never to be repeated. It was designed instantly by Al-Badi\'. Recite "Ya Badi\' as-samawati wal-ard" 33 times, asking Him to beautifully arrange your affairs in a way you could never have imagined.',
            ],

            // ─────────────────────────────────────────────────
            // #96 — Al-Baqi | الْبَاقِي | The Ever Enduring
            // ─────────────────────────────────────────────────
            'al-baqi' => [
                'quran_reference'         => 'Surah Taha (20:73)',
                'quran_verse_arabic'      => 'وَاللَّهُ خَيْرٌ وَأَبْقَىٰ',
                'quran_verse_translation' => '...And Allah is better and more enduring.',
                'explanation'             => 'Al-Baqi is the Ever-Enduring, the Everlasting. Everything in this physical universe is subject to decay, aging, and eventual death. Mountains erode, stars burn out, and empires fall. But Al-Baqi remains forever, unchanged and unaffected by time. He is the only constant. Good deeds done for His sake are called "Al-Baqiyat As-Salihat" (the enduring good deeds) because they survive death and last for eternity.',
                'virtues'                 => 'Reciting "Ya Baqi" brings immense comfort to those grieving the loss of loved ones or the loss of youth and health. It anchors the soul, shifting its attachment from things that decay to the One who endures forever.',
                'practical_lessons'       => "1. Do not break your heart over losing worldly things; they were designed to expire.\n2. Invest your time in \"Al-Baqiyat As-Salihat\" (SubhanAllah, Alhamdulillah, La ilaha illallah, Allahu Akbar).\n3. Remember that youth and beauty fade; invest in the beauty of your enduring soul.\n4. Seek eternal life in Jannah, where Al-Baqi will grant you a life that never ends.",
                'dhikr_reflection'        => 'Reflect on a physical object you loved as a child that is now broken, lost, or decayed. That is the nature of the world. Now recite "SubhanAllahi walhamdulillahi wa la ilaha illallahu wallahu Akbar" 10 times. These words are "Baqiyat" — they are being stored for you permanently with Al-Baqi.',
            ],

            // ─────────────────────────────────────────────────
            // #97 — Al-Warith | الْوَارِثُ | The Inheritor
            // ─────────────────────────────────────────────────
            'al-warith' => [
                'quran_reference'         => 'Surah Al-Hijr (15:23)',
                'quran_verse_arabic'      => 'وَإِنَّا لَنَحْنُ نُحْيِي وَنُمِيتُ وَنَحْنُ الْوَارِثُونَ',
                'quran_verse_translation' => 'And indeed, it is We who give life and cause death, and We are the Inheritor.',
                'explanation'             => 'Al-Warith is the Ultimate Inheritor. We claim ownership over our houses, bank accounts, and lands in this world. But when we die, we leave it all behind. Eventually, all humans will die, the earth will be emptied, and everything will return to its original, true Owner. On the Day of Judgment, Allah will call out: "To whom belongs the dominion today?" and He will answer Himself: "To Allah, the One, the Prevailing" (40:16).',
                'virtues'                 => 'The Prophet Zakariya (AS) made du\'a using this name when he was childless: "My Lord, do not leave me alone, while You are the best of inheritors" (21:89). Reciting "Ya Warith" is powerful when seeking righteous children, and it cures the heart of hoarding wealth.',
                'practical_lessons'       => "1. Write your will (wasiyyah); recognize that your wealth is just passing through your hands.\n2. Do not fight bitterly over inheritance; you will soon leave it behind for Al-Warith anyway.\n3. If you struggle with infertility, use the du'a of Zakariya (AS) mentioned in the Quran.\n4. Build a legacy of good deeds (sadaqah jariyah) that will inherit reward for you after you die.",
                'dhikr_reflection'        => 'Look at the most expensive thing you own. Visualize the day when you are in the grave, and someone else is using it. Recite "Ya Warith" 33 times. Detach your heart from the illusion of ownership, and happily return the trust to the Ultimate Inheritor.',
            ],

            // ─────────────────────────────────────────────────
            // #98 — Ar-Rashid | الرَّشِيدُ | The Guide to the Right Path
            // ─────────────────────────────────────────────────
            'ar-rashid' => [
                'quran_reference'         => 'Surah Al-Kahf (18:10)',
                'quran_verse_arabic'      => 'رَبَّنَا آتِنَا مِن لَّدُنكَ رَحْمَةً وَهَيِّئْ لَنَا مِنْ أَمْرِنَا رَشَدًا',
                'quran_verse_translation' => 'Our Lord, grant us from Yourself mercy and prepare for us from our affair right guidance.',
                'explanation'             => 'Ar-Rashid is the Guide to the Right Path, the Unerring Director. While Al-Hadi means the Guide, Ar-Rashid emphasizes the wisdom and flawless execution of that guidance. He directs all affairs to their correct destination without needing advice or consultation. He guides the believer to make the wisest, most mature (rushd) decisions, steering them away from foolishness and ruin.',
                'virtues'                 => 'Reciting "Ya Rashid" is highly recommended when one is confused, lacks wisdom, or is trying to make a difficult decision. The youth of the Cave (Ashab al-Kahf) prayed for "Rashad" (right guidance) when they fled to the cave, and Allah guided their steps perfectly.',
                'practical_lessons'       => "1. Seek \"Rushd\" (maturity and wisdom) in your actions, not just emotional reactions.\n2. When starting a new project, pray the du'a of the Cave (18:10) for unerring direction.\n3. Trust that Allah's plan for you is Rashid (perfectly directed), even if it looks confusing now.\n4. Ask Ar-Rashid to guide the leaders of the community to make wise decisions.",
                'dhikr_reflection'        => 'Think of a past decision you made purely on emotion that led to regret. Now think of an upcoming decision. Recite the du\'a: "Rabbana atina min ladunka rahmatan wa hayyi\' lana min amrina rashada" 7 times. Ask Ar-Rashid to bless you with the maturity to act with wisdom.',
            ],

            // ─────────────────────────────────────────────────
            // #99 — As-Sabur | الصَّبُورُ | The Patient One
            // ─────────────────────────────────────────────────
            'as-sabur' => [
                'quran_reference'         => 'Surah Fatir (35:45)',
                'quran_verse_arabic'      => 'وَلَوْ يُؤَاخِذُ اللَّهُ النَّاسَ بِمَا كَسَبُوا مَا تَرَكَ عَلَىٰ ظَهْرِهَا مِن دَابَّةٍ وَلَٰكِن يُؤَخِّرُهُمْ إِلَىٰ أَجَلٍ مُّسَمًّى',
                'quran_verse_translation' => 'And if Allah were to impose blame on the people for what they have earned, He would not leave upon the earth any creature. But He delays them for a specified term.',
                'explanation'             => 'As-Sabur is the Patient, the Timeless. He does not rush to punish the sinners, nor does He hasten to judge. People curse Him, deny Him, and disobey Him daily, yet He continues to feed them, give them sunlight, and grant them time to repent. His patience is absolute; He is never frustrated by delays, because He is the Master of Time. He delays retribution not out of weakness, but out of immense forbearance.',
                'virtues'                 => 'Reciting "Ya Sabur" pours patience into the heart of the believer during severe trials, grief, or anger. The Prophet ﷺ said: "No one is more patient over the harm they hear than Allah..." (Bukhari). Invoking this name calms the urge to rush outcomes.',
                'practical_lessons'       => "1. If As-Sabur is patient with your massive sins, you must be patient with the small faults of others.\n2. Do not rush your du'as; As-Sabur answers in the perfect time, not your rushed time.\n3. When anger boils inside you, remember the patience of Allah, and hold your tongue.\n4. In times of deep grief, say \"Sabrun Jameel\" (beautiful patience) and lean on As-Sabur.",
                'dhikr_reflection'        => 'Reflect on a person who constantly tests your patience and makes you want to snap. Now reflect on how many times you have disobeyed Allah, yet He did not snap at you. Recite "Ya Sabur" 100 times, breathing slowly. Let the Divine Patience cool the fire of your anger and frustration.',
            ],

        ];
    }
}
