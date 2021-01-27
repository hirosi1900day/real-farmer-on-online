import Vue from 'vue';
import Router from 'vue-router';
import Home from './component/Home.vue';
import About from './component/About.vue';

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    
  ]
});