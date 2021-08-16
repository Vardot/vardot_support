<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the TwigCacheEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "twig_cache_enable",
 *  name = @Translation("Twig cache"),
 *  description = @Translation("Verify that Twig cache is enabled and not in debug mode."),
 *  report = "vardot_performance"
 * )
 */

class TwigCacheEnabled extends SiteAuditCheckBase {


  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Twig cache is disabled or/and in debug mode!');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {
    return $this->getResultFail();
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Twig cache is enabled.');
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
      return $this->t('Enable Twig cache from services files and make sure debug is set to false.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (\Drupal::service('twig')->isDebug() || !\Drupal::service('twig')->getCache()) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}