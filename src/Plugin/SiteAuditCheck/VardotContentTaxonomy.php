<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ContentTaxonomy;

/**
 * Provides the ContentTaxonomy Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_content_taxonomy",
 *  name = @Translation("Taxonomy status"),
 *  description = @Translation("Check if Taxonomy module is enabled"),
 *  report = "vardot_seo",
 *  weight = 5,
 * )
 */
class VardotContentTaxonomy extends ContentTaxonomy {}
