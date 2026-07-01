<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.placeholder', ['title' => 'index']);
    }

    public function category($slug)
    {
        return view('pages.placeholder', ['title' => 'category']);
    }

    public function show($slug)
    {
        return view('pages.placeholder', ['title' => 'show']);
    }

}
