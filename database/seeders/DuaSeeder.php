<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DuaCategory;
use App\Models\Dua;

class DuaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name_english' => 'Morning Azkar', 'name_urdu' => 'صبح کے اذکار', 'slug' => 'morning-azkar', 'icon_class' => 'fa-sun'],
            ['name_english' => 'Evening Azkar', 'name_urdu' => 'شام کے اذکار', 'slug' => 'evening-azkar', 'icon_class' => 'fa-moon'],
            ['name_english' => 'After Salah', 'name_urdu' => 'نماز کے بعد کے اذکار', 'slug' => 'after-salah', 'icon_class' => 'fa-pray'],
            ['name_english' => 'Sleep Duas', 'name_urdu' => 'سونے کی دعائیں', 'slug' => 'sleep-duas', 'icon_class' => 'fa-bed'],
            ['name_english' => 'Food & Drink', 'name_urdu' => 'کھانے پینے کی دعائیں', 'slug' => 'food-drink', 'icon_class' => 'fa-utensils'],
            ['name_english' => 'Travel Duas', 'name_urdu' => 'سفر کی دعائیں', 'slug' => 'travel-duas', 'icon_class' => 'fa-plane'],
            ['name_english' => 'Protection Duas', 'name_urdu' => 'حفاظت کی دعائیں', 'slug' => 'protection-duas', 'icon_class' => 'fa-shield-alt'],
            ['name_english' => 'Forgiveness Duas', 'name_urdu' => 'استغفار', 'slug' => 'forgiveness-duas', 'icon_class' => 'fa-hands'],
        ];

        $categoryMap = [];
        foreach ($categories as $catData) {
            $cat = DuaCategory::updateOrCreate(['slug' => $catData['slug']], $catData);
            $categoryMap[$catData['slug']] = $cat->id;
        }

        $duas = [
            // MORNING AZKAR
            [
                'category' => 'morning-azkar',
                'title_english' => 'Sayyidul Istighfar',
                'title_urdu' => 'سید الاستغفار',
                'seo_slug' => 'sayyidul-istighfar-morning',
                'arabic_text' => 'اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ ، خَلَقْتَنِي وَأَنَا عَبْدُكَ ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ ، أَعُوذُ بِكَ مِنْ شَرِّ مَا صَنَعْتُ ، أَبُوءُ لَكَ بِنِعْمَتِكَ عَلَيَّ ، وَأَبُوءُ لَكَ بِذَنْبِي فَاغْفِرْ لِي ، فَإِنَّهُ لا يَغْفِرُ الذُّنُوبَ إِلا أَنْتَ',
                'transliteration' => 'Allahumma anta Rabbi la ilaha illa anta, Khalaqtani wa ana abduka, wa ana ala ahdika wa wa\'dika mastata\'tu, A\'udhu bika min sharri ma sana\'tu, abu\'u Laka bini\'matika \'alaiya, wa Abu\'u Laka bidhanbi faghfirli fainnahu la yaghfiruz-zunuba illa anta.',
                'translation' => 'O Allah, You are my Lord, there is none worthy of worship but You. You created me and I am Your slave. I keep Your covenant, and my pledge to You so far as I am able. I seek refuge in You from the evil of what I have done. I admit to Your blessings upon me, and I admit to my misdeeds. Forgive me, for there is none who may forgive sins but You.',
                'reference_source' => 'Sahih al-Bukhari 6306'
            ],
            [
                'category' => 'morning-azkar',
                'title_english' => 'Entering the Morning',
                'title_urdu' => 'صبح کے وقت کی دعا',
                'seo_slug' => 'entering-the-morning',
                'arabic_text' => 'اللَّهُمَّ بِكَ أَصْبَحْنَا، وَبِكَ أَمْسَيْنَا، وَبِكَ نَحْيَا، وَبِكَ نَمُوتُ وَإِلَيْكَ النُّشُورُ',
                'transliteration' => 'Allahumma bika asbahna, wa bika amsayna, wa bika nahya, wa bika namutu wa ilaykan-nushoor.',
                'translation' => 'O Allah, by You we enter the morning and by You we enter the evening, by You we live and by You we die, and to You is the Final Return.',
                'reference_source' => 'Sunan At-Tirmidhi 3391'
            ],
            [
                'category' => 'morning-azkar',
                'title_english' => 'For Well-Being in this World and the Hereafter',
                'title_urdu' => 'دنیا اور آخرت کی عافیت کے لیے دعا',
                'seo_slug' => 'well-being-morning',
                'arabic_text' => 'اللَّهُمَّ إِنِّي أَسْأَلُكَ الْعَافِيَةَ فِي الدُّنْيَا وَالآخِرَةِ',
                'transliteration' => 'Allahumma inni as\'alukal-\'afiyata fid-dunya wal-akhirah.',
                'translation' => 'O Allah, I ask You for well-being in this world and the Hereafter.',
                'reference_source' => 'Sunan Ibn Majah 3871'
            ],

            // EVENING AZKAR
            [
                'category' => 'evening-azkar',
                'title_english' => 'Entering the Evening',
                'title_urdu' => 'شام کے وقت کی دعا',
                'seo_slug' => 'entering-the-evening',
                'arabic_text' => 'اللَّهُمَّ بِكَ أَمْسَيْنَا، وَبِكَ أَصْبَحْنَا، وَبِكَ نَحْيَا، وَبِكَ نَمُوتُ وَإِلَيْكَ الْمَصِيرُ',
                'transliteration' => 'Allahumma bika amsayna, wa bika asbahna, wa bika nahya, wa bika namutu wa ilaykal-maseer.',
                'translation' => 'O Allah, by You we enter the evening and by You we enter the morning, by You we live and by You we die, and to You is the final return.',
                'reference_source' => 'Sunan At-Tirmidhi 3391'
            ],
            [
                'category' => 'evening-azkar',
                'title_english' => 'Protection from Harm',
                'title_urdu' => 'نقصان سے بچنے کی دعا',
                'seo_slug' => 'protection-from-harm-evening',
                'arabic_text' => 'بِسْمِ اللَّهِ الَّذِي لاَ يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الأَرْضِ وَلاَ فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ',
                'transliteration' => 'Bismillahil-ladhi la yadurru ma\'as-mihi shai\'un fil-ardi wa la fis-sama\'i, wa Huwas-Sami\'ul-\'Alim.',
                'translation' => 'In the Name of Allah with Whose Name there is protection against every kind of harm in the earth or in the heaven, and He is the All-Hearing and All-Knowing. (Recite 3 times)',
                'reference_source' => 'Sunan At-Tirmidhi 3388'
            ],

            // AFTER SALAH
            [
                'category' => 'after-salah',
                'title_english' => 'Dhikr after Obligatory Prayer',
                'title_urdu' => 'فرض نماز کے بعد کا ذکر',
                'seo_slug' => 'dhikr-after-obligatory-prayer',
                'arabic_text' => 'أَسْتَغْفِرُ اللَّهَ، أَسْتَغْفِرُ اللَّهَ، أَسْتَغْفِرُ اللَّهَ. اللَّهُمَّ أَنْتَ السَّلَامُ وَمِنْكَ السَّلَامُ، تَبَارَكْتَ يَا ذَا الْجَلَالِ وَالْإِكْرَامِ',
                'transliteration' => 'Astaghfirullah (3x). Allahumma antas-salam wa minkas-salam, tabarakta ya dhal-jalali wal-ikram.',
                'translation' => 'I seek the forgiveness of Allah (three times). O Allah, You are Peace and from You comes peace. Blessed are You, O Owner of majesty and honor.',
                'reference_source' => 'Sahih Muslim 591'
            ],
            [
                'category' => 'after-salah',
                'title_english' => 'Tasbeeh, Tahmeed, Takbeer',
                'title_urdu' => 'تسبیح، تحمید، تکبیر',
                'seo_slug' => 'tasbeeh-tahmeed-takbeer',
                'arabic_text' => 'سُبْحَانَ اللَّهِ (٣٣)، الْحَمْدُ لِلَّهِ (٣٣)، اللَّهُ أَكْبَرُ (٣٣/٣٤)',
                'transliteration' => 'SubhanAllah (33x), Alhamdulillah (33x), Allahu Akbar (33x/34x)',
                'translation' => 'Glory be to Allah (33 times), Praise be to Allah (33 times), Allah is the Greatest (33 or 34 times).',
                'reference_source' => 'Sahih Muslim 597'
            ],

            // SLEEP DUAS
            [
                'category' => 'sleep-duas',
                'title_english' => 'Dua Before Sleeping',
                'title_urdu' => 'سونے سے پہلے کی دعا',
                'seo_slug' => 'dua-before-sleeping',
                'arabic_text' => 'بِاسْمِكَ رَبِّي وَضَعْتُ جَنْبِي وَبِكَ أَرْفَعُهُ',
                'transliteration' => 'Bismika Rabbi wada\'tu janbi, wa bika arfa\'uhu.',
                'translation' => 'In Your Name, my Lord, I lay my side down, and in Your Name I raise it.',
                'reference_source' => 'Sahih al-Bukhari 6320'
            ],
            [
                'category' => 'sleep-duas',
                'title_english' => 'Short Bedtime Dua',
                'title_urdu' => 'مختصر سوتے وقت کی دعا',
                'seo_slug' => 'short-bedtime-dua',
                'arabic_text' => 'اللَّهُمَّ بِاسْمِكَ أَمُوتُ وَأَحْيَا',
                'transliteration' => 'Allahumma bismika amutu wa ahya.',
                'translation' => 'O Allah, in Your Name I die and I live.',
                'reference_source' => 'Sahih al-Bukhari 6312'
            ],
            [
                'category' => 'sleep-duas',
                'title_english' => 'Dua Upon Waking Up',
                'title_urdu' => 'سو کر اٹھنے کی دعا',
                'seo_slug' => 'waking-up-dua',
                'arabic_text' => 'الْحَمْدُ لِلَّهِ الَّذِي أَحْيَانَا بَعْدَ مَا أَمَاتَنَا وَإِلَيْهِ النُّشُورُ',
                'transliteration' => 'Alhamdu lillahil-ladhi ahyana ba\'da ma amatana wa ilayhin-nushoor.',
                'translation' => 'All praise is to Allah Who gave us life after having taken it from us and unto Him is the resurrection.',
                'reference_source' => 'Sahih al-Bukhari 6312'
            ],

            // FOOD & DRINK
            [
                'category' => 'food-drink',
                'title_english' => 'Before Eating',
                'title_urdu' => 'کھانا شروع کرنے سے پہلے',
                'seo_slug' => 'before-eating',
                'arabic_text' => 'بِسْمِ اللَّهِ',
                'transliteration' => 'Bismillah',
                'translation' => 'In the name of Allah.',
                'reference_source' => 'Sunan At-Tirmidhi 1858'
            ],
            [
                'category' => 'food-drink',
                'title_english' => 'If Forgetting to Say Bismillah',
                'title_urdu' => 'اگر بسم اللہ بھول جائیں',
                'seo_slug' => 'forgetting-bismillah',
                'arabic_text' => 'بِسْمِ اللَّهِ أَوَّلَهُ وَآخِرَهُ',
                'transliteration' => 'Bismillahi awwalahu wa akhirahu.',
                'translation' => 'In the name of Allah at the beginning and at the end of it.',
                'reference_source' => 'Sunan At-Tirmidhi 1858'
            ],
            [
                'category' => 'food-drink',
                'title_english' => 'After Eating',
                'title_urdu' => 'کھانے کے بعد کی دعا',
                'seo_slug' => 'after-eating',
                'arabic_text' => 'الْحَمْدُ لِلَّهِ الَّذِي أَطْعَمَنِي هَذَا وَرَزَقَنِيهِ مِنْ غَيْرِ حَوْلٍ مِنِّي وَلاَ قُوَّةٍ',
                'transliteration' => 'Alhamdu lillahil-ladhi at\'amani hadha, wa razaqanihi min ghayri hawlin minni wa la quwwah.',
                'translation' => 'All praise is to Allah Who has fed me this and provided it for me without any might or power on my part.',
                'reference_source' => 'Sunan At-Tirmidhi 3458'
            ],

            // TRAVEL DUAS
            [
                'category' => 'travel-duas',
                'title_english' => 'When Mounting Transport',
                'title_urdu' => 'سواری پر بیٹھنے کی دعا',
                'seo_slug' => 'mounting-transport',
                'arabic_text' => 'سُبْحَانَ الَّذِي سَخَّرَ لَنَا هَذَا وَمَا كُنَّا لَهُ مُقْرِنِينَ * وَإِنَّا إِلَى رَبِّنَا لَمُنْقَلِبُونَ',
                'transliteration' => 'Subhanal-ladhi sakh-khara lana hadha wa ma kunna lahu muqrinin. Wa inna ila Rabbina lamunqaliboon.',
                'translation' => 'Glory to Him Who has subjected this to us, and we could never have it by our efforts. And verily, to our Lord we indeed are to return.',
                'reference_source' => 'Surah Az-Zukhruf 43:13-14'
            ],
            [
                'category' => 'travel-duas',
                'title_english' => 'Upon Returning Home',
                'title_urdu' => 'سفر سے واپسی پر',
                'seo_slug' => 'returning-home-travel',
                'arabic_text' => 'آيِبُونَ تَائِبُونَ عَابِدُونَ لِرَبِّنَا حَامِدُونَ',
                'transliteration' => 'Aayiboona, taa\'iboona, \'abidoona, li-Rabbina hamidoon.',
                'translation' => 'We return, repent, worship and praise our Lord.',
                'reference_source' => 'Sahih Muslim 1342'
            ],

            // PROTECTION DUAS
            [
                'category' => 'protection-duas',
                'title_english' => 'Protection from the Evil Eye for Children',
                'title_urdu' => 'بچوں کو نظرِ بد سے بچانے کی دعا',
                'seo_slug' => 'protection-evil-eye-children',
                'arabic_text' => 'أُعِيذُكُمَا بِكَلِمَاتِ اللَّهِ التَّامَّةِ، مِنْ كُلِّ شَيْطَانٍ وَهَامَّةٍ، وَمِنْ كُلِّ عَيْنٍ لاَمَّةٍ',
                'transliteration' => 'U\'eedhukuma bikalimatillahit-tammah, min kulli shaytanin wa hammah, wa min kulli \'aynin lammah.',
                'translation' => 'I seek protection for you in the Perfect Words of Allah from every devil and every beast, and from every envious blameworthy eye.',
                'reference_source' => 'Sahih al-Bukhari 3371'
            ],
            [
                'category' => 'protection-duas',
                'title_english' => 'During Times of Fear or Anxiety',
                'title_urdu' => 'خوف اور پریشانی کی دعا',
                'seo_slug' => 'during-times-of-fear',
                'arabic_text' => 'حَسْبُنَا اللَّهُ وَنِعْمَ الْوَكِيلُ',
                'transliteration' => 'Hasbunallahu wa ni\'mal-wakeel.',
                'translation' => 'Allah is sufficient for us and He is the Best Disposer of affairs.',
                'reference_source' => 'Surah Ali \'Imran 3:173'
            ],

            // FORGIVENESS DUAS
            [
                'category' => 'forgiveness-duas',
                'title_english' => 'Seeking Forgiveness (Istighfar)',
                'title_urdu' => 'استغفار',
                'seo_slug' => 'seeking-forgiveness-istighfar',
                'arabic_text' => 'أَسْتَغْفِرُ اللَّهَ وَأَتُوبُ إِلَيْهِ',
                'transliteration' => 'Astaghfirullaha wa atoobu ilayh.',
                'translation' => 'I seek the forgiveness of Allah and repent to Him. (Say 100 times daily)',
                'reference_source' => 'Sahih Muslim 2702'
            ],
            [
                'category' => 'forgiveness-duas',
                'title_english' => 'Dua for Total Forgiveness',
                'title_urdu' => 'مکمل معافی کی دعا',
                'seo_slug' => 'dua-total-forgiveness',
                'arabic_text' => 'رَبِّ اغْفِرْ لِي خَطِيئَتِي وَجَهْلِي وَإِسْرَافِي فِي أَمْرِي كُلِّهِ',
                'transliteration' => 'Rabbighfir li khati\'ati wa jahli wa israfi fi amri kullih.',
                'translation' => 'O Lord, forgive me my sins, my ignorance, my transgression in my affairs.',
                'reference_source' => 'Sahih al-Bukhari 6398'
            ],
            [
                'category' => 'forgiveness-duas',
                'title_english' => 'Sayyidul Istighfar (Master of Forgiveness)',
                'title_urdu' => 'سید الاستغفار',
                'seo_slug' => 'sayyidul-istighfar-morning', // USING SAME SLUG to test Many-To-Many relationship
                'arabic_text' => 'اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ ، خَلَقْتَنِي وَأَنَا عَبْدُكَ ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ ، أَعُوذُ بِكَ مِنْ شَرِّ مَا صَنَعْتُ ، أَبُوءُ لَكَ بِنِعْمَتِكَ عَلَيَّ ، وَأَبُوءُ لَكَ بِذَنْبِي فَاغْفِرْ لِي ، فَإِنَّهُ لا يَغْفِرُ الذُّنُوبَ إِلا أَنْتَ',
                'transliteration' => 'Allahumma anta Rabbi la ilaha illa anta, Khalaqtani wa ana abduka, wa ana ala ahdika wa wa\'dika mastata\'tu, A\'udhu bika min sharri ma sana\'tu, abu\'u Laka bini\'matika \'alaiya, wa Abu\'u Laka bidhanbi faghfirli fainnahu la yaghfiruz-zunuba illa anta.',
                'translation' => 'O Allah, You are my Lord, there is none worthy of worship but You. You created me and I am Your slave. I keep Your covenant, and my pledge to You so far as I am able. I seek refuge in You from the evil of what I have done. I admit to Your blessings upon me, and I admit to my misdeeds. Forgive me, for there is none who may forgive sins but You.',
                'reference_source' => 'Sahih al-Bukhari 6306'
            ]
        ];

        foreach ($duas as $duaData) {
            $dua = Dua::updateOrCreate(
                ['seo_slug' => $duaData['seo_slug']],
                [
                    'title_english' => $duaData['title_english'],
                    'title_urdu' => $duaData['title_urdu'],
                    'seo_slug' => $duaData['seo_slug'],
                    'arabic_text' => $duaData['arabic_text'],
                    'transliteration' => $duaData['transliteration'],
                    'translation' => $duaData['translation'],
                    'reference_source' => $duaData['reference_source'],
                ]
            );

            // Sync categories to avoid duplicates
            $dua->categories()->syncWithoutDetaching([$categoryMap[$duaData['category']]]);
        }
    }
}
