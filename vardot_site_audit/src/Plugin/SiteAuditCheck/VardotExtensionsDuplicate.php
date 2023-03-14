<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ExtensionsDuplicate;

/**
 * Provides the ExtensionsDuplicate Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_extensions_duplicate",
 *  name = @Translation("Duplicates"),
 *  description = @Translation("Check for duplicate extensions in the site codebase."),
 *  checklist = "vardot_performance"
 * )
 */
class VardotExtensionsDuplicate extends ExtensionsDuplicate {}
