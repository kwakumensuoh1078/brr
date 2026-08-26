<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $table = 'officer';
    public $timestamps = false;
    protected $guarded = [];

    public function org()
    {
        return $this->belongsTo(Org::class, 'org_id', 'org_id');
    }

    public function consultations()
    {
        return $this->hasMany(ConsultationDetails::class, 'posted_by', 'id');
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->fName} {$this->sName} {$this->oName}");
    }
}
