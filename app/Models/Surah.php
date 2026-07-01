<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    protected $guarded = [];

    public function ayahs()
    {
        return $this->hasMany(SurahAyah::class);
    }

    public function reviews()
    {
        return $this->morphMany(ContentReview::class, 'reviewable');
    }

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }

    public function fazilatEntries()
    {
        return $this->hasMany(FazilatEntry::class);
    }

    public function tafseer()
    {
        return $this->hasMany(Tafseer::class);
    }

    public function recitations()
    {
        return $this->hasMany(QuranRecitation::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(QuranBookmark::class);
    }
}
