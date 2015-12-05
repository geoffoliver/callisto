var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	refresh = require('gulp-livereload'),
	lr = require('tiny-lr'),
	notify = require('gulp-notify'),
	uglify = require('gulp-uglify'),
	fs = require('fs'),
	config = {
		'src': fs.realpathSync('./')+'/src/resources',
		'dst': fs.realpathSync('./')+'/webroot'
	};

var server = lr();

gulp.task('livereload', function(){
	server.listen(35729, function(err){
		if(err){
			return console.log(err);
		}
	});
});

gulp.task('fonts', function(){
	var flatten = require('gulp-flatten');
	return gulp.src(config.src+'/**/fonts/**').
		pipe(flatten()).
		pipe(gulp.dest(config.dst+'/fonts'));
});

gulp.task('styles', function(){
	return true;
});

gulp.task('scripts', function(){

});

gulp.task('bower', function(){
	return gulp.src(config.src+'/vendor/**/*').
		on('error', function(e){
			notify('Error processing bower components');
			console.log(e.message);
			this.emit('end');
			return;
		}).
		pipe(gulp.dest(config.dst+'/vendor'));
});

gulp.task('images', function(){
	var imagemin = require('gulp-imagemin');
	return gulp.src(config.src+'/img/**/*').
		pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true})).
		pipe(gulp.dest(config.dst+'/img'));
});


gulp.task('watch', ['livereload'], function(){
	gulp.watch(config.src+'/sass/**/*.sass', ['styles']);
	gulp.watch(config.src+'/js/**/*.js', ['scripts']);
	gulp.watch(config.src+'/img/**/*', ['images']);
	gulp.watch(config.src+'/bower/**', ['bower']);
});
