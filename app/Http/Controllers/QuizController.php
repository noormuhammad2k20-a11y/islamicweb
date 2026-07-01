<?php

namespace App\Http\Controllers;

use App\Models\IslamicQuiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $difficulty = $request->get('difficulty', 'easy');

        $query = IslamicQuiz::query();

        if ($category) {
            $query->byCategory($category);
        }

        if ($difficulty) {
            $query->byDifficulty($difficulty);
        }

        // Get 10 random questions for a quiz session
        $questions = $query->inRandomOrder()->take(10)->get();

        $categories = IslamicQuiz::select('category')
            ->distinct()
            ->pluck('category');

        $seoMeta = (object) [
            'title' => 'اسلامی کوئز – اپنا اسلامی علم جانچیں | NoorIslam',
            'meta_description' => 'اسلامی کوئز — قرآن، حدیث، فقہ اور اسلامی تاریخ کے سوالات۔ اپنا علم جانچیں اور نئی معلومات حاصل کریں۔',
            'canonical_url' => url('/islamic-quiz'),
            'schema_override_json' => json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Quiz',
                'name' => 'Islamic Knowledge Quiz',
                'about' => 'Test your Islamic knowledge with questions from Quran, Hadith, Fiqh and History',
                'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            ]),
        ];

        return view('pages.quiz.index', compact('questions', 'categories', 'seoMeta'));
    }
}
