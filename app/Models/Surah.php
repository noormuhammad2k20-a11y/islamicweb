<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Services\SchemaHelper;

class Surah extends Model
{
    protected $guarded = [];

    // ── EXISTING RELATIONSHIPS (keep these) ──────────
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

    public function recitations()
    {
        return $this->hasMany(QuranRecitation::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(QuranBookmark::class);
    }

    // ── NEW RELATIONSHIPS ────────────────────────────
    public function contentBlocks()
    {
        return $this->hasMany(SurahContentBlock::class)
                    ->where('is_published', true)
                    ->orderBy('sort_order');
    }

    public function faqs()
    {
        return $this->hasMany(SurahFaq::class)
                    ->where('is_published', true)
                    ->orderBy('sort_order');
    }

    public function themes()
    {
        return $this->hasMany(SurahTheme::class)->orderBy('sort_order');
    }

    public function importantAyahs()
    {
        return $this->hasMany(SurahImportantAyah::class)
                    ->with('ayah.englishTranslation', 'ayah.urduTranslation')
                    ->orderBy('sort_order');
    }

    public function relatedSurahs()
    {
        return $this->hasMany(SurahRelatedSurah::class)
                    ->with('relatedSurah:id,number,name_en,name_ar,slug,total_ayahs')
                    ->orderBy('sort_order');
    }

    public function entities()
    {
        return $this->belongsToMany(SurahEntity::class, 'surah_entity_map', 'surah_id', 'entity_id')
                    ->withPivot('relevance_score', 'ayah_id')
                    ->orderByPivot('relevance_score', 'desc');
    }

    public function hadiths()
    {
        return $this->belongsToMany(Hadith::class, 'hadith_surah');
    }

    public function wazaif()
    {
        return $this->belongsToMany(Wazifa::class, 'surah_wazifa');
    }

    public function collections()
    {
        return $this->belongsToMany(SurahCollection::class, 'surah_collection_items', 'surah_id', 'collection_id')
                    ->orderBy('sort_order');
    }

    public function recitationGuides()
    {
        return $this->hasMany(SurahRecitationGuide::class)->orderBy('sort_order');
    }

    public function learningPath()
    {
        return $this->hasOne(SurahLearningPath::class);
    }

    // ── ACCESSORS ────────────────────────────────────
    public function getEffectiveMetaTitleAttribute(): string
    {
        $fromMeta = $this->seoMeta?->title;
        if ($fromMeta && strlen($fromMeta) <= 70) return $fromMeta;

        $site = config('app.name', 'NoorIslam');
        return "Surah {$this->name_en} — Arabic, Urdu Translation & Tafsir | {$site}";
    }

    public function getEffectiveMetaDescriptionAttribute(): string
    {
        if ($this->seoMeta?->meta_description) {
            return substr($this->seoMeta->meta_description, 0, 160);
        }
        $para    = $this->juz_start;
        $ayahs   = $this->total_ayahs;
        $type    = $this->revelation_type;
        $meaning = $this->meaning_en;
        $desc = "Read Surah {$this->name_en} ({$this->name_ar}) — {$ayahs} ayahs, {$type}, Para {$para}. Meaning: {$meaning}. Full Arabic, Urdu tarjuma, Tafsir, PDF & audio.";
        return substr($desc, 0, 160);
    }

    public function getCanonicalUrlAttribute(): string
    {
        return $this->seoMeta?->canonical_url ?? route('surah.show', $this->slug);
    }

    public function getContentBlock(string $type): ?SurahContentBlock
    {
        return $this->contentBlocks->firstWhere('block_type', $type);
    }

    public function getContentText(string $type, string $lang = 'en'): ?string
    {
        $block = $this->getContentBlock($type);
        if (!$block) return null;
        return $lang === 'ur' ? $block->content_ur : $block->content_en;
    }

    // Helper for important ayah sections (last 2, last 3 etc.)
    public function getImportantAyahByAnchor(string $anchor): ?SurahImportantAyah
    {
        return $this->importantAyahs->firstWhere('anchor_id', $anchor);
    }

    /**
     * ISSUE 8: Generate Chapter-type JSON-LD schema for Google rich snippets.
     */
    public function generateSchema(): array
    {
        return SchemaHelper::surahSchema($this);
    }

    /**
     * ISSUE 8: Generate FAQ schema from surah FAQs.
     */
    public function generateFaqSchema(): array
    {
        $faqs = $this->faqs;
        if ($faqs->isEmpty()) {
            return [];
        }
        return SchemaHelper::faqSchema($faqs);
    }
}
