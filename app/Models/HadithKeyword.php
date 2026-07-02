<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HadithKeyword extends Model
{
    protected $table = 'hadith_keywords';
    protected $guarded = [];

    public function hadiths()
    {
        return $this->belongsToMany(Hadith::class, 'hadith_hadith_keyword');
    }
}
