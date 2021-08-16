<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the UltimateCronEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "ultimate_cron_enabled",
 *  name = @Translation("Ultimate Cron module status"),
 *  description = @Translation("Check to see if enabled"),
 *  report = "vardot_performance"
 * )
 */
class UltimateCronEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Ultimate Cron',
    'machine_name' => 'ultimate_cron',
    'enabled' => TRUE,
  ];

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (\Drupal::moduleHandler()->moduleExists('ultimate_cron')) {
      $crons = \Drupal::entityTypeManager()->getStorage('ultimate_cron_job')->loadMultiple();
      $is_configured = FALSE;
      foreach ($crons as $cron) {
        if ($cron->getPlugin('scheduler')->getConfiguration()['rules'][0] !== "*/15+@ * * * *") {
          $is_configured = TRUE;
        }
      }
      if ($is_configured) {
        return ModuleStatusBase::AUDIT_CHECK_SCORE_PASS;
      }
    }
    return ModuleStatusBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
