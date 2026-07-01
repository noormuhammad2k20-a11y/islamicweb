<?php

$markdown = file_get_contents('richtext_converted_to_markdown.md');

// Extract Phase 1A: Cities
preg_match_all('/UPDATE cities SET.*?;/is', $markdown, $citiesMatches);
$citiesSql = implode("\n", $citiesMatches[0]);

// Extract Phase 1B: Surahs
preg_match('/INSERT INTO `surahs`.*?\);/is', $markdown, $surahsMatch);
$surahsSql = $surahsMatch[0] ?? '';

// Phase 2A: Prayer Time Pages seo_metas
preg_match('/INSERT INTO `seo_metas` \(`metaable_type`, `metaable_id`, `title`, `meta_description`, `canonical_url`, `schema_override_json`, `created_at`, `updated_at`\)\s+SELECT\s+\'App\\\\\\\\Models\\\\\\\\City\'.*?;/is', $markdown, $seoCityMatch);
$seoCitySql = $seoCityMatch[0] ?? '';

// Phase 2B: Surah Pages
preg_match('/INSERT INTO `seo_metas` \(`metaable_type`, `metaable_id`, `title`, `meta_description`, `canonical_url`, `schema_override_json`, `created_at`, `updated_at`\)\s+SELECT\s+\'App\\\\\\\\Models\\\\\\\\Surah\',.*?FROM surahs;/is', $markdown, $seoSurahMatch);
$seoSurahSql = $seoSurahMatch[0] ?? '';

// Phase 2C: Islamic Date Pages
preg_match('/INSERT INTO `seo_metas` \(`metaable_type`, `metaable_id`, `title`, `meta_description`, `canonical_url`, `schema_override_json`, `created_at`, `updated_at`\)\s+VALUES.*?NOW\(\), NOW\(\)\);/is', $markdown, $seoDateMatch);
$seoDateSql = $seoDateMatch[0] ?? '';

// Phase 2D: Fazilat Pages
preg_match('/INSERT INTO `seo_metas` \(`metaable_type`, `metaable_id`, `title`, `meta_description`, `canonical_url`, `schema_override_json`, `created_at`, `updated_at`\)\s+SELECT\s+\'App\\\\\\\\Models\\\\\\\\Surah\',.*?FROM surahs WHERE id <= 20;/is', $markdown, $seoFazilatMatch);
$seoFazilatSql = $seoFazilatMatch[0] ?? '';


$seederContent = '<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoAndContentSeeder extends Seeder
{
    public function run()
    {
        // Phase 1A: Fix Wrong City Coordinates
        DB::unprepared("
' . addslashes($citiesSql) . '
        ");

        // Phase 1B: Add Missing Surahs
        DB::unprepared("DELETE FROM surahs WHERE id IN (1,2);");
        
        DB::unprepared("
' . addslashes($surahsSql) . '
        ");

        // Phase 2A: Prayer Time Pages - seo_metas for each city
        DB::unprepared("
' . addslashes($seoCitySql) . '
        ");

        // Phase 2B: Surah Pages - seo_metas
        DB::unprepared("
' . addslashes($seoSurahSql) . '
        ");

        // Phase 2C: Islamic Date Pages
        DB::unprepared("
' . addslashes($seoDateSql) . '
        ");

        // Phase 2D: Fazilat Pages - FAQPage Schema
        DB::unprepared("
' . addslashes($seoFazilatSql) . '
        ");
    }
}
';

file_put_contents('database/seeders/SeoAndContentSeeder.php', $seederContent);
echo "Seeder generated successfully.\n";
