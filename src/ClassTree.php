<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\ClassTree.
 */

namespace EclipseGc\PHPAST;

use EclipseGc\PHPAST\Plugin\Node\NodeInterface;

class ClassTree implements NodeTreeInterface {

  /**
   * @var NodeInterface[]
   */
  protected $nodes;

  /**
   * @var NodeInterface[]
   */
  protected $uses;

  /**
   * @var NodeInterface[]
   */
  protected $constants;

  /**
   * @var NodeInterface[]
   */
  protected $properties;

  /**
   * @var NodeInterface[]
   */
  protected $methods;

  public function getUses() {
    return $this->uses;
  }

  public function getConstants() {
    return $this->constants;
  }

  public function getProperties() {
    return $this->properties;
  }

  public function getMethods() {
    return $this->methods;
  }

  public function addNode(NodeInterface $node) {
    $this->nodes[] = $node;
    $this->handleNodes($node);
  }

  protected function handleNodes(NodeInterface $node) {
    switch ($node->getPluginId()) {
      case T_PUBLIC:
      case T_PRIVATE:
      case T_PROTECTED:
        $first = $node->getSubNodes()->first();
        if ($first && $first->getPluginId() == T_FUNCTION) {
          $this->methods[] = $node;
        }
        elseif ($first && $first->getPluginId() == T_VARIABLE) {
          $this->properties[] = $node;
        }
        break;
      case T_FUNCTION:
        $this->methods[] = $node;
        break;
      case T_CONST:
        $this->constants[] = $node;
        break;
      case T_USE:
        $this->uses[] = $node;
        break;
    }
  }

  function __toString() {
    $output = '';
    foreach ($this->nodes as $node) {
      $output .= (string) $node;
    }
    return $output;
  }


}
