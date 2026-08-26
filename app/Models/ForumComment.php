<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $table = 'forum_comments';
    public $timestamps = false;
    protected $guarded = [];

    public function topic()
    {
        return $this->belongsTo(ForumTopic::class, 'topic_id', 'id');
    }
}
