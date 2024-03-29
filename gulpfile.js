var gulp          = require('gulp'),
	sass          = require('gulp-sass'),
	autoprefixer  = require('gulp-autoprefixer'),
	refresh       = require('gulp-livereload'),
	uglify        = require('gulp-uglify'),
	fs            = require('fs'),
	server        = require('tiny-lr')(),
	config        = {
		'src': fs.realpathSync('./')+'/src/resources',
		'dst': fs.realpathSync('./')+'/webroot'
	};

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
	gulp.src(config.src+'/sass/*.scss').
		pipe(sass({
			outputStyle: 'compressed'
		}).on('error', sass.logError)).
		pipe(gulp.dest(config.dst+'/css')).
		pipe(refresh(server));
	return true;
});

gulp.task('scripts', function(){

});

gulp.task('bower', function(){
	return gulp.src(config.src+'/vendor/**/*').
		on('error', function(e){
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
	gulp.watch(config.src+'/sass/*.scss', ['styles']);
	//gulp.watch(config.src+'/js/*.js', ['scripts']);
	gulp.watch(config.src+'/img/**/*', ['images']);
	//gulp.watch(config.src+'/bower/**/*', ['bower']);
});
