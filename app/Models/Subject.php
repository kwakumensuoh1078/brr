<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    public $timestamps = false;
    protected $guarded = [];

    public function regulations()
    {
        return $this->hasMany(Regulation::class, 'subject_id', 'id');
    }
}
