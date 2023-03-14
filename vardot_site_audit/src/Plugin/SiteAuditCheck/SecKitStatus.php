<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the SecKitStatus Check.
 *
 * @SiteAuditCheck(
 *  id = "sec_kit_status",
 *  name = @Translation("Security kit module status"),
 *  description = @Translation("Check Security kit module status"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class SecKitStatus extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Security kit',
    'machine_name' => 'seckit',
    'enabled' => TRUE,
  ];

}
