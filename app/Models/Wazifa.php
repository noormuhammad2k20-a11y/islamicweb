<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wazifa extends Model
{
    protected $table = 'wazaif';
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeAuthentic($query)
    {
        return $query->where('is_authentic', 1);
    }

    public function scopeQuranic($query)
    {
        return $query->whereHas('surahs')
                     ->orWhere('book_name', 'like', '%Quran%');
    }

    public function scopeHadith($query)
    {
        return $query->whereHas('hadiths')
                     ->orWhereNotNull('hadith_number');
    }

    public function scopePopular($query)
    {
        return $query->orderByDesc('views_count');
    }

    public function categories()
    {
        return $this->belongsToMany(WazifaCategory::class, 'category_wazifa');
    }

    public function duas()
    {
        return $this->belongsToMany(Dua::class, 'dua_wazifa');
    }

    public function surahs()
    {
        return $this->belongsToMany(Surah::class, 'surah_wazifa');
    }

    public function hadiths()
    {
        return $this->belongsToMany(Hadith::class, 'hadith_wazifa');
    }
}
