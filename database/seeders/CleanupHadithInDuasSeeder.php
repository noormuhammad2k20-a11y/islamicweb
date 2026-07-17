<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❷: Flag/unpublish 698 "Narrated..." hadith entries in duas table.
 * Option B: Non-destructive — set published_status=0 and content_type='Hadith Reference'
 */
class CleanupHadithInDuasSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Cleaning up Hadith content in Duas table ===');

        // Count before
        $beforeCount = DB::table('duas')
            ->where('title_english', 'LIKE', 'Narrated %')
            ->count();
        $this->command->info("Found {$beforeCount} 'Narrated...' entries in duas table");

        // Option B: Unpublish and mark as Hadith Reference
        $updated = DB::table('duas')
            ->where('title_english', 'LIKE', 'Narrated %')
            ->update([
                'published_status' => 0,
                'content_type' => 'Hadith Reference',
                'updated_at' => now(),
            ]);
        $this->command->info("Unpublished and marked as 'Hadith Reference': {$updated}");

        // Verify
        $remaining = DB::table('duas')
            ->where('title_english', 'LIKE', 'Narrated %')
            ->where('published_status', 1)
            ->count();
        $this->command->info("Remaining published 'Narrated...' duas: {$remaining}");
    }
}
