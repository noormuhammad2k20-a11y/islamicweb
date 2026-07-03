<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrayerCalcMethod extends Model
{
    protected $guarded = [];

    protected $casts = [
        'params' => 'json',
        'is_default_for_region' => 'boolean',
    ];
}
