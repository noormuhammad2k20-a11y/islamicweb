<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function qibla()
    {
        return view('pages.tools.qibla');
    }

    public function age()
    {
        return view('pages.tools.age');
    }

    public function eventFinder()
    {
        return view('pages.tools.events');
    }

    public function ramadanGenerator()
    {
        return view('pages.tools.ramadan_gen');
    }

    public function qiblaOnline()
    {
        return view('pages.placeholder', ['title' => 'qiblaOnline']);
    }

}
