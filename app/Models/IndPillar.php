<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndPillar extends Model
{
    protected $table = 'ind_pillar';
    public $timestamps = false;
    protected $guarded = [];

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'id');
    }
}
