<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Node\DocBlockTrait.
 */

namespace EclipseGc\PHPAST\Plugin\Node;

use EclipseGc\PHPAST\NodeDictionary;
use EclipseGc\PHPAST\TokenIterator;

trait DocBlockTrait {

  /**
   * @var NodeInterface
   */
  protected $comment;

  /**
   * Append a T_DOC_COMMENT.
   *
   * @param \EclipseGc\PHPAST\Plugin\Node\NodeInterface $node
   */
  public function addComment(NodeInterface $node) {
    $this->comment = $node;
  }

  /**
   * Get the comment if any.
   *
   * @return \EclipseGc\PHPAST\Plugin\Node\NodeInterface
   */
  public function getComment() {
    return $this->comment;
  }

  /**
   * Extract a doc block comment and append it to this node.
   *
   * @param \EclipseGc\PHPAST\TokenIterator|\Iterator $tokens
   * @param \EclipseGc\PHPAST\NodeDictionary $dictionary
   * @param int $position
   */
  protected function extractComment(TokenIterator $tokens, NodeDictionary $dictionary, int $position) {
    $reverse = $position - 1;
    while ($reverse > 0) {
      $tokens->setPosition($reverse);
      $token = $tokens->current();
      /** @var NodeInterface $comment */
      $comment = $dictionary->getNode($token, $reverse, $tokens);
      if ($comment->getPluginId() == T_WHITESPACE) {
        $reverse--;
      }
      elseif ($comment->getPluginId() == T_DOC_COMMENT) {
        $whitespaces = ($position - 1) - $reverse;
        $add = 1;
        while ($add <= $whitespaces) {
          /** @var NodeInterface $whitespace */
          $whitespace = $dictionary->createInstance(T_WHITESPACE, $dictionary, "\n", $position - $add, $tokens);
          $comment->addSubNode($whitespace);
          $add++;
        }
        $this->addComment($comment);
        break;
      }
      else {
        break;
      }
    }
  }

}
