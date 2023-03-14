<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the Commerce Log Enabled Check.
 *
 * @SiteAuditCheck(
 *  id = "commerce_log_enabled",
 *  name = @Translation("Commerce log module status"),
 *  description = @Translation("Check to see enabled"),
 *  report = "vardot_best_practices",
 *  weight = -5,
 * )
 */
class CommerceLogEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Commerce log',
    'machine_name' => 'commerce_log',
    'enabled' => TRUE,
  ];

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (\Drupal::moduleHandler()->moduleExists('commerce') && \Drupal::moduleHandler()->moduleExists($this->moduleInfo['machine_name']) !== $this->moduleInfo['enabled']) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
