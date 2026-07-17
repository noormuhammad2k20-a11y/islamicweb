<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixSeoTitleSuffix extends Seeder
{
    /**
     * ISSUE 3: Remove trailing "| 123" numeric suffixes from 322+ SEO titles.
     * Handles unique constraint by appending content identifier when duplicates would occur.
     */
    public function run(): void
    {
        $records = DB::table('seo_metas')
            ->whereRaw("title REGEXP '\\\\| [0-9]+$'")
            ->get();

        $this->command->info("Found {$records->count()} titles with trailing numeric ID suffix.");

        if ($records->isEmpty()) {
            $this->command->info('✅ No titles to fix.');
            return;
        }

        $fixedCount = 0;
        $skippedCount = 0;

        foreach ($records as $record) {
            // Remove trailing " | 123" pattern
            $newTitle = preg_replace('/ \| [0-9]+$/', '', $record->title);
            $newTitle = trim($newTitle);

            // Skip if title is now empty
            if (empty($newTitle)) {
                $skippedCount++;
                continue;
            }

            // Check if the cleaned title would create a duplicate
            $existingWithSameTitle = DB::table('seo_metas')
                ->where('title', $newTitle)
                ->where('id', '!=', $record->id)
                ->exists();

            if ($existingWithSameTitle) {
                // Append a disambiguator using the metaable_id to make it unique
                $newTitle .= ' — ' . $record->metaable_id;
                
                // Still duplicate? Add type too
                $stillDuplicate = DB::table('seo_metas')
                    ->where('title', $newTitle)
                    ->where('id', '!=', $record->id)
                    ->exists();
                    
                if ($stillDuplicate) {
                    $skippedCount++;
                    $this->command->warn("  Skipped ID {$record->id}: would create duplicate title.");
                    continue;
                }
            }

            DB::table('seo_metas')
                ->where('id', $record->id)
                ->update([
                    'title' => $newTitle,
                    'updated_at' => now(),
                ]);
            $fixedCount++;
        }

        $remaining = DB::table('seo_metas')
            ->whereRaw("title REGEXP '\\\\| [0-9]+$'")
            ->count();

        $this->command->info("✅ ISSUE 3 Fixed: {$fixedCount} titles cleaned, {$skippedCount} skipped. Remaining: {$remaining}");
    }
}
