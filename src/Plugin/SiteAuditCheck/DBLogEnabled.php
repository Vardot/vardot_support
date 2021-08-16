<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\vardot_site_audit\Plugin\SiteAuditCheck\ModuleStatusBase;

/**
 * Provides the dblogEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "dblog_enabled",
 *  name = @Translation("Database Logging module status"),
 *  description = @Translation("Check to see if enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class DBLogEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Database Logging',
    'machine_name' => 'dblog',
    'enabled' => FALSE,
  ];

}
