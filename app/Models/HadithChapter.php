<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadithChapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'hadith_book_id', 'name_en', 'name_ar', 'chapter_number', 'slug'
    ];

    public function book()
    {
        return $this->belongsTo(HadithBook::class, 'hadith_book_id');
    }

    public function hadiths()
    {
        return $this->belongsToMany(Hadith::class, 'hadith_hadith_chapter');
    }
}
