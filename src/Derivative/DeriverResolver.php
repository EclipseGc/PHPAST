<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Derivative\DeriverResolver.
 */

namespace EclipseGc\PHPAST\Derivative;

use EclipseGc\Plugin\Derivative\PluginDeriverInterface;
use EclipseGc\Plugin\Derivative\PluginDeriverResolverInterface;

class DeriverResolver implements PluginDeriverResolverInterface {

  /**
   * {@inheritdoc}
   */
  public function getDeriverInstance(string $resolverClass): PluginDeriverInterface {
    $resolver = new $resolverClass();
    return $resolver;
  }

}
