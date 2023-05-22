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
if ((bool) getenv('LANDO') && empty(getenv('DRUSH_OPTIONS_URI'))) {
  $lando_info = json_decode(getenv('LANDO_INFO'), TRUE);

  // Set DRUSH_OPTIONS_URI unless already set.
  foreach ($lando_info['appserver']['urls'] as $url) {
    if (strpos($url, 'https') === 0) {
      if (str_contains($url, getenv('LANDO_APP_NAME'))) {
        $main_url = $url;
      }
    }
  }
  putenv('DRUSH_OPTIONS_URI=' . $main_url);

}
