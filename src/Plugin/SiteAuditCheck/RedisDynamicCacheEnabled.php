<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\Core\Database\Connection;
use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\redis\Cache\PhpRedis;
use Drupal\Core\Cache\CacheBackendInterface;

/**
 * Provides the Redis Dynamic Cache Check.
 *
 * @SiteAuditCheck(
 *  id = "dynamic_cache_enabled",
 *  name = @Translation("Redis Dynamic Cache status"),
 *  description = @Translation("Check to see if redis is properly configured for dynamic cache"),
 *  report = "vardot_best_practices",
 *  weight = -5,
 * )
 */
class RedisDynamicCacheEnabled extends SiteAuditCheckBase {

  /**
   * Holds \Drupal\redis\Cache\PhpRedis or \Drupal\Core\Cache\CacheBackendInterface.
   *
   * @var \Drupal\Cache
   */
  protected $cache;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static (
      $container->get('cache.default'),
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('database'),
    );
  }

  /**
   * Constructs a DynamicCacheEnabled object.
   *
   * @param $cache
   * @param $configuration.
   * @param $plugin_id.
   * @param $plugin_definition.
   * @param Connection $database.
   */
  public function __construct($cache, $configuration, $plugin_id, $plugin_definition, Connection $database) {
    $this->cache = $cache;
    parent::__construct($configuration, $plugin_id, $plugin_definition, $database);
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t("Redis isn't properly configured for dynamic cache.");
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultInfo() {
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultPass() {
    return $this->t("Redis is properly configured for dynamic cache.");
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultWarn() {
  }

  /**
   * {@inheritdoc}.
   */
  public function getAction() {
    if ($this->score == SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL) {
      return $this->t('Configure Redis properly for dynamic cache.');
    }
  }

  /** 
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!($this->cache instanceof PhpRedis)) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}