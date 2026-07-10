<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HadithTopic;
use App\Models\Hadith;
use Illuminate\Support\Str;

class HadithTopicSeeder extends Seeder
{
    public function run()
    {
        // Disable FK checks to avoid truncation error
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        
        // First delete old topics
        HadithTopic::truncate();

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $topics = [
            [
                'id' => 1,
                'topic_name' => 'Faith & Belief (Iman)',
                'slug' => 'faith-iman',
                'description' => 'Hadiths about the pillars of faith, belief in Allah, angels, prophets, and the Day of Judgment',
            ],
            [
                'id' => 2,
                'topic_name' => 'Prayer (Salah)',
                'slug' => 'prayer-salah',
                'description' => 'Hadiths about the importance, method, and virtues of the five daily prayers',
            ],
            [
                'id' => 3,
                'topic_name' => 'Fasting (Sawm)',
                'slug' => 'fasting-sawm',
                'description' => 'Hadiths about Ramadan fasting, its virtues, rules, and spiritual benefits',
            ],
            [
                'id' => 4,
                'topic_name' => 'Zakat & Charity',
                'slug' => 'zakat-charity',
                'description' => 'Hadiths about giving zakat, sadaqah, and the rewards of charitable giving',
            ],
            [
                'id' => 5,
                'topic_name' => 'Hajj & Umrah',
                'slug' => 'hajj-umrah',
                'description' => 'Hadiths about the pilgrimage to Makkah, its rites, and spiritual significance',
            ],
            [
                'id' => 6,
                'topic_name' => 'Honesty & Truthfulness',
                'slug' => 'honesty-truthfulness',
                'description' => 'Hadiths about speaking truth, keeping promises, and avoiding lies',
            ],
            [
                'id' => 7,
                'topic_name' => 'Kindness & Mercy',
                'slug' => 'kindness-mercy',
                'description' => 'Hadiths about treating others with kindness, showing mercy, and compassion',
            ],
            [
                'id' => 8,
                'topic_name' => 'Knowledge & Learning',
                'slug' => 'knowledge-learning',
                'description' => 'Hadiths about seeking knowledge, teaching, and the virtue of scholars',
            ],
            [
                'id' => 9,
                'topic_name' => 'Family & Marriage',
                'slug' => 'family-marriage',
                'description' => 'Hadiths about rights of spouses, raising children, and family relationships',
            ],
            [
                'id' => 10,
                'topic_name' => 'Business & Halal Earnings',
                'slug' => 'business-halal',
                'description' => 'Hadiths about honest trade, avoiding riba, and earning halal income',
            ],
            [
                'id' => 11,
                'topic_name' => 'Death & Afterlife',
                'slug' => 'death-afterlife',
                'description' => 'Hadiths about preparing for death, the grave, Day of Judgment, Jannah, and Jahannam',
            ],
            [
                'id' => 12,
                'topic_name' => 'Repentance (Tawbah)',
                'slug' => 'repentance-tawbah',
                'description' => 'Hadiths about seeking forgiveness from Allah and turning back to Him',
            ],
            [
                'id' => 13,
                'topic_name' => 'Dua & Dhikr',
                'slug' => 'dua-dhikr',
                'description' => 'Hadiths about the power of supplication, remembrance of Allah, and morning/evening adhkar',
            ],
            [
                'id' => 14,
                'topic_name' => 'Patience (Sabr)',
                'slug' => 'patience-sabr',
                'description' => 'Hadiths about enduring hardship, gratitude in difficulty, and trusting Allah',
            ],
            [
                'id' => 15,
                'topic_name' => 'Brotherhood & Unity',
                'slug' => 'brotherhood-unity',
                'description' => 'Hadiths about Muslim unity, loving for your brother what you love for yourself',
            ],
            [
                'id' => 16,
                'topic_name' => 'Character & Manners',
                'slug' => 'character-manners',
                'description' => 'Hadiths about good character (akhlaq), etiquettes of eating, greeting, and daily life',
            ],
            [
                'id' => 17,
                'topic_name' => 'Quran & Its Virtues',
                'slug' => 'quran-virtues',
                'description' => 'Hadiths about reading, memorizing, and acting upon the Quran',
            ],
            [
                'id' => 18,
                'topic_name' => 'Prophet Muhammad ﷺ',
                'slug' => 'prophet-muhammad',
                'description' => 'Hadiths about the life, character, and Sunnah of the Prophet ﷺ',
            ],
            [
                'id' => 19,
                'topic_name' => 'Sins to Avoid',
                'slug' => 'sins-to-avoid',
                'description' => 'Hadiths about major sins — shirk, lying, zina, murder, and how to avoid them',
            ],
            [
                'id' => 20,
                'topic_name' => 'Rights of Others',
                'slug' => 'rights-of-others',
                'description' => 'Hadiths about the rights of neighbors, parents, orphans, and the poor',
            ]
        ];

        foreach ($topics as $topic) {
            HadithTopic::create([
                'id' => $topic['id'],
                'topic_name' => $topic['topic_name'],
                'slug' => $topic['slug'],
                'content' => $topic['description'], // Using content column as mentioned in DB schema
                'description' => $topic['description'],
            ]);
        }

        // Update existing fake hadiths
        $hadiths = Hadith::all();
        foreach ($hadiths as $hadith) {
            $hadith->arabic_text = 'بَلِّغُوا عَنِّي وَلَوْ آيَةً';
            $hadith->english_translation = 'Convey from me, even if it is one verse.';
            // Assign them randomly to the new topics so we have data to see
            if (!in_array($hadith->topic_id, range(1, 20))) {
                $hadith->topic_id = rand(1, 20);
            }
            $hadith->save();
        }
    }
}
