<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationResponse extends Model
{
    protected $table = 'consultation_response';
    public $timestamps = false;
    protected $guarded = [];

    public function consultation()
    {
        return $this->belongsTo(ConsultationDetails::class, 'consult_id', 'id');
    }
}
