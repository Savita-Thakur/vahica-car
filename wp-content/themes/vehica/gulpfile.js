var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var cssbeautify = require('gulp-cssbeautify');
var rename = require('gulp-rename')

gulp.task('css', function () {
    return new Promise(function (resolve, reject) {
        gulp.src('assets/scss/main.scss')
            .pipe(sass().on('error', sass.logError))
            .pipe(cssbeautify())
            .pipe(rename('style.css'))
            .pipe(gulp.dest('.'));
        resolve();
    });
});

gulp.task('staticcss', function () {
    return new Promise(function (resolve, reject) {
        gulp.src('assets/scss/main-static.scss')
            .pipe(sass().on('error', sass.logError))
            .pipe(cssbeautify())
            .pipe(rename('assets/css/style-static.css'))
            .pipe(gulp.dest('.'));
        resolve();
    });
});

gulp.task('default', function () {
    gulp.watch('assets/**/**/*.scss', gulp.series('css', 'staticcss'))
});