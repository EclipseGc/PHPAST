<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\TokenIterator.
 */

namespace EclipseGc\PHPAST;

class TokenIterator implements \Iterator {

  /**
   * The array of tokens from token_get_all()
   *
   * @var array
   */
  protected $tokens;

  /**
   * The current position of the iterator.
   *
   * @var int
   */
  protected $position = 0;

  /**
   * TokenIterator constructor.
   */
  public function __construct(array $tokens) {
    $this->tokens = $tokens;
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    return $this->tokens[$this->position];
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
    return isset($this->tokens[$this->position]);
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    if ($this->position == count($this->tokens)) {
      $this->position = 0;
    }
  }

  public function setPosition(int $postition) {
    $this->position = $postition;
  }

}