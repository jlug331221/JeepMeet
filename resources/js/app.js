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

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import SvgVue from 'svg-vue3';

createInertiaApp({
  title: title => `JeepMeet | ${title}`,
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(SvgVue)
      .component("Head", Head)
      .component("Link", Link)
      .mount(el)
  },
});

/**
 * Vue Router
 */
// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

/**
 * Vue validation library.
 */
// import Vuelidate from 'vuelidate';
// Vue.use(Vuelidate);

/**
 * Buefy
 */
// import Buefy from 'buefy';
// Vue.use(Buefy);

/**
 * Import our Vue components
 */
// Vue.component('contact-us', require('./components/ContactUs.vue').default);
// Vue.component('register', require('./components/Auth/Register.vue').default);

// Vue.component('home', require('./components/Home.vue').default);

// Vue.component('main-forum', require('./components/Forum/MainForum.vue').default);
// Vue.component('thread', require('./components/Forum/Thread.vue').default);
// Vue.component('post', require('./components/Forum/PostPreview.vue').default);

// const routes = [
//   {
//     path: '/forum',
//     component: require('./components/Forum/MainForum.vue').default
//   },
//   {
//     path: '/thread/:threadId',
//     name: 'single-thread',
//     component: require('./components/Forum/Thread.vue').default
//   },
// ];

// const router = new VueRouter({
//   mode: 'history',
//   fallback: true,
//   linkActiveClass: 'is-active',
//   routes
// });
// router.mode = 'html5'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, we may begin adding components to this application
 * or customize the JavaScript scaffolding to fit our unique needs.
 */
// const app = new Vue({
//   router,
//   el: '#app',
// });
