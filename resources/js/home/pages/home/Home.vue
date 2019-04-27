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
    import {mapState} from 'vuex'

    export default {
        name: 'Home',
        components: {
            HomeHeader,
            HomeSwiper,
            HomeFilter,
            HomeRecommend,
        },
        //数据
        data() {
            return {
                lastCity: '',
              //  city: '',
                swiperList: [],
                recommendList: [],

            }
        },
        computed: {
            ...mapState(['city'])
        },
        methods: {
            getHomeInfo() {
                // 请求
                axios.get('/api?city=' + this.city).then(this.getHomeInfoSucc)

            },
            getHomeInfoSucc(res) {
                //alert(2)
                console.log(res)
                res = res.data;
                console.log('1111111',res);
                if (res) {
                    //const data = res.data
                    // this.city = data.city
                    this.swiperList = res.data.bannerList
                    this.recommendList = res.data.venueList.data
                }
                console.log('333333', this.swiperList);
                console.log( '444444',this.recommendList);
            }
        },
        mounted() {
            this.lastCity = this.city
            this.getHomeInfo()
        },
        activated() {
            if (this.lastCity !== this.city) {
                this.lastCity = this.city
                this.getHomeInfo()
            }
        }
    }
</script>
<style></style>