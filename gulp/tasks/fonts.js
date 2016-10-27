'use strict';

import config      from '../config';
import changed     from 'gulp-changed';
import gulp        from 'gulp';

gulp.task('fonts', function() {

  return gulp.src(config.fonts.src)
    .pipe(changed(config.fonts.dest)) // Ignore unchanged files
    .pipe(gulp.dest(config.fonts.dest));

});
