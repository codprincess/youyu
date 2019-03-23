<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class WeChatAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('userInfo')) {
            Log::debug('checkAuth is fail:', Session::all());
            header('Location:' . url("auth"));
//            return redirect(url("auth"));
        } else {
            Log::debug('session userInfo  is :', \session('userInfo'));
            return $next($request);
        }

    }
}
