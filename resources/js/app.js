/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import router from './router';
import section1 from "./component/section1";
import section2 from "./component/section2";
import section3 from "./component/section3";
import section4 from "./component/section4";
import section5 from "./component/section5";
import section6 from "./component/section6";


window.Vue = require('vue');
Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('section', require('./component/section1.vue').default);
Vue.component('section2', require('./component/section2.vue').default);
Vue.component('section3', require('./component/section3.vue').default);
Vue.component('section4', require('./component/section4.vue').default);
Vue.component('section5', require('./component/section5.vue').default);
Vue.component('section6', require('./component/section6.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router, 
    
});
