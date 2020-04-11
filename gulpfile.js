var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');


function mytask(callback){
    // body
    callback();
}

exports.mytask = mytask;

function defaultTask(cb) {
    console.log('running default task: uglify js');
    var path1 = 'wp-content/themes/my-website-theme/js/scripts.js';
    var path2 = 'js/**/*.js';
    gulp.src(path1)
        .pipe(uglify())
        .pipe(gulp.dest('build'));
    cb();
}

exports.default = defaultTask