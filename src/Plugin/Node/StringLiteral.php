<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Node\StringLiteral.
 */

namespace EclipseGc\PHPAST\Plugin\Node;

/**
 * @EclipseGc\PHPAST\Annotation\Node(
 *   pluginId = "string_literal",
 *   name = "String literal",
 *   description = "Plugin non-array tokens."
 * )
 */
class StringLiteral extends NodeDefault {

  /**
   * {@inheritdoc}
   */
  public function addSubNode(NodeInterface $node) {
    throw new \Exception("String literal nodes cannot have attached subnodes.");
  }

}
