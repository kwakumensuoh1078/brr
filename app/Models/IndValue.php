<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndValue extends Model
{
    protected $table = 'ind_values';
    public $timestamps = false;
    protected $guarded = [];

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'ind_id', 'id');
    }
}
