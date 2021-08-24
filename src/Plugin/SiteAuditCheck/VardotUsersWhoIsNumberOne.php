<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\UsersWhoIsNumberOne;

/**
 * Provides the UsersWhoIsNumberOne Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_users_who_is_number_one",
 *  name = @Translation("Identify UID #1"),
 *  description = @Translation("Show username and email of UID #1."),
 *  report = "vardot_performance",
 *  weight = -1,
 * )
 */
class VardotUsersWhoIsNumberOne extends UsersWhoIsNumberOne {}
