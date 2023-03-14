<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ContentEntityTypesUnused;

/**
 * Provides the ContentEntityTypesUnused Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_content_enity_types_unused",
 *  name = @Translation("Unused content entity types"),
 *  description = @Translation("Check for unused content entity types"),
 *  checklist = "vardot_seo"
 * )
 */
class VardotContentEntityTypesUnused extends ContentEntityTypesUnused {}
