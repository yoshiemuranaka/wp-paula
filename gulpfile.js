var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var uglify = require('gulp-uglify');
var newer = require('gulp-newer');
var svgmin = require('gulp-svgmin');

var paths = {
  scripts: 'js/*',
  scss: 'sass/**',
  images: 'images/*'
};

/*
Task for compiling Sass files
*/
gulp.task('build:css', function () {
  return sass(paths.scss, {
  	sourcemap: false, 
  	noCache: true,
  	style: 'compressed'
  })
  .on('error', sass.logError)
  .pipe(gulp.dest(''))
});

/*
Task to minify JavaScript files
*/
gulp.task('build:js', function() {
  return gulp.src(paths.scripts)
    .pipe(newer('dist/scripts'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/scripts'));
});

/*
Task to optimize svgs and copy images
*/
gulp.task('build:svg', function(){
  gulp.src('images/*.svg')
  .pipe(svgmin())
  .pipe(gulp.dest(''));
})

gulp.task('watch', function() {
  gulp.watch(paths.scss, ['build:css']);
  // gulp.watch(paths.scripts, ['build:js']);
  gulp.watch(paths.images, ['build:svg']);
});

gulp.task('default', ['build:css', 'build:svg', 'watch']);

