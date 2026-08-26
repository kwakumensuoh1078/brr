<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbActivity extends Model
{
    protected $table = 'db_activity';
    public $timestamps = false;
    protected $guarded = [];

    public function component()
    {
        return $this->belongsTo(DbComponent::class, 'type_id', 'id');
    }
}
