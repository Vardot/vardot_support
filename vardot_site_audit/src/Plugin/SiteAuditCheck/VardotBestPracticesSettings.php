<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesSettings;

/**
 * Provides the BestPracticesSettings Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_best_practices_settings",
 *  name = @Translation("sites/default/settings.php"),
 *  description = @Translation("Check if the configuration file exists."),
 *  report = "vardot_performance"
 * )
 */
class VardotBestPracticesSettings extends BestPracticesSettings {}
