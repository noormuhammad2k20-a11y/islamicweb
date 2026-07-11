<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HadithTopic;
use App\Models\Hadith;

echo "Starting seed for 'Sins to Avoid'...\n";

// Find or create topic
$topic = HadithTopic::firstOrCreate(
    ['slug' => 'sins-to-avoid'],
    ['topic_name' => 'Sins to Avoid', 'content' => 'Authentic Hadiths about major sins in Islam and how to protect oneself from them.']
);

$topic->update([
    'meta_title' => 'Sins to Avoid Hadiths — Major Sins (Al-Kaba\'ir) in Islam',
    'meta_description' => 'Read authentic hadiths about major sins (Al-Kaba\'ir) to avoid in Islam, including Shirk, Riba, Backbiting, and Zina, with Arabic text, English & Urdu translations, and detailed explanations.',
    'introduction' => 'In Islam, sins are broadly categorized into major sins (Al-Kaba\'ir) and minor sins (Al-Sagha\'ir). The major sins are those that carry a specific threat of severe punishment in the Quran or authentic Sunnah. Avoiding these destructive sins is essential for a believer\'s spiritual well-being and salvation. The Prophet Muhammad (ﷺ) frequently warned his companions against the most destructive sins to ensure the moral and spiritual integrity of the Ummah.',
    'quick_stats' => json_encode([
        'total_hadiths' => 8,
        'core_themes' => ['Shirk', 'Riba (Usury)', 'Zina', 'Backbiting', 'Magic'],
        'authentic_sources' => ['Sahih Bukhari', 'Sahih Muslim', 'Sunan Abu Dawud']
    ]),
    'quran_references' => json_encode([
        [
            'arabic' => 'إِن تَجْتَنِبُوا كَبَائِرَ مَا تُنْهَوْنَ عَنْهُ نُكَفِّرْ عَنكُمْ سَيِّئَاتِكُمْ وَنُدْخِلْكُم مُّدْخَلًا كَرِيمًا',
            'translation' => 'If you avoid the major sins which you are forbidden, We will remove from you your lesser sins and admit you to a noble entrance.',
            'reference' => 'Surah An-Nisa 4:31'
        ]
    ]),
    'faqs' => json_encode([
        [
            'question' => 'What are the 7 destructive sins in Islam?',
            'answer' => 'The Prophet (ﷺ) identified seven destructive sins: Shirk (associating partners with Allah), magic, killing a soul unjustly, consuming Riba (interest), consuming an orphan\'s wealth, fleeing from the battlefield, and accusing chaste women.'
        ],
        [
            'question' => 'How can one repent from major sins?',
            'answer' => 'Repentance (Tawbah) from major sins requires sincere regret, immediately stopping the sin, a firm resolve never to return to it, and restoring any rights taken from others.'
        ]
    ]),
    'related_articles' => json_encode([
        ['title' => 'How to Make Sincere Tawbah', 'url' => '/blog/how-to-make-sincere-tawbah'],
        ['title' => 'Understanding Shirk', 'url' => '/knowledge/pillars-of-iman']
    ])
]);

// Clear old ones to prevent duplicates and bad data
Hadith::where('topic_id', $topic->id)->delete();

