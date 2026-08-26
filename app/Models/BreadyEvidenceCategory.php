<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreadyEvidenceCategory extends Model
{
    protected $table = 'bready_evidence_categories';
    protected $guarded = [];

    public function evidences()
    {
        return $this->hasMany(BreadyEvidence::class, 'category_id', 'id');
    }
}
