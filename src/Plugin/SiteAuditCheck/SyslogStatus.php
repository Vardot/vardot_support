<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the SyslogStatus Check.
 *
 * @SiteAuditCheck(
 *  id = "syslog_status",
 *  name = @Translation("SyslogStatus module status"),
 *  description = @Translation("Check to see syslog if enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class SyslogStatus extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'SyslogStatus',
    'machine_name' => 'syslog',
    'enabled' => TRUE,
  ];

}
