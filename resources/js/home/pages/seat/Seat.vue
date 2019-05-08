<template>
    <div>
        <!--下单页面-->
        <div v-show="!hasOrder">
            <div class="detail-header">
                <x-header :left-options="{backText: ''}">选择场次</x-header>
            </div>
            <div style="height:110vh">
                <div style="height:555px;">
                    <tab :line-width=2 active-color='#fc378c' v-model="index">
                        <!--                    <tab-item class="vux-center" :selected="demo2 === item" v-for="(item, index) in list2" @click="demo2 = item" :key="index">-->
                        <!--                        {{item.date}}-->
                        <!--                         &lt;!&ndash; <span style="font-size:12px;">30场可订</span> &ndash;&gt;-->
                        <!--                    </tab-item>-->
                        <tab-item class="vux-center" :selected="demo2 === item.date" v-for="(item, index) in list2" @click="demo2 = item.date" :key="index">
                            {{item.date}}
                            <!-- <span style="font-size:12px;">30场可订</span> -->
                        </tab-item>
                    </tab>
                    <div class="data-box">
                        <flexbox orient="vertical" :gutter="0">
                            <flexbox-item v-for="(item,index) in dataTime" :key="index">
                                <div class="timeItem">{{item}}</div>
                            </flexbox-item>
                        </flexbox>
                    </div>
                    <div class="seats-slider">
                        <div class="room">
                            <flexbox>
                                <flexbox-item v-for="(item,index) in placeList" :key="index"><div class="room-item">{{item.name}}</div></flexbox-item>
                                <!--                            <flexbox-item><div class="room-item">2</div></flexbox-item>-->
                                <!--                            <flexbox-item><div class="room-item">3</div></flexbox-item>-->
                                <!--                            <flexbox-item><div class="room-item">4</div></flexbox-item>-->
                                <!--                            <flexbox-item><div class="room-item">5</div></flexbox-item>-->
                                <!--                            <flexbox-item><div class="room-item">6</div></flexbox-item>-->
                                <!--                            <flexbox-item><div class="room-item">7</div></flexbox-item>-->
                                <!--                            <flexbox-item><div class="room-item">8</div></flexbox-item>-->
                            </flexbox>
                        </div>
                        <swiper class="seat-swiper" v-model="index" style="height:489px;" :show-dots="false">
                            <swiper-item v-for="(item, index) in list2" :key="index">
                                <div class="tab-swiper vux-center" >
                                    <div class="roomList">
                                        <!-- {{item}} -->
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats2" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>

                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats3" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats4" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats3" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats4" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats3" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats4" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats3" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>
                                        <grid :cols="8" :show-lr-borders="false">
                                            <grid-item  @click.native="seatSel($event,seat)" v-for="(seat,index) in seats4" :key="index"  :class='[{nosel : seat.status == 0},{sel : seat.status == 1},{yessel : seat.status == 2}]'>
                                                <span class="grid-center" style="font-size:12px;">￥{{seat.price}}</span>
                                            </grid-item>
                                        </grid>

                                    </div>
                                </div>
                            </swiper-item>
                        </swiper>
                    </div>

                </div>
                <div class="pay-box">
                    <flexbox>
                        <flexbox-item :span="5">
                            <div class="all-money">订金金额<span style="color:#00bcd4">￥0</span></div>
                        </flexbox-item>
                        <flexbox-item :span="3">
                            <div class="money-des">费用明细</div>
                        </flexbox-item>
                        <flexbox-item >
                            <div class="pay">
                                <x-button mini type="primary" @click.native="payComfirm()">下一步</x-button>
                            </div>
                        </flexbox-item>
                    </flexbox>
                </div>
            </div>
        </div>

        <!--确认订单-->
        <div v-show="hasOrder">
            <div class="detail-header">
                <x-header :left-options="{backText: ''}">确认订单</x-header>
            </div>
            <div class="order-box">
                <div class="order-list">
                    <ul style="padding-inline-start: 20px;">
                        <h4 style="margin-block-start: 1em;margin-block-end: .5em;">天空运动城</h4>
                        <li>运动类型：<span>羽毛球</span></li>
                        <li>预定日期：<span>2019-05-06</span></li>
                        <li>预定场次：<span>1号场 11：00-12：00</span></li>
                        <li>预定场次：<span>1号场 11：00-12：00</span></li>
                        <li>预定场次：<span>1号场 11：00-12：00</span></li>
                        <li>总金额：<span>￥6</span></li>
                    </ul>
                </div>
                <div class="order-desc">
                    <ul style="padding-inline-start: 20px;">
                        <h4 style="margin-block-start: 1em;margin-block-end: .5em;">预定须知</h4>
                        <li>1.当您提交订单后，请在10分钟内支付，否则订单会自动取消</li>
                        <li>2.您所定场次出售后离开始时间五个内不可退订</li>
                        <li>3.当您使用场馆时，请遵守场馆相关规定。同时，在您运动时请注意自身以及他人的安全</li>
                    </ul>
                </div>
                <div class="pay-box" style="position:absolute;bottom:0;width:100%;height:100px;">
                    <flexbox>
                        <flexbox-item :span="5">
                            <div class="all-money">订金金额<span style="color:#00bcd4">￥0</span></div>
                        </flexbox-item>
                        <flexbox-item :span="3">
                            <div class="money-des">费用明细</div>
                        </flexbox-item>
                        <flexbox-item >
                            <div class="pay">
                                <x-button mini type="primary">去支付</x-button>
                            </div>
                        </flexbox-item>
                    </flexbox>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import { XHeader,Tab,TabItem,Swiper, SwiperItem, Flexbox,FlexboxItem,Grid, GridItem, XButton} from 'vux'
