<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        return view('admin.user.edit');
    }

    public function update($id)
    {

    }

    public function destroy()
    {

    }

}
