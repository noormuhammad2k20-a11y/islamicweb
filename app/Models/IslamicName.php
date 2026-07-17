<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicName extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(NameCategory::class, 'islamic_name_name_category');
    }

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }
}
