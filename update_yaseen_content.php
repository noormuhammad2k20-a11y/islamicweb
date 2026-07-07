<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Surah;
use App\Models\SurahContentBlock;
use App\Models\SurahFaq;

$yaseen = Surah::where('number', 36)->first();

if ($yaseen) {
    // 1. Update Content Blocks
    $blocks = [
        [
            'block_type' => 'overview',
            'content_en' => '<p>Surah Yaseen (سورة يسٓ) is the 36th chapter of the Quran, consisting of 83 verses. Revealed in Makkah, it is widely revered as the "Heart of the Quran" due to its profound emphasis on the core beliefs of Islam: the Oneness of Allah (Tawheed), the truth of Prophethood (Risalah), and the undeniable reality of the Day of Resurrection (Akhirah).</p><p>The Surah beautifully presents logical arguments and vivid parables—such as the story of the People of the City—to invite reflection on life, death, and the divine power that governs the universe.</p>',
            'is_published' => true,
            'sort_order' => 1
        ],
        [
            'block_type' => 'revelation_context',
            'content_en' => '<p>Surah Yaseen was revealed during the middle Meccan period, a time of intense opposition from the Quraysh. The Prophet Muhammad (ﷺ) faced severe persecution, and the disbelievers relentlessly mocked the concept of resurrection.</p><p>Allah revealed this Surah to strengthen the Prophet’s resolve, confirm his divine mission, and deliver a stern warning to the arrogant. The opening verses swear by the "Wise Quran" to establish the undeniable truth that he is indeed one of the Messengers sent on a Straight Path.</p>',
            'is_published' => true,
            'sort_order' => 2
        ],
        [
            'block_type' => 'key_lessons',
            'content_en' => '<ul>
<li><strong>The Inevitability of Resurrection:</strong> The Surah provides physical evidence from nature—dead earth coming to life, the alternation of day and night, and the precise orbits of celestial bodies—to prove that Allah can easily recreate humans after death.</li>
<li><strong>The Truth of Prophethood:</strong> It reaffirms that the Prophet (ﷺ) was sent as a mercy and a warner, and his message is the absolute truth.</li>
<li><strong>The Consequence of Arrogance:</strong> The parable of the "Companions of the City" serves as a timeless warning against rejecting divine guidance.</li>
</ul>',
            'is_published' => true,
            'sort_order' => 3
        ],
        [
            'block_type' => 'authentic_virtues',
            'content_en' => '<p>The Prophet Muhammad (ﷺ) said: <em>"Everything has a heart, and the heart of the Quran is Yaseen. Whoever recites Yaseen, Allah will record for him the reward of reciting the Quran ten times."</em> (Sunan al-Tirmidhi)</p><p>Another authentic narration states: <em>"Recite Yaseen over those who are dying."</em> (Sunan Abi Dawud). This is because its powerful themes of the Hereafter bring peace and ease to the soul during its transition.</p>',
            'is_published' => true,
            'sort_order' => 4
        ]
    ];

    foreach ($blocks as $block) {
        SurahContentBlock::updateOrCreate(
            ['surah_id' => $yaseen->id, 'block_type' => $block['block_type']],
            $block
        );
    }

    // 2. Update FAQ for meaning
    $faq = SurahFaq::where('surah_id', $yaseen->id)
                   ->where('question_en', 'like', '%meaning%')
                   ->first();

    if ($faq) {
        $faq->update([
            'answer_en' => "The word Yaseen consists of two Arabic letters Ya (ي) and Seen (س). Most scholars consider it one of the Muqatta'at — abbreviated letters whose precise meaning is known only to Allah."
        ]);
    } else {
        // If not found, create it
        SurahFaq::create([
            'surah_id' => $yaseen->id,
            'question_en' => 'What is the meaning of Surah Yaseen?',
            'answer_en' => "The word Yaseen consists of two Arabic letters Ya (ي) and Seen (س). Most scholars consider it one of the Muqatta'at — abbreviated letters whose precise meaning is known only to Allah.",
            'is_published' => true,
            'sort_order' => 1
        ]);
    }

    echo "Surah Yaseen rich content updated successfully!\n";
} else {
    echo "Surah Yaseen not found!\n";
}
