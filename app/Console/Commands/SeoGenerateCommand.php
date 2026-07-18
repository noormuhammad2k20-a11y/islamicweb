<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Surah;
use App\Models\Wazifa;
use App\Models\IslamicName;
use App\Models\SeoMeta;

class SeoGenerateCommand extends Command
{
    protected $signature = 'seo:generate {type : The type of content to generate (wazaif, surahs, names)} {--batch=10} {--sleep=2}';
    protected $description = 'Generate SEO metas using Gemini API for missing content';

    public function handle()
    {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            $this->error('GEMINI_API_KEY is not set in .env');
            return;
        }

        $type = $this->argument('type');
        $batchSize = (int) $this->option('batch');
        $sleepTime = (int) $this->option('sleep');

        switch ($type) {
            case 'wazaif':
                $this->generateWazaif($apiKey, $batchSize, $sleepTime);
                break;
            case 'surahs':
                $this->generateSurahs($apiKey, $batchSize, $sleepTime);
                break;
            case 'names':
                $this->generateNames($apiKey, $batchSize, $sleepTime);
                break;
            default:
                $this->error("Invalid type. Choose 'wazaif', 'surahs', or 'names'.");
        }
    }

    private function generateWazaif($apiKey, $batchSize, $sleepTime)
    {
        // Finding wazaif where title doesn't have Roman Urdu (we'll check for pure Urdu characters or missing Roman)
        // A simple heuristic is finding titles that don't have ascii characters in the first 10 letters, or just we do it for all if they are missing
        $wazaif = Wazifa::all();
        $count = 0;
        
        foreach ($wazaif as $wazifa) {
            $seoMeta = $wazifa->seoMeta;
            if (!$seoMeta) {
                // Let's create it if missing
                $seoMeta = new SeoMeta(['metaable_id' => $wazifa->id, 'metaable_type' => Wazifa::class]);
            }
            
            // Check if title has Roman Urdu (indicated by a dash before the Urdu script)
            // Current format is 'رزق کی وسعت کا وظیفہ | NoorIslam'
            // Desired is 'Rizq Ka Wazifa — رزق کی وسعت کا وظیفہ | NoorIslam'
            if ($seoMeta->title && strpos($seoMeta->title, '—') !== false) {
                continue; // It already has Roman Urdu
            }

            if ($count >= $batchSize) break;
            $count++;

            $this->info("Enriching Wazifa ID: {$wazifa->id}");
            
            $prompt = "
You are an Islamic SEO expert for NoorIslam.com targeting Pakistani Muslims.
Task: Generate bilingual SEO title for a Wazifa page.
RULES:
- Title: 45–58 characters
- Format: \"[Roman Urdu Name] — [Urdu Script] | NoorIslam\"
- Start with Roman Urdu (for search matching)
- Description: 148-155 chars, include purpose, \"Authentic\", \"with method\", \"NoorIslam par\"

Wazifa Details:
- Title Urdu: {$wazifa->title}
- Purpose/Benefit: {$wazifa->benefit}
- Reference: {$wazifa->reference}

Respond ONLY in JSON, no markdown formatting:
{
  \"title\": \"...\",
  \"meta_description\": \"...\"
}
";
            $this->callGemini($apiKey, $prompt, $seoMeta, $wazifa->id, 'Wazifa', $sleepTime);
        }
        $this->info("Processed $count Wazaif.");
    }

    private function generateSurahs($apiKey, $batchSize, $sleepTime)
    {
        // 98 surah descriptions are too short (< 130 chars)
        $surahs = Surah::all();
        $count = 0;

        foreach ($surahs as $surah) {
            $seoMeta = $surah->seoMeta;
            if (!$seoMeta) continue;

            if (strlen($seoMeta->meta_description) >= 148) {
                continue; // Already long enough
            }

            if ($count >= $batchSize) break;
            $count++;

            $this->info("Extending Surah ID: {$surah->id}");
            
            $prompt = "
You are an Islamic SEO expert for NoorIslam.com.
Task: Extend a Surah meta description from ~120 chars to exactly 148–155 chars.
RULES:
- Keep existing content, just extend
- End with \"NoorIslam par.\" or \"NoorIslam par parhen.\"

Surah Details:
- Name: {$surah->name_english}
- Current description: {$seoMeta->meta_description}

Respond ONLY in JSON, no markdown formatting:
{
  \"meta_description\": \"...\"
}
";
            $this->callGemini($apiKey, $prompt, $seoMeta, $surah->id, 'Surah', $sleepTime, true);
        }
        $this->info("Processed $count Surahs.");
    }

    private function generateNames($apiKey, $batchSize, $sleepTime)
    {
        // 117 missing entries
        $names = IslamicName::whereDoesntHave('seoMeta')->take($batchSize)->get();
        
        $count = 0;
        foreach ($names as $name) {
            $seoMeta = new SeoMeta(['metaable_id' => $name->id, 'metaable_type' => IslamicName::class]);
            
            $count++;
            $this->info("Generating Name ID: {$name->id}");
            
            $prompt = "
You are an Islamic names SEO expert for NoorIslam.com.
Task: Generate SEO meta for an Islamic name page.
RULES:
- Title: 40–55 chars. Format: \"[Name] — Islamic [Boy/Girl] Name Meaning | NoorIslam\"
- Description: 148–155 chars exactly
- Pakistani audience — mix Roman Urdu + English

Name Details:
- Name (English): {$name->name_english}
- Name (Urdu): {$name->name_urdu}
- Gender: {$name->gender}
- Meaning (English): {$name->meaning_english}
- Meaning (Urdu): {$name->meaning_urdu}

Respond ONLY in JSON, no markdown formatting:
{
  \"title\": \"...\",
  \"meta_description\": \"...\"
}
";
            $this->callGemini($apiKey, $prompt, $seoMeta, $name->id, 'IslamicName', $sleepTime);
        }
        $this->info("Processed $count Names.");
    }

    private function callGemini($apiKey, $prompt, $seoMeta, $modelId, $modelName, $sleepTime, $onlyDescription = false, $attempt = 1)
    {
        try {
            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
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
                    $text = $responseData['candidates'][0]['content']['parts'][0]['text'];
                    $text = preg_replace('/```json\s*/', '', $text);
                    $text = preg_replace('/```\s*/', '', $text);
                    $json = json_decode($text, true);

                    if ($json) {
                        $seoMeta->title = $json['title'] ?? $seoMeta->title;
                        
                        if (!$onlyDescription) {
                            $seoMeta->meta_description = $json['meta_description'] ?? $seoMeta->meta_description;
                        } else {
                            $seoMeta->meta_description = $json['meta_description'] ?? $seoMeta->meta_description;
                        }
                        
                        $seoMeta->save();
                        $this->info("Successfully updated $modelName ID: $modelId");
                    } else {
                        $this->error("JSON Parse Error for $modelName ID: $modelId. Raw: $text");
                    }
                } else {
                    $this->error("Invalid response structure for $modelName ID: $modelId");
                }
            } else {
                $status = $response->status();
                if ($status == 429) {
                    $retryDelay = 60; // Default
                    $body = $response->json();
                    if (isset($body['error']['details'])) {
                        foreach ($body['error']['details'] as $detail) {
                            if (isset($detail['retryDelay'])) {
                                $retryDelay = (int) str_replace('s', '', $detail['retryDelay']) + 2;
                            }
                        }
                    }
                    $this->error("Rate limited (429). Sleeping for $retryDelay seconds...");
                    sleep($retryDelay);
                    // Retry up to 50 times
                    if ($attempt < 50) {
                        return $this->callGemini($apiKey, $prompt, $seoMeta, $modelId, $modelName, $sleepTime, $onlyDescription, $attempt + 1);
                    } else {
                        $this->error("Max retries reached for $modelName ID: $modelId");
                        return;
                    }
                }
                $this->error("API Error for $modelName ID: $modelId: " . $response->body());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                // Duplicate title constraint
                $seoMeta->title = $seoMeta->title . " (" . $modelId . ")";
                $seoMeta->save();
                $this->info("Successfully updated $modelName ID: $modelId with unique suffix.");
            } else {
                $this->error("Query Exception for $modelName ID: $modelId - " . $e->getMessage());
            }
        } catch (\Exception $e) {
            $this->error("Exception for $modelName ID: $modelId - " . $e->getMessage());
        }

        sleep($sleepTime);
    }
}
