<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditChecklist;

use Drupal\site_audit\Plugin\SiteAuditChecklistBase;

/**
 * Provides a Content Report.
 *
 * @SiteAuditChecklist(
 *  id = "vardot_seo",
 *  name = @Translation("Vardot SEO"),
 *  description = @Translation("Vardot SEO checks")
 * )
 */
class VardotSeo extends SiteAuditChecklistBase {}
