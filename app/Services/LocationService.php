<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class LocationService
{
    /**
     * Reverse geocode coordinates to find city, state, country, and timezone.
     * Uses Geoapify as primary, Nominatim as fallback.
     */
    public function reverseGeocode($lat, $lon)
    {
        return Cache::remember("rev_geocode_{$lat}_{$lon}", 86400 * 30, function() use ($lat, $lon) {
            $data = $this->fetchFromGeoapify($lat, $lon);
            
            if (empty($data)) {
                $data = $this->fetchFromNominatim($lat, $lon);
            }
            
            return $data;
        });
    }

    private function fetchFromGeoapify($lat, $lon)
    {
        $apiKey = env('GEOAPIFY_API_KEY');
        if (!$apiKey) return [];

        try {
            $url = "https://api.geoapify.com/v1/geocode/reverse?lat={$lat}&lon={$lon}&apiKey={$apiKey}";
            $response = Http::timeout(5)->get($url);

            if ($response->successful() && isset($response->json()['features'][0]['properties'])) {
                $props = $response->json()['features'][0]['properties'];
                return [
                    'city' => $props['city'] ?? $props['town'] ?? $props['village'] ?? null,
                    'state' => $props['state'] ?? null,
                    'country' => $props['country'] ?? null,
                    'country_code' => $props['country_code'] ?? null,
                    'timezone' => $props['timezone']['name'] ?? null,
                ];
            }
        } catch (\Exception $e) {
            Log::error("Geoapify Reverse Geocode Error: " . $e->getMessage());
        }

        return [];
    }

    private function fetchFromNominatim($lat, $lon)
    {
        try {
            $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$lat}&lon={$lon}&zoom=10";
            // Nominatim requires a valid User-Agent
            $response = Http::withHeaders(['User-Agent' => 'Noor-e-Islam App'])->timeout(5)->get($url);

            if ($response->successful() && isset($response->json()['address'])) {
                $address = $response->json()['address'];
                return [
                    'city' => $address['city'] ?? $address['town'] ?? $address['village'] ?? $address['county'] ?? null,
                    'state' => $address['state'] ?? null,
                    'country' => $address['country'] ?? null,
                    'country_code' => $address['country_code'] ?? null,
                    'timezone' => null, // Nominatim doesn't provide timezone directly
                ];
            }
        } catch (\Exception $e) {
            Log::error("Nominatim Reverse Geocode Error: " . $e->getMessage());
        }

        return [];
    }
}
