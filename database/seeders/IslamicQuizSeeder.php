<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IslamicQuizSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            ['question_urdu' => 'قرآن مجید میں کتنی سورتیں ہیں؟', 'question_english' => 'How many Surahs are in the Quran?', 'option_a' => '114', 'option_b' => '120', 'option_c' => '110', 'option_d' => '100', 'correct_option' => 'a', 'explanation' => 'قرآن مجید میں کل 114 سورتیں ہیں۔', 'category' => 'Quran', 'difficulty' => 'easy'],
            ['question_urdu' => 'قرآن مجید کی سب سے لمبی سورت کون سی ہے؟', 'question_english' => 'Which is the longest Surah in the Quran?', 'option_a' => 'سورہ البقرہ', 'option_b' => 'سورہ آل عمران', 'option_c' => 'سورہ النساء', 'option_d' => 'سورہ المائدہ', 'correct_option' => 'a', 'explanation' => 'سورہ البقرہ 286 آیات کے ساتھ قرآن کی سب سے لمبی سورت ہے۔', 'category' => 'Quran', 'difficulty' => 'easy'],
            ['question_urdu' => 'اسلام کے کتنے ارکان ہیں؟', 'question_english' => 'How many pillars of Islam are there?', 'option_a' => '5', 'option_b' => '6', 'option_c' => '4', 'option_d' => '7', 'correct_option' => 'a', 'explanation' => 'اسلام کے 5 ارکان ہیں: کلمہ، نماز، روزہ، زکوٰۃ اور حج۔', 'category' => 'Fiqh', 'difficulty' => 'easy'],
            ['question_urdu' => 'نبی ﷺ کی پہلی بیوی کا نام کیا تھا؟', 'question_english' => 'What was the name of Prophet Muhammad\'s first wife?', 'option_a' => 'حضرت خدیجہ رضی اللہ عنہا', 'option_b' => 'حضرت عائشہ رضی اللہ عنہا', 'option_c' => 'حضرت حفصہ رضی اللہ عنہا', 'option_d' => 'حضرت زینب رضی اللہ عنہا', 'correct_option' => 'a', 'explanation' => 'حضرت خدیجہ رضی اللہ عنہا نبی ﷺ کی پہلی بیوی تھیں۔', 'category' => 'History', 'difficulty' => 'easy'],
            ['question_urdu' => 'قبلہ اول کون سا تھا؟', 'question_english' => 'What was the first Qibla of Muslims?', 'option_a' => 'مسجد الاقصیٰ', 'option_b' => 'کعبہ', 'option_c' => 'مسجد نبوی', 'option_d' => 'مسجد قبا', 'correct_option' => 'a', 'explanation' => 'مسلمانوں کا پہلا قبلہ مسجد الاقصیٰ (بیت المقدس) تھا۔', 'category' => 'History', 'difficulty' => 'medium'],
            ['question_urdu' => 'قرآن مجید میں کتنے پارے ہیں؟', 'question_english' => 'How many Juz (parts) are in the Quran?', 'option_a' => '30', 'option_b' => '25', 'option_c' => '20', 'option_d' => '40', 'correct_option' => 'a', 'explanation' => 'قرآن مجید 30 پاروں پر مشتمل ہے۔', 'category' => 'Quran', 'difficulty' => 'easy'],
            ['question_urdu' => 'صحیح بخاری کے مصنف کون ہیں؟', 'question_english' => 'Who compiled Sahih Bukhari?', 'option_a' => 'امام بخاری', 'option_b' => 'امام مسلم', 'option_c' => 'امام ترمذی', 'option_d' => 'امام ابو داؤد', 'correct_option' => 'a', 'explanation' => 'امام محمد بن اسماعیل بخاری نے صحیح بخاری مرتب کی۔', 'category' => 'Hadith', 'difficulty' => 'easy'],
            ['question_urdu' => 'سورہ اخلاص میں اللہ کے کون سے نام آئے ہیں؟', 'question_english' => 'Which names of Allah appear in Surah Ikhlas?', 'option_a' => 'الاحد، الصمد', 'option_b' => 'الرحمن، الرحیم', 'option_c' => 'الملک، القدوس', 'option_d' => 'الغفور، الرحیم', 'correct_option' => 'a', 'explanation' => 'سورہ اخلاص میں الاحد (ایک) اور الصمد (بے نیاز) آئے ہیں۔', 'category' => 'Quran', 'difficulty' => 'medium'],
            ['question_urdu' => 'غزوہ بدر کس سال ہوئی؟', 'question_english' => 'In which year did the Battle of Badr occur?', 'option_a' => '2 ہجری', 'option_b' => '3 ہجری', 'option_c' => '5 ہجری', 'option_d' => '8 ہجری', 'correct_option' => 'a', 'explanation' => 'غزوہ بدر 2 ہجری (624 عیسوی) میں ہوئی — پہلی بڑی جنگ۔', 'category' => 'History', 'difficulty' => 'medium'],
            ['question_urdu' => 'زکوٰۃ کی شرح کتنی ہے؟', 'question_english' => 'What is the rate of Zakat?', 'option_a' => '2.5٪', 'option_b' => '5٪', 'option_c' => '10٪', 'option_d' => '1٪', 'correct_option' => 'a', 'explanation' => 'زکوٰۃ کی شرح مال کا 2.5 فیصد (چالیسواں حصہ) ہے۔', 'category' => 'Fiqh', 'difficulty' => 'easy'],
            ['question_urdu' => 'نماز میں کتنے سجدے ہوتے ہیں؟', 'question_english' => 'How many Sajdahs are in each Rakah of prayer?', 'option_a' => '2', 'option_b' => '1', 'option_c' => '3', 'option_d' => '4', 'correct_option' => 'a', 'explanation' => 'ہر رکعت میں 2 سجدے ہوتے ہیں۔', 'category' => 'Fiqh', 'difficulty' => 'easy'],
            ['question_urdu' => 'قرآن مجید میں کتنی آیات ہیں؟', 'question_english' => 'How many verses are in the Quran?', 'option_a' => '6236', 'option_b' => '6000', 'option_c' => '6666', 'option_d' => '7000', 'correct_option' => 'a', 'explanation' => 'قرآن مجید میں 6236 آیات ہیں (کوفی شمار کے مطابق)۔', 'category' => 'Quran', 'difficulty' => 'medium'],
            ['question_urdu' => 'حج کس مہینے میں ادا کیا جاتا ہے؟', 'question_english' => 'In which month is Hajj performed?', 'option_a' => 'ذوالحجہ', 'option_b' => 'رمضان', 'option_c' => 'محرم', 'option_d' => 'شعبان', 'correct_option' => 'a', 'explanation' => 'حج ذوالحجہ کے مہینے میں 8-12 تاریخ تک ادا کیا جاتا ہے۔', 'category' => 'Fiqh', 'difficulty' => 'easy'],
            ['question_urdu' => 'اذان میں کتنی مرتبہ "اللہ اکبر" کہا جاتا ہے؟', 'question_english' => 'How many times is "Allahu Akbar" said in Adhan?', 'option_a' => '6', 'option_b' => '4', 'option_c' => '8', 'option_d' => '2', 'correct_option' => 'b', 'explanation' => 'اذان میں "اللہ اکبر" 4 مرتبہ شروع میں کہا جاتا ہے (حنفی مسلک)۔', 'category' => 'Fiqh', 'difficulty' => 'medium'],
            ['question_urdu' => 'خلیفہ اول کون تھے؟', 'question_english' => 'Who was the first Caliph of Islam?', 'option_a' => 'حضرت ابوبکر صدیق رضی اللہ عنہ', 'option_b' => 'حضرت عمر فاروق رضی اللہ عنہ', 'option_c' => 'حضرت عثمان غنی رضی اللہ عنہ', 'option_d' => 'حضرت علی رضی اللہ عنہ', 'correct_option' => 'a', 'explanation' => 'حضرت ابوبکر صدیق رضی اللہ عنہ اسلام کے پہلے خلیفہ تھے۔', 'category' => 'History', 'difficulty' => 'easy'],
            ['question_urdu' => 'رمضان اسلامی کیلنڈر کا کون سا مہینہ ہے؟', 'question_english' => 'What number month is Ramadan in the Islamic calendar?', 'option_a' => '9واں', 'option_b' => '10واں', 'option_c' => '8واں', 'option_d' => '7واں', 'correct_option' => 'a', 'explanation' => 'رمضان المبارک اسلامی کیلنڈر کا 9واں مہینہ ہے۔', 'category' => 'Fiqh', 'difficulty' => 'easy'],
            ['question_urdu' => 'سورہ فاتحہ کو "ام الکتاب" کیوں کہتے ہیں؟', 'question_english' => 'Why is Surah Fatiha called "Umm al-Kitab"?', 'option_a' => 'کیونکہ یہ قرآن کا خلاصہ ہے', 'option_b' => 'کیونکہ یہ سب سے لمبی ہے', 'option_c' => 'کیونکہ یہ مکی ہے', 'option_d' => 'کیونکہ اس میں 7 آیات ہیں', 'correct_option' => 'a', 'explanation' => 'سورہ فاتحہ میں پورے قرآن کے مضامین کا خلاصہ ہے اس لیے اسے ام الکتاب کہتے ہیں۔', 'category' => 'Quran', 'difficulty' => 'hard'],
            ['question_urdu' => 'حجر اسود کس رنگ کا ہے؟', 'question_english' => 'What color is Hajr-e-Aswad?', 'option_a' => 'سیاہ', 'option_b' => 'سفید', 'option_c' => 'سبز', 'option_d' => 'سرخ', 'correct_option' => 'a', 'explanation' => 'حجر اسود سیاہ رنگ کا ہے — حدیث کے مطابق یہ جنت سے آیا تھا اور لوگوں کے گناہوں نے اسے سیاہ کر دیا۔', 'category' => 'History', 'difficulty' => 'easy'],
            ['question_urdu' => 'قرآن مجید کی سب سے چھوٹی سورت کون سی ہے؟', 'question_english' => 'Which is the shortest Surah in the Quran?', 'option_a' => 'سورہ الکوثر', 'option_b' => 'سورہ الاخلاص', 'option_c' => 'سورہ النصر', 'option_d' => 'سورہ الفلق', 'correct_option' => 'a', 'explanation' => 'سورہ الکوثر (سورہ نمبر 108) قرآن کی سب سے چھوٹی سورت ہے — صرف 3 آیات۔', 'category' => 'Quran', 'difficulty' => 'easy'],
            ['question_urdu' => 'لیلۃ القدر کس مہینے میں آتی ہے؟', 'question_english' => 'In which month does Laylatul Qadr occur?', 'option_a' => 'رمضان', 'option_b' => 'شعبان', 'option_c' => 'رجب', 'option_d' => 'ذوالحجہ', 'correct_option' => 'a', 'explanation' => 'لیلۃ القدر (شب قدر) رمضان کے آخری عشرے کی طاق راتوں میں آتی ہے۔', 'category' => 'Fiqh', 'difficulty' => 'easy'],
        ];

        foreach ($questions as $q) {
            DB::table('islamic_quizzes')->insert(
                array_merge($q, ['created_at' => now()])
            );
        }

        $this->command->info('✅ 20 Islamic quiz questions seeded successfully.');
    }
}
