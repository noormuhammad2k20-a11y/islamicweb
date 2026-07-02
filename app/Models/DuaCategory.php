<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuaCategory extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];

    public function duas()
    {
        return $this->belongsToMany(Dua::class, 'dua_dua_category');
    }

    public function parent()
    {
        return $this->belongsTo(DuaCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(DuaCategory::class, 'parent_id');
    }
}
