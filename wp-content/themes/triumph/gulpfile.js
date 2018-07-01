var gulp = require('gulp'),
  sass = require('gulp-sass'),
  jshint = require('gulp-jshint'),
  autoprefixer = require('gulp-autoprefixer'),
  livereload = require('gulp-livereload');

// gulp.task('sass', function() {
// 	return sass ('build/style.scss', {style: 'compressed'})
// 	.pipe(autoprefixer('last 2 version'))
// 	.pipe(gulp.dest('./css'))

// });

gulp.task('styles', function() {
  gulp
    .src('build/style.scss')
    .pipe(sass({ outputStyle: 'compressed' }))
    .on('error', sass.logError)
    .pipe(autoprefixer('last 4 versions'))

    .pipe(gulp.dest('./css'));
});

gulp.task('jshint', function() {
  gulp
    .src('./scripts/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(livereload());
});

gulp.task('watch', function() {
  livereload.listen();
  //watch .scss files
  gulp.watch('build/**/*.scss', ['styles']);
});

gulp.task('default', ['styles', 'watch']);
