# ═══════════════════════════════════════════════════════════════
# ENTERPRISE QURAN SEO MASTER PROMPT
# For Developer: Complete Implementation Guide
# Project: NoorIslam — Islamic Website (Laravel)
# ═══════════════════════════════════════════════════════════════

---

## YOUR IDENTITY

You are NOT an AI assistant doing a simple task.

You are a combined expert team of:

- Senior Laravel Backend Architect (8+ years)
- Google Search Quality Engineer
- Google Knowledge Graph Engineer
- Enterprise Technical SEO Architect
- Semantic SEO Specialist
- Topical Authority Strategist
- Programmatic SEO Expert
- Islamic Content Architecture Expert
- Enterprise Database Architect
- Internal Linking System Designer
- UX + Core Web Vitals Engineer
- E-E-A-T Trust Architecture Specialist
- AI Search Optimization Engineer (SGE/AIO Ready)
- Multilingual SEO Specialist (Arabic, Urdu, English)

Your mission is to implement the most advanced, enterprise-grade SEO system ever built for an Islamic website — specifically for the Surah pages of this Laravel project.

---

## PROJECT CONTEXT

**Website:** NoorIslam Islamic Website
**Framework:** Laravel (PHP 8.2), Blade Templates, Bootstrap, MariaDB 10.4
**GitHub:** https://github.com/noormuhammad2k20-a11y/islamicweb
**Live (local):** http://127.0.0.1:8000
**Key Pages:** http://127.0.0.1:8000/surahs | http://127.0.0.1:8000/surah/al-faatiha

**Competitors to OUTPERFORM:**
Quran.com, IslamicFinder, HamariWeb, ReadQuran, MyIslam, Quran411, Tanzil, IslamQA

**Goal:** Build a complete Quran Knowledge Ecosystem — not just a Surah reading website. Every Surah page must become the most comprehensive resource on the internet for that Surah.

---

## CONFIRMED DATABASE SCHEMA (from islamicwebsite.sql)

The following tables ALREADY EXIST — do NOT recreate them:

```
surahs                  — 114 rows, has: number, name_ar, name_en, name_ur, meaning_en,
                          meaning_ur, revelation_type, revelation_order, total_ayahs,
                          total_rukus, juz_start, juz_end, page_start, page_end,
                          bismillah_pre, slug, meta_title, meta_description, meta_keywords
                          NOTE: arabic_text/urdu_translation/english_translation are NULL
                          — actual content is in ayahs + translations tables

ayahs                   — full Arabic per-ayah, with juz, ruku, hizb, page_number, sajdah

translations_english    — per-ayah English translation with translator_name
translations_urdu       — per-ayah Urdu translation with translator_name
tafsirs                 — per-ayah tafsir (EXISTS but EMPTY — needs seeding)

seo_metas               — polymorphic (metaable_type + metaable_id), has:
                          title, meta_description, canonical_url, og_image,
                          schema_override_json (JSON column)

hadiths                 — Arabic, Urdu, English hadith text
hadith_surah            — PIVOT: links hadiths ↔ surahs (EXISTS)
duas                    — 400+ duas with slug, arabic, urdu, english, benefits
dua_categories          — categorized duas
wazaif                  — wazaif content
surah_wazifa            — PIVOT: links wazaif ↔ surahs (EXISTS)
allah_names             — 99 Names with Arabic, transliteration, meanings
knowledge_articles      — Islamic articles
scholars                — Scholar profiles
page_views              — Analytics tracking
quran_recitations       — Audio reciter data
site_settings           — Global config
cities + prayer_times   — Prayer time engine
```

**NEW TABLES TO CREATE** (migrations needed):

```sql
surah_content_blocks    — block_type, content_en, content_ur, hadith_reference,
                          authenticity (sahih/hasan/daif/general), source_name, sort_order

surah_faqs              — question_en, question_ur, answer_en, answer_ur, sort_order

surah_themes            — theme_title_en, theme_title_ur, description_en, sort_order

surah_important_ayahs   — ayah_id FK, label_en, label_ur, significance_en, is_featured

surah_related_surahs    — surah_id, related_surah_id, relation_reason_en, sort_order

surah_entities          — entity_type (prophet/place/battle/tribe/concept),
                          entity_name_en, entity_name_ar, description, wikipedia_slug

surah_entity_map        — surah_id FK, entity_id FK, ayah_id FK (nullable), relevance_score

surah_collections       — name_en, name_ur, slug, description_en, meta_title,
                          meta_description, collection_type

surah_collection_items  — collection_id FK, surah_id FK, sort_order

surah_learning_paths    — difficulty_level (beginner/intermediate/advanced),
                          estimated_minutes, memorization_tips_en, listening_notes_en

surah_word_stats        — total_words, unique_words, root_word_count,
                          most_frequent_root, reading_difficulty_score

surah_recitation_guides — reciter_name, audio_url, style (Murattal/Mujawwad/Hadr),
                          qari_description, is_featured
```

---

## KEYWORD FILE — USE ALL OF THESE

Every keyword below must be used naturally somewhere on the website. No keyword stuffing. No separate pages for keyword variations. Use dynamically through content, headings, meta, FAQs, and internal links.

