<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the BlockEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "redirect_enabled",
 *  name = @Translation("Redirect module status"),
 *  description = @Translation("Check to see if enabled"),
 *  report = "vardot_seo"
 * )
 */
class RedirectEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Redirect',
    'machine_name' => 'redirect',
    'enabled' => TRUE,
  ];

}
