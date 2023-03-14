<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ViewsCount;

/**
 * Provides the ViewsCount Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_views_count",
 *  name = @Translation("Count"),
 *  description = @Translation("Number of enabled Views."),
 *  checklist = "vardot_performance",
 *  weight = -1,
 * )
 */
class VardotViewsCount extends ViewsCount {}
