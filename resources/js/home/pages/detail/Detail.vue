<template>
    <div>
        <detail-banner :sightName="sightName" :bannerImg="bannerImg" :bannerImgs="gallaryImgs"></detail-banner>
        <detail-header></detail-header>
        <detailplaydate></detailplaydate>
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
            sightName: '',
            bannerImg: '',
            gallaryImgs: [],
        }
    },
    //定义一个方法
    methods: {
       getDetailInfo () {
           axios.get('/detail.json',{
               params: {
                   id: this.$route.params.id
               }
           }).then(this.handleGetDataSucc)
       },
       //接收数据
       handleGetDataSucc (res) {
           res = res.data
           if(res.ret = res.data) {
               const data = res.data
               this.sightName = data.sightName
               this.bannerImg = data.bannerImg
               this.gallaryImgs = data.gallaryImgs
               this.list = data.categoryList
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

