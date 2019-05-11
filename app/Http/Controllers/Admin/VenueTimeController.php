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
    public function create(Request $request)
    {

        return view('admin.venues.addvenuetime', [
            'venue_id' => $request->get('venue_id')
        ]);
    }

    public function store(Request $request)
    {
        // 创建场馆
        $validator = \Validator::make($request->all(), [
            'venue_id' => 'required|string:max:255|min:2',
            'date' => 'required|string:max:255|min:2',
            'price' => 'required',
            'hour' => 'required|string:max:64|min:2',
        ]);

        if ($validator->fails()) {
            return $this->success('失败啦', $validator->errors()->first());
        }
        $data = $request->only(['venue_id', 'date', 'hour', 'price']);
        // dd($data);
        $hourArr = explode(" - ", $data['hour']);
        $startHourArr = explode(":", $hourArr[0]);
        $endHourArr = explode(":", $hourArr[1]);
        $venuePlaceList = VenuePlace::where('venue_id', $data['venue_id'])->get();
        $venueTimeListData = [];
        foreach ($venuePlaceList as $k => $venuePlace) {
            $venueTimeListData[] = [
                'place_id' => $venuePlace['id'],
                'venue_id' => $data['venue_id'],
                'price' => $data['price'],
                'date' => $data['date'],
                'start_hour' => $startHourArr[0],
                'start_minute' => $startHourArr[1],
                'end_hour' => date("H", $endHourArr[0]),
                'end_minute' => date("i", $endHourArr[1]),
            ];
        }
        if (count($venueTimeListData) > 0) {

            VenueTime::insert($venueTimeListData);
        }
        return redirect()->to(route('admin.venues'))->with(['status' => '添加场次成功']);
    }

    public function update(Request $request, Venue $venue)
    {
        dd($venue);
    }
}