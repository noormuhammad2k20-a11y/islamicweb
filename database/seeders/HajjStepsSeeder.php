<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HajjGuide;
use App\Models\HajjStep;

class HajjStepsSeeder extends Seeder
{
    public function run(): void
    {
        $hajj = HajjGuide::where('type', 'hajj')->first();
        if ($hajj) {
            // Day 1: 8th Dhul Hijjah (Tarwiyah)
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 1, 'step_number' => 1], [
                'title' => 'Enter Ihram & Go to Mina',
                'content' => 'Enter into the state of Ihram from your hotel or Miqat. Proceed to the tent city of Mina. Spend the day and night in Mina, performing Dhuhr, Asr, Maghrib, Isha, and Fajr prayers.',
                'location' => 'Mina'
            ]);

            // Day 2: 9th Dhul Hijjah (Arafah)
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 2, 'step_number' => 2], [
                'title' => 'Stand at Arafah',
                'content' => 'After sunrise, leave Mina for Arafah. This is the most critical day of Hajj. Spend the afternoon in earnest supplication and prayer until sunset.',
                'location' => 'Mount Arafah'
            ]);
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 2, 'step_number' => 3], [
                'title' => 'Stay in Muzdalifah',
                'content' => 'After sunset, leave Arafah for Muzdalifah without praying Maghrib. Upon arrival, pray Maghrib and Isha together. Collect pebbles here for the Jamarat.',
                'location' => 'Muzdalifah'
            ]);

            // Day 3: 10th Dhul Hijjah (Eid al-Adha)
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 3, 'step_number' => 4], [
                'title' => 'Stoning of Jamarat al-Aqabah',
                'content' => 'Return to Mina and throw seven pebbles at the largest pillar (Jamarat al-Aqabah).',
                'location' => 'Mina'
            ]);
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 3, 'step_number' => 5], [
                'title' => 'Qurbani (Sacrifice) & Haircut',
                'content' => 'Perform the animal sacrifice. Afterward, men must shave or trim their hair, and women trim a fingertip\'s length. You may now leave the state of Ihram.',
                'location' => 'Mina / Makkah'
            ]);
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 3, 'step_number' => 6], [
                'title' => 'Tawaf al-Ifadah',
                'content' => 'Proceed to Masjid al-Haram in Makkah to perform Tawaf and Sa\'i. Afterward, return to Mina.',
                'location' => 'Makkah'
            ]);

            // Day 4 & 5: 11th - 12th Dhul Hijjah (Days of Tashreeq)
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 4, 'step_number' => 7], [
                'title' => 'Stoning all Three Jamarat',
                'content' => 'Stay in Mina. Each afternoon, stone all three pillars (Small, Medium, Large) with seven pebbles each.',
                'location' => 'Mina'
            ]);

            // Day 6: Departure
            HajjStep::updateOrCreate(['hajj_guide_id' => $hajj->id, 'day_number' => 6, 'step_number' => 8], [
                'title' => 'Tawaf al-Wida (Farewell Tawaf)',
                'content' => 'Before leaving Makkah to return home, perform the farewell Tawaf around the Kaaba.',
                'location' => 'Makkah'
            ]);
        }

        $umrah = HajjGuide::where('type', 'umrah')->first();
        if ($umrah) {
            HajjStep::updateOrCreate(['hajj_guide_id' => $umrah->id, 'day_number' => 1, 'step_number' => 1], [
                'title' => 'Ihram and Niyyah',
                'content' => 'Cleanse yourself, wear the Ihram garments before crossing the Miqat, and make the intention (Niyyah) for Umrah. Recite the Talbiyah.',
                'location' => 'Miqat'
            ]);
            HajjStep::updateOrCreate(['hajj_guide_id' => $umrah->id, 'day_number' => 1, 'step_number' => 2], [
                'title' => 'Tawaf around the Kaaba',
                'content' => 'Enter Masjid al-Haram, stop reciting Talbiyah, and circumambulate the Kaaba seven times counterclockwise starting from the Black Stone.',
                'location' => 'Masjid al-Haram'
            ]);
            HajjStep::updateOrCreate(['hajj_guide_id' => $umrah->id, 'day_number' => 1, 'step_number' => 3], [
                'title' => 'Sa\'i between Safa and Marwah',
                'content' => 'Walk back and forth between the hills of Safa and Marwah seven times, beginning at Safa and ending at Marwah.',
                'location' => 'Safa and Marwah'
            ]);
            HajjStep::updateOrCreate(['hajj_guide_id' => $umrah->id, 'day_number' => 1, 'step_number' => 4], [
                'title' => 'Halq or Taqsir (Haircut)',
                'content' => 'Men should shave their heads completely (Halq) or trim their hair evenly (Taqsir). Women trim a small portion of their hair. This completes the Umrah.',
                'location' => 'Makkah'
            ]);
        }
    }
}
