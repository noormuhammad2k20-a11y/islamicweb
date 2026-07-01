<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuaCategory;
use App\Models\Dua;

class DuaController extends Controller
{
    public function index(Request $request)
    {
        $categories = DuaCategory::all();
        $activeCategory = DuaCategory::with('duas')->where('slug', 'morning-azkar')->first();
        
        if (!$activeCategory) {
            $activeCategory = DuaCategory::with('duas')->first();
        }

        if ($request->has('search') && !empty($request->search)) {
            $activeCategory->setRelation('duas', $activeCategory->duas()->where(function($q) use ($request) {
                $q->where('title_english', 'like', '%' . $request->search . '%')
                  ->orWhere('translation', 'like', '%' . $request->search . '%')
                  ->orWhere('arabic_text', 'like', '%' . $request->search . '%');
            })->get());
        }

        if ($request->ajax()) {
            return view('pages.duas.partials.dua_list', compact('activeCategory'))->render();
        }

        return view('pages.duas.hub', compact('categories', 'activeCategory'));
    }

    public function category(Request $request, $slug)
    {
        $categories = DuaCategory::all();
        $activeCategory = DuaCategory::with('duas')->where('slug', $slug)->firstOrFail();

        if ($request->has('search') && !empty($request->search)) {
            $activeCategory->setRelation('duas', $activeCategory->duas()->where(function($q) use ($request) {
                $q->where('title_english', 'like', '%' . $request->search . '%')
                  ->orWhere('translation', 'like', '%' . $request->search . '%')
                  ->orWhere('arabic_text', 'like', '%' . $request->search . '%');
            })->get());
        }

        if ($request->ajax()) {
            return view('pages.duas.partials.dua_list', compact('activeCategory'))->render();
        }

        return view('pages.duas.hub', compact('categories', 'activeCategory'));
    }

    public function show($category_slug, $seo_slug)
    {
        $category = DuaCategory::where('slug', $category_slug)->firstOrFail();
        $dua = Dua::where('seo_slug', $seo_slug)->whereHas('categories', function($q) use ($category) {
            $q->where('dua_categories.id', $category->id);
        })->firstOrFail();

        // SEO Strategy: Fetch 4 to 6 related duas from the same category to build an internal linking graph
        $relatedDuas = Dua::whereHas('categories', function($q) use ($category) {
            $q->where('dua_categories.id', $category->id);
        })
        ->where('id', '!=', $dua->id)
        ->inRandomOrder()
        ->limit(6)
        ->get();

        return view('pages.duas.show', compact('category', 'dua', 'relatedDuas'));
    }
}
