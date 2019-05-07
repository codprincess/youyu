<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\Role;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{


    public function index()
    {
        return view('admin.user.index');
    }

    public function data(Request $request)
    {
        $model = Admin::query();
        if($request->get('name')){
            $model = $model->where('name','like','%'.$request->get('name').'%');
        }
        $res = $model->orderBy('created_at','desc')->paginate($request->get('limit',30))->toArray();
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => $res['total'],
            'data'  => $res['data']
        ];
        return response()->json($data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(AdminCreateRequest $request)
    {
        $data = $request->all();
       // dd($data);
        $data['uuid'] = Uuid::uuid();
        $data['password'] = bcrypt($data['password']);
        if(Admin::create($data)){
            return redirect()->to(route('admin.user'))->with(['status'=>'添加成功']);
        }
        return redirect()->to(route('admin.user'))->withErrors('系统出错啦');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        //dd($admin);
        return view('admin.user.edit',compact('admin'));
    }

    public function update( AdminUpdateRequest $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->except('password');
        if($request->get('password')){
            $data['password'] = bcrypt($request->get('password'));
        }
        if($admin->update($data)){
            return redirect()->to(route('admin.user'))->with(['status'=>'更新成功啦']);
        }

        return redirect()->to(route('admin.user'))->withErrors('哎呀，出错啦');
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if(empty($ids)){
            return response()->json([
                'code'=>'1',
                'msg'=>'请选择删除项'
            ]);
        }
        if(Admin::destroy($ids)){
            return response()->json([
               'code' => '0',
               'msg' => '删除成功啦'
            ]);
        }
        return response()->json([
            'code'=>'1',
            'msg'=>'哎呀，删除失败'
        ]);
    }


    /**
     * 分配角色
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::get();
        $hasRoles = $admin->roles();
        foreach ($roles as $role){
            $role->own = $admin->hasRole($role)?true:false;
        }

        return view('admin.user.role',compact('roles','admin'));
    }

    /**
     * 更新角色
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignRole(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $roles = $request->get('roles',[]);
        if($admin->syncRoles($roles)){
            return redirect()->to(route('admin.user'))->with(['status'=>'更新用户角色成功']);
        }
        return redirect()->to(route('admin.user'))->withErrors('系统错误');
    }


    /**
     * 分配权限
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $permissions = $this->tree();
        foreach ($permissions as $key1 => $item1){
            $permissions[$key1]['own'] = $admin->hasDirectPermission($item1['id']) ? 'checked' : false ;
            if (isset($item1['_child'])){
                foreach ($item1['_child'] as $key2 => $item2){
                    $permissions[$key1]['_child'][$key2]['own'] = $admin->hasDirectPermission($item2['id']) ? 'checked' : false ;
                    if (isset($item2['_child'])){
                        foreach ($item2['_child'] as $key3 => $item3){
                            $permissions[$key1]['_child'][$key2]['_child'][$key3]['own'] = $admin->hasDirectPermission($item3['id']) ? 'checked' : false ;
                        }
                    }
                }
            }
        }
        return view('admin.user.permission',compact('admin','permissions'));
    }

    public function assignPermission(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $permissions = $request->get('permissions');

        if (empty($permissions)){
            $admin->permissions()->detach();
            return redirect()->to(route('admin.user'))->with(['status'=>'已更新用户直接权限']);
        }
        $admin->syncPermissions($permissions);
        return redirect()->to(route('admin.user'))->with(['status'=>'已更新用户直接权限']);
    }







}
