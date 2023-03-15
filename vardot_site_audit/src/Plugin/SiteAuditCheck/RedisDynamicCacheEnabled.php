<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\Core\Database\Connection;
use Drupal\Core\Logger\LoggerChannelFactory;use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides the Redis/Memcache Dynamic Cache Check.
 *
 * @SiteAuditCheck(
 *  id = "dynamic_cache_enabled",
 *  name = @Translation("Redis/Memecache Dynamic Cache status"),
 *  description = @Translation("Check to see if Redis/Memecache is properly configured for dynamic cache"),
 *  checklist = "vardot_best_practices",
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
      $container->get('logger.factory')
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
  public function __construct($cache, $configuration, $plugin_id, $plugin_definition, Connection $database, LoggerChannelFactory $logger_factory) {
    $this->cache = $cache;
    parent::__construct($configuration, $plugin_id, $plugin_definition, $database, $logger_factory);
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t("Redis/memcache isn't properly configured for dynamic cache.");
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
    return $this->t("Redis/Memcache is properly configured for dynamic cache.");
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
      return $this->t('Configure Redis/Memcache properly for dynamic cache.');
    }
  }

  /**
   * {@inheritdoc}.
   */
  public function calculateScore() {
    if (!(get_class($this->cache) == 'Drupal\redis\Cache\PhpRedis' || get_class($this->cache) ==  'Drupal\memcache\MemcacheBackend')) {
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}

