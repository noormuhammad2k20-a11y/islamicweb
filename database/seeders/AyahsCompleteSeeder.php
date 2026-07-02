<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AyahsCompleteSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ayahs')->truncate();
        DB::table('translations_english')->truncate();
        DB::table('translations_urdu')->truncate();

        // Basic seed for Surah Al-Fatiha (Surah 1)
        $fatihaAyahs = [
            [1, 1, 1, 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ', 'In the name of Allah, the Entirely Merciful, the Especially Merciful.', 'شروع اللہ کے نام سے جو بڑا مہربان نہایت رحم والا ہے'],
            [1, 2, 2, 'الْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ', '[All] praise is [due] to Allah, Lord of the worlds -', 'سب تعریفیں اللہ ہی کے لیے ہیں جو تمام جہانوں کا پالنے والا ہے'],
            [1, 3, 3, 'الرَّحْمَٰنِ الرَّحِيمِ', 'The Entirely Merciful, the Especially Merciful,', 'بڑا مہربان نہایت رحم والا'],
            [1, 4, 4, 'مَالِكِ يَوْمِ الدِّينِ', 'Sovereign of the Day of Recompense.', 'جزا کے دن کا مالک'],
            [1, 5, 5, 'إِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ', 'It is You we worship and You we ask for help.', 'ہم تیری ہی عبادت کرتے ہیں اور تجھ ہی سے مدد مانگتے ہیں'],
            [1, 6, 6, 'اهْدِنَا الصِّرَاطَ الْمُسْتَقِيمَ', 'Guide us to the straight path -', 'ہمیں سیدھے راستے پر چلا'],
            [1, 7, 7, 'صِرَاطَ الَّذِينَ أَنْعَمْتَ عَلَيْهِمْ غَيْرِ الْمَغْضُوبِ عَلَيْهِمْ وَلَا الضَّالِّينَ', 'The path of those upon whom You have bestowed favor, not of those who have evoked [Your] anger or of those who are astray.', 'ان لوگوں کے راستے پر جن پر تو نے انعام کیا نہ کہ ان کے جن پر غضب کیا گیا اور نہ گمراہوں کے']
        ];

        foreach ($fatihaAyahs as $a) {
            $ayahId = DB::table('ayahs')->insertGetId([
                'surah_id' => $a[0],
                'ayah_number' => $a[1],
                'arabic_text' => $a[3],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('translations_english')->insert([
                'ayah_id' => $ayahId,
                'text' => $a[4],
                'translator_name' => 'Sahih International',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('translations_urdu')->insert([
                'ayah_id' => $ayahId,
                'text' => $a[5],
                'translator_name' => 'Fateh Muhammad Jalandhari',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
