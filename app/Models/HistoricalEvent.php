<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalEvent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'hijri_day', 'hijri_month', 'hijri_year', 'title', 'slug', 'description', 'source_note',
        'gregorian_date', 'century', 'event_type', 'category', 'full_history', 'historical_context', 'lessons',
        'location', 'country', 'latitude', 'longitude', 'dynasty', 'caliph', 'related_prophet', 'related_companion', 'related_scholar',
        'related_personalities', 'quran_references', 'hadith_references', 'authentic_sources', 'images', 'tags',
        'seo_title', 'meta_description', 'canonical_url', 'og_data', 'twitter_data',
        'related_events', 'related_articles', 'related_months', 'related_faqs'
    ];

    protected $casts = [
        'gregorian_date' => 'date',
        'related_personalities' => 'array',
        'quran_references' => 'array',
        'hadith_references' => 'array',
        'authentic_sources' => 'array',
        'images' => 'array',
        'tags' => 'array',
        'og_data' => 'array',
        'twitter_data' => 'array',
        'related_events' => 'array',
        'related_articles' => 'array',
        'related_months' => 'array',
        'related_faqs' => 'array',
    ];
}
