<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NameCategory extends Model
{
    protected $table = 'name_categories';
    protected $guarded = [];

    public function islamicNames()
    {
        return $this->belongsToMany(IslamicName::class, 'islamic_name_name_category');
    }
}
