<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Node\NodeDefault.
 */

namespace EclipseGc\PHPAST\Plugin\Node;

use EclipseGc\PHPAST\NodeDictionary;
use EclipseGc\PHPAST\NodeIterator;
use EclipseGc\PHPAST\TokenIterator;
use EclipseGc\Plugin\PluginDefinitionInterface;

/**
 * @EclipseGc\PHPAST\Annotation\NodeDeriver(
 *   pluginId = "node_default",
 *   deriver = "EclipseGc\PHPAST\Plugin\Deriver\Node\NodeDefault"
 * )
 */
class NodeDefault implements NodeInterface {

  /**
   * The value of the node.
   *
   * @var string
   */
  protected $value;

  /**
   * The plugin definition.
   *
   * @var PluginDefinitionInterface
   */
  protected $definition;

  /**
   * The node dictionary.
   *
   * @var \EclipseGc\PHPAST\NodeDictionary
   */
  protected $dictionary;

  /**
   * Direct subnodes of this node.
   *
   * @var \EclipseGc\PHPAST\Plugin\Node\NodeInterface[]
   */
  protected $nodes = [];

  /**
   * @var \EclipseGc\PHPAST\TokenIterator
   */
  protected $tokens;

  /**
   * NodeDefault constructor.
   *
   * @param \EclipseGc\Plugin\PluginDefinitionInterface $definition
   * @param \EclipseGc\PHPAST\NodeDictionary $dictionary
   * @param $value
   * @param $position
   * @param \EclipseGc\PHPAST\TokenIterator $tokens
   */
  public function __construct(PluginDefinitionInterface $definition, NodeDictionary $dictionary, $value, $position, TokenIterator $tokens) {
    $this->definition = $definition;
    $this->dictionary = $dictionary;
    $this->value = $value;
    $this->position = $position;
    $this->tokens = $tokens;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() : string {
    return $this->getPluginDefinition()->getName();
  }

  /**
   * {@inheritdoc}
   */
  public function getValue() : string {
    return $this->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getPluginId() : string {
    return $this->getPluginDefinition()->getPluginId();
  }

  /**
   * {@inheritdoc}
   */
  public function getPluginDefinition() : PluginDefinitionInterface {
    return $this->definition;
  }

  /**
   * {@inheritdoc}
   */
  public function addSubNode(NodeInterface $node) {
    $this->nodes[] = $node;
  }


  /**
   * {@inheritdoc}
   */
  public function getSubNodes() : NodeIterator {
    return new NodeIterator(...$this->nodes);
  }

  /**
   * {@inheritdoc}
   */
  public function __toString() : string {
    $output = $this->getValue();
    foreach ($this->nodes as $node) {
      $output .= (string) $node;
    }
    return $output;
  }

  function __sleep() {
    $vars = get_object_vars($this);
    unset($vars['dictionary']);
    unset($vars['tokens']);
    print_r(array_keys($vars));
    return array_keys($vars);
  }


}
