<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationUrdu extends Model
{
    protected $table = 'translations_urdu';
    protected $guarded = [];

    public function ayah()
    {
        return $this->belongsTo(Ayah::class);
    }
}
