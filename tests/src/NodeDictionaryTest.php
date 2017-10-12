<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Test\NodeDictionaryTest.
 */

namespace EclipseGc\PHPAST\Test;

use EclipseGc\PHPAST\ClassTree;
use EclipseGc\PHPAST\NodeDictionary;
use EclipseGc\PHPAST\NodeTreeFactory;
use EclipseGc\PHPAST\Plugin\Node\NodeInterface;

class NodeDictionaryTest extends \PHPUnit_Framework_TestCase {

  /**
   * @var NodeDictionary
   */
  protected $dictionary;

  /**
   * @var NodeTreeFactory
   */
  protected $factory;

  /**
   * @var string
   */
  protected $file;

  protected function setUp() {
    $this->dictionary = new NodeDictionary($this->getNamespaces());
    $this->factory = new NodeTreeFactory($this->dictionary);
    $this->file = __DIR__ . DIRECTORY_SEPARATOR . 'Utility' . DIRECTORY_SEPARATOR . 'TestClass.php';
    parent::setUp();
  }

  /**
   * @covers \EclipseGc\PHPAST\ClassTree::getConstants
   * @covers \EclipseGc\PHPAST\Plugin\Node\NodeInterface::getSubNodes
   * @covers \EclipseGc\PHPAST\Plugin\Node\NodeInterface::getPluginId
   * @covers \EclipseGc\PHPAST\Plugin\Node\NodeInterface::getValue
   */
  public function testClassTreeGetConstants() {
    /** @var ClassTree $tree */
    $tree = $this->factory->getClassTree($this->file);
    $constantsValuesExpectations = [
      '/**
   * The FOO constant.
   */
const FOO = 1;',
      'const BAR = \'test\';'
    ];
    $subNodeExpectations = [
      [
        [
          'pluginId' => T_WHITESPACE,
          'value' => ' ',
        ],
        [
          'pluginId' => T_STRING,
          'value' => 'FOO',
        ],
        [
          'pluginId' => T_WHITESPACE,
          'value' => ' ',
        ],
        [
          'pluginId' => 'string_literal',
          'value' => '=',
        ],
        [
          'pluginId' => T_WHITESPACE,
          'value' => ' ',
        ],
        [
          'pluginId' => T_LNUMBER,
          'value' => '1',
        ],
        [
          'pluginId' => 'string_literal',
          'value' => ';',
        ],
      ],
      [
        [
          'pluginId' => T_WHITESPACE,
          'value' => ' ',
        ],
        [
          'pluginId' => T_STRING,
          'value' => 'BAR',
        ],
        [
          'pluginId' => T_WHITESPACE,
          'value' => ' ',
        ],
        [
          'pluginId' => 'string_literal',
          'value' => '=',
        ],
        [
          'pluginId' => T_WHITESPACE,
          'value' => ' ',
        ],
        [
          'pluginId' => T_CONSTANT_ENCAPSED_STRING,
          'value' => '\'test\'',
        ],
        [
          'pluginId' => 'string_literal',
          'value' => ';',
        ],
      ],
    ];
    $i = 0;
    /** @var NodeInterface $constant */
    foreach ($tree->getConstants() as $constant) {
      $this->assertEquals('EclipseGc\PHPAST\Plugin\Node\T_CONST', get_class($constant));
      $this->assertEquals($constantsValuesExpectations[$i], (string) $constant);
      print_r(PHP_EOL);
      print_r((string) $constant);
      $this->assertEquals(T_CONST, $constant->getPluginId());
      $this->assertEquals('const', $constant->getValue());
      $subNodes = $constant->getSubNodes();
      $this->assertEquals(7, count($subNodes));
      foreach ($subNodes as $position => $node) {
        $this->assertEquals($subNodeExpectations[$i][$position]['pluginId'], $node->getPluginId());
        $this->assertEquals($subNodeExpectations[$i][$position]['value'], $node->getValue());
      }
      $i++;
    }
  }

  function testClassTreeGetUses() {
    /** @var ClassTree $tree */
    $tree = $this->factory->getClassTree($this->file);
    foreach ($tree->getUses() as $use) {
      print_r(PHP_EOL);
      print_r(get_class($use));
      print_r(PHP_EOL);
      print_r((string) $use);
      //print_r(unserialize(serialize($use->getSubNodes())));
    }
    //print_r((string) $tree);
  }

  protected function getNamespaces() {
    $directory = __DIR__;
    $directory_path = explode(DIRECTORY_SEPARATOR, $directory);
    array_pop($directory_path);
    array_pop($directory_path);
    array_push($directory_path, 'src');
    $directory = implode(DIRECTORY_SEPARATOR, $directory_path);
    $namespaces = [
      'EclipseGc\PHPAST' => $directory,
    ];
    return new \ArrayIterator($namespaces);
  }
}