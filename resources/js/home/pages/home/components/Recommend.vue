<template>
   <div ref="wrapper" class="venueList">
       <ul>
           <router-link tag="li" class="item border-bottom" v-for="item of list" :key="item.id" :to="'/detail/' + item.id">

               <div class="item-info">
                   <p class="item-title">{{item.name}} <span style="float:right;margin-right:30px;">天气：晴</span></p>
                    <p class="item-title">总/空:2/4   <span>单价:10元</span></p>
                   <p class="item-title">地址:{{item.province  + item.district + item.street}}</p>
               </div>
               <img class="item-img" :src="item.cover_uri"/>
           </router-link>
       </ul>
   </div>
</template>
<script>
import Bscroll from 'better-scroll'
export default {
    name: 'HomeRecommend',
    props: {
        list: Array
    },

    mounted () {
        this.scroll = new Bscroll(this.$refs.wrapper)
    }
}
</script>
<style lang="stylus" scoped>
    .venueList
        z-index:9999
        height: 1000vh;
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


