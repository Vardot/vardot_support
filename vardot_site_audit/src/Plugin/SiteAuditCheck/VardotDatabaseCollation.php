<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\DatabaseCollation;

/**
 * Provides the CronLast Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_database_collation",
 *  name = @Translation("Collations"),
 *  description = @Translation("Check to see if there are any tables that aren't using UTF-8."),
 *  checklist = "vardot_performance"
 * )
 */
class VardotDatabaseCollation extends DatabaseCollation {}
