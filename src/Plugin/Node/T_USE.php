<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Node\T_USE.
 */

namespace EclipseGc\PHPAST\Plugin\Node;

use EclipseGc\PHPAST\Exception\NodeGrammarException;
use EclipseGc\PHPAST\NodeDictionary;
use EclipseGc\PHPAST\TokenIterator;
use EclipseGc\Plugin\PluginDefinitionInterface;

class T_USE extends NodeDefault {

  public function __construct(PluginDefinitionInterface $definition, NodeDictionary $dictionary, $value, $position, TokenIterator $tokens) {
    parent::__construct($definition, $dictionary, $value, $position, $tokens);
    $this->extractValue();
    //$this->validateGrammar();
  }

  protected function extractValue() {
    $first = TRUE;
    foreach ($this->tokens as $position => $token) {
      if ($first) {
        $first = FALSE;
        $this->tokens->setPosition($position);
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

  protected function validateGrammar() {
    $rules = $this->getGrammarRules();
    $nodes = $this->getSubNodes();
    foreach ($rules as $key => $value) {
      $node = $nodes->current();
      if ($key === 'string_literal') {
        if ($node->getPluginId() != $key && $node->getValue() != $value) {
          throw new NodeGrammarException(sprintf("Expected a node of type 'string_literal' with a value of %s. Node of type %d found with a value of %s.", $key, $value, $node->getPluginId(), $node->getValue()));
        }
      }
      $nodes->next();
    }
  }

  protected function getGrammarRules() {
    return [
      T_WHITESPACE,
      [
        T_STRING,
        T_NS_SEPARATOR
      ],
      'string_literal' => ';'
    ];
  }

}
