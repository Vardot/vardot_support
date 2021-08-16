<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\vardot_site_audit\Plugin\SiteAuditCheck\ModuleStatusBase;

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

}
