<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Node\NodeInterface.
 */

namespace EclipseGc\PHPAST\Plugin\Node;

use EclipseGc\PHPAST\NodeIterator;
use EclipseGc\Plugin\PluginInterface;

interface NodeInterface extends PluginInterface {

  /**
   * Get the name of the token in this node.
   *
   * @return string
   */
  public function getName() : string ;

  /**
   * Get the value of this node.
   *
   * @return string
   */
  public function getValue() : string ;

  /**
   * Adds subnodes to this node.
   *
   * @param \EclipseGc\PHPAST\Plugin\Node\NodeInterface $node
   *
   * @return NULL
   */
  public function addSubNode(NodeInterface $node);

  /**
   * Returns subnodes of the current node if any.
   *
   * @return NodeIterator
   */
  public function getSubNodes() : NodeIterator ;

  /**
   * Renders the node as a string.
   *
   * @return string
   */
  public function __toString() : string ;

}