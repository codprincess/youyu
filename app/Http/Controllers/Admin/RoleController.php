<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.role.create');
    }


    /**
     * @param RoleCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->only(['name','display_name']);
        if(Role::create($data)){
            return redirect()->to(route('admin.role'))->with(['status'=>'添加角色成功']);
        }
        return redirect()->to(route('admin.role'))->withErrors('系统错误');
    }

    public function show($id)
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        //dd($role);
        return view('admin.role.edit',compact('role'));

    }

    public function update(RoleUpdateRequest $request , $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->only(['name','display_name']);
        if($role->update($data)){
            return redirect()->to(route('admin.role'))->with(['status'=>'更新角色成功']);
        }
        return redirect()->to(route('admin.role'))->withErrors('系统错误');
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if(empty($ids)){
            return response()->json(['code'=>1,'msg'=>'请选择删除项']);
        }
        if(Role::destroy($ids)){
            return response()->json(['code'=>0,'msg'=>'删除成功']);
        }
        return response()->json(['code'=>1,'msg'=>'删除失败']);
    }

}
