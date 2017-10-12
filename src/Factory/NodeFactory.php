<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Factory\NodeFactory.
 */

namespace EclipseGc\PHPAST\Factory;

use EclipseGc\Plugin\Factory\FactoryInterface;
use EclipseGc\Plugin\PluginDefinitionInterface;

class NodeFactory implements FactoryInterface {
  public function createInstance(PluginDefinitionInterface $definition, ...$constructors) {
    $class = $definition->getClass();
    return new $class($definition, ...$constructors);
  }

}