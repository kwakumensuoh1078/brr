<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityStatus extends Model
{
    protected $table = 'activity_status';
    public $timestamps = false;
    protected $guarded = [];

    public function matrix()
    {
        return $this->belongsTo(Matrix::class, 'matrix_id', 'id');
    }

    public function activity()
    {
        return $this->belongsTo(DbActivity::class, 'activity_id', 'id');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'id');
    }

    public function org()
    {
        return $this->belongsTo(Org::class, 'institution_id', 'org_id');
    }
}
