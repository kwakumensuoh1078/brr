<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikesTb extends Model
{
    protected $table = 'likes_tb';
    public $timestamps = false;
    protected $guarded = [];

    public function consultation()
    {
        return $this->belongsTo(ConsultationDetails::class, 'consult_id', 'id');
    }
}
