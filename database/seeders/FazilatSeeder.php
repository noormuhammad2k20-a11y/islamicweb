<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FazilatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surahKahf = \App\Models\Surah::where('slug', 'al-kahf')->first();

        if ($surahKahf) {
            \App\Models\FazilatEntry::create([
                'surah_id' => $surahKahf->id,
                'question' => 'What is the virtue of reciting Surah Al-Kahf on Friday?',
                'answer' => 'Whoever reads Surah Al-Kahf on the day of Jumu’ah (Friday), will have a light that will shine from him from one Friday to the next.',
                'hadith_reference' => 'Sunan al-Kubra 5856',
                'verification_status' => 'verified',
            ]);

            \App\Models\FazilatEntry::create([
                'surah_id' => $surahKahf->id,
                'question' => 'How does Surah Al-Kahf protect from the Dajjal?',
                'answer' => 'Whoever memorizes the first ten verses of Surah Al-Kahf will be protected from the Dajjal (Anti-Christ).',
                'hadith_reference' => 'Sahih Muslim 809',
                'verification_status' => 'verified',
            ]);
            
            \App\Models\FazilatEntry::create([
                'surah_id' => $surahKahf->id,
                'question' => 'Can we read Surah Al-Kahf on Thursday night?',
                'answer' => 'Yes, the day of Friday begins at sunset on Thursday. Therefore, reciting it on Thursday night or any time on Friday before sunset fulfills the Sunnah.',
                'hadith_reference' => 'Al-Darimi 3407',
                'verification_status' => 'commonly_cited',
            ]);
        }
    }
}