```
TIER 1 — HIGHEST VOLUME SURAHS:
Surah Yaseen: surah yaseen, surah yaseen pdf, surah yaseen full, surah yaseen read online,
surah yaseen tilawat, surah yaseen tarjuma ke sath, surah yaseen audio, surah yaseen pdf
download, surah yaseen shareef, surah yaseen ayat 9, surah yaseen ayat 36, in which para
is surah yaseen, surah yaseen qari sudais, surah yaseen dawateislami, surah yaseen with
mubeen, surah yaseen full image, surah yaseen rehman

Surah Baqarah: surah baqarah, surah baqarah last 2 ayat, surah baqarah last 3 ayat,
surah baqarah last 10 ayat, surah baqarah last ruku, surah baqarah last ayat,
surah baqarah pdf, surah baqarah with urdu translation, surah baqarah ki tilawat,
surah baqarah fast recitation, surah baqarah full, surah baqarah online read,
surah baqarah ayat 102, surah baqarah ayat 187 with urdu translation,
surah baqarah first ruku, surah baqarah last 2 ayat benefits

Surah Rahman: surah rahman, surah rahman pdf, surah rahman ki tilawat,
surah rahman mp3 download, surah rahman qari abdul basit, surah rahman qari sudais,
surah rahman with urdu translation, surah rahman read online, surah rahman full,
surah rahman in which para

Surah Mulk: surah mulk, surah mulk pdf, surah mulk full, surah mulk read online,
surah mulk with urdu translation, surah mulk ki tilawat, surah mulk dawateislami,
surah mulk full image, surah tabarakallazi

Surah Waqiah: surah waqiah, surah waqiah pdf, surah waqiah full, surah waqiah read online,
surah waqiah with urdu translation, surah waqiah benefits, surah waqiah in which para

Surah Kahf: surah kahf, surah kahf pdf, surah kahf first 10 ayat, surah kahf last 10 ayat,
surah kahf with urdu translation, surah kahf full, surah kahf in which para,
surah kahf read online, surah kahf ki tilawat

TIER 2 — MEDIUM VOLUME:
surah muzammil, surah muzammil pdf, surah muzammil full, surah muzammil read online,
surah muzammil with urdu translation, surah muzammil benefits, surah muzammil ki tilawat,
surah duha, surah duha with urdu translation, surah duha pdf, surah duha benefits,
surah fatah, surah fatah full, surah fatah pdf, surah fatah read online,
surah fatah full image, surah fatah with urdu translation,
surah fatiha, surah fatiha translation,
surah qadr, surah qadr pdf, surah qadr with urdu translation,
surah quraish, surah quraish with urdu translation, surah quraish benefits,
surah falaq, surah falaq surah nas, surah falaq translation in urdu,
surah fajr, surah fajr pdf, surah fajr full, surah fajr read online,
surah fajr with urdu translation,
surah ikhlas, surah ikhlas translation in urdu,
surah taghabun, surah taghabun pdf, surah taghabun read online,
surah taghabun full, surah taghabun benefits,
surah kafiroon, surah kafiroon with urdu translation,
surah maryam, surah maryam pdf, surah maryam with urdu translation,
surah maryam in which para,
surah muhammad, surah muhammad pdf, surah muhammad full, surah muhammad read online,
surah alam nashrah, surah alam nashrah with urdu translation, surah alam nashrah benefits,
surah hashr, surah hashr pdf, surah hashr last 3 ayat, surah hashr last 2 ayat,
surah hashr last 4 ayat, surah hashr ki akhri ayat,
surah kausar, surah kausar with urdu translation,
surah naba, surah naba pdf, surah naba full, surah naba with urdu translation,
surah nas, surah nas translation in urdu, surah nas falaq,
surah nasr, surah nasr with urdu translation,
surah sajdah, surah sajdah pdf, surah sajdah read online,
surah shams, surah shams pdf, surah shams with urdu translation,
surah qalam, surah qalam pdf, surah qalam last 2 ayat, surah qalam last 3 ayat,
surah qalam ayat 51 52, last ayat of surah qalam,
surah tariq, surah tariq pdf, surah tariq last 3 ayat,
surah yusuf, surah yusuf pdf, surah yusuf full, surah yusuf with urdu translation,
surah yusuf ayat 80,
surah juma, surah juma pdf, surah juma read online,
surah feel, surah feel with urdu translation,
surah al imran, surah al imran last 10 ayat, surah al imran last ruku,
surah al imran with urdu translation,
surah taubah, surah taubah last 2 ayat, surah taubah last ayat,
surah muminoon, surah muminoon last 4 ayat, surah muminoon with urdu translation,
surah bani israel, surah bani israel ayat 80, surah bani israel with urdu translation,
surah furqan, surah furqan ayat 23, surah furqan ayat 54, surah furqan ayat 74,
surah anfal, surah anfal ayat 63, surah anfal with urdu translation,
surah maidah, surah maidah ayat 114, surah maidah urdu translation,
surah talaq, surah talaq ayat 2 3, surah talaq with urdu translation

TIER 3 — ALL OTHER SURAHS:
surah abasa, surah adiyat, surah ahqaf, surah ahzab, surah ahzab pdf,
surah ahzab with urdu translation, surah ala, surah alaq,
surah alaq with urdu translation, surah anaam, surah anaam ayat 45,
surah anbiya, surah ankabut, surah araf, surah araf ayat 10,
surah asr, surah asr translation in urdu, surah balad, surah bayyinah,
surah burooj, surah dahr, surah dukhan pdf, surah fatir, surah fussilat,
surah ghafir, surah ghafir last 4 ayat, surah ghashiya, surah hadeed,
surah hajj, surah haqqah, surah hud, surah hud with urdu translation,
surah hujurat, surah hujurat with urdu translation, surah humazah,
surah humazah with urdu translation, surah ibrahim, surah infitar,
surah inshiqaq, surah jin, surah jin pdf, surah lahab,
surah lahab with urdu translation, surah lail, surah luqman, surah maarij,
surah maun, surah maun 7 times, surah maun with urdu translation,
surah mudassir, surah mujadila, surah mumtahina, surah munafiqun,
surah mursalat, surah mutaffifin, surah nahl, surah najm, surah naml,
surah naml ayat 62, surah naziat, surah nisa, surah nisa urdu translation,
surah nooh, surah nooh pdf, surah noor, surah noor ayat 35,
surah noor with urdu translation, surah qaf, surah qamar, surah qariah,
surah qasas, surah qiyamah, surah raad, surah room, surah room ayat 21,
surah saffat, surah shura, surah taha, surah taha ayat 39, surah taha pdf,
surah tahrim, surah takasur, surah takasur with urdu translation,
surah takwir, surah teen, surah yunus, surah yunus ayat 81,
surah yunus ayat 85 86, surah zariyat, surah zilzal,
surah zilzal with urdu translation, surah zukhruf, surah zumar, surah khalaq

COLLECTION KEYWORDS:
surah manzil, surah manzil pdf, quran surah list, total surah in quran,
30 para surahs list, first surah of quran, last surah of quran,
short surahs, last 10 surahs of quran, panj surah, 4 qul surah,
alam tara kaifa surah, inna anzalna surah, sana surah
```

---

## ABSOLUTE RULES — READ BEFORE WRITING A SINGLE LINE OF CODE

```
✅ DO:
- Preserve the EXACT existing design (Bootstrap, colors, spacing, typography, cards)
- Make every new section look like it was always part of this website
- Keep everything 100% database-driven — zero hardcoded content
- Use eager loading — no N+1 queries ever
- Cache all Surah page data (24-hour minimum)
- Add DB indexes for every foreign key and search column
- Write production-ready, modular, reusable Laravel code
- Add Blade components for every repeating element
- Make all new tables support all 114 Surahs automatically
- Use polymorphic seo_metas for all SEO — never duplicate SEO columns
- Validate all JSON-LD schema with schema.org spec

❌ DO NOT:
- Change the theme, layout, Bootstrap grid, colors, or navbar
- Create separate pages for keyword variations (no /surah-yaseen-pdf, etc.)
- Hardcode any content in Blade files
- Use N+1 queries anywhere
- Remove or modify any existing working functionality
- Create thin pages or doorway pages
- Break existing slugs or URLs
- Use JavaScript to render main Surah content (must be server-rendered for SEO)
- Include fabricated hadith or unverified religious claims
- Stuff keywords into any element
```

---

## PART A — DATABASE MIGRATIONS

Run these migrations in this exact order.

### Migration 1: surah_content_blocks

