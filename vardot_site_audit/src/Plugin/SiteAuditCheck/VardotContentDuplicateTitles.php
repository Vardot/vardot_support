<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ContentDuplicateTitles;

/**
 * Provides the VardotContentDuplicateTitles Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_content_duplicate_titles",
 *  name = @Translation("Duplicate titles"),
 *  description = @Translation("Scan nodes for duplicate titles within a particular content type"),
 *  checklist = "vardot_seo"
 * )
 */
class VardotContentDuplicateTitles extends ContentDuplicateTitles {}
