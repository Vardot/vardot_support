<?php
/**
 * @file settings.lando.php
 * Lando Local Development Settings.
 */

$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);

// If you have a special lando setup, such as multisite with multiple databases, add logic to your settings.php file
// before the vardot_support include to set $lando_database_host to be the lando service name.
if (empty($lando_database_host)) {
    // Default to "database".
    $lando_database_host = 'database';
}

$databases['default']['default'] = [
  'driver' => 'mysql',
  'database' => $lando_info[$lando_database_host]['creds']['database'],
  'username' => $lando_info[$lando_database_host]['creds']['user'],
  'password' => $lando_info[$lando_database_host]['creds']['password'],
  'host' => $lando_info[$lando_database_host]['internal_connection']['host'],
  'port' => $lando_info[$lando_database_host]['internal_connection']['port'],
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
