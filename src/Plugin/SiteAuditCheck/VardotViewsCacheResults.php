<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Drupal\site_audit\Plugin\SiteAuditCheck\ViewsCacheResults;

/**
 * Provides the ViewsCacheResults Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_views_cache_results",
 *  name = @Translation("Query results caching"),
 *  description = @Translation("Check to see if raw query results are being cached."),
 *  report = "vardot_performance"
 * )
 */
class VardotViewsCacheResults extends ViewsCacheResults {
  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $return = parent::calculateScore();

    if ($return == SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_INFO;
    }
    else {
      return $return;
    }
  }
}
