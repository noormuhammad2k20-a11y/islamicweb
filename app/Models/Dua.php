<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dua extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];

    protected $casts = [
        'word_by_word_translation' => 'array',
        'difficult_words_meanings' => 'array',
        'keywords' => 'array',
        'search_keywords' => 'array',
        'alternative_names' => 'array',
        'synonyms' => 'array',
        'tags' => 'array',
        'recommended_occasions' => 'array',
        'faqs' => 'array',
        'verified_status' => 'boolean',
        'published_status' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(DuaCategory::class, 'dua_dua_category');
    }

    public function subcategory()
    {
        return $this->belongsTo(DuaCategory::class, 'subcategory_id');
    }

    public function wazaif()
    {
        return $this->belongsToMany(Wazifa::class, 'dua_wazifa');
    }

    public function relatedDuas()
    {
        return $this->belongsToMany(Dua::class, 'dua_related_dua', 'dua_id', 'related_dua_id');
    }

    public function relatedArticles()
    {
        return $this->belongsToMany(KnowledgeArticle::class, 'dua_knowledge_article', 'dua_id', 'article_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($dua) {
            // Normalize Arabic text (remove excessive whitespace)
            $normalized = preg_replace('/\s+/', ' ', trim($dua->arabic_text));
            // Generate unique hash to prevent duplicates
            $dua->arabic_text_hash = md5($normalized);
        });
    }
}
