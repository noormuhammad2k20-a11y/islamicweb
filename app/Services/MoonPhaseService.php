<?php

namespace App\Services;

use App\Models\MoonPhase;
use Carbon\Carbon;

class MoonPhaseService
{
    /**
     * Arabic/Islamic phase names.
     */
    private array $phaseData = [
        'New Moon'         => ['icon' => 'fa-circle',   'icon_class' => 'new-moon',      'ar' => 'هلال جديد'],
        'Waxing Crescent'  => ['icon' => 'fa-moon',     'icon_class' => 'wax-crescent',  'ar' => 'هلال متزايد'],
        'First Quarter'    => ['icon' => 'fa-adjust',   'icon_class' => 'first-quarter', 'ar' => 'ربع أول'],
        'Waxing Gibbous'   => ['icon' => 'fa-moon',     'icon_class' => 'wax-gibbous',   'ar' => 'أحدب متزايد'],
        'Full Moon'        => ['icon' => 'fa-circle',   'icon_class' => 'full-moon',     'ar' => 'بدر'],
        'Waning Gibbous'   => ['icon' => 'fa-moon',     'icon_class' => 'wan-gibbous',   'ar' => 'أحدب متناقص'],
        'Last Quarter'     => ['icon' => 'fa-adjust',   'icon_class' => 'last-quarter',  'ar' => 'ربع أخير'],
        'Waning Crescent'  => ['icon' => 'fa-moon',     'icon_class' => 'wan-crescent',  'ar' => 'هلال متناقص'],
    ];

    /**
     * Get moon phase for a given date.
     * Uses a pure astronomical algorithm (no API dependency).
     *
     * @return array{name: string, icon: string, icon_class: string, illumination: float, age: float, description: string, ar: string, days_to_new_moon: int}
     */
    public function getPhase(?Carbon $date = null): array
    {
        $date = $date ?? Carbon::today();

        // Check DB cache first
        $cached = MoonPhase::where('date', $date->toDateString())->first();
        if ($cached) {
            $phaseInfo = $this->phaseData[$cached->phase_name] ?? $this->phaseData['New Moon'];
            return [
                'name' => $cached->phase_name,
                'icon' => $phaseInfo['icon'],
                'icon_class' => $phaseInfo['icon_class'],
                'illumination' => $cached->illumination_pct,
                'age' => 0,
                'description' => $this->getDescription($cached->phase_name, $cached->illumination_pct),
                'ar' => $phaseInfo['ar'],
                'days_to_new_moon' => $cached->days_to_next_new_moon ?? 0,
                'is_crescent_visible' => $cached->is_crescent_visible,
            ];
        }

        // Calculate astronomically
        return $this->calculate($date);
    }

    /**
     * Calculate moon phase using astronomical algorithm.
     * Based on the synodic month (29.53058868 days).
     */
    public function calculate(Carbon $date): array
    {
        // Reference new moon: January 6, 2000 at 18:14 UTC
        $referenceNewMoon = Carbon::create(2000, 1, 6, 18, 14, 0, 'UTC');
        $synodicMonth = 29.53058868;

        $daysSinceReference = $referenceNewMoon->diffInSeconds($date) / 86400;
        $moonAge = fmod($daysSinceReference, $synodicMonth);
        if ($moonAge < 0) $moonAge += $synodicMonth;

        // Illumination percentage (approximate using cosine)
        $illumination = round((1 - cos(2 * M_PI * $moonAge / $synodicMonth)) / 2 * 100, 1);

        // Phase name based on age
        $phaseName = $this->getPhaseNameFromAge($moonAge, $synodicMonth);

        // Days to next new moon
        $daysToNewMoon = (int) round($synodicMonth - $moonAge);
        if ($daysToNewMoon <= 0) $daysToNewMoon = (int) round($synodicMonth);

        // Crescent visibility (typically visible when age is 1-3 days)
        $isCrescentVisible = $moonAge >= 1.0 && $moonAge <= 3.5;

        $phaseInfo = $this->phaseData[$phaseName] ?? $this->phaseData['New Moon'];

        // Cache to database
        MoonPhase::updateOrCreate(
            ['date' => $date->toDateString()],
            [
                'phase_name' => $phaseName,
                'phase_angle' => round($moonAge / $synodicMonth * 360, 2),
                'illumination_pct' => $illumination,
                'days_to_next_new_moon' => $daysToNewMoon,
                'is_crescent_visible' => $isCrescentVisible,
            ]
        );

        return [
            'name' => $phaseName,
            'icon' => $phaseInfo['icon'],
            'icon_class' => $phaseInfo['icon_class'],
            'illumination' => $illumination,
            'age' => round($moonAge, 1),
            'description' => $this->getDescription($phaseName, $illumination),
            'ar' => $phaseInfo['ar'],
            'days_to_new_moon' => $daysToNewMoon,
            'is_crescent_visible' => $isCrescentVisible,
        ];
    }

    /**
     * Determine phase name from moon age.
     */
    private function getPhaseNameFromAge(float $age, float $synodic): string
    {
        $eighth = $synodic / 8;

        if ($age < $eighth)          return 'New Moon';
        if ($age < $eighth * 2)      return 'Waxing Crescent';
        if ($age < $eighth * 3)      return 'First Quarter';
        if ($age < $eighth * 4)      return 'Waxing Gibbous';
        if ($age < $eighth * 5)      return 'Full Moon';
        if ($age < $eighth * 6)      return 'Waning Gibbous';
        if ($age < $eighth * 7)      return 'Last Quarter';
        return 'Waning Crescent';
    }

    /**
     * Get a human-friendly description for the phase.
     */
    private function getDescription(string $phaseName, float $illumination): string
    {
        return match ($phaseName) {
            'New Moon'         => "The moon is not visible. A new Islamic month may begin soon.",
            'Waxing Crescent'  => "The crescent moon is growing. {$illumination}% illuminated.",
            'First Quarter'    => "Half the moon is illuminated. {$illumination}% visible.",
            'Waxing Gibbous'   => "The moon is nearly full. {$illumination}% illuminated.",
            'Full Moon'        => "The moon is fully illuminated ({$illumination}%). Ayyam al-Bid — recommended fasting days (13th, 14th, 15th of Hijri month).",
            'Waning Gibbous'   => "The moon is past full, {$illumination}% illuminated and decreasing.",
            'Last Quarter'     => "Half the moon is visible, {$illumination}% illuminated.",
            'Waning Crescent'  => "Only a sliver remains. {$illumination}% illuminated. The month is ending.",
            default            => "{$illumination}% illuminated.",
        };
    }
}
