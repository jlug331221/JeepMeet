/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

/**
 * Load the plain JS Component code.
 */
require('./components/PlainJS/Buttons/notificationButtonDelete');

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import SvgVue from 'svg-vue3';

import Oruga from '@oruga-ui/oruga-next';
import { bulmaConfig } from '@oruga-ui/theme-bulma';
import '@oruga-ui/theme-bulma/dist/bulma.css';
// import '@oruga-ui/oruga-next/dist/oruga.css';

const app = createInertiaApp({
  title: title => `JeepMeet | ${title}`,
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(SvgVue)
      .use(Oruga, bulmaConfig)
      .component("Head", Head)
      .component("Link", Link)
      .mixin({ methods: { route: window.route } })
      .mount(el)
  },
});

InertiaProgress.init({ color: '#895' });
