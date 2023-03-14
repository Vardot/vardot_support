<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesFast404;
use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the VardotBestPracticesFast404 Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_best_practices_fast_404",
 *  name = @Translation("Fast 404 pages."),
 *  description = @Translation("Check if enabled."),
 *  report = "vardot_performance"
 * )
 */
class VardotBestPracticesFast404 extends BestPracticesFast404 {

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $path = DRUPAL_ROOT . '/' . \Drupal::service('site.path') . '/settings.fast404.php';

    if (!file_exists($path)) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN;
    }

    return parent::calculateScore();
  }

}
