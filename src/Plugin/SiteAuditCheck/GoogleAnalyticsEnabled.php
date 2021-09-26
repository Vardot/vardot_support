<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the GoogleAnalyticsEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "google_analytics_enabled",
 *  name = @Translation("Google Analytics module status"),
 *  description = @Translation("Check to see if enabled"),
 *  report = "vardot_seo"
 * )
 */
class GoogleAnalyticsEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Google Analytics',
    'machine_name' => 'google_analytics',
    'enabled' => TRUE,
  ];

    /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (\Drupal::moduleHandler()->moduleExists('google_analytics') || \Drupal::moduleHandler()->moduleExists('google_tag')) {
      return ModuleStatusBase::AUDIT_CHECK_SCORE_PASS;
    }
    return ModuleStatusBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
