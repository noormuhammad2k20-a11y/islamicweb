<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function show()
    {
        return view('pages.converter.show');
    }
}
