'use strict';

import config from '../config';
import gulp   from 'gulp';

gulp.task('watch', [], function() {

  global.isWatching = true;

  // Scripts are automatically watched and rebundled by Watchify inside Browserify task
  gulp.watch(config.scripts.src, ['eslint', 'browserify']);
  gulp.watch([config.specs.src, config.php.src], ['phpspec']);
  gulp.watch([config.tests.src, config.php.src], ['phpunit']);
  gulp.watch(config.styles.src,  ['styles']);
  gulp.watch(config.images.src,  ['images']);
  gulp.watch(config.fonts.src,   ['fonts']);
  gulp.watch(config.views.watch, ['views']);
});