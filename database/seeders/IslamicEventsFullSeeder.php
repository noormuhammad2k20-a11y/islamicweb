<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IslamicEventsFullSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            ['name' => 'Eid ul Fitr - عید الفطر', 'description' => 'رمضان کے بعد شوال کی پہلی تاریخ کو عید الفطر منائی جاتی ہے۔', 'hijri_month_id' => 10, 'hijri_day' => 1, 'event_type' => 'major', 'slug' => 'eid-ul-fitr'],
            ['name' => 'Eid ul Adha - عید الاضحی', 'description' => 'ذوالحجہ کی 10 تاریخ کو عید الاضحی منائی جاتی ہے — حضرت ابراہیم علیہ السلام کی قربانی کی یاد میں۔', 'hijri_month_id' => 12, 'hijri_day' => 10, 'event_type' => 'major', 'slug' => 'eid-ul-adha'],
            ['name' => 'Shab-e-Meraj - شب معراج', 'description' => 'رجب کی 27 تاریخ کو نبی ﷺ کی معراج کی یاد میں شب معراج منائی جاتی ہے۔', 'hijri_month_id' => 7, 'hijri_day' => 27, 'event_type' => 'major', 'slug' => 'shab-e-meraj'],
            ['name' => 'Shab-e-Barat - شب برات', 'description' => 'شعبان کی 15 تاریخ کو شب برات منائی جاتی ہے — مغفرت کی رات۔', 'hijri_month_id' => 8, 'hijri_day' => 15, 'event_type' => 'major', 'slug' => 'shab-e-barat'],
            ['name' => 'Ashura - یوم عاشورہ', 'description' => 'محرم کی 10 تاریخ — حضرت حسین رضی اللہ عنہ کی شہادت اور حضرت موسیٰ علیہ السلام کی نجات کا دن۔', 'hijri_month_id' => 1, 'hijri_day' => 10, 'event_type' => 'major', 'slug' => 'ashura'],
            ['name' => 'Eid Milad-un-Nabi - 12 ربیع الاول', 'description' => 'نبی ﷺ کی ولادت باسعادت کا دن — 12 ربیع الاول۔', 'hijri_month_id' => 3, 'hijri_day' => 12, 'event_type' => 'major', 'slug' => 'eid-milad-un-nabi'],
            ['name' => 'Start of Ramadan - رمضان شروع', 'description' => 'رمضان المبارک کا آغاز — روزوں کا مہینہ۔', 'hijri_month_id' => 9, 'hijri_day' => 1, 'event_type' => 'major', 'slug' => 'ramadan-start'],
            ['name' => 'Laylatul Qadr - شب قدر', 'description' => 'رمضان کے آخری عشرے کی طاق راتوں میں — ہزار مہینوں سے بہتر رات۔', 'hijri_month_id' => 9, 'hijri_day' => 27, 'event_type' => 'major', 'slug' => 'laylatul-qadr'],
            ['name' => 'Day of Arafah - یوم عرفہ', 'description' => 'ذوالحجہ کی 9 تاریخ — حج کا سب سے اہم دن۔ اس دن کا روزہ پچھلے اور اگلے سال کے گناہ معاف کر دیتا ہے۔', 'hijri_month_id' => 12, 'hijri_day' => 9, 'event_type' => 'major', 'slug' => 'day-of-arafah'],
            ['name' => 'Islamic New Year - اسلامی نیا سال', 'description' => '1 محرم الحرام — اسلامی نئے سال کا آغاز۔', 'hijri_month_id' => 1, 'hijri_day' => 1, 'event_type' => 'major', 'slug' => 'islamic-new-year'],
        ];

        foreach ($events as $event) {
            DB::table('islamic_events')->updateOrInsert(
                ['slug' => $event['slug']],
                array_merge($event, ['created_at' => now(), 'updated_at' => now()])
            );
        }

        $this->command->info('✅ 10 major Islamic events seeded successfully.');
    }
}
