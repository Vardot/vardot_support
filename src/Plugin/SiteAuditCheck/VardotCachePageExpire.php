<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\CachePageExpire;

/**
 * Provides the CachePageExpire Check.
 *
 * @SiteAuditCheck(
 *  id = "varbase_cache_page_expire",
 *  name = @Translation("Expiration of cached pages"),
 *  description = @Translation("Verify that Drupal\'s cached pages last for at least 5 minutes."),
 *  report = "vardot_performance"
 * )
 */
class VardotCachePageExpire extends CachePageExpire {

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $config = \Drupal::config('system.performance')->get('cache.page.max_age');
    if ($config == 0) {
      if (site_audit_env_is_dev()) {
        return CachePageExpire::AUDIT_CHECK_SCORE_INFO;
      }
      return CachePageExpire::AUDIT_CHECK_SCORE_FAIL;
    }
    elseif ($config >= 300) {
      return CachePageExpire::AUDIT_CHECK_SCORE_PASS;
    }
    return CachePageExpire::AUDIT_CHECK_SCORE_WARN;
  }

}
