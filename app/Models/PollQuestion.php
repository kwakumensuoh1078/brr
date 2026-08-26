<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollQuestion extends Model
{
    protected $table = 'poll_question';
    public $timestamps = false;
    protected $guarded = [];

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(PollAnswer::class, 'question_id', 'id');
    }
}
