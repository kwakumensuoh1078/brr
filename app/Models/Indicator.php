<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicator';
    public $timestamps = false;
    protected $guarded = [];

    public function scores()
    {
        return $this->hasMany(IndScore::class, 'ind_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(IndValue::class, 'ind_id', 'id');
    }

    public function pillarScores()
    {
        return $this->hasMany(PillarScore::class, 'indid', 'id');
    }

    public function subPillars()
    {
        return $this->hasMany(IndPillar::class, 'indicator_id', 'id');
    }

    public function institutions()
    {
        return $this->hasManyThrough(
            Org::class,
            IndicatorInst::class,
            'indicator_id',
            'org_id',
            'id',
            'institution_id'
        );
    }

    public function matrix()
    {
        return $this->hasMany(Matrix::class, 'indicator_id', 'id');
    }
}
