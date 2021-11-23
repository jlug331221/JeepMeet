const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
  .vue()
  .sass('resources/sass/app.scss', 'public/css');
// .postCss('resources/css/app.css', 'public/css', [
//   //
// ]);

mix.webpackConfig({
  devServer: {
    host: "0.0.0.0",
    port: 8080,
  },
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