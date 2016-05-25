'use strict';

//require
var gulp = require('gulp');							          //gulp
var plumber = require('gulp-plumber');				    //plumber
var gulpConcat = require('gulp-concat');			    //concat
var gulpUglify = require('gulp-uglify');			    //uglify
var sourceMaps = require('gulp-sourcemaps');		  // sourcemaps
var autoprefixer = require('gulp-autoprefixer');	// autoprefixr
var sass = require('gulp-sass');					        // sass


// tasks
// concat + min js scripts
gulp.task('concatScripts', function() {
	gulp.src([
		// include all _js/vendor files
		'_js/vendor/*.js',
		// don't include
		'!_js/vendor/jquery-1.11.1.min.js',
		'!_js/vendor/selectivizr.min.js',
		'!_js/vendor/modernizr.min.js',
		// include main.js
		'_js/main.js'
	])
	.pipe(plumber())
	.pipe(gulpConcat('main.min.js'))
	.pipe(gulpUglify())
	.pipe(gulp.dest('_js'));
});

// sass
gulp.task('compileSass', function(){
	gulp.src('style.scss')
		// pipe sourcemaps to sass
		.pipe(sourceMaps.init())
		.pipe(plumber())
		.pipe(sass({outputStyle: 'compressed'}))
		// pipe prefixr
		.pipe(autoprefixer({
			browsers: ['last 2 versions', 'IE 9', 'IE 8', 'IE 7'],
			cascade: false
		}))
		// write sourcemaps
		.pipe(sourceMaps.write('./'))
		.pipe(gulp.dest('./'));
});

// watchFiles
gulp.task('watchFiles', function() {
	gulp.watch('style.scss', ['compileSass']);
	gulp.watch('_scss/**/*.scss', ['compileSass']);
	gulp.watch(['_js/**/*.js', '!_js/main.min.js'], ['concatScripts']);
});

// build
gulp.task('build', ['compileSass']);

// default task
gulp.task('default', ['build']);
