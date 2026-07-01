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
        $hijri_month->events = \App\Models\HistoricalEvent::where('hijri_month', $hijri_month->name_en)->get();
        
        $currentHijriYear = $apiService->getCurrentHijriYear();
        $calendarDates = $apiService->getHijriMonthCalendar($hijri_month->month_number, $currentHijriYear);

        return view('pages.events.month', compact('hijri_month', 'calendarDates', 'currentHijriYear'));
    }
}
