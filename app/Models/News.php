<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    protected $guarded = [];

    public function officer()
    {
        return $this->belongsTo(Officer::class, 'posted_by', 'id');
    }

    public function org()
    {
        return $this->belongsTo(Org::class, 'institution_id', 'org_id');
    }

    public function pubCat()
    {
        return $this->belongsTo(PublicationCat::class, 'pub_cat', 'id');
    }

    public function sector()
    {
        return $this->belongsTo(Interest::class, 'sector_id', 'int_id');
    }
}
