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

    public function scopeByPurpose($query, $purpose)
    {
        return $query->where('purpose', 'like', "%{$purpose}%");
    }
}
