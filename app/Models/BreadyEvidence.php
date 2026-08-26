<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreadyEvidence extends Model
{
    protected $table = 'bready_evidence';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(BreadyEvidenceCategory::class, 'category_id', 'id');
    }
}
