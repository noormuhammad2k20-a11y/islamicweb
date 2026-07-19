<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IslamicName;

class IslamicNameController extends Controller
{
    public function index(Request $request)
    {
        $query = IslamicName::where('status', 'active')->where('is_verified', true);

        // Search Keyword
        if ($request->filled('q')) {
            $searchTerm = '%' . $request->q . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('name_english', 'like', $searchTerm)
                  ->orWhere('name_arabic', 'like', $searchTerm)
                  ->orWhere('meaning_english', 'like', $searchTerm)
                  ->orWhere('translation_urdu', 'like', $searchTerm);
            });
        }

        // Filters
        if ($request->filled('gender') && in_array($request->gender, ['male', 'female', 'unisex'])) {
            $query->where('gender', $request->gender);
        }
        
        if ($request->filled('letter')) {
            $query->where('initial_letter', strtoupper($request->letter));
        }

        if ($request->filled('filter')) {
            switch ($request->filter) {
                case 'quranic':
                    $query->where('is_quranic', true);
                    break;
                case 'sahabah':
                    $query->where('is_sahabi', true)->orWhere('is_sahabiyah', true);
                    break;
                case 'prophets':
                    $query->where('is_prophet_name', true);
                    break;
            }
        }

        // Sorting
        $sort = $request->get('sort', 'name_asc');
        if ($sort === 'name_asc') $query->orderBy('name_english', 'asc');
        elseif ($sort === 'name_desc') $query->orderBy('name_english', 'desc');
        elseif ($sort === 'popular') $query->orderBy('favorited_count', 'desc');
        else $query->orderBy('name_english', 'asc');

        $names = $query->paginate(100)->appends($request->all());

        return view('pages.names.hub', compact('names'));
    }

    public function gender(Request $request, $gender)
    {
        $dbGender = ($gender == 'boys') ? 'male' : 'female';
        $request->merge(['gender' => $dbGender]);
        return $this->index($request);
    }

    public function show($slug)
    {
        // First check if name exists at all (including inactive)
        $nameExists = IslamicName::withoutGlobalScope('active')
            ->where('slug', $slug)
            ->first();

        if (!$nameExists) {
            abort(404);
        }

        if ($nameExists->status === 'inactive') {
            abort(410, 'This Islamic name page has been removed.');
        }

        $name = $nameExists;
        
        // Fetch similar names based on gender and initial letter
        $similarNames = IslamicName::where('is_verified', true)
                            ->where('gender', $name->gender)
                            ->where('initial_letter', $name->initial_letter)
                            ->where('id', '!=', $name->id)
                            ->limit(5)
                            ->get();
                            
        // If not enough, fetch just by gender
        if ($similarNames->count() < 5) {
            $moreNames = IslamicName::where('is_verified', true)
                            ->where('gender', $name->gender)
                            ->whereNotIn('id', $similarNames->pluck('id')->push($name->id))
                            ->limit(5 - $similarNames->count())
                            ->get();
            $similarNames = $similarNames->concat($moreNames);
        }

        return view('pages.names.show', compact('name', 'similarNames'));
    }
}
