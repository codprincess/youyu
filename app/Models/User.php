<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;

class User extends Authentication
{
    use  Notifiable;
    protected $guarded = [];

    public function venues()
    {
        return $this->hasMany("App\Models\Venue");
    }

    public function orders()
    {
        return $this->hasMany("App\Models\Order");
    }
}
