<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❺: SEO Meta for 25 Cities (Prayer Times).
 */
class CitySeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Creating SEO Meta for Cities (Prayer Times) ===');

        $cities = DB::table('cities')->get();
        $created = 0;

        foreach ($cities as $city) {
            $exists = DB::table('seo_metas')
                ->where('metaable_type', 'App\\Models\\City')
                ->where('metaable_id', $city->id)
                ->exists();

            if ($exists) continue;

            $nameEn = $city->name ?? '';
            $nameUr = $city->name_urdu ?? $city->name_ur ?? '';
            $slug = $city->slug ?? \Illuminate\Support\Str::slug($nameEn);
            
            // Guess country slug based on country_id, assuming Pakistan for now if unknown as per routing
            $countrySlug = 'pakistan'; 
            if (isset($city->country_id)) {
               $countryName = DB::table('countries')->where('id', $city->country_id)->value('name');
               if ($countryName) {
                   $countrySlug = \Illuminate\Support\Str::slug($countryName);
               }
            }

            // Title: max 60 chars
            $title = "Prayer Times in {$nameEn} | NoorIslam";
            if ($nameUr) {
                 $title = "Prayer Times in {$nameEn} ({$nameUr}) | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = "Prayer Times in {$nameEn} | NoorIslam";
            }
            if (strlen($title) > 60) {
                $title = mb_substr("Prayer Times {$nameEn}", 0, 45) . ' | NoorIslam';
            }

            // Description: 148-155 chars
            $desc = "Accurate daily Namaz and Azan timings in {$nameEn}, {$countrySlug}. Get today's Fajr, Dhuhr, Asr, Maghrib, and Isha prayer times for {$nameEn} with NoorIslam.";

            if (strlen($desc) > 155) {
                $desc = mb_substr($desc, 0, 152) . '...';
            } elseif (strlen($desc) < 145) {
                $desc .= ' Authentic prayer schedules.';
                if (strlen($desc) > 155) {
                    $desc = mb_substr($desc, 0, 155);
                }
            }

            DB::table('seo_metas')->insert([
                'metaable_type' => 'App\\Models\\City',
                'metaable_id' => $city->id,
                'title' => $title,
                'meta_description' => $desc,
                // Note: The routing for prayer times is /prayer-times/{city}
                'canonical_url' => 'https://noorislam.com/prayer-times/' . $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $created++;
        }

        $this->command->info("✅ City SEO entries created: {$created}");
    }
}
