<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            if (!isset($view->city)) {
                // If controller didn't pass city, try default
                try {
                    $defaultCityId = \App\Models\SiteSetting::where('key', 'default_city_id')->value('value');
                    $city = \App\Models\City::find($defaultCityId) ?? \App\Models\City::first();
                    $view->with('city', $city);
                } catch (\Exception $e) {
                    // Ignore DB errors on migrations
                }
            }

            if (!isset($view->hijriDate)) {
                try {
                    $hijriDate = \App\Models\HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();
                    $view->with('hijriDate', $hijriDate);
                } catch (\Exception $e) {
                    // Ignore DB errors on migrations
                }
            }
        });
    }
}
