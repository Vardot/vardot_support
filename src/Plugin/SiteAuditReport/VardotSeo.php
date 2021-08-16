<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditReport;

use Drupal\site_audit\Plugin\SiteAuditReportBase;

/**
 * Provides a Content Report.
 *
 * @SiteAuditReport(
 *  id = "vardot_seo",
 *  name = @Translation("Vardot SEO"),
 *  description = @Translation("Vardot SEO checks")
 * )
 */
class VardotSeo extends SiteAuditReportBase {}
