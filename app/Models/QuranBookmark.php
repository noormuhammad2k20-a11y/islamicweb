<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuranBookmark extends Model
{
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }
}
