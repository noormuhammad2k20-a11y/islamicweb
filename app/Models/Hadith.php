<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hadith extends Model
{
    protected $fillable = [
        'topic_id',
        'arabic_text',
        'english_translation',
        'urdu_translation',
        'reference',
        'grade',
        'slug',
        'book_name',
        'chapter',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(HadithTopic::class, 'topic_id');
    }
}
