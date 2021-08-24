<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ContentVocabularies;

/**
 * Provides the ContentVocabularies Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_content_vocabularies",
 *  name = @Translation("Taxonomy vocabularies"),
 *  description = @Translation("Available vocabularies and term counts"),
 *  report = "vardot_seo",
 *  weight = 6,
 * )
 */
class VardotContentVocabularies extends ContentVocabularies {}
