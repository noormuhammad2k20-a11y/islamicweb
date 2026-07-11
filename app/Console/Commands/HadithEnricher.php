<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hadith;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HadithEnricher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hadith:enrich {--batch=10} {--sleep=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enrich hadiths with Urdu translation and explanations using Gemini API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            $this->error('GEMINI_API_KEY is not set in .env');
            return;
        }

        $batchSize = (int) $this->option('batch');
        $sleepTime = (int) $this->option('sleep');

        // Fetch hadiths that need enrichment (where urdu_translation is null)
        $hadiths = Hadith::whereNull('urdu_translation')->take($batchSize)->get();
        
        if ($hadiths->isEmpty()) {
            $this->info('No hadiths need enrichment at this moment.');
            return;
        }

        $this->info("Found {$hadiths->count()} hadiths to enrich. Starting...");

        foreach ($hadiths as $hadith) {
            $this->info("Enriching Hadith ID: {$hadith->id}");
            
            $prompt = "
You are an Islamic scholar. Given this hadith in English, provide:
1. Urdu translation (natural Urdu, not literal)
2. Brief explanation (2-3 sentences in English)
3. Key lessons (JSON array of 3 strings in English)
4. Practical applications (1-2 sentences)
5. Benefits (1-2 sentences)
Hadith: {$hadith->english_translation}
Reference: {$hadith->reference}
Respond ONLY in JSON, without any markdown formatting like ```json or anything else:
{
  \"urdu_translation\": \"...\",
  \"explanation\": \"...\",
  \"key_lessons\": [\"lesson1\", \"lesson2\", \"lesson3\"],
  \"practical_applications\": \"...\",
  \"benefits\": \"...\"
}
";

            try {
                $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ],
                    'generationConfig' => [
                        'response_mime_type' => 'application/json'
                    ]
                ]);

                if ($response->successful()) {
                    $responseData = $response->json();
                    
                    if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                        $jsonString = $responseData['candidates'][0]['content']['parts'][0]['text'];
                        $data = json_decode($jsonString, true);

                        if ($data) {
                            $hadith->urdu_translation = $data['urdu_translation'] ?? null;
                            $hadith->explanation = $data['explanation'] ?? null;
                            $hadith->key_lessons = isset($data['key_lessons']) ? json_encode($data['key_lessons']) : null;
                            $hadith->practical_applications = $data['practical_applications'] ?? null;
                            $hadith->benefits = $data['benefits'] ?? null;
                            $hadith->save();

                            $this->info("Successfully enriched Hadith ID: {$hadith->id}");
                        } else {
                            $this->error("Failed to parse JSON for Hadith ID: {$hadith->id}");
                            Log::error("Gemini JSON Parse Error for Hadith {$hadith->id}: ", ['response' => $jsonString]);
                        }
                    }
                } else {
                    $this->error("API Error for Hadith ID: {$hadith->id}");
                    Log::error("Gemini API Error for Hadith {$hadith->id}: " . $response->body());
                }
            } catch (\Exception $e) {
                $this->error("Exception for Hadith ID: {$hadith->id} - " . $e->getMessage());
                Log::error("Gemini Exception for Hadith {$hadith->id}: " . $e->getMessage());
            }

            // Sleep to avoid rate limiting
            sleep($sleepTime);
        }
        
        $this->info('Batch enrichment completed.');
    }
}
