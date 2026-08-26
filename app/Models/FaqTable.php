<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTable extends Model
{
    protected $table = 'faqs_table';
    public $timestamps = false;
    protected $guarded = [];

    public function interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id', 'int_id');
    }

    public function consultation()
    {
        return $this->belongsTo(ConsultationDetails::class, 'consult_id', 'id');
    }
}
