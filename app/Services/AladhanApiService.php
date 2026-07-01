<?php

namespace App\Services;

use App\Models\HijriDateCache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AladhanApiService
{
    protected $baseUrl = 'https://api.aladhan.com/v1';

    /**
     * Fetch and cache the Hijri calendar for a specific month and year.
     * 
     * @param int $hijriMonth
     * @param int $hijriYear
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHijriMonthCalendar($hijriMonth, $hijriYear)
    {
        // Check if we already have the days cached for this month and year
        // We expect at least 29 days in a month
        $cachedDays = HijriDateCache::where('hijri_month_number', $hijriMonth)
            ->where('hijri_year', $hijriYear)
            ->orderBy('hijri_day', 'asc')
            ->get();

        // If we have a full month cached, return it directly
        if ($cachedDays->count() >= 29) {
            return $cachedDays;
        }

        // Otherwise, fetch from API
        $data = $this->fetchFromApi($hijriMonth, $hijriYear);
        
        if (empty($data)) {
            // If API totally fails and we have some cache (even incomplete), return it
            return $cachedDays;
        }

        return $this->cacheApiResponse($data, $hijriMonth);
    }

    /**
     * Makes the HTTP request with fallbacks.
     */
    private function fetchFromApi($month, $year)
    {
        // Primary Method: UAQ
        $response = Http::timeout(10)->get("{$this->baseUrl}/hToGCalendar/{$month}/{$year}", [
            'calendarMethod' => 'UAQ'
        ]);

        if ($response->successful() && isset($response->json()['data'])) {
            return $response->json()['data'];
        }

        Log::warning("Aladhan API UAQ method failed for Month: {$month}, Year: {$year}. Falling back to HJCoSA.");

        // Fallback Method: HJCoSA
        $responseFallback = Http::timeout(10)->get("{$this->baseUrl}/hToGCalendar/{$month}/{$year}", [
            'calendarMethod' => 'HJCoSA'
        ]);

        if ($responseFallback->successful() && isset($responseFallback->json()['data'])) {
            return $responseFallback->json()['data'];
        }

        Log::error("Aladhan API both UAQ and HJCoSA failed for Month: {$month}, Year: {$year}.");

        return [];
    }

    /**
     * Process and store the API response in the database.
     */
    private function cacheApiResponse($apiData, $monthNumber)
    {
        $records = [];
        
        foreach ($apiData as $dayData) {
            try {
                // Parse gregorian date (DD-MM-YYYY) to Y-m-d
                $gregorianDate = Carbon::createFromFormat('d-m-Y', $dayData['gregorian']['date'])->format('Y-m-d');
                $methodUsed = $dayData['hijri']['method'] ?? 'API';

                $record = HijriDateCache::updateOrCreate(
                    ['gregorian_date' => $gregorianDate],
                    [
                        'hijri_day' => (int) $dayData['hijri']['day'],
                        'hijri_month' => $dayData['hijri']['month']['en'],
                        'hijri_month_number' => $monthNumber, // Explicitly save month number for easier querying
                        'hijri_year' => (int) $dayData['hijri']['year'],
                        'gregorian_month_en' => $dayData['gregorian']['month']['en'],
                        'source' => "AlAdhan API ({$methodUsed})",
                        'fetched_at' => now(),
                    ]
                );

                $records[] = $record;
            } catch (\Exception $e) {
                Log::error("Error caching Hijri date: " . $e->getMessage());
            }
        }

        // Return the freshly cached collection sorted by day
        return collect($records)->sortBy('hijri_day')->values();
    }
    
    /**
     * Determine the current active Hijri year (based on today's date).
     */
    public function getCurrentHijriYear()
    {
        // Check cache for today
        $todayCache = HijriDateCache::where('gregorian_date', now()->format('Y-m-d'))->first();
        
        if ($todayCache) {
            return $todayCache->hijri_year;
        }
        
        // If today is not cached, fetch it via /gToH
        $response = Http::timeout(10)->get("{$this->baseUrl}/gToH/" . now()->format('d-m-Y'), [
            'calendarMethod' => 'UAQ'
        ]);
        
        if ($response->successful() && isset($response->json()['data']['hijri']['year'])) {
            return (int) $response->json()['data']['hijri']['year'];
        }
        
        // Final fallback to DB max year
        return HijriDateCache::max('hijri_year') ?? 1446;
    }
}
