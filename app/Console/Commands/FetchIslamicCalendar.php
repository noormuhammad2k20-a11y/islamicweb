<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AladhanApiService;

class FetchIslamicCalendar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'islamic:fetch-calendar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and caches the Islamic calendar using the UAQ method from AlAdhan API';

    /**
     * Execute the console command.
     */
    public function handle(AladhanApiService $apiService)
    {
        $this->info('Starting Islamic Calendar Fetch process...');

        try {
            $currentYear = $apiService->getCurrentHijriYear();
            
            // Loop through all 12 Islamic months and cache their dates
            for ($month = 1; $month <= 12; $month++) {
                $this->info("Fetching calendar for month {$month}, year {$currentYear}...");
                
                $days = $apiService->getHijriMonthCalendar($month, $currentYear);
                
                if ($days && $days->count() > 0) {
                    $this->info("Successfully cached " . $days->count() . " days for month {$month}.");
                } else {
                    $this->error("Failed to fetch data for month {$month}.");
                }
                
                // Be gentle with the API
                sleep(1);
            }

            $this->info('Successfully finished fetching and caching the Islamic Calendar.');
            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
