<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurahTheme extends Model
{
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }
}
