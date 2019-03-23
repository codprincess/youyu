<template>
   <div> 
       <ul>
           <router-link tag="li" class="item border-bottom" v-for="item of list" :key="item.id" :to="'/detail/' + item.id">
                  
               <div class="item-info">
                   <p class="item-title">{{item.title}} <span style="float:right;margin-right:30px;">天气：晴</span></p>
                    <p class="item-title">总/空:2/4   <span>单价:10元</span></p>
                   <p class="item-title">地址:{{item.desc}}</p> 
               </div>
               <img class="item-img" :src="item.imgUrl"/>
           </router-link>
       </ul>
   </div>
</template>
<script>
export default {
    name: 'HomeRecommend',
    props: {
        list: Array
    },
//     data () {
//         return {
//             recommendList: [{
//             id: '0001',
//             imgUrl: 'https://img.16pic.com/00/68/09/16pic_6809924_s.jpg',
//             title: '广西师范大学',
//             desc: '中国广西壮族自治区桂林市	'
//         },{
//             id: '0002',
//             imgUrl: 'https://img.16pic.com/00/68/09/16pic_6809924_s.jpg',
//             title: '广西师范大学',
//             desc: '中国广西壮族自治区桂林市	'
//         },{
//             id: '0003',
//             imgUrl: 'https://img.16pic.com/00/68/09/16pic_6809924_s.jpg',
//             title: '广西师范大学',
//             desc: '中国广西壮族自治区桂林市	'
//         },{
//             id: '0004',
//             imgUrl: 'https://img.16pic.com/00/68/09/16pic_6809924_s.jpg',
//             title: '广西师范大学',
//             desc: '中国广西壮族自治区桂林市	'
//         }]
//         }
//     }
}
</script>
<style lang="stylus" scoped>
    .title
      margin-top : .2rem
      line-height : .8rem
      background : #eeeeee
      text-indent : .2rem 
    .item
        overflow : hidden
        display : flex
        height : 2.1rem
        border-top :1px solid #cccccc
        border-bottom  :1px solid #cccccc
        margin-top :10px
        padding-top :10px
        margin-bottom :10px
        padding-left:5%
        padding-right:5%
        .item-img
          width : 2.6rem
          height : 1.7rem
          padding : .1rem
        .item-info
         flex : 1
         padding : .1rem
         min-width : 0
         .item-title
           line-height : .60rem
           font-size : .32rem
           overflow: hidden
           white-space: nowrap
           text-overflow: ellipsis
         .item-desc
           line-height : .4rem
           color : #000
           overflow: hidden
           white-space: nowrap
           text-overflow: ellipsis
         .item-button
             line-height : .44rem
             margin-top : .16rem
             background : #ff9300
             padding : 0 .2rem
             border-radius : .06rem
             color : #ffffff 
</style>


