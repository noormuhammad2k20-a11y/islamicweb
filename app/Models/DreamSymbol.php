<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DreamSymbol extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePopular($query)
    {
        return $query->orderByDesc('search_count');
    }
}
