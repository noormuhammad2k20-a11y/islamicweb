<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityIslamicContent extends Model
{
    protected $table = 'city_islamic_content';

    protected $guarded = [];

    protected $casts = [
        'famous_mosques' => 'array',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
