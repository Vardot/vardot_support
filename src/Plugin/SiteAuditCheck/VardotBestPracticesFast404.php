<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesFast404;

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
class VardotBestPracticesFast404 extends BestPracticesFast404 {}