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
use App\Models\VenuePlace;
use App\Models\VenueTime;
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
            'venue_id' => 'required|string:max:255|min:2',
            'date' => 'required|string:max:255|min:2',
            'start_at' => 'required|string:max:64|min:2',
            'end_at' => 'required|string:max:64|min:2',
        ]);

        if ($validator->fails()) {
            return $this->success('失败啦', $validator->errors()->first());
        }
        $data = $request->only(['venue_id','date','start_at','end_at']);
        // dd($data);

        $venuePlaceList = VenuePlace::where('venue_id',$data['venue_id'])->get();
        dd($venuePlaceList);
        foreach ($venuePlaceList as $k=>$venuePlace) {
            $venueTimeListData[] = [
                'place_id' =>$venuePlace['id'],
                'venue_id' =>$data['venue_id'],
                'date' =>$data['date'],
                'start_hour' =>date("H",$data['start_at']),
                'start_minute' =>date("i",$data['start_at']),
                'end_hour' =>date("H",$data['end_at']),
                'end_minute' =>date("i",$data['end_at']),
            ];
        }
        if (count($venueTimeListData) > 0) {
            VenueTime::insert($venueTimeListData);
        }
        return $this->success('创建成功', $venueTimeListData);
    }

    public function update(Request $request, Venue $venue)
    {
        dd($venue);
    }
}