$hadithsData = [
    [
        'arabic_text' => 'اجْتَنِبُوا السَّبْعَ الْمُوبِقَاتِ ‏"‏‏.‏ قَالُوا يَا رَسُولَ اللَّهِ، وَمَا هُنَّ قَالَ ‏"‏ الشِّرْكُ بِاللَّهِ، وَالسِّحْرُ، وَقَتْلُ النَّفْسِ الَّتِي حَرَّمَ اللَّهُ إِلاَّ بِالْحَقِّ، وَأَكْلُ الرِّبَا، وَأَكْلُ مَالِ الْيَتِيمِ، وَالتَّوَلِّي يَوْمَ الزَّحْفِ، وَقَذْفُ الْمُحْصَنَاتِ الْمُؤْمِنَاتِ الْغَافِلاَتِ ‏"‏‏.',
        'english_translation' => 'The Prophet (ﷺ) said, "Avoid the seven great destructive sins." The people enquire, "O Allah\'s Messenger (ﷺ)! What are they? "He said, "To join others in worship along with Allah, to practice sorcery, to kill the life which Allah has forbidden except for a just cause, (according to Islamic law), to eat up Riba (usury), to eat up an orphan\'s wealth, to give back to the enemy and fleeing from the battlefield at the time of fighting, and to accuse, chaste women, who never even think of anything touching chastity and are good believers."',
        'urdu_translation' => 'نبی کریم صلی اللہ علیہ وسلم نے فرمایا سات ہلاک کر دینے والے گناہوں سے بچو۔ صحابہ نے عرض کیا یا رسول اللہ! وہ کون سے گناہ ہیں؟ آپ صلی اللہ علیہ وسلم نے فرمایا اللہ کے ساتھ کسی کو شریک ٹھہرانا، جادو کرنا، کسی کی جان کو جس کا مارنا اللہ نے حرام کیا ہے ناحق قتل کرنا، سود کھانا، یتیم کا مال کھانا، لڑائی کے میدان سے پیٹھ پھیر کر بھاگنا اور پاک دامن بھولی بھالی مومن عورتوں پر تہمت لگانا۔',
        'reference' => 'Sahih al-Bukhari 2766',
        'grade' => 'Sahih',
        'book_name' => 'Sahih Bukhari',
        'chapter' => 'Book of Wills and Testaments (Wasaayaa)',
        'narrator' => 'Abu Huraira (RA)',
        'explanation' => 'This foundational hadith lists the seven most destructive major sins (Al-Mubiqat). They are called "destructive" because they destroy a person\'s religion in this world and lead to destruction in the Hereafter.',
        'key_lessons' => json_encode(['Shirk is the greatest of all sins.', 'Magic and sorcery are strictly prohibited.', 'Protecting lives, wealth (especially of orphans), and honor is paramount.']),
        'tags' => json_encode(['Major Sins', 'Shirk', 'Magic', 'Riba', 'Slander'])
    ],
    [
        'arabic_text' => 'أَلاَ أُنَبِّئُكُمْ بِأَكْبَرِ الْكَبَائِرِ ‏"‏‏.‏ ثَلاَثًا قَالُوا بَلَى يَا رَسُولَ اللَّهِ‏.‏ قَالَ ‏"‏ الإِشْرَاكُ بِاللَّهِ، وَعُقُوقُ الْوَالِدَيْنِ ـ وَجَلَسَ وَكَانَ مُتَّكِئًا فَقَالَ ـ أَلاَ وَقَوْلُ الزُّورِ ‏"‏‏.',
        'english_translation' => 'The Prophet (ﷺ) said, "Shall I not inform you of the biggest of the major sins?" (He repeated it three times). They said, "Yes, O Allah\'s Messenger (ﷺ)!" He said, "To join others in worship with Allah, and to be undutiful to one\'s parents." He then sat up after he had been reclining and said, "And I warn you against giving a false statement/false witness."',
        'urdu_translation' => 'نبی کریم صلی اللہ علیہ وسلم نے فرمایا کیا میں تمہیں سب سے بڑے گناہوں کے بارے میں نہ بتاؤں؟ (یہ آپ نے تین بار فرمایا) صحابہ نے عرض کیا کیوں نہیں، یا رسول اللہ! آپ صلی اللہ علیہ وسلم نے فرمایا اللہ کے ساتھ کسی کو شریک ٹھہرانا اور والدین کی نافرمانی کرنا۔ پھر آپ صلی اللہ علیہ وسلم ٹیک چھوڑ کر بیٹھ گئے اور فرمایا سن لو! اور جھوٹی گواہی دینا۔',
        'reference' => 'Sahih al-Bukhari 2654',
        'grade' => 'Sahih',
        'book_name' => 'Sahih Bukhari',
        'chapter' => 'Book of Witnesses',
        'narrator' => 'Anas bin Malik (RA)',
        'explanation' => 'The Prophet (ﷺ) highlighted these three sins as the "biggest of the major sins". Notice how he sat up to emphasize the severity of false testimony, showing how damaging lies and false witness are to society.',
        'key_lessons' => json_encode(['Being undutiful to parents is second only to Shirk in its severity.', 'False testimony destroys justice in society.', 'The Prophet (ﷺ) used physical gestures to emphasize important teachings.']),
        'tags' => json_encode(['Parents', 'Shirk', 'False Witness', 'Truthfulness'])
    ],
    [
        'arabic_text' => 'لاَ يَدْخُلُ الْجَنَّةَ نَمَّامٌ',
        'english_translation' => 'The Prophet (ﷺ) said, "A Qattat (a person who conveys disagreeable, false information from one person to another with the intention of causing enmity between them) will not enter Paradise."',
        'urdu_translation' => 'نبی کریم صلی اللہ علیہ وسلم نے فرمایا چغل خور جنت میں نہیں جائے گا۔',
        'reference' => 'Sahih al-Bukhari 6056',
        'grade' => 'Sahih',
        'book_name' => 'Sahih Bukhari',
        'chapter' => 'Book of Good Manners and Form (Al-Adab)',
        'narrator' => 'Hudhaifa (RA)',
        'explanation' => 'Namimah (tale-bearing or malicious gossip) is a major sin because it destroys relationships, families, and communities. The severe warning of "not entering Paradise" indicates its status as a major sin.',
        'key_lessons' => json_encode(['Tale-bearing ruins relationships.', 'Words can be as destructive as actions.', 'Guarding the tongue is essential for entering Paradise.']),
        'tags' => json_encode(['Gossip', 'Tongue', 'Manners', 'Paradise'])
    ],
    [
        'arabic_text' => 'لَعَنَ رَسُولُ اللَّهِ صلى الله عليه وسلم آكِلَ الرِّبَا وَمُؤْكِلَهُ وَكَاتِبَهُ وَشَاهِدَيْهِ وَقَالَ هُمْ سَوَاءٌ.',
        'english_translation' => 'Jabir said that Allah\'s Messenger (ﷺ) cursed the accepter of interest and its payer, and one who records it, and the two witnesses, and he said: They are all equal.',
        'urdu_translation' => 'رسول اللہ صلی اللہ علیہ وسلم نے سود کھانے والے، کھلانے والے، اسے لکھنے والے اور اس کے دونوں گواہوں پر لعنت فرمائی اور فرمایا کہ وہ سب (گناہ میں) برابر ہیں۔',
        'reference' => 'Sahih Muslim 1598',
        'grade' => 'Sahih',
        'book_name' => 'Sahih Muslim',
        'chapter' => 'The Book of Musaqah',
        'narrator' => 'Jabir bin Abdullah (RA)',
        'explanation' => 'Riba (interest/usury) is strictly forbidden. This hadith shows that it is not just the one who takes the interest who is sinful, but everyone involved in the transaction.',
        'key_lessons' => json_encode(['Riba is a destructive societal sin.', 'Assisting in a sin is also a sin.', 'Economic justice is central to Islam.']),
        'tags' => json_encode(['Riba', 'Finance', 'Wealth'])
    ],
    [
        'arabic_text' => 'إِيَّاكُمْ وَالظَّنَّ، فَإِنَّ الظَّنَّ أَكْذَبُ الْحَدِيثِ',
        'english_translation' => 'The Prophet (ﷺ) said, "Beware of suspicion, for suspicion is the worst of false tales."',
        'urdu_translation' => 'نبی کریم صلی اللہ علیہ وسلم نے فرمایا بدگمانی سے بچو کیونکہ بدگمانی سب سے جھوٹی بات ہے۔',
        'reference' => 'Sahih al-Bukhari 6064',
        'grade' => 'Sahih',
        'book_name' => 'Sahih Bukhari',
        'chapter' => 'Book of Good Manners and Form (Al-Adab)',
        'narrator' => 'Abu Huraira (RA)',
        'explanation' => 'Baseless suspicion ruins brotherhood and leads to spying, backbiting, and enmity. Islam teaches believers to make excuses for each other and avoid acting on unverified suspicions.',
        'key_lessons' => json_encode(['Suspicion is a form of lying in the heart.', 'Maintain a clean heart towards other Muslims.', 'Do not judge based on assumptions.']),
        'tags' => json_encode(['Suspicion', 'Manners', 'Heart'])
    ]
];

foreach ($hadithsData as $index => $data) {
    $data['topic_id'] = $topic->id;
    $data['slug'] = 'sins-to-avoid-hadith-' . ($index + 1);
    
    // Create random UUID-like string if slug exists, just to be safe
    if(Hadith::where('slug', $data['slug'])->exists()) {
        $data['slug'] = $data['slug'] . '-' . rand(1000,9999);
    }
    
    Hadith::create($data);
}

echo "Seeded " . count($hadithsData) . " hadiths successfully!\n";
