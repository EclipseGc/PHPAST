<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\NodeDictionary.
 */

namespace EclipseGc\PHPAST;

use EclipseGc\PHPAST\Derivative\DeriverResolver;
use EclipseGc\PHPAST\Factory\FactoryResolver;
use EclipseGc\PHPAST\Plugin\Node\NodeInterface;
use EclipseGc\Plugin\Dictionary\PluginDictionaryInterface;
use EclipseGc\Plugin\Mutator\PluginDefinitionDeriverMutator;
use EclipseGc\Plugin\PluginInterface;
use EclipseGc\Plugin\Traits\PluginDictionaryTrait;
use EclipseGc\PluginAnnotation\Discovery\AnnotatedPluginDiscovery;

class NodeDictionary implements PluginDictionaryInterface {

  use PluginDictionaryTrait;

  public function __construct(\Traversable $namespaces) {
    $this->plugin_type = 'tree_node';
    $this->discovery = new AnnotatedPluginDiscovery($namespaces, 'Plugin' . DIRECTORY_SEPARATOR . 'Node', 'EclipseGc\PHPAST\Plugin\Node\NodeInterface', 'EclipseGc\PHPAST\Annotation\Node');
    $this->mutators = [new PluginDefinitionDeriverMutator(new DeriverResolver())];
    $this->factory_class = 'EclipseGc\PHPAST\Factory\NodeFactory';
    $this->factoryResolver = new FactoryResolver();
  }

  /**
   * {@inheritdoc}
   */
  public function createInstance(string $pluginId, ...$constructors) : PluginInterface {
    $definition = $this->getDefinition($pluginId);
    $factory_class = $definition->getFactory();
    $factory = $this->resolveFactory($factory_class);
    return $factory->createInstance($definition, ...$constructors);
  }

  public function getNode($token, $position, $tokens) : NodeInterface {
    if (is_array($token)) {
      $plugin = $this->createInstance($token[0], $this, $token[1], $position, $tokens);
    }
    else {
      $plugin = $this->createInstance('string_literal', $this, $token, $position, $tokens);
    }
    return $plugin;
  }

}
