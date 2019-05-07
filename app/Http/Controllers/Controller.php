<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message, $data)
    {
        return [
            "code" => 0,
            "message" => $message,
            "data" => $data,
        ];
    }

    public function fail($message, $data)
    {
        return [
            "code" => 1,
            "message" => $message,
            "data" => $data,
        ];
    }

    public function createOrderSn()
    {
        return date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

    }

    /**
     * 处理权限分类的
     */
    public function tree($list = [],$pk = 'id',$pid = 'parent_id',$child = 'child',$root = 0)
    {
        if (empty($list)){
            $list = Permission::get()->toArray();
        }

        //创建tree
        $tree = array();
        if(is_array($list)){
            //创建基于主键的数组引用
            $refer = array();
            foreach($list as $key => $data){
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key =>$data){
                //判断是否存在parent
                $parentId = $data[$pid];
                if($root == $parentId){
                    $tree[] =& $list[$key];
                }else{
                    if(isset($refer[$parentId])){
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }


}
