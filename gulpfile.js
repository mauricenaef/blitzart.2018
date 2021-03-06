/* -------------------------------------------------------------------------------------------------

	Build Configuration

 ------------------------------------------------------------------------------------------------- */
'use strict';
var gulp = require('gulp');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var cssnano = require('cssnano');
var plumber = require('gulp-plumber');
var babel = require("gulp-babel");
var imagemin = require('gulp-imagemin');
var remoteSrc = require('gulp-remote-src');
var unzip = require('gulp-unzip');
var svgstore = require('gulp-svgstore');
var cheerio = require('gulp-cheerio');
var svgmin = require('gulp-svgmin');
var connect = require('gulp-connect-php');
var browserSync = require('browser-sync');
var rename = require('gulp-rename');
var path = require('path');
var del = require('del');
var fs = require('fs');

/*********************
Theme Name
*********************/

var blitzart = 'blitzart.2018';

/*********************
Header and Footer scripts
*********************/

var headerJS = [
	'node_modules/webfontloader/webfontloader.js',
	'node_modules/jquery/dist/jquery.js',
	'node_modules/lightgallery/dist/js/lightgallery-all.js',
	'node_modules/animejs/lib/anime.min.js',
	'src/js/header/**'
];
var footerJS = [
	'src/js/footer/**'
];


/*********************
Start of Build Tasks
*********************/

gulp.task('build-dev', [
	'copy-theme-dev',
	'style-dev',
	'editor-style-dev',
	'login-style-dev',
	'admin-style-dev',
	'header-scripts-dev',
	'footer-scripts-dev',
	'copy-fonts-dev',
	'watch'
], function () {
	connect.server({
		base: 'app/public',
		port: '8080'
	}, function () {
		browserSync({
			proxy : 'https://blitz.development'
		});
	});
}
);

gulp.task('build-prod', [
	'copy-theme-prod',
	'style-prod',
	'editor-style-prod',
	'login-style-prod',
	'admin-style-prod',
	'header-scripts-prod',
	'footer-scripts-prod',
	'copy-fonts-prod',
	'process-images'
	//'zip-theme'
]);

gulp.task('default');

gulp.task('cleanup', function () {
	del(['build/**']);
	del(['dist/**']);
});

gulp.task('dist', function () {
	gulp.src('app/public/wp-content/themes/' + blitzart + '/**')
		.pipe(gulp.dest('dist/themes/' + blitzart))
});

gulp.task('copy-theme-dev', function () {
	gulp.src("src/theme/**")
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart));
});

gulp.task('copy-theme-prod', function () {
	gulp.src("src/theme/**")
		.pipe(gulp.dest('dist/themes/' + blitzart))
});

gulp.task('style-dev', function () {
	return gulp.src('src/scss/style.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(sourcemaps.write('../' + blitzart))
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart))
		.pipe(browserSync.stream({ match: '**/*.css' }));
});

gulp.task('login-style-dev', function () {
	return gulp.src('src/theme/inc/style/login.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(sourcemaps.write('../' + blitzart))
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart + '/inc/style'))
		.pipe(browserSync.stream({ match: '**/*.css' }));
});
gulp.task('admin-style-dev', function () {
	return gulp.src('src/theme/inc/style/admin.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(sourcemaps.write('../' + blitzart))
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart + '/inc/style'))
		.pipe(browserSync.stream({ match: '**/*.css' }));
});

gulp.task('editor-style-dev', function () {
	return gulp.src('src/scss/editor-styles.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart))
		.pipe(browserSync.stream({ match: '**/*.css' }));
});

gulp.task('style-prod', function () {
	return gulp.src('src/scss/style.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(sass({
			outputStyle: 'compressed'
		}))
		.pipe(gulp.dest('dist/themes/' + blitzart))
});

gulp.task('login-style-prod', function () {
	return gulp.src('src/theme/inc/style/login.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(sass({
			outputStyle: 'compressed'
		}))
		.pipe(gulp.dest('dist/themes/' + blitzart + '/inc/style'))
});

