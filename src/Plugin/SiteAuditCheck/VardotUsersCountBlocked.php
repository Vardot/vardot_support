<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\UsersCountBlocked;

/**
 * Provides the UsersCountBlocked Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_users_count_blocked",
 *  name = @Translation("Count Blocked"),
 *  description = @Translation("Total number of blocked Drupal users."),
 *  report = "vardot_performance"
 * )
 */
class VardotUsersCountBlocked extends UsersCountBlocked {}
