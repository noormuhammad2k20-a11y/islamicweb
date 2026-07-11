<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HijriMonth;

class IslamicEventsController extends Controller
{
    public function index()
    {
        $months = HijriMonth::orderBy('month_number')->get();
        return view('pages.events.index', compact('months'));
    }

    public function month(HijriMonth $hijri_month, \App\Services\AladhanApiService $apiService)
    {
        $events = \App\Models\HistoricalEvent::where('hijri_month', $hijri_month->name_en)->get();
        $hijri_month->events = $events;
        
        $eventsByDate = $events->groupBy('hijri_day')->sortBy(function($item, $key) { return $key; });
        $eventsByCategory = $events->whereNotNull('category')->groupBy('category');
        $eventsByDynasty = $events->whereNotNull('dynasty')->groupBy('dynasty');
        
        $featuredEvent = $events->whereNotNull('full_history')->first();

        $stats = [
            'total_events' => $events->count(),
            'battles' => $events->where('category', 'Battles')->count(),
            'births' => $events->where('category', 'Births')->count(),
            'deaths' => $events->where('category', 'Deaths')->count(),
            'scholars' => $events->whereNotNull('related_scholar')->count(),
        ];
        
        $currentHijriYear = $apiService->getCurrentHijriYear();
        $calendarDates = $apiService->getHijriMonthCalendar($hijri_month->month_number, $currentHijriYear);

        $specificView = "pages.events.months.{$hijri_month->slug}";
        if (view()->exists($specificView)) {
            return view($specificView, compact('hijri_month', 'calendarDates', 'currentHijriYear', 'eventsByDate', 'eventsByCategory', 'eventsByDynasty', 'featuredEvent', 'stats'));
        }

        return view('pages.events.month_layout', compact('hijri_month', 'calendarDates', 'currentHijriYear', 'eventsByDate', 'eventsByCategory', 'eventsByDynasty', 'featuredEvent', 'stats'));
    }
}
