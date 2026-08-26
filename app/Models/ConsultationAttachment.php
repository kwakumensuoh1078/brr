<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationAttachment extends Model
{
    protected $table = 'consultation_attachment';
    public $timestamps = false;
    protected $guarded = [];

    public function consultation()
    {
        return $this->belongsTo(ConsultationDetails::class, 'cons_details_id', 'id');
    }
}
