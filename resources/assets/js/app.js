
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

Vue.use(require('vue-resource'));
Vue.use(require('vue-router'));

import emotes from './components/Emotes.vue';
import emote from './components/Emote.vue';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('emotes', require('./components/Emotes.vue'));
Vue.component('emote', require('./components/Emote.vue'));

const app = new Vue({
    el: '#app'
});