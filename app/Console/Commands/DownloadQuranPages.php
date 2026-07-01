<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DownloadQuranPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quran:download-pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download all 604 Hafs Quran pages into the public directory for the Mushaf view';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Directory to save images
        $directory = public_path('images/quran/pages');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
            $this->info("Created directory: {$directory}");
        }

        $this->info('Starting download of 604 Quran pages...');
        
        $bar = $this->output->createProgressBar(604);
        $bar->start();

        $errors = 0;

        for ($page = 1; $page <= 604; $page++) {
            $filename = "{$page}.png";
            $filepath = $directory . '/' . $filename;

            // Skip if already exists
            if (File::exists($filepath)) {
                $bar->advance();
                continue;
            }

            // Using GovarJabbar/Quran-PNG repository which contains high-quality pages
            // Files in the repo are named 001.png, 002.png, ..., 604.png
            $paddedPage = str_pad($page, 3, '0', STR_PAD_LEFT);
            $url = "https://raw.githubusercontent.com/GovarJabbar/Quran-PNG/master/{$paddedPage}.png";

            try {
                $response = Http::timeout(10)->get($url);

                if ($response->successful()) {
                    File::put($filepath, $response->body());
                } else {
                    $errors++;
                }
            } catch (\Exception $e) {
                $errors++;
            }

            $bar->advance();
            // Sleep to avoid rate limiting
            usleep(100000); // 0.1s
        }

        $bar->finish();
        $this->newLine(2);

        if ($errors > 0) {
            $this->warn("Completed with {$errors} errors. Try running the command again to retry failed downloads.");
        } else {
            $this->info('All 604 pages downloaded successfully! They are stored in public/images/quran/pages/');
        }
    }
}