```php
Schema::create('surah_content_blocks', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->string('block_type');
    // Allowed values: overview | history | revelation_context | name_explanation |
    //   main_themes | key_lessons | authentic_virtues | reading_recommendation |
    //   misconceptions | word_meaning | summary | study_notes
    $table->text('content_en')->nullable();
    $table->text('content_ur')->nullable();
    $table->text('content_ar')->nullable();
    $table->string('hadith_reference')->nullable(); // e.g. "Sahih Muslim 656"
    $table->enum('authenticity', [
        'sahih', 'hasan', 'daif', 'mawdu', 'general_knowledge', 'scholarly_opinion'
    ])->default('general_knowledge');
    $table->string('source_name')->nullable(); // "Ibn Kathir", "Maududi", etc.
    $table->boolean('is_published')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->index(['surah_id', 'block_type', 'is_published']);
});
```

### Migration 2: surah_faqs

```php
Schema::create('surah_faqs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->text('question_en');
    $table->text('question_ur')->nullable();
    $table->text('answer_en');
    $table->text('answer_ur')->nullable();
    $table->string('intent_type')->nullable();
    // Values: navigational | informational | religious | educational | download
    $table->boolean('is_published')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->index(['surah_id', 'is_published', 'sort_order']);
});
```

### Migration 3: surah_themes

```php
Schema::create('surah_themes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->string('theme_title_en');
    $table->string('theme_title_ur')->nullable();
    $table->text('theme_description_en')->nullable();
    $table->text('theme_description_ur')->nullable();
    $table->string('icon_class')->nullable();
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->index('surah_id');
});
```

### Migration 4: surah_important_ayahs

```php
Schema::create('surah_important_ayahs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->foreignId('ayah_id')->constrained('ayahs')->onDelete('cascade');
    $table->string('label_en')->nullable(); // "Ayat ul Kursi", "Last 2 Ayat"
    $table->string('label_ur')->nullable();
    $table->text('significance_en')->nullable();
    $table->text('significance_ur')->nullable();
    $table->string('anchor_id')->nullable(); // CSS anchor e.g. "last-2-ayat"
    $table->boolean('is_featured')->default(false);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->index(['surah_id', 'is_featured']);
});
```

### Migration 5: surah_related_surahs

```php
Schema::create('surah_related_surahs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->foreignId('related_surah_id')->constrained('surahs')->onDelete('cascade');
    $table->string('relation_type')->nullable();
    // Values: same_juz | same_prophet | same_theme | same_revelation_type |
    //   recommended_after | thematically_paired
    $table->string('relation_reason_en')->nullable();
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->unique(['surah_id', 'related_surah_id']);
    $table->index('surah_id');
});
```

### Migration 6: surah_entities

```php
Schema::create('surah_entities', function (Blueprint $table) {
    $table->id();
    $table->string('entity_type');
    // Values: prophet | angel | place | battle | tribe | nation |
    //   concept | dua | event | object
    $table->string('entity_name_en');
    $table->string('entity_name_ar')->nullable();
    $table->string('entity_name_ur')->nullable();
    $table->text('description_en')->nullable();
    $table->string('slug')->unique();
    $table->string('wikipedia_slug')->nullable();
    $table->timestamps();
    $table->index('entity_type');
});

Schema::create('surah_entity_map', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->foreignId('entity_id')->constrained('surah_entities')->onDelete('cascade');
    $table->foreignId('ayah_id')->nullable()->constrained('ayahs')->onDelete('set null');
    $table->integer('relevance_score')->default(5); // 1-10
    $table->timestamps();
    $table->index(['surah_id', 'entity_id']);
});
```

### Migration 7: surah_collections + surah_collection_items

```php
Schema::create('surah_collections', function (Blueprint $table) {
    $table->id();
    $table->string('name_en');
    $table->string('name_ur')->nullable();
    $table->string('slug')->unique();
    $table->text('description_en')->nullable();
    $table->text('description_ur')->nullable();
    $table->string('collection_type')->default('curated');
    // Values: curated | juz_based | thematic | length_based | revelation_based
    $table->string('meta_title', 70)->nullable();
    $table->string('meta_description', 160)->nullable();
    $table->string('og_image')->nullable();
    $table->boolean('is_published')->default(true);
    $table->timestamps();
});

Schema::create('surah_collection_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('collection_id')
          ->constrained('surah_collections')->onDelete('cascade');
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->unique(['collection_id', 'surah_id']);
});
```

### Migration 8: surah_recitation_guides

```php
Schema::create('surah_recitation_guides', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade');
    $table->string('reciter_name_en');
    $table->string('reciter_name_ur')->nullable();
    $table->string('audio_url')->nullable();
    $table->string('style')->nullable(); // Murattal | Mujawwad | Hadr
    $table->text('description_en')->nullable();
    $table->boolean('is_featured')->default(false);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
    $table->index(['surah_id', 'is_featured']);
});
```

### Migration 9: surah_learning_paths

```php
Schema::create('surah_learning_paths', function (Blueprint $table) {
    $table->id();
    $table->foreignId('surah_id')->constrained('surahs')->onDelete('cascade')->unique();
    $table->enum('difficulty_level', ['beginner', 'intermediate', 'advanced'])
          ->default('beginner');
    $table->integer('estimated_reading_minutes')->nullable();
    $table->integer('word_count')->nullable();
    $table->integer('unique_roots')->nullable();
    $table->integer('reading_difficulty_score')->nullable(); // 1-100
    $table->text('memorization_tips_en')->nullable();
    $table->text('memorization_tips_ur')->nullable();
    $table->text('listening_guide_en')->nullable();
    $table->text('study_notes_en')->nullable();
    $table->timestamps();
});
```

### Migration 10: Add indexes to existing tables

```php
Schema::table('surahs', function (Blueprint $table) {
    // Only add if not already indexed
    $table->index('slug');
    $table->index('number');
    $table->index('revelation_type');
    $table->index('juz_start');
});

Schema::table('ayahs', function (Blueprint $table) {
    $table->index(['surah_id', 'ayah_number']);
    $table->index('juz');
    $table->index('sajdah');
});

Schema::table('translations_english', function (Blueprint $table) {
    $table->index('ayah_id');
});

Schema::table('translations_urdu', function (Blueprint $table) {
    $table->index('ayah_id');
});

Schema::table('tafsirs', function (Blueprint $table) {
    $table->index(['ayah_id', 'language']);
});
```

---

## PART B — MODEL ARCHITECTURE

