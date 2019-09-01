
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//e.component('marhatorzsbevitelitem', require('./components/marhatorzsbevitelitem.vue').default);
Vue.component('marhatorzsbevitelitem', require('./components/marhatorzs/marhatorzsbevitelitem.vue').default);
Vue.component('marhatorzsupdateitem', require('./components/marhatorzs/marhatorzsupdateitem.vue').default);




window.events = new Vue();
window.flash = function(message) 
	{
    window.events.$emit('flash',message);

	}
Vue.component('flash', require('./components/marhatorzs/Flash.vue').default);

//Vue.component('contact-form', require('./components/ContactForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';
import VueSidebarMenu from 'vue-sidebar-menu';
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css';
Vue.component('sidebarmenu', require('./components/menu/marhatorzs_menu.vue').default);

const app = new Vue({
    el: '#app'
});
