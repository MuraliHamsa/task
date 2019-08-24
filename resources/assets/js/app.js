/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { library } from '@fortawesome/fontawesome-svg-core'
import { faDownload } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'


window.Vue = require('vue');
window.Bus = new Vue();



Vue.use(Vuetify)
library.add(faDownload)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('chat-app', require('./components/ChatApp.vue').default);
Vue.component('groups', require('./components/Groups.vue'));
Vue.component('create-group', require('./components/CreateGroup.vue'));
Vue.component('group-chat', require('./components/GroupChat.vue'));



const app = new Vue({
    el: '#app'
})