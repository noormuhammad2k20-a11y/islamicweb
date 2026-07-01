<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicQuiz extends Model
{
    protected $table = 'islamic_quizzes';
    protected $guarded = [];

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByDifficulty($query, $difficulty)
    {
        return $query->where('difficulty', $difficulty);
    }
}
