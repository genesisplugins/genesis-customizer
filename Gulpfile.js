process.env.DISABLE_NOTIFIER = true;

'use strict';

var pkg = require('./package.json'),
    gulp = require('gulp'),
    clean = require('gulp-clean-css'),
    globs = require('gulp-src-ordered-globs'),
    g = require("gulp-load-plugins")(),
    json = require('gulp-sass-json'),
    toolkit = require('gulp-wp-toolkit'),
    zip = require('gulp-zip');

toolkit.extendConfig(
    {
        theme: {
            name: pkg.theme.name,
            themeuri: pkg.theme.uri,
            description: pkg.description,
            author: pkg.author,
            authoruri: pkg.theme.authoruri,
            version: pkg.version,
            license: pkg.license,
            licenseuri: pkg.theme.licenseuri,
            tags: pkg.theme.tags,
            textdomain: pkg.theme.textdomain,
            domainpath: pkg.theme.domainpath,
            template: pkg.theme.template,
            notes: pkg.theme.notes
        },
        src: {
            php: ['**/*.php', '!vendor/**'],
            images: 'assets/img/**/*',
            scss: 'assets/scss/**/*.scss',
            css: ['**/*.css', '!node_modules/**', '!assets/vendor/**'],
            js: ['assets/js/**/*.js', '!node_modules/**'],
            json: ['**/*.json', '!node_modules/**'],
            i18n: './assets/lang/',
            vars: 'assets/scss/settings/_colors.scss',
            mq: 'assets/css/all.css'
        },
        js: {
            'genesis-customizer': [
                'assets/js/general.js',
                'assets/js/responsive-menus.js',
                'assets/js/split-nav.js',
                'assets/js/sticky-header.js',
                'assets/js/transparent-header.js',
                'assets/js/back-to-top.js',
                'assets/js/header-search.js'
            ],
        },
        css: {
            basefontsize: 10, // Used by postcss-pxtorem.
            remmediaquery: false,
            remreplace: false,
            scss: {
                'style': {
                    src: 'assets/scss/tools/_functions.scss',
                    dest: './',
                    outputStyle: 'expanded'
                },
                'all': {
                    src: 'assets/scss/style.scss',
                    dest: 'assets/css/',
                    outputStyle: 'compact'
                },
                'elementor': {
                    src: 'assets/scss/vendor/elementor/__index.scss',
                    dest: 'assets/css/',
                    outputStyle: 'compact'
                },
                'simple-social-icons': {
                    src: 'assets/scss/vendor/simple-social-icons/__index.scss',
                    dest: 'assets/css/',
                    outputStyle: 'compact'
                },
            }
        },
        dest: {
            i18npo: './assets/lang/',
            i18nmo: './assets/lang/',
            images: './assets/img/',
            js: './assets/js/min/'
        },
        server: {
            proxy: 'https://genesiscustomizer.test',
            host: 'genesiscustomizer.test',
            open: 'external',
            port: '8000',
            notify: false,
            https: {
                'key': '/Users/seothemes/.config/valet/Certificates/genesiscustomizer.test.key',
                'cert': '/Users/seothemes/.config/valet/Certificates/genesiscustomizer.test.crt'
            }
        }
    }
);

toolkit.extendTasks(gulp, {
    'json': function () {
        return gulp.src(toolkit.config.src.vars)
            .pipe(json())
            .pipe(gulp.dest('./'))
    },
    'extract': function () {
        return gulp.src(toolkit.config.src.mq)
            .pipe(g.extractMediaQueries())
            .pipe(gulp.dest('./assets/css'));
    },
    'clean-css': function () {
        return gulp.src(toolkit.config.src.mq)
            .pipe(clean({compatibility: 'ie8'}))
            .pipe(gulp.dest('./assets/css'));
    },
    mq: [['build:css','extract']],
});





