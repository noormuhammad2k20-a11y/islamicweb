<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyQuiz extends Model
{
    protected $table = 'daily_quizzes';
    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
    ];

    public function quiz()
    {
        return $this->belongsTo(IslamicQuiz::class, 'quiz_id');
    }
}
