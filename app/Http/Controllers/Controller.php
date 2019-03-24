<?php

namespace App\Http\Controllers;

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


}
