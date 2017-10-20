var gulp = require('gulp'),
	browserSync = require('browser-sync').create(),
	image = require('gulp-image'),
	jshint = require('gulp-jshint'),
	less = require('gulp-less'),
	sourcemaps = require('gulp-sourcemaps'),

	uglify = require('gulp-uglify'),
	plumber = require('gulp-plumber'),
	concat = require('gulp-concat')
;

// Uglify/minify scripts
gulp.task('scripts', function(){
	gulp.src('dev/js/**/*.js')
	.pipe(plumber())
	.pipe(concat('scripts.js'))
	.pipe(uglify())
	.pipe(gulp.dest('wedding/wp-content/themes/graith/js/'));
});

// Compile Less
gulp.task('styles', function() {
	gulp.src('dev/less/style.less')
	.pipe(plumber())
	.pipe(less({
		filename: 'style.less',
		compress: true
	}))
	.pipe(gulp.dest('wedding/wp-content/themes/graith/'));
});


// Watch file changes
gulp.task('watch', function() {
	browserSync.init ({
		open: 'external',
		proxy: 'wedding.local',
		port: 8080
	});
	gulp.watch('dev/js/**/*.js', ['scripts']);
	gulp.watch('dev/less/**/*.less', ['styles']);
	gulp.watch('dev/**/*').on('change', browserSync.reload);
});

// Default task
gulp.task('default', ['scripts', 'styles', 'watch']);