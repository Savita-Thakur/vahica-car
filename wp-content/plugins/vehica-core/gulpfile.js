let gulp = require('gulp');
let sass = require('gulp-sass');

gulp.task('styles', function () {
    return new Promise(function (resolve, reject) {
        gulp.src('assets/scss/**/*.scss')
            .pipe(sass().on('error', sass.logError))
            .pipe(gulp.dest('assets/css'));
        resolve();
    });
});

gulp.task('default', function () {
    gulp.watch('assets/scss/**/*.scss', gulp.series('styles'))
});