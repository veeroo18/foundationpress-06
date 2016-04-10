var gulp = require('gulp');
var $    = require('gulp-load-plugins')();

var uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    launch = require('gulp-copy'),
    sourcemaps = require('gulp-sourcemaps');

//////////////////--VERY IMPORTANT BEFORE RUNNING GULP--////////////////////////////

var buildPath = "c:/wamp/www/lab/wp-content/themes/fp6/" ; // launch folder

////////////////////////////////////////////////////////////////////////////////////

// uglify minify js files 
gulp.task('js-fef', function(){
    return gulp.src(['_assets/js/app.js'])
        .pipe(sourcemaps.init())
        .pipe(concat('concat.js'))
        .pipe(gulp.dest('_assets/js/'))
        .pipe(rename('app.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(buildPath+'/js'));
});

// create css files
var sassPaths = [
  './bower_components/foundation-sites/scss',
  './bower_components/motion-ui/src'
];

gulp.task('sass', function() {
  return gulp.src('_assets/scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle:'compressed'
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(rename('app.min.css'))
    .pipe(gulp.dest(buildPath+'/css'));
});

gulp.task('style', function() {
  return gulp.src('_assets/scss/style.scss')
      .pipe($.sass())
      .pipe(gulp.dest(buildPath));
});

// copy php files to build folder
gulp.task('buildPhps',function() {
  return gulp.src('./_assets/phps/**/*.*')
    .pipe(gulp.dest(buildPath));
});

gulp.task('buildImgs',function() {
  return gulp.src('./_assets/images/**/*.{png,jpg,gif,svg}')
    .pipe(gulp.dest(buildPath+'/images'));
});


gulp.task('default', ['js-fef','style','sass','buildPhps','buildImgs'], function() {
  gulp.watch(['_assets/scss/**/*.scss'], ['sass','style']),
  gulp.watch(['_assets/js/**/*.js'], ['js-fef']),
  gulp.watch(['_assets/images/**/*.*'], ['buildImgs']),
  gulp.watch(['_assets/phps/*.php'], ['buildPhps']);
});
