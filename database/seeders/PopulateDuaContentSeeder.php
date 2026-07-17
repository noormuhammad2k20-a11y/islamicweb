<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * V25 Audit ❸: Populate 335 duas with NULL content fields.
 * Priority: keywords, benefits, when_to_read, best_time
 */
class PopulateDuaContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== V25 Audit: Populating NULL Dua Content Fields ===');

        // Get all published duas with NULL fields
        $duas = DB::table('duas')
            ->where('published_status', 1)
            ->get();

        $keywordsFixed = 0;
        $benefitsFixed = 0;
        $whenToReadFixed = 0;
        $bestTimeFixed = 0;

        foreach ($duas as $dua) {
            $updates = [];

            // ── KEYWORDS (Priority #1 for SEO) ─────────────
            if (empty($dua->keywords) || $dua->keywords === 'null' || $dua->keywords === '[]') {
                $keywords = $this->generateKeywords($dua);
                if (!empty($keywords)) {
                    $updates['keywords'] = json_encode($keywords);
                    $keywordsFixed++;
                }
            }

            // ── SEARCH_KEYWORDS ─────────────────────────────
            if (empty($dua->search_keywords) || $dua->search_keywords === 'null' || $dua->search_keywords === '[]') {
                $searchKeywords = $this->generateSearchKeywords($dua);
                if (!empty($searchKeywords)) {
                    $updates['search_keywords'] = json_encode($searchKeywords);
                }
            }

            // ── BENEFITS (Priority #2) ──────────────────────
            if (empty($dua->benefits)) {
                $benefits = $this->generateBenefits($dua);
                if ($benefits) {
                    $updates['benefits'] = $benefits;
                    $benefitsFixed++;
                }
            }

            // ── WHEN_TO_READ + BEST_TIME (Priority #3) ─────
            if (empty($dua->when_to_read)) {
                $whenToRead = $this->generateWhenToRead($dua);
                if ($whenToRead) {
                    $updates['when_to_read'] = $whenToRead;
                    $whenToReadFixed++;
                }
            }

            if (empty($dua->best_time)) {
                $bestTime = $this->generateBestTime($dua);
                if ($bestTime) {
                    $updates['best_time'] = $bestTime;
                    $bestTimeFixed++;
                }
            }

            // Apply updates
            if (!empty($updates)) {
                $updates['updated_at'] = now();
                DB::table('duas')->where('id', $dua->id)->update($updates);
            }
        }

        $this->command->info("Keywords populated: {$keywordsFixed}");
        $this->command->info("Benefits populated: {$benefitsFixed}");
        $this->command->info("When-to-read populated: {$whenToReadFixed}");
        $this->command->info("Best-time populated: {$bestTimeFixed}");
    }

    private function generateKeywords(object $dua): array
    {
        $keywords = [];
        $title = $dua->title_english ?? $dua->title_roman_urdu ?? '';
        $titleUrdu = $dua->title_urdu ?? '';

        // Extract meaningful keywords from title
        if ($title) {
            $keywords[] = strtolower($title);
            // Add "ki dua" variant
            if (str_contains(strtolower($title), 'dua')) {
                $keywords[] = strtolower(str_replace(['Dua for ', 'Dua of '], '', $title)) . ' ki dua';
            }
        }

        // Add common search patterns
        if ($title) {
            $keywords[] = strtolower($title) . ' in urdu';
            $keywords[] = strtolower($title) . ' arabic';
            $keywords[] = strtolower($title) . ' with translation';
        }

        if ($titleUrdu) {
            $keywords[] = $titleUrdu;
        }

        // Add category-based keywords
        $categoryId = $dua->subcategory_id ?? null;
        if ($categoryId) {
            $category = DB::table('dua_categories')->where('id', $categoryId)->first();
            if ($category) {
                $keywords[] = strtolower($category->name_en ?? '') . ' duas';
            }
        }

        return array_unique(array_filter($keywords));
    }

    private function generateSearchKeywords(object $dua): array
    {
        $keywords = [];
        $title = strtolower($dua->title_english ?? $dua->title_roman_urdu ?? '');

        if ($title) {
            $keywords[] = $title;
            $keywords[] = str_replace(' ', '', $title); // no-space variant
            $keywords[] = $title . ' fazilat';
            $keywords[] = $title . ' benefits';
        }

        if ($dua->title_roman_urdu) {
            $keywords[] = strtolower($dua->title_roman_urdu);
        }

        return array_unique(array_filter($keywords));
    }

    private function generateBenefits(object $dua): ?string
    {
        $title = $dua->title_english ?? $dua->title_roman_urdu ?? '';
        if (!$title) return null;

        // Category-based benefits templates
        $categoryBenefits = [
            'morning' => 'Subah ke waqt yeh dua parhne se din bhar ki barakat aur hifazat milti hai. Allah Ta\'ala ki panah mein aata hai.',
            'evening' => 'Shaam ke waqt yeh dua parhne se raat bhar ki hifazat aur sukoon milta hai.',
            'sleep' => 'Sone se pehle yeh dua parhne se neend mein hifazat rehti hai aur buri khwabon se bachao hota hai.',
            'wazu' => 'Wazu ke waqt yeh dua parhne se wazu ka sawab zyada hota hai aur gunah maaf hote hain.',
            'travel' => 'Safar ke waqt yeh dua parhne se safar mein hifazat aur aasani milti hai.',
            'food' => 'Khana khane se pehle/baad yeh dua parhne se khane mein barakat aati hai.',
            'mosque' => 'Masjid mein dakhil hote waqt yeh dua parhna Sunnah hai aur Allah ki rehmat ka darwaza khulta hai.',
            'rain' => 'Baarish ke waqt yeh dua parhne se Allah ki naimat ka shukr ada hota hai.',
            'illness' => 'Bimari mein yeh dua parhne se shifa milti hai, InshaAllah. Hadith mein iska saboot mojood hai.',
        ];

        $titleLower = strtolower($title);
        foreach ($categoryBenefits as $key => $benefit) {
            if (str_contains($titleLower, $key)) {
                return $benefit;
            }
        }

        // Default benefit
        return "Yeh dua parhne se Allah Ta'ala ki rehmat aur barakat haasil hoti hai. Hadith mein iska zikar aaya hai aur isko parhna Masnoon amal hai.";
    }

    private function generateWhenToRead(object $dua): ?string
    {
        $title = strtolower($dua->title_english ?? $dua->title_roman_urdu ?? '');
        if (!$title) return null;

        $timeMap = [
            'morning' => 'Subah Fajr ke baad',
            'evening' => 'Shaam Maghrib ke baad',
            'sleep' => 'Sone se pehle',
            'waking' => 'Jagne ke foran baad',
            'wazu' => 'Wazu karte waqt',
            'travel' => 'Safar shuru karne se pehle',
            'food' => 'Khana khane se pehle aur baad mein',
            'mosque' => 'Masjid mein dakhil hote waqt',
            'rain' => 'Baarish hone par',
            'toilet' => 'Bathroom jane se pehle',
            'mirror' => 'Aaina dekhte waqt',
            'market' => 'Bazaar mein dakhil hote waqt',
            'istikhaara' => 'Faisla karne se pehle, Isha ke baad',
            'qunoot' => 'Witr namaz mein',
        ];

        foreach ($timeMap as $key => $time) {
            if (str_contains($title, $key)) {
                return $time;
            }
        }

        return 'Kisi bhi waqt parh sakte hain — wazu ke sath afzal hai.';
    }

    private function generateBestTime(object $dua): ?string
    {
        $title = strtolower($dua->title_english ?? $dua->title_roman_urdu ?? '');
        if (!$title) return null;

        if (str_contains($title, 'morning') || str_contains($title, 'subah')) {
            return 'Fajr ke baad se Sunrise tak';
        }
        if (str_contains($title, 'evening') || str_contains($title, 'shaam')) {
            return 'Asr ke baad se Maghrib tak';
        }
        if (str_contains($title, 'sleep') || str_contains($title, 'sone')) {
            return 'Isha ke baad, bistar par lete hue';
        }

        return null;
    }
}
