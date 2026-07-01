<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Scholar;
use App\Models\Surah;
use App\Models\ContentReview;

class EEATSeeder extends Seeder
{
    public function run()
    {
        $author = Author::firstOrCreate(['name' => 'Imam Noor'], [
            'credential' => 'Senior Editor',
            'bio' => 'Senior Islamic Content Editor at Noor-e-Islam',
            'photo_path' => '/assets/authors/imam-noor.jpg',
        ]);

        $scholar = Scholar::firstOrCreate(['name' => 'Mufti Abdullah'], [
            'institution' => 'Al-Azhar University',
            'credential' => 'Ph.D in Islamic Studies',
        ]);

        $surah = Surah::first();
        if ($surah) {
            ContentReview::firstOrCreate([
                'reviewable_type' => Surah::class,
                'reviewable_id' => $surah->id,
                'scholar_id' => $scholar->id,
            ], [
                'reviewed_at' => now(),
                'status' => 'verified',
                'notes' => 'Translation and Fazilat content verified against authentic sources.',
            ]);
        }
    }
}
