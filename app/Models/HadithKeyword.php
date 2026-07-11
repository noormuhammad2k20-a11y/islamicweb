<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadithKeyword extends Model
{
    use HasFactory;

    protected $fillable = [
        'keyword', 'slug'
    ];

    public function hadiths()
    {
        return $this->belongsToMany(Hadith::class, 'hadith_hadith_keyword');
    }
}
