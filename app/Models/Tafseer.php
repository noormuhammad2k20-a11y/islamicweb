<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tafseer extends Model
{
    protected $table = 'tafseer';
    protected $guarded = [];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }
}
