<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the MemcacheEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "alternative_cache_enabled",
 *  name = @Translation("Alternative cache module status"),
 *  description = @Translation("Check to see if either Memcache or Redis modules are enabled"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class AlternativeCacheEnabled extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Memcache or Redis modules are not enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Memcache or Redis modules is enabled.');
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
      return $this->t('Enable Memcache or Redis.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!\Drupal::moduleHandler()->moduleExists('memcache') && !\Drupal::moduleHandler()->moduleExists('redis')) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
