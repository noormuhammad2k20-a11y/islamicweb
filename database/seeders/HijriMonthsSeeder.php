<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HijriMonthsSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hijri_months')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $months = [
            ['id' => 1, 'month_number' => 1, 'name_en' => 'Muharram', 'name_ur' => 'محرم', 'name_ar' => 'ٱلْمُحَرَّم', 'significance_content' => 'The month of remembrance. Fasting on the Day of Ashura is highly recommended.', 'slug' => 'muharram'],
            ['id' => 2, 'month_number' => 2, 'name_en' => 'Safar', 'name_ur' => 'صفر', 'name_ar' => 'صَفَر', 'significance_content' => 'The second month of the Islamic calendar.', 'slug' => 'safar'],
            ['id' => 3, 'month_number' => 3, 'name_en' => 'Rabi al-Awwal', 'name_ur' => 'ربیع الاول', 'name_ar' => 'رَبِيع ٱلْأَوَّل', 'significance_content' => 'The month in which the Prophet Muhammad (PBUH) was born.', 'slug' => 'rabi-al-awwal'],
            ['id' => 4, 'month_number' => 4, 'name_en' => 'Rabi al-Thani', 'name_ur' => 'ربیع الثانی', 'name_ar' => 'رَبِيع ٱلْآخِر', 'significance_content' => 'The fourth month of the Islamic calendar.', 'slug' => 'rabi-al-thani'],
            ['id' => 5, 'month_number' => 5, 'name_en' => 'Jumada al-Awwal', 'name_ur' => 'جمادی الاول', 'name_ar' => 'جُمَادَىٰ ٱلْأُولَىٰ', 'significance_content' => 'The fifth month of the Islamic calendar.', 'slug' => 'jumada-al-awwal'],
            ['id' => 6, 'month_number' => 6, 'name_en' => 'Jumada al-Thani', 'name_ur' => 'جمادی الثانی', 'name_ar' => 'جُمَادَىٰ ٱلْآخِرَة', 'significance_content' => 'The sixth month of the Islamic calendar.', 'slug' => 'jumada-al-thani'],
            ['id' => 7, 'month_number' => 7, 'name_en' => 'Rajab', 'name_ur' => 'رجب', 'name_ar' => 'رَجَب', 'significance_content' => 'One of the sacred months. Month of Isra and Mi\'raj.', 'slug' => 'rajab'],
            ['id' => 8, 'month_number' => 8, 'name_en' => 'Sha\'ban', 'name_ur' => 'شعبان', 'name_ar' => 'شَعْبَان', 'significance_content' => 'Month of preparation for Ramadan. Includes Shab-e-Barat.', 'slug' => 'shaban'],
            ['id' => 9, 'month_number' => 9, 'name_en' => 'Ramadan', 'name_ur' => 'رمضان', 'name_ar' => 'رَمَضَان', 'significance_content' => 'The holiest month, month of fasting and the Quran.', 'slug' => 'ramadan'],
            ['id' => 10, 'month_number' => 10, 'name_en' => 'Shawwal', 'name_ur' => 'شوال', 'name_ar' => 'شَوَّال', 'significance_content' => 'Month of Eid ul-Fitr. Fasting 6 days is recommended.', 'slug' => 'shawwal'],
            ['id' => 11, 'month_number' => 11, 'name_en' => 'Dhu al-Qi\'dah', 'name_ur' => 'ذو القعدہ', 'name_ar' => 'ذُو ٱلْقَعْدَة', 'significance_content' => 'One of the sacred months.', 'slug' => 'dhu-al-qidah'],
            ['id' => 12, 'month_number' => 12, 'name_en' => 'Dhu al-Hijjah', 'name_ur' => 'ذو الحجہ', 'name_ar' => 'ذُو ٱلْحِجَّة', 'significance_content' => 'Month of Hajj and Eid ul-Adha. The first 10 days are blessed.', 'slug' => 'dhu-al-hijjah'],
        ];

        $now = Carbon::now();
        foreach ($months as &$month) {
            $month['created_at'] = $now;
            $month['updated_at'] = $now;
        }

        DB::table('hijri_months')->insert($months);
    }
}
