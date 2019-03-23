<template>
    <div>
        <div class="header">
            <div class="header-left">
                <div @click="back" class="iconfont back-icon">&#xe624;</div>
            </div>
            <div class="header-right">广西师范大学羽毛球场</div>
        </div>
        <div class="tiem-slot">
            <span>今天</span>
            <span style="margin-left:2%;margin-right:2%;">03-20</span>
            <span>9:00-10:00</span>
        </div>
        <div class="choice">
           <span><img src="../../assets/images/yessel.png" width="20px" height="20px"/>可选</span>
           <span class="selspan"><img src="../../assets/images/hassel.png" width="20px" height="20px"/>已售</span>
           <span><img src="../../assets/images/sel.png" width="20px" height="20px"/>已选</span>
        </div>

        <div class="seat-box">
           
            <div 
            @click='seatSel($event,seat)' 
            v-for="(seat,index) in seats" 
            :key="index" 
            :class='[{hassel : seat.status == 0},{yessel : seat.status == 1},{sel : seat.status == 2}]'
            class="seats-item yessel">
                <p class="seat-number">{{seat.name}}</p>
            </div>
            
        </div>
        <div class="buyDetail" v-show='selMoney' :selSeats='selSeats'>
            <div class="totalPrice">
                <p style="float:left;font-size:.32rem;margin-top:5px;">订场成功后即可</p>
                <p style="float:right;font-size:.32rem;">总金额：<span style="color:red;font-size:.4rem;margin-right:5px;">￥{{selMoney}}</span>元</p>
            </div>
            <Button @click="WechatPay" class="submitBtn" type="success">确认订场</Button>
        </div>
    </div>
</template>
<script>
  export default{
     data(){
       return{
        isShowBuyDetail:false,
        selMoney:0,//选场的全部钱数
        selSeats:[],//选择的场地
        onePrice:8,//单场的钱数
        seats:[
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "1号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "2号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "3号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "4号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "5号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "6号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "7号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "8号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                flag: "0", 
                leftPx: "60", 
                name: "9号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            }


        ] 
       }
     },
     methods:{
        back(){
             this.$router.go(-1);
        },

        seatSel(event,seat){
            //console.log(seat);
            //选座，status==1是可以选择的，0是已售，2是已经选择
            if(seat.status == 0){
                return;
            }
            if(seat.status == 1){
                seat.status = 2;
                //console.log(seat.status);
                this.selSeats.push(seat.name);
                console.log(this.selSeats);
                //金额
                this.selMoney += this.onePrice;
            }else{
                seat.status = 1;
                //从数组中删除某个元素
                for(var i=0;i<this.selSeats.length;i++){
                    if(this.selSeats[i] == seat.name){
                        this.selSeats.splice(i,1);
                        break;
                    }
                }
                //金额
                 this.selMoney -= this.onePrice;
            }
        },
        //支付模块
        WechatPay(){
            console.log('111111');
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
  .tiem-slot
      height :40px
      border-bottom :1px solid #ccc
      line-height: 40px
      padding-left :3%
      font-size: .32rem
  .choice
     height :60px
     width :100%
     text-align :center
     line-height :60px
     .selspan
        margin-left :5%
        margin-right :5%
  .seat-box
     width:100%
     padding:10px 5% 10px 12%
     height :auto
     overflow:hidden
     text-align: center
     .seats-item
        height :35px
        width :35px
        line-height :35px
        font-size :.30rem
        float: left
        margin:5px 10px 30px 10px
        position: relative
        .seat-number{
            position :absolute
            top:30px;
            right :0px
            left :0px
        }
     .yessel
        background:url('../../assets/images/yessel.png') no-repeat left center
        background-size :cover
     .hassel
        background:url('../../assets/images/hassel.png') no-repeat left center
        background-size :cover
     .sel
        background:url('../../assets/images/sel.png') no-repeat left center
        background-size :cover
  .buyDetail
     position :fixed
     left :0px
     bottom 0px
     width:100%
     height:120px
     z-index:9999
     
     .totalPrice
        padding:20px 10% 20px 10%
        height:60px
     .submitBtn
        margin-left :10%
        width:80%
        background :#00bcd4
        height 40px
        font-size 0.32rem

</style>

