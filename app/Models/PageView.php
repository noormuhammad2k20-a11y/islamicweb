<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $casts = [
        'date' => 'date',
    ];

    public static function track(string $url, string $type = null): void
    {
        static::updateOrCreate(
            ['page_url' => $url, 'date' => now()->toDateString()],
            ['page_type' => $type]
        )->increment('views');
    }
}
