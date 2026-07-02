<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizScore extends Model
{
    protected $table = 'user_quiz_scores';
    protected $guarded = [];

    protected $casts = [
        'last_attempt_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(QuizCategory::class, 'quiz_category_id');
    }
}
