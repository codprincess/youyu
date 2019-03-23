<template>
    <div class="header">城市选择
        <router-link to="/"> <div class="iconfont header-back">&#xe624;</div></router-link>
    </div>
</template>
<script>
export default {
    name: 'CityHeader'
}
</script>
<style lang="stylus" scoped>

  .header{
      position : relative
      overflow : hidden
      height : .86rem
      line-height :.86rem
      text-align : center
      color : #ffffff
      background : #00bcd4
  }
  .header-back{
      position : absolute
      top : 0
      left : 0
      width : .64rem
      text-align : center
      font-size : .4rem
      color : #ffffff
      }
</style>