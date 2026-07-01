<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tafsir extends Model
{
    protected $guarded = [];

    public function ayah()
    {
        return $this->belongsTo(Ayah::class);
    }
}
