<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return redirect("auth");
        if ($request->session()->has('userInfo')) {
            // 微信授权
            var_dump(session("userInfo"));
            $this->userInfo = $request->session()->get('userInfo');
        }else{
            var_dump("6666");
            redirect("auth");
        }
        // 场馆信息
        var_dump($this->userInfo);
        var_dump(session("userInfo"));
    }
}