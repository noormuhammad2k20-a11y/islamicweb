<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixLeadingHyphenTitles extends Seeder
{
    /**
     * ISSUE 4: Fix 15 titles with leading hyphens where English/Roman name is missing.
     * Example: ' - سید الاستغفار | 1' → 'Sayyid al-Istighfar — سید الاستغفار | NoorIslam'
     */
    public function run(): void
    {
        $affected = DB::table('seo_metas')
            ->where('title', 'LIKE', ' - %')
            ->get();

        $this->command->info("Found {$affected->count()} titles with leading hyphen.");

        $fixedCount = 0;

        foreach ($affected as $meta) {
            // Try to get the linked model's name for a proper title
            $newTitle = $this->reconstructTitle($meta);
            
            if ($newTitle) {
                DB::table('seo_metas')
                    ->where('id', $meta->id)
                    ->update([
                        'title' => $newTitle,
                        'updated_at' => now(),
                    ]);
                $fixedCount++;
                $this->command->line("  Fixed ID {$meta->id}: '{$meta->title}' → '{$newTitle}'");
            }
        }

        $this->command->info("✅ ISSUE 4 Fixed: {$fixedCount}/{$affected->count()} titles reconstructed.");
    }

    private function reconstructTitle(object $meta): ?string
    {
        // Extract the Arabic/Urdu part from the broken title
        // Pattern: ' - [Arabic text] | [number]'
        $title = trim($meta->title);
        
        // Remove leading " - " and trailing " | number"
        $arabicPart = preg_replace('/^\s*-\s*/', '', $title);
        $arabicPart = preg_replace('/\s*\|\s*[0-9]+$/', '', $arabicPart);
        $arabicPart = trim($arabicPart);
        
        if (empty($arabicPart)) {
            return null;
        }

        // Try to find the linked metaable record for a proper English name
        if ($meta->metaable_type && $meta->metaable_id) {
            $model = null;
            
            try {
                $modelClass = $meta->metaable_type;
                if (class_exists($modelClass)) {
                    $model = $modelClass::find($meta->metaable_id);
                }
            } catch (\Exception $e) {
                // Model not found, continue with fallback
            }

            if ($model) {
                // Try various name fields
                $englishName = $model->title_english 
                    ?? $model->title_roman_urdu 
                    ?? $model->name_en 
                    ?? $model->transliteration 
                    ?? $model->name
                    ?? null;
                
                if ($englishName) {
                    return "{$englishName} — {$arabicPart} | NoorIslam";
                }
            }
        }

        // Fallback: create a cleaned title with just the Arabic part
        return "{$arabicPart} | NoorIslam";
    }
}
