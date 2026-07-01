<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasbeehController extends Controller
{
    public function index()
    {
        return view('pages.tasbeeh.tracker');
    }
}
