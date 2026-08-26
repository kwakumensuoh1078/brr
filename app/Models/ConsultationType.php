<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationType extends Model
{
    protected $table = 'consultation_type';
    public $timestamps = false;
    protected $guarded = [];

    public function regulations()
    {
        return $this->hasMany(Regulation::class, 'class_id', 'id');
    }
}
