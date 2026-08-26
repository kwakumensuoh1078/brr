<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollVote extends Model
{
    protected $table = 'polls_vote';
    public $timestamps = false;
    protected $guarded = [];

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id', 'id');
    }
}