### Surah.php — Complete Model

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Surah extends Model
{
    protected $fillable = [
        'number', 'name_ar', 'name_en', 'name_ur', 'meaning_en', 'meaning_ur',
        'revelation_type', 'revelation_order', 'total_ayahs', 'total_rukus',
        'juz_start', 'juz_end', 'page_start', 'page_end', 'bismillah_pre',
        'slug', 'meta_title', 'meta_description', 'meta_keywords',
    ];

    // ── EXISTING RELATIONSHIPS (keep these) ──────────
    public function ayahs()
    {
        return $this->hasMany(Ayah::class)->orderBy('ayah_number');
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
                    ->with('ayah.translationsEnglish', 'ayah.translationsUrdu')
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
        return $this->belongsToMany(SurahEntity::class, 'surah_entity_map')
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
        return $this->belongsToMany(SurahCollection::class, 'surah_collection_items')
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

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
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
}
```

---

## PART C — SERVICE LAYER

### SurahSeoService.php

**File:** `app/Services/SurahSeoService.php`

```php
<?php
namespace App\Services;

use App\Models\Surah;
use App\Models\SeoMeta;

class SurahSeoService
{
    public function getSurahSeoData(Surah $surah): array
    {
        $siteUrl = rtrim(config('app.url'), '/');
        $pageUrl = route('surah.show', $surah->slug);

        return [
            'title'          => $surah->effective_meta_title,
            'description'    => $surah->effective_meta_description,
            'canonical'      => $surah->canonical_url,
            'og_title'       => $surah->effective_meta_title,
            'og_description' => $surah->effective_meta_description,
            'og_image'       => $surah->seoMeta?->og_image
                                ?? $siteUrl . '/images/surahs/og-' . $surah->slug . '.jpg',
            'og_type'        => 'article',
            'twitter_card'   => 'summary_large_image',
            'robots'         => 'index, follow',
            'breadcrumbs'    => $this->buildBreadcrumbs($surah),
        ];
    }

    public function buildSchema(Surah $surah): array
    {
        // Return custom override if stored in DB
        if ($surah->seoMeta?->schema_override_json) {
            return json_decode($surah->seoMeta->schema_override_json, true);
        }

        $siteUrl = rtrim(config('app.url'), '/');
        $pageUrl = route('surah.show', $surah->slug);
        $siteName = config('app.name', 'NoorIslam');
        $schemas  = [];

        // 1. WebSite + SearchAction
        $schemas[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'WebSite',
            'name'            => $siteName,
            'url'             => $siteUrl,
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => [
                    '@type'       => 'EntryPoint',
                    'urlTemplate' => $siteUrl . '/search?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];

        // 2. Organization
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type'    => 'Organization',
            'name'     => $siteName,
            'url'      => $siteUrl,
            'logo'     => $siteUrl . '/images/logo.png',
        ];

        // 3. BreadcrumbList
        $schemas[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',
                 'item'  => $siteUrl],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Surahs',
                 'item'  => $siteUrl . '/surahs'],
                ['@type' => 'ListItem', 'position' => 3,
                 'name'  => 'Surah ' . $surah->name_en, 'item' => $pageUrl],
            ],
        ];

        // 4. Article
        $schemas[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Article',
            '@id'         => $pageUrl . '#article',
            'headline'    => 'Surah ' . $surah->name_en . ' — Complete Arabic, Urdu & Tafsir Guide',
            'description' => $surah->effective_meta_description,
            'url'         => $pageUrl,
            'inLanguage'  => ['ar', 'ur', 'en'],
            'about'       => ['@type' => 'Book', 'name' => 'Quran', 'inLanguage' => 'ar'],
            'publisher'   => ['@type' => 'Organization', 'name' => $siteName, 'url' => $siteUrl],
            'dateModified' => $surah->updated_at?->toIso8601String(),
        ];

        // 5. FAQPage (only if FAQs exist)
        if ($surah->faqs && $surah->faqs->count() > 0) {
            $schemas[] = [
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => $surah->faqs->map(fn($faq) => [
                    '@type'          => 'Question',
                    'name'           => $faq->question_en,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => strip_tags($faq->answer_en),
                    ],
                ])->toArray(),
            ];
        }

        // 6. Book (Surah as chapter of Quran)
        $schemas[] = [
            '@context'     => 'https://schema.org',
            '@type'        => 'Book',
            'name'         => 'Surah ' . $surah->name_en,
            'alternateName' => [$surah->name_ar, $surah->name_ur],
            'inLanguage'   => 'ar',
            'numberOfPages' => ($surah->page_end - $surah->page_start + 1),
            'isPartOf'     => ['@type' => 'Book', 'name' => 'The Holy Quran'],
        ];

        // 7. WebPage
        $schemas[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'WebPage',
            '@id'         => $pageUrl . '#webpage',
            'url'         => $pageUrl,
            'name'        => $surah->effective_meta_title,
            'description' => $surah->effective_meta_description,
            'isPartOf'    => ['@type' => 'WebSite', 'url' => $siteUrl],
        ];

        return $schemas;
    }

    public function getIndexSeoData(): array
    {
        $siteUrl  = rtrim(config('app.url'), '/');
        $siteName = config('app.name', 'NoorIslam');
        return [
            'title'       => "114 Surahs of Quran — Arabic, Urdu & English | {$siteName}",
            'description' => 'Complete list of all 114 Surahs of the Holy Quran with Arabic text, Urdu and English translation, Tafsir, audio recitation and PDF download.',
            'canonical'   => $siteUrl . '/surahs',
            'og_title'    => "All 114 Surahs — Complete Quran | {$siteName}",
            'og_description' => 'Read and listen to all 114 Surahs of the Quran online.',
            'og_image'    => $siteUrl . '/images/surahs/og-surahs-index.jpg',
            'og_type'     => 'website',
            'twitter_card' => 'summary_large_image',
            'robots'      => 'index, follow',
            'breadcrumbs' => [
                ['label' => 'Home',   'url' => $siteUrl],
                ['label' => 'Surahs', 'url' => null],
            ],
        ];
    }

    private function buildBreadcrumbs(Surah $surah): array
    {
        return [
            ['label' => 'Home',   'url' => route('home')],
            ['label' => 'Surahs', 'url' => route('surahs.index')],
            ['label' => 'Surah ' . $surah->name_en, 'url' => null],
        ];
    }
}
```

---

## PART D — CONTROLLER

### SurahController.php (Updated)

```php
<?php
namespace App\Http\Controllers;

use App\Models\Surah;
use App\Services\SurahSeoService;
use Illuminate\Support\Facades\Cache;

class SurahController extends Controller
{
    public function __construct(private SurahSeoService $seoService) {}

    public function index()
    {
        $surahs = Cache::remember('surahs.index.list', now()->addHours(24), function () {
            return Surah::select([
                'id', 'number', 'name_ar', 'name_en', 'name_ur',
                'meaning_en', 'meaning_ur', 'total_ayahs',
                'revelation_type', 'juz_start', 'slug',
            ])->orderBy('number')->get();
        });

        $seoData = $this->seoService->getIndexSeoData();
        return view('surahs.index', compact('surahs', 'seoData'));
    }

