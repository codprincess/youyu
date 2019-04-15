<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Repositories\VenueRepository;
use Illuminate\Http\Request;

class VenueTimeController extends Controller
{
    public function create()
    {
        return view('admin.venues.addvenuetime');
    }
    public function store(Request $request)    {
        // 创建场馆
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string:max:255|min:2',
            'district' => 'required|string:max:20|min:2',
            'status' => 'required|int',
            'description' => 'required|string|min:5',
            'province' => 'required|string:max:32',
            'city' => 'required|string:max:20|min:2',
            'street' => 'required|string:max:20|min:2',
//            'cover_uri' => 'required|string:max:255|min:2',
            'start_at' => 'required|string:max:64|min:2',
            'end_at' => 'required|string:max:64|min:2',
            'phone' => 'required|string:max:32|min:2',
            'venue_place_list' => 'required|string:max:255|min:2',  // 1号场
        ]);

        if ($validator->fails()) {
            return $this->success('失败啦', $validator->errors()->first());
        }
        $data = $request->only(['name', 'district', 'status', 'description', 'province', 'city', 'street', 'cover_uri', 'start_at', 'end_at', 'phone',]);
        // dd($data);

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
        return $this->success('创建成功', $venue);
    }

    public function update(Request $request, Venue $venue)
    {
        dd($venue);
    }
}