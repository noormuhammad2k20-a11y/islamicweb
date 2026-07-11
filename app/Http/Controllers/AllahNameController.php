<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllahName;

class AllahNameController extends Controller
{
    public function index()
    {
        $names = AllahName::orderBy('number')->get();
        return view('pages.allah_names.index', compact('names'));
    }

    public function show($slug)
    {
        $name        = AllahName::where('slug', $slug)->firstOrFail();
        $previousName = AllahName::where('number', $name->number - 1)->first();
        $nextName     = AllahName::where('number', $name->number + 1)->first();
        $allNames     = AllahName::orderBy('number')->get();
        return view('allah-names.show', compact('name', 'previousName', 'nextName', 'allNames'));
    }
}
