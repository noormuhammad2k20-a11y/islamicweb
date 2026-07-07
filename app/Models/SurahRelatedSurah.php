<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurahRelatedSurah extends Model
{
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }

    public function relatedSurah()
    {
        return $this->belongsTo(Surah::class, 'related_surah_id');
    }
}
