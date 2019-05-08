<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VenueRequest;
use App\Models\Venue;
use App\Models\VenuePlace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{



    public function index()
    {
        return view('admin.venues.index');
    }

    public function create(Request $request)
    {
        // 创建场地

        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        // 创建场馆
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string:max:255|min:2',
            'district' => 'required|string:max:20|min:2',
            'status' => 'required|int',
            'description' => 'required|string|min:5',
            'province' => 'required|string:max:32',
            'city' => 'required|string:max:20|min:2',
            'street' => 'required|string:max:20|min:2',
            'cover_uri' => 'required|string:max:255|min:2',
            'start_at' => 'required|string:max:64|min:2',
            'end_at' => 'required|string:max:64|min:2',
            'phone' => 'required|string:max:32|min:2',
            'venue_place_list' => 'required|string:max:255|min:2',  // 1号场
        ]);

        if ($validator->fails()) {
            return $this->success('失败啦', $validator->errors()->first());
        }
        $data = $request->only(['name', 'district', 'status', 'description', 'province', 'city', 'street', 'cover_uri', 'start_at', 'end_at', 'phone',]);
        $venuePlaceList = explode(',', \request('venue_place_list'));
        $venuePlaceListData = [];
        $venue = Venue::create($data);
        //dd($venue);
        foreach ($venuePlaceList as $k=>$venuePlace) {
            $venuePlaceListData[] = [
                'name' => $venuePlace,
                'weight' => $k,
                'venue_id' => $venue->id,
            ];
        }
        if (count($venuePlaceListData) > 0) {
            VenuePlace::insert($venuePlaceListData);
        }
        if($venue){
            return redirect()->to(route('admin.venues'))->with(['status'=>'添加场馆成功']);
        }
        return redirect()->to(route('admin.venues'))->withErrors('系统出错了');
        //return $this->success('创建成功');
    }

//    public function show($id)
//    {
//
//    }

    public function edit($id)
    {
        $venueList = Venue::findOrFail($id);
        if(!$venueList){
            return redirect(route('admin.venues'))->withErrors(['status'=>'哎呀，场馆不存在']);
        }
        return view('admin.venues.edit',compact('venueList'));
    }

    public function update(VenueRequest $request,$id)
    {
        $venueList = Venue::findOrFail($id);
        $data = $request->only(['name', 'district', 'status', 'description', 'province', 'city', 'street', 'cover_uri', 'start_at', 'end_at', 'phone',]);

        if($venueList->update($data)){
            return redirect(route('admin.venues'))->with(['status'=>'更新成功']);
        }
        return redirect(route('admin.venues'))->withErrors(['status'=>'哎呀，更新失败了']);
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if(empty($ids)){
            return response()->json(['code'=>1,'msg'=>'请选择删除项']);
        }

        if(Venue::destroy($ids)){
            return response()->json(['code'=>0,'msg'=>'删除成功']);
        }
        return response()->json(['code'=>1,'msg'=>'删除失败']);
    }


    public function data(Request $request)
    {
        $model = Venue::query();
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


}
