<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearPillarScore extends Model
{
    protected $table = 'year_pillar_score';
    public $timestamps = false;
    protected $guarded = [];

    public function pillar()
    {
        return $this->belongsTo(Pillar::class, 'pillar_id', 'id');
    }
}
