<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name','redirect_uri','picture_uri'
    ];
}
