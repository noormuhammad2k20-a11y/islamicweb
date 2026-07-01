<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }

    public function englishTranslation()
    {
        return $this->hasOne(TranslationEnglish::class);
    }

    public function urduTranslation()
    {
        return $this->hasOne(TranslationUrdu::class);
    }

    public function tafsirs()
    {
        return $this->hasMany(Tafsir::class);
    }
}
