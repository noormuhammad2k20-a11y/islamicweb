<?php

namespace App\Services;

use App\Models\HijriDateCache;
use App\Models\PrayerTime;
use App\Models\City;
use App\Models\QiblaData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AladhanApiService
{
    protected $baseUrl = 'https://api.aladhan.com/v1';

    /**
     * Get Hijri date for a specific gregorian date and region.
     * DB-first, API-fallback pattern.
     */
    public function getHijriDate(Carbon $date, string $region = 'global')
    {
        $cached = HijriDateCache::where('gregorian_date', $date->toDateString())
            ->where('region', $region)
            ->first();

        if ($cached) {
            return $cached;
        }

        // Fallback to API
        $adjustment = $region === 'pakistan' ? 1 : 0;
        $dateStr = $date->format('d-m-Y');

        try {
            $response = Http::timeout(10)->get("{$this->baseUrl}/gToH/{$dateStr}", [
                'adjustment' => $adjustment
            ]);

            if ($response->successful()) {
                $hijriData = $response->json('data.hijri');
                $monthNumber = (int) $hijriData['month']['number'];

                return HijriDateCache::create([
                    'gregorian_date' => $date->toDateString(),
                    'region' => $region,
                    'hijri_day' => (int) $hijriData['day'],
                    'hijri_day_ar' => $this->toArabicNumeral($hijriData['day']),
                    'hijri_month' => $hijriData['month']['en'],
                    'hijri_month_ar' => $hijriData['month']['ar'] ?? '',
                    'hijri_month_number' => $monthNumber,
                    'hijri_year' => (int) $hijriData['year'],
                    'gregorian_month_en' => $date->format('F'),
                    'source' => 'AlAdhan API (Fallback)',
                    'fetched_at' => now(),
                    'is_verified_sighting' => $region === 'pakistan',
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Aladhan getHijriDate fallback failed: " . $e->getMessage());
        }

        return null;
    }

    /**
     * Fetch and cache the Hijri calendar for a specific month and year.
     * 
     * @param int $hijriMonth
     * @param int $hijriYear
     * @param string $region
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHijriMonthCalendar($hijriMonth, $hijriYear, $region = 'global')
    {
        $cachedDays = HijriDateCache::where('hijri_month_number', $hijriMonth)
            ->where('hijri_year', $hijriYear)
            ->where('region', $region)
            ->orderBy('hijri_day', 'asc')
            ->get();

        if ($cachedDays->count() >= 29) {
            return $cachedDays;
        }

        $adjustment = $region === 'pakistan' ? 1 : 0;
        $response = Http::timeout(10)->get("{$this->baseUrl}/hToGCalendar/{$hijriMonth}/{$hijriYear}", [
            'adjustment' => $adjustment
        ]);

        if ($response->successful() && isset($response->json()['data'])) {
            $apiData = $response->json()['data'];
            $records = [];
            
            foreach ($apiData as $dayData) {
                try {
                    $gregorianDate = Carbon::createFromFormat('d-m-Y', $dayData['gregorian']['date'])->format('Y-m-d');
                    
                    $record = HijriDateCache::updateOrCreate(
                        [
                            'gregorian_date' => $gregorianDate,
                            'region' => $region
                        ],
                        [
                            'hijri_day' => (int) $dayData['hijri']['day'],
                            'hijri_day_ar' => $this->toArabicNumeral($dayData['hijri']['day']),
                            'hijri_month' => $dayData['hijri']['month']['en'],
                            'hijri_month_ar' => $dayData['hijri']['month']['ar'] ?? '',
                            'hijri_month_number' => $hijriMonth,
                            'hijri_year' => (int) $dayData['hijri']['year'],
                            'gregorian_month_en' => $dayData['gregorian']['month']['en'],
                            'source' => "AlAdhan API",
                            'fetched_at' => now(),
                            'is_verified_sighting' => $region === 'pakistan',
                        ]
                    );
                    $records[] = $record;
                } catch (\Exception $e) {
                    Log::error("Error caching Hijri month calendar: " . $e->getMessage());
                }
            }
            return collect($records)->sortBy('hijri_day')->values();
        }

        return $cachedDays; // Return whatever partial we have
    }
    
    /**
     * Get Qibla direction for a city.
     */
    public function getQiblaDirection(City $city)
    {
        $cached = QiblaData::where('city_id', $city->id)->first();
        if ($cached) return $cached;

        try {
            $response = Http::timeout(10)->get("{$this->baseUrl}/qibla/{$city->latitude}/{$city->longitude}");
            
            if ($response->successful()) {
                $data = $response->json('data');
                return QiblaData::create([
                    'city_id' => $city->id,
                    'qibla_direction' => $data['direction'],
                    'calculated_at' => now(),
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Aladhan getQiblaDirection failed: " . $e->getMessage());
        }

        return null;
    }

    /**
     * Determine the current active Hijri year (based on today's date).
     */
    public function getCurrentHijriYear()
    {
        $todayCache = HijriDateCache::where('gregorian_date', now()->format('Y-m-d'))->first();
        if ($todayCache) return $todayCache->hijri_year;
        return HijriDateCache::max('hijri_year') ?? 1446;
    }

    /**
     * Convert a number to Arabic numerals.
     */
    private function toArabicNumeral(string|int $number): string
    {
        $numerals = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $result = '';
        $numStr = (string) $number;
        for ($i = 0; $i < strlen($numStr); $i++) {
            $digit = (int) $numStr[$i];
            $result .= $numerals[$digit] ?? $numStr[$i];
        }
        return $result;
    }
}
