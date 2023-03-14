<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the SiteErrorsStatus Check.
 *
 * @SiteAuditCheck(
 *  id = "site_errors_status",
 *  name = @Translation("Site Errors Status"),
 *  description = @Translation("Check site errors status"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class SiteErrorsStatus extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Site errors are not hidden.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Site errors are hidden.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultWarn() {}

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      return $this->t('Hide the site errors.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $config = \Drupal::config('system.logging')->get('error_level');

    if ($config != 'hide') {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
