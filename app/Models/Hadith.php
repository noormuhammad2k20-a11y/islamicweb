<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hadith extends Model
{
    protected $fillable = [
        'topic_id',
        'arabic_text',
        'english_translation',
        'urdu_translation',
        'reference',
        'grade',
        'slug',
        'book_name',
        'chapter',
        'narrator',
        'explanation',
        'key_lessons',
        'tags',
        'related_duas',
        'keywords',
        'narrator_id',
        'collection_id',
        'chapter_number',
        'grade_explanation',
        'practical_applications',
        'benefits',
        'hadith_book_id',
        'hadith_chapter_id'
    ];

    public function topics(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(HadithTopic::class, 'hadith_hadith_topic');
    }

    public function narratorModel(): BelongsTo
    {
        return $this->belongsTo(HadithNarrator::class, 'narrator_id');
    }

    public function collectionModel(): BelongsTo
    {
        return $this->belongsTo(HadithCollection::class, 'collection_id');
    }

    public function wazaif()
    {
        return $this->belongsToMany(Wazifa::class, 'hadith_wazifa');
    }

    public function keywords()
    {
        return $this->belongsToMany(HadithKeyword::class, 'hadith_hadith_keyword');
    }

    public function ayahs()
    {
        return $this->belongsToMany(Ayah::class, 'ayah_hadith');
    }

    public function surahs()
    {
        return $this->belongsToMany(Surah::class, 'hadith_surah');
    }

    public function relatedHadiths()
    {
        return $this->belongsToMany(Hadith::class, 'related_hadiths', 'hadith_id', 'related_hadith_id');
    }

    public function books()
    {
        return $this->belongsToMany(HadithBook::class, 'hadith_hadith_book');
    }

    public function chapters()
    {
        return $this->belongsToMany(HadithChapter::class, 'hadith_hadith_chapter');
    }

    public function hadithKeywords()
    {
        return $this->belongsToMany(HadithKeyword::class, 'hadith_hadith_keyword');
    }
}
