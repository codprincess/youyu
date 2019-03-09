<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userInfo = [];

    public function checkAuth(Request $request)
    {
        if ($request->session()->has('userInfo')) {
            // 微信授权
            var_dump(session("userInfo"));
            $this->userInfo = $request->session()->get('userInfo');
        }else{
            var_dump("6666");
            return redirect("auth");
        }
    }
}
