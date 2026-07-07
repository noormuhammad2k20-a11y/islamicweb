<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurahCollection extends Model
{
    protected $guarded = [];

    public function surahs()
    {
        return $this->belongsToMany(Surah::class, 'surah_collection_items', 'collection_id', 'surah_id');
    }
}
