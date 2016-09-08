
// Aqui nós carregamos o gulp e os plugins através da função `require` do nodejs
var gulp = require('gulp');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var cssmin = require('gulp-cssmin');
var imagemin = require('gulp-imagemin');
var sass = require('gulp-sass');

// Definimos o diretorio dos arquivos para evitar repetição futuramente
var files = "assets/js/*.js";

//Aqui criamos uma nova tarefa através do ´gulp.task´ e damos a ela o nome 'lint'
gulp.task('lint', function() {
 
// Aqui carregamos os arquivos que a gente quer rodar as tarefas com o `gulp.src`
// E logo depois usamos o `pipe` para rodar a tarefa `jshint`
gulp.src(files)
.pipe(jshint())
.pipe(jshint.reporter('default'));
});
 
//Criamos outra tarefa com o nome 'dist'
gulp.task('dist', function() {
 
// Carregamos os arquivos novamente
// E rodamos uma tarefa para concatenação
// Renomeamos o arquivo que sera minificado e logo depois o minificamos com o `uglify`
// E pra terminar usamos o `gulp.dest` para colocar os arquivos concatenados e minificados na pasta build/
gulp.src(files)
//.pipe(concat('./prod/js'))
.pipe(rename({suffix: '.min'}))
.pipe(uglify())
.pipe(gulp.dest('./dist/js'));
});
 


gulp.task('sass', function () {
  return gulp.src('./assets/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cssmin())
	.pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./dist/css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./assets/sass/**/*.scss', ['sass']);
});


gulp.task('imagemin', function() {
    return gulp.src('assets/images/**/**.*')
    .pipe(imagemin({ progressive: true }))
    .pipe(gulp.dest('dist/images'));
});



gulp.task('default', ['lint', 'dist', 'sass', 'sass:watch', 'imagemin']);