<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurahImportantAyah extends Model
{
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }

    public function ayah()
    {
        return $this->belongsTo(Ayah::class);
    }
}
