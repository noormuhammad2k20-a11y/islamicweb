<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SurahsCompleteSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('surahs')->truncate();
        
        $surahs = [
            [1, 'الفاتحة', 'Al-Fatiha', 'الفاتحہ', 'fatiha', 7, 'Makki'],
            [2, 'البقرة', 'Al-Baqarah', 'البقرہ', 'baqarah', 286, 'Madani'],
            [18, 'الكهف', 'Al-Kahf', 'الکہف', 'kahf', 110, 'Makki'],
            [32, 'السجدة', 'As-Sajdah', 'السجدہ', 'sajdah', 30, 'Makki'],
            [36, 'يس', 'Yaseen', 'یاسین', 'yaseen', 83, 'Makki'],
            [47, 'محمد', 'Muhammad', 'محمد', 'muhammad', 38, 'Madani'],
            [55, 'الرحمن', 'Ar-Rahman', 'الرحمن', 'rahman', 78, 'Makki'],
            [56, 'الواقعة', 'Al-Waqiah', 'الواقعہ', 'waqiah', 96, 'Makki'],
            [62, 'الجمعة', 'Al-Jumu\'ah', 'الجمعہ', 'juma', 11, 'Madani'],
            [64, 'التغابن', 'At-Taghabun', 'التغابن', 'taghabun', 18, 'Madani'],
            [67, 'الملك', 'Al-Mulk', 'الملک', 'mulk', 30, 'Makki'],
            [73, 'المزمل', 'Al-Muzammil', 'المزمل', 'muzammil', 20, 'Makki'],
            [78, 'النبأ', 'An-Naba', 'النباء', 'naba', 40, 'Makki'],
            [87, 'الأعلى', 'Al-A\'la', 'الاعلیٰ', 'ala', 19, 'Makki'],
            [93, 'الضحى', 'Ad-Duha', 'الضحیٰ', 'duha', 11, 'Makki'],
            [112, 'الإخلاص', 'Al-Ikhlas', 'الاخلاص', 'ikhlas', 4, 'Makki'],
            [113, 'الفلق', 'Al-Falaq', 'الفلق', 'falaq', 5, 'Makki'],
            [114, 'الناس', 'An-Nas', 'الناس', 'nas', 6, 'Makki']
        ];

        foreach ($surahs as $s) {
            DB::table('surahs')->insert([
                'id' => $s[0],
                'number' => $s[0],
                'name_ar' => $s[1],
                'name_en' => $s[2],
                'name_ur' => $s[3],
                'slug' => $s[4],
                'total_ayahs' => $s[5],
                'revelation_type' => $s[6],
                'meta_title' => 'Surah ' . $s[2] . ' — Arabic, Urdu Translation, PDF & Fazilat',
                'meta_description' => 'Read Surah ' . $s[2] . ' in Arabic with Urdu and English translation. Download PDF, listen to recitation, and learn Fazilat.',
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