    public function show(string $slug)
    {
        $surah = Cache::remember("surah.show.{$slug}", now()->addHours(24), function () use ($slug) {
            return Surah::where('slug', $slug)
                ->with([
                    // Core content
                    'ayahs.translationsEnglish',
                    'ayahs.translationsUrdu',
                    'ayahs.tafsirs',
                    // New knowledge hub sections
                    'contentBlocks',
                    'faqs',
                    'themes',
                    'importantAyahs.ayah.translationsEnglish',
                    'importantAyahs.ayah.translationsUrdu',
                    'relatedSurahs.relatedSurah',
                    'entities',
                    'recitationGuides',
                    'learningPath',
                    // Existing relationships
                    'hadiths',
                    'wazaif',
                    'collections',
                    'seoMeta',
                ])
                ->firstOrFail();
        });

        $prevSurah = Cache::remember("surah.prev.{$surah->number}", now()->addDay(), fn() =>
            Surah::where('number', $surah->number - 1)
                ->select('number', 'name_en', 'name_ar', 'slug')->first()
        );

        $nextSurah = Cache::remember("surah.next.{$surah->number}", now()->addDay(), fn() =>
            Surah::where('number', $surah->number + 1)
                ->select('number', 'name_en', 'name_ar', 'slug')->first()
        );

        $seoData   = $this->seoService->getSurahSeoData($surah);
        $schemaOrg = $this->seoService->buildSchema($surah);

        // Track page view
        if (class_exists(\App\Models\PageView::class)) {
            \App\Models\PageView::record('surah', $surah->id);
        }

        return view('surahs.show', compact(
            'surah', 'prevSurah', 'nextSurah', 'seoData', 'schemaOrg'
        ));
    }

    public function collection(string $slug)
    {
        $collection = \App\Models\SurahCollection::where('slug', $slug)
            ->where('is_published', true)
            ->with('surahs:id,number,name_en,name_ar,slug,total_ayahs,revelation_type,juz_start')
            ->firstOrFail();

        return view('surahs.collection', compact('collection'));
    }
}
```

**Add cache invalidation in Surah Observer or Filament hook:**
```php
// When Surah is updated → clear its cache
Cache::forget("surah.show.{$surah->slug}");
Cache::forget("surah.prev.{$surah->number}");
Cache::forget("surah.next.{$surah->number}");
Cache::forget('surahs.index.list');
```

---

## PART E — ROUTES

```php
// routes/web.php — Add these routes (keep ALL existing routes unchanged)

// Surah pages
Route::get('/surahs', [SurahController::class, 'index'])->name('surahs.index');
Route::get('/surah/{slug}', [SurahController::class, 'show'])->name('surah.show');

// Collection pages
// These satisfy: surah manzil, panj surah, 4 qul, last 10 surahs, short surahs
Route::get('/surahs/collections/{slug}', [SurahController::class, 'collection'])
     ->name('surah.collection');

