<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'procedures';
    public $timestamps = false;
    protected $guarded = [];

    public function regulation()
    {
        return $this->belongsTo(Regulation::class, 'regulation_id', 'id');
    }
}
