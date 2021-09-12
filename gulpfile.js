const themename = 'orissa';

const gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync').create(),
	reload = browserSync.reload,
	sass = require('gulp-sass'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

const root = '../' + themename + '/',
	scss = root + 'assets/sass/',
	js = root + 'assets/js/',
	jsDist = root + 'dist/js/';

const phpWatchFiles = root + '**/*.php',
	styleWatchFiles = scss + '**/*.scss',
	jsSrc = js + '**/*.js';

function css() {
	return gulp
		.src(scss + 'style.scss')
		.pipe(
			sass({
				outputStyle: 'compressed',
			}).on('error', sass.logError)
		)
		.pipe(autoprefixer('last 2 versions'))
		.pipe(gulp.dest(root));
}

function editorCSS() {
	return gulp
		.src(scss + 'editor-styles.scss')
		.pipe(
			sass({
				outputStyle: 'expanded',
			}).on('error', sass.logError)
		)
		.pipe(gulp.dest(root));
}

function javascript() {
	return gulp.src(jsSrc).pipe(concat('main.js')).pipe(uglify()).pipe(gulp.dest(jsDist));
}

function watch() {
	browserSync.init({
		open: 'external',
		proxy: 'http://customthemes.test/',
	});
	gulp.watch(styleWatchFiles, css);
	gulp.watch(styleWatchFiles, editorCSS);
	gulp.watch(jsSrc, javascript);
	gulp.watch([phpWatchFiles, jsDist + 'main.js', root + 'style.css']).on('change', reload);
}

exports.css = css;
exports.editorCSS = editorCSS;
exports.javascript = javascript;
exports.watch = watch;

const build = gulp.series(watch);
gulp.task('default', build);
