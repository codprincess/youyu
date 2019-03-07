<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $appId = '';
    private $secret = '';
    private $redirectUri = '';
    private $scope = '';
    private $state = '';

    public function __construct()
    {
        $this->appId = env("WECHAT_APPID");
        $this->secret = env("WECHAT_SECRET");
        $this->redirectUri = '/user/access_token';
        $this->scope = 'snsapi_userinfo';
        $this->state = rand(100000, 999999);
    }

    /**
     * 获取code
     */
    public function getCode(Request $request)
    {
        $uri = sprintf('https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=%s&state=%s#wechat_redirect',
            $this->appId,
            urlencode($request->url() . $this->redirectUri),
            $this->scope,
            $this->state
        );
        return redirect($uri);
    }

    /**
     * 获取accessToken
     * @param Request $request
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken(Request $request)
    {
        $uri = sprintf('https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code',
            $this->appId,
            $this->secret,
            $request->get('code')
        );
        $client = new Client();
        $res = $client->request('GET', $uri);
        $data = json_decode((string)$res->getBody(), true);
        Log::debug('response body is', $data);
        $this->getUserInfo($data["access_token"], $data["openid"]);
    }

    /**
     * 获取用户信息
     * @param $accessToken
     * @param $openid
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserInfo($accessToken, $openid)
    {
        $uri = sprintf('https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=zh_CN',
            $accessToken,
            $openid
        );
        $client = new Client();
        $res = $client->request('GET', $uri);
        $data = json_decode((string)$res->getBody(), true);
        Log::debug('response body is ', $data);
        // 判断是否新用户

        // 创建用户

        // 返回用户信息给客户端
        //
        return $data;
    }
}
