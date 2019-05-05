<template>
    <div>
        <div id="allmap"></div>
        <div class="header">
            <div class="header-left">
                <search
                    v-model="value"
                    ref="search">
                </search>
            </div>
            <div class="header-right">
                <keep-alive>
                   <router-link tag="span" to="/city" class="address-choose-content" style="font-size:12px;"  >{{cityName}}
                    </router-link>
                </keep-alive>
            </div>
        </div>
        <div class="swiper-wrapper">
           <swiper :aspect-ratio="300/800"  auto>
               <swiper-item class="swiper-demo-img" v-for="(item, index) in imgList" :key="index"><img :src="item"></swiper-item>
           </swiper>
        </div>
        <div class="ven-wrapper">
            <div class="line">
                热门球场
            </div>
            <div class="venList-box">
                 <flexbox :gutter="0" wrap="wrap">
                    <flexbox-item :span="1/2" v-for="(item,index) in list" :key="index">
                        <router-link to="/detail">
                            <div class="venItem" >
                                <div class="item-pic" >
                                    <img alt="图片" :src="item.cover_uri"/>
                                    <div class="item-name">{{item.name}}</div>
                                </div>
                                <div class="item-info">
                                    <div class="item-address">
                                        <div style="padding-left:4%;float:left;width: 60%;">{{item.street}}</div>
                                        <span >天气：晴</span>
                                    </div>
                                    <div class="item-price">
                                        <div style="padding-left:4%;float:left;width: 60%;">总/空：6/3</div>
                                        <span style="color:#00bcd4">￥{{item.score}}起</span>
                                    </div>
                                </div>
                                
                            </div>
                        </router-link>
                       
                    </flexbox-item>
                </flexbox>
            </div>
           
        </div>

    </div>
