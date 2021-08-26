<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\UsersRolesList;
use Drupal\site_audit\Plugin\SiteAuditCheckBase;

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
class VardotUsersRolesList extends UsersRolesList {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('There is more than 1 user have administrator role.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      return $this->t('Check users roles.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $query = \Drupal::database()->select('user__roles');
    $query->addExpression('COUNT(entity_id)', 'count');
    $query->addfield('user__roles', 'roles_target_id', 'name');
    $query->groupBy('name');
    $query->orderBy('name', 'ASC');
    $results = $query->execute();

    while ($row = $results->fetchObject()) {
      $this->registry->roles[$row->name] = $row->count;
    }

    if ($this->registry->roles['administrator'] > 1) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }

    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_INFO;
  }

}
