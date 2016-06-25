var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var connect = require('gulp-connect-php');
var browserSync = require('browser-sync').create();

var src = {
    scss: 'assets/scss/app.scss',
    css: 'assets/css',
    php: 'site/**/*.php',
};

gulp.task('connect-sync', function() {
  connect.server({}, function (){
    browserSync.init({
      proxy: '127.0.0.1:8000'
    });
  });

  gulp.watch("assets/scss/*.scss", ['sass']);
  gulp.watch(src.php).on('change', browserSync.reload);

});

/*gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./app"
    });

    gulp.watch(src.scss, ['sass']);
    gulp.watch(src.php).on('change', browserSync.reload);
});
*/

gulp.task('sass', function () {
  return gulp.src(src.scss)
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('app.css'))
    .pipe(gulp.dest(src.css))
    .pipe(browserSync.stream());
});

gulp.task('default', ['connect-sync']);

