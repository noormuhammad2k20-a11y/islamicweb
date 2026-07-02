<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IslamicNameSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('islamic_names')->truncate();

        $names = [
            // Boys
            ['Muhammad', 'محمد', 'Praiseworthy, Glorified', 'Arabic', 'male'],
            ['Ahmed', 'أحمد', 'Highly Praised, Commendable', 'Arabic', 'male'],
            ['Ali', 'علي', 'High, Elevated, Champion', 'Arabic', 'male'],
            ['Umar', 'عمر', 'Life, Long Living', 'Arabic', 'male'],
            ['Ibrahim', 'إبراهيم', 'Father of Multitudes', 'Arabic', 'male'],
            ['Yusuf', 'يوسف', 'God increases (in piety and power)', 'Arabic', 'male'],
            ['Ayan', 'أيان', 'Gift of God, Time, Era', 'Arabic', 'male'],
            ['Hamza', 'حمزة', 'Lion, Competent, Brave', 'Arabic', 'male'],
            ['Bilal', 'بلال', 'Moisture, Water, First Muazzin of Islam', 'Arabic', 'male'],
            // Girls
            ['Fatima', 'فاطمة', 'Captivating, Abstaining', 'Arabic', 'female'],
            ['Aisha', 'عائشة', 'Living, Prosperous, Alive', 'Arabic', 'female'],
            ['Khadija', 'خديجة', 'Early Baby, Trustworthy', 'Arabic', 'female'],
            ['Maryam', 'مريم', 'Pious, Mother of Jesus', 'Arabic', 'female'],
            ['Zainab', 'زينب', 'Fragrant Flower, Ornament of the Father', 'Arabic', 'female'],
            ['Mirha', 'مرحة', 'Light of Allah, Nimble, Agile', 'Arabic', 'female'],
            ['Noor', 'نور', 'Light, Radiance', 'Arabic', 'female'],
            ['Hira', 'حراء', 'Darkness, Diamond, Cave of revelation', 'Arabic', 'female'],
            ['Sana', 'سناء', 'Brilliance, Radiance, Resplendence', 'Arabic', 'female'],
        ];

        foreach ($names as $n) {
            DB::table('islamic_names')->insert([
                'name_english' => $n[0],
                'name_arabic' => $n[1],
                'translation_urdu' => $n[2],
                'origin' => $n[3],
                'gender' => $n[4],
                'slug' => Str::slug($n[0]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
