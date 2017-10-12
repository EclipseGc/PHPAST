<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\NodeTreeFactory.
 */

namespace EclipseGc\PHPAST;

class NodeTreeFactory {

  /**
   * @var \EclipseGc\PHPAST\NodeDictionary
   */
  protected $nodeDictionary;

  public function __construct(NodeDictionary $nodeDictionary) {
    $this->nodeDictionary = $nodeDictionary;
  }

  public function getClassTree(string $filePath) {
    if (file_exists($filePath)) {
      $contents = file_get_contents($filePath);
      $tokens = new TokenIterator(token_get_all($contents));
      $tree = new ClassTree();
      foreach ($tokens as $position => $token) {
        $node = $this->nodeDictionary->getNode($token, $position, $tokens);
        $tree->addNode($node);
      }
      return $tree;
    }
  }

  /**
   * @param \EclipseGc\PHPAST\TokenIterator $tokens
   *
   * @return \EclipseGc\PHPAST\NodeTreeInterface
   */
  public function identifyTreeType(TokenIterator $tokens) : NodeTreeInterface {

  }

}
