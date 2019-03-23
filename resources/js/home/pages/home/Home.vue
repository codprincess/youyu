<template>
   <div>
      <home-header></home-header>
      <home-swiper :list="swiperList"></home-swiper>
      <home-filter></home-filter>
      <home-recommend :list="recommendList"></home-recommend>
   </div>
</template>
<script>
   import HomeHeader from './components/Header'
   import HomeSwiper from './components/Swiper'
   import HomeFilter from './components/FilterBox'
   import HomeRecommend from './components/Recommend'
   import axios from 'axios'
   import { mapState } from 'vuex'
  export default{
     name:'Home',
      components:{
         HomeHeader,
         HomeSwiper,
         HomeFilter,
         HomeRecommend,
      },
      //数据
      data () {
        return {
          lastCity: '',
          // city: '',
          swiperList: [],
          iconList: [],
          recommendList: [],

        }
      },
       computed: {
        ...mapState(['city'])
      },
      methods: {
        getHomeInfo () {
          axios.get('/index.json?city=' + this.city)
          .then(this.getHomeInfoSucc)
        },
        getHomeInfoSucc (res) {
          res = res.data
          if (res.ret && res.data) {
            const data = res.data
            // this.city = data.city
            this.swiperList = data.swiperList
            this.iconList = data.iconList
            this.recommendList = data.recommendList
            this.weekendList = data.weekendList
          }
            //console.log(res);
        }
      },
      mounted () {
        this.lastCity = this.city
        this.getHomeInfo()
      },
      activated () {
        if (this.lastCity !== this.city) {
          this.lastCity = this.city
          this.getHomeInfo()
        }
      }
  }
</script>
<style></style>