<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\Core\Database\Database;
use Drupal\site_audit\Plugin\SiteAuditCheck\DatabaseSize;

/**
 * Provides the CronLast Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_database_size",
 *  name = @Translation("Total size"),
 *  description = @Translation("Determine the size of the database."),
 *  report = "vardot_performance",
 *  weight = -1,
 * )
 */
class VardotDatabaseSize extends DatabaseSize {}
