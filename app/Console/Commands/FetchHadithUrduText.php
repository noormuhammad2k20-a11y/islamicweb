<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Hadith;

class FetchHadithUrduText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hadith:fetch-urdu {--dry-run} {--batch=100} {--collection=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch authentic Urdu text for hadiths from fawazahmed0/hadith-api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');
        $batch = (int) $this->option('batch');
        $collectionOpt = $this->option('collection');

        $this->info("Starting Urdu text fetch... (Dry run: " . ($dryRun ? 'yes' : 'no') . ")");

        $collectionsMap = [
            1 => [
                'name' => 'Sahih Bukhari',
                'url' => 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-bukhari.min.json'
            ],
            2 => [
                'name' => 'Sahih Muslim',
                'url' => 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-muslim.min.json'
            ],
            3 => [
                'name' => 'Sunan Abu Dawud',
                'url' => 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-abudawud.min.json'
            ],
            4 => [
                'name' => 'Jami at-Tirmidhi',
                'url' => 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-tirmidhi.min.json'
            ],
            5 => [
                'name' => 'Sunan an-Nasai',
                'url' => 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-nasai.min.json'
            ],
            6 => [
                'name' => 'Sunan Ibn Majah',
                'url' => 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-ibnmajah.min.json'
            ]
        ];

        $collectionsToProcess = [];
        if ($collectionOpt !== 'all') {
            $colId = (int)$collectionOpt;
            if (isset($collectionsMap[$colId])) {
                $collectionsToProcess[$colId] = $collectionsMap[$colId];
            } else {
                $this->error("Collection ID {$colId} not supported or mapped.");
                return 1;
            }
        } else {
            $collectionsToProcess = $collectionsMap;
        }

        foreach ($collectionsToProcess as $colId => $colInfo) {
            $this->info("Processing {$colInfo['name']} (Collection ID: $colId)");

            $query = Hadith::where('collection_id', $colId)
                           ->whereNull('urdu_translation');

            $total = $query->count();
            if ($total === 0) {
                $this->info("No hadiths found requiring Urdu text update for {$colInfo['name']}.");
                continue;
            }

            $this->info("Found {$total} hadiths to process. Fetching Urdu database from API...");
            
            try {
                $response = Http::timeout(60)->get($colInfo['url']);
                if (!$response->successful()) {
                    $this->error("Failed to fetch JSON from {$colInfo['url']}");
                    continue;
                }
                
                $apiData = $response->json();
                if (!isset($apiData['hadiths'])) {
                    $this->error("Invalid JSON structure received from API.");
                    continue;
                }
                
                $apiHadiths = $apiData['hadiths'];
                $normalizedApiHadiths = [];
                
                foreach ($apiHadiths as $key => $item) {
                    if (is_array($item) && isset($item['text'])) {
                        $num = isset($item['hadithnumber']) ? (int)$item['hadithnumber'] : (int)$key;
                        $normalizedApiHadiths[$num] = $item['text'];
                    }
                }
                
                $this->info("Loaded " . count($normalizedApiHadiths) . " hadiths from API for {$colInfo['name']}.");

                $bar = $this->output->createProgressBar($total);
                $bar->start();

                $updatedCount = 0;
                
                $query->chunkById($batch, function($hadiths) use (&$updatedCount, $normalizedApiHadiths, $bar, $dryRun, $colId) {
                    foreach ($hadiths as $hadith) {
                        // Extract number from reference e.g., "Sahih Bukhari 52" or "Sunan Abu Dawud 123"
                        if (preg_match('/\d+$/', trim($hadith->reference), $matches)) {
                            $number = (int) $matches[0];
                            
                            if (isset($normalizedApiHadiths[$number])) {
                                if (!$dryRun) {
                                    $hadith->urdu_translation = $normalizedApiHadiths[$number];
                                    $hadith->save();
                                }
                                $updatedCount++;
                            } else {
                                Log::channel('single')->warning("Hadith Urdu Text Fetch: Could not find hadith number {$number} for ID {$hadith->id} in collection {$colId}");
                            }
                        } else {
                            Log::channel('single')->warning("Hadith Urdu Text Fetch: Could not parse number from reference '{$hadith->reference}' for ID {$hadith->id}");
                        }
                        $bar->advance();
                    }
                });

                $bar->finish();
                $this->newLine();
                $this->info("Updated {$updatedCount} hadiths for {$colInfo['name']}.");
                
            } catch (\Exception $e) {
                $this->error("Error processing {$colInfo['name']}: " . $e->getMessage());
                Log::error("FetchHadithUrduText Error: " . $e->getMessage());
            }
        }

        $this->info("Urdu text fetch complete.");
        return 0;
    }
}
