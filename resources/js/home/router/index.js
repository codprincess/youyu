import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/home/Home'
import City from '../pages/city/City'
import Detail from '../pages/detail/Detail'
import Seat from '../pages/seat/Seat'
import Order from '../pages/order/Order'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: '/',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        }, {
            path: '/city',
            name: 'City',
            component: City
        },
        {
            path: '/detail/:id',
            name: 'Detail',
            component: Detail
        },
        {
            path: '/seat',
            name: 'Seat',
            component: Seat
        },
        {
            path: '/order',
            name: 'Order',
            component: Order
        }

    ],
    //初始化页面
    scrollBehavior: function (to, from, savedPosition) {
        return savedPosition || {x: 0, y: 0}
    }
})
