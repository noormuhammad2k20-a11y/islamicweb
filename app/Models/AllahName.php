<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllahName extends Model
{
    protected $fillable = [
        'number',
        'arabic',
        'transliteration',
        'meaning_english',
        'meaning_urdu',
        'benefits',
        'slug',
    ];
}
