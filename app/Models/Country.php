<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'countries_id';
    public $timestamps = false;
    protected $guarded = [];
}
