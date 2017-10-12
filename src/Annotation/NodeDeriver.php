<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Annotation\NodeDefault.
 */

namespace EclipseGc\PHPAST\Annotation;

use EclipseGc\Plugin\Derivative\PluginDefinitionDerivativeInterface;

/**
 * @Annotation
 */
class NodeDeriver extends Node implements PluginDefinitionDerivativeInterface {

  /**
   * The class used to generate derivatives of this plugin definition.
   *
   * @var string
   */
  protected $deriver;

  /**
   * {@inheritdoc}
   */
  public function getDeriver() : string {
    return $this->deriver;
  }

}
