// include gulp
var gulp = require('gulp');

// JS hint task
var jshint = require('gulp-jshint');
var changed = require('gulp-changed');
gulp.task('jshint', function () {
    gulp.src('./src/scripts/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// minify new images
var imagemin = require('gulp-imagemin');
gulp.task('imagemin', function () {
    var imgSrc = './src/images/**/*',
        imgDst = './build/images';

    gulp.src(imgSrc)
        .pipe(changed(imgDst))
        .pipe(imagemin())
        .pipe(gulp.dest(imgDst));
});

// minify all html files
var minifyHTML = require('gulp-minify-html');
gulp.task('htmlpage', function () {
    var htmlSrc = './src/*.html',
        htmlDst = './build';

    gulp.src(htmlSrc)
        .pipe(changed(htmlDst))
        .pipe(minifyHTML())
        .pipe(gulp.dest(htmlDst));
});

// JS concat, strip debugging and minify
var concat = require('gulp-concat');
var stripDebug = require('gulp-strip-debug');
var uglify = require('gulp-uglify');
gulp.task('scripts', function () {
    gulp.src(['./src/scripts/lib.js', './src/scripts/*.js'])
        .pipe(concat('main.js'))
        //.pipe(stripDebug())
        .pipe(uglify())
        .pipe(gulp.dest('./build/scripts/'));
});

// Compile TypeScript
var ts = require('gulp-typescript');
gulp.task('scripts-ts', function () {
    gulp.src(['./src/scripts/*.ts'])
        .pipe(ts({
            noImplicitAny: true,
            out: 'output.js'
        }))
        .pipe(gulp.dest('./src/scripts/'));
});

// CSS concat, auto-prefix and minify
var autoprefix = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
gulp.task('styles', function () {
    gulp.src(['./src/styles/*.css'])
        .pipe(concat('styles.css'))
        .pipe(autoprefix('last 2 versions'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('./build/styles/'));
});

//Scss compile
var sass = require('gulp-sass');
var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded'
};
gulp.task('scss-compile', function () {
     gulp.src('./src/styles/*.scss')
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(gulp.dest('./src/styles/'));
});

//Less compile
var less = require('gulp-less');
gulp.task('less-compile', function () {
     gulp.src('./front_end/_less/styles.less')
        .pipe(less())
        .pipe(gulp.dest('./front_end/css/'));
});

// default gulp task
gulp.task('default', ['less-compile'], function () {
    // watch for Less change
    gulp.watch('./front_end/_less/*.less', ['less-compile']);

});


