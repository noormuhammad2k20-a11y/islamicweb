<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hadith;
use Illuminate\Support\Str;

class HadithCollectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define some mock/sample hadiths for collections 2 to 12
        $sampleHadiths = [
            2 => [
                'name' => 'Sahih Muslim',
                'hadiths' => [
                    [
                        'arabic_text' => 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ',
                        'english_translation' => 'Verily, deeds are only with intentions.',
                        'reference' => 'Sahih Muslim 1907',
                        'grade' => 'Sahih',
                        'book_name' => 'The Book on Government',
                        'hadith_number' => '1907',
                        'sahih_grade' => 'Sahih',
                        'narrator' => 'Umar bin Al-Khattab',
                        'chapter_number' => '33',
                    ],
                    [
                        'arabic_text' => 'مَنْ أَحْدَثَ فِي أَمْرِنَا هَذَا مَا لَيْسَ فِيهِ فَهُوَ رَدٌّ',
                        'english_translation' => 'He who innovates something in this matter of ours that is not of it will have it rejected.',
                        'reference' => 'Sahih Muslim 1718',
                        'grade' => 'Sahih',
                        'book_name' => 'The Book of Judgements',
                        'hadith_number' => '1718',
                        'sahih_grade' => 'Sahih',
                        'narrator' => 'Aisha',
                        'chapter_number' => '30',
                    ]
                ]
            ],
            3 => [
                'name' => 'Sunan Abu Dawud',
                'hadiths' => [
                    [
                        'arabic_text' => 'لاَ يُؤْمِنُ أَحَدُكُمْ حَتَّى يُحِبَّ لأَخِيهِ مَا يُحِبُّ لِنَفْسِهِ',
                        'english_translation' => 'None of you believes until he loves for his brother what he loves for himself.',
                        'reference' => 'Sunan Abu Dawud 5122',
                        'grade' => 'Sahih',
                        'book_name' => 'General Behavior',
                        'hadith_number' => '5122',
                        'sahih_grade' => 'Sahih',
                        'narrator' => 'Anas bin Malik',
                        'chapter_number' => '43',
                    ]
                ]
            ]
        ];

        foreach ($sampleHadiths as $collectionId => $data) {
            foreach ($data['hadiths'] as $hadith) {
                $slug = Str::slug($hadith['reference']);
                
                Hadith::firstOrCreate(
                    ['slug' => $slug],
                    [
                        'arabic_text' => $hadith['arabic_text'],
                        'english_translation' => $hadith['english_translation'],
                        'urdu_translation' => null, // will be filled by Task 4
                        'reference' => $hadith['reference'],
                        'grade' => $hadith['grade'],
                        'book_name' => $hadith['book_name'],
                        'hadith_number' => $hadith['hadith_number'],
                        'sahih_grade' => $hadith['sahih_grade'],
                        'narrator' => $hadith['narrator'],
                        'narrator_id' => null,
                        'collection_id' => $collectionId,
                        'chapter_number' => $hadith['chapter_number'],
                        'grade_explanation' => 'Agreed upon authentic narration.',
                    ]
                );
            }
        }
    }
}
