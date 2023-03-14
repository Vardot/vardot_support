<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the MemcacheEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "raven_status",
 *  name = @Translation("Raven status"),
 *  description = @Translation("Check raven module status"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class RavenEnabled extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Raven modules are not enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Raven modules is enabled and connected with "sentry.in.vardot.com".');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultWarn() {
    return $this->t('Raven module are not configured.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      return $this->t('Enable and configure Raven.');
    }

    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN) {
      return $this->t('Configure Raven and check the connection is with "sentry.in.vardot.com".');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {

    if (\Drupal::moduleHandler()->moduleExists('raven') == FALSE) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }

    $client_key = \Drupal::config('raven.settings')->get('client_key');
    $client_secret = \Drupal::config('raven.settings')->get('client_secret');
    $public_dsn = \Drupal::config('raven.settings')->get('public_dsn');

    if (empty($client_key) || !str_contains($client_secret, '@sentry.in.vardot.com/') || !str_contains($public_dsn, '@sentry.in.vardot.com/')) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN;
    }

    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
