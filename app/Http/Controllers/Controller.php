<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
//    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userInfo = [];

    public function checkAuth()
    {
        if (!Session::has('userInfo')) {
            Log::debug('checkAuth is fail');
            return redirect("auth");
        }
    }
}
