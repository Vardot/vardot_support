<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the MemcacheEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "memcache_enabled",
 *  name = @Translation("Memcache module status"),
 *  description = @Translation("Check to see if Memcache enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class MemcacheEnabled extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Memcache module is not enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Memcache module is enabled.');
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
      return $this->t('Enable the dblog module.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!\Drupal::moduleHandler()->moduleExists('dblog')) {
      $this->abort = TRUE;
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
