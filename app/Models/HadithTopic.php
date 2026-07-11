<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HadithTopic extends Model
{
    protected $guarded = [];

    public function hadiths(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Hadith::class, 'hadith_hadith_topic', 'hadith_topic_id', 'hadith_id');
    }
}

