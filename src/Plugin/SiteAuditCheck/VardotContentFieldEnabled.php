<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ContentFieldEnabled;

/**
 * Provides the ContentFieldEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_content_field_enabled",
 *  name = @Translation("Field status"),
 *  description = @Translation("Check to see if enabled"),
 *  report = "vardot_seo",
 *  weight = -5,
 * )
 */
class VardotContentFieldEnabled extends ContentFieldEnabled {}
