import Vue from 'vue'
import { BootstrapVue, BootstrapVueIcons, NavbarPlugin } from 'bootstrap-vue';

//import 'bootstrap/dist/css/bootstrap.css';
//import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.use(NavbarPlugin)

import App from './js/App.vue'

new Vue({
    el: "#app",
    components : {App},


})