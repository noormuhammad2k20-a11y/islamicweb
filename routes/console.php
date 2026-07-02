<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Schedule;

Schedule::command('islamic:refresh-prayer-times')->dailyAt('04:00');
Schedule::command('islamic:refresh-hijri-date')->dailyAt('00:30');
Schedule::command('islamic:refresh-zakat-rates')->weeklyOn(1, '06:00');
Schedule::command('islamic:generate-sitemap')->dailyAt('02:00');
Schedule::command('islamic:rotate-hadith-of-day')->dailyAt('00:00');
Schedule::command('islamic:refresh-ramadan-timings')->dailyAt('04:30')->when(fn() => in_array(now()->month, [8,9,10]));
