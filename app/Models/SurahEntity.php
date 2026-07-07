<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurahEntity extends Model
{
    protected $guarded = [];

    public function surahs()
    {
        return $this->belongsToMany(Surah::class, 'surah_entity_map', 'entity_id', 'surah_id');
    }
}