import axios from 'axios'
export default {
    components: {
        XHeader,
        Tab,
        Swiper,
        SwiperItem,
        TabItem,
        Flexbox,
        FlexboxItem,
        Grid, 
        GridItem,
        XButton,
    },
    data(){
        return{
            hasOrder:false,
            index: 0,
            placeList:[],
            list2: [],
            demo2: '05-05',
            dataTime:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00'],
            seats:[
            {
                Id: "05010102", 
                price: "6",  
                name: "1号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                Id: "05010102", 
                price: "6", 
                name: "2号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6",  
                name: "3号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                Id: "05010102", 
                price: "7",  
                name: "4号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                extId: "05010102", 
                price: "8",  
                name: "5号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "3", 
                name: "6号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "5", 
                name: "7号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "6", 
                name: "8号", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },

            ] ,
            seats2:[
            {
                Id: "05010102", 
                price: "6",  
                name: "1号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6", 
                name: "2号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6",  
                name: "3号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                Id: "05010102", 
                price: "7",  
                name: "4号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                extId: "05010102", 
                price: "8",  
                name: "5号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "3", 
                name: "6号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "5", 
                name: "7号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "6", 
                name: "8号", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },

            ] ,
             seats3:[
            {
                Id: "05010102", 
                price: "6",  
                name: "1号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6", 
                name: "2号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6",  
                name: "3号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                Id: "05010102", 
                price: "7",  
                name: "4号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                extId: "05010102", 
                price: "8",  
                name: "5号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "3", 
                name: "6号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "5", 
                name: "7号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "6", 
                name: "8号", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },

            ] ,
             seats4:[
            {
                Id: "05010102", 
                price: "6",  
                name: "1号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6", 
                name: "2号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                
            },
            {
                Id: "05010102", 
                price: "6",  
                name: "3号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                Id: "05010102", 
                price: "7",  
                name: "4号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "0", 
                
            },
            {
                extId: "05010102", 
                price: "8",  
                name: "5号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "3", 
                name: "6号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "5", 
                name: "7号", 
                rowName: "1", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },
            {
                extId: "05010102", 
                price: "6", 
                name: "8号", 
                seatId: "05010102", 
                status: "1", 
                topPx: "30"
            },

            ] ,
            selSeats:[],//选择的场地

        }
    },
    created(){
        this.getPlaceListInfo();
    },

    methods:{
        //获取场地信息
        getPlaceListInfo(){
            axios.get('/api/venue/'+this.$route.params.id+'/timeList').then(response=>{
               // console.log(response);
                if(response){
                    this.list2 = response.data.data.dateList;
                    // console.log(this.list2);
                    this.dateTimeList = response.data.data.dateTimeList;
                    console.log(this.dateTimeList);
                    this.placeList = response.data.data.placeList;
                    this.seatsList = response.data.data.dateTimeList[0];
                    console.log('11111',this.seatsList)

                }
            }).catch(err=>{
                console.log(err);
            })
        },
        seatSel(event,seat){
            console.log('111111');
            //选座，status==1是可以选择的，0是已售，2是已经选择
            if(seat.status == 0){
                return;
            }
            if(seat.status == 1){
                seat.status = 2;
                console.log(seat.status);
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

        //支付
        payComfirm(){
            console.log('11111111');
            this.hasOrder = true;
            // if(this.selMoney){
            //
            // }
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
    .data-box{
        width: 16%;
        height: auto;
        border: 1px solid #cccccc;
        float: left;
        background-color: #eee;
        padding-top: 5px;
    }
    .seats-slider .vux-slider {
        overflow: hidden;
        position: relative;
        width: 82%;
        float: left;
        top: 25px;
    }
    .timeItem{
        height: 36px;
        /* border: 1px red solid; */
        line-height: 45px;
        margin-left: 6%;
        font-size: 12px;
    }
    .room{
        height: 25px;
        border: 1px #eee solid;
        width: 83%;
        margin-left: 16%;
        position: absolute;
    }
    .room-item{
        text-align: center;
        font-size: 14px;
        height: 25px;
        line-height: 2;
        font-size: 12px;
    }
    .vux-tab-ink-bar {
        position: absolute;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #00bcd4 !important;
        text-align: center;
    }
    .weui-grid {
        padding: 8px 10px !important;
        text-align: center;
    }
    .weui-grids {
        position: relative;
        overflow: hidden;
        border-right: 1px #eee solid;
    }
    .nosel{
        background-color: #cccccc;
        color: #ffffff;
    }
    .sel{
        /* background-color: #ffffff; */
        color: #00bcd4;
    }
    .yessel{
        background-color: #00bcd4;
        color: #ffffff;
    }
    .demo1-item {
        border-right: 1px solid #ececec;
        padding: 10px 9px;
        font-size: 12px;
    }
    .demo1-item-selected {
        background-color: #00bcd4;
        color: #ffffff;
    }
    .seat-swiper > .vux-swiper {
        overflow: hidden;
        position: relative;
        height: 489px !important;
    }
    .pay-box{
        width: 100%;
        height: 48px;
        border: 1px #cccccc solid;
        line-height: 48px；
    }
    .pay-box .all-money{
        height: 48px;
        line-height: 48px;
        font-size: 14px;
        margin-left: 6%;
    }
    .pay-box .money-des{
        font-size: 12px;
    }
    .pay-box .pay{
        height: 48px;
        line-height: 48px;
        background-color: #00bcd4;
        text-align: center;
    }
    .pay-box .weui-btn_primary {
        background-color: #00bcd4 !important;
    }
    .pay-box .weui-btn {
        position: relative;
        display: block;
        font-size: 18px;
        text-align: center;
        text-decoration: none;
        color: #FFFFFF;
        line-height: 2.7;
        overflow: hidden;
    }
    .weui-btn:after {
        content: " ";
        width: 200%;
        height: 200%;
        position: absolute;
        top: 0;
        left: 0;
        border: none !important;
        -webkit-transform: scale(0.5);
        transform: scale(0.5);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
        -webkit-box-sizing: border-box;
    }
    .vux-tab .vux-tab-item.vux-tab-selected {
        color: #00bcd4 !important;
        border-bottom: 3px solid #00bcd4 !important;
    }
    .scrollable .vux-tab-ink-bar {
        bottom: 17px;
        position: absolute;
        background: #00bcd4 !important;
    }

    /*确认订单*/

    .order-box{
        width: 100%;
    }
    .order-box .order-list{
        height: auto;
        border-bottom: #cccccc 1px dotted;
        /* padding:0px 5%; */
    }
    .order-box .order-list ul li{
        list-style: none;
        height: 25px;
        font-size: 14px;
    }
    .order-box .order-desc{
        list-style: none;
        padding-right:20px;
        border-bottom: #cccccc 1px dotted;
    }
    .order-box .order-desc ul li{
        list-style: none;
        font-size: 14px;
        line-height: 30px;
        word-break : break-all;
        word-wrap: break-word;
        display: block;
    }
</style>

