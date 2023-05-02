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

$settings['config_sync_directory'] = '../config/sync';
$settings['file_public_path'] = 'files';
$settings['file_private_path'] = 'private';

$config['raven.settings']['environment'] = $_SERVER['SERVER_NAME'];

/**
 * Lando
 */
if ($_SERVER['LANDO'] === 'ON') {
  require 'settings.lando.php';
}

/**
 * Acquia
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
}
