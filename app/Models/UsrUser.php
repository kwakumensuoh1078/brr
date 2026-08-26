<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsrUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'usr_users';
    public $timestamps = false;
    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
