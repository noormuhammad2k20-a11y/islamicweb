<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return view('pages.placeholder', ['title' => 'index']);
    }

    public function wallpapers()
    {
        return view('pages.placeholder', ['title' => 'wallpapers']);
    }

    public function images()
    {
        return view('pages.placeholder', ['title' => 'images']);
    }

    public function quotes()
    {
        return view('pages.placeholder', ['title' => 'quotes']);
    }

}
