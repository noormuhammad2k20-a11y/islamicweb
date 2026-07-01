<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dua extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(DuaCategory::class, 'dua_dua_category');
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
