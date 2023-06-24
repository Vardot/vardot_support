<?php
/**
 * @file settings.lando.php
 * Lando Local Development Settings.
 */

$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
$settings['hash_salt'] = md5(getenv('LANDO_HOST_IP'));

# See https://www.drupal.org/docs/getting-started/installing-drupal/trusted-host-settings

# Add all lndo.site urls to trusted_host_patterns.
$settings['trusted_host_patterns'] = [
  # Lando Proxy
  '\.lndo\.site$',
  '\.internal$',
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

// To alter what database host is used, set LANDO_DATABASE_HOST.
$lando_database_host = getenv('LANDO_DATABASE_HOST') ?: 'database';

// Set 'standard' env vars.
putenv('MYSQL_DATABASE=' . $lando_info[$lando_database_host]['creds']['database']);
putenv('MYSQL_USER=' . $lando_info[$lando_database_host]['creds']['user']);
putenv('MYSQL_PASSWORD=' . $lando_info[$lando_database_host]['creds']['password']);
putenv('MYSQL_HOSTNAME=' . $lando_info[$lando_database_host]['internal_connection']['host']);
putenv('MYSQL_PORT=' . $lando_info[$lando_database_host]['internal_connection']['port']);
