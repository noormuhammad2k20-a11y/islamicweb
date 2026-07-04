<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicMonthContent extends Model
{
    protected $table = 'islamic_month_content';

    protected $guarded = [];

    protected $casts = [
        'important_dates' => 'array',
    ];
}
