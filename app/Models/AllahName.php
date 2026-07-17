<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\SchemaHelper;

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
        'audio_url',
        'quran_reference',
        'dua_text',
        'wazaif',
    ];

    /**
     * SEO Meta relationship (polymorphic).
     */
    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }

    /**
     * ISSUE 8: Generate Schema.org JSON-LD structured data.
     */
    public function generateSchema(): array
    {
        return SchemaHelper::allahNameSchema($this);
    }

    /**
     * Get canonical URL for this name.
     */
    public function getCanonicalUrlAttribute(): string
    {
        return config('app.url') . '/99-names-of-allah/' . $this->slug;
    }

    /**
     * Generate effective meta title.
     */
    public function getEffectiveMetaTitleAttribute(): string
    {
        if ($this->seoMeta?->title) {
            return $this->seoMeta->title;
        }

        return "{$this->transliteration} ({$this->arabic}) — Meaning & Benefits | NoorIslam";
    }

    /**
     * Generate effective meta description.
     */
    public function getEffectiveMetaDescriptionAttribute(): string
    {
        if ($this->seoMeta?->meta_description) {
            return substr($this->seoMeta->meta_description, 0, 160);
        }

        return substr("{$this->transliteration} ({$this->arabic}) — {$this->number}th name of Allah. Meaning: {$this->meaning_english}. Benefits, Quranic reference & dhikr method on NoorIslam.", 0, 160);
    }
}
