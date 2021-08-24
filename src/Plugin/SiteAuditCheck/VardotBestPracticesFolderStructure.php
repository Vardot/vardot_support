<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheck\BestPracticesFolderStructure;
/**
 * Provides the BestPracticesFolderStructure Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_best_practices_folder_structure",
 *  name = @Translation("Folder Structure"),
 *  description = @Translation("Checks if modules/contrib and modules/custom directory is present"),
 *  report = "vardot_performance"
 * )
 */
class VardotBestPracticesFolderStructure extends BestPracticesFolderStructure {}
