<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.member.index');
    }

    public function data(Request $request)
    {
        $model = User::query();

        if ($request->get('nickname')){
            $model = $model->where('nickname','like','%'.$request->get('nickname').'%');
        }

        $res = $model->orderBy('created_at','desc')->paginate($request->get('limit',30))->toArray();
        $data = [
            'code'=>0,
            'msg'=>'正在请求中...',
            'count'=>$res['total'],
            'data'=>$res['data']
        ];
        return response()->json($data);
    }
}
