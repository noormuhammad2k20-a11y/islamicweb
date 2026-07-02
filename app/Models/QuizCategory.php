<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    protected $table = 'quiz_categories';
    protected $guarded = [];

    public function quizzes()
    {
        return $this->hasMany(IslamicQuiz::class, 'quiz_category_id');
    }

    public function scores()
    {
        return $this->hasMany(UserQuizScore::class, 'quiz_category_id');
    }

    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class, 'quiz_category_id');
    }
}
