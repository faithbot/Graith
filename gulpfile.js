var gulp = require('gulp'),
	browserSync = require('browser-sync').create(),
	image = require('gulp-image'),
	jshint = require('gulp-jshint'),
	less = require('gulp-less'),
	uglify = require('gulp-uglify'),
	plumber = require('gulp-plumber'),
	sourcemaps = require('gulp-sourcemaps')
;


// variables

// app theme folder
// /wedding/wp-content/themes/graith/
destination = '/wedding/wp-content/themes/graith/',

scss = '/dev/sass/',
js = '/dev/js/',
img = '/dev/img/',
// languages ='/dev/languages/';


// tasks

// Uglify/minify scripts
gulp.task('scripts', function(){
	gulp.src('js/**/*.js')
	.pipe(plumber())
	//.pipe(concat('scripts.js'))
	.pipe(uglify())
	.pipe(gulp.dest('/wedding/wp-content/themes/graith/'));
});

// Compile Less
gulp.task('styles', function() {
	gulp.src('dev/less/styles.less')
	.pipe(plumber())
	.pipe(less({
		filename: 'styles.less',
		compress: true
	}))
	.pipe(gulp.dest('wedding/wp-content/themes/graith/'));
});


// Watch file changes
gulp.task('watch', function() {
	gulp.watch('dev/js/**/*.js', ['scripts']);
	gulp.watch('dev/less/**/*.less', ['styles']);
});

// Default task
gulp.task('default', ['scripts', 'styles', 'watch']);