<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DreamCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name_english' => 'Prophets', 'name_urdu' => 'انبیاء کرام', 'slug' => 'anbiya', 'icon' => '✨', 'description' => 'خواب میں انبیاء کرام کو دیکھنے کی تعبیر'],
            ['name_english' => 'Sahaba', 'name_urdu' => 'صحابہ کرام', 'slug' => 'sahaba', 'icon' => '👥', 'description' => 'صحابہ کرام کے خوابوں کی تعبیر'],
            ['name_english' => 'Worship', 'name_urdu' => 'عبادات', 'slug' => 'ibadat', 'icon' => '🕌', 'description' => 'نماز، روزہ، حج اور زکوٰۃ کے خواب'],
            ['name_english' => 'Animals', 'name_urdu' => 'جانور', 'slug' => 'janwar', 'icon' => '🦁', 'description' => 'مختلف جانوروں کو خواب میں دیکھنا'],
            ['name_english' => 'Birds', 'name_urdu' => 'پرندے', 'slug' => 'parinday', 'icon' => '🦅', 'description' => 'پرندوں سے متعلق خوابوں کی تعبیر'],
            ['name_english' => 'Insects', 'name_urdu' => 'حشرات', 'slug' => 'hashraat', 'icon' => '🐜', 'description' => 'کیڑے مکوڑوں کے خواب'],
            ['name_english' => 'Fruits', 'name_urdu' => 'پھل', 'slug' => 'phal', 'icon' => '🍎', 'description' => 'خواب میں پھل کھانے یا دیکھنے کی تعبیر'],
            ['name_english' => 'Vegetables', 'name_urdu' => 'سبزیاں', 'slug' => 'sabziyan', 'icon' => '🥬', 'description' => 'سبزیوں کے خوابوں کی تعبیر'],
            ['name_english' => 'Foods & Drinks', 'name_urdu' => 'کھانا پینا', 'slug' => 'khana-peena', 'icon' => '🍞', 'description' => 'مختلف کھانوں اور مشروبات کے خواب'],
            ['name_english' => 'Clothing', 'name_urdu' => 'لباس', 'slug' => 'libaas', 'icon' => '👕', 'description' => 'کپڑوں اور لباس کے خواب'],
            ['name_english' => 'Jewelry', 'name_urdu' => 'زیورات', 'slug' => 'zewarat', 'icon' => '💍', 'description' => 'سونے چاندی اور زیورات کے خواب'],
            ['name_english' => 'Body Parts', 'name_urdu' => 'اعضائے جسمانی', 'slug' => 'aaza-e-jism', 'icon' => '👁️', 'description' => 'جسم کے مختلف حصوں کے خواب'],
            ['name_english' => 'Family', 'name_urdu' => 'خاندان', 'slug' => 'khandan', 'icon' => '👨‍👩‍👧‍👦', 'description' => 'رشتہ داروں اور خاندان کے خواب'],
            ['name_english' => 'Nature', 'name_urdu' => 'قدرتی مناظر', 'slug' => 'qudrati-manazir', 'icon' => '⛰️', 'description' => 'پہاڑ، سمندر، اور قدرتی چیزوں کے خواب'],
            ['name_english' => 'Weather', 'name_urdu' => 'موسم', 'slug' => 'mausam', 'icon' => '🌧️', 'description' => 'بارش، طوفان، اور موسم کے خواب'],
            ['name_english' => 'Vehicles', 'name_urdu' => 'سواری', 'slug' => 'sawari', 'icon' => '🚗', 'description' => 'گاڑیوں اور سواریوں کے خواب'],
            ['name_english' => 'Death', 'name_urdu' => 'موت و مردے', 'slug' => 'maut-murday', 'icon' => '🪦', 'description' => 'موت یا مردہ افراد کو خواب میں دیکھنا'],
            ['name_english' => 'Marriage', 'name_urdu' => 'شادی', 'slug' => 'shadi', 'icon' => '👰', 'description' => 'شادی اور نکاح کے خواب'],
            ['name_english' => 'Wealth', 'name_urdu' => 'دولت اور پیسہ', 'slug' => 'daulat', 'icon' => '💰', 'description' => 'پیسے اور دولت کے خواب'],
            ['name_english' => 'Weapons', 'name_urdu' => 'ہتھیار', 'slug' => 'hathiyar', 'icon' => '⚔️', 'description' => 'تلوار، بندوق اور دیگر ہتھیار'],
            ['name_english' => 'Colors', 'name_urdu' => 'رنگ', 'slug' => 'rang', 'icon' => '🎨', 'description' => 'مختلف رنگوں کے خواب'],
            ['name_english' => 'Actions', 'name_urdu' => 'افعال و حرکات', 'slug' => 'afaal', 'icon' => '🏃', 'description' => 'رونا، ہنسنا، دوڑنا وغیرہ'],
            ['name_english' => 'Buildings', 'name_urdu' => 'عمارتیں', 'slug' => 'imarat', 'icon' => '🏠', 'description' => 'گھر، قلعے، اور عمارات'],
        ];

        foreach ($categories as $category) {
            DB::table('dream_categories')->updateOrInsert(
                ['slug' => $category['slug']],
                [
                    'name_english' => $category['name_english'],
                    'name_urdu' => $category['name_urdu'],
                    'icon' => $category['icon'],
                    'description' => $category['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
