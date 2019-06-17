var gulp = require('gulp'); // import gulp
var sass = require('gulp-sass'); // import sass
var concat = require('gulp-concat');// import concat : concatène les fichiers js du theme dans le fichier theme.js
var imagemin = require('gulp-imagemin');// import imagemin : optimise les images du theme
var plumber = require('gulp-plumber');// import plumber : empeche le precess de s'arréter sur une erreur et affiche des messages d'erreur perso
var notify = require('gulp-notify');// import notify : affiche des push windows lors d'erreurs
var browserSync = require('browser-sync').create();// import browser-sync : permet d'afficher les modificaiton css sans reload de la page
var reload = browserSync.reload;
var autoprefixer = require('gulp-autoprefixer');// import autoprefixer : rajoute les prefixes navigateur au regle css récentes
var sourcemaps = require('gulp-sourcemaps');// import sourcemaps : créer des fichiers map pour lier un règle css a son fichier d'origine
var cleanCSS = require('gulp-clean-css');// import clean-css : minifie le css
var uglify = require('gulp-uglify');// import uglify : compresse le js
// var criticalCss = require('gulp-penthouse'); // Analyse le css necessaire à l'affichage de la partie du site audessus de la ligne de flotaison et en génère un fichier
var template = require('gulp-template');

var pkg = require('./package.json');
var ProjectVhost = pkg.projectVhost;
var themeName = pkg.name;

// options pour autoprefixer
var autoprefixerOptions = {
  browsers: ['last 6 versions']
};

// erreur personnalisée pour plumber
var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

// task sass : compile le fichier style.scss en css, générere les sourcemaps, autoprefixe et met à jour browser sync
gulp.task('sass', function () {
  gulp.src('../style.scss')
  	.pipe(plumber(plumberErrorHandler))
  	.pipe(sourcemaps.init())
    .pipe(template({pkg: pkg}))
    .pipe(sass())
    .pipe(sourcemaps.write())
    .pipe(autoprefixer())
    .pipe(gulp.dest('../'))
    .pipe(reload({ stream:true }));
});


// task sass-prod : compile le fichier style.scss en css, autoprefixe et minifie le css
gulp.task('sass-prod', function () {
  gulp.src('../style.scss')
  	.pipe(plumber(plumberErrorHandler))
    .pipe(template({pkg: pkg}))
    .pipe(sass())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(cleanCSS())
    .pipe(gulp.dest('../to-deploy'))
});

// task js-prod : compresse le fichier theme.js
gulp.task('js-prod', function () {
	gulp.src('../script.js')
		.pipe(uglify())
		.pipe(gulp.dest('../to-deploy'))
});

//task assets-prod : compresse les fichiers js des assets
gulp.task('assets-js-prod', function () {
	gulp.src(['../assets/js/*.js','../assets/js/*.min.js'])
		.pipe(uglify())
		.pipe(gulp.dest('../to-deploy/assets/js'))
});

//task assets-prod : compresse les fichiers js des assets
gulp.task('assets-css-prod', function () {
	gulp.src('../assets/css/*.css')
		.pipe(cleanCSS())
		.pipe(gulp.dest('../to-deploy/assets/css'))
});

// task img : optimise les images du thème
gulp.task('img-prod', function() {
  gulp.src('../img/*.*')
  	.pipe(plumber(plumberErrorHandler))
    .pipe(imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 7}),
        imagemin.svgo({plugins: [{removeViewBox: false}]})
    ], {
        verbose: true
    }))
    .pipe(gulp.dest('../to-deploy/img'))
});

//task copy-theme-files : copie les fichiers php,md,png du thèmes vers le dossier "to-deploy"
gulp.task('copy-theme-files', function() {
  gulp.src('../*.{php,md,png}')
    .pipe(gulp.dest('../to-deploy'))
});

// task watch : surveille les changements dans les fichiers du theme
gulp.task('watch', function() {
  gulp.watch('../scss/**/*.scss', ['sass']);
});

// task serve : lance les taches 'sass', 'watch' et initialise browser sync
gulp.task('serve',['sass', 'watch'], function(){
  browserSync.init({
  	proxy  : ProjectVhost,
  });
});

// task prod : lance les taches 'sass-prod', 'js-prod' et 'img' en vue d'une mise en prod
gulp.task('prod',['sass-prod', 'js-prod', 'assets-js-prod', 'assets-css-prod', 'img-prod', 'copy-theme-files']);

// tache par defaut de gulp : lance les taches 'sass', 'js', 'img', 'watch'
gulp.task('default', ['sass','watch']);
