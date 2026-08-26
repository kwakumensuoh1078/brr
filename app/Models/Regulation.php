<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    protected $table = 'regulation';
    public $timestamps = false;
    protected $guarded = [];

    public function org()
    {
        return $this->belongsTo(Org::class, 'agency_id', 'org_id');
    }

    public function consultationType()
    {
        return $this->belongsTo(ConsultationType::class, 'class_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function interest()
    {
        return $this->belongsTo(Interest::class, 'sector_id', 'int_id');
    }

    public function clauses()
    {
        return $this->hasMany(RegClause::class, 'regulation_id', 'id');
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class, 'regulation_id', 'id');
    }

    public function forms()
    {
        return $this->hasMany(RegulationForm::class, 'regulations_id', 'id');
    }
}
