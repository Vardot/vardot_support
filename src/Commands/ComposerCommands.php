<?php

namespace Drupal\vardot_support\Commands;

use Drupal\Component\Serialization\Json;
use Drush\Commands\DrushCommands;

/**
 * Implements the drush commands for backup_migrate.
 */
class ComposerCommands extends DrushCommands {

  /**
   * Drush command to run composer scripts, without composer CLI.
   *
   * @param array $script_name
   *   The script name.
   *
   * @command composer:script
   * @aliases s
   */
  public function composerScript(string $script_name) {
    $composer = Json::decode(file_get_contents(DRUPAL_ROOT . '/../composer.json'));
    if (empty($composer['scripts'][$script_name])) {
      throw new \Exception("Script \"$script_name\" is not defined in this package");
    }

    /**
     * @warning Drupal root must be in a directory (one level) for this to work.
     */
    foreach ($composer['scripts'][$script_name] as $command) {
      $this->processManager()->shell($command)
        ->setWorkingDirectory(DRUPAL_ROOT . '/../')
        ->enableOutput()
        ->mustRun(function ($type, $out) {
          print $out;
        });
    }
  }

}
