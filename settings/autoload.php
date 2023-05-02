<?php
/**
 * @file autoload.php
 *
 * This file is included very early in calls to this site.
 *
 * This allows us to alter things like DRUSH_OPTIONS_URI before drush bootstraps.
 */

/**
 * Set DRUSH_OPTIONS_URI from lando info, if it exists.
 */
if ((bool) getenv('LANDO')) {
  $lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
  putenv('DRUSH_OPTIONS_URI=' . $lando_info['appserver']['urls'][1]);
}
