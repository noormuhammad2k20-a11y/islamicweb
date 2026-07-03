<?php

namespace App\Services;

use App\Models\IslamicEvent;
use App\Models\HijriMonth;
use App\Models\HijriDateCache;
use Carbon\Carbon;

class CountdownService
{
    /**
     * Key Islamic events to count down to.
     * Format: event_key => [hijri_month_number, hijri_day, label]
     */
    private array $keyEvents = [
        'ramadan'       => [9, 1, 'Ramadan'],
        'eid_ul_fitr'   => [10, 1, 'Eid ul-Fitr'],
        'eid_ul_adha'   => [12, 10, 'Eid ul-Adha'],
        'hajj'          => [12, 8, 'Hajj Season'],
        'muharram'      => [1, 1, 'Islamic New Year'],
        'mawlid'        => [3, 12, 'Mawlid al-Nabi ﷺ'],
        'laylat_qadr'   => [9, 27, 'Laylat al-Qadr (est.)'],
        'ashura'        => [1, 10, 'Day of Ashura'],
        'arafah'        => [12, 9, 'Day of Arafah'],
    ];

    /**
     * Get countdown data for major Islamic events.
     *
     * @return array<array{key: string, name: string, hijri_date: string, days_away: int, icon: string}>
     */
    public function getCountdowns(?HijriDateCache $currentHijriDate = null): array
    {
        if (!$currentHijriDate) {
            $currentHijriDate = HijriDateCache::where('gregorian_date', today()->toDateString())
                ->where('region', 'global')
                ->first();
        }

        if (!$currentHijriDate) {
            return $this->getFallbackCountdowns();
        }

        $currentMonth = $currentHijriDate->hijri_month_number;
        $currentDay = (int) $currentHijriDate->hijri_day;
        $currentYear = (int) $currentHijriDate->hijri_year;

        $countdowns = [];

        foreach ($this->keyEvents as $key => $eventData) {
            [$eventMonth, $eventDay, $label] = $eventData;

            // Calculate approximate days away
            $monthDiff = $eventMonth - $currentMonth;
            $dayDiff = $eventDay - $currentDay;

            if ($monthDiff < 0 || ($monthDiff === 0 && $dayDiff < 0)) {
                // Event has passed this Hijri year, calculate for next year
                $monthDiff += 12;
            }

            // Approximate: each Hijri month ≈ 29.5 days
            $daysAway = (int) round(($monthDiff * 29.5) + $dayDiff);
            if ($daysAway < 0) $daysAway += 354;
            if ($daysAway === 0) $daysAway = 0; // Today!

            $hijriMonthName = $this->getMonthName($eventMonth);

            $countdowns[] = [
                'key' => $key,
                'name' => $label,
                'hijri_date' => "{$eventDay} {$hijriMonthName}",
                'hijri_month' => $eventMonth,
                'hijri_day' => $eventDay,
                'days_away' => $daysAway,
                'icon' => $this->getIcon($key),
                'is_today' => $daysAway === 0,
            ];
        }

        // Sort by days away
        usort($countdowns, fn($a, $b) => $a['days_away'] <=> $b['days_away']);

        return $countdowns;
    }

    /**
     * Get just the top 4 most-anticipated countdowns for the hub page widget.
     */
    public function getTopCountdowns(?HijriDateCache $currentHijriDate = null): array
    {
        $all = $this->getCountdowns($currentHijriDate);

        // Prioritize: Ramadan, Eid ul-Fitr, Eid ul-Adha, Hajj
        $priority = ['ramadan', 'eid_ul_fitr', 'eid_ul_adha', 'hajj'];
        $top = array_filter($all, fn($c) => in_array($c['key'], $priority));

        // If we have fewer than 4 priority events, fill with the nearest other events
        if (count($top) < 4) {
            $remaining = array_filter($all, fn($c) => !in_array($c['key'], $priority));
            $top = array_merge($top, array_slice($remaining, 0, 4 - count($top)));
        }

        return array_values(array_slice($top, 0, 4));
    }

    /**
     * Fallback when no Hijri date is cached.
     */
    private function getFallbackCountdowns(): array
    {
        return [
            ['key' => 'ramadan', 'name' => 'Ramadan', 'hijri_date' => '1 Ramadan', 'hijri_month' => 9, 'hijri_day' => 1, 'days_away' => '—', 'icon' => 'fa-moon', 'is_today' => false],
            ['key' => 'eid_ul_fitr', 'name' => 'Eid ul-Fitr', 'hijri_date' => '1 Shawwal', 'hijri_month' => 10, 'hijri_day' => 1, 'days_away' => '—', 'icon' => 'fa-gift', 'is_today' => false],
            ['key' => 'eid_ul_adha', 'name' => 'Eid ul-Adha', 'hijri_date' => '10 Dhul Hijjah', 'hijri_month' => 12, 'hijri_day' => 10, 'days_away' => '—', 'icon' => 'fa-kaaba', 'is_today' => false],
            ['key' => 'hajj', 'name' => 'Hajj Season', 'hijri_date' => '8 Dhul Hijjah', 'hijri_month' => 12, 'hijri_day' => 8, 'days_away' => '—', 'icon' => 'fa-tent', 'is_today' => false],
        ];
    }

    /**
     * Get Hijri month name from number.
     */
    private function getMonthName(int $monthNumber): string
    {
        return [
            1 => 'Muharram', 2 => 'Safar', 3 => 'Rabi al-Awwal', 4 => 'Rabi al-Thani',
            5 => 'Jumada al-Awwal', 6 => 'Jumada al-Thani', 7 => 'Rajab', 8 => 'Sha\'ban',
            9 => 'Ramadan', 10 => 'Shawwal', 11 => 'Dhul Qa\'dah', 12 => 'Dhul Hijjah',
        ][$monthNumber] ?? "Month {$monthNumber}";
    }

    /**
     * Get FontAwesome icon for each event type.
     */
    private function getIcon(string $key): string
    {
        return match ($key) {
            'ramadan'       => 'fa-moon',
            'eid_ul_fitr'   => 'fa-gift',
            'eid_ul_adha'   => 'fa-kaaba',
            'hajj'          => 'fa-kaaba',
            'muharram'      => 'fa-star-and-crescent',
            'mawlid'        => 'fa-star',
            'laylat_qadr'   => 'fa-star',
            'ashura'        => 'fa-book-quran',
            'arafah'        => 'fa-mountain',
            default         => 'fa-calendar-day',
        };
    }
}
