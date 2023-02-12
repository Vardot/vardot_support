<?php

namespace Drupal\vardot_site_audit\Plugin\SiteAuditCheck;

use Drupal\Core\Database\Connection;
use Drupal\site_audit\Plugin\SiteAuditCheckBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\StorageInterface;
use Drupal\Core\Config\StorageComparer;
use Drupal\Core\Config\ConfigManagerInterface;
use Drupal\Core\Config\ImportStorageTransformer;

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
   * The configuration manager.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;

  /**
   * The import transformer service.
   *
   * @var \Drupal\Core\Config\ImportStorageTransformer
   */
  protected $importTransformer;

  /**
   * The sync configuration object.
   *
   * @var \Drupal\Core\Config\StorageInterface
   */
  protected $syncStorage;

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
      $container->get('config.manager'),
      $container->get('config.import_transformer'),
      $container->get('config.storage.sync'),
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('database'),
    );
  }

  /**
   * Constructs a ConfigurationSynchronizationStatus object.
   *
   * @param \Drupal\Core\Config\StorageInterface $target_storage
   *   The target storage.
   * @param \Drupal\Core\Config\StorageInterface $sync_storage
   *   The source storage.
   * @param \Drupal\Core\Config\ConfigManagerInterface $config_manager
   *   Configuration manager.
   * @param \Drupal\Core\Config\ImportStorageTransformer $import_transformer
   *   The import transformer service.
   * @param $configuration.
   * @param $plugin_id.
   * @param $plugin_definition.
   * @param Connection $database.
   */
  public function __construct(StorageInterface $target_storage, ConfigManagerInterface $config_manager, ImportStorageTransformer $import_transformer, StorageInterface $sync_storage, $configuration, $plugin_id, $plugin_definition, Connection $database) {
    $this->targetStorage = $target_storage;
    $this->configManager = $config_manager;
    $this->importTransformer = $import_transformer;
    $this->syncStorage = $sync_storage;
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
    $syncStorage = $this->importTransformer->transform($this->syncStorage);
    $snapshot_comparer = new StorageComparer($this->targetStorage, $syncStorage);
    $change_list = $snapshot_comparer->createChangelist();
    $core_extension_changes = [];
    $changes_one_dimension = [];
    // Check to if core.extension has changes excluding site_aduit and varbase_site_aduit.
    $core_extension_diff = $this->configManager->diff($this->targetStorage, $syncStorage, "core.extension")->getEdits();
    foreach ($core_extension_diff as $diff_op) {
      if (!(get_class($diff_op) == "Drupal\Component\Diff\Engine\DiffOpCopy" || $diff_op->orig[0] == "  site_audit: 0" || $diff_op->orig[0] == "  vardot_site_audit: 0")) {
        array_push($core_extension_changes, $diff_op);
      }
    }
    // Loop through all the differences and changes array to one dimension.
    foreach ($change_list->getAllCollectionNames() as $colloction) {
      foreach ($change_list->getChangelist(null, $colloction) as $op => $configs) {
        foreach ($configs as $config) {
          if (!($config == "site_audit.settings")) {
            // Push core.extension to changes array if it has diff after filter.
            if (!($config == "core.extension" && empty($core_extension_changes))) {
              array_push($changes_one_dimension, $config);
            }
          }
        }
      }
    }

    $unique_changes = array_unique($changes_one_dimension);

    if (!(empty($unique_changes))) {
      foreach ($unique_changes as $config) {
        $this->differences .= $this->t("Match The @config Active Configuration to Stage Configuration. <br>", ["@config" => $config]);
      }
      return SiteAuditCheckBase::AUDIT_CHECK_SCORE_FAIL;
    }
    return SiteAuditCheckBase::AUDIT_CHECK_SCORE_PASS;
  }

}
