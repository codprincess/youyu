<template>
    <div>
        <div class="detail-header">
            <x-header :left-options="{backText: ''}">场馆详情</x-header>
        </div>
        <div class="detail-banner">
            <img class="banner-img"  src="../../assets/images/444.jpg"/>
        </div>
        <div class="detail-info">
            <flexbox>
                <flexbox-item><div class="ven-name">育才体育中心</div></flexbox-item>
                <flexbox-item><div class="ven-comment">3.5分</div></flexbox-item>
            </flexbox>
        </div>
        <div class="list-box">

            <div class="ven-address">
                <flexbox>
                    <flexbox-item>
                        <div class="ven-address-name">
                           <img alt="" src="../../assets/images/address.png"/>
                           <span>广西师范大学育才路18号</span>
                        </div>
                    </flexbox-item>
                    <flexbox-item :span="4"><div class="ven-address-call"><img alt="" src="../../assets/images/tel.png" /></div></flexbox-item>
                </flexbox>
            </div>

            <div class="detail-item">
                <router-link to="/seat" tag="div" v-for="(item,index) in dateList" :key="index" >
                     <flexbox>
                        <flexbox-item :span="4"><div class="item-date">{{item.date}}</div></flexbox-item>
                        <flexbox-item :span="2"><div class="item-free"><span style="color:#00bcd4">{{item.freeCount}}</span>场可订</div></flexbox-item>
                        <flexbox-item :span="2"><div class="item-price" style="text-align:right"><span style="color:red">￥{{item.minPrice}}</span>起</div></flexbox-item>
                        <flexbox-item :span="3">
                            <div class="item-book" style="text-align:right;margin-right:6%"><x-button mini type="primary">预定</x-button></div>
                        </flexbox-item>
                    </flexbox>
                </router-link>
               
               
            </div>

           
        </div>
    </div>
</template>
<script>
import { XHeader,Flexbox, FlexboxItem, XButton,} from 'vux'
import axios from 'axios'
export default {
    data(){
        return{
            dateList:[{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },
                {
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },
                {
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },
                {
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                },{
                "date": "04月29日",
                "freeCount": 62,
                "minPrice": 0
                }],
        }
    },
    components: {
        XHeader,
        Flexbox, 
        FlexboxItem,
        XButton
    },
    // created(){
    //     this.getDetailInfo();
    // },
    // methods:{
    //     getDetailInfo(){
    //         axios.get('/api/venue/'+this.$route.params.id+'/detail').then(response=>{
    //             console.log(response)
    //             if(response.data.code = 0 ){

    //             }
    //         }).catch(err=>{
    //             console.log(err);
    //         })
    //     }
    // }
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
.detail-banner{
    height: 150px;
    width: 100%;
}
.detail-banner .banner-img{
    width: 100%;
    height: 150px;
}
.detail-info{
    height: 30px;
    line-height: 30px;
}
.detail-info .ven-name{
    margin-left: 6%;
}
.detail-info .ven-comment{
    margin-right: 6%;
    text-align: right;
}
.list-box{
    height: auto;
    /* border: 1px #cccccc solid; */
    background-color: #F6F6Ff;
}

.list-box .ven-address{
    margin-top: 10px;
    height: 30px;
    line-height: 30px;
    background-color: #ffffff;
}
.list-box .ven-address .ven-address-name{
    margin-left: 3%;
}
.list-box .ven-address .ven-address-name img{
    vertical-align:middle;
    width:20px;height:20px;
}
.list-box .ven-address .ven-address-call{
    margin-right: 6%;
    text-align: right;
}
.list-box .ven-address .ven-address-call img{
    vertical-align:middle;
    width:25px;height:25px;
}
.list-box .detail-item{
    font-size: 14px;
    margin-top: 10px;
    border-top: 1px #eeeeee solid;
    background-color: #ffffff;
}
.list-box .detail-item .item-date{
    margin-left: 6%;
}
.list-box .detail-item .vux-flexbox {
    height: 35px;
    border-top: 1px #eee solid;
}
.list-box .weui-btn_primary {
    background-color: #00bcd4 !important;
}
.list-box .weui-btn_mini {
    display: inline-block;
    padding: 0 .32em !important;
    line-height: 2 !important;
    font-size: 13px;
}



</style>
