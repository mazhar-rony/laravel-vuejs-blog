require('./bootstrap');

window.Vue = require('vue').default;

// vuex
import Vuex from 'vuex'

Vue.use(Vuex);

import storeData from './store/store'

const store = new Vuex.Store(
    storeData
)

// vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from './routes';
import AdminMaster from './components/admin/AdminMaster.vue';

// v form
import Form from 'vform'
import { Button, HasError, AlertError } from 'vform/src/components/bootstrap5'

window.Form = Form;

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// moment js
import filter from './filter'
//this portion done in filter.js file
/* import moment from 'moment'

 Vue.filter('dateformat', (arg)=>{
  //return moment(arg).format("MMM Do YYYY")
  return moment(arg, "YYYYMMDD").fromNow()
 })*/
//end moment js

// sweet alert 2
import Swal from 'sweetalert2'

window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
//   Toast.fire({
//     icon: 'success',
//     title: 'Signed in successfully'
//   })

  window.Toast = Toast;

import Vue from 'vue';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('admin-home', require('./components/admin/AdminHome.vue').default);
//Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);
Vue.component('admin-master', AdminMaster);

const router = new VueRouter({
    mode: 'hash',
    routes: routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router: router,
    store: store
});
