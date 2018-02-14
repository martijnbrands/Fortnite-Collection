
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import emotes from './components/Emotes.vue';
import emote from './components/Emote.vue';
import VueRouter from 'vue-router';

Vue.use(require('vue-resource'));
Vue.use(require('vue-router'));

Vue.use(VueRouter)

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('emotes', require('./components/Emotes.vue'));
Vue.component('emote', require('./components/Emote.vue'));
// Vue.component('singleEmote', require('./components/singleEmote.vue'));

const router = new VueRouter({
  routes: [
    {path: '/emotes', component: emotes}
    // {path: '/emotes/:id', component: singleEmote} 
  ]
  // ,
  // mode: 'history' // ALS JE DIT AAN ZET LAAT DIE DE COMPONENT 2X IN. ZET JE DIT AAN DAN HAALT DIE WEL DE # WEG IN DE URL
})

const app = new Vue({
    el: '#app',
    router: router
});