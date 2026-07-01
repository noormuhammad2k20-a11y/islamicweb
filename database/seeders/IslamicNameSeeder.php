<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\IslamicName;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class IslamicNameSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 500; $i++) {
            $name = $faker->unique()->firstName;
            IslamicName::create([
                'name_english' => $name,
                'name_arabic' => 'عربي', // Dummy arabic
                'translation_urdu' => 'اردو', // Dummy urdu
                'origin' => 'Arabic',
                'gender' => $faker->randomElement(['male', 'female', 'unisex']),
                'slug' => Str::slug($name . '-' . rand(1, 10000)),
            ]);
        }
    }
}
