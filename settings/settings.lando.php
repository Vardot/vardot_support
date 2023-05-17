<?php
/**
 * @file settings.lando.php
 * Lando Local Development Settings.
 */

$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);

// If $lando_database_host was not set in site's settings.php file, detect multisite or use default.
if (empty($lando_database_host)) {

  # If using a multisite $site_path, and a lando database exists by that name, use it.
  list($s, $site_slug) = explode('/', $site_path);
  if (!isset($lando_database_host) && $site_path != 'default' && isset($lando_info[$site_slug]['creds']['database'])) {
    $lando_database_host = $site_slug;
  }
  else {
    // If no $lando_database_host, use "database".
    $lando_database_host = 'database';
  }
}

$databases['default']['default'] = [
  'driver' => 'mysql',
  'database' => $lando_info[$lando_database_host]['creds']['database'],
  'username' => $lando_info[$lando_database_host]['creds']['user'],
  'password' => $lando_info[$lando_database_host]['creds']['password'],
  'host' => $lando_database_host,
  'port' => '3306',
];
$settings['hash_salt'] = md5(getenv('LANDO_HOST_IP'));

# See https://www.drupal.org/docs/getting-started/installing-drupal/trusted-host-settings

# Add all lndo.site urls to trusted_host_patterns.
$settings['trusted_host_patterns'] = [
  # Lando Proxy
  '\.lndo\.site$',

  # Lando Share
  '\.localtunnel\.me$',
];

// Include development mode unless LANDO_PROD_MODE is set.
if (!(bool) getenv('LANDO_PROD_MODE')) {
  // Include drupal's own example.settings.local.php
  if (file_exists(DRUPAL_ROOT . "/sites/example.settings.local.php")) {
    include(DRUPAL_ROOT . "/sites/example.settings.local.php");
  }
}

// Do not redirect to www if using httpswww module.
$config['httpswww.settings']['prefix'] = 'no';
