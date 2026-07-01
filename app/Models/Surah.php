<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    protected $guarded = [];

    public function ayahs()
    {
        return $this->hasMany(Ayah::class)->orderBy('ayah_number');
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

    // removed old tafseer relationship

    public function recitations()
    {
        return $this->hasMany(QuranRecitation::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(QuranBookmark::class);
    }
}