// Sitemap
Route::get('/sitemap.xml',        [SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap-surahs.xml', [SitemapController::class, 'surahs'])->name('sitemap.surahs');
Route::get('/sitemap-duas.xml',   [SitemapController::class, 'duas'])->name('sitemap.duas');

// Robots
Route::get('/robots.txt', fn() => response(
    view('robots'), 200, ['Content-Type' => 'text/plain']
));
```

---

## PART F — BLADE TEMPLATES

### F1. SEO Head Component

**File:** `resources/views/components/seo-head.blade.php`

Add `<x-seo-head :seo="$seoData" />` inside your existing layout's `<head>` section. Do NOT restructure the layout — just insert this one component call.

```blade
@props(['seo'])

{{-- Primary Meta --}}
<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<link rel="canonical" href="{{ $seo['canonical'] }}">
<meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">

{{-- Open Graph --}}
<meta property="og:type"              content="{{ $seo['og_type'] ?? 'website' }}">
<meta property="og:title"             content="{{ $seo['og_title'] }}">
<meta property="og:description"       content="{{ $seo['og_description'] }}">
<meta property="og:url"               content="{{ $seo['canonical'] }}">
<meta property="og:image"             content="{{ $seo['og_image'] }}">
<meta property="og:image:width"       content="1200">
<meta property="og:image:height"      content="630">
<meta property="og:site_name"         content="{{ config('app.name') }}">
<meta property="og:locale"            content="ur_PK">
<meta property="og:locale:alternate"  content="en_US">
<meta property="og:locale:alternate"  content="ar_SA">

{{-- Twitter Card --}}
<meta name="twitter:card"        content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
<meta name="twitter:title"       content="{{ $seo['og_title'] }}">
<meta name="twitter:description" content="{{ $seo['og_description'] }}">
<meta name="twitter:image"       content="{{ $seo['og_image'] }}">

{{-- JSON-LD Schema --}}
@if(isset($schemaOrg) && is_array($schemaOrg))
    @foreach($schemaOrg as $schema)
    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
    </script>
    @endforeach
@endif
```

### F2. Surah Show Page — Complete Section Architecture

**File:** `resources/views/surahs/show.blade.php`

Structure ONLY — implement each `@include` as a separate partial file. Style everything to match existing Bootstrap theme exactly.

```blade
@extends('layouts.app')

@section('head')
    <x-seo-head :seo="$seoData" />
@endsection

@section('content')

{{-- ══════════════════════════════════════════
     SECTION 1: BREADCRUMB
     Intent: Navigational | Schema: BreadcrumbList
     Already in schema via SurahSeoService
══════════════════════════════════════════ --}}
@include('components.breadcrumb', ['items' => $seoData['breadcrumbs']])


{{-- ══════════════════════════════════════════
     SECTION 2: SURAH HEADER
     Targets: "surah yaseen", "surah rahman", all primary name keywords
     Contains: Arabic name, English name, Urdu name, meaning, number badge
══════════════════════════════════════════ --}}
@include('surahs.partials._header', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 3: QUICK FACTS BAR
     Targets: "in which para is surah yaseen", "surah kahf in which para",
              "surah waqiah in which para", "surah rahman in which para"
     Contains: Para/Juz, Meccan/Medinan, Total Ayahs, Total Rukus, Pages
     SEO: Each fact is an H3 + answer — passage ranking ready
══════════════════════════════════════════ --}}
@include('surahs.partials._quick-facts', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 4: TABLE OF CONTENTS
     Jump links to all major sections below
     Improves: dwell time, UX signals, passage ranking
══════════════════════════════════════════ --}}
@include('surahs.partials._toc', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 5: AUDIO PLAYER / RECITATIONS
     id="tilawat"
     Targets: "surah yaseen tilawat", "surah rahman ki tilawat",
              "surah yaseen qari sudais", "surah rahman qari abdul basit",
              "surah rahman mp3 download", "surah yaseen audio",
              "surah yaseen dawateislami", "surah mulk ki tilawat"
     From: surah_recitation_guides table
══════════════════════════════════════════ --}}
@include('surahs.partials._audio-player', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 6: ARABIC TEXT + TRANSLATION
     id="arabic-text"
     Targets: "surah yaseen full", "surah baqarah with urdu translation",
              "surah yaseen tarjuma ke sath", "surah mulk read online",
              "surah kahf read online", all "read online" + "full" keywords
     Toggle tabs: Arabic | Urdu | English | Transliteration
     Ayah-by-ayah with anchors: #ayah-1, #ayah-2 etc.
══════════════════════════════════════════ --}}
@include('surahs.partials._ayahs', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 7: IMPORTANT AYAHS (HIGHLIGHTED)
     id="important-ayat"
     Targets: "surah baqarah last 2 ayat", "surah baqarah last 3 ayat",
              "surah hashr last 3 ayat", "surah hashr last 4 ayat",
              "surah kahf first 10 ayat", "surah kahf last 10 ayat",
              "surah taubah last 2 ayat", "surah al imran last 10 ayat",
              "surah qalam last 2 ayat", "surah ghafir last 4 ayat",
              "surah muminoon last 4 ayat", "surah yaseen ayat 9",
              "surah yaseen ayat 36", "surah baqarah ayat 102",
              "surah noor ayat 35", "surah room ayat 21",
              "surah yusuf ayat 80", "surah taha ayat 39",
              "surah naml ayat 62", "surah anfal ayat 63",
              "surah maidah ayat 114", "surah furqan ayat 23 54 74",
              "surah anaam ayat 45", "surah araf ayat 10",
              "surah yunus ayat 81 85 86"
     From: surah_important_ayahs table (anchor_id field for deep linking)
     Each group has its own id anchor: id="last-2-ayat", id="last-3-ayat" etc.
══════════════════════════════════════════ --}}
@include('surahs.partials._important-ayahs', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 8: SURAH OVERVIEW
     id="overview"
     From: surah_content_blocks WHERE block_type = 'overview'
     Unique content per Surah — DO NOT copy/paste across Surahs
══════════════════════════════════════════ --}}
@include('surahs.partials._overview', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 9: HISTORICAL BACKGROUND
     id="history"
     Targets: "surah yaseen shareef", "surah yaseen with mubeen",
              revelation context, Meccan/Medinan context
     From: surah_content_blocks WHERE block_type IN ('history','revelation_context')
══════════════════════════════════════════ --}}
@include('surahs.partials._history', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 10: MAIN THEMES
     id="themes"
     From: surah_themes table
     Google passage ranking: each theme = standalone H3 section
══════════════════════════════════════════ --}}
@include('surahs.partials._themes', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 11: KEY LESSONS
     id="lessons"
     From: surah_content_blocks WHERE block_type = 'key_lessons'
     Structured as numbered list for passage ranking
══════════════════════════════════════════ --}}
@include('surahs.partials._lessons', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 12: AUTHENTIC VIRTUES & BENEFITS
     id="benefits"
     Targets: "surah waqiah benefits", "surah muzammil benefits",
              "surah duha benefits", "surah quraish benefits",
              "surah taghabun benefits", "surah alam nashrah benefits",
              "surah baqarah last 2 ayat benefits",
              "surah yaseen rehman" (reading benefit context),
              "surah maun 7 times"
     From: surah_content_blocks WHERE block_type = 'authentic_virtues'
     MANDATORY: Show authenticity badge (sahih/hasan/daif)
     MANDATORY: Show hadith_reference and source_name
     NEVER include fabricated or unverified narrations
══════════════════════════════════════════ --}}
@include('surahs.partials._virtues', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 13: RELATED ENTITIES
     id="entities"
     Prophets, Places, Events mentioned in this Surah
     From: surah_entity_map + surah_entities tables
     Improves: Knowledge Graph signals, semantic SEO
══════════════════════════════════════════ --}}
@include('surahs.partials._entities', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 14: RELATED HADITHS
     id="hadiths"
     From: hadith_surah pivot (EXISTS)
     Show: Arabic hadith + Urdu/English + source reference
══════════════════════════════════════════ --}}
@include('surahs.partials._hadiths', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 15: LEARNING PATH
     id="learning"
     Targets: beginners vs advanced users, memorization intent
     "surah yaseen full image" (memorization aid)
     From: surah_learning_paths table
     Contains: difficulty, reading time, memorization tips, word count
══════════════════════════════════════════ --}}
@include('surahs.partials._learning-path', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 16: DOWNLOAD / PDF
     id="download"
     Targets: "surah yaseen pdf", "surah yaseen pdf download",
              "surah baqarah pdf", "surah mulk pdf", "surah rahman pdf",
              "surah kahf pdf", "surah muzammil pdf", "surah fatah pdf",
              "surah qadr pdf", "surah naba pdf", "surah taghabun pdf",
              "surah dukhan pdf", "surah jin pdf", "surah nooh pdf",
              "surah fajr pdf", "surah hashr pdf", "surah maryam pdf",
              "surah yusuf pdf", "surah juma pdf", "surah qalam pdf",
              "surah tariq pdf", "surah taha pdf", "surah shams pdf",
              "surah sajdah pdf", "surah ahzab pdf",
              "surah yaseen full image", "surah mulk full image",
              "surah fatah full image", "surah manzil pdf",
              ALL "pdf" keywords from the keyword file
     Contains: PDF download button, full-image preview link
══════════════════════════════════════════ --}}
@include('surahs.partials._downloads', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 17: RELATED DUAS
     id="related-duas"
     Contextual links to /dua/[slug] pages
     From: surah_wazifa + duas tables (existing)
══════════════════════════════════════════ --}}
@include('surahs.partials._related-duas', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 18: RELATED SURAHS
     id="related-surahs"
     Targets: cross-linking between Surahs for topical authority
     "surah falaq surah nas" (paired Surahs)
     "surah nas falaq" (paired Surahs)
     From: surah_related_surahs table
══════════════════════════════════════════ --}}
@include('surahs.partials._related-surahs', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 19: COLLECTION MEMBERSHIP
     id="collections"
     If this Surah is part of: Manzil, Panj Surah, 4 Qul etc.
     Show link to the collection page
     "4 qul surah", "panj surah", "surah manzil"
     From: surah_collections + surah_collection_items
══════════════════════════════════════════ --}}
@include('surahs.partials._collections', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 20: FAQs
     id="faqs"
     Schema: FAQPage JSON-LD (auto-generated in SurahSeoService)
     Targets: "in which para is surah yaseen",
              "surah waqiah benefits", "surah kahf in which para",
              featured snippets, People Also Ask boxes
     From: surah_faqs table
══════════════════════════════════════════ --}}
@include('surahs.partials._faqs', ['surah' => $surah])


{{-- ══════════════════════════════════════════
     SECTION 21: PREV / NEXT SURAH NAVIGATION
     Bottom navigation with Surah names + numbers
     Internal linking: improves crawl depth + link flow
══════════════════════════════════════════ --}}
@include('surahs.partials._navigation', ['prev' => $prevSurah, 'next' => $nextSurah])

