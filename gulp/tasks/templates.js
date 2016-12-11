'use strict';

import config      from '../config';
import changed     from 'gulp-changed';
import gulp        from 'gulp';

gulp.task('templates', function() {

  return gulp.src(config.templates.src)
    .pipe(changed(config.templates.dest)) // Ignore unchanged files
    .pipe(gulp.dest(config.templates.dest));

});
