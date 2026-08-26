<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegClause extends Model
{
    protected $table = 'reg_clauses';
    public $timestamps = false;
    protected $guarded = [];

    public function regulation()
    {
        return $this->belongsTo(Regulation::class, 'regulation_id', 'id');
    }
}
