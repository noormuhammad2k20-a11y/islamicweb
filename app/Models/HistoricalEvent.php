<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalEvent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'hijri_day',
        'hijri_month',
        'hijri_year',
        'title',
        'description',
        'source_note',
    ];
}
