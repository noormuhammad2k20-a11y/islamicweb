<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicQuiz extends Model
{
    protected $table = 'islamic_quizzes';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(QuizCategory::class, 'quiz_category_id');
    }

    public function ayahReference()
    {
        return $this->belongsTo(Ayah::class, 'ayah_reference_id');
    }

    public function hadithReference()
    {
        return $this->belongsTo(Hadith::class, 'hadith_reference_id');
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class, 'quiz_id');
    }

    public function scopeByDifficulty($query, $difficulty)
    {
        return $query->where('difficulty', $difficulty);
    }
}
