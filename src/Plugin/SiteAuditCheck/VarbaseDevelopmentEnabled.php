<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the VarbaseDevelopmentEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "varbase_development_enabled",
 *  name = @Translation("Varbase development module status"),
 *  description = @Translation("Check to see if varbase_development enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class VarbaseDevelopmentEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Varbase development',
    'machine_name' => 'varbase_development',
    'enabled' => FALSE,
  ];

}
