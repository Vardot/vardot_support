<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the MemcacheEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "mailer_service",
 *  name = @Translation("Default mailer"),
 *  description = @Translation("Check site default mailer"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class MailerService extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Memcache or Redis modules are not enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {
    return $this->t('Mailsystem settings not found.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Site is using php_mail for mail system.');
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
    $config = \Drupal::config('mailsystem.settings')->get('defaults');
    if (!$config) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_INFO;
    }

    if ($config['sender'] == 'php_mail' || $config['formatter'] == 'php_mail') {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
