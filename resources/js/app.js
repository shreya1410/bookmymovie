/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
//import VueRouter from 'vue-router'

// Vue.use(VueRouter)
//
// const routes = [
//     {path:'/',component:require('./components/ShowmovieComponent')},
//     {path:'/trend',component:require('./components/TreadingMovies')},
//
// ]
//
//
// const router = new VueRouter({
//     routes : routes,
//     mode : "history"
// })
//


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('showmovie-component',require('./components/ShowmovieComponent').default);
Vue.component('treadingmovie-component',require('./components/TreadingMovies').default);


Vue.component('pagination', require('laravel-vue-pagination'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
     el: '#app',
});

//export default router;
