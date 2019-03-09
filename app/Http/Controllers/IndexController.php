<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        // 场馆信息
        dd($this->userInfo);
    }
}