<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use App\Models\PrayerTime;
use App\Models\HijriDateCache;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class RefreshIslamicData extends Command
{
    protected $signature = 'islamic:refresh';
    protected $description = 'Refresh Islamic data (Hijri date, Prayer Times) from AlAdhan API';

    public function handle()
    {
        $today = Carbon::today();
        $dateStr = $today->format('d-m-Y');

        $this->info("Fetching Hijri Date for {$dateStr}...");

        try {
            // Fetch Hijri Date
            $hijriResponse = Http::timeout(10)->get("http://api.aladhan.com/v1/gToH/{$dateStr}");
            if ($hijriResponse->successful()) {
                $hijriData = $hijriResponse->json('data.hijri');
                HijriDateCache::updateOrCreate(
                    ['gregorian_date' => $today->toDateString()],
                    [
                        'hijri_day' => (int)$hijriData['day'],
                        'hijri_month' => $hijriData['month']['en'],
                        'hijri_year' => (int)$hijriData['year'],
                        'source' => 'AlAdhan API',
                        'fetched_at' => now(),
                    ]
                );
                $this->info("Hijri Date cached successfully.");
            } else {
                $this->error("Failed to fetch Hijri Date: " . $hijriResponse->body());
            }

            // Fetch Prayer Times for all cities
            $cities = City::all();
            $this->info("Fetching Prayer Times for {$cities->count()} cities...");
            
            foreach ($cities as $city) {
                // Map calculation method to AlAdhan method ID if possible, otherwise default to 1 (Karachi)
                $method = 1; 
                if (stripos($city->prayer_calc_method, 'ISNA') !== false) {
                    $method = 2;
                } elseif (stripos($city->prayer_calc_method, 'Umm al-Qura') !== false) {
                    $method = 4;
                }

                $ptResponse = Http::timeout(10)->get("http://api.aladhan.com/v1/timings/{$dateStr}", [
                    'latitude' => $city->latitude,
                    'longitude' => $city->longitude,
                    'method' => $method,
                ]);

                if ($ptResponse->successful()) {
                    $timings = $ptResponse->json('data.timings');
                    PrayerTime::updateOrCreate(
                        [
                            'city_id' => $city->id,
                            'date' => $today->toDateString(),
                        ],
                        [
                            'fajr' => $timings['Fajr'],
                            'sunrise' => $timings['Sunrise'],
                            'dhuhr' => $timings['Dhuhr'],
                            'asr' => $timings['Asr'],
                            'maghrib' => $timings['Maghrib'],
                            'isha' => $timings['Isha'],
                            'calc_method' => $city->prayer_calc_method,
                            'fetched_at' => now(),
                        ]
                    );
                    $this->info("Prayer Times for {$city->name} cached.");
                } else {
                    $this->error("Failed to fetch Prayer Times for {$city->name}: " . $ptResponse->body());
                }
            }

        } catch (\Exception $e) {
            $this->error("An error occurred: " . $e->getMessage());
        }

        $this->info("Refresh complete.");
    }
}
