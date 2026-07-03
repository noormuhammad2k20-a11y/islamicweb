<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AladhanApiService;
use Illuminate\Support\Facades\Log;

class SyncHijriCalendar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:hijri-calendar {year?} {startMonth=1} {endMonth=12}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Hijri calendar from AlAdhan API to local database cache';

    /**
     * Execute the console command.
     */
    public function handle(AladhanApiService $service)
    {
        $year = $this->argument('year');
        if (!$year) {
            $year = $service->getCurrentHijriYear();
        }

        $startMonth = (int) $this->argument('startMonth');
        $endMonth = (int) $this->argument('endMonth');

        $this->info("Starting Hijri calendar sync for Year: $year (Months $startMonth to $endMonth)...");
        
        $bar = $this->output->createProgressBar(($endMonth - $startMonth) + 1);
        $bar->start();

        for ($month = $startMonth; $month <= $endMonth; $month++) {
            try {
                $service->getHijriMonthCalendar($month, $year);
            } catch (\Exception $e) {
                Log::error("Failed to sync Hijri calendar for $month/$year: " . $e->getMessage());
            }
            // Sleep to avoid rate limits
            usleep(200000); // 200ms
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Successfully synced Hijri calendar.");
    }
}
