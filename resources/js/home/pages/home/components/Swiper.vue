<template>
   <div class="wrapper" style="height: 240px;">
    <swiper :options="swiperOption" v-if="showSwiper">
      <swiper-slide v-for="item of list" :key="item.id">
          <img style="height: 240px;" class="swiper-img" :src="item.picture_uri"/>
      </swiper-slide>
      <div class="swiper-pagination"  slot="pagination"></div>
    </swiper>
  </div>
</template>
<script>
   export default{
     name: 'HomeSwiper',
       props: {
       list: Array
     },
     data () {
        return {
          swiperOption: {
              pagination:'.swiper-pagination',
              loop:true
          }
        }
     },
     computed: {
       showSwiper () {
         return this.list.length
       }
     }
   }
</script>
<style lang="stylus" scoped>
    .wrapper >>> .swiper-pagination-bullet-active
      background: #fff
    .wrapper
      overflow: hidden
      width: 100%
      padding-bottom: 31.25%
      background: #eee
      .swiper-img
       width:100%
       height :200px
</style>