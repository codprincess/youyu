<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Venue;
use App\Models\VenueTime;
use App\Repositories\VenueRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 常见场次订单api
     * @param Request $request
     * @param Venue $venue
     * @return array
     */
    public function orderCreate(Request $request, Venue $venue)
    {
        // 创建订单
        $validator = \Validator::make($request->all(), [
            'venueTimeIds' => 'required|string:max:64|min:1',
        ]);

        if ($validator->fails()) {
            return $this->success('参数错误', $validator->errors()->first());
        }
        $data = $request->only(['venueTimeIds']);

        $venueTimeIdList = explode(',', \request('venueTimeIds'));
        $isLock = VenueTime::whereIn('id', $venueTimeIdList)->Where('status', 1)->get(['id'])->toArray();
        if (count($isLock) != count($venueTimeIdList)) {
            return $this->fail('预定失败,该场次已被被人预定,请返回重新选场', []);
        }
        $totalAmount = VenueTime::whereIn('id', $venueTimeIdList)->sum('price');
        $insertData = [
            'user_id' => Auth::guard('api')->id() ?? 0,
            'venue_id' => $venue->id,
            'order_name' =>$venue->name,
            'order_no' => $this->createOrderSn(),
            'venue_time_ids' => $data['venueTimeIds'],
            'total_amount' => $totalAmount,
            'status' => 1,
        ];
        DB::beginTransaction();
        try {
            // 创建订单
            $venue = Order::create($insertData);
            // 更新场次状态
            VenueTime::whereIn('id', $venueTimeIdList)->update(['status' => 0]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

        }
        return $this->success('创建成功', $venue);
    }


}