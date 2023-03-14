<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\CachePreprocessCSS;

/**
 * Provides the VardotCachePreprocessCSS Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_cache_preprocess_css",
 *  name = @Translation("Aggregate and compress CSS files in Drupal."),
 *  description = @Translation("Verify that Drupal is aggregating and compressing CSS."),
 *  checklist = "vardot_performance"
 * )
 */
class VardotCachePreprocessCSS extends CachePreprocessCSS {}
