<template>
    <div>
        <div class="detail-header">
            <x-header :left-options="{backText: ''}">我的订单</x-header>
        </div>
        <div>
            <div>
                <flexbox orient="vertical" v-for="(item,index) in orderLists" :key="index">
                    <flexbox-item>
                        <div class="orderItem">
                            <p>
                                <span>场地：{{item.order_name}} </span>
                                <span v-if="item.status === 1" class="waitPay">
                                    <x-button mini type="primary"  @click.native="payComfirm(item.id)">待支付</x-button>
                                </span>
                                <span v-else class="hasPay">已支付</span>
                            <p>
                            <span>下单时间：{{item.created_at}} </span><span class="order-price">金额：{{item.total_amount}}元</span>
                            <p>18:00-19:00  <span>{{item.venue_time_ids}}号场</span></p>
<!--                            <p>21:00-22:00  <span>1号场</span></p>-->
                        </div>
                    </flexbox-item>
                </flexbox>
<!--                <flexbox orient="vertical">-->
<!--                    <flexbox-item>-->
<!--                        <div class="orderItem">-->
<!--                            <p><span>场地：广西师范大学羽毛球场 </span> <span class="hasPay">待支付</span><p>-->
<!--                            <p><span>下单时间：2019-3-20 17:21 </span><span class="order-price">金额：8元</span></p>-->
<!--                            <p>18:00-19:00  <span>1号场</span></p>-->
<!--                            <p>21:00-22:00  <span>1号场</span></p>-->
<!--                        </div>-->
<!--                    </flexbox-item>-->
<!--                </flexbox>-->
            </div>
            
        </div>
    </div>
</template>
<script>
import { XHeader,Flexbox,FlexboxItem,XButton} from 'vux'
import axios from 'axios'
export default {
     components: {
        XHeader,
        Flexbox,
        FlexboxItem,
         XButton
    },
    data(){
        return{
            orderLists:[],
        }
    },
    created(){
         this.getOrderList();
    },
    methods:{
         getOrderList(){
             axios.get('/api/orderList').then(response=>{
                 console.log(response);
                 if (response){
                    this.orderLists = response.data.data;
                 }
             })
         },
        //支付
        payComfirm(id){
             console.log(id);
             this.order_id = id;
             if(this.order_id){
                 axios.post('/api/wx/pay/unifiedOrder/'+this.order_id).then(response=>{
                     console.log(response);
                     if (response){
                         console.log(response.data.data.appId);
                         function onBridgeReady(){
                             WeixinJSBridge.invoke(
                                 'getBrandWCPayRequest', {
                                     "appId":response.data.data.appId,     //公众号名称，由商户传入
                                     "timeStamp":response.data.data.timeStamp,      //时间戳，自1970年以来的秒数
                                     "nonceStr":response.data.data.nonceStr, //随机串
                                     "package":response.data.data.package,
                                     "signType":response.data.data.signType,         //微信签名方式：
                                     "paySign":response.data.data.paySign //微信签名
                                 },
                                 function(res){
                                     if(res.err_msg == "get_brand_wcpay_request:ok" ){
                                         console.log('ok')
                                         this.hasOrder = false;
                                         this.$router.push('/order');
                                         // 使用以上方式判断前端返回,微信团队郑重提示：
                                         //res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
                                     }
                                 });
                         }
                         if (typeof WeixinJSBridge == "undefined"){
                             if( document.addEventListener ){
                                 document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                             }else if (document.attachEvent){
                                 document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                                 document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                             }
                         }else{
                             onBridgeReady();
                         }

                     }else {
                         console.log('获取支付信息失败，请重试')
                     }
                 }).catch(err=>{
                     console.log(err);
                 })
             }else {
                 this.$vux.toast.text('您的订单可能出现异常', 'top')
             }
        }
    }
}
</script>
<style>
    .vux-header {
        position: relative;
        padding: 3px 0;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        background-color: #00bcd4 !important;
    }
    .orderItem{
        min-height: 120px;
        border-bottom: 1px #eeeeee solid;
        padding:5px 5% 5px 5%;
        font-size: 12px;
    }
    .orderItem p{
        line-height: 25px;
    }
    .orderItem .waitPay{
        color :red;
        float:right;
        margin-top: -10px;
    }
    .orderItem .waitPay .weui-btn_primary {
        background-color: #00bcd4 !important;
    }
    .orderItem .waitPay .weui-btn_mini {
        display: inline-block;
        padding: 0 .32em;
        line-height: 2.3;
        font-size: 13px;
    }
    .orderItem .hasPay{
        color :#ccc;
        float:right;
    }
    .orderItem .order-price{
        float:right;
    }
</style>


