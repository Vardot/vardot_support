<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

/**
 * Provides the dblogEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "views_ui_enabled",
 *  name = @Translation("Database Logging module status"),
 *  description = @Translation("Check to see if enabled"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class ViewsUiEnabled extends ModuleStatusBase {

  /**
   * {@inheritdoc}.
   */
  protected $moduleInfo = [
    'name' => 'Views ui',
    'machine_name' => 'views_ui',
    'enabled' => FALSE,
  ];

}
