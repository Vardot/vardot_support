<?php
/**
 * @file settings.lando.php
 * Lando Local Development Settings.
 */

$database_host = 'database';
$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);

$databases['default']['default'] = [
  'driver' => 'mysql',
  'database' => $lando_info[$database_host]['creds']['database'],
  'username' => $lando_info[$database_host]['creds']['user'],
  'password' => $lando_info[$database_host]['creds']['password'],
  'host' => $database_host,
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