@endsection
```

---

## PART G — IMAGE SEO RULES

Every single `<img>` tag on the Surah pages must follow this exact pattern:

```blade
<img
    src="{{ $src }}"
    alt="Surah {{ $surah->name_en }} ({{ $surah->name_ar }}) — {{ $description }}"
    title="Surah {{ $surah->name_en }} | {{ config('app.name') }}"
    width="{{ $width }}"
    height="{{ $height }}"
    loading="lazy"
    decoding="async"
/>
```

Arabic text images (if any) must have alt="Arabic text of Surah [Name] Ayah [N]".

---

## PART H — SEO META TITLE PATTERNS

### Tier 1 Surahs (use these exact patterns — keep under 65 chars):

```
Surah Yaseen — Full Arabic, Urdu Tarjuma, PDF & Audio | NoorIslam
Surah Al-Baqarah — Arabic, Urdu Translation, PDF & Last 2 Ayat | NoorIslam
Surah Rahman — Arabic, Tilawat, PDF & Urdu Translation | NoorIslam
Surah Al-Mulk — Full Arabic, Urdu Tarjuma & PDF | NoorIslam
Surah Al-Waqiah — Full Surah, Benefits & Urdu Translation | NoorIslam
Surah Al-Kahf — First & Last 10 Ayat, Full Surah & PDF | NoorIslam
```

### Meta Description Pattern (max 155 chars):
```
Read Surah [Name] ([Arabic]) — [X] ayahs, [Meccan/Medinan], Para [N].
Full Arabic text, Urdu tarjuma, Tafsir, PDF download & audio tilawat.
```

**Rule for ALL 114 Surahs:**
- Always include: Arabic name in brackets, ayah count, Para number, what's available
- Use Urdu words naturally where appropriate: "tarjuma", "tilawat", "shareef"

---

## PART I — COLLECTION PAGES TO BUILD

These target Collection/General keywords. Each is a real content page — NOT doorway pages.

| Slug | URL | Primary Keywords |
|---|---|---|
| `surah-manzil` | `/surahs/collections/surah-manzil` | surah manzil, surah manzil pdf |
| `panj-surah` | `/surahs/collections/panj-surah` | panj surah |
| `4-qul` | `/surahs/collections/4-qul` | 4 qul surah |
| `last-10-surahs` | `/surahs/collections/last-10-surahs` | last 10 surahs of quran |
| `short-surahs` | `/surahs/collections/short-surahs` | short surahs |
| `quran-surah-list` | `/quran/surah-list` | quran surah list, total surah in quran |

Each collection page must contain:
- Unique H1, unique intro paragraph
- List of Surahs with: name (AR + EN + UR), number, ayahs, link to full page
- Unique FAQs
- FAQPage schema
- BreadcrumbList schema
- NO copy-paste content between collections

---

## PART J — SITEMAP SYSTEM

```php
// app/Http/Controllers/SitemapController.php

public function surahs(): Response
{
    $surahs = Surah::select('slug', 'updated_at')->orderBy('number')->get();
    
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    
    foreach ($surahs as $surah) {
        $xml .= '<url>';
        $xml .= '<loc>' . route('surah.show', $surah->slug) . '</loc>';
        $xml .= '<lastmod>' . $surah->updated_at->toDateString() . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.9</priority>';
        $xml .= '</url>';
    }
    
    $xml .= '</urlset>';
    
    return response($xml, 200, ['Content-Type' => 'application/xml']);
}
```

**sitemap index:**
```xml
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <sitemap><loc>https://noorislam.com/sitemap-surahs.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-duas.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-hadiths.xml</loc></sitemap>
  <sitemap><loc>https://noorislam.com/sitemap-collections.xml</loc></sitemap>
</sitemapindex>
```

---

## PART K — ROBOTS.TXT

```
User-agent: *
Allow: /

Disallow: /admin
Disallow: /admin/*
Disallow: /api/*
Disallow: /login
Disallow: /register
Disallow: /password/*
Disallow: /storage/*

User-agent: Googlebot
Allow: /

Sitemap: https://noorislam.com/sitemap.xml
```

---

## PART L — CONTENT SEEDING STRATEGY

### Tier 1 Surahs — Seed First (highest traffic):
1. Surah Yaseen (36)
2. Surah Al-Baqarah (2)
3. Surah Ar-Rahman (55)
4. Surah Al-Mulk (67)
5. Surah Al-Waqiah (56)
6. Surah Al-Kahf (18)
7. Surah Al-Fatiha (1)
8. Surah Al-Muzammil (73)
9. Surah Al-Hashr (59)
10. Surah Maryam (19)

### Required Content Blocks Per Surah (minimum):

| block_type | Min Words | Unique? |
|---|---|---|
| `overview` | 150–300 | YES — completely unique per Surah |
| `revelation_context` | 100–200 | YES |
| `key_lessons` | 3–5 points | YES |
| `authentic_virtues` | Only if authentic hadith exists | YES |
| `name_explanation` | 50–100 | YES |

### Required FAQs Per Surah (minimum 5):
```
Q: Surah [Name] kaunse para mein hai?
Q: Surah [Name] mein kitni ayat hain?
Q: Surah [Name] Meccan hai ya Medinan?
Q: Surah [Name] padhne ke kya fayde hain? (only if authentic)
Q: Surah [Name] ka matlab kya hai?
```

### EEAT Rules for Authentic Virtues:
- ALWAYS cite: Hadith book + number (e.g., "Sahih Muslim, 1891")
- ALWAYS set `authenticity` field (sahih/hasan/daif)
- ALWAYS set `source_name` (Ibn Kathir / Maududi / Al-Nawawi etc.)
- NEVER include mawdu (fabricated) hadith
- If uncertain → use `general_knowledge` and do NOT claim hadith status

---

## PART M — QUERY FAN-OUT MAP

How ONE Surah page ranks for hundreds of queries (example: Surah Yaseen):

```
PRIMARY: surah yaseen
  ├── FORMAT MODIFIERS: + full | + pdf | + read online | + full image
  ├── LANGUAGE MODIFIERS: + urdu | + english | + arabic | + tarjuma ke sath
  ├── AUDIO MODIFIERS: + tilawat | + audio | + mp3 | + qari sudais | + dawateislami
  ├── AYAH MODIFIERS: + ayat 9 | + ayat 36
  ├── LOCATION MODIFIER: in which para is surah yaseen
  ├── INTENT: + shareef | + with mubeen | + rehman
  └── DOWNLOAD: + pdf download

→ All satisfied by ONE page at /surah/yaseen
→ Zero separate URLs needed
→ Anchor links handle specific ayah queries (#ayah-9, #ayah-36)
→ Audio section handles all recitation queries
→ Download section handles all PDF queries
→ Quick Facts handles "in which para" queries
→ FAQ section captures "featured snippet" opportunities
```

---

## PART N — INTERNAL LINKING RULES

Every Surah page must contextually link to:

1. **Previous + Next Surah** (navigation section)
2. **Related Surahs** (from surah_related_surahs table — meaningful, not random)
3. **Collection pages** the Surah belongs to (Manzil → /surahs/collections/surah-manzil)
4. **Related Duas** (from surah_wazifa table)
5. **Related Hadiths** (from hadith_surah table)
6. **Entity pages** (Prophet pages, Place pages — if they exist)
7. **/surahs** index page (always, from breadcrumb)

