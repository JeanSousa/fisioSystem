var gulp    = require('gulp');
var plumber = require('gulp-plumber');
var uglify  = require('gulp-uglify');
var concat  = require('gulp-concat');
var rename  = require('gulp-rename');



//source path

var js_src = './resources/js/functions/*.js';

//dist path
var js_dist = './public/js/';
var js_dist_name = "scripts.js";


//Minify e concat scripts
gulp.task('scripts', function(){
   return gulp.src(js_src)
     .pipe(plumber())
     .pipe(uglify())
     .pipe(concat(js_dist_name))
     .pipe(gulp.dest(js_dist));
});

gulp.task('watch', function(){
    gulp.watch(['./resources/js/functions/*.js'], ['scripts']);
});

