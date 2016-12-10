'use strict';

export default {

  sourceDir: './frontend/',
  buildDir: './public/assets/',

  styles: {
    src: 'frontend/styles/main.scss',
    dest: 'public/assets/css',
    prodSourcemap: false,
    sassIncludePaths: []
  },

  scripts: {
    src: 'frontend/js/**/*.js',
    dest: 'public/assets/js',
    gulp: 'gulp/**/*.js'
  },

  specs: {
    src: 'tests/unit/**/*.php',
    gulp: 'gulp/**/*.js'
  },

  tests: {
    src: 'tests/integration/**/*Test.php',
    gulp: 'gulp/**/*.js'
  },

  php: {
    src: 'app/**/*.php',
    gulp: 'gulp/**/*.js'
  },

  templates: {
    src: 'frontend/js/**/*.html',
    dest: 'public/templates'
  },

  images: {
    src: 'frontend/images/**/*',
    dest: 'public/assets/images'
  },

  fonts: {
    src: ['frontend/fonts/**/*'],
    dest: 'public/assets/fonts'
  },

  assetExtensions: [
    'js',
    'css',
    'png',
    'jpe?g',
    'gif',
    'svg',
    'eot',
    'otf',
    'ttc',
    'ttf',
    'woff2?'
  ],

  views: {
    src: 'frontend/js/templates/**/*.html',
    dest: 'frontend/js'
  },

  gzip: {
    src: 'public/assets/**/*.{html,xml,json,css,js,js.map,css.map}',
    dest: 'public/assets/',
    options: {}
  },

  browserify: {
    bundleName: 'main.js',
    prodSourcemap: false
  },

  init: function() {
    this.views.watch = [
      this.views.src
    ];

    return this;
  }

}.init();
