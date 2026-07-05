<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorldCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // UAE
            ['name'=>'Dubai','slug'=>'dubai','country'=>'UAE','country_code'=>'AE','latitude'=>25.2048,'longitude'=>55.2708,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Abu Dhabi','slug'=>'abu-dhabi','country'=>'UAE','country_code'=>'AE','latitude'=>24.4539,'longitude'=>54.3773,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Sharjah','slug'=>'sharjah','country'=>'UAE','country_code'=>'AE','latitude'=>25.3463,'longitude'=>55.4209,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Ajman','slug'=>'ajman','country'=>'UAE','country_code'=>'AE','latitude'=>25.4052,'longitude'=>55.5136,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Al Ain','slug'=>'al-ain','country'=>'UAE','country_code'=>'AE','latitude'=>24.2075,'longitude'=>55.7447,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Ras Al Khaimah','slug'=>'ras-al-khaimah','country'=>'UAE','country_code'=>'AE','latitude'=>25.7895,'longitude'=>55.9432,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Fujairah','slug'=>'fujairah','country'=>'UAE','country_code'=>'AE','latitude'=>25.1288,'longitude'=>56.3265,'timezone'=>'Asia/Dubai','is_featured'=>1],
            ['name'=>'Umm Al Quwain','slug'=>'umm-al-quwain','country'=>'UAE','country_code'=>'AE','latitude'=>25.5647,'longitude'=>55.5553,'timezone'=>'Asia/Dubai','is_featured'=>0],
            ['name'=>'Mussafah','slug'=>'mussafah','country'=>'UAE','country_code'=>'AE','latitude'=>24.3611,'longitude'=>54.5050,'timezone'=>'Asia/Dubai','is_featured'=>0],
            ['name'=>'Jebel Ali','slug'=>'jebel-ali','country'=>'UAE','country_code'=>'AE','latitude'=>24.9966,'longitude'=>55.0603,'timezone'=>'Asia/Dubai','is_featured'=>0],

            // Saudi Arabia
            ['name'=>'Makkah','slug'=>'makkah','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>21.3891,'longitude'=>39.8579,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Madinah','slug'=>'madinah','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>24.5247,'longitude'=>39.5692,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Riyadh','slug'=>'riyadh','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>24.7136,'longitude'=>46.6753,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Jeddah','slug'=>'jeddah','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>21.5433,'longitude'=>39.1728,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Dammam','slug'=>'dammam','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>26.3927,'longitude'=>49.9777,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Khobar','slug'=>'khobar','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>26.2172,'longitude'=>50.1971,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Jubail','slug'=>'jubail','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>27.0046,'longitude'=>49.6584,'timezone'=>'Asia/Riyadh','is_featured'=>0],
            ['name'=>'Taif','slug'=>'taif','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>21.2854,'longitude'=>40.4148,'timezone'=>'Asia/Riyadh','is_featured'=>1],
            ['name'=>'Hail','slug'=>'hail','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>27.5114,'longitude'=>41.7208,'timezone'=>'Asia/Riyadh','is_featured'=>0],
            ['name'=>'Buraidah','slug'=>'buraidah','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>26.3260,'longitude'=>43.9750,'timezone'=>'Asia/Riyadh','is_featured'=>0],
            ['name'=>'Tabuk','slug'=>'tabuk','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>28.3998,'longitude'=>36.5715,'timezone'=>'Asia/Riyadh','is_featured'=>0],
            ['name'=>'Najran','slug'=>'najran','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>17.4920,'longitude'=>44.1277,'timezone'=>'Asia/Riyadh','is_featured'=>0],
            ['name'=>'Abha','slug'=>'abha','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>18.2164,'longitude'=>42.5053,'timezone'=>'Asia/Riyadh','is_featured'=>0],
            ['name'=>'Yanbu','slug'=>'yanbu','country'=>'Saudi Arabia','country_code'=>'SA','latitude'=>24.0895,'longitude'=>38.0618,'timezone'=>'Asia/Riyadh','is_featured'=>0],

            // India
            ['name'=>'Bangalore','slug'=>'bangalore','country'=>'India','country_code'=>'IN','latitude'=>12.9716,'longitude'=>77.5946,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Mumbai','slug'=>'mumbai','country'=>'India','country_code'=>'IN','latitude'=>19.0760,'longitude'=>72.8777,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Chennai','slug'=>'chennai','country'=>'India','country_code'=>'IN','latitude'=>13.0827,'longitude'=>80.2707,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Kochi','slug'=>'kochi','country'=>'India','country_code'=>'IN','latitude'=>9.9312,'longitude'=>76.2673,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Calicut','slug'=>'calicut','country'=>'India','country_code'=>'IN','latitude'=>11.2588,'longitude'=>75.7804,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Kozhikode','slug'=>'kozhikode','country'=>'India','country_code'=>'IN','latitude'=>11.2588,'longitude'=>75.7804,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Kannur','slug'=>'kannur','country'=>'India','country_code'=>'IN','latitude'=>11.8745,'longitude'=>75.3704,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Malappuram','slug'=>'malappuram','country'=>'India','country_code'=>'IN','latitude'=>11.0510,'longitude'=>76.0711,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Thrissur','slug'=>'thrissur','country'=>'India','country_code'=>'IN','latitude'=>10.5276,'longitude'=>76.2144,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Delhi','slug'=>'delhi','country'=>'India','country_code'=>'IN','latitude'=>28.7041,'longitude'=>77.1025,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Lucknow','slug'=>'lucknow','country'=>'India','country_code'=>'IN','latitude'=>26.8467,'longitude'=>80.9462,'timezone'=>'Asia/Kolkata','is_featured'=>1],
            ['name'=>'Hyderabad','slug'=>'hyderabad-india','country'=>'India','country_code'=>'IN','latitude'=>17.3850,'longitude'=>78.4867,'timezone'=>'Asia/Kolkata','is_featured'=>1],

            // USA
            ['name'=>'New York','slug'=>'new-york','country'=>'USA','country_code'=>'US','latitude'=>40.7128,'longitude'=>-74.0060,'timezone'=>'America/New_York','is_featured'=>1],
            ['name'=>'Chicago','slug'=>'chicago','country'=>'USA','country_code'=>'US','latitude'=>41.8781,'longitude'=>-87.6298,'timezone'=>'America/Chicago','is_featured'=>1],
            ['name'=>'Houston','slug'=>'houston','country'=>'USA','country_code'=>'US','latitude'=>29.7604,'longitude'=>-95.3698,'timezone'=>'America/Chicago','is_featured'=>1],
            ['name'=>'Los Angeles','slug'=>'los-angeles','country'=>'USA','country_code'=>'US','latitude'=>34.0522,'longitude'=>-118.2437,'timezone'=>'America/Los_Angeles','is_featured'=>1],
            ['name'=>'Boston','slug'=>'boston','country'=>'USA','country_code'=>'US','latitude'=>42.3601,'longitude'=>-71.0589,'timezone'=>'America/New_York','is_featured'=>1],
            ['name'=>'Dallas','slug'=>'dallas','country'=>'USA','country_code'=>'US','latitude'=>32.7767,'longitude'=>-96.7970,'timezone'=>'America/Chicago','is_featured'=>1],
            ['name'=>'Philadelphia','slug'=>'philadelphia','country'=>'USA','country_code'=>'US','latitude'=>39.9526,'longitude'=>-75.1652,'timezone'=>'America/New_York','is_featured'=>1],
            ['name'=>'Detroit','slug'=>'detroit','country'=>'USA','country_code'=>'US','latitude'=>42.3314,'longitude'=>-83.0458,'timezone'=>'America/Detroit','is_featured'=>1],
            ['name'=>'Minneapolis','slug'=>'minneapolis','country'=>'USA','country_code'=>'US','latitude'=>44.9778,'longitude'=>-93.2650,'timezone'=>'America/Chicago','is_featured'=>1],
            ['name'=>'San Diego','slug'=>'san-diego','country'=>'USA','country_code'=>'US','latitude'=>32.7157,'longitude'=>-117.1611,'timezone'=>'America/Los_Angeles','is_featured'=>1],
            ['name'=>'Dearborn Michigan','slug'=>'dearborn-michigan','country'=>'USA','country_code'=>'US','latitude'=>42.3223,'longitude'=>-83.1763,'timezone'=>'America/Detroit','is_featured'=>1],
            ['name'=>'Buffalo NY','slug'=>'buffalo-ny','country'=>'USA','country_code'=>'US','latitude'=>42.8864,'longitude'=>-78.8784,'timezone'=>'America/New_York','is_featured'=>1],
        ];

        DB::table('world_cities')->insertOrIgnore($cities);
    }
}
