<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoonPhase extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
        'phase_angle' => 'float',
        'illumination_pct' => 'float',
        'is_crescent_visible' => 'boolean',
    ];
}
