let gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    imageMin = require('gulp-imagemin'),
    sass = require('gulp-sass'),
    gulpSVG = require('gulp-svg-sprite'),
    bs = require('browser-sync').create();

gulp.task('serve', () => {
    bs.init({
        open: 'external',
        host: 'weparts.loc',
        proxy: 'weparts.loc/src',
        port: 8080
    })

    gulp.watch("./src/**/*.php").on('change', bs.reload)
})

gulp.task('sass', () => {
    return gulp.src('./src/sass/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest("./src/css"))
        .pipe(bs.stream())
})

gulp.task('svg', () => {
    return gulp.src('./src/images/svg/*.svg')
        .pipe(gulpSVG({
            mode: {
                stack: {
                    sprite: "sprite.svg"
                }
            }
        }))
        .pipe(gulp.dest('./src/images/'))
})

gulp.task('watch', () => {
    gulp.watch('./src/sass/**/*.scss', gulp.series(['sass']))
})

gulp.task('default', gulp.series(
    'sass',
    gulp.parallel(['watch'], ['serve'])
))