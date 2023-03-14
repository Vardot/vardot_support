<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesSitesSuperfluous;

/**
 * Provides the BestPracticesSitesSuperfluous Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_best_practices_sites_superflouous",
 *  name = @Translation("Superfluous files in /sites"),
 *  description = @Translation("Detect unnecessary files."),
 *  checklist = "vardot_performance"
 * )
 */
class VardotBestPracticesSitesSuperfluous extends BestPracticesSitesSuperfluous {}
