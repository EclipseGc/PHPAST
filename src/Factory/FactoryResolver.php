<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Factory\FactoryResolver.
 */

namespace EclipseGc\PHPAST\Factory;

use EclipseGc\Plugin\Factory\FactoryInterface;
use EclipseGc\Plugin\Factory\FactoryResolverInterface;

class FactoryResolver implements FactoryResolverInterface {

  public function getFactoryInstance(string $factoryClass) : FactoryInterface {
    return new NodeFactory();
  }

}