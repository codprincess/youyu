<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-8
 * Time: 下午11:01
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VenueTime extends Model
{
    protected $guarded = [];
    protected $table = 'venue_time';

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}