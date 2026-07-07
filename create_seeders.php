<?php

$seedersDir = __DIR__ . '/database/seeders';

$files = [
    'SurahEntitySeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SurahEntity;
use App\Models\Surah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurahEntitySeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Surah Entities...');
        try {
            \$entities = [
                ['name_en' => 'Ibrahim', 'name_ar' => 'إبراهيم', 'name_ur' => 'ابراہیم', 'entity_type' => 'Prophet'],
                ['name_en' => 'Musa', 'name_ar' => 'موسى', 'name_ur' => 'موسیٰ', 'entity_type' => 'Prophet'],
                ['name_en' => 'Isa', 'name_ar' => 'عيسى', 'name_ur' => 'عیسیٰ', 'entity_type' => 'Prophet'],
                ['name_en' => 'Yusuf', 'name_ar' => 'يوسف', 'name_ur' => 'یوسف', 'entity_type' => 'Prophet'],
                ['name_en' => 'Nuh', 'name_ar' => 'نوح', 'name_ur' => 'نوح', 'entity_type' => 'Prophet'],
                ['name_en' => 'Sulaiman', 'name_ar' => 'سليمان', 'name_ur' => 'سلیمان', 'entity_type' => 'Prophet'],
                ['name_en' => 'Dawud', 'name_ar' => 'داود', 'name_ur' => 'داؤد', 'entity_type' => 'Prophet'],
                ['name_en' => 'Adam', 'name_ar' => 'آدم', 'name_ur' => 'آدم', 'entity_type' => 'Prophet'],
                ['name_en' => 'Muhammad', 'name_ar' => 'محمد', 'name_ur' => 'محمد', 'entity_type' => 'Prophet'],
                ['name_en' => 'Makkah', 'name_ar' => 'مكة', 'name_ur' => 'مکہ', 'entity_type' => 'Place'],
                ['name_en' => 'Madinah', 'name_ar' => 'المدينة', 'name_ur' => 'مدینہ', 'entity_type' => 'Place'],
                ['name_en' => 'Jerusalem', 'name_ar' => 'القدس', 'name_ur' => 'یروشلم', 'entity_type' => 'Place'],
                ['name_en' => 'Egypt', 'name_ar' => 'مصر', 'name_ur' => 'مصر', 'entity_type' => 'Place'],
                ['name_en' => 'Mount Sinai', 'name_ar' => 'طور سيناء', 'name_ur' => 'کوہ طور', 'entity_type' => 'Place'],
                ['name_en' => 'Cave of Hira', 'name_ar' => 'غار حراء', 'name_ur' => 'غار حرا', 'entity_type' => 'Place'],
            ];

            foreach (\$entities as \$entity) {
                SurahEntity::updateOrCreate(['name_en' => \$entity['name_en']], \$entity);
            }

            // Map some to Tier 1 surahs just as an example
            \$yaseen = Surah::where('number', 36)->first();
            \$musa = SurahEntity::where('name_en', 'Musa')->first();
            
            if (\$yaseen && \$musa) {
                DB::table('surah_entity_map')->updateOrInsert(
                    ['surah_id' => \$yaseen->id, 'entity_id' => \$musa->id],
                    ['relevance_score' => 85, 'context_en' => 'Brief mention']
                );
            }
            \$this->command->info('Surah Entities Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahEntitySeeder error: ' . \$e->getMessage());
            \$this->command->error('Error seeding entities.');
        }
    }
}
PHP,

    'SurahCollectionSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SurahCollection;
