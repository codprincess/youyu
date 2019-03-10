<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-8
 * Time: 下午11:01
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}