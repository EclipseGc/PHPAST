<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Annotation\Node.
 */

namespace EclipseGc\PHPAST\Annotation;

use EclipseGc\PluginAnnotation\Definition\AnnotatedPluginDefinition;

/**
 * @Annotation
 */
class Node extends AnnotatedPluginDefinition {

  /**
   * The name of the token.
   *
   * @var string
   */
  protected $name;

  /**
   * The description of the token.
   *
   * @var string
   */
  protected $description;

  /**
   * The class name of the custom factory to use if necessary.
   *
   * @var string
   */
  protected $factory = '';

  /**
   * The token name of the node.
   */
  public function getName() : string {
    return $this->name;
  }

  public function getDescription() : string {
    return $this->description;
  }

}