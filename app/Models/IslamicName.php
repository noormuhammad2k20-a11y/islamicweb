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

    // ✅ DEFAULT SCOPE — Sirf active names show karo
    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('status', 'active');
        });
    }

    // Scope for admin panel (all names)
    public function scopeWithInactive($query)
    {
        return $query->withoutGlobalScope('active');
    }

    // Scope for boys
    public function scopeMale($query)
    {
        return $query->where('gender', 'male');
    }

    // Scope for girls
    public function scopeFemale($query)
    {
        return $query->where('gender', 'female');
    }

    // Scope for Quranic names
    public function scopeQuranic($query)
    {
        return $query->where('is_quranic', 1);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
