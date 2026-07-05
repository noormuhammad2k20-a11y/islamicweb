<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasbeehController extends Controller
{
    public function digitalCounter()
    {
        $seoMeta = (object) [
            'title' => 'Digital Tasbeeh Counter Online | Free Dhikr Tracker | Noor-e-Islam',
            'description' => 'Use our free online digital tasbeeh counter for daily dhikr and azkar. Features include save progress, sound, vibration, dark mode, and preset limits (33, 99).',
        ];

        return view('pages.tasbeeh.tracker', compact('seoMeta'));
    }
}
