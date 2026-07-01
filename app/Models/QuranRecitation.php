<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuranRecitation extends Model
{
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }

    public function scopeByReciter($query, $slug)
    {
        return $query->where('reciter_slug', $slug);
    }
}
