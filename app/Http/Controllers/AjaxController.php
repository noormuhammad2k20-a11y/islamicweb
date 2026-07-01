<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactMessage;
use App\Models\Subscriber;
use App\Models\City;
use App\Models\PrayerTime;

class AjaxController extends Controller
{
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully.']);
    }

    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create(['email' => $validated['email']]);

        return response()->json(['success' => true, 'message' => 'You have been subscribed successfully.']);
    }

    public function searchCities(Request $request)
    {
        $query = $request->input('q');
        $cities = City::where('name', 'like', "%{$query}%")->with('country')->limit(10)->get();
        
        return response()->json($cities);
    }

    public function hijriConvert(Request $request)
    {
        $date = $request->query('date');
        $direction = $request->query('direction');

        if (!$date || !in_array($direction, ['g2h', 'h2g'])) {
            return response()->json(['error' => 'Invalid parameters'], 400);
        }

        // Algorithmic approximation for demo purposes.
        // In a real production system, this should use genius-ts/hijri-dates or AlAdhan API.
        if ($direction === 'g2h') {
            $gDate = new \DateTime($date);
            $y = (int)$gDate->format('Y');
            $m = (int)$gDate->format('n');
            $d = (int)$gDate->format('j');
            
            $jd = gregoriantojd($m, $d, $y);
            // Hijri epoch offset is ~1948439.5
            $l = $jd - 1948440 + 10632;
            $n = (int)(($l - 1) / 10631);
            $l = $l - 10631 * $n + 354;
            $j = ((int)((10985 - $l) / 5316)) * ((int)(50 * $l / 17719)) + ((int)($l / 5670)) * ((int)(43 * $l / 15238));
            $l = $l - ((int)((30 - $j) / 15)) * ((int)((17719 * $j) / 50)) - ((int)($j / 16)) * ((int)((15238 * $j) / 43)) + 29;
            $m = (int)(24 * $l / 709);
            $d = $l - (int)(709 * $m / 24);
            $y = 30 * $n + $j - 30;

            $hijriMonths = [
                1 => 'Muharram', 2 => 'Safar', 3 => 'Rabi Al-Awwal', 4 => 'Rabi Al-Thani',
                5 => 'Jumada Al-Awwal', 6 => 'Jumada Al-Thani', 7 => 'Rajab', 8 => 'Shaban',
                9 => 'Ramadan', 10 => 'Shawwal', 11 => 'Dhul Qadah', 12 => 'Dhul Hijjah'
            ];

            $resultText = $gDate->format('d M') . " ≈ " . $d . " " . ($hijriMonths[$m] ?? '') . " " . $y . " AH";
            $resultSubtext = "Gregorian to Hijri (Approximate)";
        } else {
            $parts = explode('-', $date);
            if (count($parts) === 3) {
                $y = (int)$parts[0];
                $m = (int)$parts[1];
                $d = (int)$parts[2];
                $jd = (int)((11 * $y + 3) / 30) + 354 * $y + 30 * $m - (int)(($m - 1) / 2) + $d + 1948440 - 385;
                $gDateArr = cal_from_jd($jd, CAL_GREGORIAN);
                
                $resultText = $d . " " . ($hijriMonths[$m] ?? "Month $m") . " ≈ " . $gDateArr['day'] . " " . $gDateArr['monthname'] . " " . $gDateArr['year'];
                $resultSubtext = "Hijri to Gregorian (Approximate)";
            } else {
                $resultText = "Invalid Date";
                $resultSubtext = "Please check inputs";
            }
        }

        return response()->json([
            'result_text' => $resultText,
            'result_subtext' => $resultSubtext
        ]);
    }

    public function prayerTimesToday(City $city)
    {
        $prayerTimes = PrayerTime::where('city_id', $city->id)
            ->where('date', date('Y-m-d'))
            ->first();

        return response()->json($prayerTimes);
    }
}
