
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

window.Vue = Vue;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import emotes from './components/Emotes.vue';
import emote from './components/Emote.vue';

Vue.use(VueRouter)

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('emotes', require('./components/Emotes.vue'));
Vue.component('emote', require('./components/Emote.vue'));


window.router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/emotes', component: emotes},
        {path: '/emotes/:id', component: emotes}
    ]
});

window.page = new Vue({
    router: window.router,
    el: '#app'
});