<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the VardotImageCompression Check.
 *
 * @SiteAuditCheck(
 *  id = "vardot_image_compression",
 *  name = @Translation("Image Compression"),
 *  description = @Translation("Check image compression quality"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class VardotImageCompression extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('Image compression is not greater than or equal to 75%.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('Image compression is greater than or equal to 75%');
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
      return $this->t('Edit image compression to be greater than or equal to 75%.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $jpeg_quality = \Drupal::config('system.image.gd')->get('jpeg_quality');
    $webp_quality = \Drupal::config('webp.settings')->get('quality');

    if ($jpeg_quality >= 75 && $webp_quality >= 75) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
    }
    else {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
  }

}
