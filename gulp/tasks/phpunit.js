import config from '../config';
import gulp from 'gulp';
import phpunit from 'gulp-phpunit';
import notify from 'gulp-notify';


gulp.task('phpunit', function() {
    gulp.src(config.tests.src)
        .pipe(phpunit('', { debug: false, notify: false }))
        .on('error', notify.onError({
            title: 'Dangit',
            message: 'Integration tests failed!',
            icon: __dirname + '/../icons/red.png'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'Integration tests have returned green!',
            icon: __dirname + '/../icons/green.png'
        }));
});