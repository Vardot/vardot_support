<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ContentVocabulariesUnused;

/**
 * Provides the ContentVocabulariesUnused Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_content_vocabularies_unused",
 *  name = @Translation("Unused vocabularies"),
 *  description = @Translation("Check for unused vocabularies"),
 *  report = "vardot_seo",
 *  weight = 7,
 * )
 */
class VardotContentVocabulariesUnused extends ContentVocabulariesUnused {}
