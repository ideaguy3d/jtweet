let gulp = require('gulp');
let browserify = require('browserify');
let babelify = require('babelify');
let source = require('vinyl-source-stream');


gulp.task('browserify', function () {
    return browserify('./app/app.js')
        .transform(babelify) //, { stage: 0 }
        .bundle()
        .pipe(source('bundle.js'))
        .pipe(gulp.dest('app'));
});


gulp.task('watch', function () {
    gulp.watch('**/*.js', ['browserify']);
});