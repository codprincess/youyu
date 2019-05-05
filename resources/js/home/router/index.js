import Vue from 'vue'
import Router from 'vue-router'
// import HelloWorld from '@/components/HelloWorld'
import Home from '../pages/home/Home'
import City from '../pages/city/City'
import Detail from '../pages/detail/Detail'
import Seat from '../pages/seat/Seat'
import Order from '../pages/order/Order'
Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/detail/:id',
            name: 'Detail',
            component: Detail
        },
        {
            path: '/seat/:id',
            name: 'Seat',
            component: Seat
        },
        {
            path: '/order',
            name: 'Order',
            component: Order
        },
        {
            path: '/city',
            name: 'City',
            component: City
        }
    ]
})
