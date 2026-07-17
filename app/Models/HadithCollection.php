<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HadithCollection extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'introduction',
        'reliability',
        'slug',
        'history',
        'compiler'
    ];

    public function hadiths(): HasMany
    {
        return $this->hasMany(Hadith::class, 'collection_id');
    }

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }
}
