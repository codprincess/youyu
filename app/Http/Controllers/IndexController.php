<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __construct(Request $request)
    {
    }

    public function index(Request $request)
    {
        Session::put("tt", "78787878");
        Session::save();
//        $this->checkAuth($request);
        if (!Session::has('userInfo')) {
            Log::debug('checkAuth is fail');
            return redirect("auth");
        }
        // 场馆信息
        var_dump($this->userInfo);
        var_dump(session("userInfo"));
    }
}