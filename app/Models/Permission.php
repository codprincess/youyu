<?php

namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    //子权限
    public function childs()
    {
        return $this->hasMany('App\Models\Permission','parent_id','id');
    }
}