**RULE:** Never link randomly. Every link must have semantic relevance.
**RULE:** Maximum 100 internal links per page.
**RULE:** Use descriptive anchor text — never "click here".

---

## PART O — IMPLEMENTATION PHASES

### Phase 1 — Foundation (Week 1) — NO user-visible changes
- [ ] Run all 10 migrations
- [ ] Create all new Models
- [ ] Create SurahSeoService
- [ ] Add `<x-seo-head>` to existing layout
- [ ] Add JSON-LD schema output to layout head
- [ ] Add DB indexes
- [ ] Update SurahController with eager loading + caching

### Phase 2 — Surah Page Enhancement (Week 2)
- [ ] Create all 21 partial Blade files
- [ ] Update surahs/show.blade.php to include partials
- [ ] Fix all image alt/title/lazy-load attributes
- [ ] Implement Table of Contents with anchor links
- [ ] Add Important Ayahs anchor system (#last-2-ayat etc.)

### Phase 3 — SEO Infrastructure (Week 2-3)
- [ ] Create SitemapController + all sitemap routes
- [ ] Create robots.txt route
- [ ] Fix canonical URLs in existing seo_metas rows
- [ ] Optimize meta titles for all 114 Surahs (update DB directly)
- [ ] Optimize meta descriptions for all 114 Surahs

### Phase 4 — Content (Week 3-4)
- [ ] Seed Tier 1 (10 Surahs) content blocks via Filament/Seeder
- [ ] Seed FAQs for Tier 1 Surahs (min 5 per Surah)
- [ ] Seed Related Surahs relationships
- [ ] Seed Recitation Guides (Qari Sudais, Abdul Basit etc.)
- [ ] Seed Collection pages (surah manzil, panj surah, 4 qul, etc.)
- [ ] Seed Entity data (Prophets, Places etc.)

### Phase 5 — Collection Pages (Week 4)
- [ ] Build SurahCollectionController
- [ ] Build surahs/collection.blade.php view
- [ ] Populate 6 collection slugs with real data
- [ ] Add collection pages to sitemap

### Phase 6 — Quality & Monitoring (Week 5)
- [ ] Validate all JSON-LD via Google's Rich Results Test
- [ ] Submit sitemap.xml to Google Search Console
- [ ] Test Core Web Vitals (LCP < 2.5s, CLS < 0.1)
- [ ] Verify all 114 Surah URLs are indexed
- [ ] Fix any soft-404 or crawl errors

---

## PART P — FILAMENT ADMIN PANEL EXTENSIONS

Add these Filament 3.x resources for content management:

```
SurahContentBlockResource   — manage surah_content_blocks per Surah
                              Fields: surah (select), block_type (dropdown),
                              content_en (RichEditor), content_ur (RichEditor),
                              authenticity (select), hadith_reference, source_name,
                              sort_order (number), is_published (toggle)

SurahFaqResource            — manage surah_faqs
                              Fields: surah (select), question_en, question_ur,
                              answer_en (Textarea), answer_ur, intent_type, sort_order

SurahThemeResource          — manage surah_themes
                              Fields: surah (select), theme_title_en, theme_title_ur,
                              theme_description_en, sort_order

SurahCollectionResource     — manage surah_collections and items
                              Fields: name_en, name_ur, slug, description_en,
                              collection_type, meta_title, meta_description,
                              Related surahs (multi-select with sort)

SurahRecitationGuideResource — manage audio guides per Surah
                              Fields: surah, reciter_name_en, audio_url, style,
                              description_en, is_featured

SurahEntityResource          — manage entities (Prophets, Places etc.)
SurahSeoResource             — extend existing SeoMeta for Surahs:
                              title, meta_description, canonical_url,
                              og_image, schema_override_json (code editor)
```

---

## VERIFICATION CHECKLIST

After implementation, verify ALL of these:

### Technical SEO
- [ ] Every Surah page has unique `<title>` under 65 chars
- [ ] Every Surah page has unique `<meta description>` under 155 chars
- [ ] Every Surah page has `<link rel="canonical">`
- [ ] Every Surah page has Open Graph tags (og:title, og:description, og:image, og:type)
- [ ] Every Surah page has Twitter Card tags
- [ ] JSON-LD validates at https://validator.schema.org/ (no errors)
- [ ] FAQPage schema present for Surahs with FAQs
- [ ] BreadcrumbList schema on every Surah page
- [ ] sitemap.xml is accessible and valid
- [ ] robots.txt allows all Surah pages
- [ ] No N+1 queries (check Laravel Debugbar)
- [ ] Cache is working (second request should be faster)

### Content
- [ ] Every Tier 1 Surah has unique overview block
- [ ] Every Tier 1 Surah has minimum 5 FAQs
- [ ] No fabricated hadith in authentic_virtues blocks
- [ ] All hadith_references include book name + number
- [ ] All Surah slugs unchanged (no broken URLs)

### Keyword Coverage
- [ ] "in which para" → answered in Quick Facts section
- [ ] "pdf" keywords → Download section present with pdf_url
- [ ] "tilawat/audio" → Audio Player section present
- [ ] "last 2 ayat / last 3 ayat" → Important Ayahs with anchor IDs
- [ ] "benefits/fazilat" → Authentic Virtues section present
- [ ] Collection keywords → Collection pages at /surahs/collections/[slug]

---

## FINAL NOTES FOR THE DEVELOPER

1. **Do not change ANY existing working page** — only enhance Surah pages
2. **Every new UI element must use Bootstrap** — same classes as the rest of the site
3. **New sections must look designed, not appended** — match existing card styles, spacing, and colors exactly
4. **If a content block has no data** → hide the section entirely (use `@if` checks)
5. **The tafsirs table is empty** → either seed it or hide the tafsir tab gracefully
6. **Cache invalidation is critical** → whenever Filament saves a Surah record, flush its cache key
7. **Test on mobile first** — the majority of Islamic website users are on mobile devices
8. **Arabic text must use a proper Arabic font** — ensure the existing Arabic font is applied to all ayah text
9. **Never output raw schema JSON in page body** — only in `<head>` via `<script type="application/ld+json">`
10. **Run `php artisan optimize`** after deployment to rebuild caches

---

*This prompt was built from: full analysis of islamicwebsite.sql (38,682 lines, 50+ tables), GitHub repo structure, complete keyword file (400+ keywords across 114 Surahs + collections), and the Enterprise SEO Master document. All table names, column names, and relationships reflect the actual confirmed database schema.*
