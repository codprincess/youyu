<template>
    <div class="cityList" ref="citylistpage">
        <div class="detail-header">
            <x-header :left-options="{backText: ''}">城市选择</x-header>
        </div>
        <div>
            <div class="search-bar">
                <search
                    @keyup.enter="keyupSearch(searchMsg)"
                    v-model="searchMsg"
                    top="46px"
                    ref="search">
                </search>
            </div>
            <div class="allcity-bar" v-if="!showSearchInfo" ref="allcitybar">
                <div v-if="cityList" class="city-item-list" v-for="(list, word) in cityList" :key="word">
                    <div class="city-title">{{word}}</div>
                    <ul>
                        <li @click="selectCity(city.name)" class="city-item" v-for="(city, index) in list" :key="index">{{city.name}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="city-search-bar" v-if="showSearchInfo">
                <ul>
                    <li @click="selectCity(city.name)" class="city-item" v-for="(city, index) in searchRes" :key="index">{{city.name}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="fast-sel-bar" v-show="!showSearchInfo">
            <p class="fast-sel-item" :class="{fastSelActive: index === curCityListIndex}"
               v-for="(list, word, index) in cityList" :data-index="index" :key="index" @touchstart="onSelectFastTouchStart"
               @touchmove.stop.prevent="onSelectFastTouchMove">
                {{word}}
            </p>
        </div>
    </div>
</template>

<script>
import { XHeader,Search} from 'vux'
import {cityList} from '../../common/city.js';
import BScroll from 'better-scroll';
export default {
    props: ['shouldChangeCity'],
    data() {
        return {
            searchMsg: '请输入城市名', // 搜索的信息
            cityList: {}, // 所有城市
            showSearchInfo: false, // 是否显示搜索提示框
            searchRes: [], // 搜索结果
            listHeight: [], // 每组城市的高度
            scrollY: 0, // Y方向距离
            touch: {}, //
            cityDomList: null, // 城市dom
            htmlFontSize: 0, // 用于计算高度
            curCityListIndex: 0 // 当前快速选择index
        };
    },
     components: {
        XHeader,
        Search
    },
    created() {
        this.cityList = cityList;
        //console.log( this.cityList);
        let that = this;
        setTimeout(() => {
            that._initScroll();
            that.calculateHeight();
        }, 20);
    },
    mounted() {
        let that = this;
        this.cityDomList = this.$refs.allcitybar.getElementsByClassName('city-item-list');
        setTimeout(() => {
            that.htmlFontSize = window.document.getElementsByTagName('html')[0].style.fontSize;
        }, 20);
    },
    // computed: {
    //     // 计算是否显示搜索提示框
    //     showCancelIcon() {
    //         return this.searchMsg !== '';
    //     }
    // },
    watch: {
        scrollY(newY) {
            const listHeight = this.listHeight;
            // 当滚动到顶部，newY>0
            if (newY > 0) {
                this.curCityListIndex = 0;
                return;
            }
            // 在中间部分滚动
            for (let i = 0; i < listHeight.length - 1; i++) {
                let height1 = listHeight[i];
                let height2 = listHeight[i + 1];
                if (-newY >= height1 && -newY < height2) {
                    this.curCityListIndex = i;
                    this.diff = height2 + newY;
                    return;
                }
            }
            // 当滚动到底部，且-newY大于最后一个元素的上限;
            this.currentIndex = listHeight.length - 2;
        },
        // 观测搜索框内输入的文字
        searchMsg() {
            if (this.searchMsg) {
                this.cityListScroll.refresh();
            }
            this.searchRes = [];
            // 事件截留
            if (this.searchMsgTimeoutFlag) {
                window.clearTimeout(this.searchMsgTimeoutFlag);
            }
            this.searchMsgTimeoutFlag = window.setTimeout(() => {
                if (this.searchMsg !== '') {
                    this.showSearchInfo = true;
                    this.searchCityByName(this.searchMsg);
                    this.cityListScroll.refresh();
                } else {
                    this.showSearchInfo = false;
                }
            }, 200);
        },
        showSearchInfo() {
            this.$nextTick(() => {
                this.cityListScroll.refresh();
            });
        }
    },
    methods: {
        selectCity(cityName) {
            this.$parent.cityName = cityName;
            this.$parent.shouldChangeCity = false;
            this.$router.go(-1);
        },
        cancelSearch() {
            this.searchMsg = '';
        },
        keyupSearch(searchMsg) {
            if (this.searchRes.length > 0 && searchMsg === this.searchRes[0].name) {
                this.selectCity(searchMsg);
            }
            return false;
        },
        searchCityByName(cityName) {
            let hasChinese = /.*[\u4e00-\u9fa5]+.*$/.test(cityName); // 是否有中文
            let hasWord = /^[a-zA-Z]/.test(cityName); // 是否有英文
            if (hasChinese && hasWord) {
                return;
            } else if (hasChinese) {
                for (let i in cityList) {
                    for (let m of cityList[i]) {
                        if (m.name.indexOf(cityName) > -1) {
                            this.searchRes.push(m);
                        }
                    }
                }
            } else if (hasWord) {
                for (let i in cityList) {
                    for (let m of cityList[i]) {
                        if (m.pinyin.indexOf(cityName) > -1) {
                            this.searchRes.push(m);
                        }
                    }
                }
            }
        },
        _initScroll() {
            this.cityListScroll = new BScroll(this.$refs.citylistpage, {
                click: true,
                probeType: 3
            });
            this.cityListScroll.on('scroll', (pos) => {
                this.scrollY = pos.y;
            });
        },
        calculateHeight() {
            this.$nextTick(() => {
                let cityList = this.$refs.allcitybar.getElementsByClassName('city-item-list');
                let height = 0;
                this.listHeight.push(height);
                for (let i = 0; i < cityList.length; i++) {
                    let item = cityList[i];
                    height += item.clientHeight;
                    this.listHeight.push(height);
                }
            });
        },
        onSelectFastTouchStart(e) {
            let anchorIndex = e.target.getAttribute('data-index');
            let firstTouch = e.touches[0];
            this.touch.y1 = firstTouch.pageY;
            this.touch.anchorIndex = anchorIndex;
            let el = this.cityDomList[anchorIndex];
            this.scrollY = -this.listHeight[anchorIndex];
            this.cityListScroll.scrollToElement(el);
        },
        
        onSelectFastTouchMove(e) {
            let firstTouch = e.touches[0];
            this.touch.y2 = firstTouch.pageY;
                let itemHeight = 20; // 高度为0.4rem，换算为实际高度
                let delta = (this.touch.y2 - this.touch.y1) / itemHeight | 0;
                let anchorIndex = parseInt(this.touch.anchorIndex) + delta;
                let el = this.cityDomList[anchorIndex];
                this.scrollY = -this.listHeight[anchorIndex];
                this.cityListScroll.scrollToElement(el);
            }
        }
    };
</script>

<style >
   .cityList {
        width: 100%;
        position: absolute;
        overflow: hidden;
    }
    .vux-header {
        position: relative;
        padding: 3px 0;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        background-color: #00bcd4 !important;
    }
    .cityList .search-bar .weui-search-bar.weui-search-bar_focusing .weui-search-bar__cancel-btn {
        display: none !important;
    }
    
    .cityList .search-bar {
         /*position: fixed;*/
        z-index: 10;
        background-color: #ffffff;
        width: 100%;
        height: 40px;
        border-bottom: solid 1px #f0f0f0;
    }
       
    .cityList .allcity-bar {
        width: 100%;
        background-color: #FFFFFF;
    }
           
    .cityList .allcity-bar .city-item-list .city-title {
        padding-left: 10%;
        height: 30px;
        line-height: 30px;
        color: #666666;
        background-color: #EEEEEE;
    }
    .cityList .fast-sel-bar {
        position: fixed;
        top: 80px;
        right: 0;
        width: 50px;
        text-align: center;
     }
     .cityList .fast-sel-bar .fast-sel-item {
        height: 20px;
        line-height: 20px;
        color: #999999;
        font-size: 14px;
     }
    .cityList .fast-sel-bar .fastSelActive {
            color: #F28300;
        }
    
    .cityList ul {
            padding: 0 10px;
            font-size: 20px;
            background-color: #FFFFFF;}
    .cityList ul .city-item {
                 padding-left: 5%;
                height: 30px;
                line-height: 30px;
                border-bottom: 1px solid #EEEEEE;
                font-size: 14px;
            }
        
    
</style>
