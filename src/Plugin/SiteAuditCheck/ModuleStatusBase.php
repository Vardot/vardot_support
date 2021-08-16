<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Base class for checking modules statuses.
 */
abstract class ModuleStatusBase extends SiteAuditCheckBase {

  /**
   * Info related to tested module.
   *
   * @var array
   */
  protected $moduleInfo = [];

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    if ($this->moduleInfo['enabled']) {
      return $this->t('@module_name module is not enabled and configured.', ['@module_name' => $this->moduleInfo['name']]);
    }
    else {
      return $this->t('@module_name module is enabled.', ['@module_name' => $this->moduleInfo['name']]);
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    if ($this->moduleInfo['enabled']) {
      return $this->t('@module_name module is enabled.', ['@module_name' => $this->moduleInfo['name']]);
    }
    else {
      return $this->t('@module_name module is disabled.', ['@module_name' => $this->moduleInfo['name']]);
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultWarn() {}

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      if ($this->moduleInfo['enabled']) {
        return $this->t('Enable and configure the @module_name module.', ['@module_name' => $this->moduleInfo['name']]);
      }
      else {
        return $this->t('Disable the @module_name module.', ['@module_name' => $this->moduleInfo['name']]);
      }
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (\Drupal::moduleHandler()->moduleExists($this->moduleInfo['machine_name']) == $this->moduleInfo['enabled']) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
  }

}
