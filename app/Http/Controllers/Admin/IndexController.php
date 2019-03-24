<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function layout()
    {
        return view('admin.layout');
    }
    public function index()
    {
        return view('admin.index.index');
    }
    public function index1()
    {
        return view('admin.index.index1');
    }
    public function index2()
    {
        return view('admin.index.index2');
    }
}
