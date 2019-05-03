<template>
    <div>
        <div class="detail-header">
            <x-header :left-options="{backText: ''}">我的订单</x-header>
        </div>
        <div>
            <div>
                <flexbox orient="vertical">
                    <flexbox-item>
                        <div class="orderItem">
                            <p><span>场地：广西师范大学羽毛球场 </span> <span class="waitPay">待支付</span><p>
                            <span>下单时间：2019-3-20 17:21 </span><span class="order-price">金额：8元</span> 
                            <p>18:00-19:00  <span>1号场</span></p>
                            <p>21:00-22:00  <span>1号场</span></p>
                        </div>
                    </flexbox-item>
                </flexbox>
                <flexbox orient="vertical">
                    <flexbox-item>
                        <div class="orderItem">
                            <p><span>场地：广西师范大学羽毛球场 </span> <span class="hasPay">待支付</span><p>
                            <span>下单时间：2019-3-20 17:21 </span><span class="order-price">金额：8元</span> 
                            <p>18:00-19:00  <span>1号场</span></p>
                            <p>21:00-22:00  <span>1号场</span></p>
                        </div>
                    </flexbox-item>
                </flexbox>
            </div>
            
        </div>
    </div>
</template>
<script>
import { XHeader,Flexbox,FlexboxItem} from 'vux'
export default {
     components: {
        XHeader,
        Flexbox,
        FlexboxItem
    },
    data(){
        return{

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
    .orderItem .waitPay{
        color :red;
        float:right;
    }
    .orderItem .hasPay{
        color :#ccc;
        float:right;
    }
    .orderItem .order-price{
        float:right;
    }
</style>


