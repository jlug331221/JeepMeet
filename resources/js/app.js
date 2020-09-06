/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Load the plain JS Component code.
 */
require('./components/PlainJS/navbar');
require('./components/PlainJS/Buttons/notificationButtonDelete');

window.Vue = require('vue');

/**
 * Vue validation library.
 */
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

/**
 * Buefy
 */
import Buefy from 'buefy';
Vue.use(Buefy);

/**
 * Import our Vue components
 */
Vue.component('contact-us', require('./components/ContactUs.vue').default);
Vue.component('register', require('./components/Auth/Register.vue').default);

Vue.component('home', require('./components/Home.vue').default);

Vue.component('main-forum', require('./components/Forum/MainForum.vue').default);
Vue.component('threads', require('./components/Forum/Threads.vue').default);
Vue.component('post', require('./components/Forum/Post.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, we may begin adding components to this application
 * or customize the JavaScript scaffolding to fit our unique needs.
 */

const app = new Vue({
  el: '#app',
});
