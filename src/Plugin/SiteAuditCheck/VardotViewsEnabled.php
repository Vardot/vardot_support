<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ViewsEnabled;

/**
 * Provides the ViewsEnabled Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_views_enabled",
 *  name = @Translation("Views status"),
 *  description = @Translation("Check to see if enabled"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class VardotViewsEnabled extends ViewsEnabled {}
