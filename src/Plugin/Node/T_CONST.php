<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Node\T_CONST.
 */

namespace EclipseGc\PHPAST\Plugin\Node;

use EclipseGc\PHPAST\NodeDictionary;
use EclipseGc\PHPAST\TokenIterator;
use EclipseGc\Plugin\PluginDefinitionInterface;

class T_CONST extends NodeDefault {

  use DocBlockTrait;

  public function __construct(PluginDefinitionInterface $definition, NodeDictionary $dictionary, $value, $position, TokenIterator $tokens) {
    parent::__construct($definition, $dictionary, $value, $position, $tokens);
    $this->extractComment($tokens, $dictionary, $position);
    $this->extractValue();
  }

  protected function extractValue() {
    $first = TRUE;
    foreach ($this->tokens as $position => $token) {
      if ($first) {
        $first = FALSE;
        $this->tokens->setPosition($this->position);
        continue;
      }
      $node = $this->dictionary->getNode($token, $position, $this->tokens);
      $this->addSubNode($node);
      // Continue iterating the Token iterator and adding them as subnodes
      // until a semicolon is found, then stop iterating.
      if ($token == ';') {
        break;
      }
    }
  }

  public function __toString() : string {
    $output = '';
    if ($this->comment) {
      $output .= (string) $this->comment;
    }
    $output .= parent::__toString();
    return $output;
  }


}