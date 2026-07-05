<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $guarded = [];

    public function metaable()
    {
        return $this->morphTo();
    }
}

