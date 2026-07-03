<?php

namespace App\Services;

use App\Models\City;
use App\Models\PrayerTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class PrayerTimesService
{
    /**
     * Fetch prayer times for a city for a given month and year.
     * Uses AlAdhan as primary, Islamic Network as secondary backup.
     */
    public function fetchAndCacheForCity(City $city, $month = null, $year = null)
    {
        $month = $month ?: date('m');
        $year = $year ?: date('Y');

        $times = $this->fetchFromAlAdhan($city, $month, $year);

        if (empty($times)) {
            Log::warning("AlAdhan failed for {$city->name} (Month: {$month}, Year: {$year}). Trying Islamic Network backup.");
            $times = $this->fetchFromIslamicNetwork($city, $month, $year);
        }

        if (!empty($times)) {
            $this->cachePrayerTimes($city, $times);
        }

        // Return the times starting from today
        return PrayerTime::where('city_id', $city->id)
            ->where('date', '>=', date('Y-m-d'))
            ->orderBy('date', 'asc')
            ->limit(30)
            ->get();
    }

    private function fetchFromAlAdhan(City $city, $month, $year)
    {
        try {
            $method = $this->mapCalculationMethod($city->prayer_calc_method, 'aladhan');
            
            $url = "https://api.aladhan.com/v1/calendarByCity/{$year}/{$month}";
            $response = Http::timeout(10)->get($url, [
                'city' => $city->name,
                'country' => $city->country->name ?? '',
                'method' => $method
            ]);

            if ($response->successful() && isset($response->json()['data'])) {
                return array_map(function($day) use ($method) {
                    $timings = $day['timings'];
                    return [
                        'date' => Carbon::createFromFormat('d-m-Y', $day['date']['gregorian']['date'])->format('Y-m-d'),
                        'fajr' => $this->cleanTime($timings['Fajr']),
                        'sunrise' => $this->cleanTime($timings['Sunrise']),
                        'dhuhr' => $this->cleanTime($timings['Dhuhr']),
                        'asr' => $this->cleanTime($timings['Asr']),
                        'maghrib' => $this->cleanTime($timings['Maghrib']),
                        'isha' => $this->cleanTime($timings['Isha']),
                        'imsak' => $this->cleanTime($timings['Imsak']),
                        'midnight' => $this->cleanTime($timings['Midnight']),
                        'last_third' => $this->cleanTime($timings['Lastthird'] ?? null),
                        'method' => $method
                    ];
                }, $response->json()['data']);
            }
        } catch (\Exception $e) {
            Log::error("AlAdhan API Error: " . $e->getMessage());
        }
        return [];
    }

    private function fetchFromIslamicNetwork(City $city, $month, $year)
    {
        // Actually AlAdhan IS Islamic Network, so this backup is conceptually similar,
        // but another alternative would be api-ninjas or using coordinates if city name fails.
        // Let's use AlAdhan Calendar By Address or Coordinates as a fallback.
        try {
            $method = $this->mapCalculationMethod($city->prayer_calc_method, 'aladhan');
            
            if (!$city->latitude || !$city->longitude) {
                return [];
            }

            $url = "https://api.aladhan.com/v1/calendar/{$year}/{$month}";
            $response = Http::timeout(10)->get($url, [
                'latitude' => $city->latitude,
                'longitude' => $city->longitude,
                'method' => $method
            ]);

            if ($response->successful() && isset($response->json()['data'])) {
                return array_map(function($day) use ($method) {
                    $timings = $day['timings'];
                    return [
                        'date' => Carbon::createFromFormat('d-m-Y', $day['date']['gregorian']['date'])->format('Y-m-d'),
                        'fajr' => $this->cleanTime($timings['Fajr']),
                        'sunrise' => $this->cleanTime($timings['Sunrise']),
                        'dhuhr' => $this->cleanTime($timings['Dhuhr']),
                        'asr' => $this->cleanTime($timings['Asr']),
                        'maghrib' => $this->cleanTime($timings['Maghrib']),
                        'isha' => $this->cleanTime($timings['Isha']),
                        'imsak' => $this->cleanTime($timings['Imsak']),
                        'midnight' => $this->cleanTime($timings['Midnight']),
                        'last_third' => $this->cleanTime($timings['Lastthird'] ?? null),
                        'method' => $method
                    ];
                }, $response->json()['data']);
            }
        } catch (\Exception $e) {
            Log::error("Backup API Error: " . $e->getMessage());
        }
        return [];
    }

    private function cachePrayerTimes(City $city, array $times)
    {
        foreach ($times as $time) {
            PrayerTime::updateOrCreate(
                [
                    'city_id' => $city->id,
                    'date' => $time['date']
                ],
                [
                    'fajr' => $time['fajr'],
                    'sunrise' => $time['sunrise'],
                    'dhuhr' => $time['dhuhr'],
                    'asr' => $time['asr'],
                    'maghrib' => $time['maghrib'],
                    'isha' => $time['isha'],
                    'imsak' => $time['imsak'],
                    'midnight' => $time['midnight'],
                    'last_third' => $time['last_third'],
                    'method' => $time['method'],
                ]
            );
        }
    }

    private function cleanTime($timeStr)
    {
        if (!$timeStr) return null;
        // AlAdhan returns "05:14 (PKT)" format sometimes
        $timeParts = explode(' ', $timeStr);
        return $timeParts[0];
    }

    public function mapCalculationMethod($methodName, $provider)
    {
        // AlAdhan methods:
        // 1: University of Islamic Sciences, Karachi
        // 2: ISNA
        // 3: Muslim World League
        // 4: Umm Al-Qura
        // 5: Egyptian General Authority of Survey
        // 8: Gulf Region
        // 9: Kuwait
        // 10: Qatar
        // 11: Majlis Ugama Islam Singapura, Singapore
        // 12: Union Organization islamic de France
        // 13: Diyanet İşleri Başkanlığı, Turkey
        // 14: Spiritual Administration of Muslims of Russia

        $methodMap = [
            'Karachi' => 1,
            'ISNA' => 2,
            'Muslim World League' => 3,
            'Umm al-Qura' => 4,
            'Egyptian' => 5,
            'UAE' => 8,
            'Gulf' => 8,
            'Kuwait' => 9,
            'Qatar' => 10,
            'Singapore' => 11,
            'Turkey' => 13,
            'Tehran' => 7,
            'Jafari' => 0,
        ];

        return $methodMap[$methodName] ?? 1; // Default to Karachi if unknown
    }

    public function getQibla(City $city)
    {
        if ($city->latitude && $city->longitude) {
            return Cache::remember("qibla_{$city->id}", 86400 * 30, function() use ($city) {
                try {
                    $url = "https://api.aladhan.com/v1/qibla/{$city->latitude}/{$city->longitude}";
                    $response = Http::timeout(10)->get($url);
                    if ($response->successful() && isset($response->json()['data']['direction'])) {
                        return round($response->json()['data']['direction'], 2);
                    }
                } catch (\Exception $e) {
                    Log::error("Qibla API Error: " . $e->getMessage());
                }

                // Fallback math calculation
                $lat = $city->latitude;
                $lon = $city->longitude;
                $mekkaLat = 21.422487;
                $mekkaLon = 39.826206;
                $latRad = deg2rad($lat);
                $lonRad = deg2rad($lon);
                $mekkaLatRad = deg2rad($mekkaLat);
                $mekkaLonRad = deg2rad($mekkaLon);
                
                $y = sin($mekkaLonRad - $lonRad);
                $x = cos($latRad) * tan($mekkaLatRad) - sin($latRad) * cos($mekkaLonRad - $lonRad);
                $qiblaDegree = rad2deg(atan2($y, $x));
                return round(fmod($qiblaDegree + 360, 360), 2);
            });
        }
        return null;
    }
}
