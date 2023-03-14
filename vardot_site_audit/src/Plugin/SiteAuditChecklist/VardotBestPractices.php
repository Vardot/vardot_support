<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditChecklist;

use Drupal\site_audit\Plugin\SiteAuditChecklistBase;

/**
 * Provides a Content Report.
 *
 * @SiteAuditChecklist(
 *  id = "vardot_best_practices",
 *  name = @Translation("Vardot best practices"),
 *  description = @Translation("Vardot best practices checks")
 * )
 */
class VardotBestPractices extends SiteAuditChecklistBase {}
