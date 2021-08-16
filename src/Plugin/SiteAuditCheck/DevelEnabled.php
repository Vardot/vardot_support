<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the DevelEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "devel_enabled",
 *  name = @Translation("Devel module status"),
 *  description = @Translation("Check to see if Devel enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class DevelEnabled extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Devel module is enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Devel module is not enabled.');
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
      return $this->t('Disable the Devel module.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!\Drupal::moduleHandler()->moduleExists('devel')) {
      $this->abort = TRUE;
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
