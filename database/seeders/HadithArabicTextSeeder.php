<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class HadithArabicTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Running hadith:fetch-arabic command programmatically...');
        
        // Run it for Bukhari as priority
        Artisan::call('hadith:fetch-arabic', [
            '--collection' => '1',
            '--batch' => '100'
        ], $this->command->getOutput());
        
        // Optionally run for all (this takes more time)
        // Artisan::call('hadith:fetch-arabic', [
        //     '--collection' => 'all',
        //     '--batch' => '100'
        // ], $this->command->getOutput());
        
        $this->command->info('Arabic text fetch seeder completed.');
    }
}
