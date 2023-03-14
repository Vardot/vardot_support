<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\CachePreprocessJS;

/**
 * Provides the VardotCachePreprocessJS Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_cache_preprocess_js",
 *  name = @Translation("Aggregate and compress JS files in Drupal."),
 *  description = @Translation("Verify that Drupal is aggregating and compressing JS."),
 *  checklist = "vardot_performance"
 * )
 */
class VardotCachePreprocessJS extends CachePreprocessJS {}
