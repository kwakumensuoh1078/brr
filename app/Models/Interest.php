<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interest';
    protected $primaryKey = 'int_id';
    public $timestamps = false;
    protected $guarded = [];

    public function regulations()
    {
        return $this->hasMany(Regulation::class, 'sector_id', 'int_id');
    }
}
