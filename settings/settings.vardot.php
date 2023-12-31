<?php

/**
 * @file
 * settings.vardot.php
 *
 * This file will be included by any site using drupal/vardot_support, if it has been properly appended to settings.php by drupal-scaffolding.
 *
 * This is an attempt at standardizing settings.php for Vardot Supported sites.
 *
 * This is an ongoing work in progress.
 *
 * We will probably end up building something else for this, like the settings.php stuff from acquia/blt
 *
 * Until then....
 */

/**
 * Backups.
 *
 * Add to project's settings.php file to allow backups to vardot servers.
 *
 * $settings['vardot_backup_migrate_destination_host'] = 'dsd.vardot.io';
 * $settings['vardot_backup_migrate_destination_user'] = 'support';
 * $settings['vardot_backup_migrate_destination_path'] = '~/PROJECT';
 */
if (!empty($settings['vardot_backup_migrate_destination_host'])) {
  require 'settings.flysystem.php';
}
else {
  // @TODO: Show a warning in status page, if we can.
}

/**
 * Lando.
 */
if ((bool) getenv('LANDO')) {
  require 'settings.lando.php';
}

/**
 * DDEV.
 */
if ((bool) getenv('IS_DDEV_PROJECT')) {
  require 'settings.ddev.php';
}

/**
 * Acquia.
 *
 * Loads settings file from acquia/blt or the environment.
 */
if ((bool) getenv('AH_SITE_ENVIRONMENT')) {
  if (file_exists(DRUPAL_ROOT . "/../vendor/acquia/blt/settings/blt.settings.php")) {
    require DRUPAL_ROOT . "/../vendor/acquia/blt/settings/blt.settings.php";
  }
  elseif (file_exists('/var/www/site-php')) {
    require '/var/www/site-php/' . $_ENV['AH_SITE_GROUP'] . '/' . $_ENV['AH_SITE_GROUP'] . '-settings.inc';
  }

  // Include site local production settings if on Acquia PROD.
  $site_local_production_settings = $app_root . '/' . $site_path . '/settings.production.php';
  if ("prod" == getenv('AH_SITE_ENVIRONMENT') && file_exists($site_local_production_settings)) {
    require $site_local_production_settings;
  }
}

/**
 * Platform.sh.
 */
if ((bool) getenv('PLATFORM_ENVIRONMENT')) {
  require 'settings.platformsh.php';
}

/**
 * Production.
 *
 * Include settings.production.php if prod environment detected.
 */
// Set DRUPAL_ENV to prod if prod environment is detected.
switch (TRUE) {
  // Acquia
  case "prod" == getenv('AH_SITE_ENVIRONMENT'):

    // Platform.sh
  case "production" == getenv('PLATFORM_ENVIRONMENT_TYPE'):

    // Pantheon
  case "live" == getenv('PANTHEON_ENVIRONMENT'):

    // OVH
  case strpos(php_uname(), 'srv02.prodcloud.vardot.io') !== FALSE;

    // DevShop
  case "production" == getenv('DEVSHOP_ENVIRONMENT_TYPE'):

    // Lando emulated prod mode
  case (bool) getenv('LANDO_PROD_MODE'):

    if (file_exists($app_root . '/' . $site_path . '/settings.production.php')) {
      require $app_root . '/' . $site_path . '/settings.production.php';
    }
    putenv('DRUPAL_ENV=prod');
}

// If DRUPAL_ENV is not set, assume 'dev'
if (!(bool) getenv('DRUPAL_ENV')) {
  putenv('DRUPAL_ENV=dev');
}

// If DRUPAL_ENV==dev, load local settings.
if (getenv('DRUPAL_ENV') == 'dev') {
  // Include this sites settings.local.php
  if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
    include $app_root . '/' . $site_path . '/settings.local.php';
  }
  // Include drupal's own example.settings.local.php
  elseif (file_exists($app_root . "/sites/example.settings.local.php")) {
    include $app_root . "/sites/example.settings.local.php";
  }
}


// Set DRUPAL_ENV to prod if prod environment is detected.
switch (TRUE) {
  // Acquia
  case (bool) getenv('AH_SITE_ENVIRONMENT'):
    putenv('DRUPAL_SITE_HOST_PROVIDER=acquia');
    break;

  // Platform.sh
  case (bool) getenv('PLATFORM_ENVIRONMENT_TYPE'):
    putenv('DRUPAL_SITE_HOST_PROVIDER=platformsh');
    break;

  // Pantheon
  case (bool) getenv('PANTHEON_ENVIRONMENT'):
    putenv('DRUPAL_SITE_HOST_PROVIDER=pantheon');
    break;

  // OVH
  // @TODO: Set DRUPAL_SITE_HOST_PROVIDER=ovh and DRUPAL_ENV=prod on OVH.
  case strpos(php_uname(), 'srv02.prodcloud.vardot.io') !== FALSE;
    putenv('DRUPAL_SITE_HOST_PROVIDER=ovh');
    break;

  // DevShop
  case isset($_SERVER['DEVSHOP_ENVIRONMENT']):
    putenv('DRUPAL_SITE_HOST_PROVIDER=devshop');
    break;
}


if (empty($databases['default']['default'])) {
  // Global database settings from ENV vars.
  // These can be set a number of ways:
  // - settings.HOST.php can automatically detect them.
  $databases['default']['default'] = [
    'driver' => 'mysql',
    'database' => getenv('MYSQL_DATABASE'),
    'username' => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PASSWORD'),
    'host' => getenv('MYSQL_HOSTNAME'),
    'port' => getenv('MYSQL_PORT'),
    'prefix' => '',
    'init_commands' => [
      'isolation_level' => 'SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED',
    ],
  ];
}

// @TODO: Detect appropriate namespace depending on drupal version.
$databases['default']['default']['namespace'] = 'Drupal\\Core\\Database\\Driver\\mysql';

$settings['rebuild_access'] = FALSE;


/**
 * Final overrides, if not set already.
 */
$settings['config_sync_directory'] = $settings['config_sync_directory'] ?? '../config/sync';
$settings['file_public_path'] = $settings['file_public_path'] ?? 'files';
$settings['file_private_path'] = $settings['file_private_path'] ?? 'private';

$settings['config_exclude_modules'] = ['devel', 'stage_file_proxy'];
$config['raven.settings']['environment'] = $_SERVER['SERVER_NAME'];
