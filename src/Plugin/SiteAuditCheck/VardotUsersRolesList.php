<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\UsersRolesList;

/**
 * Provides the UsersRolesList Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_users_roles_list",
 *  name = @Translation("List Roles"),
 *  description = @Translation("Show all available roles and user counts."),
 *  report = "vardot_performance"
 * )
 */
class VardotUsersRolesList extends UsersRolesList {}
