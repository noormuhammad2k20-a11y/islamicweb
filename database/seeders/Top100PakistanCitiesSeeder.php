<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Top100PakistanCitiesSeeder extends Seeder
{
    public function run()
    {
        $countryId = 1; // Assuming 1 is Pakistan. Adjust if necessary.
        
        $cities = [
            ['name' => 'Karachi', 'lat' => 24.8607, 'lng' => 67.0011],
            ['name' => 'Lahore', 'lat' => 31.5204, 'lng' => 74.3587],
            ['name' => 'Islamabad', 'lat' => 33.6844, 'lng' => 73.0479],
            ['name' => 'Rawalpindi', 'lat' => 33.5973, 'lng' => 73.0479],
            ['name' => 'Faisalabad', 'lat' => 31.4181, 'lng' => 73.0776],
            ['name' => 'Multan', 'lat' => 30.1575, 'lng' => 71.5249],
            ['name' => 'Peshawar', 'lat' => 34.0151, 'lng' => 71.5249],
            ['name' => 'Quetta', 'lat' => 30.1798, 'lng' => 66.9750],
            ['name' => 'Gujranwala', 'lat' => 32.1617, 'lng' => 74.1883],
            ['name' => 'Sialkot', 'lat' => 32.4945, 'lng' => 74.5229],
            ['name' => 'Hyderabad', 'lat' => 25.3960, 'lng' => 68.3578],
            ['name' => 'Abbottabad', 'lat' => 34.1688, 'lng' => 73.2215],
            ['name' => 'Bahawalpur', 'lat' => 29.3956, 'lng' => 71.6833],
            ['name' => 'Sargodha', 'lat' => 32.0740, 'lng' => 72.6861],
            ['name' => 'Sukkur', 'lat' => 27.7052, 'lng' => 68.8574],
            ['name' => 'Larkana', 'lat' => 27.5590, 'lng' => 68.2028],
            ['name' => 'Sheikhupura', 'lat' => 31.7167, 'lng' => 73.9850],
            ['name' => 'Jhang', 'lat' => 31.2781, 'lng' => 72.3317],
            ['name' => 'Rahim Yar Khan', 'lat' => 28.4212, 'lng' => 70.2989],
            ['name' => 'Gujrat', 'lat' => 32.5736, 'lng' => 74.0789],
            ['name' => 'Mardan', 'lat' => 34.1989, 'lng' => 72.0404],
            ['name' => 'Kasur', 'lat' => 31.1157, 'lng' => 74.4465],
            ['name' => 'Dera Ghazi Khan', 'lat' => 30.0489, 'lng' => 70.6317],
            ['name' => 'Sahiwal', 'lat' => 30.6682, 'lng' => 73.1114],
            ['name' => 'Nawabshah', 'lat' => 26.2483, 'lng' => 68.4096],
            ['name' => 'Mingora', 'lat' => 34.7717, 'lng' => 72.3600],
            ['name' => 'Okara', 'lat' => 30.8138, 'lng' => 73.4534],
            ['name' => 'Mirpur Khas', 'lat' => 25.5251, 'lng' => 69.0159],
            ['name' => 'Chiniot', 'lat' => 31.7200, 'lng' => 72.9789],
            ['name' => 'Kamoke', 'lat' => 31.9772, 'lng' => 74.2239],
            ['name' => 'Sadiqabad', 'lat' => 28.3062, 'lng' => 70.1307],
            ['name' => 'Burewala', 'lat' => 30.1667, 'lng' => 72.6500],
            ['name' => 'Jacobabad', 'lat' => 28.2819, 'lng' => 68.4376],
            ['name' => 'Muzaffargarh', 'lat' => 30.0754, 'lng' => 71.1805],
            ['name' => 'Muridke', 'lat' => 31.8020, 'lng' => 74.2550],
            ['name' => 'Jhelum', 'lat' => 32.9333, 'lng' => 73.7269],
            ['name' => 'Shikarpur', 'lat' => 27.9571, 'lng' => 68.6383],
            ['name' => 'Hafizabad', 'lat' => 32.0679, 'lng' => 73.6858],
            ['name' => 'Kohat', 'lat' => 33.5819, 'lng' => 71.4493],
            ['name' => 'Khanewal', 'lat' => 30.3017, 'lng' => 71.9321],
            ['name' => 'Dadu', 'lat' => 26.7329, 'lng' => 67.7788],
            ['name' => 'Gojra', 'lat' => 31.1496, 'lng' => 72.6826],
            ['name' => 'Mandi Bahauddin', 'lat' => 32.5860, 'lng' => 73.4917],
            ['name' => 'Tando Allahyar', 'lat' => 25.4608, 'lng' => 68.7171],
            ['name' => 'Daska', 'lat' => 32.3275, 'lng' => 74.3486],
            ['name' => 'Pakpattan', 'lat' => 30.3410, 'lng' => 73.3866],
            ['name' => 'Bahawalnagar', 'lat' => 29.9983, 'lng' => 73.2536],
            ['name' => 'Tando Adam', 'lat' => 25.7682, 'lng' => 68.6620],
            ['name' => 'Khairpur', 'lat' => 27.5295, 'lng' => 68.7592],
            ['name' => 'Chishtian', 'lat' => 29.7958, 'lng' => 72.8578],
            ['name' => 'Attock', 'lat' => 33.7687, 'lng' => 72.3621],
            ['name' => 'Vehari', 'lat' => 30.0419, 'lng' => 72.3528],
            ['name' => 'Kot Abdul Malik', 'lat' => 31.6346, 'lng' => 74.2541],
            ['name' => 'Ferozewala', 'lat' => 31.6212, 'lng' => 74.2736],
            ['name' => 'Chakwal', 'lat' => 32.9300, 'lng' => 72.8500],
            ['name' => 'Gujranwala Cantonment', 'lat' => 32.1931, 'lng' => 74.1503],
            ['name' => 'Kamalia', 'lat' => 30.7258, 'lng' => 72.6447],
            ['name' => 'Umerkot', 'lat' => 25.3614, 'lng' => 69.7362],
            ['name' => 'Ahmedpur East', 'lat' => 29.1436, 'lng' => 71.2588],
            ['name' => 'Kot Addu', 'lat' => 30.4700, 'lng' => 70.9644],
            ['name' => 'Wazirabad', 'lat' => 32.4432, 'lng' => 74.1222],
            ['name' => 'Mansehra', 'lat' => 34.3302, 'lng' => 73.1968],
            ['name' => 'Layyah', 'lat' => 30.9646, 'lng' => 70.9444],
            ['name' => 'Mirpur', 'lat' => 33.1425, 'lng' => 73.7523],
            ['name' => 'Swabi', 'lat' => 34.1167, 'lng' => 72.4667],
            ['name' => 'Chaman', 'lat' => 30.9236, 'lng' => 66.4512],
            ['name' => 'Taxila', 'lat' => 33.7458, 'lng' => 72.8397],
            ['name' => 'Nowshera', 'lat' => 34.0153, 'lng' => 71.9747],
            ['name' => 'Khushab', 'lat' => 32.2917, 'lng' => 72.3500],
            ['name' => 'Shahdadkot', 'lat' => 27.8473, 'lng' => 67.9068],
            ['name' => 'Mianwali', 'lat' => 32.5853, 'lng' => 71.5436],
            ['name' => 'Kabal', 'lat' => 34.7936, 'lng' => 72.2825],
            ['name' => 'Lodhran', 'lat' => 29.5405, 'lng' => 71.6336],
            ['name' => 'Hasilpur', 'lat' => 29.6967, 'lng' => 72.5542],
            ['name' => 'Charsadda', 'lat' => 34.1453, 'lng' => 71.7308],
            ['name' => 'Bhakkar', 'lat' => 31.6333, 'lng' => 71.0667],
            ['name' => 'Badin', 'lat' => 24.6558, 'lng' => 68.8383],
            ['name' => 'Arif Wala', 'lat' => 30.2906, 'lng' => 73.0653],
            ['name' => 'Ghotki', 'lat' => 28.0064, 'lng' => 69.3150],
            ['name' => 'Sambrial', 'lat' => 32.4750, 'lng' => 74.3522],
            ['name' => 'Jatoi', 'lat' => 29.5175, 'lng' => 70.8447],
            ['name' => 'Haroonabad', 'lat' => 29.6100, 'lng' => 73.1361],
            ['name' => 'Daharki', 'lat' => 28.0606, 'lng' => 69.6481],
            ['name' => 'Narowal', 'lat' => 32.1020, 'lng' => 74.8730],
            ['name' => 'Tando Muhammad Khan', 'lat' => 25.1239, 'lng' => 68.5389],
            ['name' => 'Kamber Ali Khan', 'lat' => 27.5872, 'lng' => 68.0053],
            ['name' => 'Mirpur Mathelo', 'lat' => 28.0225, 'lng' => 69.5489],
            ['name' => 'Kandhkot', 'lat' => 28.2436, 'lng' => 69.1831],
            ['name' => 'Bhalwal', 'lat' => 32.2653, 'lng' => 72.8981],
            ['name' => 'Gwadar', 'lat' => 25.1264, 'lng' => 62.3225],
        ];

        foreach ($cities as $city) {
            $slug = Str::slug($city['name']);
            
            DB::table('cities')->updateOrInsert(
                ['slug' => $slug, 'country_id' => $countryId],
                [
                    'name' => $city['name'],
                    'latitude' => $city['lat'],
                    'longitude' => $city['lng'],
                    'timezone' => 'Asia/Karachi',
                    'prayer_calc_method' => '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
