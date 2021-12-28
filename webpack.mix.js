const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-svg-vue');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .vue(3)
   .svgVue()
   .sass('resources/sass/app.scss', 'public/css');
// .postCss('resources/css/app.css', 'public/css', [
//   //
// ]);

if (mix.inProduction()) {
    mix.version();
}

mix.webpackConfig({
  devServer: {
    host: "0.0.0.0",
    port: 3000,
  },
  resolve: {
    alias: {
      '@': path.resolve('resources/sass')
    }
  },
});

mix.browserSync({
  host: '127.0.0.1',
  proxy: 'localhost',
  open: false,
  files: [
    'app/**/*.php',
    'resources/views/**/*.php',
    'packages/mixdinternet/frontend/src/**/*.php',
    'public/js/**/*.js',
    'public/css/**/*.css'
  ],
  watchOptions: {
    usePolling: true,
    interval: 1000
  }
});

// mix.js('resources/js/app.js', 'public/js')
//   .webpackConfig({
//     resolve: {
//       alias: {
//         '@': path.resolve('resources/sass')
//       }
//     }
//   })
//   .sass('resources/sass/app.scss', 'public/css');

// mix.browserSync('localhost:8000');
