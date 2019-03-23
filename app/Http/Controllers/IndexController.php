<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers;


use App\Models\Venue;
use App\Repositories\BannerRepository;
use App\Repositories\VenueRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    // 登录跳转
    public function index()
    {
        $apiToken = \session('apiToken');
        Log::debug('apiToken is:', [$apiToken]);
        return view('home.layout', compact($apiToken));
    }

    public function home(Request $request)
    {
        $data = $request->only('city');
        if (!isset($data['city'])) {
            $venueList = (new VenueRepository)->getVenueList();
        } else {
            $venueList = (new VenueRepository)->getVenueList($data['city']);
        }

        $sessionUserInfo = \session('userInfo');
        // 场馆信息
        $bannerList = (new BannerRepository())->getBanerList();
        $userInfo = [
            'nickname' => $sessionUserInfo['nickname'] ?? '',
            'sex' => $sessionUserInfo['sex'] ?? '',
            'headimgurl' => $sessionUserInfo['headimgurl'] ?? '',
        ];
        $res = [
            'userInfo' => $userInfo,
            'bannerList' => $bannerList,
            'venueList' => $venueList
        ];
        return $this->success("获取成功", $res);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'keywords' => 'required|min:1'
        ]);
        $data = $request->only([
                'keywords',
            ]
        );
        $res = (new VenueRepository)->searchVenue($data['keywords']);
        return $this->success("获取成功", $res);
    }


    public function filter(Request $request)
    {
        $this->validate($request, [
            'filterType' => 'required|min:1',
            'filterValue' => 'required|min:1'
        ]);
        $data = $request->only([
                'filterType',
                'filterValue',
            ]
        );
        $res = [];
        switch ($data['filterType']) {
            case 'district':
                $res = (new VenueRepository)->filterVenue($data['filterType'], $data['filterValue']);
                break;
            default:
                return $this->fail("参数错误", []);
        }
        return $this->success("获取成功", $res);
    }
}