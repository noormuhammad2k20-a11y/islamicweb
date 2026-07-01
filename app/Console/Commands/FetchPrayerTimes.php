<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use App\Models\PrayerTime;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FetchPrayerTimes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'islamic:fetch-prayer-times {--month= : Specific month (1-12)} {--year= : Specific year (e.g. 2026)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and caches prayer times for all cities using AlAdhan API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Prayer Times Fetch process...');

        $cities = City::all();
        $month = $this->option('month') ?: date('m');
        $year = $this->option('year') ?: date('Y');

        // Fetch for current and next month to ensure we always have 30 days ahead
        $monthsToFetch = [
            ['month' => $month, 'year' => $year],
            ['month' => ($month == 12 ? 1 : $month + 1), 'year' => ($month == 12 ? $year + 1 : $year)],
        ];

        foreach ($cities as $city) {
            $this->info("Fetching prayer times for city: {$city->name}");

            foreach ($monthsToFetch as $period) {
                $m = $period['month'];
                $y = $period['year'];

                $this->info("Fetching for {$m}/{$y}...");

                // Method 1 corresponds to University of Islamic Sciences, Karachi
                $method = 1; 

                $response = Http::timeout(15)->get("http://api.aladhan.com/v1/calendar/{$y}/{$m}", [
                    'latitude' => $city->latitude,
                    'longitude' => $city->longitude,
                    'method' => $method,
                ]);

                if ($response->successful() && isset($response->json()['data'])) {
                    $data = $response->json()['data'];
                    
                    foreach ($data as $dayData) {
                        try {
                            $dateStr = $dayData['date']['gregorian']['date']; // dd-mm-yyyy
                            $date = Carbon::createFromFormat('d-m-Y', $dateStr)->format('Y-m-d');
                            
                            $timings = $dayData['timings'];
                            
                            // Remove timezone info like "04:14 (PKT)" -> "04:14"
                            $fajr = $this->cleanTime($timings['Fajr']);
                            $sunrise = $this->cleanTime($timings['Sunrise']);
                            $dhuhr = $this->cleanTime($timings['Dhuhr']);
                            $asr = $this->cleanTime($timings['Asr']);
                            $maghrib = $this->cleanTime($timings['Maghrib']);
                            $isha = $this->cleanTime($timings['Isha']);
                            
                            PrayerTime::updateOrCreate(
                                [
                                    'city_id' => $city->id,
                                    'date' => $date,
                                ],
                                [
                                    'fajr' => $fajr,
                                    'sunrise' => $sunrise,
                                    'dhuhr' => $dhuhr,
                                    'asr' => $asr,
                                    'maghrib' => $maghrib,
                                    'isha' => $isha,
                                    'calc_method' => $city->prayer_calc_method ?? 'University of Islamic Sciences, Karachi',
                                    'fetched_at' => now(),
                                ]
                            );
                        } catch (\Exception $e) {
                            $this->error("Error processing date {$dateStr}: " . $e->getMessage());
                        }
                    }
                    $this->info("Successfully cached " . count($data) . " days for {$m}/{$y}.");
                } else {
                    $this->error("Failed to fetch API data for city {$city->name} ({$m}/{$y}).");
                }

                // Sleep to avoid rate limiting
                sleep(1);
            }
        }

        $this->info('Successfully finished fetching and caching Prayer Times.');
        return self::SUCCESS;
    }

    private function cleanTime($timeStr)
    {
        // AlAdhan returns times like "04:14 (PKT)" or "04:14 (+05)"
        return substr(trim($timeStr), 0, 5);
    }
}
