
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

import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDhMSQwxM6kVM_c3FXe1KRP37aatSovV7M',
        libraries: 'places', // This is required if you use the Autocomplete plugin
    }
})



Vue.component('example', require('./components/Example.vue'));
Vue.component('event-location', require('./components/EventLocation.vue'));

const app = new Vue({
    el: '#app'
});
