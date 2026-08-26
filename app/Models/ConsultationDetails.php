<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationDetails extends Model
{
    protected $table = 'consultation_details';
    public $timestamps = false;
    protected $guarded = [];

    public function officer()
    {
        return $this->belongsTo(Officer::class, 'posted_by', 'id');
    }

    public function responses()
    {
        return $this->hasMany(ConsultationResponse::class, 'consult_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(ConsultationAttachment::class, 'cons_details_id', 'id');
    }

    public function views()
    {
        return $this->hasMany(ViewTb::class, 'consult_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(LikesTb::class, 'consult_id', 'id');
    }
}
