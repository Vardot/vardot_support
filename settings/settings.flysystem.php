<?php
/**
 * @file settings.flysystem.php
 *
 * Settings for configuring SFTP Backup Destination.
 */

/**
 * Vardot Support backup server.
 * To allow customizing backup provider per-project, copy the $schemes
 * array into the project's settings.php.
 *
$flysystem_schemes = [
  'vardot-support' => [
    'driver' => 'sftp',
    'config' => [
      'host' => 'dsd.vardot.io',
      'username' => 'customer',
      'password' => 'password',
      'root' => '/home/customer',
    ],
  ],
];
 */

// Set flysystem schemes, if any.
$settings['flysystem'] = $flysystem_schemes ?? [];
