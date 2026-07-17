<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❺: SEO Meta for 3,755+ Hadiths.
 */
class HadithSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for Hadiths ===');

        $existingCount = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\Hadith')
            ->count();
        $this->command->info("Existing SEO entries: {$existingCount}");

        $totalCreated = 0;

        DB::table('hadiths')->orderBy('id')->chunk(500, function ($hadiths) use (&$totalCreated) {
            $inserts = [];

            foreach ($hadiths as $hadith) {
                $exists = DB::table('seo_metas')
                    ->where('metaable_type', 'App\\Models\\Hadith')
                    ->where('metaable_id', $hadith->id)
                    ->exists();

                if ($exists) continue;

                $bookName = $hadith->book_name ?? 'Hadith';
                $reference = $hadith->reference ?? $hadith->hadith_number ?? '';
                $topicName = $this->getTopicName($hadith->id) ?? 'Islamic Topic';
                
                // Get collection slug if available to build canonical URL
                $collectionSlug = $this->getCollectionSlug($hadith->collection_id, $bookName);
                
                // Construct fallback slug if needed
                $slug = $hadith->slug ?? \Illuminate\Support\Str::slug("{$bookName} {$reference}");

                // Determine canonical URL path based on available info
                $urlPath = '';
                if ($collectionSlug && $hadith->chapter_number && $reference) {
                    $urlPath = "hadith/{$collectionSlug}/{$hadith->chapter_number}/" . \Illuminate\Support\Str::slug($reference);
                } elseif ($collectionSlug) {
                    $urlPath = "hadith/{$collectionSlug}/hadith/{$slug}"; // Fallback format
                } else {
                    $urlPath = "hadith/topic/{$slug}"; // Another fallback
                }

                // Title: max 60 chars
                $title = $this->generateTitle($bookName, $reference, $topicName, $hadith->id);

                // Description: 145-155 chars
                $description = $this->generateDescription($bookName, $reference, $hadith->english_translation ?? $hadith->urdu_translation ?? '');

                $inserts[] = [
                    'metaable_type' => 'App\\Models\\Hadith',
                    'metaable_id' => $hadith->id,
                    'title' => $title,
                    'meta_description' => $description,
                    'canonical_url' => 'https://noorislam.com/' . $urlPath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $totalCreated++;
            }

            if (!empty($inserts)) {
                foreach (array_chunk($inserts, 100) as $batch) {
                    DB::table('seo_metas')->insert($batch);
                }
            }

            $this->command->info("  Processed chunk... Total so far: {$totalCreated}");
        });

        $finalCount = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\Hadith')
            ->count();
        $this->command->info("✅ Hadith SEO entries: {$finalCount}");
    }
    
    private function getTopicName($hadithId)
    {
        $topicId = DB::table('hadith_hadith_topic')->where('hadith_id', $hadithId)->value('hadith_topic_id');
        if ($topicId) {
            return DB::table('hadith_topics')->where('id', $topicId)->value('topic_name');
        }
        return null;
    }
    
    private function getCollectionSlug($collectionId, $bookName)
    {
        if ($collectionId) {
            return DB::table('hadith_collections')->where('id', $collectionId)->value('slug');
        }
        return \Illuminate\Support\Str::slug($bookName);
    }

    private function generateTitle(string $bookName, string $reference, string $topicName, $id): string
    {
        $title = "{$bookName} {$reference} on {$topicName} | NoorIslam";
        
        if (strlen($title) > 60) {
            $title = "{$bookName} {$reference} | NoorIslam";
        }
        if (strlen($title) > 60) {
            $title = mb_substr("{$bookName} {$reference}", 0, 45) . " #{$id} | NoorIslam";
        } else {
            // Also ensure uniqueness by appending ID if not already truncated heavily, but only if it's likely to duplicate
            if (strlen($title) > 50) {
                 $title = mb_substr($title, 0, 40) . " #{$id} | NoorIslam";
            }
        }
        return $title;
    }

    private function generateDescription(string $bookName, string $reference, string $translation): string
    {
        $desc = "Read authentic {$bookName} Hadith {$reference} with Arabic text, Urdu and English translation. ";

        if ($translation) {
            $transShort = mb_substr(strip_tags($translation), 0, 50);
            $desc .= "\"{$transShort}...\" ";
        }

        $desc .= 'Discover more authentic hadiths on NoorIslam.';

        if (strlen($desc) > 155) {
            $desc = mb_substr($desc, 0, 152) . '...';
        } elseif (strlen($desc) < 145) {
            $desc .= ' Authentic Islamic knowledge.';
            if (strlen($desc) > 155) {
                $desc = mb_substr($desc, 0, 155);
            }
        }

        return trim($desc);
    }
}
