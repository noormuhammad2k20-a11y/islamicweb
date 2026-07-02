<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('site_settings')->truncate();

        $settings = [
            ['key' => 'site_name', 'value' => 'Noor-e-Islam'],
            ['key' => 'site_tagline', 'value' => 'آپ کی اسلامی رہنمائی — Your Islamic Guide'],
            ['key' => 'contact_email', 'value' => 'info@noorislam.com'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/noorislam'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/noorislam'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/@noorislam'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/noorislam'],
            ['key' => 'default_city', 'value' => 'karachi'],
            ['key' => 'default_country', 'value' => 'pakistan'],
            ['key' => 'og_image', 'value' => '/images/og-default.jpg'],
            ['key' => 'prayer_calc_method', 'value' => '1'],
            ['key' => 'zakat_gold_nisab_grams', 'value' => '87.48'],
            ['key' => 'zakat_silver_nisab_grams', 'value' => '612.36'],
        ];

        $now = Carbon::now();
        foreach ($settings as &$setting) {
            $setting['created_at'] = $now;
            $setting['updated_at'] = $now;
        }

        DB::table('site_settings')->insert($settings);
    }
}