gulp.task('admin-style-prod', function () {
	return gulp.src('src/theme/inc/style/admin.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			outputStyle: 'compressed'
		}))
		.pipe(sourcemaps.write('../' + blitzart))
		.pipe(gulp.dest('dist/themes/' + blitzart + '/inc/style'))
		.pipe(browserSync.stream({ match: '**/*.css' }));
});

gulp.task('editor-style-prod', function () {
	return gulp.src('src/scss/editor-styles.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			outputStyle: 'compressed'
		}))
		.pipe(gulp.dest('dist/themes/' + blitzart))
		.pipe(browserSync.stream({ match: '**/*.css' }));
});


/*********************
Scripts
*********************/

gulp.task('header-scripts-dev', function () {
	return gulp.src(headerJS)
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(concat('header-bundle.js'))
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart + '/js'));
});

gulp.task('header-scripts-prod', function () {
	return gulp.src(headerJS)
		.pipe(plumber({ errorHandler: onError }))
		.pipe(concat('header-bundle.js'))
		.pipe(uglify())
		.pipe(gulp.dest('dist/themes/' + blitzart + '/js'));
});

gulp.task('footer-scripts-dev', function () {
	return gulp.src(footerJS)
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['env']
		}))
		.pipe(concat('footer-bundle.js'))
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart + '/js'));
});

gulp.task('footer-scripts-prod', function () {
	return gulp.src(footerJS)
		.pipe(plumber({ errorHandler: onError }))
		.pipe(babel({
			presets: ['env']
		}))
		.pipe(concat('footer-bundle.js'))
		.pipe(uglify())
		.pipe(gulp.dest('dist/themes/' + blitzart + '/js'));
});

var onError = function (err) {
	gutil.beep();
	console.log(err.toString());
	this.emit('end');
};
/*********************
Fonts
*********************/

gulp.task('copy-fonts-dev', () => {
	gulp.src('src/theme/fonts/**')
		.pipe(gulp.dest('app/public/wp-content/themes/' + blitzart + '/fonts'))
});

gulp.task('copy-fonts-prod', () => {
	gulp.src('src/theme/fonts/**')
		.pipe(gulp.dest('dist/themes/' + blitzart + '/fonts'))
});
/*********************
Images
*********************/

gulp.task('process-images', ['svg-icons'], function() {
    gulp.src('src/theme/images/*')
    .pipe(imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 5}),
        imagemin.svgo({plugins: [{removeViewBox: true}]})
    ],{
    	verbose: true
    }))
    .pipe(gulp.dest('dist/themes/' + blitzart + '/images'));
});


/*********************
SVG Sprite
*********************/

gulp.task('svg-icons', function () {
    return gulp
        .src('src/theme/images/SVG/*.svg')
        .pipe(svgmin(function (file) {
            var prefix = path.basename(file.relative, path.extname(file.relative));
            return {
                plugins: [{
                    cleanupIDs: {
                        prefix: prefix + '-',
                        minify: true
                    }
                }]
            }
        }))
        .pipe(svgstore({ inlineSvg: true }))
        .pipe(cheerio({
            run: function ($) {
                $('svg').attr('style',  'position: absolute; width: 0; height: 0; overflow: hidden;');
            },
            parserOptions: { xmlMode: true }
        }))
        .pipe(rename('symbol-defs.svg'))
        .pipe(gulp.dest('src/theme/images'));
});

/*********************
Reload
*********************/

gulp.task('reload-js', ['footer-scripts-dev', 'header-scripts-dev'], function (done) {
	browserSync.reload();
	done();
});


gulp.task('reload-theme', ['copy-theme-dev'], function (done) {
	browserSync.reload();
	done();
});

gulp.task('watch', function () {
	gulp.watch(['src/scss/**/*.{scss,sass,css}'], ['style-dev']);
	gulp.watch(['src/theme/inc/style/**/*.{scss,sass,css}'], ['login-style-dev', 'admin-style-dev']);
	gulp.watch(['src/js/**'], ['reload-js']);
	gulp.watch(['src/theme/**'], ['reload-theme']);
	gulp.watch(['src/theme/images/SVG/**'], ['svg-icons']);
});

/*********************
End of Build Tasks
*********************/