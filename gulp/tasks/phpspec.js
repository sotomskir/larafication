import config from '../config';
import gulp from 'gulp';
import phpspec from 'gulp-phpspec';
import run from 'gulp-run';
import notify from 'gulp-notify';

gulp.task('phpspec', function() {
    gulp.src(config.specs.src)
    // .pipe(run('clear'))
        .pipe(phpspec('', {notify: true}))
        .on('error', notify.onError({
            title: 'Dangit',
            message: 'Unit tests failed!',
            icon: __dirname + '/../icons/red.png'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'Unit tests have returned green!',
            icon: __dirname + '/../icons/green.png'
        }));
});