<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Drupal\site_audit\Plugin\SiteAuditCheck\ViewsCacheOutput;

/**
 * Provides the ViewsCacheOutput Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_views_cache_output",
 *  name = @Translation("Rendered output caching"),
 *  description = @Translation("Check to see if raw rendered output is being cached."),
 *  report = "vardot_performance"
 * )
 */
class VardotViewsCacheOutput extends ViewsCacheOutput {

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
