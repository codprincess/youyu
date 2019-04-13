<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('admin.login.login');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * 登录成功跳转
     */
    public function redirectTo()
    {
        return route('admin.layout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect(route('admin.login'));
    }

    protected function guard()
    {
        return Auth::guard();
    }


}
