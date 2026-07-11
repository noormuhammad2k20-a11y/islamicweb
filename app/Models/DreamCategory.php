<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DreamCategory extends Model
{
    protected $table = 'dream_categories';
    protected $guarded = [];

    public function dreamSymbols()
    {
        return $this->hasMany(DreamSymbol::class, 'category_id');
    }
}
