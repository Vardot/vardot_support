<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditReport;

use Drupal\site_audit\Plugin\SiteAuditReportBase;

/**
 * Provides a Content Report.
 *
 * @SiteAuditReport(
 *  id = "vardot_best_practices",
 *  name = @Translation("Vardot best practices"),
 *  description = @Translation("Vardot best practices checks")
 * )
 */
class VardotBestPractices extends SiteAuditReportBase {}
