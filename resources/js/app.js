require('./bootstrap');

window.Vue = require('vue').default;

// vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from './routes';
import AdminMaster from './components/admin/AdminMaster.vue';

import Vue from 'vue';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('admin-home', require('./components/admin/AdminHome.vue').default);
//Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);
Vue.component('admin-master', AdminMaster);

const router = new VueRouter({
    mode: 'history',
    routes: routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router: router
});
