<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DuaCategory;

class DuaCategorySeeder extends Seeder
{
    public function run(): void
    {
        $parents = [
            ['name_english'=>'Daily Routine Duas','name_urdu'=>'روزمرہ کی دعائیں','slug'=>'daily-routine-duas','name_roman_urdu'=>'Rozmarrah Ki Duain','icon_class'=>'fa-calendar-day','seo_title'=>'روزمرہ کی دعائیں - Daily Routine Duas in Urdu & Arabic','seo_description'=>'Sone ki dua se le kar ghar se nikalne tak - tamam rozmarrah ki zaroori duain Arabic, Urdu tarjuma aur Roman Urdu ke sath.'],
            ['name_english'=>'Namaz & Azan Duas','name_urdu'=>'نماز اور اذان کی دعائیں','slug'=>'namaz-azan-duas','name_roman_urdu'=>'Namaz Aur Azan Ki Duain','icon_class'=>'fa-mosque','seo_title'=>'نماز اور اذان کی دعائیں - Namaz Ki Dua in Arabic Urdu','seo_description'=>'Azan se le kar namaz ke baad tak tamam duain - wazu, masjid, ruku, sajda, attahiyat, dua e qunoot with full Arabic text.'],
            ['name_english'=>'Ramadan & Fasting Duas','name_urdu'=>'رمضان اور روزے کی دعائیں','slug'=>'ramadan-fasting-duas','name_roman_urdu'=>'Ramadan Aur Roze Ki Duain','icon_class'=>'fa-moon','seo_title'=>'رمضان اور روزے کی دعائیں - Sehri Iftaar Duas in Urdu','seo_description'=>'Sehri, iftaar, taraweeh, shab e qadr, teen ashron ki duain - poora Ramadan guide Arabic aur Urdu mein.'],
            ['name_english'=>'Sickness & Protection Duas','name_urdu'=>'بیماری اور حفاظت کی دعائیں','slug'=>'sickness-protection-duas','name_roman_urdu'=>'Bimari Aur Hifazat Ki Duain','icon_class'=>'fa-shield-alt','seo_title'=>'بیماری اور حفاظت کی دعائیں - Shifa Ki Dua in Arabic Urdu','seo_description'=>'Bukhar, sar dard, pait dard, khansi, nazre bad - tamam bimariyon ki Islamic duain Hadith ke hawale ke sath.'],
            ['name_english'=>'Needs, Success & Forgiveness','name_urdu'=>'ضرورت، کامیابی اور مغفرت','slug'=>'needs-success-forgiveness','name_roman_urdu'=>'Zaroorat Kamyabi Aur Maghfirat','icon_class'=>'fa-star-and-crescent','seo_title'=>'کامیابی اور مغفرت کی دعائیں - Dua e Hajat & Maghfirat in Urdu','seo_description'=>'Dua e hajat, kamyabi, imtihan, qarz se nijaat, rizq mein barkat - tamam zaroorat ki duain Arabic Urdu ke sath.'],
            ['name_english'=>'Specific Islamic Duas & Manzil','name_urdu'=>'مخصوص اسلامی دعائیں اور منزل','slug'=>'specific-islamic-duas','name_roman_urdu'=>'Makhsoos Islami Duain','icon_class'=>'fa-book-quran','seo_title'=>'مخصوص اسلامی دعائیں - Manzil Dua e Istikhara Dua e Noor in Urdu','seo_description'=>'Manzil, dua e istikhara, dua e noor, dua e kumail, dua e ganjul arsh, nade ali - tamam mashhoor duain mukammal tarjume ke sath.'],
            ['name_english'=>'Occasions & Seasonal Duas','name_urdu'=>'مواقع اور موسمی دعائیں','slug'=>'occasions-seasonal-duas','name_roman_urdu'=>'Mawaqa Aur Mausami Duain','icon_class'=>'fa-calendar-check','seo_title'=>'مواقع کی دعائیں - Safar Jumma Qurbani Barish Ki Dua in Urdu','seo_description'=>'Safar, jumma, chand dekhna, qurbani, barish, naya saal, waldain, aulad - tamam mawaqa ki duain hadith ke sath.'],
        ];

        foreach ($parents as $p) {
            DuaCategory::firstOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }
    }
}
