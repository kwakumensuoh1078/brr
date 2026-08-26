<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';
    public $timestamps = false;
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(PollQuestion::class, 'poll_id', 'id');
    }

    public function votes()
    {
        return $this->hasMany(PollVote::class, 'poll_id', 'id');
    }
}
