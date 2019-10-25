var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var runSequence = require('run-sequence');
var connect = require('gulp-connect-php');

// Development 
// -----------------

gulp.task('connect-sync', function() {
    console.log("loading");
    connect.server({
        base: './app',
        keepalive: true
    }, function() {
        browserSync.init({
            injectChanges: true,
            proxy: 'localhost/web-assignment',
        });
    });
    gulp.start('sass');
    gulp.start('watch');
});


gulp.task('sass', function() {
    console.log("sass");
    return gulp.src('app/assets/stylesheets/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('app/assets/stylesheets'))
});

// Watchers
gulp.task('watch', function() {
    console.log(JSON.stringify(browserSync));
    gulp.watch('app/assets/stylesheets/**/*.scss', ['sass']);
    gulp.watch('app/**/*.html', browserSync.reload);
    gulp.watch('app/**/*.php', browserSync.reload);
    gulp.watch('app/**/*.js', browserSync.reload);
});

gulp.task('default', function(callback) {
    runSequence(['connect-sync'],
        callback
    )
});