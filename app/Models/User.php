<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function venues()
    {
        return $this->hasMany("App\Models\Venue");
    }

    public function orders()
    {
        return $this->hasMany("App\Models\Order");
    }
}
