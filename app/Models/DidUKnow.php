<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DidUKnow extends Model
{
    protected $table = 'did_u_knows';
    public $timestamps = false;
    protected $guarded = [];

    public function org()
    {
        return $this->belongsTo(Org::class, 'org_id', 'org_id');
    }
}
