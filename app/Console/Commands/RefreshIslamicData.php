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
    protected $signature = 'islamic:refresh {--days=60 : Number of days ahead to cache}';
    protected $description = 'Refresh Islamic data (Hijri dates for today + future, Prayer Times) from AlAdhan API';

    /**
     * Arabic month names for display.
     */
    private array $arabicMonths = [
        1 => 'مُحَرَّم', 2 => 'صَفَر', 3 => 'رَبِيع الأَوَّل', 4 => 'رَبِيع الآخِر',
        5 => 'جُمَادَى الأُولَى', 6 => 'جُمَادَى الآخِرَة', 7 => 'رَجَب', 8 => 'شَعْبَان',
        9 => 'رَمَضَان', 10 => 'شَوَّال', 11 => 'ذُو القَعْدَة', 12 => 'ذُو الحِجَّة',
    ];

    /**
     * Arabic numerals for date display.
     */
    private array $arabicNumerals = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

    /**
     * AlAdhan prayer calculation method names.
     */
    private array $methodNames = [
        1 => 'University of Islamic Sciences, Karachi (Fajr 18°, Isha 18°)',
        2 => 'Islamic Society of North America (Fajr 15°, Isha 15°)',
        3 => 'Muslim World League (Fajr 18°, Isha 17°)',
        4 => 'Umm Al-Qura University, Makkah (Fajr 18.5°, Isha 90min)',
        5 => 'Egyptian General Authority of Survey (Fajr 19.5°, Isha 17.5°)',
        7 => 'Institute of Geophysics, University of Tehran',
        8 => 'Gulf Region',
        9 => 'Kuwait',
        10 => 'Qatar',
        11 => 'Majlis Ugama Islam Singapura, Singapore',
        12 => 'Union Organization Islamic de France',
        13 => 'Diyanet İşleri Başkanlığı, Turkey',
        14 => 'Spiritual Administration of Muslims of Russia',
        15 => 'Moonsighting Committee Worldwide',
    ];

    public function handle()
    {
        $daysAhead = (int) $this->option('days');
        $today = Carbon::today();

        $this->info("═══════════════════════════════════════════════════");
        $this->info("  Noor-e-Islam — Islamic Data Refresh");
        $this->info("  Date: {$today->format('Y-m-d')} | Days ahead: {$daysAhead}");
        $this->info("═══════════════════════════════════════════════════");

        // Step 1: Fetch Hijri dates for today through today + daysAhead
        $this->refreshHijriDates($today, $daysAhead);

        // Step 2: Fetch prayer times for all cities
        $this->refreshPrayerTimes($today, $daysAhead);

        $this->newLine();
        $this->info("✅ Refresh complete.");
    }

    /**
     * Refresh Hijri date cache from today through $daysAhead.
     * Fetches both 'global' and 'pakistan' regional variants.
     */
    private function refreshHijriDates(Carbon $today, int $daysAhead): void
    {
        $this->newLine();
        $this->info("📅 Refreshing Hijri dates...");

        $regions = [
            'global' => 0,   // No adjustment
            'pakistan' => 1,  // +1 day adjustment for Pakistan local sighting
        ];

        $successCount = 0;
        $errorCount = 0;

        foreach ($regions as $region => $adjustment) {
            $this->info("  Region: {$region} (adjustment: {$adjustment})");

            for ($i = 0; $i <= $daysAhead; $i++) {
                $date = $today->copy()->addDays($i);
                $dateStr = $date->format('d-m-Y');

                // Skip if already cached (unless it's today — always refresh today)
                if ($i > 0) {
                    $existing = HijriDateCache::where('gregorian_date', $date->toDateString())
                        ->where('region', $region)
                        ->first();
                    if ($existing) continue;
                }

                try {
                    $response = Http::timeout(10)->get("https://api.aladhan.com/v1/gToH/{$dateStr}", [
                        'adjustment' => $adjustment,
                    ]);

                    if ($response->successful()) {
                        $hijriData = $response->json('data.hijri');
                        $monthNumber = (int) $hijriData['month']['number'];

                        HijriDateCache::updateOrCreate(
                            [
                                'gregorian_date' => $date->toDateString(),
                                'region' => $region,
                            ],
                            [
                                'hijri_day' => (int) $hijriData['day'],
                                'hijri_day_ar' => $this->toArabicNumeral($hijriData['day']),
                                'hijri_month' => $hijriData['month']['en'],
                                'hijri_month_ar' => $this->arabicMonths[$monthNumber] ?? $hijriData['month']['ar'] ?? '',
                                'hijri_month_number' => $monthNumber,
                                'hijri_year' => (int) $hijriData['year'],
                                'gregorian_month_en' => $date->format('F'),
                                'source' => 'AlAdhan API',
                                'fetched_at' => now(),
                                'is_verified_sighting' => $region === 'pakistan',
                            ]
                        );
                        $successCount++;
                    } else {
                        $this->warn("    ⚠ Failed for {$dateStr} ({$region}): HTTP {$response->status()}");
                        $errorCount++;
                    }

                    // Rate limiting: small delay to be respectful to API
                    if ($i % 10 === 9) {
                        usleep(500000); // 500ms pause every 10 requests
                    }

                } catch (\Exception $e) {
                    $this->error("    ✗ Error for {$dateStr} ({$region}): " . $e->getMessage());
                    $errorCount++;
                }
            }
        }

        $this->info("  ✓ Hijri dates: {$successCount} cached, {$errorCount} errors");
    }

    /**
     * Refresh prayer times for all active cities.
     */
    private function refreshPrayerTimes(Carbon $today, int $daysAhead): void
    {
        $cities = City::all();
        $this->newLine();
        $this->info("🕌 Refreshing Prayer Times for {$cities->count()} cities...");

        if ($cities->isEmpty()) {
            $this->warn("  No cities found in database. Skipping prayer times.");
            return;
        }

        foreach ($cities as $city) {
            // Determine method
            $method = $this->resolveMethod($city->prayer_calc_method);
            $methodName = $this->methodNames[$method] ?? "Method {$method}";

            $dateStr = $today->format('d-m-Y');

            try {
                $response = Http::timeout(10)->get("https://api.aladhan.com/v1/timings/{$dateStr}", [
                    'latitude' => $city->latitude,
                    'longitude' => $city->longitude,
                    'method' => $method,
                ]);

                if ($response->successful()) {
                    $timings = $response->json('data.timings');

                    PrayerTime::updateOrCreate(
                        [
                            'city_id' => $city->id,
                            'date' => $today->toDateString(),
                        ],
                        [
                            'fajr' => $this->cleanTime($timings['Fajr']),
                            'sunrise' => $this->cleanTime($timings['Sunrise']),
                            'dhuhr' => $this->cleanTime($timings['Dhuhr']),
                            'asr' => $this->cleanTime($timings['Asr']),
                            'maghrib' => $this->cleanTime($timings['Maghrib']),
                            'isha' => $this->cleanTime($timings['Isha']),
                            'imsak' => $this->cleanTime($timings['Imsak'] ?? null),
                            'midnight' => $this->cleanTime($timings['Midnight'] ?? null),
                            'calc_method' => $city->prayer_calc_method,
                            'method' => (string) $method,
                            'method_name' => $methodName,
                            'fetched_at' => now(),
                        ]
                    );
                    $this->info("  ✓ {$city->name}: OK");
                } else {
                    $this->warn("  ⚠ {$city->name}: HTTP {$response->status()}");
                }
            } catch (\Exception $e) {
                $this->error("  ✗ {$city->name}: " . $e->getMessage());
            }
        }
    }

    /**
     * Resolve prayer calculation method from city's stored value.
     */
    private function resolveMethod(?string $storedMethod): int
    {
        if (is_numeric($storedMethod)) {
            return (int) $storedMethod;
        }

        if (!$storedMethod) return 1;

        $storedMethod = strtolower($storedMethod);

        if (str_contains($storedMethod, 'isna')) return 2;
        if (str_contains($storedMethod, 'mwl') || str_contains($storedMethod, 'muslim world')) return 3;
        if (str_contains($storedMethod, 'umm') || str_contains($storedMethod, 'makkah')) return 4;
        if (str_contains($storedMethod, 'egypt')) return 5;

        return 1; // Default: University of Islamic Sciences, Karachi
    }

    /**
     * Convert a number to Arabic numerals.
     */
    private function toArabicNumeral(string|int $number): string
    {
        $result = '';
        $numStr = (string) $number;
        for ($i = 0; $i < strlen($numStr); $i++) {
            $digit = (int) $numStr[$i];
            $result .= $this->arabicNumerals[$digit] ?? $numStr[$i];
        }
        return $result;
    }

    /**
     * Clean AlAdhan time string (remove timezone annotation like " (PKT)").
     */
    private function cleanTime(?string $time): ?string
    {
        if (!$time) return null;
        // AlAdhan sometimes returns "04:18 (PKT)" — strip the annotation
        return trim(preg_replace('/\s*\(.*\)/', '', $time));
    }
}
