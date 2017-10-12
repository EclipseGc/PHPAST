<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\NodeTreeInterface.
 */

namespace EclipseGc\PHPAST;

use EclipseGc\PHPAST\Plugin\Node\NodeInterface;

interface NodeTreeInterface {

  public function addNode(NodeInterface $node);

}
