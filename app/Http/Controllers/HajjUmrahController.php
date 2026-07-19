<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HajjGuide;

class HajjUmrahController extends Controller
{
    public function index()
    {
        $seoData = [
            'title' => 'Hajj & Umrah Guide 2026 | Complete Information — Noor-e-Islam',
            'description' => 'Complete hub for Hajj and Umrah guides, checklists, and duas for 2026.',
            'canonical' => url('/hajj-and-umrah'),
        ];
        return view('pages.hajj_umrah.hub', compact('seoData'));
    }

    public function hajjGuide()
    {
        $guides = [
            (object)[
                'id' => 1,
                'title' => 'Day 1: 8th Dhul Hijjah (Yawm at-Tarwiyah)',
                'icon' => 'fa-kaaba',
                'description' => 'The journey begins. Pilgrims enter the state of Ihram and move to the valley of Mina.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Enter Ihram', 'location' => 'Makkah/Miqat', 'content' => 'Perform Ghusl, put on the Ihram garments, pray two Rakaats, and make the intention (Niyyah) for Hajj.'],
                    (object)['step_number' => 2, 'title' => 'Travel to Mina', 'location' => 'Mina', 'content' => 'Proceed to Mina after sunrise. Pray Dhuhr, Asr, Maghrib, and Isha there, shortening the 4-rakat prayers to 2 (Qasr) but not combining them.'],
                    (object)['step_number' => 3, 'title' => 'Stay in Mina', 'location' => 'Mina', 'content' => 'Spend the night in Mina. This is a Sunnah and a time for spiritual preparation and reflection.']
                ]
            ],
            (object)[
                'id' => 2,
                'title' => 'Day 2: 9th Dhul Hijjah (Yawm Arafah)',
                'icon' => 'fa-mountain-sun',
                'description' => 'The most important day of Hajj. "Hajj is Arafah." (Tirmidhi)',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Travel to Arafat', 'location' => 'Arafat', 'content' => 'After Fajr in Mina, proceed to Arafat. Spend the day in earnest supplication, seeking forgiveness.'],
                    (object)['step_number' => 2, 'title' => 'Pray Dhuhr and Asr', 'location' => 'Arafat', 'content' => 'Pray Dhuhr and Asr combined and shortened at the time of Dhuhr.'],
                    (object)['step_number' => 3, 'title' => 'Travel to Muzdalifah', 'location' => 'Muzdalifah', 'content' => 'After sunset (without praying Maghrib), leave for Muzdalifah. Upon arrival, pray Maghrib and Isha combined. Collect pebbles for Jamarat.']
                ]
            ],
            (object)[
                'id' => 3,
                'title' => 'Day 3: 10th Dhul Hijjah (Yawm an-Nahr)',
                'icon' => 'fa-scissors',
                'description' => 'The day of sacrifice and Eid al-Adha.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Stone Jamrat al-Aqabah', 'location' => 'Mina', 'content' => 'Return to Mina and throw 7 pebbles at the largest pillar (Jamrat al-Aqabah), saying "Allahu Akbar" with each throw.'],
                    (object)['step_number' => 2, 'title' => 'Animal Sacrifice (Hady)', 'location' => 'Mina', 'content' => 'Offer the animal sacrifice. (Often handled via coupons nowadays).'],
                    (object)['step_number' => 3, 'title' => 'Halq / Taqsir', 'location' => 'Mina', 'content' => 'Men should shave their heads (Halq) or trim their hair evenly (Taqsir). Women trim a fingertip\'s length. You may now exit the state of Ihram.'],
                    (object)['step_number' => 4, 'title' => 'Tawaf al-Ifadah & Sa\'i', 'location' => 'Masjid al-Haram', 'content' => 'Proceed to Makkah to perform Tawaf al-Ifadah around the Kaaba, followed by Sa\'i. Then return to Mina.']
                ]
            ],
            (object)[
                'id' => 4,
                'title' => 'Days 4 & 5: 11th - 12th Dhul Hijjah (Ayyam at-Tashreeq)',
                'icon' => 'fa-sun',
                'description' => 'The days of staying in Mina and stoning all three Jamarat.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Stone all Three Jamarat', 'location' => 'Mina', 'content' => 'After Zawaal (midday), stone the small, medium, and large Jamarat in order, with 7 pebbles each.'],
                    (object)['step_number' => 2, 'title' => 'Leave Mina', 'location' => 'Mina', 'content' => 'You may leave Mina before sunset on the 12th. If you stay after sunset, you must stone the Jamarat again on the 13th.']
                ]
            ]
        ];
        
        $seoData = [
            'title' => 'Complete Hajj Guide 2026 | Step-by-Step Rituals & Rules — Noor-e-Islam',
            'description' => 'Complete step-by-step Hajj guide for 2026. Learn the rituals of Tawaf, Sa\'i, Wuquf at Arafah, Muzdalifah, Rami, and Qurbani. Includes essential duas and tips.',
            'canonical' => url('/hajj-guide'),
        ];
        return view('pages.hajj_umrah.hajj_guide', compact('guides', 'seoData'));
    }

    public function umrahGuide()
    {
        $guides = [
            (object)[
                'id' => 1,
                'title' => 'Ihram and Intention',
                'icon' => 'fa-shirt',
                'description' => 'Entering the sacred state of purity before passing the Miqat.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Preparation', 'location' => 'Miqat', 'content' => 'Clip nails, remove unwanted hair, take a bath (Ghusl), and put on the Ihram garments.'],
                    (object)['step_number' => 2, 'title' => 'Niyyah & Talbiyah', 'location' => 'Miqat', 'content' => 'Make the intention for Umrah: "Labbayk Allahumma Umrah". Begin reciting the Talbiyah continuously until you reach the Kaaba.']
                ]
            ],
            (object)[
                'id' => 2,
                'title' => 'Tawaf (Circumambulation)',
                'icon' => 'fa-kaaba',
                'description' => 'Walking around the Kaaba seven times.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Idtiba & Raml', 'location' => 'Masjid al-Haram', 'content' => 'Men should uncover their right shoulder (Idtiba) and walk briskly during the first 3 rounds (Raml).'],
                    (object)['step_number' => 2, 'title' => 'Perform 7 Rounds', 'location' => 'Mataf', 'content' => 'Start at the Black Stone (Hajar al-Aswad) and complete 7 anti-clockwise circuits.'],
                    (object)['step_number' => 3, 'title' => 'Pray 2 Rakaats', 'location' => 'Maqam Ibrahim', 'content' => 'After Tawaf, pray 2 Rakaats preferably behind Maqam Ibrahim, then drink Zamzam water.']
                ]
            ],
            (object)[
                'id' => 3,
                'title' => 'Sa\'i (Walking between Safa and Marwa)',
                'icon' => 'fa-shoe-prints',
                'description' => 'Honoring the legacy of Hajar (AS) by walking between the two hills.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Start at Mount Safa', 'location' => 'Safa', 'content' => 'Climb Safa, face the Kaaba, praise Allah, and make personal Dua.'],
                    (object)['step_number' => 2, 'title' => 'Walk 7 Laps', 'location' => 'Mas\'aa', 'content' => 'Walk to Marwa (1 lap), then back to Safa (lap 2), ending the 7th lap at Marwa. Men should jog between the green lights.']
                ]
            ],
            (object)[
                'id' => 4,
                'title' => 'Halq or Taqsir (Cutting Hair)',
                'icon' => 'fa-scissors',
                'description' => 'The final ritual to exit the state of Ihram.',
                'steps' => [
                    (object)['step_number' => 1, 'title' => 'Shave or Trim', 'location' => 'Makkah', 'content' => 'Men should shave their entire head (Halq) or trim it equally all around (Taqsir). Women trim a fingertip\'s length of their hair.'],
                    (object)['step_number' => 2, 'title' => 'Exit Ihram', 'location' => 'Makkah', 'content' => 'Umrah is now complete. All restrictions of Ihram are lifted.']
                ]
            ]
        ];
        
        $seoData = [
            'title' => 'Complete Umrah Guide 2026 | Step-by-Step How to Perform Umrah — Noor-e-Islam',
            'description' => 'Perform Umrah correctly with our step-by-step guide. Learn about Ihram, Tawaf around the Kaaba, Sa\'i between Safa and Marwa, and Halq or Taqsir with duas.',
            'canonical' => url('/umrah-guide'),
        ];
        return view('pages.hajj_umrah.umrah_guide', compact('guides', 'seoData'));
    }

    public function hajjDuas() { 
        $seoData = ['title' => 'Hajj Duas in Arabic with Urdu Translation | Supplications — Noor-e-Islam', 'description' => 'Essential Duas for Hajj in Arabic with Urdu translation.', 'canonical' => url('/hajj-duas')];
        return view('pages.hajj_umrah.hajj_duas', compact('seoData')); 
    }
    public function umrahDuas() { 
        $seoData = ['title' => 'Umrah Duas in Arabic & Urdu | Step-by-Step Supplications — Noor-e-Islam', 'description' => 'Essential Duas for Umrah in Arabic with Urdu translation.', 'canonical' => url('/umrah-duas')];
        return view('pages.hajj_umrah.umrah_duas', compact('seoData')); 
    }
    public function hajjChecklist() { 
        $seoData = ['title' => 'Hajj Packing Checklist 2026 | Essential Items for Hajj — Noor-e-Islam', 'description' => 'Complete packing checklist for Hajj 2026. Essential items to bring.', 'canonical' => url('/hajj-checklist')];
        return view('pages.hajj_umrah.hajj_checklist', compact('seoData')); 
    }
    public function umrahChecklist() { 
        $seoData = ['title' => 'Umrah Packing Checklist 2026 | What to Pack for Umrah — Noor-e-Islam', 'description' => 'Complete packing checklist for Umrah 2026. Essential items to bring.', 'canonical' => url('/umrah-checklist')];
        return view('pages.hajj_umrah.umrah_checklist', compact('seoData')); 
    }
    public function hajjFaqs() { 
        $seoData = ['title' => 'Hajj & Umrah Frequently Asked Questions | Answers — Noor-e-Islam', 'description' => 'Frequently asked questions about Hajj and Umrah.', 'canonical' => url('/hajj-faqs')];
        return view('pages.hajj_umrah.hajj_faqs', compact('seoData')); 
    }
}