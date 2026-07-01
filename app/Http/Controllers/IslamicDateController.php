<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\HijriDateCache;
use App\Models\HistoricalEvent;
use App\Models\IslamicEvent;
use App\Models\HijriMonth;

class IslamicDateController extends Controller
{
    private function getTodayEvents($hijriDate)
    {
        if (!$hijriDate) return collect();
        return HistoricalEvent::where('hijri_day', $hijriDate->hijri_day)
            ->where('hijri_month', $hijriDate->hijri_month)
            ->get();
    }

    private function getMoonPhase($hijriDay)
    {
        if (!$hijriDay) return ['name' => 'Unknown', 'icon' => 'fa-moon', 'description' => ''];
        
        $hijriDay = (int) $hijriDay;
        if ($hijriDay >= 1 && $hijriDay <= 3) return ['name' => 'Waxing Crescent', 'icon' => 'fa-moon', 'description' => 'The moon is beginning to illuminate.'];
        if ($hijriDay >= 4 && $hijriDay <= 6) return ['name' => 'First Quarter', 'icon' => 'fa-adjust', 'description' => 'Half of the moon is visible.'];
        if ($hijriDay >= 7 && $hijriDay <= 12) return ['name' => 'Waxing Gibbous', 'icon' => 'fa-moon', 'description' => 'Most of the moon is illuminated.'];
        if ($hijriDay >= 13 && $hijriDay <= 15) return ['name' => 'Full Moon', 'icon' => 'fa-circle', 'description' => 'The moon is fully illuminated. (Ayyam al-Bid)'];
        if ($hijriDay >= 16 && $hijriDay <= 21) return ['name' => 'Waning Gibbous', 'icon' => 'fa-moon', 'description' => 'Illumination is decreasing.'];
        if ($hijriDay >= 22 && $hijriDay <= 25) return ['name' => 'Last Quarter', 'icon' => 'fa-adjust', 'description' => 'Half of the moon is visible, decreasing.'];
        return ['name' => 'Waning Crescent', 'icon' => 'fa-moon', 'description' => 'Only a sliver of the moon is visible.'];
    }

    private function getUpcomingEvents($currentHijriDate)
    {
        if (!$currentHijriDate) return collect();
        
        $currentMonth = HijriMonth::where('name_en', $currentHijriDate->hijri_month)
            ->orWhere('name_ar', $currentHijriDate->hijri_month)
            ->first();
            
        if (!$currentMonth) return collect();
        
        $currentMonthId = $currentMonth->id;
        $currentDay = $currentHijriDate->hijri_day;

        $events = IslamicEvent::with('hijriMonth')->get();
        
        $events = $events->map(function ($event) use ($currentMonthId, $currentDay) {
            $monthDiff = $event->hijri_month_id - $currentMonthId;
            if ($monthDiff < 0) {
                $monthDiff += 12; // Next year
            }
            $dayDiff = $event->hijri_day - $currentDay;
            $daysAway = ($monthDiff * 29.5) + $dayDiff;
            
            if ($daysAway < 0) {
                $daysAway += 354; 
            }
            
            $event->days_away = round($daysAway);
            return $event;
        })->filter(function($event) {
            return $event->days_away >= 0;
        })->sortBy('days_away')->values();

        return $events->take(3);
    }

    private function getMonthlyCalendar($currentHijriDate)
    {
        if (!$currentHijriDate) return collect();
        
        return HijriDateCache::where('hijri_month', $currentHijriDate->hijri_month)
            ->where('hijri_year', $currentHijriDate->hijri_year)
            ->orderBy('hijri_day', 'asc')
            ->get();
    }
    
    private function isFastingDay($gregorianDate, $hijriDay)
    {
        $fastingDays = [];
        $dayOfWeek = date('l', strtotime($gregorianDate));
        
        if ($dayOfWeek === 'Monday' || $dayOfWeek === 'Thursday') {
            $fastingDays[] = 'Sunnah Fasting (' . $dayOfWeek . ')';
        }
        
        if (in_array($hijriDay, [13, 14, 15])) {
            $fastingDays[] = 'Ayyam al-Bid (White Days)';
        }
        
        return $fastingDays;
    }

    public function hub()
    {
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();
        $countries = Country::get();
        $historicalEvents = $this->getTodayEvents($hijriDate);
        
        $moonPhase = $this->getMoonPhase($hijriDate ? $hijriDate->hijri_day : null);
        $upcomingEvents = $this->getUpcomingEvents($hijriDate);
        $monthlyCalendar = $this->getMonthlyCalendar($hijriDate);
        $fastingDays = $hijriDate ? $this->isFastingDay($hijriDate->gregorian_date, $hijriDate->hijri_day) : [];

        $seoMeta = \App\Models\SeoMeta::where('metaable_type', 'static')->where('metaable_id', 2)->first();

        return view('pages.islamic-date.hub', compact('hijriDate', 'countries', 'historicalEvents', 'moonPhase', 'upcomingEvents', 'monthlyCalendar', 'fastingDays', 'seoMeta'));
    }

    public function country(Country $country)
    {
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();
        $historicalEvents = $this->getTodayEvents($hijriDate);
        
        $moonPhase = $this->getMoonPhase($hijriDate ? $hijriDate->hijri_day : null);
        $upcomingEvents = $this->getUpcomingEvents($hijriDate);
        $monthlyCalendar = $this->getMonthlyCalendar($hijriDate);
        $fastingDays = $hijriDate ? $this->isFastingDay($hijriDate->gregorian_date, $hijriDate->hijri_day) : [];

        $seoMeta = null;
        if (strtolower($country->slug) === 'pakistan') {
            $seoMeta = \App\Models\SeoMeta::where('metaable_type', 'static')->where('metaable_id', 1)->first();
        }

        return view('pages.islamic-date.country', compact('hijriDate', 'country', 'historicalEvents', 'moonPhase', 'upcomingEvents', 'monthlyCalendar', 'fastingDays', 'seoMeta'));
    }

}
