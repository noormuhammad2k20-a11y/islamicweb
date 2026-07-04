<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicYearEvent extends Model
{
    protected $guarded = [];

    protected $casts = [
        'gregorian_date' => 'date',
    ];

    public function scopeForYear($query, int $year)
    {
        return $query->where('gregorian_year', $year)->orderBy('gregorian_date');
    }
}
