<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the dblogEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "dblog_enabled",
 *  name = @Translation("dblog module status"),
 *  description = @Translation("Check to see if dblog enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class DBLogEnabled extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('dblog module is enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('dblog module is not enabled.');
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
      return $this->t('Disable the dblog module.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!\Drupal::moduleHandler()->moduleExists('dblog')) {
      $this->abort = TRUE;
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
