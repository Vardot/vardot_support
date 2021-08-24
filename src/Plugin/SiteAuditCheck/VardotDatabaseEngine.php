<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\Core\Database\Database;
use Drupal\site_audit\Plugin\SiteAuditCheck\DatabaseEngine;

/**
 * Provides the CronLast Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_database_engine",
 *  name = @Translation("Storage Engines"),
 *  description = @Translation("Check to see if there are any tables that aren\'t using InnoDB."),
 *  report = "vardot_performance"
 * )
 */
class VardotDatabaseEngine extends DatabaseEngine {}
