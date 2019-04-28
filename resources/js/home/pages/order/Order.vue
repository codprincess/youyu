<template>
    <div>
         <div class="header">
            <div class="header-left">
                <div @click="back" class="iconfont back-icon">&#xe624;</div>
            </div>
            <div class="header-right">我的订单</div>
        </div>
        <div class="orderList">
            <div class="orderItem">
                <p><span>场地：广西师范大学羽毛球场 </span> <span class="waitPay">待支付</span><p>
                <span>下单时间：2019-3-20 17:21 </span><span >金额：8元</span> 
                <p>18:00-19:00  <span>1号场</span></p>
                <p>21:00-22:00  <span>1号场</span></p>
            </div>
             <div class="orderItem">
                <p><span>场地：广西师范大学羽毛球场 </span> <span class="hasPay" >已完成</span><p>
                <span>下单时间：2019-3-20 17:21 </span><span style="float:right">金额：8元</span> 
                <p>18:00-19:00  <span>1号场</span></p>
                <p>21:00-22:00  <span>1号场</span></p>
            </div>
             <div class="orderItem">
                <p><span>场地：广西师范大学羽毛球场 </span> <span class="waitPay">待支付</span><p>
                <span>下单时间：2019-3-20 17:21 </span><span style="float:right">金额：8元</span> 
                <p>18:00-19:00  <span>1号场</span></p>
                <p>21:00-22:00  <span>1号场</span></p>
            </div>
             <div class="orderItem">
                <p><span>场地：广西师范大学羽毛球场 </span> <span class="waitPay">待支付</span><p>
                <span>下单时间：2019-3-20 17:21 </span><span style="float:right">金额：8元</span> 
                <p>18:00-19:00  <span>1号场</span></p>
                <p>21:00-22:00  <span>1号场</span></p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    methods:{
        back(){
            this.$router.push({path:'/'})
        }
    }

}
</script>
<style lang="stylus" scoped>

  .header
    display: flex
    line-height: .86rem
    background: #00bcd4
    color: #fff
    .header-left
      width: .64rem
      float: left
      .back-icon
        text-align: center
        font-size: .4rem
    .header-right
      min-width: 1.04rem
      padding: 0 .1rem
      float: right
      text-align: center
      color: #fff
      font-size .32rem
      .arrow-icon
        margin-left: -.04rem
        font-size: .24rem
  .orderList
     height:1000vh
     padding:10px 5% 10px 5%
     .orderItem
        font-size:.32rem
        padding:20px 5% 10px 5%
        border :1px solid #cccccc
        margin-top :10px
        margin-bottom :10px
        p
            font-size:.32rem
            line-height :30px
        .waitPay
          color :red
          float:right
        .hasPay
           color :#ccc
           float:right
</style>
