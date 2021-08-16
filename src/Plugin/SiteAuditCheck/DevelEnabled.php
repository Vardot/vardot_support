<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\vardot_site_audit\Plugin\SiteAuditCheck\ModuleStatusBase;

/**
 * Provides the DevelEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "devel_enabled",
 *  name = @Translation("Devel module status"),
 *  description = @Translation("Check to see enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class DevelEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Devel',
    'machine_name' => 'devel',
    'enabled' => FALSE,
  ];
}
