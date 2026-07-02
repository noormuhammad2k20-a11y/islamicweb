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
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(HadithTopic::class, 'topic_id');
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
}
