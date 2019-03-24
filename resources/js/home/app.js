
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import router from './router'
import fastclick from 'fastclick'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import store from './store'
// import 'styles/reset.css'
// import 'styles/border.css'
// import 'styles/iconfont.css'
import 'swiper/dist/css/swiper.css'
import iView from 'iview';
import 'iview/dist/styles/iview.css';
require('./bootstrap');

// window.Vue = require('vue');


Vue.use(iView);
Vue.config.productionTip = false
fastclick.attach(document.body)
Vue.use(VueAwesomeSwiper, /* { default global options } */)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
})

// const app = new Vue({
//     el: '#app'
// });