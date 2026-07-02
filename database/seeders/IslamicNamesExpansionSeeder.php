<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IslamicName;

class IslamicNamesExpansionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table to remove any fake/old records and start fresh
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        IslamicName::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $path = storage_path('app/names_master.json');
        if (!file_exists($path)) {
            $this->command->error("names_master.json not found. Run 'php artisan names:aggregate' first.");
            return;
        }

        $names = json_decode(file_get_contents($path), true);
        if (!$names) {
            $this->command->error("Failed to decode JSON from names_master.json.");
            return;
        }

        $this->command->info("Seeding " . count($names) . " authentic Islamic names...");

        // Insert in chunks of 500 to avoid memory issues
        $chunks = array_chunk($names, 500);
        foreach ($chunks as $chunk) {
            // Add timestamps to chunk records
            foreach ($chunk as &$record) {
                $record['created_at'] = now();
                $record['updated_at'] = now();
            }
            DB::table('islamic_names')->insert($chunk);
        }

        $this->command->info("Seeding complete!");
    }
}
