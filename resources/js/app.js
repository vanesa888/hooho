/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter)

import {
    Form,
    HasError,
    AlertError
} from 'vform';

//import alert
// import Swal from 'sweetalert2'
// window.Swal = Swal;
// const Toast = Swal.mixim({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 3000
// });
// window.Toast = Toast;

window.Form= Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143,255, 199)',
    failedColor: 'red',
    height: '7px'
})

let Fire = new Vue();
window.Fire = Fire;

let routes = [
    {path: '/tambah-data-blog', component: require ('./components/Blog/Add-blog.vue').default},
    {path: '/kategori-blog', component: require ('./components/Blog/Kategori.vue').default},
    {path: '/data-blog', component: require ('./components/Blog/Data-blog.vue').default},
    {path: '/Login-blog', component: require ('./components/Blog/Login.vue').default},
    {path: '/User-blog', component: require ('./components/Blog/User.vue').default}
]

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes //short for 'routes: routes
})

const app = new Vue({
    el: '#app',
    router
});

