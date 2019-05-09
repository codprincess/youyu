<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Http\Services\Pay\PayService;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PayController extends Controller
{
    private $appId = '';
    private $appKey = '';
    private $notifyUrl = '';
    private $mchId;
    private $mchKey;

    public function __construct()
    {
        $this->appId = env("WECHAT_APPID");
        $this->appKey = env("WECHAT_SECRET");
        $this->mchId = env("WECHAT_MCHID");
        $this->mchKey = env("WECHAT_MCHKEY");
        $this->notifyUrl = urlencode($_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . '/wx/pay/notify');
    }

    /**
     * 统一下单
     * @param Order $order
     * @return array
     */
    public function unifiedOrder(Order $order)
    {
        $user = Auth::guard('api')->user();
        if ($user->id != $order->user_id) {
            $this->fail("订单不存在", []);
        }
        // 查询订单价格
        $openid = $user->openid;
//        $totalFee = $order->total_amount;
        $totalFee = 1;
        $outTradeNo = $order->order_no;
        $orderName = "订场";
        $notifyUrl = $this->notifyUrl;
        Log::info("notifyUrl is ",[$notifyUrl]);
        $data = (new PayService($this->mchId, $this->appId, $this->appKey, $this->mchKey))
            ->unifiedOrder($openid, $totalFee, $outTradeNo, $orderName, $notifyUrl);
        return $this->success("下单成功", $data);
    }

    public function payOrder($postArr)
    {
        $order = Order::where('order_no', $postArr['out_trade_no'])
            ->first()
            ->toArray();
        if (count($order) == 0) {
            Log::error("订单支付失败，订单不存在", [
                'postObj' => $postArr,
                'order' => $order,
            ]);
            return false;
        }
        if ($order['total_amount'] != $postArr['total_fee']) {
            Log::error("订单支付失败，金额错误", [
                'postObj' => $postArr,
                'order' => $order,
            ]);
            return false;
        }

        // 改变订单状态
        $order->status = 2;
        $order->save();
        return true;
    }

    /**
     * 微信支付回调通知
     * @return string
     */
    public function notify()
    {
        Log::info('notify ok');
        $postStr = file_get_contents('php://input');
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($postObj === false) {
            Log::error('parse xml error');
            die('parse xml error');
        }
        if ($postObj->return_code != 'SUCCESS') {
            Log::error($postObj->return_msg);
            die($postObj->return_msg);
        }
        if ($postObj->result_code != 'SUCCESS') {
            Log::error($postObj->err_code);
            die($postObj->err_code);
        }
        $arr = (array)$postObj;
        unset($arr['sign']);
        if (self::getSign($arr, $this->mchKey) == $postObj->sign) {
            // 改变订单状态
            if ($this->payOrder($arr)) {
                Log::info("pay success", $arr);
                return '<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
            }
        }else{
            Log::error("pay sign error", $arr);
        }
    }

    /**
     * 获取签名
     */
    public static function getSign($params, $key)
    {
        ksort($params, SORT_STRING);
        $unSignParaString = self::formatQueryParaMap($params, false);
        $signStr = strtoupper(md5($unSignParaString . "&key=" . $key));
        return $signStr;
    }

    protected static function formatQueryParaMap($paraMap, $urlEncode = false)
    {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if (null != $v && "null" != $v) {
                if ($urlEncode) {
                    $v = urlencode($v);
                }
                $buff .= $k . "=" . $v . "&";
            }
        }
        $reqPar = '';
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff) - 1);
        }
        return $reqPar;
    }

}