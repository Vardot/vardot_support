<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditChecklist;

use Drupal\site_audit\Plugin\SiteAuditChecklistBase;

/**
 * Provides a Content Report.
 *
 * @SiteAuditChecklist(
 *  id = "vardot_performance",
 *  name = @Translation("Vardot performance"),
 *  description = @Translation("Vardot Performance checks")
 * )
 */
class VardotPerformance extends SiteAuditChecklistBase {}
