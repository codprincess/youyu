<template>
    <div>
        <div class="banner" >
            <img class="banner-img" :src="bannerImg"/>
            <div class="banner-info">
                <div class="banner-title">
                    {{this.venueName}}
                </div>
                <div class="banner-number">
                    <span class="iconfont banner-icon">&#xe692;</span>

                    1
                </div>
            </div>
        </div>

    </div>
</template>
<script>

    export default {
        name: 'DetailBanner',
        props: {
            venueName: String,
            bannerImg: String,

        },
        data () {
            return {

            }
        },
        methods: {

        },
        components: {

        }
    }
</script>
<style lang="stylus" scoped>
    .banner{
        position : relative
        overflow : hidden
        height : 0
        padding-bottom : 55%
    }
    .banner-img{
        width : 100%
    }
    .banner-info{
        display : flex
        position : absolute
        left : 0
        right : 0
        bottom : 0
        line-height : .5rem
        color : #ffffff
    //background-image:line-grayscale(top,rgba(0,0,0,),rgba(0,0,0.8))
    }
    .banner-title{
        flex : 1
        font-size : .26rem
        padding : 0 .2rem
    }
    .banner-number{
        height: .32rem
        line-height: .32rem
        margin-top: .14rem
        padding: 0 .4rem
        border-radius: .2rem
        background: rgba(0, 0, 0, .8)
        font-size: .24rem
    }
    .banner-icon{
        font-size: .24rem
    }
</style>