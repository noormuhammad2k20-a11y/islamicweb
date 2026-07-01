<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HadithTopic extends Model
{
    protected $guarded = [];

    public function hadiths(): HasMany
    {
        return $this->hasMany(Hadith::class, 'topic_id');
    }
}