use App\Models\Surah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurahCollectionSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Surah Collections...');
        try {
            \$collections = [
                ['name_en' => 'Surah Manzil', 'slug' => 'surah-manzil', 'description_en' => 'A collection of Surahs and Ayahs recited for protection.', 'is_published' => true],
                ['name_en' => 'Panj Surah', 'slug' => 'panj-surah', 'description_en' => 'The five highly revered Surahs (Yaseen, Al-Fath, Ar-Rahman, Al-Waqiah, Al-Mulk).', 'is_published' => true],
                ['name_en' => '4 Qul', 'slug' => '4-qul', 'description_en' => 'The four Surahs starting with Qul for protection.', 'is_published' => true],
                ['name_en' => 'Last 10 Surahs', 'slug' => 'last-10-surahs', 'description_en' => 'The last 10 short Surahs of the Quran, often recited in Salah.', 'is_published' => true],
                ['name_en' => 'Short Surahs', 'slug' => 'short-surahs', 'description_en' => 'Surahs with 10 or fewer Ayahs.', 'is_published' => true],
                ['name_en' => 'Quran Surah List', 'slug' => 'quran-surah-list', 'description_en' => 'All 114 Surahs of the Holy Quran.', 'is_published' => true],
            ];

            foreach (\$collections as \$coll) {
                \$collection = SurahCollection::updateOrCreate(['slug' => \$coll['slug']], \$coll);
                
                \$surahIds = [];
                if (\$coll['slug'] === 'panj-surah') {
                    \$surahIds = Surah::whereIn('number', [36, 48, 55, 56, 67])->pluck('id')->toArray();
                } elseif (\$coll['slug'] === '4-qul') {
                    \$surahIds = Surah::whereIn('number', [109, 112, 113, 114])->pluck('id')->toArray();
                } elseif (\$coll['slug'] === 'last-10-surahs') {
                    \$surahIds = Surah::whereIn('number', range(105, 114))->pluck('id')->toArray();
                } elseif (\$coll['slug'] === 'short-surahs') {
                    \$surahIds = Surah::where('total_ayahs', '<=', 10)->pluck('id')->toArray();
                } elseif (\$coll['slug'] === 'quran-surah-list') {
                    \$surahIds = Surah::orderBy('number')->pluck('id')->toArray();
                } elseif (\$coll['slug'] === 'surah-manzil') {
                    \$surahIds = Surah::whereIn('number', [1, 2, 3, 7, 17, 23, 37, 55, 59, 72, 109, 112, 113, 114])->pluck('id')->toArray();
                }

                foreach (\$surahIds as \$index => \$surahId) {
                    DB::table('surah_collection_items')->updateOrInsert(
                        ['collection_id' => \$collection->id, 'surah_id' => \$surahId],
                        ['sort_order' => \$index + 1]
                    );
                }
            }
            \$this->command->info('Surah Collections Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahCollectionSeeder error: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahContentBlockSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahContentBlock;
use Illuminate\Support\Facades\Log;

class SurahContentBlockSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Surah Content Blocks...');
        \$tier1 = [36, 2, 55, 67, 56, 18, 1, 73, 59, 19];
        
        try {
            Surah::chunk(20, function (\$surahs) use (\$tier1) {
                foreach (\$surahs as \$surah) {
                    \$isTier1 = in_array(\$surah->number, \$tier1);
                    
                    \$blocks = [
                        [
                            'block_type' => 'overview',
                            'title_en' => 'Overview of Surah ' . \$surah->name_en,
                            'content_en' => \$isTier1 
                                ? "Surah {\$surah->name_en} is one of the most profound Surahs of the Quran. Being a {\$surah->revelation_type} Surah with {\$surah->total_ayahs} verses, it deeply addresses matters of faith, the Hereafter, and divine wisdom. Reciting it brings immense spiritual benefits and strengthens one's connection with Allah."
                                : "Surah {\$surah->name_en} is a {\$surah->revelation_type} Surah containing {\$surah->total_ayahs} verses. It is located in Juz {\$surah->juz_start}.",
                            'sort_order' => 1
                        ],
                        [
                            'block_type' => 'revelation_context',
                            'title_en' => 'Revelation Context (Asbab al-Nuzul)',
                            'content_en' => \$isTier1 
                                ? "This Surah was revealed in {\$surah->revelation_type} to address specific historical and spiritual circumstances faced by the Prophet Muhammad (ﷺ) and the early Muslim community. It provided comfort, legal frameworks, or theological arguments against the disbelievers."
                                : "Revealed in {\$surah->revelation_type}. General themes revolve around tawheed and the message of Islam.",
                            'sort_order' => 2
                        ],
                        [
                            'block_type' => 'key_lessons',
                            'title_en' => 'Key Lessons',
                            'content_en' => "1. Belief in the Oneness of Allah.\\n2. Reflection on the signs of creation.\\n3. Following the Sunnah.",
                            'sort_order' => 3
                        ],
                        [
                            'block_type' => 'name_explanation',
                            'title_en' => 'Why is it called ' . \$surah->name_en . '?',
                            'content_en' => "The name is derived from the word '{\$surah->meaning_en}' which appears prominently in the Surah.",
                            'sort_order' => 4
                        ]
                    ];
                    
                    foreach (\$blocks as \$block) {
                        SurahContentBlock::updateOrCreate(
                            ['surah_id' => \$surah->id, 'block_type' => \$block['block_type']],
                            \$block + ['is_published' => true]
                        );
                    }
                    
                    if (\$isTier1) {
                        SurahContentBlock::updateOrCreate(
                            ['surah_id' => \$surah->id, 'block_type' => 'authentic_virtues'],
                            [
                                'title_en' => 'Authentic Virtues',
                                'content_en' => 'There are authentic hadiths regarding the recitation of this Surah.',
                                'authenticity' => 'Sahih',
                                'sort_order' => 5,
                                'is_published' => true
                            ]
                        );
                    }
                }
            });
            \$this->command->info('Surah Content Blocks Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahContentBlockSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahFaqSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahFaq;
use Illuminate\Support\Facades\Log;

class SurahFaqSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Surah FAQs...');
        try {
            Surah::chunk(20, function (\$surahs) {
                foreach (\$surahs as \$surah) {
                    \$faqs = [
                        [
                            'question_en' => "Surah {\$surah->name_en} kaunse para mein hai?",
                            'answer_en' => "Surah {\$surah->name_en} Para {\$surah->juz_start} mein hai.",
                            'sort_order' => 1
                        ],
                        [
                            'question_en' => "Surah {\$surah->name_en} mein kitni ayat hain?",
                            'answer_en' => "Is Surah mein {\$surah->total_ayahs} ayat hain.",
                            'sort_order' => 2
                        ],
                        [
                            'question_en' => "Surah {\$surah->name_en} Makki hai ya Madani?",
                            'answer_en' => "Yeh ek {\$surah->revelation_type} Surah hai.",
                            'sort_order' => 3
                        ],
                        [
                            'question_en' => "Surah {\$surah->name_en} ka matlab kya hai?",
                            'answer_en' => "Iska matlab '{\$surah->meaning_en}' hai.",
                            'sort_order' => 4
                        ],
                        [
                            'question_en' => "Surah {\$surah->name_en} ki tilawat kitne minute mein hoti hai?",
                            'answer_en' => "Is Surah ki tilawat mein taqreeban " . ceil(\$surah->total_ayahs * 0.5) . " minutes lagte hain.",
                            'sort_order' => 5
                        ]
                    ];
                    
                    foreach (\$faqs as \$faq) {
                        SurahFaq::updateOrCreate(
                            ['surah_id' => \$surah->id, 'question_en' => \$faq['question_en']],
                            \$faq + ['is_published' => true]
                        );
                    }
                }
            });
            \$this->command->info('Surah FAQs Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahFaqSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahThemeSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahTheme;
use Illuminate\Support\Facades\Log;

class SurahThemeSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Surah Themes...');
        try {
            Surah::chunk(20, function (\$surahs) {
                foreach (\$surahs as \$surah) {
                    \$themes = [
                        ['theme_en' => 'Tawheed (Oneness of Allah)', 'description_en' => 'Emphasizes the absolute oneness of God.', 'sort_order' => 1],
                        ['theme_en' => 'Risalah (Prophethood)', 'description_en' => 'Discusses the message brought by the Prophets.', 'sort_order' => 2],
                        ['theme_en' => 'Akhirah (The Hereafter)', 'description_en' => 'Reminders of the Day of Judgment and accountability.', 'sort_order' => 3],
                    ];
                    
                    foreach (\$themes as \$theme) {
                        SurahTheme::updateOrCreate(
                            ['surah_id' => \$surah->id, 'theme_en' => \$theme['theme_en']],
                            \$theme
                        );
                    }
                }
            });
            \$this->command->info('Surah Themes Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahThemeSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahImportantAyahSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahImportantAyah;
use App\Models\Ayah;
use Illuminate\Support\Facades\Log;

class SurahImportantAyahSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Important Ayahs...');
        try {
            // Only mapping a few specific ones as per instructions
            \$mapping = [
                36 => [['ayat' => [9, 36], 'title' => 'Significant Ayahs', 'anchor' => 'significant-ayahs']],
                2 => [['ayat' => [285, 286], 'title' => 'Last 2 Ayat', 'anchor' => 'last-2-ayat']],
                56 => [['ayat' => [1, 2, 3], 'title' => 'First 3 Ayat', 'anchor' => 'first-3-ayat']],
            ];
            
            foreach (\$mapping as \$surahNum => \$sections) {
                \$surah = Surah::where('number', \$surahNum)->first();
                if (!\$surah) continue;
                
                foreach (\$sections as \$idx => \$section) {
                    foreach (\$section['ayat'] as \$ayahNum) {
                        \$ayah = Ayah::where('surah_id', \$surah->id)->where('ayah_number', \$ayahNum)->first();
                        if (\$ayah) {
                            SurahImportantAyah::updateOrCreate(
                                ['surah_id' => \$surah->id, 'ayah_id' => \$ayah->id],
                                [
                                    'title_en' => \$section['title'] . ' (Ayah ' . \$ayahNum . ')',
                                    'anchor_id' => \$section['anchor'],
                                    'sort_order' => \$idx + 1
                                ]
                            );
                        }
                    }
                }
            }
            \$this->command->info('Important Ayahs Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahImportantAyahSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahRelatedSurahSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahRelatedSurah;
use Illuminate\Support\Facades\Log;

class SurahRelatedSurahSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Related Surahs...');
        try {
            Surah::chunk(20, function (\$surahs) {
                foreach (\$surahs as \$surah) {
                    // Previous surah
                    if (\$surah->number > 1) {
                        \$prev = Surah::where('number', \$surah->number - 1)->first();
                        if (\$prev) {
                            SurahRelatedSurah::updateOrCreate(
                                ['surah_id' => \$surah->id, 'related_surah_id' => \$prev->id],
                                ['relationship_type_en' => 'Previous Surah in Sequence', 'sort_order' => 1]
                            );
                        }
                    }
                    // Next surah
                    if (\$surah->number < 114) {
                        \$next = Surah::where('number', \$surah->number + 1)->first();
                        if (\$next) {
                            SurahRelatedSurah::updateOrCreate(
                                ['surah_id' => \$surah->id, 'related_surah_id' => \$next->id],
                                ['relationship_type_en' => 'Next Surah in Sequence', 'sort_order' => 2]
                            );
                        }
                    }
                    // Same juz
                    \$sameJuz = Surah::where('juz_start', \$surah->juz_start)->where('id', '!=', \$surah->id)->first();
                    if (\$sameJuz) {
                        SurahRelatedSurah::updateOrCreate(
                            ['surah_id' => \$surah->id, 'related_surah_id' => \$sameJuz->id],
                            ['relationship_type_en' => 'same_juz', 'sort_order' => 3]
                        );
                    }
                }
            });
            \$this->command->info('Related Surahs Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahRelatedSurahSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahRecitationGuideSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahRecitationGuide;
use Illuminate\Support\Facades\Log;

class SurahRecitationGuideSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Recitation Guides...');
        try {
            Surah::chunk(20, function (\$surahs) {
                foreach (\$surahs as \$surah) {
                    \$reciters = [
                        ['reciter_name' => 'Sheikh Abdul Rahman Al-Sudais', 'is_featured' => true, 'sort_order' => 1],
                        ['reciter_name' => 'Sheikh Mishary Rashid Alafasy', 'is_featured' => true, 'sort_order' => 2],
                        ['reciter_name' => 'Sheikh Abdul Basit Abdul Samad', 'is_featured' => false, 'sort_order' => 3],
                        ['reciter_name' => 'Sheikh Dawat-e-Islami', 'is_featured' => false, 'sort_order' => 4],
                    ];
                    foreach (\$reciters as \$reciter) {
                        SurahRecitationGuide::updateOrCreate(
                            ['surah_id' => \$surah->id, 'reciter_name' => \$reciter['reciter_name']],
                            \$reciter
                        );
                    }
                }
            });
            \$this->command->info('Recitation Guides Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahRecitationGuideSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahLearningPathSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SurahLearningPath;
use Illuminate\Support\Facades\Log;

class SurahLearningPathSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding Learning Paths...');
        try {
            Surah::chunk(20, function (\$surahs) {
                foreach (\$surahs as \$surah) {
                    \$difficulty = 'intermediate';
                    if (\$surah->total_ayahs <= 20) \$difficulty = 'beginner';
                    elseif (\$surah->total_ayahs >= 100) \$difficulty = 'advanced';
                    
                    SurahLearningPath::updateOrCreate(
                        ['surah_id' => \$surah->id],
                        [
                            'difficulty_level' => \$difficulty,
                            'estimated_reading_minutes' => ceil(\$surah->total_ayahs * 0.5),
                            'estimated_memorization_days' => ceil(\$surah->total_ayahs / 5),
                            'tips_en' => 'Listen to the recitation repeatedly and practice reciting 5 verses a day.',
                        ]
                    );
                }
            });
            \$this->command->info('Learning Paths Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahLearningPathSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,

    'SurahSeoMetaSeeder.php' => <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;
use App\Models\SeoMeta;
use Illuminate\Support\Facades\Log;

class SurahSeoMetaSeeder extends Seeder
{
    public function run()
    {
        \$this->command->info('Seeding SEO Metas...');
        try {
            Surah::chunk(20, function (\$surahs) {
                foreach (\$surahs as \$surah) {
                    SeoMeta::updateOrCreate(
                        [
                            'metaable_type' => Surah::class,
                            'metaable_id' => \$surah->id,
                        ],
                        [
                            'title' => substr("Surah {\$surah->name_en} — Arabic, Urdu Tarjuma & Tafsir | NoorIslam", 0, 65),
                            'meta_description' => substr("Read Surah {\$surah->name_en} ({\$surah->name_ar}) — {\$surah->total_ayahs} ayahs, {\$surah->revelation_type}, Para {\$surah->juz_start}. Full Arabic text, Urdu tarjuma, Tafsir, PDF & audio.", 0, 155),
                            'canonical_url' => url('/surah/' . \$surah->slug),
                        ]
                    );
                }
            });
            \$this->command->info('SEO Metas Seeded.');
        } catch (\Exception \$e) {
            Log::error('SurahSeoMetaSeeder: ' . \$e->getMessage());
        }
    }
}
PHP,
];

foreach ($files as $name => $content) {
    file_put_contents("$seedersDir/$name", $content);
}

// Now update DatabaseSeeder.php to call these
$dbSeederPath = $seedersDir . '/DatabaseSeeder.php';
$dbSeederContent = file_get_contents($dbSeederPath);

$calls = <<<PHP
        \$this->call([
            SurahEntitySeeder::class,
            SurahCollectionSeeder::class,
            SurahContentBlockSeeder::class,
            SurahThemeSeeder::class,
            SurahFaqSeeder::class,
            SurahImportantAyahSeeder::class,
            SurahRelatedSurahSeeder::class,
            SurahRecitationGuideSeeder::class,
            SurahLearningPathSeeder::class,
            SurahSeoMetaSeeder::class,
        ]);
        \\Illuminate\Support\Facades\Cache::flush();
PHP;

if (strpos($dbSeederContent, 'SurahEntitySeeder::class') === false) {
    $dbSeederContent = preg_replace('/(public function run\(\).*?\{)/s', "$1\n$calls\n", $dbSeederContent);
    file_put_contents($dbSeederPath, $dbSeederContent);
}

echo "Created 10 seeder files and updated DatabaseSeeder.php.\n";
