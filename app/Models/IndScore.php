<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndScore extends Model
{
    protected $table = 'ind_score';
    public $timestamps = false;
    protected $guarded = [];

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'ind_id', 'id');
    }
}
