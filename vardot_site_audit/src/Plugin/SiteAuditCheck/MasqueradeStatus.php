<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the Masquerade Check.
 *
 * @SiteAuditCheck(
 *  id = "masquerade_status",
 *  name = @Translation("Masquerade status"),
 *  description = @Translation("Check masquerade module status"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class MasqueradeStatus extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Masquerade',
    'machine_name' => 'masquerade',
    'enabled' => TRUE,
  ];

}
