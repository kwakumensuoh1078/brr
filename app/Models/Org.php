<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    protected $table = 'org';
    protected $primaryKey = 'org_id';
    public $timestamps = false;
    protected $guarded = [];

    public function regulations()
    {
        return $this->hasMany(Regulation::class, 'agency_id', 'org_id');
    }

    public function officers()
    {
        return $this->hasMany(Officer::class, 'org_id', 'org_id');
    }

    public function activities()
    {
        return $this->hasMany(ActivityStatus::class, 'institution_id', 'org_id');
    }
}
