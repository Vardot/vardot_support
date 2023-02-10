<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\Core\Database\Connection;
use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\StorageInterface;
use Drupal\Core\Config\StorageComparer;

/**
 * Provides the Configuration Synchronization Check.
 *
 * @SiteAuditCheck(
 *  id = "configuration_synchronization_checked",
 *  name = @Translation("Configuration Synchronization module status"),
 *  description = @Translation("Check to see if Active Configurations matches Stage Configurations"),
 *  report = "vardot_performance",
 *  weight = -5,
 * )
 */
class ConfigurationSynchronizationStatus extends SiteAuditCheckBase {

  /**
   * The target storage.
   *
   * @var \Drupal\Core\Config\StorageInterface
   */
  protected $targetStorage;

  /**
   * The snapshot configuration object.
   *
   * @var \Drupal\Core\Config\StorageInterface
   */
  protected $snapshotStorage;


  /**
   * The differences string.
   *
   * @var message of configuration differences
   */
  protected $differences;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('config.storage'),
      $container->get('config.storage.snapshot'),
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('database')
    );
  }

  /**
   * Constructs a ConfigurationSynchronizationStatus object.
   *
   * @param \Drupal\Core\Config\StorageInterface $target_storage
   *   The target storage.
   * @param \Drupal\Core\Config\StorageInterface $snapshotStorage
   *   The snapshotStorage storage.
   * @param $configuration
   * @param $plugin_id
   * @param $plugin_definition
   * @param Connection $database
   */
  public function __construct(StorageInterface $target_storage, StorageInterface $snapshot_storage, $configuration, $plugin_id, $plugin_definition, Connection $database) {
    $this->targetStorage = $target_storage;
    $this->snapshotStorage = $snapshot_storage;
    parent::__construct($configuration, $plugin_id, $plugin_definition, $database);
  }

  /**
   * {@inheritdoc}.
   */
  public function getResultFail() {
    return $this->t("Active Configuration doesn't match Stage Configuration.");
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
    return $this->t('Active Configuration matches Stage Configuration.');
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
      return $this->getDifferences();
    }
  }

  /**
   * Get the Differences message.
   *
   * @return string of differences
   */
  public function getDifferences() {
    return $this->differences;
  }

  /** 
   * {@inheritdoc}.
   */
  public function calculateScore() {
    $snapshot_comparer = new StorageComparer($this->targetStorage, $this->snapshotStorage);
    $change_list = $snapshot_comparer->createChangelist();

    if ($change_list->hasChanges()) {
      foreach ($change_list->getChangelist() as $op => $configs) {
        foreach ($configs as $config) {
            $this->differences .= $this->t("Match The @config Active Configuration to Stage Configuration. <br>", ["@config" => $config]);
        }
      }
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
