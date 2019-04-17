<template>
    <div>
        <detail-banner :venueName="venueName" :bannerImg="bannerImg"></detail-banner>
        <detail-header></detail-header>
        <detailplaydate :list="dateList"></detailplaydate>
    </div>
</template>
<script>
    import detailBanner from './components/Banner'
    import detailHeader from './components/Header'
    import detailplaydate from './components/PlayDate'
    import axios from 'axios'
    export default {
        name: 'Detail',
        components: {
            detailBanner,
            detailHeader,
            detailplaydate
        },
        data () {
            return {
                dateList:[],
                venueName:'',
                bannerImg: '',
            }
        },
        //定义一个方法
        methods: {
            getDetailInfo () {
                axios.get('/api/venue/'+this.$route.params.id+'/detail',{
                    //    params: {
                    //        id: this.$route.params.id
                    //    }
                }).then(this.handleGetDataSucc)
            },
            //接收数据
            handleGetDataSucc (res) {
                res = res.data
                if(res.ret = res.data) {
                    const data = res.data
                    this.dateList = data.dateList
                    this.venueInfo = data.venueInfo;
                    this.venueName = data.venueInfo.name;
                    this.bannerImg = data.venueInfo.cover_uri;
                }
            }
        },
        //生命周期钩子
        mounted () {
            this.getDetailInfo()
        }
    }
</script>
<style lang="stylus" scoped>
    .content{
        height : 50rem
    }
</style>

