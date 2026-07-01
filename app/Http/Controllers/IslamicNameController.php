<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IslamicName;

class IslamicNameController extends Controller
{
    public function index()
    {
        $popularNames = IslamicName::where('is_verified', true)
                                   ->orderBy('favorited_count', 'desc')
                                   ->take(12)
                                   ->get();
        return view('pages.names.hub', compact('popularNames'));
    }

    public function gender($gender)
    {
        $names = IslamicName::where('gender', $gender)
                            ->where('is_verified', true)
                            ->paginate(50);
        return view('pages.names.hub', compact('names', 'gender'));
    }

    public function show($slug)
    {
        $name = IslamicName::where('slug', $slug)->firstOrFail();
        return view('pages.names.show', compact('name'));
    }
}
