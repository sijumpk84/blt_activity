<?php

namespace Drupal\Blt\Plugin\Commands;

use Acquia\Blt\Robo\BltTasks;
use Symfony\Component\Console\Event\ConsoleCommandEvent;

/**
 * Defines commands in the "custom" namespace.
 */
class MyCustomCommands extends BltTasks {

  /**
   * Create a custom command to blt
   *
   * @command custom:testing
   * @description This is an example command.
   */
  public function testing($value) {
    $message = "no message in config file";
    if ($this->getConfig()->has('my-custom-config.message-to-show')) {
      $message = $this->getConfigValue('my-custom-config.message-to-show');
    }

    $this->say($message . ". The passed value is " . $value);
  }

  /**
   * This will be called before the `custom:testing` command is executed.
   *
   * @hook command-event custom:testing
   */
  public function preExampleHello(ConsoleCommandEvent $event) {
    $command = $event->getCommand();
    // $this->say("preCommandMessage hook: The {$command->getName()} command is about to run!");
  }

}
