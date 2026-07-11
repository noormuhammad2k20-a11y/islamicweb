<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HadithTopic;
use App\Models\Hadith;
use Illuminate\Support\Facades\DB;

class HadithTopicLinker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hadith:link-topics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Link hadiths to topics using keyword mapping';

    protected $topicKeywords = [
        1  => ['faith', 'iman', 'believe', 'belief', 'believer', 'disbelief', 'hypocrite'],
        2  => ['islam', 'muslim', 'prayer', 'zakat', 'fasting', 'hajj', 'testify', 'five pillars'],
        3  => ['tawheed', 'oneness', 'none has the right to be worshipped', 'associate', 'shirk', 'alone'],
        4  => ['ihsan', 'perfection', 'as if you see him', 'excellence', 'worship as if'],
        5  => ['prayer', 'salah', 'prostrate', 'bow', 'ruku', 'sujud', 'mosque', 'congregation', 'imam leads', 'wudu', 'ablution', 'qibla', 'asr', 'fajr', 'isha', 'maghrib', 'zuhr'],
        6  => ['wudu', 'ablution', 'wash', 'wiping', 'feet', 'clean before prayer'],
        7  => ['adhan', 'call to prayer', 'iqama', 'muezzin'],
        8  => ['friday', 'jumuah', 'jumu\'ah', 'khutbah', 'friday prayer'],
        9  => ['tahajjud', 'night prayer', 'qiyam', 'night of qadr', 'laylatul qadr', 'last third of night'],
        10 => ['ramadan', 'laylatul qadr', 'night of decree', 'month of ramadan', 'tarawih'],
        11 => ['fasting', 'fast', 'sawm', 'suhoor', 'iftar', 'observe fast'],
        12 => ['zakat', 'alms', 'obligatory charity', 'poor due', 'nisab'],
        13 => ['charity', 'sadaqah', 'give', 'donation', 'spend in allah\'s cause', 'alms-giving'],
        14 => ['hajj', 'pilgrimage', 'mecca', 'mina', 'arafat', 'rami', 'tawaf', 'ihram', 'ka\'ba'],
        15 => ['umrah', 'lesser pilgrimage', 'mecca', 'tawaf'],
        16 => ['dua', 'supplication', 'invoke', 'pray to allah', 'ask allah'],
        17 => ['dhikr', 'remembrance', 'glorify', 'praise allah', 'subhan', 'alhamdulillah', 'allahu akbar', 'la ilaha'],
        18 => ['istighfar', 'forgiveness', 'seek forgiveness', 'repent', 'tawbah', 'sins forgiven'],
        19 => ['repentance', 'tawbah', 'repent', 'turn to allah', 'sins forgiven', 'forgive'],
        20 => ['quran', 'qur\'an', 'book of allah', 'revelation', 'recite', 'verse', 'surah'],
        21 => ['tafsir', 'interpretation', 'explanation of quran', 'verse meaning'],
        22 => ['knowledge', 'learn', 'teach', 'scholar', 'seek knowledge', 'ignorance', 'learned men'],
        23 => ['parents', 'mother', 'father', 'obey parents', 'dutifulness to parents', 'birr'],
        24 => ['mother', 'she suckled', 'umm', 'mother\'s right'],
        25 => ['father', 'his father', 'dad', 'paternal'],
        26 => ['children', 'child', 'son', 'daughter', 'offspring', 'kid'],
        27 => ['marriage', 'marry', 'wife', 'husband', 'nikah', 'dowry', 'divorce'],
        28 => ['family', 'household', 'relatives', 'kith and kin', 'kinship', 'silat ar-rahim'],
        29 => ['women', 'woman', 'female', 'wife', 'mother', 'daughter'],
        30 => ['brotherhood', 'brother', 'muslim brother', 'love for his brother', 'fellow muslim'],
        31 => ['neighbour', 'neighbor', 'next door', 'adjacent'],
        32 => ['business', 'trade', 'selling', 'buying', 'transaction', 'market', 'merchant', 'seller'],
        33 => ['halal earnings', 'lawful earning', 'provision', 'rizq', 'earning'],
        34 => ['riba', 'usury', 'interest', 'loan with interest'],
        35 => ['justice', 'just', 'fairness', 'equity', 'oppression', 'wrongdoing'],
        36 => ['honesty', 'honest', 'truthful', 'truth', 'truthfulness', 'true'],
        37 => ['trustworthy', 'trust', 'amanah', 'betrays', 'dishonest', 'broken trust'],
        38 => ['patience', 'sabr', 'patient', 'endure', 'trials', 'hardship'],
        39 => ['gratitude', 'shukr', 'grateful', 'thankful', 'thank allah', 'blessings'],
        40 => ['mercy', 'rahmah', 'merciful', 'compassion', 'kind to others', 'rahman'],
        41 => ['kindness', 'kind', 'gentle', 'softness', 'rifq'],
        42 => ['character', 'akhlaq', 'manners', 'morals', 'good conduct', 'character of prophet'],
        43 => ['backbiting', 'gheebah', 'gossip', 'slander', 'mention your brother'],
        44 => ['envy', 'hasad', 'jealousy', 'jealous', 'covet'],
        45 => ['anger', 'angry', 'do not get angry', 'control anger', 'wrath'],
        46 => ['major sins', 'kaba\'ir', 'grave sin', 'great sin', 'severe punishment', 'seven destructive'],
        47 => ['minor sins', 'small sins', 'lesser sins'],
        48 => ['death', 'die', 'dying', 'funeral', 'passed away', 'deceased', 'mortality'],
        49 => ['grave', 'qabr', 'buried', 'burial', 'tomb', 'questioning in grave'],
        50 => ['barzakh', 'intermediate stage', 'between death and resurrection'],
        51 => ['resurrection', 'raised', 'day of rising', 'ba\'th', 'yawm al-qiyamah'],
        52 => ['day of judgment', 'judgment day', 'resurrection', 'when the hour', 'accounts', 'reckoning'],
        53 => ['paradise', 'jannah', 'garden', 'rivers of honey', 'houri', 'enter paradise'],
        54 => ['hellfire', 'hell', 'jahannam', 'fire', 'punishment', 'enter hell'],
        55 => ['prophet muhammad', 'messenger of allah', 'apostle', 'prophet ﷺ', 'allah\'s messenger'],
        56 => ['companions', 'sahabah', 'sahabi', 'ansar', 'muhajirun'],
        57 => ['good manners', 'adab', 'etiquette', 'greet', 'salaam', 'respect'],
        58 => ['food', 'drink', 'eat', 'meal', 'hunger', 'halal food', 'haram food', 'slaughter'],
        59 => ['dress', 'modesty', 'hijab', 'clothing', 'awrah', 'cover', 'garment'],
        60 => ['purification', 'taharah', 'purity', 'clean', 'impurity', 'ghusl', 'bath'],
        61 => ['travel', 'journey', 'safar', 'traveler', 'on the road', 'riding'],
        62 => ['health', 'medicine', 'sick', 'disease', 'cure', 'ruqya', 'black seed', 'honey as cure'],
        63 => ['morning', 'adhkar morning', 'upon waking', 'start of day', 'dawn dhikr'],
        64 => ['evening', 'adhkar evening', 'night dhikr', 'before sleeping', 'end of day'],
        65 => ['sleep', 'sleeping', 'bedtime', 'before sleep', 'upon waking'],
        66 => ['visiting sick', 'visit the sick', 'ill person', 'hospital'],
        67 => ['funeral', 'janazah', 'burial', 'condolences', 'coffin', 'shroud', 'wash the dead'],
        68 => ['leadership', 'leader', 'ruler', 'authority', 'governance', 'imam of state'],
        69 => ['education', 'teach', 'learning', 'student', 'scholar'],
        70 => ['children rights', 'right of child', 'caring for children'],
        71 => ['orphan', 'yateem', 'fatherless child', 'care for orphan'],
        72 => ['animals', 'animal rights', 'bird', 'dog', 'cat', 'beast of burden', 'do not harm animals'],
        73 => ['environment', 'tree', 'plant', 'water', 'earth', 'nature', 'greenery'],
        74 => ['time', 'time management', 'precious time', 'waste time', 'opportunity'],
        75 => ['youth', 'young man', 'young person', 'young age', 'childhood'],
        76 => ['elders', 'elderly', 'old person', 'respect elders', 'senior'],
        77 => ['guest', 'hospitality', 'hosting', 'visitor', 'welcome'],
        78 => ['promise', 'oath', 'covenant', 'vow', 'pledge'],
        79 => ['jihad', 'striving', 'fighting in allah\'s cause', 'mujahid', 'battle'],
        80 => ['martyrdom', 'shaheed', 'martyr', 'die in allah\'s cause', 'killed in battle'],
        81 => ['debt', 'owe', 'borrowed', 'creditor', 'debtor', 'loan'],
        82 => ['inheritance', 'will', 'estate', 'bequest', 'heir'],
        83 => ['cleanliness', 'clean', 'purity', 'dirt', 'filth', 'remove harm'],
        84 => ['smile', 'smiling', 'cheerful', 'glad face', 'laughter'],
        85 => ['gift', 'giving gifts', 'present', 'hadiya'],
        86 => ['forgiveness', 'forgive', 'pardon', 'overlook', 'excuse'],
        87 => ['humility', 'humble', 'modesty', 'lowering oneself', 'not arrogant'],
        88 => ['arrogance', 'kibr', 'proud', 'haughty', 'boastful', 'show off'],
        89 => ['hypocrisy', 'nifaq', 'hypocrite', 'munafiq', 'two-faced'],
        90 => ['lying', 'lie', 'liar', 'false', 'tells a lie', 'fabricate'],
        91 => ['cheating', 'cheat', 'deceive', 'fraud', 'deception'],
        92 => ['modesty', 'haya', 'bashfulness', 'shyness', 'hayaa'],
        93 => ['generosity', 'generous', 'give freely', 'liberal', 'munificent'],
        94 => ['miserliness', 'miser', 'stingy', 'niggardly', 'withhold'],
        95 => ['contentment', 'qana\'ah', 'satisfied', 'content with little', 'not greedy'],
        96 => ['tawakkul', 'trust in allah', 'rely on allah', 'put trust', 'depend on allah'],
        97 => ['taqwa', 'fear of allah', 'god-fearing', 'piety', 'consciousness of allah'],
        98 => ['hope', 'hope in allah', 'hope for mercy', 'optimism', 'raja'],
        99 => ['love of allah', 'love allah', 'love for allah', 'allah loves'],
        100 => ['love of prophet', 'love for prophet', 'love the messenger', 'dearer than anything'],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $topics = HadithTopic::all()->keyBy('id');
        $hadiths = Hadith::all();
        $insertData = [];

        foreach ($hadiths as $hadith) {
            $keywordsJson = json_decode($hadith->keywords ?? '[]', true);
            $keywordsStr = is_array($keywordsJson) ? implode(' ', $keywordsJson) : '';
            $text = strtolower($hadith->english_translation . ' ' . $keywordsStr);

            foreach ($this->topicKeywords as $topicId => $keywords) {
                foreach ($keywords as $keyword) {
                    if (str_contains($text, strtolower($keyword))) {
                        $insertData[] = [
                            'hadith_id' => $hadith->id,
                            'hadith_topic_id' => $topicId,
                        ];
                        break; // only add once per topic per hadith
                    }
                }
            }

            // Ensure every hadith is linked to AT LEAST topic 55 (Prophet Muhammad)
            // since all are from Bukhari narrating about the Prophet ﷺ
            $hasProphet = collect($insertData)->where('hadith_id', $hadith->id)->where('hadith_topic_id', 55)->count();
            if (!$hasProphet) {
                $insertData[] = ['hadith_id' => $hadith->id, 'hadith_topic_id' => 55];
            }
        }

        // Deduplicate
        $insertData = collect($insertData)->unique(function($row) {
            return $row['hadith_id'].'-'.$row['hadith_topic_id'];
        })->values()->toArray();

        // Chunk insert
        foreach (array_chunk($insertData, 500) as $chunk) {
            DB::table('hadith_hadith_topic')->insertOrIgnore($chunk);
        }

        $this->info('Done. ' . count($insertData) . ' topic links inserted.');
    }
}
