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

    /**
     * @param RoleUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleUpdateRequest $request , $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->only(['name','display_name']);
        if($role->update($data)){
            return redirect()->to(route('admin.role'))->with(['status'=>'更新角色成功']);
        }
        return redirect()->to(route('admin.role'))->withErrors('系统错误');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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


    /**
     * 分配权限
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $permissions = $this->tree();
       // dd($permissions);
        foreach ($permissions as $key1 => $item1){
            $permissions[$key1]['own'] = $role->hasPermissionTo($item1['id']) ? 'checked' : false ;
            if (isset($item1['_child'])){
                foreach ($item1['_child'] as $key2 => $item2){
                    $permissions[$key1]['_child'][$key2]['own'] = $role->hasPermissionTo($item2['id']) ? 'checked' : false ;
                    if (isset($item2['_child'])){
                        foreach ($item2['_child'] as $key3 => $item3){
                            $permissions[$key1]['_child'][$key2]['_child'][$key3]['own'] = $role->hasPermissionTo($item3['id']) ? 'checked' : false ;
                        }
                    }
                }
            }

        }
        return view('admin.role.permission',compact('role','permissions'));
    }

    /**
     * 存储权限
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignPermission(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->get('permissions');

        if (empty($permissions)){
            $role->permissions()->detach();
            return redirect()->to(route('admin.role'))->with(['status'=>'已更新角色权限']);
        }
        $role->syncPermissions($permissions);
        return redirect()->to(route('admin.role'))->with(['status'=>'已更新角色权限']);
    }

}
