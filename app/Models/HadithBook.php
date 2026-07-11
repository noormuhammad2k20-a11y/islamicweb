<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadithBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id', 'name_en', 'name_ar', 'book_number', 'slug'
    ];

    public function collection()
    {
        return $this->belongsTo(HadithCollection::class);
    }

    public function chapters()
    {
        return $this->hasMany(HadithChapter::class);
    }

    public function hadiths()
    {
        return $this->belongsToMany(Hadith::class, 'hadith_hadith_book');
    }
}
