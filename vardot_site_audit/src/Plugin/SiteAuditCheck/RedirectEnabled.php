<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the BlockEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "redirect_enabled",
 *  name = @Translation("Redirect module status"),
 *  description = @Translation("Check to see if enabled"),
 *  checklist = "vardot_seo"
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

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (\Drupal::moduleHandler()->moduleExists('redirect')) {

      $configured = TRUE;

      $config_to_check = [
        'auto_redirect' => TRUE,
        'default_status_code' => 301,
        'passthrough_querystring' => TRUE,
        'nonclean_to_clean' => TRUE,
        'ignore_admin_path' => TRUE,
      ];

      foreach ($config_to_check as $key => $value) {
        if (\Drupal::config('redirect.settings')->get($key) != $value) {
          $configured = FALSE;
        }
      }

      if ($configured) {
        return ModuleStatusBase::AUDIT_CHECK_SCORE_PASS;
      }
    }
    return ModuleStatusBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
