<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    protected $table = 'forum_topic';
    public $timestamps = false;
    protected $guarded = [];

    public function interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id', 'int_id');
    }

    public function comments()
    {
        return $this->hasMany(ForumComment::class, 'topic_id', 'id');
    }
}
