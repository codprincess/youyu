<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
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

}
