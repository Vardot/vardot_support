<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditReport;

use Drupal\site_audit\Plugin\SiteAuditReportBase;

/**
 * Provides a Content Report.
 *
 * @SiteAuditReport(
 *  id = "vardot_performance",
 *  name = @Translation("Vardot performance"),
 *  description = @Translation("Vardot Performance checks")
 * )
 */
class VardotPerformance extends SiteAuditReportBase {}
