const mix = require('laravel-mix');

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

mix.webpackConfig(webpack => {
  return {
    module: {
      rules: [
        {
          test: require.resolve("jquery"),
          loader: "expose-loader",
          options: {
            exposes: ["$", "jQuery"],
          },
        }
      ],
    }
  };
});

/* homepage page */
mix
  .sass('resources/views/public-theme/templates/pages/homepage/_style.scss', 'public/assets/pages/homepage')
;

/* catalog page 
mix
  .sass('resources/views/public-theme/templates/pages/catalog/_style.scss', 'public/assets/pages/catalog')
  .js('resources/views/public-theme/templates/pages/catalog/script.js', 'public/assets/pages/catalog')
;

 search page 
mix
  .sass('resources/views/public-theme/templates/pages/search/_style.scss', 'public/assets/pages/search')
  .js('resources/views/public-theme/templates/pages/search/script.js', 'public/assets/pages/search')
;
*/

/* manifest goes to lastly defined folder */
mix.postCss('resources/views/admin-theme/assets/css/app.css', 'public/admin/css/node_modules')
  .sass('resources/views/admin-theme/assets/sass/styles.scss', 'public/admin/css/builded')
  .js('resources/views/admin-theme/assets/js/app.js', 'public/admin/js/builded')
  .sass('resources/views/public-theme/assets/sass/_app.scss', 'public/assets/common/css')
  .js('resources/views/public-theme/assets/js/app.js', 'public/assets/common/js')
;