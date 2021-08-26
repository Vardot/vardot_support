<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\UsersWhoIsNumberOne;
use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Drupal\user\Entity\User;

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
class VardotUsersWhoIsNumberOne extends UsersWhoIsNumberOne {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('UID #1 does not exist! This is a serious problem, Or username is not webmaster');
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $uid_1 = User::load(1);
    if (!$uid_1) {
      $this->abort = TRUE;
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }

    $this->registry->uid_1 = $uid_1;

    if ($uid_1->getAccountName() != 'webmaster') {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }

    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_INFO;
  }

}
