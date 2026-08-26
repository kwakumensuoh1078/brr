<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    protected $table = 'matrix';
    public $timestamps = false;
    protected $guarded = [];

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'id');
    }

    public function activityStatuses()
    {
        return $this->hasMany(ActivityStatus::class, 'matrix_id', 'id');
    }
}
