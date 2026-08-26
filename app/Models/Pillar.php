<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pillar extends Model
{
    protected $table = 'pillars';
    public $timestamps = false;
    protected $guarded = [];

    public function scores()
    {
        return $this->hasMany(PillarScore::class, 'pillar_id', 'id');
    }

    public function yearScores()
    {
        return $this->hasMany(YearPillarScore::class, 'pillar_id', 'id');
    }
}
