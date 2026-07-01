<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationEnglish extends Model
{
    protected $table = 'translations_english';
    protected $guarded = [];

    public function ayah()
    {
        return $this->belongsTo(Ayah::class);
    }
}
