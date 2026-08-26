<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbComponent extends Model
{
    protected $table = 'db_components';
    public $timestamps = false;
    protected $guarded = [];

    public function activities()
    {
        return $this->hasMany(DbActivity::class, 'type_id', 'id');
    }
}
