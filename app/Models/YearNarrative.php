<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearNarrative extends Model
{
    protected $table = 'year_narrative';
    public $timestamps = false;

    protected $fillable = [
        'year',
        'general',
    ];
}
