'use strict';

import config        from '../config';
import gulp          from 'gulp';
import merge         from 'merge-stream';
import templateCache from 'gulp-angular-templatecache';

// Views task
gulp.task('views', function() {

  // Process any other view files from app/views
  const views = gulp.src(config.views.src)
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.views.dest));

  return merge(views);

});
