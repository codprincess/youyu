<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Repositories\VenueRepository;
use Illuminate\Http\Request;

class VenueController extends Controller
{

    /** 获取场馆详情api
     * @param Request $request
     * @param Venue $venue
     * @return array
     */
    public function venueDetail(Request $request, Venue $venue)
    {

        $venueDetail = (new VenueRepository())->getVenueDetail($venue);
        return $this->success("获取成功", $venueDetail);
    }

    /**
     * 获取场馆场次api
     * @param Request $request
     * @param Venue $venue
     * @return array
     */
    public function venueTimeList(Request $request, Venue $venue)
    {
        $data = $request->only('date');
        if (!isset($data['date'])) {
            $data['date'] = date('Y-m-d');
        }
        $data = (new VenueRepository())->getVenueTimeList($venue, $data['date']);

        return $this->success("获取成功", $data);
    }
}