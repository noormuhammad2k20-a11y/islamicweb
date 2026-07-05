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
        'word_by_word_translation' => 'array',
        'open_graph' => 'array',
        'twitter_card' => 'array',
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

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }

    public function getPrimaryCategorySlugAttribute()
    {
        if ($this->categories && $this->categories->first()) {
            return $this->categories->first()->slug;
        }
        return 'general';
    }

    public function getCanonicalUrlAttribute()
    {
        return config('app.url') . '/duas/' . $this->primary_category_slug . '/' . $this->seo_slug;
    }

    public function generateSchema()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $this->seo_title ?? $this->title_english ?? $this->title_roman_urdu,
            'description' => $this->meta_description ?? $this->short_meaning,
            'inLanguage' => ['ur', 'en'],
            'datePublished' => $this->created_at ? $this->created_at->toISOString() : null,
            'dateModified' => $this->updated_at ? $this->updated_at->toISOString() : null,
            'author' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'publisher' => ['@type' => 'Organization', 'name' => 'NoorIslam', 'logo' => ['@type' => 'ImageObject', 'url' => config('app.url') . '/images/logo.png']],
        ];
    }

    public function generateFaqSchema()
    {
        if (empty($this->faqs) || !is_array($this->faqs)) {
            return [];
        }
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($this->faqs)->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq['question'] ?? '',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer'] ?? ''],
                ];
            })->toArray(),
        ];
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
