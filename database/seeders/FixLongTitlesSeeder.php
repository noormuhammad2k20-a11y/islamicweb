<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❶ & ❹: Fix long titles (>60 chars) and short descriptions (<100 chars)
 */
class FixLongTitlesSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Fixing Long Titles & Short Descriptions ===');

        // ── ❶ FIX SURAH TITLES (>60 chars) ─────────────────────
        $surahFixed = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\Surah')
            ->whereRaw('LENGTH(title) > 60')
            ->update([
                'title' => DB::raw("REPLACE(title, ' — Arabic, Urdu Tarjuma & Tafsir | NoorIslam', ' | Urdu Tarjuma | NoorIslam')")
            ]);
        $this->command->info("Surah titles shortened: {$surahFixed}");

        // Also try alternate pattern
        $surahFixed2 = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\Surah')
            ->whereRaw('LENGTH(title) > 60')
            ->update([
                'title' => DB::raw("REPLACE(title, ' — Arabic, Urdu Translation & Tafsir | NoorIslam', ' | Urdu Translation | NoorIslam')")
            ]);
        $this->command->info("Surah titles (alt pattern) shortened: {$surahFixed2}");

        // ── ❶ FIX DUA TITLES (Narrated hadith style, >60 chars) ─────
        // Truncate long dua titles to 57 chars + "..."
        $longDuaTitles = DB::table('seo_metas')
            ->where('metaable_type', 'App\\Models\\Dua')
            ->whereRaw('LENGTH(title) > 60')
            ->get();

        $duaFixed = 0;
        foreach ($longDuaTitles as $meta) {
            $newTitle = $this->smartTruncateTitle($meta->title, 60, $meta->metaable_id);
            try {
                DB::table('seo_metas')
                    ->where('id', $meta->id)
                    ->update(['title' => $newTitle]);
                $duaFixed++;
            } catch (\Exception $e) {
                // Ignore unique constraint violation for duplicate titles
            }
        }
        $this->command->info("Dua titles truncated: {$duaFixed}");

        // ── ❶ FIX ANY REMAINING LONG TITLES ─────────────────────
        $remainingLong = DB::table('seo_metas')
            ->whereRaw('LENGTH(title) > 60')
            ->get();

        $otherFixed = 0;
        foreach ($remainingLong as $meta) {
            $newTitle = $this->smartTruncateTitle($meta->title, 60, $meta->metaable_id);
            try {
                DB::table('seo_metas')
                    ->where('id', $meta->id)
                    ->update(['title' => $newTitle]);
                $otherFixed++;
            } catch (\Exception $e) {
                // Ignore unique constraint violation
            }
        }
        $this->command->info("Other long titles truncated: {$otherFixed}");

        // ── ❹ FIX SHORT DESCRIPTIONS (<100 chars) ───────────────
        $shortDescs = DB::table('seo_metas')
            ->whereRaw('LENGTH(meta_description) < 100')
            ->whereNotNull('meta_description')
            ->where('meta_description', '!=', '')
            ->get();

        $descFixed = 0;
        foreach ($shortDescs as $meta) {
            $newDesc = $this->extendDescription($meta);
            if ($newDesc && strlen($newDesc) >= 100) {
                DB::table('seo_metas')
                    ->where('id', $meta->id)
                    ->update(['meta_description' => $newDesc]);
                $descFixed++;
            }
        }
        $this->command->info("Short descriptions extended: {$descFixed}");

        // ── FINAL REPORT ────────────────────────────────────────
        $stillLong = DB::table('seo_metas')->whereRaw('LENGTH(title) > 60')->count();
        $stillShort = DB::table('seo_metas')
            ->whereRaw('LENGTH(meta_description) < 100')
            ->whereNotNull('meta_description')
            ->where('meta_description', '!=', '')
            ->count();

        $this->command->info("── Report ──");
        $this->command->info("Titles still >60 chars: {$stillLong}");
        $this->command->info("Descriptions still <100 chars: {$stillShort}");
    }

    /**
     * Smart truncate title to max chars, keeping NoorIslam brand.
     */
    private function smartTruncateTitle(string $title, int $maxLength, $id = null): string
    {
        if (strlen($title) <= $maxLength) {
            return $title;
        }

        $brand = ' | NoorIslam';
        $brandLen = strlen($brand);

        // Append ID to ensure uniqueness if provided
        $idSuffix = $id ? " #{$id}" : "";
        $brand = $idSuffix . $brand;
        $brandLen = strlen($brand);

        // If title already ends with | NoorIslam, truncate the content part
        if (str_ends_with($title, $brand)) {
            $content = substr($title, 0, strlen($title) - $brandLen);
            $maxContent = $maxLength - $brandLen;
            if ($maxContent > 10) {
                $content = mb_substr($content, 0, $maxContent - 3) . '...';
                return $content . $brand;
            }
        }

        // Remove "Narrated " prefix for cleaner title
        if (str_starts_with($title, 'Narrated ')) {
            $title = substr($title, 9);
        }

        // Just truncate with ellipsis + brand
        $maxContent = $maxLength - $brandLen - 3;
        if ($maxContent > 10) {
            return mb_substr($title, 0, $maxContent) . '... | NoorIslam';
        }

        return mb_substr($title, 0, $maxLength - 3) . '...';
    }

    /**
     * Extend a short description to 145-155 chars.
     */
    private function extendDescription(object $meta): string
    {
        $desc = $meta->meta_description;
        $type = $meta->metaable_type ?? '';

        // Common suffixes to pad descriptions
        $suffixes = [
            'App\\Models\\Dua' => ' Mukammal Arabic text, Urdu tarjuma, Roman Urdu, Hadith references aur fazilat ke sath NoorIslam par parhen.',
            'App\\Models\\Surah' => ' Mukammal Arabic text, Urdu tarjuma, tafsir, PDF download aur audio tilawat NoorIslam par.',
            'App\\Models\\AllahName' => ' Allah ke iss naam ki fazilat, dhikr ka tarika aur Quranic references NoorIslam par parhen.',
        ];

        $suffix = $suffixes[$type] ?? ' Authentic Islamic content NoorIslam par parhen — Quran, Duas, Hadith aur Islamic tools ke sath.';

        $extended = rtrim($desc, '.') . '.' . $suffix;

        // Trim to 155 chars max
        if (strlen($extended) > 155) {
            $extended = mb_substr($extended, 0, 152) . '...';
        }

        return $extended;
    }
}
