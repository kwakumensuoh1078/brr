<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    protected $table = 'poll_answers';
    public $timestamps = false;
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(PollQuestion::class, 'question_id', 'id');
    }
}
