<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PakistanCitiesSeeder extends Seeder
{
    public function run(): void
    {
        $country = DB::table('countries')->where('slug', 'pakistan')->first();
        if (!$country) {
            $countryId = DB::table('countries')->insertGetId([
                'name' => 'Pakistan', 'slug' => 'pakistan', 'flag_code' => 'pk',
                'moon_sighting_authority' => 'Ruet-e-Hilal Committee',
                'default_timezone' => 'Asia/Karachi', 'created_at' => now(), 'updated_at' => now(),
            ]);
        } else {
            $countryId = $country->id;
        }

        $cities = [
            ['name' => 'Karachi', 'slug' => 'karachi', 'latitude' => 24.8607, 'longitude' => 67.0011, 'province' => 'Sindh', 'population' => 16094000, 'meta_title' => 'Karachi Namaz Time Today – آج کراچی نماز اوقات | NoorIslam', 'meta_description' => 'آج کراچی میں نماز کے اوقات - فجر، ظہر، عصر، مغرب، عشاء۔ درست اوقات نماز کراچی۔'],
            ['name' => 'Lahore', 'slug' => 'lahore', 'latitude' => 31.5204, 'longitude' => 74.3587, 'province' => 'Punjab', 'population' => 13095000, 'meta_title' => 'Lahore Namaz Time Today – آج لاہور نماز اوقات | NoorIslam', 'meta_description' => 'آج لاہور میں نماز کے اوقات - فجر، ظہر، عصر، مغرب، عشاء۔ درست اوقات نماز لاہور۔'],
            ['name' => 'Islamabad', 'slug' => 'islamabad', 'latitude' => 33.6844, 'longitude' => 73.0479, 'province' => 'ICT', 'population' => 1164000, 'meta_title' => 'Islamabad Namaz Time Today – آج اسلام آباد نماز اوقات | NoorIslam', 'meta_description' => 'آج اسلام آباد میں نماز کے اوقات۔'],
            ['name' => 'Rawalpindi', 'slug' => 'rawalpindi', 'latitude' => 33.5651, 'longitude' => 73.0169, 'province' => 'Punjab', 'population' => 3650000, 'meta_title' => 'Rawalpindi Namaz Time Today | NoorIslam', 'meta_description' => 'آج راولپنڈی میں نماز کے اوقات۔'],
            ['name' => 'Faisalabad', 'slug' => 'faisalabad', 'latitude' => 31.4187, 'longitude' => 73.0791, 'province' => 'Punjab', 'population' => 3675000, 'meta_title' => 'Faisalabad Namaz Time Today | NoorIslam', 'meta_description' => 'آج فیصل آباد میں نماز کے اوقات۔'],
            ['name' => 'Multan', 'slug' => 'multan', 'latitude' => 30.1575, 'longitude' => 71.5249, 'province' => 'Punjab', 'population' => 2100000, 'meta_title' => 'Multan Namaz Time Today | NoorIslam', 'meta_description' => 'آج ملتان میں نماز کے اوقات۔'],
            ['name' => 'Peshawar', 'slug' => 'peshawar', 'latitude' => 34.0151, 'longitude' => 71.5249, 'province' => 'KPK', 'population' => 2200000, 'meta_title' => 'Peshawar Namaz Time Today | NoorIslam', 'meta_description' => 'آج پشاور میں نماز کے اوقات۔'],
            ['name' => 'Quetta', 'slug' => 'quetta', 'latitude' => 30.1798, 'longitude' => 66.9750, 'province' => 'Balochistan', 'population' => 1140000, 'meta_title' => 'Quetta Namaz Time Today | NoorIslam', 'meta_description' => 'آج کوئٹہ میں نماز کے اوقات۔'],
            ['name' => 'Hyderabad', 'slug' => 'hyderabad', 'latitude' => 25.3960, 'longitude' => 68.3578, 'province' => 'Sindh', 'population' => 1733000, 'meta_title' => 'Hyderabad Namaz Time Today | NoorIslam', 'meta_description' => 'آج حیدرآباد میں نماز کے اوقات۔'],
            ['name' => 'Sialkot', 'slug' => 'sialkot', 'latitude' => 32.4945, 'longitude' => 74.5229, 'province' => 'Punjab', 'population' => 656000, 'meta_title' => 'Sialkot Namaz Time Today | NoorIslam', 'meta_description' => 'آج سیالکوٹ میں نماز کے اوقات۔'],
            ['name' => 'Gujranwala', 'slug' => 'gujranwala', 'latitude' => 32.1877, 'longitude' => 74.1945, 'province' => 'Punjab', 'population' => 2295000, 'meta_title' => 'Gujranwala Namaz Time Today | NoorIslam', 'meta_description' => 'آج گوجرانوالہ میں نماز کے اوقات۔'],
            ['name' => 'Bahawalpur', 'slug' => 'bahawalpur', 'latitude' => 29.3956, 'longitude' => 71.6836, 'province' => 'Punjab', 'population' => 762000, 'meta_title' => 'Bahawalpur Namaz Time Today | NoorIslam', 'meta_description' => 'آج بہاولپور میں نماز کے اوقات۔'],
            ['name' => 'Sargodha', 'slug' => 'sargodha', 'latitude' => 32.0836, 'longitude' => 72.6711, 'province' => 'Punjab', 'population' => 660000, 'meta_title' => 'Sargodha Namaz Time Today | NoorIslam', 'meta_description' => 'آج سرگودھا میں نماز کے اوقات۔'],
            ['name' => 'Sukkur', 'slug' => 'sukkur', 'latitude' => 27.7052, 'longitude' => 68.8574, 'province' => 'Sindh', 'population' => 550000, 'meta_title' => 'Sukkur Namaz Time Today | NoorIslam', 'meta_description' => 'آج سکھر میں نماز کے اوقات۔'],
            ['name' => 'Larkana', 'slug' => 'larkana', 'latitude' => 27.5580, 'longitude' => 68.2147, 'province' => 'Sindh', 'population' => 490000, 'meta_title' => 'Larkana Namaz Time Today | NoorIslam', 'meta_description' => 'آج لاڑکانہ میں نماز کے اوقات۔'],
            ['name' => 'Abbottabad', 'slug' => 'abbottabad', 'latitude' => 34.1688, 'longitude' => 73.2215, 'province' => 'KPK', 'population' => 400000, 'meta_title' => 'Abbottabad Namaz Time Today | NoorIslam', 'meta_description' => 'آج ایبٹ آباد میں نماز کے اوقات۔'],
            ['name' => 'Murree', 'slug' => 'murree', 'latitude' => 33.9070, 'longitude' => 73.3943, 'province' => 'Punjab', 'population' => 35000, 'meta_title' => 'Murree Namaz Time Today | NoorIslam', 'meta_description' => 'آج مری میں نماز کے اوقات۔'],
            ['name' => 'Gilgit', 'slug' => 'gilgit', 'latitude' => 35.9208, 'longitude' => 74.3144, 'province' => 'Gilgit-Baltistan', 'population' => 270000, 'meta_title' => 'Gilgit Namaz Time Today | NoorIslam', 'meta_description' => 'آج گلگت میں نماز کے اوقات۔'],
            ['name' => 'Mirpur', 'slug' => 'mirpur-ajk', 'latitude' => 33.1482, 'longitude' => 73.7518, 'province' => 'AJK', 'population' => 450000, 'meta_title' => 'Mirpur AJK Namaz Time Today | NoorIslam', 'meta_description' => 'آج میرپور آزاد کشمیر میں نماز کے اوقات۔'],
            ['name' => 'Muzaffarabad', 'slug' => 'muzaffarabad', 'latitude' => 34.3700, 'longitude' => 73.4700, 'province' => 'AJK', 'population' => 130000, 'meta_title' => 'Muzaffarabad Namaz Time Today | NoorIslam', 'meta_description' => 'آج مظفرآباد میں نماز کے اوقات۔'],
            ['name' => 'Dera Ismail Khan', 'slug' => 'dera-ismail-khan', 'latitude' => 31.8325, 'longitude' => 70.9016, 'province' => 'KPK', 'population' => 350000, 'meta_title' => 'D.I.Khan Namaz Time Today | NoorIslam', 'meta_description' => 'آج ڈیرہ اسماعیل خان میں نماز کے اوقات۔'],
            ['name' => 'Mardan', 'slug' => 'mardan', 'latitude' => 34.1980, 'longitude' => 72.0404, 'province' => 'KPK', 'population' => 360000, 'meta_title' => 'Mardan Namaz Time Today | NoorIslam', 'meta_description' => 'آج مردان میں نماز کے اوقات۔'],
            ['name' => 'Swat', 'slug' => 'swat', 'latitude' => 35.2226, 'longitude' => 72.3528, 'province' => 'KPK', 'population' => 250000, 'meta_title' => 'Swat Namaz Time Today | NoorIslam', 'meta_description' => 'آج سوات میں نماز کے اوقات۔'],
            ['name' => 'Sahiwal', 'slug' => 'sahiwal', 'latitude' => 30.6682, 'longitude' => 73.1114, 'province' => 'Punjab', 'population' => 400000, 'meta_title' => 'Sahiwal Namaz Time Today | NoorIslam', 'meta_description' => 'آج ساہیوال میں نماز کے اوقات۔'],
            ['name' => 'Jhang', 'slug' => 'jhang', 'latitude' => 31.2781, 'longitude' => 72.3169, 'province' => 'Punjab', 'population' => 414000, 'meta_title' => 'Jhang Namaz Time Today | NoorIslam', 'meta_description' => 'آج جھنگ میں نماز کے اوقات۔'],
            ['name' => 'Rahim Yar Khan', 'slug' => 'rahim-yar-khan', 'latitude' => 28.4212, 'longitude' => 70.2977, 'province' => 'Punjab', 'population' => 420000, 'meta_title' => 'Rahim Yar Khan Namaz Time | NoorIslam', 'meta_description' => 'آج رحیم یار خان میں نماز کے اوقات۔'],
            ['name' => 'Gujrat', 'slug' => 'gujrat', 'latitude' => 32.5742, 'longitude' => 74.0756, 'province' => 'Punjab', 'population' => 390000, 'meta_title' => 'Gujrat Namaz Time Today | NoorIslam', 'meta_description' => 'آج گجرات میں نماز کے اوقات۔'],
            ['name' => 'Kasur', 'slug' => 'kasur', 'latitude' => 31.1157, 'longitude' => 74.4516, 'province' => 'Punjab', 'population' => 370000, 'meta_title' => 'Kasur Namaz Time Today | NoorIslam', 'meta_description' => 'آج قصور میں نماز کے اوقات۔'],
            ['name' => 'Okara', 'slug' => 'okara', 'latitude' => 30.8081, 'longitude' => 73.4458, 'province' => 'Punjab', 'population' => 310000, 'meta_title' => 'Okara Namaz Time Today | NoorIslam', 'meta_description' => 'آج اوکاڑہ میں نماز کے اوقات۔'],
            ['name' => 'Chiniot', 'slug' => 'chiniot', 'latitude' => 31.7206, 'longitude' => 72.9842, 'province' => 'Punjab', 'population' => 280000, 'meta_title' => 'Chiniot Namaz Time Today | NoorIslam', 'meta_description' => 'آج چنیوٹ میں نماز کے اوقات۔'],
            ['name' => 'Jacobabad', 'slug' => 'jacobabad', 'latitude' => 28.2769, 'longitude' => 68.4360, 'province' => 'Sindh', 'population' => 200000, 'meta_title' => 'Jacobabad Namaz Time Today | NoorIslam', 'meta_description' => 'آج جیکب آباد میں نماز کے اوقات۔'],
            ['name' => 'Nawabshah', 'slug' => 'nawabshah', 'latitude' => 26.2483, 'longitude' => 68.4100, 'province' => 'Sindh', 'population' => 300000, 'meta_title' => 'Nawabshah Namaz Time Today | NoorIslam', 'meta_description' => 'آج نوابشاہ میں نماز کے اوقات۔'],
            ['name' => 'Khairpur', 'slug' => 'khairpur', 'latitude' => 27.5295, 'longitude' => 68.7592, 'province' => 'Sindh', 'population' => 260000, 'meta_title' => 'Khairpur Namaz Time Today | NoorIslam', 'meta_description' => 'آج خیرپور میں نماز کے اوقات۔'],
            ['name' => 'Bannu', 'slug' => 'bannu', 'latitude' => 32.9889, 'longitude' => 70.6026, 'province' => 'KPK', 'population' => 200000, 'meta_title' => 'Bannu Namaz Time Today | NoorIslam', 'meta_description' => 'آج بنوں میں نماز کے اوقات۔'],
            ['name' => 'Kohat', 'slug' => 'kohat', 'latitude' => 33.5869, 'longitude' => 71.4414, 'province' => 'KPK', 'population' => 220000, 'meta_title' => 'Kohat Namaz Time Today | NoorIslam', 'meta_description' => 'آج کوہاٹ میں نماز کے اوقات۔'],
            ['name' => 'Zhob', 'slug' => 'zhob', 'latitude' => 31.3417, 'longitude' => 69.4486, 'province' => 'Balochistan', 'population' => 80000, 'meta_title' => 'Zhob Namaz Time Today | NoorIslam', 'meta_description' => 'آج ژوب میں نماز کے اوقات۔'],
            ['name' => 'Turbat', 'slug' => 'turbat', 'latitude' => 26.0000, 'longitude' => 63.0411, 'province' => 'Balochistan', 'population' => 150000, 'meta_title' => 'Turbat Namaz Time Today | NoorIslam', 'meta_description' => 'آج تربت میں نماز کے اوقات۔'],
            ['name' => 'Gwadar', 'slug' => 'gwadar', 'latitude' => 25.1264, 'longitude' => 62.3225, 'province' => 'Balochistan', 'population' => 120000, 'meta_title' => 'Gwadar Namaz Time Today | NoorIslam', 'meta_description' => 'آج گوادر میں نماز کے اوقات۔'],
            ['name' => 'Skardu', 'slug' => 'skardu', 'latitude' => 35.2971, 'longitude' => 75.6334, 'province' => 'Gilgit-Baltistan', 'population' => 60000, 'meta_title' => 'Skardu Namaz Time Today | NoorIslam', 'meta_description' => 'آج سکردو میں نماز کے اوقات۔'],
            ['name' => 'Mingora', 'slug' => 'mingora', 'latitude' => 34.7717, 'longitude' => 72.3601, 'province' => 'KPK', 'population' => 330000, 'meta_title' => 'Mingora Namaz Time Today | NoorIslam', 'meta_description' => 'آج منگورہ میں نماز کے اوقات۔'],
            ['name' => 'Dera Ghazi Khan', 'slug' => 'dera-ghazi-khan', 'latitude' => 30.0489, 'longitude' => 70.6400, 'province' => 'Punjab', 'population' => 400000, 'meta_title' => 'D.G.Khan Namaz Time Today | NoorIslam', 'meta_description' => 'آج ڈیرہ غازی خان میں نماز کے اوقات۔'],
            ['name' => 'Mianwali', 'slug' => 'mianwali', 'latitude' => 32.5851, 'longitude' => 71.5368, 'province' => 'Punjab', 'population' => 200000, 'meta_title' => 'Mianwali Namaz Time Today | NoorIslam', 'meta_description' => 'آج میانوالی میں نماز کے اوقات۔'],
            ['name' => 'Vehari', 'slug' => 'vehari', 'latitude' => 30.0452, 'longitude' => 72.3489, 'province' => 'Punjab', 'population' => 180000, 'meta_title' => 'Vehari Namaz Time Today | NoorIslam', 'meta_description' => 'آج وہاری میں نماز کے اوقات۔'],
            ['name' => 'Chakwal', 'slug' => 'chakwal', 'latitude' => 32.9328, 'longitude' => 72.8555, 'province' => 'Punjab', 'population' => 150000, 'meta_title' => 'Chakwal Namaz Time Today | NoorIslam', 'meta_description' => 'آج چکوال میں نماز کے اوقات۔'],
            ['name' => 'Jhelum', 'slug' => 'jhelum', 'latitude' => 32.9425, 'longitude' => 73.7257, 'province' => 'Punjab', 'population' => 190000, 'meta_title' => 'Jhelum Namaz Time Today | NoorIslam', 'meta_description' => 'آج جہلم میں نماز کے اوقات۔'],
            ['name' => 'Attock', 'slug' => 'attock', 'latitude' => 33.7667, 'longitude' => 72.3609, 'province' => 'Punjab', 'population' => 100000, 'meta_title' => 'Attock Namaz Time Today | NoorIslam', 'meta_description' => 'آج اٹک میں نماز کے اوقات۔'],
            ['name' => 'Nowshera', 'slug' => 'nowshera', 'latitude' => 34.0153, 'longitude' => 71.9747, 'province' => 'KPK', 'population' => 300000, 'meta_title' => 'Nowshera Namaz Time Today | NoorIslam', 'meta_description' => 'آج نوشہرہ میں نماز کے اوقات۔'],
            ['name' => 'Chaman', 'slug' => 'chaman', 'latitude' => 30.9210, 'longitude' => 66.4597, 'province' => 'Balochistan', 'population' => 120000, 'meta_title' => 'Chaman Namaz Time Today | NoorIslam', 'meta_description' => 'آج چمن میں نماز کے اوقات۔'],
            ['name' => 'Mansehra', 'slug' => 'mansehra', 'latitude' => 34.3334, 'longitude' => 73.2000, 'province' => 'KPK', 'population' => 180000, 'meta_title' => 'Mansehra Namaz Time Today | NoorIslam', 'meta_description' => 'آج مانسہرہ میں نماز کے اوقات۔'],
            ['name' => 'Haripur', 'slug' => 'haripur', 'latitude' => 33.9942, 'longitude' => 72.9333, 'province' => 'KPK', 'population' => 130000, 'meta_title' => 'Haripur Namaz Time Today | NoorIslam', 'meta_description' => 'آج ہری پور میں نماز کے اوقات۔'],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->updateOrInsert(
                ['slug' => $city['slug']],
                array_merge($city, [
                    'country_id' => $countryId,
                    'timezone' => 'Asia/Karachi',
                    'prayer_calc_method' => 'University of Islamic Sciences, Karachi',
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('✅ 50 Pakistan cities seeded successfully.');
    }
}
