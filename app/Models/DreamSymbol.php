<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DreamSymbol extends Model
{
    protected $guarded = [];

    protected $casts = [
        'keywords' => 'array',
        'is_good_dream' => 'boolean',
        'published_status' => 'boolean',
        'scholarly_opinions' => 'array',
        'quran_reference' => 'array',
        'hadith_reference' => 'array',
        'faqs' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePopular($query)
    {
        return $query->orderByDesc('search_count');
    }

    public function scopeRecent($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeGood($query)
    {
        return $query->where('dream_type', 1)->orWhere('is_good_dream', 1);
    }

    public function scopeBad($query)
    {
        return $query->where('dream_type', 2)->orWhere('is_good_dream', 0);
    }

    public function scopeWarning($query)
    {
        return $query->where('dream_type', 3);
    }

    public function scopeNeutral($query)
    {
        return $query->where('dream_type', 0);
    }

    public function category()
    {
        return $this->belongsTo(DreamCategory::class, 'category_id');
    }

    // Legacy relation table for related
    public function relatedSymbols()
    {
        return $this->belongsToMany(DreamSymbol::class, 'related_dream_symbols', 'dream_symbol_id', 'related_symbol_id');
    }

    // New detailed relationship support
    public function similarDreams()
    {
        return $this->belongsToMany(DreamSymbol::class, 'dream_related_links', 'dream_id', 'related_dream_id')
                    ->wherePivot('relation_type', 'similar');
    }

    public function oppositeDreams()
    {
        return $this->belongsToMany(DreamSymbol::class, 'dream_related_links', 'dream_id', 'related_dream_id')
                    ->wherePivot('relation_type', 'opposite');
    }
}
