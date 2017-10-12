<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Test\Utility\TestClass.
 */

namespace EclipseGc\PHPAST\Test\Utility;

use EclipseGc\PHPAST\Test\Foo;

class TestClass {

  /**
   * The FOO constant.
   */
  const FOO = 1;

  const BAR = 'test';

  protected $arg1;

  public $arg2 = [];

  public function myTestMethod($param1, $param2) {
    return $param1 + $param2;
  }

}
