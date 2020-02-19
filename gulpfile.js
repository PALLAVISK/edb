var gulp = require('gulp');
var sass = require('gulp-sass');

//task for compiled scss files to css.
gulp.task('sass', function () {
    return gulp.src('./sass/abc.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});