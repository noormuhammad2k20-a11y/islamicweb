<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Hadith;
use App\Models\HadithTopic;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class HadithSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        $topics = [];
        for ($i = 0; $i < 10; $i++) {
            $name = $faker->unique()->word;
            $topics[] = HadithTopic::create([
                'topic_name' => ucfirst($name),
                'slug' => Str::slug($name . '-' . rand(1, 1000)),
                'content' => $faker->sentence,
            ])->id;
        }

        for ($i = 0; $i < 500; $i++) {
            Hadith::create([
                'topic_id' => $faker->randomElement($topics),
                'arabic_text' => 'حديث شريف', // Dummy arabic
                'english_translation' => $faker->paragraph,
                'urdu_translation' => 'اردو ترجمہ', // Dummy urdu
                'reference' => 'Sahih Bukhari ' . $faker->numberBetween(1, 7000),
                'grade' => $faker->randomElement(['Sahih', 'Hasan', 'Daif']),
                'slug' => Str::slug($faker->unique()->sentence(4)),
                'book_name' => 'Sahih Bukhari',
                'chapter' => 'Chapter ' . $faker->numberBetween(1, 100),
            ]);
        }
    }
}
