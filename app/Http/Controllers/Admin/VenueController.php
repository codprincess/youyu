<?php

namespace App\Http\Controllers\Admin;

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
            'venue_place_list' => 'required|string:max:255|min:2',
        ]);

        if ($validator->fails()) {
            return $this->success('失败啦', $validator->errors()->first());
        }
        $data = $request->only(['name', 'district', 'status', 'description', 'province', 'city', 'street', 'cover_uri', 'start_at', 'end_at', 'phone',]);

        // TODO:上传图片

//        if (!empty($request->input('cover_uri'))) {
//            $data['cover_uri'] = preg_replace("/storage(\/.+)/m", '${1}', $request->get('cover_uri'));
//        }
        $venuePlaceList = explode(',', \request('venue_place_list'));
        $venuePlaceListData = [];
        $venue = Venue::create($data);
        foreach ($venuePlaceList as $venuePlace) {
            $venuePlaceListData[] = [
                'name' => $venuePlace,
                'venue_id' => $venue->id,
            ];
        }
        if (count($venuePlaceListData) > 0) {
            VenuePlace::insert($venuePlaceListData);
        }
        return $this->success('创建成功', $venue);
    }

    public function edit($id)
    {
        return view('admin.venues.edit');
    }

    public function update(Request $request, Venue $venue)
    {

    }

    public function destroy()
    {

    }

}
