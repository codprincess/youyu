<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController
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
        $this->redirectUri = '/login';
        $this->scope = 'snsapi_userinfo';
        $this->state = rand(100000, 999999);
    }

    /**
     * 获取code
     */
    public function auth()
    {
        $uri = sprintf('https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=%s&state=%s#wechat_redirect',
            $this->appId,
            urlencode($_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . $this->redirectUri),
            $this->scope,
            $this->state
        );
        return redirect($uri);
    }


    /**
     * 获取accessToken
     * @param Request $request
     * @return mixed
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
        Log::debug('session tt  is==================', \session("tt"));
        $this->getUserInfo($data["access_token"], $data["openid"]);

        return redirect("/");
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

        // 跳转回首页
        $userInfo = User::updateOrCreate(
            [
                'openid' => $data['openid']
            ],
            [
                'nickname' => $data['nickname'],
                'sex' => $data['sex'],
                'language' => $data['language'],
                'city' => $data['city'],
                'province' => $data['province'],
                'country' => $data['country'],
                'headimgurl' => $data['headimgurl'],
                'created_at' => date('Y-m-d H:i:s')
            ]
        )->toArray();
        // 设置session
        \session("userInfo", $userInfo);
        // 跳转回首页
    }

}
