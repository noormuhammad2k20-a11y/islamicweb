<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicEvent extends Model
{
    protected $guarded = [];

    public function hijriMonth()
    {
        return $this->belongsTo(HijriMonth::class);
    }
}

