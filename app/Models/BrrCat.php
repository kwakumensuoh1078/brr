<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrrCat extends Model
{
    protected $table = 'brr_cat';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(BrrDoc::class, 'cat_id', 'cat_id');
    }
}
