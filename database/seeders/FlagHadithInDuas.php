<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlagHadithInDuas extends Seeder
{
    /**
     * ISSUE 6: Flag Dua IDs 21–220 that contain Hadith narrations (not actual duas).
     * Sets published_status = 0 to hide them from public pages.
     * This is non-destructive — records can be re-enabled if needed.
     */
    public function run(): void
    {
        // Check how many records exist in the range
        $totalInRange = DB::table('duas')
            ->whereBetween('id', [21, 220])
            ->count();

        $this->command->info("Found {$totalInRange} records in Dua IDs 21-220 range.");

        // Identify Hadith narrations by checking for common patterns
        $hadithPatterns = [
            'Narrated%',
            'narrated%',
            'The Prophet%said%',
            'Allah\'s Messenger%',
            'I heard%Messenger%',
        ];

        // Count records that match hadith narration patterns
        $query = DB::table('duas')->whereBetween('id', [21, 220]);
        
        // Check seo_metas for narration patterns in titles
        $hadithTitles = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\Dua')
            ->whereBetween('metaable_id', [21, 220])
            ->where(function ($q) use ($hadithPatterns) {
                foreach ($hadithPatterns as $pattern) {
                    $q->orWhere('title', 'LIKE', $pattern);
                }
            })
            ->count();

        $this->command->info("Found {$hadithTitles} hadith-patterned titles in SEO metas for this range.");

        // Flag ALL records in range 21-220 as unpublished
        // (per audit report, all of these are hadith narrations, not actual duas)
        $updated = DB::table('duas')
            ->whereBetween('id', [21, 220])
            ->update([
                'published_status' => 0,
                'updated_at' => now(),
            ]);

        $this->command->info("✅ ISSUE 6 Fixed: {$updated} dua records (IDs 21-220) set to unpublished.");
        $this->command->info("   These hadith narrations are now hidden from the duas section.");
        $this->command->warn("   To undo: UPDATE duas SET published_status = 1 WHERE id BETWEEN 21 AND 220;");
    }
}
