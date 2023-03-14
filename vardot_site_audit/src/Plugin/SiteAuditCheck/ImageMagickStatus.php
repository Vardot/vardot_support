<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\site_audit\Plugin\SiteAuditCheckBase;

/**
 * Provides the SiteErrorsStatus Check.
 *
 * @SiteAuditCheck(
 *  id = "image_magick_status",
 *  name = @Translation("ImageMagick Status"),
 *  description = @Translation("Check ImageMagick status"),
 *  checklist = "vardot_performance",
 *  weight = -5,
 * )
 */
class ImageMagickStatus extends SiteAuditCheckBase {

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t('imagemagick module is not enabled.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {}

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t('imagemagick module is enabledand configured.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultWarn() {
    return $this->t('imagemagick module is not configured.');
  }

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      return $this->t('Enable and configure the imagemagick module.');
    }

    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN) {
      return $this->t('Configure the imagemagick module.');
    }

  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {

    if (\Drupal::moduleHandler()->moduleExists('imagemagick') != TRUE) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }

    $config = \Drupal::config('system.image')->get('toolkit');

    if ($config != 'imagemagick') {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_WARN;
    }

    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
