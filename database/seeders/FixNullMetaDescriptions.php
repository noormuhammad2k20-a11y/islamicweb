<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FixNullMetaDescriptions extends Seeder
{
    /**
     * ISSUE 2: Fill 451 NULL meta_description entries in seo_metas table.
     * Uses content-type-specific templates to generate relevant descriptions.
     */
    public function run(): void
    {
        $nullCount = DB::table('seo_metas')->whereNull('meta_description')->count();
        $this->command->info("Found {$nullCount} records with NULL meta_description.");

        $fixedCount = 0;

        // Get all NULL description records with their metaable info
        $records = DB::table('seo_metas')
            ->whereNull('meta_description')
            ->get();

        foreach ($records as $record) {
            $description = $this->generateDescription($record);
            
            if ($description) {
                // Ensure max 160 chars
                $description = Str::limit($description, 157, '...');
                
                DB::table('seo_metas')
                    ->where('id', $record->id)
                    ->update([
                        'meta_description' => $description,
                        'updated_at' => now(),
                    ]);
                $fixedCount++;
            }
        }

        $remaining = DB::table('seo_metas')->whereNull('meta_description')->count();
        $this->command->info("✅ ISSUE 2 Fixed: {$fixedCount} meta descriptions generated. Remaining NULL: {$remaining}");
    }

    private function generateDescription(object $record): ?string
    {
        $type = $record->metaable_type ?? '';
        $title = $record->title ?? '';

        // Clean the title (remove site name and ID suffixes)
        $cleanTitle = preg_replace('/\s*\|\s*NoorIslam\s*/', '', $title);
        $cleanTitle = preg_replace('/\s*\|\s*[0-9]+$/', '', $cleanTitle);
        $cleanTitle = trim($cleanTitle);

        // Determine content type from metaable_type
        if (Str::contains($type, 'Dua')) {
            return $this->duaDescription($cleanTitle, $record);
        }
        
        if (Str::contains($type, 'AllahName')) {
            return $this->allahNameDescription($cleanTitle, $record);
        }
        
        if (Str::contains($type, 'Hadith')) {
            return $this->hadithDescription($cleanTitle, $record);
        }
        
        if (Str::contains($type, 'Surah')) {
            return $this->surahDescription($cleanTitle, $record);
        }

        if (Str::contains($type, 'Wazifa') || Str::contains($type, 'Wazaif')) {
            return $this->wazifaDescription($cleanTitle, $record);
        }

        if (Str::contains($type, 'IslamicName')) {
            return $this->islamicNameDescription($cleanTitle, $record);
        }

        if (Str::contains($type, 'DreamSymbol')) {
            return $this->dreamDescription($cleanTitle, $record);
        }

        // Generic fallback using title
        if ($cleanTitle) {
            return "NoorIslam par {$cleanTitle} ke baare mein mukammal maloomat. Arabic text, Urdu tarjuma aur tafseelat ke sath parhen.";
        }

        return null;
    }

    private function duaDescription(string $title, object $record): string
    {
        // Try to get more info from the dua record
        $dua = null;
        if ($record->metaable_id) {
            $dua = DB::table('duas')->find($record->metaable_id);
        }

        $category = '';
        if ($dua) {
            // Try to get category name
            $catId = DB::table('dua_dua_category')->where('dua_id', $dua->id)->value('dua_category_id');
            if ($catId) {
                $cat = DB::table('dua_categories')->find($catId);
                $category = $cat->name_roman_urdu ?? $cat->name_english ?? '';
            }
        }

        $reference = $dua->hadith_reference ?? $dua->reference ?? '';

        if ($category && $reference) {
            return "NoorIslam par {$title} Arabic, Urdu tarjuma aur Roman Urdu mein parhen. {$category} ki yeh dua {$reference} se masnoon hai. Benefits aur method bhi parhen.";
        }

        return "NoorIslam par {$title} Arabic, Urdu tarjuma aur Roman Urdu mein parhen. Complete benefits aur hadith references ke sath.";
    }

    private function allahNameDescription(string $title, object $record): string
    {
        $name = null;
        if ($record->metaable_id) {
            $name = DB::table('allah_names')->find($record->metaable_id);
        }

        if ($name) {
            $num = $name->number ?? '';
            $arabic = $name->arabic ?? '';
            $meaning = $name->meaning_english ?? $name->meaning_urdu ?? '';
            
            if ($num && $arabic && $meaning) {
                return "{$name->transliteration} ({$arabic}) — {$num}th name of Allah. Meaning: {$meaning}. Benefits of reciting, Quranic reference aur dhikr method NoorIslam par.";
            }
        }

        return "{$title} — Allah ka naam, meaning, benefits aur fazilat NoorIslam par parhen. Quranic references aur dhikr ke tareeqe ke sath.";
    }

    private function hadithDescription(string $title, object $record): string
    {
        $hadith = null;
        if ($record->metaable_id) {
            $hadith = DB::table('hadiths')->find($record->metaable_id);
        }

        if ($hadith) {
            $collection = $hadith->book_name ?? '';
            $narrator = $hadith->narrator ?? '';
            
            if ($collection && $narrator) {
                return "{$title} — {$collection} ki yeh hadith {$narrator} ki riwayat hai. Arabic text, Urdu tarjuma aur tashreeh NoorIslam par.";
            }
        }

        return "{$title} — hadith Arabic text, Urdu tarjuma aur tashreeh NoorIslam par parhen. Sahih references ke sath.";
    }

    private function surahDescription(string $title, object $record): string
    {
        $surah = null;
        if ($record->metaable_id) {
            $surah = DB::table('surahs')->find($record->metaable_id);
        }

        if ($surah) {
            $ayahs = $surah->total_ayahs ?? '';
            $type = $surah->revelation_type ?? '';
            $arabic = $surah->name_ar ?? '';
            
            return "Read Surah {$surah->name_en} ({$arabic}) — {$ayahs} ayahs, {$type}. Full Arabic text, Urdu tarjuma, Tafsir, PDF & audio NoorIslam par.";
        }

        return "Read {$title} — Full Arabic text, Urdu tarjuma, Tafsir aur audio NoorIslam par. Complete surah with word by word translation.";
    }

    private function wazifaDescription(string $title, object $record): string
    {
        return "NoorIslam par {$title} ka mukammal tariqa, Arabic text, Urdu tarjuma aur fazilat. Scholar verified wazaif with authentic references.";
    }

    private function islamicNameDescription(string $title, object $record): string
    {
        $name = null;
        if ($record->metaable_id) {
            $name = DB::table('islamic_names')->find($record->metaable_id);
        }

        if ($name) {
            $meaning = $name->meaning_english ?? $name->meaning_urdu ?? '';
            $gender = $name->gender ?? '';
            
            if ($meaning) {
                return "{$title} — Islamic {$gender} name meaning \"{$meaning}\". Origin, lucky number, aur Urdu meaning NoorIslam par.";
            }
        }

        return "{$title} — Islamic name meaning, origin, lucky number aur Urdu mein tafseelat NoorIslam par parhen.";
    }

    private function dreamDescription(string $title, object $record): string
    {
        return "{$title} — Khwabon ki tabeer (dream interpretation) in Urdu. Islamic dream meaning with authentic references NoorIslam par.";
    }
}
