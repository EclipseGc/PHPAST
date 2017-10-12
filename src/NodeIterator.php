<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\NodeIterator.
 */

namespace EclipseGc\PHPAST;

use EclipseGc\PHPAST\Plugin\Node\NodeInterface;

class NodeIterator implements \Iterator, \Countable {

  /**
   * The array of nodes.
   *
   * @var array
   */
  protected $nodes;

  /**
   * The current position of the iterator.
   *
   * @var int
   */
  protected $position = 0;

  /**
   * NodeIterator constructor.
   *
   * @param \EclipseGc\PHPAST\Plugin\Node\NodeInterface[] $nodes
   */
  public function __construct(NodeInterface ...$nodes) {
    $this->nodes = $nodes;
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    return $this->nodes[$this->position];
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    ++$this->position;
  }

  /**
   * {@inheritdoc}
   */
  public function key() {
    return $this->position;
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return isset($this->nodes[$this->position]);
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->position = 0;
  }

  public function first() {
    if ($this->nodes) {
      return $this->nodes[0];
    }
  }

  public function last() {
    if ($this->nodes) {
      $count = count($this->nodes) - 1;
      return $this->nodes[$count];
    }
  }

  public function count() {
    return count($this->nodes);
  }


}
