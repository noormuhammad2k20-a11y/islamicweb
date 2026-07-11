<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ToolsController extends Controller
{
    public function qibla()
    {
        $seo = [
            'title' => 'Qibla Direction Finder Online - Exact Kaaba Compass | NoorIslam',
            'description' => 'Find the exact Qibla direction online from anywhere in the world using our live GPS compass and interactive map. Get accurate Kaaba bearing, prayer times, and distance.',
            'canonical' => url('/tools/qibla-direction'),
        ];
        return view('pages.tools.qibla', compact('seo'));
    }

    public function qiblaByLocation($country, $state = null, $city = null)
    {
        $countryName = Str::title(str_replace('-', ' ', $country));
        $stateName = $state ? Str::title(str_replace('-', ' ', $state)) : null;
        $cityName = $city ? Str::title(str_replace('-', ' ', $city)) : null;
        
        $locationParts = array_filter([$cityName, $stateName, $countryName]);
        $locationName = implode(', ', $locationParts);

        // Fetch coordinates using Nominatim API (Cached for 30 days to prevent rate limiting)
        $cacheKey = 'geocode_' . Str::slug($locationName);
        $coords = Cache::remember($cacheKey, now()->addDays(30), function () use ($locationName) {
            try {
                $response = Http::withHeaders(['User-Agent' => 'NoorIslam/1.0'])->get('https://nominatim.openstreetmap.org/search', [
                    'q' => $locationName,
                    'format' => 'json',
                    'limit' => 1
                ]);
                if ($response->successful() && !empty($response->json())) {
                    $data = $response->json()[0];
                    return ['lat' => (float) $data['lat'], 'lon' => (float) $data['lon']];
                }
            } catch (\Exception $e) {}
            return null;
        });

        $lat = $coords ? $coords['lat'] : 21.4225;
        $lon = $coords ? $coords['lon'] : 39.8262;

        // Calculate Qibla Bearing (Great Circle)
        $meccaLat = deg2rad(21.4225);
        $meccaLon = deg2rad(39.8262);
        $userLat = deg2rad($lat);
        $userLon = deg2rad($lon);

        $dLon = $meccaLon - $userLon;
        $y = sin($dLon) * cos($meccaLat);
        $x = cos($userLat) * sin($meccaLat) - sin($userLat) * cos($meccaLat) * cos($dLon);
        $bearing = (rad2deg(atan2($y, $x)) + 360) % 360;

        // Calculate Distance in KM (Haversine)
        $earthRadius = 6371;
        $dLat = $meccaLat - $userLat;
        $a = sin($dLat/2) * sin($dLat/2) + cos($userLat) * cos($meccaLat) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $distance = $earthRadius * $c;

        // Fetch Prayer Times & Hijri Date (Aladhan API)
        $prayerCache = 'prayer_' . $lat . '_' . $lon . '_' . date('Y-m-d');
        $prayerData = Cache::remember($prayerCache, now()->addHours(12), function() use ($lat, $lon) {
            try {
                $res = Http::get("http://api.aladhan.com/v1/timings", [
                    'latitude' => $lat, 'longitude' => $lon, 'method' => 2
                ]);
                if($res->successful()) return $res->json()['data'];
            } catch(\Exception $e) {}
            return null;
        });

        // Generate Dynamic FAQs
        $faqs = [
            ["q" => "What is the exact Qibla direction from $locationName?", "a" => "The exact Qibla direction from $locationName is " . round($bearing, 1) . "° from True North."],
            ["q" => "How far is the Kaaba from $locationName?", "a" => "The Kaaba is approximately " . number_format($distance) . " kilometers away from $locationName using the shortest Great Circle route."],
            ["q" => "Can I pray if my compass in $locationName is not working?", "a" => "Yes, if your digital compass is facing magnetic interference, use our Interactive Map to align yourself with known streets or landmarks in $locationName towards the red Qibla line."],
            ["q" => "What is the latitude and longitude of $locationName?", "a" => "The coordinates used for $locationName are Latitude: " . round($lat, 4) . ", Longitude: " . round($lon, 4) . "."],
            ["q" => "How do you calculate the Qibla for $locationName?", "a" => "We use the Haversine formula and Great Circle Navigation. Because the Earth is a sphere, this provides the most direct and accurate angle from $locationName to Makkah."]
        ];

        // Dynamic canonical URL construction
        $urlParams = array_filter([$country, $state, $city]);
        $canonical = url('/tools/qibla-direction/' . implode('/', $urlParams));

        $seo = [
            'title' => "Qibla Direction from $locationName - Accurate Kaaba Compass & Prayer Times",
            'description' => "Find the exact Qibla direction from $locationName. The Kaaba bearing is " . round($bearing, 1) . "°. View accurate prayer times and interactive map.",
            'canonical' => $canonical,
        ];

        return view('pages.tools.qibla', compact(
            'seo', 'countryName', 'stateName', 'cityName', 'locationName', 
            'lat', 'lon', 'bearing', 'distance', 'prayerData', 'faqs'
        ));
    }

    public function age()
    {
        return view('pages.tools.age');
    }

    public function eventFinder()
    {
        return view('pages.tools.events');
    }

    public function ramadanGenerator()
    {
        return view('pages.tools.ramadan_gen');
    }

    public function qiblaOnline()
    {
        return view('pages.placeholder', ['title' => 'qiblaOnline']);
    }

}
