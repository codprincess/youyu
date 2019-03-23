<template>
    <div>
        <div class="filter">
            <Select v-model="address" class="filter_add_select">
                <Option v-for="item in addressList" :value="item.value" :key="item.value">{{ item.label }}</Option>
            </Select>

            <Select v-model="price" class="filter_price_select">
                <Option v-for="item in PriceList" :value="item.value" :key="item.value">{{ item.label }}</Option>
            </Select>

            <Select v-model="address" class="filter_add_select" style="margin-left:5%;">
                <Option style="font-size:.32rem" v-for="item in addressList" :value="item.value" :key="item.value">{{ item.label }}</Option>
            </Select>

        </div>
        <div class="timeList">
            <li class="timeItem">
                今天<span style="margin-left:2%;margin-right:3%;">10-12</span>
                明天<span style="margin-left:2%;margin-right:3%;">10-13</span>
                <span>10-14</span>
                <span style="margin-left:2%;">10-15</span>
            </li>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            address:"",
            addressList:[{
                value:'七星区',
                label:'七星区'
            },{
                value:'象山区',
                label:'象山区',
            },{
                value:'叠彩区',
                label:'叠彩区'
            }],
            price:'',
            PriceList:[{
                value:'价格从低到高',
                label:'价格从低到高'
            },{
                value:'价格从高到低',
                label:'价格从高到低'
            },{
                value:'口碑最好',
                label:'口碑最好'
            }]

        }
    }
}
</script>
<style lang="stylus" scoped>
    .filter
        width :100%;
        padding-top :2%;
        padding-left:5%
        .Select
            font-size:.32rem
        .filter_add_select
            width:25%;  
            height: 25px;
            line-height: 25px;
            font-size:.32rem
        .filter_price_select
            margin-left :5%;
            width:30%;  
            height: 25px;
            line-height: 25px;
            font-size:.32rem
    .timeList
        width :100%;
        height :30px;
        padding-top :10px;
        .timeItem
            list-style :none;
            font-size :15px;
            padding-left :2%;
        
</style>

