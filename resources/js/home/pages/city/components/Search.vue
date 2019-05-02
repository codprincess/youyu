<template>
    <div>
        <div class="search">
            <input v-model="keyword" type="text" class="search-input" placeholder="请输入城市名称">
        </div>
        <div class="search-content" ref="search" v-show="keyword">
            <ul>
                <li class="search-item border-bottom" 
                v-for="item of list" :key="item.id" @click.native="handleCityClick(item.name)">{{item.name}}</li>
                <li class="search-item border-bottom" v-show="hasNoData">没有找到匹配的数据</li>
            </ul>
        </div>
    </div>
</template>
<script>
import Bscroll from 'better-scroll'
export default {
    name: 'CitySearch',
    //第二步父子组件的传值
    props: {
        cities: Object
    },
    //第一步双向绑定数据
    data () {
        return {
            keyword: '',
            list: [],
            timer: null
        }
    },
    computed: {
       hasNoData () {
           return !this.list.length
       }
    },
    //第三步监听keyword
     watch: {
        keyword () {
        if (this.timer) {
            clearTimeout(this.timer)
        }
        //第四步清除查询数据
        if (!this.keyword) {
            this.list = []
            return
        }
        this.timer = setTimeout(() => {
            const result = []
            for (let i in this.cities) {
            this.cities[i].forEach((value) => {
                if (value.spell.indexOf(this.keyword) > -1 || value.name.indexOf(this.keyword) > -1) {
                result.push(value)
                }
            })
            }
            this.list = result
        }, 100)
        }
    },
    methods: {
        handleCityClick (city) {
            this.$store.dispatch('changeCity',city)
            // alert(city)
        }
    },
    //引入滑动组件
    mounted () {
       this.scroll = new Bscroll(this.$refs.search)
    }

}
</script>
<style lang="stylus" scoped>

      .search{
          height : .72rem
          padding : 0 .1rem
          background : #00bcd4
      }
       .search-input{
          box-sizing : border-box
          height : .62rem
          width : 100%
          padding : 0 .1rem
          line-height : .62rem
          text-align : center
          border-radius : .06rem
          color : #666666
      }
      .search-content{
          z-index : 1
          overflow : hidden
          position : absolute
          top : 1.58rem
          right : 0
          left : 0
          bottom : 0
          background : #eeeeee
      }
        .search-item{
            line-height : .62rem
            padding-left : .2rem
            background : #ffffff
            color : #666
        }
      
</style>

