<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorInst extends Model
{
    protected $table = 'indicator_inst';
    public $timestamps = false;
    protected $guarded = [];

    public function org()
    {
        return $this->belongsTo(Org::class, 'institution_id', 'org_id');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'id');
    }
}
