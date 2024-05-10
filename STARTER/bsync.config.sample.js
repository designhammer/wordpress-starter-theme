/*
|--------------------------------------------------------------------------
| Browser-sync config file
|--------------------------------------------------------------------------
|
| For up-to-date information about the options:
|   http://www.browsersync.io/docs/options/
|
| There are more options than you see here, these are just the ones that are
| set internally. See the website for more info.
|
|
*/
module.exports = {
  port: 3110,
  proxy: 'local.starter.test',
  open: false,
  browser: 'google chrome',
  ghostMode: false,
  notify: true,
  ui: false,
  files: [
    './assets/css/style.css',
    './assets/js/script.js'
  ]
}
