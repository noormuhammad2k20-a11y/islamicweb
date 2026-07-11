<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HadithTopic;
use Illuminate\Support\Str;

class HadithTopicEnrichmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            1 => [
                'topic_name_arabic'  => 'الإيمان',
                'topic_name_urdu'    => 'ایمان',
                'overview'           => 'Iman (Faith) is the foundation of Islamic belief, encompassing belief in Allah, His Angels, His Books, His Messengers, the Day of Judgment, and divine decree. The Prophet ﷺ defined Iman through the famous Hadith of Jibreel as believing in Allah, His angels, His books, His messengers, the Last Day, and predestination. Authentic hadiths reveal that Iman has over sixty branches, with the highest being the testimony of faith and the lowest being removing harm from the road.',
                'importance'         => 'Iman is the prerequisite for all acts of worship and the dividing line between salvation and loss in the Hereafter. Without sound faith, no deed is accepted by Allah. The Prophet ﷺ emphasized that the sweetness of faith is tasted only when one loves Allah and His Messenger above all else.',
                'lessons'            => 'Faith is not static — it increases with obedience and decreases with sin. A believer must continually renew and strengthen their Iman through dhikr, knowledge, and righteous deeds. The concept of Iman also encompasses action of the heart, tongue, and limbs.',
                'benefits'           => 'True Iman brings inner peace, clarity of purpose, and protection from anxiety and despair. It instills hope in Allah\'s mercy and fear of His punishment, creating a balanced psychological state. Faith also opens the door to divine forgiveness and Paradise.',
                'practical_guidance' => 'Strengthen your faith by learning the six pillars of Iman deeply, attending Islamic circles, reading Quran daily, and making dua for firm faith (thabaat). Recite "Allahumma thabbit qalbi ala dinik" regularly. Avoid sins that weaken faith and seek repentance immediately.',
                'misconceptions'     => 'Many people confuse Iman with mere verbal declaration of the Shahada. In reality, Iman requires belief in the heart, declaration on the tongue, and action through the limbs according to classical scholars. Another misconception is that faith cannot increase or decrease — authentic hadiths clearly state otherwise.',
                'introduction'       => 'Explore authentic hadiths concerning Faith (Iman) — the cornerstone of Islamic belief and the foundation of every Muslim\'s relationship with Allah.',
                'quick_stats'        => json_encode(['importance_level' => 'Core Pillar', 'quran_mentions' => '200+ times', 'related_pillars' => '6 Pillars of Iman']),
                'quran_references'   => json_encode([
                    ['surah' => 'Al-Baqarah', 'ayah' => '2:285', 'relevance' => 'The Messenger has believed in what was revealed to him from his Lord, and so have the believers.'],
                    ['surah' => 'Al-Hujurat', 'ayah' => '49:14', 'relevance' => 'The bedouins say we have believed — say rather we have submitted, for faith has not yet entered your hearts.'],
                    ['surah' => 'Al-Anfal', 'ayah' => '8:2', 'relevance' => 'The believers are only those who, when Allah is mentioned, their hearts tremble.'],
                ]),
                'faqs'               => json_encode([
                    ['question' => 'What are the six pillars of Iman?', 'answer' => 'Belief in Allah, His Angels, His Books, His Messengers, the Day of Judgment, and divine decree (Qadar) — both good and bad.'],
                    ['question' => 'Can Iman increase and decrease?', 'answer' => 'Yes. According to authentic hadiths and scholarly consensus, Iman increases with obedience and good deeds, and decreases with sins and heedlessness.'],
                    ['question' => 'What is the difference between Iman and Islam?', 'answer' => 'Islam refers to outward submission (the five pillars), while Iman refers to inner belief. Ihsan is the highest level — worshipping Allah as if you see Him.'],
                ]),
                'meta_title'        => 'Hadiths on Faith (Iman) | Authentic Islamic Teachings | NoorIslam',
                'meta_description'  => 'Read authentic hadiths about Faith (Iman) with Arabic text, Urdu and English translations. Explore what Prophet Muhammad ﷺ said about belief, faith, and Iman in Islam.',
            ],
            2 => [
                'topic_name_arabic' => 'الإسلام',
                'topic_name_urdu'   => 'اسلام',
                'overview'          => 'Islam as a topic in hadith literature focuses on the five pillars — Shahada, Salah, Zakat, Sawm, and Hajj — which form the structural foundation of Muslim practice. The famous Hadith of Jibreel defines Islam as the outward acts of worship and submission to Allah. The Prophet ﷺ described the best Islam as the act that benefits others — feeding the poor and giving salaam.',
                'importance'        => 'The five pillars of Islam are obligatory acts whose abandonment has serious consequences in Islamic jurisprudence. They represent the practical dimension of faith and structure a Muslim\'s relationship with Allah throughout every day, week, month, and lifetime.',
                'lessons'           => 'Islam teaches that worship must be consistent and sincere, not merely performative. Each pillar has a distinct wisdom — Salah maintains connection with Allah five times daily, Zakat purifies wealth, Sawm disciplines the self, and Hajj demonstrates global Muslim unity.',
                'benefits'          => 'Practicing the pillars of Islam purifies the soul, strengthens communal bonds, disciplines desires, and earns immense reward in this life and the Hereafter. The Prophet ﷺ promised that fulfilling them correctly leads to Paradise.',
                'practical_guidance'=> 'Learn the proper way to perform each pillar from qualified teachers. Prioritize Salah above all — it is the first deed questioned on the Day of Judgment. Pay Zakat on savings held for a lunar year. Fast Ramadan with intention and avoid all that breaks it.',
                'misconceptions'    => 'Islam is sometimes reduced to rituals alone. However, authentic hadiths emphasize that the best Muslim is one whose tongue and hands do not harm others. External rituals without internal transformation are incomplete. Islam is a complete way of life.',
                'introduction'      => 'Discover what the Prophet ﷺ taught about Islam — the five pillars, the best deeds, and the qualities of a true Muslim.',
                'quick_stats'       => json_encode(['importance_level' => 'Core Pillar', 'quran_mentions' => '92 times', 'key_concept' => 'Five Pillars']),
                'quran_references'  => json_encode([
                    ['surah' => 'Al-Imran', 'ayah' => '3:19', 'relevance' => 'Indeed, the religion in the sight of Allah is Islam.'],
                    ['surah' => 'Al-Maidah', 'ayah' => '5:3', 'relevance' => 'Today I have perfected for you your religion and completed My favor upon you and have approved for you Islam as religion.'],
                ]),
                'faqs' => json_encode([
                    ['question' => 'What are the five pillars of Islam?', 'answer' => 'Shahada (testimony of faith), Salah (prayer 5 times daily), Zakat (obligatory charity), Sawm (fasting in Ramadan), and Hajj (pilgrimage to Mecca once in a lifetime for those able).'],
                    ['question' => 'What does the Prophet ﷺ say is the best Islam?', 'answer' => 'The Prophet ﷺ said the best Islam is to feed the poor and greet with salaam those you know and those you do not know (Sahih Bukhari 12).'],
                ]),
                'meta_title'       => 'Hadiths on Islam | Five Pillars & Islamic Practice | NoorIslam',
                'meta_description' => 'Read authentic hadiths about Islam — the five pillars, the best deeds, and the complete way of life as taught by Prophet Muhammad ﷺ.',
            ]
        ];

        // Basic list for the remaining topics mapping
        $topicList = [
            3 => ['Tawheed', 'التوحيد', 'توحید'],
            4 => ['Ihsan', 'الإحسان', 'احسان'],
            5 => ['Prayer', 'الصلاة', 'نماز'],
            6 => ['Wudu', 'الوضوء', 'وضو'],
            7 => ['Adhan', 'الأذان', 'اذان'],
            8 => ['Jumuah', 'الجمعة', 'جمعہ'],
            9 => ['Tahajjud', 'التهجد', 'تہجد'],
            10 => ['Ramadan', 'رمضان', 'رمضان'],
            11 => ['Fasting', 'الصيام', 'روزہ'],
            12 => ['Zakat', 'الزكاة', 'زکوٰۃ'],
            13 => ['Sadaqah', 'الصدقة', 'صدقہ'],
            14 => ['Hajj', 'الحج', 'حج'],
            15 => ['Umrah', 'العمرة', 'عمرہ'],
            16 => ['Dua', 'الدعاء', 'دعا'],
            17 => ['Dhikr', 'الذكر', 'ذکر'],
            18 => ['Istighfar', 'الاستغفار', 'استغفار'],
            19 => ['Tawbah', 'التوبة', 'توبہ'],
            20 => ['Quran', 'القرآن', 'قرآن'],
            21 => ['Tafsir', 'التفسير', 'تفسیر'],
            22 => ['Knowledge', 'العلم', 'علم'],
            23 => ['Parents', 'الوالدان', 'والدین'],
            24 => ['Mother', 'الأم', 'ماں'],
            25 => ['Father', 'الأب', 'باپ'],
            26 => ['Children', 'الأطفال', 'بچے'],
            27 => ['Marriage', 'النكاح', 'نکاح'],
            28 => ['Family', 'الأسرة', 'خاندان'],
            29 => ['Women', 'المرأة', 'خواتین'],
            30 => ['Brotherhood', 'الأخوة', 'اخوت'],
            31 => ['Neighbour', 'الجيران', 'پڑوسی'],
            32 => ['Business', 'التجارة', 'تجارت'],
            33 => ['Halal', 'الكسب الحلال', 'حلال کمائی'],
            34 => ['Riba', 'الربا', 'سود'],
            35 => ['Justice', 'العدل', 'عدل'],
            36 => ['Honesty', 'الصدق', 'صداقت'],
            37 => ['Trustworthiness', 'الأمانة', 'امانت'],
            38 => ['Patience', 'الصبر', 'صبر'],
            39 => ['Gratitude', 'الشكر', 'شکر'],
            40 => ['Mercy', 'الرحمة', 'رحمت'],
            41 => ['Kindness', 'الطف', 'مہربانی'],
            42 => ['Akhlaq', 'الأخلاق', 'اخلاق'],
            43 => ['Gheebah', 'الغيبة', 'غیبت'],
            44 => ['Hasad', 'الحسد', 'حسد'],
            45 => ['Anger', 'الغضب', 'غصہ'],
            46 => ['Major Sins', 'الكبائر', 'کبیرہ گناہ'],
            47 => ['Minor Sins', 'الصغائر', 'صغیرہ گناہ'],
            48 => ['Death', 'الموت', 'موت'],
            49 => ['Grave', 'القبر', 'قبر'],
            50 => ['Barzakh', 'البرزخ', 'برزخ'],
            51 => ['Resurrection', 'البعث', 'قیامت'],
            52 => ['Day of Judgment', 'يوم القيامة', 'روز قیامت'],
            53 => ['Paradise', 'الجنة', 'جنت'],
            54 => ['Hellfire', 'جهنم', 'جہنم'],
            55 => ['Prophet Muhammad', 'النبي محمد ﷺ', 'نبی محمدﷺ'],
            56 => ['Sahabah', 'الصحابة', 'صحابہ کرام'],
            57 => ['Adab', 'الآداب', 'آداب'],
            58 => ['Food', 'الطعام والشراب', 'کھانا پینا'],
            59 => ['Hijab', 'اللباس والحشمة', 'حجاب'],
            60 => ['Taharah', 'الطهارة', 'طہارت'],
            61 => ['Travel', 'السفر', 'سفر'],
            62 => ['Health', 'الصحة', 'صحت'],
            63 => ['Morning', 'أذكار الصباح', 'صبح کے اذکار'],
            64 => ['Evening', 'أذكار المساء', 'شام کے اذکار'],
            65 => ['Sleep', 'آداب النوم', 'سونے کے آداب'],
            66 => ['Sick', 'عيادة المريض', 'مریض کی عیادت'],
            67 => ['Funeral', 'الجنازة', 'جنازہ'],
            68 => ['Leadership', 'القيادة', 'قیادت'],
            69 => ['Education', 'التعليم', 'تعلیم'],
            70 => ['Children Rights', 'حقوق الأطفال', 'بچوں کے حقوق'],
            71 => ['Orphans', 'الأيتام', 'یتیم'],
            72 => ['Animals', 'حقوق الحيوان', 'جانوروں کے حقوق'],
            73 => ['Environment', 'البيئة', 'ماحولیات'],
            74 => ['Time', 'إدارة الوقت', 'وقت کا انتظام'],
            75 => ['Youth', 'الشباب', 'نوجوان'],
            76 => ['Elders', 'الشيوخ', 'بزرگ'],
            77 => ['Guests', 'الضيافة', 'مہمان نوازی'],
            78 => ['Promises', 'الوعود والأيمان', 'وعدہ اور قسم'],
            79 => ['Jihad', 'الجهاد', 'جہاد'],
            80 => ['Martyrdom', 'الشهادة', 'شہادت'],
            81 => ['Debt', 'الدين', 'قرض'],
            82 => ['Inheritance', 'الميراث', 'وراثت'],
            83 => ['Cleanliness', 'النظافة', 'صفائی'],
            84 => ['Smiling', 'الابتسام', 'مسکراہٹ'],
            85 => ['Gifts', 'الهدايا', 'تحفے'],
            86 => ['Forgiveness', 'العفو', 'معافی'],
            87 => ['Humility', 'التواضع', 'انکساری'],
            88 => ['Arrogance', 'الكبر', 'تکبر'],
            89 => ['Hypocrisy', 'النفاق', 'نفاق'],
            90 => ['Lying', 'الكذب', 'جھوٹ'],
            91 => ['Cheating', 'الغش', 'دھوکہ'],
            92 => ['Haya', 'الحياء', 'حیا'],
            93 => ['Generosity', 'الكرم', 'سخاوت'],
            94 => ['Miserliness', 'البخل', 'بخل'],
            95 => ['Contentment', 'القناعة', 'قناعت'],
            96 => ['Tawakkul', 'التوكل', 'توکل'],
            97 => ['Taqwa', 'التقوى', 'تقویٰ'],
            98 => ['Hope', 'الرجاء', 'امید'],
            99 => ['Love of Allah', 'محبة الله', 'اللہ سے محبت'],
            100 => ['Love of Prophet', 'محبة النبي ﷺ', 'نبیﷺ سے محبت']
        ];

        foreach ($topicList as $id => $info) {
            if (!isset($topics[$id])) {
                $enName = $info[0];
                $topics[$id] = [
                    'topic_name_arabic'  => $info[1],
                    'topic_name_urdu'    => $info[2],
                    'overview'           => "Authentic teachings from the Quran and Sunnah regarding {$enName}. This topic covers the profound wisdom, practical implications, and fundamental rulings associated with {$enName} in Islam.",
                    'importance'         => "Understanding {$enName} is crucial for every Muslim striving to follow the path of Prophet Muhammad ﷺ. It plays a key role in spiritual purification and practical daily life.",
                    'lessons'            => "Key lessons include adhering to the boundaries set by Allah, recognizing the spiritual significance of {$enName}, and implementing its teachings in our interactions.",
                    'benefits'           => "By embodying the principles of {$enName}, a believer gains closeness to Allah, peace of mind, and the reward of the Hereafter.",
                    'practical_guidance' => "Apply these teachings by constantly remembering Allah's commands related to {$enName} and seeking knowledge to avoid common pitfalls.",
                    'misconceptions'     => "Many misunderstand the true essence of {$enName}, either by taking it to extremes or neglecting it altogether. The Sunnah provides a balanced approach.",
                    'introduction'       => "Explore authentic hadiths concerning {$enName} — uncovering its importance and practical applications in Islamic teachings.",
                    'quick_stats'        => json_encode(['importance_level' => 'High', 'quran_mentions' => 'Frequent', 'related_concepts' => $enName]),
                    'quran_references'   => json_encode([
                        ['surah' => 'Relevant Surah', 'ayah' => 'General', 'relevance' => "Allah mentions the importance of {$enName} in various places in the Quran."]
                    ]),
                    'faqs'               => json_encode([
                        ['question' => "What does Islam say about {$enName}?", 'answer' => "Islam places great emphasis on {$enName}, considering it an integral part of faith and character."],
                        ['question' => "How can one improve in {$enName}?", 'answer' => "By following the Sunnah of the Prophet ﷺ and seeking authentic knowledge from the Quran and Hadith."]
                    ]),
                    'meta_title'        => "Hadiths on {$enName} | Authentic Islamic Teachings | NoorIslam",
                    'meta_description'  => "Read authentic hadiths about {$enName} with Arabic text, Urdu and English translations. Explore what Prophet Muhammad ﷺ said about {$enName} in Islam.",
                ];
            }
        }

        foreach ($topics as $id => $data) {
            HadithTopic::where('id', $id)->update($data);
        }
    }
}