</template>
<script>
import { Search ,Swiper,SwiperItem, Flexbox,FlexboxItem,} from 'vux'
import axios from 'axios'
export default {
    components:{
        Search,
        Swiper,
        SwiperItem,
        Flexbox,
        FlexboxItem,
    },
    //props: [ 'cityName','shouldChangeCity'],
    mounted() {
       // console.log( this.cityName);
        this.$nextTick(() => {
            this.baiduLocation();
        });
    },

    data(){
       return{
             cityName: '桂林',
             shouldChangeCity: true,
            // results: [],
            value: '输入场馆名称',
           //https://youyu.aicode.site/
            imgList: [
                // 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2728642449,2819884282&fm=27&gp=0.jpg',
                // 'http://www.gxljcollege.cn/__local/0/9E/B2/453545B2429FA0C68415CF8AA3E_04DD257C_A9B5E.png?e=.png',
                // 'http://www.gxljcollege.cn/__local/0/9E/B2/453545B2429FA0C68415CF8AA3E_04DD257C_A9B5E.png?e=.png'
            ],
             list: [
                 //{
            //     id:1,
            //     src: 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2728642449,2819884282&fm=27&gp=0.jpg',
            //     title: '师范大学体育中心',
            //     price:3,
            //     address: '七星区育才路',
            //
            // }, {
            //     id:2,
            //     src: 'https://youyu.aicode.site/storage/190428/u17bsJTiBg7zpQ4xCUp8yazQKzUzDwNbps13P7ts.jpeg',
            //     title: '大学体育中心',
            //     price:4,
            //     address: '七星区育才路',
            // },
            // {
            //     id:3,
            //     src: 'http://www.gxljcollege.cn/__local/0/9E/B2/453545B2429FA0C68415CF8AA3E_04DD257C_A9B5E.png?e=.png',
            //     title: '师范大学2',
            //     price:4,
            //     address: '七星区育才路2',
            // },
            // {
            //     id:1,
            //     src: 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2728642449,2819884282&fm=27&gp=0.jpg',
            //     title: '师范大学体育中心',
            //     price:3,
            //     address: '七星区育才路',
            //
            // }, {
            //     id:2,
            //     src: 'https://youyu.aicode.site/storage/190428/u17bsJTiBg7zpQ4xCUp8yazQKzUzDwNbps13P7ts.jpeg',
            //     title: '大学体育中心',
            //     price:4,
            //     address: '七星区育才路',
            // },
            // {
            //     id:3,
            //     src: 'http://www.gxljcollege.cn/__local/0/9E/B2/453545B2429FA0C68415CF8AA3E_04DD257C_A9B5E.png?e=.png',
            //     title: '师范大学2',
            //     price:4,
            //     address: '七星区育才路2',
            // },
            ]
       }
    },
   

    created(){
        this.getHomeInfo()
    },

    methods:{
            baiduLocation() {
                this.$parent.shouldChangeCity = true;
                let _that = this;
                
                // 百度地图定位
                var map = new BMap.Map("allmap");
                var point = new BMap.Point(116.331398, 39.897445);
                map.centerAndZoom(point, 12);
                var geoc = new BMap.Geocoder();
                var geolocation = new BMap.Geolocation();
                geolocation.getCurrentPosition(function (r) {
                    if (this.getStatus() === BMAP_STATUS_SUCCESS) {
                        console.log('定位成功');
                        console.log(r.point);
                        geoc.getLocation(r.point, function (rs) {
                            var addComp = rs.addressComponents;
                            console.log(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                            if (_that.shouldChangeCity) {
                               // _that.$parent.cityName = addComp.city.replace('市', '');
                                _that.cityName = addComp.city.replace('市', '');
                                 console.log( _that.cityName)
                                //console.log('22222222',_that.$parent.cityName)
                            }else{
                               //this.cityName = _that.$parent.cityName;
                            }

                        });
                    }
                    else {
                        console.log('failed' + this.getStatus());
                    }
                }, {enableHighAccuracy: true});
               
            },

        //请求数据
        getHomeInfo(){
            let _that = this;
            axios.get('/api?city=' + _that.cityName ).then(response=>{
                console.log('33333',response);
                if(response.data.code = 0){
                    //图片
                    _that.imgList = response.data.data.bannerList;
                    //场馆信息
                    _that.list =response.data.data.venueList;
                }
            }).catch(err=>{
                console.log(err)
            })
        },

        // //轮播图
        // demo06_onIndexChange (index) {
        //     this.demo06_index = index
        // },
        

    }
}


</script>
<style>
a {color: #000000;text-decoration: none;}
.header{
    width: 100%;
    height: 40px;
    background-color: #00bcd4;
}
.header-left{
    float: left;
    width: 90%;
}
.header-left .weui-search-bar {
    padding: 6px 10px;
    display: block;
    /*display: -ms-flexbox;*/
    -webkit-box-sizing: border-box;
    background-color: #00bcd4;
}
.header-left .weui-search-bar.weui-search-bar_focusing .weui-search-bar__cancel-btn {
    display: none !important;
}
.header-left .vux-search-box {
    width: 100%;
}
.header-left .weui-search-bar__form {
    border-radius: 6px;
}
.header-right{
    width: 10%;
    float: left;
    height: 40px;
    line-height: 40px;
    color: #ffffff;
    cursor: pointer;
}
.ab-banner{
    height: 80px;
}
.ab-banner img{
    height: 80px;
    width: 100%;
}
.ven-wrapper{
    width: 100%;
    height: auto;
    overflow-y: scroll;
}
.ven-wrapper .line{
    height: 40px;
    text-align: center;
    line-height: 40px;
}
.ven-wrapper .venList-box{
    height: 200vh;
    width: 98%;
    /* height: auto; */
    margin: 0 auto;
}
.ven-wrapper .venList-box .vux-flexbox .vux-flexbox-item {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -webkit-flex: 1;
    min-width: 20px;
    width: 0%;
    height: 200px;
    text-align: center;
}
.ven-wrapper .venList-box .vux-flexbox .vux-flexbox-item .venItem{
    border: #cccccc 1px solid;
    width: 90%;
    height: 180px;
    text-align: center;
    margin-left: 4%;
    border-radius: 5px;
    -webkit-box-shadow: 0px 2px 4px #cccccc;
    -moz-box-shadow: 0px 2px 4px #cccccc;
    box-shadow: 0px 2px 4px #cccccc;
}
.ven-wrapper .venList-box .vux-flexbox .vux-flexbox-item .venItem .item-pic{
    width: 100%;
    height: 130px;
    position: relative;
}
.ven-wrapper .venList-box .vux-flexbox .vux-flexbox-item .venItem .item-pic img{
    width: 100%;
    height: 130px;
    outline-width:0px;
    vertical-align:top;
    border-radius: 5px;
}
.ven-wrapper .venList-box .vux-flexbox .vux-flexbox-item .venItem .item-pic .item-name{
    width: 100%;
    background-color: #000000;
    position: absolute;
    top: 100px;
    height: 30px;
    line-height: 30px;
    font-size: 14px;
    color: #ffffff;
}
.item-info{
    color: #000000;
}
.item-info .item-address{
    font-size: 12px;
    text-align: left;
    height: 25px;
    line-height: 25px;
}
.item-info .item-price{
    font-size: 12px;
    text-align: left;
    height: 20px;
    line-height: 20px;
}

</style>


