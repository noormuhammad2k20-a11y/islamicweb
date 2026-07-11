<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\HadithTopic;
use App\Models\Hadith;
use App\Models\HadithNarrator;
use App\Models\HadithCollection;

class AuthenticHadithSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Wipe existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hadith_hadith_topic')->truncate();
        Hadith::truncate();
        HadithTopic::truncate();
        HadithNarrator::truncate();
        HadithCollection::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Create Collections
        $bukhari = HadithCollection::create(['name_en' => 'Sahih Bukhari', 'name_ar' => 'صحيح البخاري', 'slug' => 'sahih-bukhari', 'reliability' => 'Sahih (Most Authentic)', 'introduction' => 'The most authentic book after the Quran.', 'compiler' => 'Imam Al-Bukhari', 'history' => 'Compiled over 16 years, containing over 7,000 hadiths.']);
        $muslim = HadithCollection::create(['name_en' => 'Sahih Muslim', 'name_ar' => 'صحيح مسلم', 'slug' => 'sahih-muslim', 'reliability' => 'Sahih (Most Authentic)', 'introduction' => 'The second most authentic book of Hadith.', 'compiler' => 'Imam Muslim ibn al-Hajjaj', 'history' => 'Considered by some scholars to be the best organized collection.']);
        $abudawud = HadithCollection::create(['name_en' => 'Sunan Abu Dawud', 'name_ar' => 'سنن أبي داود', 'slug' => 'sunan-abu-dawud', 'reliability' => 'Varies (Mostly Authentic)', 'introduction' => 'A primary source of Islamic jurisprudence.', 'compiler' => 'Imam Abu Dawud', 'history' => 'Contains around 4,800 hadiths carefully selected from 500,000.']);

        // 3. Create Narrators
        $abuHurairah = HadithNarrator::create(['name_en' => 'Abu Hurairah (RA)', 'name_ar' => 'أبو هريرة', 'slug' => 'abu-hurairah', 'biography' => 'The most prolific narrator of hadith in Sunni Islam.', 'birth' => '603 CE', 'death' => '681 CE', 'status' => 'Companion', 'companion' => true]);
        $umar = HadithNarrator::create(['name_en' => 'Umar bin Al-Khattab (RA)', 'name_ar' => 'عمر بن الخطاب', 'slug' => 'umar-bin-al-khattab', 'biography' => 'The second Caliph of Islam.', 'birth' => '584 CE', 'death' => '644 CE', 'status' => 'Companion (Caliph)', 'companion' => true]);
        $aisha = HadithNarrator::create(['name_en' => 'Aisha (RA)', 'name_ar' => 'عائشة', 'slug' => 'aisha', 'biography' => 'Wife of the Prophet and a great scholar.', 'birth' => '613 CE', 'death' => '678 CE', 'status' => 'Companion (Mother of Believers)', 'companion' => true]);

        // 4. Create Topics
        $topicsData = [
            ['slug' => 'brotherhood-unity', 'name' => 'Brotherhood & Unity', 'ar' => 'الأخوة والوحدة', 'intro' => 'Islam emphasizes strong bonds of brotherhood and unity among Muslims.'],
            ['slug' => 'business-halal', 'name' => 'Business & Halal Earnings', 'ar' => 'التجارة والكسب الحلال', 'intro' => 'Honesty, fair trade, and halal earnings are highly rewarded in Islam.'],
            ['slug' => 'character-manners', 'name' => 'Character & Manners', 'ar' => 'الأخلاق والآداب', 'intro' => 'Good character (Akhlaq) is the heaviest deed on the scales.'],
            ['slug' => 'death-afterlife', 'name' => 'Death & Afterlife', 'ar' => 'الموت والآخرة', 'intro' => 'Preparation for the Hereafter is the ultimate goal of a believer.'],
            ['slug' => 'dua-dhikr', 'name' => 'Dua & Dhikr', 'ar' => 'الدعاء والذكر', 'intro' => 'Remembering Allah brings peace to the heart.'],
            ['slug' => 'faith-iman', 'name' => 'Faith (Iman)', 'ar' => 'الإيمان', 'intro' => 'Belief in Allah and His messengers is the foundation of Islam.'],
            ['slug' => 'family-marriage', 'name' => 'Family & Marriage', 'ar' => 'الأسرة والزواج', 'intro' => 'Marriage is half of faith and the bedrock of a strong society.'],
            ['slug' => 'prayer-salah', 'name' => 'Prayer (Salah)', 'ar' => 'الصلاة', 'intro' => 'The second pillar of Islam and the first thing a person is questioned about.'],
            ['slug' => 'sins-to-avoid', 'name' => 'Sins to Avoid', 'ar' => 'الذنوب التي يجب تجنبها', 'intro' => 'Avoiding major sins is crucial for spiritual salvation.'],
            ['slug' => 'hajj-umrah', 'name' => 'Hajj & Umrah', 'ar' => 'الحج والعمرة', 'intro' => 'The fifth pillar of Islam, a journey of spiritual rebirth.'],
            ['slug' => 'kindness-mercy', 'name' => 'Kindness & Mercy', 'ar' => 'الرحمة والإحسان', 'intro' => 'Allah is merciful to those who show mercy.'],
            ['slug' => 'knowledge-learning', 'name' => 'Knowledge & Learning', 'ar' => 'العلم والتعلم', 'intro' => 'Seeking knowledge is obligatory upon every Muslim.'],
            ['slug' => 'patience-sabr', 'name' => 'Patience (Sabr)', 'ar' => 'الصبر', 'intro' => 'Patience is a light and a key to relief.'],
            ['slug' => 'prophet-muhammad', 'name' => 'Prophet Muhammad ﷺ', 'ar' => 'النبي محمد ﷺ', 'intro' => 'The final messenger sent as a mercy to the worlds.'],
            ['slug' => 'quran-virtues', 'name' => 'Quran Virtues', 'ar' => 'فضائل القرآن', 'intro' => 'The best of you are those who learn the Quran and teach it.'],
            ['slug' => 'repentance-tawbah', 'name' => 'Repentance (Tawbah)', 'ar' => 'التوبة', 'intro' => 'Allah loves those who constantly repent.'],
            ['slug' => 'rights-of-others', 'name' => 'Rights of Others', 'ar' => 'حقوق العباد', 'intro' => 'Fulfilling the rights of neighbors, parents, and community.'],
            ['slug' => 'zakat-charity', 'name' => 'Zakat & Charity', 'ar' => 'الزكاة والصدقة', 'intro' => 'Charity does not decrease wealth; it purifies it.']
        ];

        $topics = [];
        $dummyFaqs = json_encode([
            ['question' => 'What does Islam say about this topic?', 'answer' => 'Islam provides comprehensive guidance on this matter through the Quran and Sunnah.'],
            ['question' => 'Are there any specific hadiths mentioned?', 'answer' => 'Yes, several authentic hadiths from Bukhari and Muslim address this.'],
            ['question' => 'How can I apply this in daily life?', 'answer' => 'By following the sunnah of the Prophet Muhammad (PBUH) in our daily routines.']
        ]);
        
        $dummyQuran = json_encode([
            ['arabic' => 'يَا أَيُّهَا الَّذِينَ آمَنُوا...', 'translation' => 'O you who have believed...', 'reference' => 'Surah Al-Baqarah 2:153']
        ]);

        foreach ($topicsData as $t) {
            $topics[$t['slug']] = HadithTopic::create([
                'topic_name' => $t['name'],
                'topic_name_arabic' => $t['ar'],
                'slug' => $t['slug'],
                'introduction' => $t['intro'],
                'content' => $t['intro'],
                'meta_title' => 'Authentic Hadith on ' . $t['name'],
                'meta_description' => 'Read authentic hadiths about ' . $t['name'] . ' with Arabic and English translation.',
                'faqs' => $dummyFaqs,
                'quran_references' => $dummyQuran,
            ]);
        }

        // 5. Create Hadiths and Attach
        
        // --- Brotherhood & Unity ---
        $h1 = Hadith::create([
            'arabic_text' => 'الْمُسْلِمُ أَخُو الْمُسْلِمِ لاَ يَظْلِمُهُ وَلاَ يُسْلِمُهُ',
            'english_translation' => 'A Muslim is a brother of another Muslim, so he should not oppress him, nor should he hand him over to an oppressor.',
            'urdu_translation' => 'مسلمان مسلمان کا بھائی ہے، نہ اس پر ظلم کرتا ہے اور نہ اسے بے یار و مددگار چھوڑتا ہے۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 2442',
            'slug' => Str::slug('A Muslim is a brother of another Muslim'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Abdullah bin Umar',
            'narrator_id' => null,
            'collection_id' => $bukhari->id,
        ]);
        $h1->topics()->attach([$topics['brotherhood-unity']->id, $topics['character-manners']->id]);

        // --- Business & Halal Earnings ---
        $h2 = Hadith::create([
            'arabic_text' => 'الْبَيِّعَانِ بِالْخِيَارِ مَا لَمْ يَتَفَرَّقَا',
            'english_translation' => 'The buyer and the seller have the option (of canceling the contract) as long as they have not parted.',
            'urdu_translation' => 'خریدنے اور بیچنے والے کو اختیار ہے جب تک وہ جدا نہ ہوں۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 2110',
            'slug' => Str::slug('The buyer and the seller have the option'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Hakim bin Hizam',
            'collection_id' => $bukhari->id,
        ]);
        $h2->topics()->attach([$topics['business-halal']->id]);

        // --- Character & Manners ---
        $h3 = Hadith::create([
            'arabic_text' => 'إِنَّمَا بُعِثْتُ لأُتَمِّمَ مَكَارِمَ الأَخْلاَقِ',
            'english_translation' => 'I was sent to perfect good character.',
            'urdu_translation' => 'میں تو صرف اس لیے بھیجا گیا ہوں کہ اچھے اخلاق کی تکمیل کروں۔',
            'grade' => 'Sahih',
            'reference' => 'Al-Adab Al-Mufrad 273',
            'slug' => Str::slug('I was sent to perfect good character'),
            'book_name' => 'Al-Adab Al-Mufrad',
            'narrator' => 'Abu Hurairah',
            'narrator_id' => $abuHurairah->id,
        ]);
        $h3->topics()->attach([$topics['character-manners']->id]);

        // --- Prayer (Salah) ---
        $h4 = Hadith::create([
            'arabic_text' => 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ',
            'english_translation' => 'The reward of deeds depends upon the intentions.',
            'urdu_translation' => 'اعمال کا دارومدار نیتوں پر ہے۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 1',
            'slug' => Str::slug('The reward of deeds depends upon the intentions'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Umar bin Al-Khattab',
            'narrator_id' => $umar->id,
            'collection_id' => $bukhari->id,
            'explanation' => 'This is the most fundamental hadith in Islam.',
        ]);
        // Intention applies to Prayer, Faith, etc.
        $h4->topics()->attach([$topics['prayer-salah']->id, $topics['faith-iman']->id]);

        // --- Sins to Avoid ---
        $h5 = Hadith::create([
            'arabic_text' => 'اجْتَنِبُوا السَّبْعَ الْمُوبِقَاتِ',
            'english_translation' => 'Avoid the seven great destructive sins.',
            'urdu_translation' => 'سات ہلاک کرنے والے گناہوں سے بچو۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 2766',
            'slug' => Str::slug('Avoid the seven great destructive sins'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Abu Hurairah',
            'narrator_id' => $abuHurairah->id,
            'collection_id' => $bukhari->id,
        ]);
        $h5->topics()->attach([$topics['sins-to-avoid']->id]);

        // --- Hajj & Umrah ---
        $h6 = Hadith::create([
            'arabic_text' => 'الْعُمْرَةُ إِلَى الْعُمْرَةِ كَفَّارَةٌ لِمَا بَيْنَهُمَا، وَالْحَجُّ الْمَبْرُورُ لَيْسَ لَهُ جَزَاءٌ إِلاَّ الْجَنَّةُ',
            'english_translation' => 'The performance of Umrah is an expiation for the sins committed between it and the previous ones. And the reward for Hajj Mabrur (the one accepted) is nothing but Paradise.',
            'urdu_translation' => 'ایک عمرہ دوسرے عمرے تک کے درمیانی گناہوں کا کفارہ ہے، اور حج مبرور کا ثواب جنت کے سوا کچھ نہیں۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 1773',
            'slug' => Str::slug('The performance of Umrah is an expiation'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Abu Hurairah',
            'narrator_id' => $abuHurairah->id,
            'collection_id' => $bukhari->id,
        ]);
        $h6->topics()->attach([$topics['hajj-umrah']->id]);

        // --- Kindness & Mercy ---
        $h7 = Hadith::create([
            'arabic_text' => 'الرَّاحِمُونَ يَرْحَمُهُمُ الرَّحْمَنُ ارْحَمُوا مَنْ فِي الأَرْضِ يَرْحَمْكُمْ مَنْ فِي السَّمَاءِ',
            'english_translation' => 'The merciful are shown mercy by Ar-Rahman. Be merciful on the earth, and you will be shown mercy from Who is above the heavens.',
            'urdu_translation' => 'رحم کرنے والوں پر رحمٰن رحم کرتا ہے۔ تم زمین والوں پر رحم کرو، آسمان والا تم پر رحم کرے گا۔',
            'grade' => 'Sahih',
            'reference' => 'Sunan Abi Dawud 4941',
            'slug' => Str::slug('The merciful are shown mercy by Ar-Rahman'),
            'book_name' => 'Sunan Abi Dawud',
            'narrator' => 'Abdullah bin Amr',
            'collection_id' => $abudawud->id,
        ]);
        $h7->topics()->attach([$topics['kindness-mercy']->id, $topics['character-manners']->id]);

        // --- Knowledge & Learning ---
        $h8 = Hadith::create([
            'arabic_text' => 'طَلَبُ الْعِلْمِ فَرِيضَةٌ عَلَى كُلِّ مُسْلِمٍ',
            'english_translation' => 'Seeking knowledge is a duty upon every Muslim.',
            'urdu_translation' => 'علم حاصل کرنا ہر مسلمان پر فرض ہے۔',
            'grade' => 'Hasan',
            'reference' => 'Sunan Ibn Majah 224',
            'slug' => Str::slug('Seeking knowledge is a duty upon every Muslim'),
            'book_name' => 'Sunan Ibn Majah',
            'narrator' => 'Anas bin Malik',
        ]);
        $h8->topics()->attach([$topics['knowledge-learning']->id]);

        // --- Patience (Sabr) ---
        $h9 = Hadith::create([
            'arabic_text' => 'عَجَبًا لأَمْرِ الْمُؤْمِنِ إِنَّ أَمْرَهُ كُلَّهُ خَيْرٌ... وَإِنْ أَصَابَتْهُ ضَرَّاءُ صَبَرَ فَكَانَ خَيْرًا لَهُ',
            'english_translation' => 'How wonderful is the case of a believer; there is good for him in everything... and if adversity befalls him, he endures it patiently and that is good for him.',
            'urdu_translation' => 'مومن کا معاملہ بھی عجیب ہے، اس کے ہر کام میں خیر ہے... اگر اسے کوئی تکلیف پہنچتی ہے تو صبر کرتا ہے اور یہ اس کے لیے بہتر ہے۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Muslim 2999',
            'slug' => Str::slug('How wonderful is the case of a believer'),
            'book_name' => 'Sahih Muslim',
            'narrator' => 'Suhaib',
            'collection_id' => $muslim->id,
        ]);
        $h9->topics()->attach([$topics['patience-sabr']->id, $topics['faith-iman']->id]);

        // --- Quran Virtues ---
        $h10 = Hadith::create([
            'arabic_text' => 'خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ',
            'english_translation' => 'The best among you (Muslims) are those who learn the Quran and teach it.',
            'urdu_translation' => 'تم میں سب سے بہتر وہ ہے جو قرآن سیکھے اور سکھائے۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 5027',
            'slug' => Str::slug('The best among you are those who learn the Quran'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Uthman bin Affan',
            'collection_id' => $bukhari->id,
        ]);
        $h10->topics()->attach([$topics['quran-virtues']->id, $topics['knowledge-learning']->id]);

        // --- Zakat & Charity ---
        $h11 = Hadith::create([
            'arabic_text' => 'مَا نَقَصَتْ صَدَقَةٌ مِنْ مَالٍ',
            'english_translation' => 'Charity does not decrease wealth.',
            'urdu_translation' => 'صدقہ دینے سے مال کم نہیں ہوتا۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Muslim 2588',
            'slug' => Str::slug('Charity does not decrease wealth'),
            'book_name' => 'Sahih Muslim',
            'narrator' => 'Abu Hurairah',
            'narrator_id' => $abuHurairah->id,
            'collection_id' => $muslim->id,
        ]);
        $h11->topics()->attach([$topics['zakat-charity']->id]);
        
        // --- Repentance (Tawbah) ---
        $h12 = Hadith::create([
            'arabic_text' => 'التَّائِبُ مِنَ الذَّنْبِ كَمَنْ لاَ ذَنْبَ لَهُ',
            'english_translation' => 'The one who repents from sin is like one who did not sin.',
            'urdu_translation' => 'گناہ سے توبہ کرنے والا ایسا ہے جیسے اس نے کوئی گناہ کیا ہی نہ ہو۔',
            'grade' => 'Hasan',
            'reference' => 'Sunan Ibn Majah 4250',
            'slug' => Str::slug('The one who repents from sin is like one who did not sin'),
            'book_name' => 'Sunan Ibn Majah',
            'narrator' => 'Abu Ubaidah',
        ]);
        $h12->topics()->attach([$topics['repentance-tawbah']->id, $topics['sins-to-avoid']->id]);
        
        // --- Prophet Muhammad ---
        $h13 = Hadith::create([
            'arabic_text' => 'مَنْ صَلَّى عَلَيَّ صَلاَةً صَلَّى اللَّهُ عَلَيْهِ بِهَا عَشْرًا',
            'english_translation' => 'Whoever sends blessings upon me once, Allah will send blessings upon him tenfold.',
            'urdu_translation' => 'جو مجھ پر ایک بار درود بھیجے گا، اللہ اس پر دس رحمتیں نازل فرمائے گا۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Muslim 384',
            'slug' => Str::slug('Whoever sends blessings upon me once'),
            'book_name' => 'Sahih Muslim',
            'narrator' => 'Abdullah bin Amr',
            'collection_id' => $muslim->id,
        ]);
        $h13->topics()->attach([$topics['prophet-muhammad']->id, $topics['dua-dhikr']->id]);
        
        // --- Rights of Others ---
        $h14 = Hadith::create([
            'arabic_text' => 'مَنْ كَانَ يُؤْمِنُ بِاللَّهِ وَالْيَوْمِ الآخِرِ فَلاَ يُؤْذِ جَارَهُ',
            'english_translation' => 'Whoever believes in Allah and the Last Day should not harm his neighbor.',
            'urdu_translation' => 'جو اللہ اور یومِ آخرت پر ایمان رکھتا ہے وہ اپنے پڑوسی کو تکلیف نہ دے۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 6018',
            'slug' => Str::slug('Whoever believes in Allah and the Last Day should not harm his neighbor'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Abu Hurairah',
            'narrator_id' => $abuHurairah->id,
            'collection_id' => $bukhari->id,
        ]);
        $h14->topics()->attach([$topics['rights-of-others']->id, $topics['character-manners']->id]);
        
        // --- Family & Marriage ---
        $h15 = Hadith::create([
            'arabic_text' => 'خَيْرُكُمْ خَيْرُكُمْ لأَهْلِهِ وَأَنَا خَيْرُكُمْ لأَهْلِي',
            'english_translation' => 'The best of you is the one who is best to his wife, and I am the best of you to my wives.',
            'urdu_translation' => 'تم میں سب سے بہتر وہ ہے جو اپنے گھر والوں (بیوی) کے لیے بہتر ہو، اور میں اپنے گھر والوں کے لیے سب سے بہتر ہوں۔',
            'grade' => 'Sahih',
            'reference' => 'Jami at-Tirmidhi 3895',
            'slug' => Str::slug('The best of you is the one who is best to his wife'),
            'book_name' => 'Jami at-Tirmidhi',
            'narrator' => 'Aisha',
            'narrator_id' => $aisha->id,
        ]);
        $h15->topics()->attach([$topics['family-marriage']->id, $topics['character-manners']->id]);
        
        // --- Death & Afterlife ---
        $h16 = Hadith::create([
            'arabic_text' => 'كُنْ فِي الدُّنْيَا كَأَنَّكَ غَرِيبٌ أَوْ عَابِرُ سَبِيلٍ',
            'english_translation' => 'Be in this world as if you were a stranger or a traveler along a path.',
            'urdu_translation' => 'دنیا میں ایسے رہو جیسے تم کوئی اجنبی ہو یا راہ گیر۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 6416',
            'slug' => Str::slug('Be in this world as if you were a stranger'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Abdullah bin Umar',
            'collection_id' => $bukhari->id,
        ]);
        $h16->topics()->attach([$topics['death-afterlife']->id]);
        
        // --- Dua & Dhikr ---
        $h17 = Hadith::create([
            'arabic_text' => 'كَلِمَتَانِ خَفِيفَتَانِ عَلَى اللِّسَانِ، ثَقِيلَتَانِ فِي الْمِيزَانِ، حَبِيبَتَانِ إِلَى الرَّحْمَنِ: سُبْحَانَ اللَّهِ وَبِحَمْدِهِ، سُبْحَانَ اللَّهِ الْعَظِيمِ',
            'english_translation' => 'There are two words which are light on the tongue, heavy on the Scale, and beloved to Ar-Rahman: "Subhan-Allahi wa bihamdihi, Subhan-Allahil-Azim"',
            'urdu_translation' => 'دو کلمے ایسے ہیں جو زبان پر ہلکے ہیں، ترازو میں بھاری ہیں، اور رحمٰن کو بہت محبوب ہیں: "سبحان الله وبحمده، سبحان الله العظيم"۔',
            'grade' => 'Sahih',
            'reference' => 'Sahih Bukhari 6406',
            'slug' => Str::slug('Two words which are light on the tongue'),
            'book_name' => 'Sahih Bukhari',
            'narrator' => 'Abu Hurairah',
            'narrator_id' => $abuHurairah->id,
            'collection_id' => $bukhari->id,
        ]);
        $h17->topics()->attach([$topics['dua-dhikr']->id]);

    }
}
