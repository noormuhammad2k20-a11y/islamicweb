<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use App\Services\PrayerTimesService;
use Illuminate\Support\Facades\Log;

class SyncPrayerTimes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:prayer-times {month?} {year?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and cache prayer times for all active cities for the given month and year';

    /**
     * Execute the console command.
     */
    public function handle(PrayerTimesService $service)
    {
        $month = $this->argument('month') ?: date('m');
        $year = $this->argument('year') ?: date('Y');

        $this->info("Starting prayer times sync for $month/$year...");
        
        $cities = City::all();
        $bar = $this->output->createProgressBar(count($cities));

        $bar->start();

        foreach ($cities as $city) {
            try {
                $service->fetchAndCacheForCity($city, $month, $year);
            } catch (\Exception $e) {
                Log::error("Failed to sync prayer times for city {$city->id}: " . $e->getMessage());
            }
            // Sleep to avoid rate limits
            usleep(200000); // 200ms
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Successfully synced prayer times.");
    }
}
