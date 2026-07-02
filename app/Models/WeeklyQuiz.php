<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyQuiz extends Model
{
    protected $table = 'weekly_quizzes';
    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function quiz()
    {
        return $this->belongsTo(IslamicQuiz::class, 'quiz_id');
    }
}
