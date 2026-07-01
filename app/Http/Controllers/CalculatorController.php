<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index() { return view('pages.calculators.index'); }
    public function zakat() { return view('pages.calculators.zakat'); }
    public function zakatGold() { return view('pages.calculators.zakat_gold'); }
    public function zakatSilver() { return view('pages.calculators.zakat_silver'); }
    public function fidya() { return view('pages.calculators.fidya'); }
    public function kaffarah() { return view('pages.calculators.kaffarah'); }
    public function inheritance() { return view('pages.calculators.inheritance'); }
}
