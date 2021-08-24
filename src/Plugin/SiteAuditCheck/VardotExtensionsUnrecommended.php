<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\ExtensionsUnrecommended;

/**
 * Provides the ExtensionsUnrecommended Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_extensions_unrecommended",
 *  name = @Translation("Not recommended"),
 *  description = @Translation("Check for unrecommended modules."),
 *  report = "vardot_performance"
 * )
 */
class VardotExtensionsUnrecommended extends ExtensionsUnrecommended {}
