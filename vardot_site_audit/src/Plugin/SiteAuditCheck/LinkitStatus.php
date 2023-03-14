<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the MemcacheEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "linkit_status",
 *  name = @Translation("Linkit status"),
 *  description = @Translation("Check linkit module status"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class LinkitStatus extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Linkit modules are not enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Linkit modules is enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultWarn() {
    return $this->t('Linkit module are not configured.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      return $this->t('Enable and configure Linkit module.');
    }

    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN) {
      return $this->t('Configure Linkit module.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {

    if (\Drupal::moduleHandler()->moduleExists('linkit') == FALSE) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }

    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
