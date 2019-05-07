<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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

    public function data(Request $request)
    {
        $model = $request->get('model');
        switch (strtolower($model)){
            case 'admin':
                $query = new Admin();
                break;
            case 'role':
                $query = new Role();
                break;
            case 'permission':
                $query = new Permission();
                $query = $query->where('parent_id', $request->get('parent_id', 0));
                break;
            default:
                $query = new Admin();
                break;
        }

        $res = $query->paginate($request->get('limit',30))->toArray();

        $data = [
          'code'=>0,
          'msg'=>'请求数据中...',
          'count'=>$res['total'],
          'data'=>$res['data']
        ];

        return response()->json($data);
    }
}
