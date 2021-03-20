var gulp = require('gulp');
var sass = require('gulp-dart-sass');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var gulpif = require('gulp-if');
var concat = require('gulp-concat');
var connect = require('gulp-connect-php');
var md5 = require("gulp-md5-plus");
var browserSync = require('browser-sync').create();
const existsSync = require('fs').existsSync;

var src = {
  css: ['assets/css/src/app.scss', 'assets/fonts/devsante/style.css'],
  js: [
        'node_modules/headroom.js/dist/headroom.min.js',
        'node_modules/js-cookie/src/js.cookie.js',
        'node_modules/masonry-layout/dist/masonry.pkgd.js',
        'assets/js/src/**/*.js'
      ],
  php: 'site/**/*.php',
};

var dist = {
  css: 'assets/css',
  js: 'assets/js'
}

var min = {
  css: 'assets/css/app.css',
  js: 'assets/js/app.js'
}

gulp.task('connect-sync', function() {
  const config = {router: 'kirby/router.php'}
  // php.ini used for xdebug configuration
  if(existsSync('./php.ini')) config.ini = './php.ini'
  connect.server(config, function (){
    browserSync.init({
      proxy: '127.0.0.1:8000'
    });
  });

  gulp.watch(["assets/css/src/*.scss",'site/snippets/**/*.scss'], gulp.series('css'));
  gulp.watch('assets/js/src/**/*.js', gulp.series('js'));
  gulp.watch(src.php).on('change', browserSync.reload);

});

gulp.task('css', function () {
  return gulp.src(src.css)
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('app.css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest(dist.css))
    .pipe(browserSync.stream());
});

gulp.task('js', function () {
  return gulp.src(src.js)
    .pipe(gulpif('!**/*.min.js', uglify())) // only uglify() files that have not been minified yet.
    .pipe(concat('app.js'))
    .pipe(gulp.dest(dist.js))
    .pipe(browserSync.stream());
});

gulp.task('cachebust-css', function(){
  return gulp.src(min.css)
    .pipe(md5(10,['site/snippets/*.php','site/config/config.php']))
    .pipe(gulp.dest(dist.css))
});


gulp.task('cachebust-js', function(){
  return gulp.src(min.js)
    .pipe(md5(10,['site/snippets/*.php','site/config/config.php']))
    .pipe(gulp.dest(dist.js))
});


gulp.task("default", gulp.series("css", "js", "connect-sync"));
gulp.task("prod", gulp.series("cachebust-css", "cachebust-js"));
