<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function data(Request $request)
    {
        $model = Order::query();
        if($request->get('order_no')){
            $model = $model->where('order_no','like','%'.$request->get('order_no').'%');
        }

        $res = $model->orderBy('created_at','desc')
                 ->paginate($request->get('limit',30))
                 ->toArray();
        $data = [
            'code' => 0,
            'msg'  => '正在请求中....',
            'count'=>$res['total'],
            'data' =>$res['data']
        ];

        return response()->json($data);

    }

}
