<?php
/**
 * Created by PhpStorm.
 * User: Administratorjing
 * Date: 2019/4/1/001
 * Time: 13:49
 */

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard_name = 'web';

    protected  $table = 'admins';

    protected  $fillable =[
        'username','name', 'email', 'password','phone','uuid'
    ];

    protected $hidden = ['password', 'remember_token',];


}

