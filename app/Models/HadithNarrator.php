<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HadithNarrator extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'biography',
        'slug',
        'birth',
        'death',
        'status',
        'companion'
    ];

    public function hadiths(): HasMany
    {
        return $this->hasMany(Hadith::class, 'narrator_id');
    }
}
