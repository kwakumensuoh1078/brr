<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationForm extends Model
{
    protected $table = 'forms';
    public $timestamps = false;
    protected $guarded = [];

    public function regulation()
    {
        return $this->belongsTo(Regulation::class, 'regulations_id', 'id');
    }
}
