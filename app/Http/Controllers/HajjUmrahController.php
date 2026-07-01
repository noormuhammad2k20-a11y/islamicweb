<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HajjGuide;

class HajjUmrahController extends Controller
{
    public function index()
    {
        return view('pages.hajj_umrah.hub');
    }

    public function hajjGuide()
    {
        $guides = HajjGuide::where('type', 'hajj')->get();
        $steps = \App\Models\HajjStep::whereIn('hajj_guide_id', $guides->pluck('id'))->get();
        return view('pages.hajj_umrah.hajj_guide', compact('guides', 'steps'));
    }

    public function umrahGuide()
    {
        $guides = HajjGuide::where('type', 'umrah')->get();
        $steps = \App\Models\HajjStep::whereIn('hajj_guide_id', $guides->pluck('id'))->get();
        return view('pages.hajj_umrah.umrah_guide', compact('guides', 'steps'));
    }

    public function hajjDuas() { return view('pages.hajj_umrah.hajj_duas'); }
    public function umrahDuas() { return view('pages.hajj_umrah.umrah_duas'); }
    public function hajjChecklist() { return view('pages.hajj_umrah.hajj_checklist'); }
    public function umrahChecklist() { return view('pages.hajj_umrah.umrah_checklist'); }
    public function hajjFaqs() { return view('pages.hajj_umrah.hajj_faqs'); }
}