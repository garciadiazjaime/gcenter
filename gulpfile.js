var gulp = require('gulp'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    ngAnnotate = require('gulp-ng-annotate'),
    jshint = require('gulp-jshint'),
    nodemon = require('gulp-nodemon'),
    stylish = require('jshint-stylish');

gulp.task('js', function() {
    gulp.src(['angular_components/**/*.js'])
        .pipe(sourcemaps.init())
        .pipe(concat('app.js'))
        // .pipe(ngAnnotate())
        // .pipe(uglify())
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/js'));
});

gulp.task('lint', function() {
  return gulp.src('**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// function lintTask() {
//     return gulp.src(['**/*.js'])
//         .pipe(jshint()) 
//         .pipe(jshint.reporter('jshint-stylish'))
//         .pipe(jshint.reporter('fail'));
// }

// gulp.task('lint', lintTask);

gulp.task('watch:lint', function(){
    gulp.watch('**/*.js', ['lint', 'js']);
});

gulp.task('dev:server', function() {
    nodemon({
        script: 'app.js',
        ext: 'js'
    });
});

gulp.task('dev', ['lint', 'watch:lint', 'dev:server']);