<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the VarbaseDevelopmentEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "varbase_development_enabled",
 *  name = @Translation("Varbase development module status"),
 *  description = @Translation("Check to see if varbase_development enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class VarbaseDevelopmentEnabled extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Varbase Development module is enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Varbase Development module is not enabled.');
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
      return $this->t('Disable the varbase development module.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!\Drupal::moduleHandler()->moduleExists('varbase_development')) {
      $this->abort = TRUE;
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
