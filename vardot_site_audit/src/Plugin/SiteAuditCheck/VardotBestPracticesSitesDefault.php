<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesSitesDefault;

/**
 * Provides the BestPracticesSitesDefault Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_best_practices_sites_default",
 *  name = @Translation("sites/default"),
 *  description = @Translation("Check if it exists and isn\'t symbolic"),
 *  report = "vardot_performance"
 * )
 */
class VardotBestPracticesSitesDefault extends BestPracticesSitesDefault {}
