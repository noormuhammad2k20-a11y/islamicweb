<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WazifaCategory extends Model
{
    protected $table = 'wazifa_categories';
    protected $guarded = [];

    public function wazaif()
    {
        return $this->belongsToMany(Wazifa::class, 'category_wazifa');
    }
}
