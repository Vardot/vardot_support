<?php
/**
 * @file settings.flysystem.php
 *
 * Settings for configuring SFTP Backup Destination.
 */

/**
 * Vardot Support backup server.
 */
$schemes = [
  'vardot_data' => [
    'driver' => 'sftp',
    'config' => [
      'host' => $settings['vardot_backup_migrate_destination_host'],
      'username' => $settings['vardot_backup_migrate_destination_user'],
      'password' => $settings['vardot_backup_migrate_destination_password'],
      'root' => $settings['vardot_backup_migrate_destination_path'],
    ],
  ],
];

// Don't forget this!
$settings['flysystem'] = $schemes;
