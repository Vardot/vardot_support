<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\UsersCountAll;

/**
 * Provides the UsersCountAll Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_users_count_all",
 *  name = @Translation("Count All"),
 *  description = @Translation("Total number of Drupal users."),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class VardotUsersCountAll extends UsersCountAll {}
