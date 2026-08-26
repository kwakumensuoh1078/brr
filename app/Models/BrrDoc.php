<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrrDoc extends Model
{
    protected $table = 'brr_doc';
    public $timestamps = false;
    protected $guarded = [];

    public function categoryItem()
    {
        return $this->belongsTo(BrrCat::class, 'cat_id', 'cat_id');
    }
}
