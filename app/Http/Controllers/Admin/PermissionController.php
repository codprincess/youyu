<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index');
    }

    public function create()
    {
        $permissions = $this->tree();
        //dd($permissions);
        return view('admin.permission.create',compact('permissions'));
    }

    public function store(PermissionCreateRequest $request)
    {
        $data = $request->all();
        //dd($data);
        if(Permission::create($data)){
            return redirect()->to(route('admin.permission'))->with(['status'=>'添加成功']);
        }
        return redirect()->to(route('admin.permission'))->withErrors('系统错误了');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $permissions = $this->tree();
        return view('admin.permission.edit',compact('permission','permissions'));
    }

    public function update(PermissionUpdateRequest $request,$id)
    {
        $permission = Permission::findOrFail($id);
        $data = $request->all();
        if($permission->update($data)){
            return redirect()->to(route('admin.permission'))->with(['status'=>'更新权限成功']);
        }
        return redirect()->to(route('admin.permission'))->withErrors('系统错误');
    }


}
