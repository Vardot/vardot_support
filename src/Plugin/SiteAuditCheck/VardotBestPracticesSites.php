<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesSites;

/**
 * Provides the BestPracticesSites Check.
 *
 * @SiteAuditCheck(
 *  id = "best_practices_sites",
 *  name = @Translation("sites/sites.php"),
 *  description = @Translation("Check if multisite configuration file is a symbolic link."),
 *  report = "vardot_performance"
 * )
 */
class VardotBestPracticesSites extends BestPracticesSites {}
