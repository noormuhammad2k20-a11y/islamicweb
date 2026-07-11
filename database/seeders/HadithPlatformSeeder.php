<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HadithPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Collections
        $collections = [
            [
                'name_en' => 'Sahih Bukhari',
                'name_ar' => 'صحيح البخاري',
                'slug' => 'sahih-bukhari',
                'reliability' => 'Sahih (Most Authentic)',
                'introduction' => 'Sahih al-Bukhari is recognized by the overwhelming majority of the Muslim world to be one of the most authentic collections of the Sunnah of the Prophet (pbuh).',
            ],
            [
                'name_en' => 'Sahih Muslim',
                'name_ar' => 'صحيح مسلم',
                'slug' => 'sahih-muslim',
                'reliability' => 'Sahih (Most Authentic)',
                'introduction' => 'Sahih Muslim is one of the Al-Kutub Al-Sittah (six major hadith collections) in Sunni Islam. It is highly acclaimed by Sunni Muslims and considered the second most authentic hadith collection after Sahih al-Bukhari.',
            ]
        ];

        foreach ($collections as $c) {
            \App\Models\HadithCollection::updateOrCreate(['slug' => $c['slug']], $c);
        }

        // 2. Create Narrators
        $narrators = [
            [
                'name_en' => 'Abu Hurairah',
                'name_ar' => 'أبو هريرة',
                'slug' => 'abu-hurairah',
                'biography' => 'Abu Hurairah was one of the most prominent companions of Prophet Muhammad (pbuh) and the most prolific narrator of hadith in Sunni Islam.',
            ],
            [
                'name_en' => 'Anas bin Malik',
                'name_ar' => 'أنس بن مالك',
                'slug' => 'anas-bin-malik',
                'biography' => 'Anas ibn Malik was a well-known sahabi (companion) of the Prophet Muhammad (pbuh) who served him for ten years.',
            ]
        ];

        foreach ($narrators as $n) {
            \App\Models\HadithNarrator::updateOrCreate(['slug' => $n['slug']], $n);
        }

        // 3. Update 'sins-to-avoid' topic
        $topic = \App\Models\HadithTopic::where('slug', 'sins-to-avoid')->first();
        if ($topic) {
            $topic->update([
                'topic_name_arabic' => 'الذنوب التي يجب تجنبها',
                'topic_name_urdu' => 'بچنے کے گناہ',
                'introduction' => 'Islam warns against major and minor sins that corrupt the soul and society. Avoiding them is key to spiritual success.',
                'common_misconceptions' => json_encode([
                    ['myth' => 'All sins are equal in Islam.', 'fact' => 'Islam categorizes sins into major (Al-Kaba\'ir) and minor (As-Sagha\'ir). Major sins require sincere repentance.'],
                    ['myth' => 'God does not forgive repeated sins.', 'fact' => 'Allah is Ar-Rahman; as long as the repentance is sincere and the person strives to stop, Allah forgives.']
                ]),
                'quran_references' => json_encode([
                    ['arabic' => 'إِن تَجْتَنِبُوا كَبَائِرَ مَا تُنْهَوْنَ عَنْهُ نُكَفِّرْ عَنكُمْ سَيِّئَاتِكُمْ', 'translation' => 'If you avoid the major sins which you are forbidden, We will remove from you your lesser sins...', 'reference' => 'Surah An-Nisa 4:31']
                ]),
                'quick_stats' => json_encode([
                    'total_hadiths' => $topic->hadiths()->count(),
                    'authentic_sources' => ['Sahih Bukhari', 'Sahih Muslim', 'Sunan Abi Dawud']
                ])
            ]);

            // Update some hadiths in this topic
            $abuHurairah = \App\Models\HadithNarrator::where('slug', 'abu-hurairah')->first();
            $bukhari = \App\Models\HadithCollection::where('slug', 'sahih-bukhari')->first();

            $hadiths = $topic->hadiths()->get();
            foreach ($hadiths as $index => $h) {
                if ($index % 2 == 0) {
                    $h->update([
                        'narrator_id' => $abuHurairah->id ?? null,
                        'collection_id' => $bukhari->id ?? null,
                        'narrator' => 'Abu Hurairah',
                        'book_name' => 'Sahih Bukhari',
                        'related_duas' => json_encode([
                            ['title' => 'Dua for forgiveness', 'url' => '/dua/forgiveness']
                        ]),
                        'key_lessons' => json_encode([
                            'Always seek Allah\'s protection from sins.',
                            'Major sins destroy good deeds.'
                        ]),
                        'explanation' => 'This hadith clearly delineates the boundaries of major sins and emphasizes the importance of avoiding them completely.',
                        'tags' => json_encode(['Major Sins', 'Repentance', 'Protection'])
                    ]);
                }
            }
        }
    }
}
