<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QiblaData extends Model
{
    protected $table = 'qibla_data';
    protected $guarded = [];

    protected $casts = [
        'qibla_direction' => 'float',
        'distance_to_kaaba_km' => 'float',
        'calculated_at' => 'datetime',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
