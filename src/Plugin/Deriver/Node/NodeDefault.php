<?php

/**
 * @file
 * Contains \EclipseGc\PHPAST\Plugin\Deriver\Node\NodeDefault.
 */

namespace EclipseGc\PHPAST\Plugin\Deriver\Node;

use EclipseGc\Plugin\Derivative\PluginDefinitionDerivativeInterface;
use EclipseGc\Plugin\Derivative\PluginDeriverInterface;

class NodeDefault implements PluginDeriverInterface {

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions(PluginDefinitionDerivativeInterface $definition) {
    $definitions = [];
    foreach ($this->getTConstants() as $pluginId => $info) {
      $description = $info['description'];
      $constant = $info['constant'];
      $annotation = '\EclipseGc\PHPAST\Annotation\Node';

      $class = class_exists("\\EclipseGc\\PHPAST\\Plugin\\Node\\$constant") ? "\\EclipseGc\\PHPAST\\Plugin\\Node\\$constant" : $definition->getClass();
      $definitions[$pluginId] = new $annotation(['pluginId' => $pluginId, 'name' => token_name($pluginId), 'description' => $description, 'class' => $class]);
    }
    return $definitions;
  }

  protected function getTConstants() {
    return [
      T_ABSTRACT => [
        'constant' => 'T_ABSTRACT',
        'description' => 'abstract Class Abstraction (available since PHP 5.0.0)',
      ],
      T_AND_EQUAL => [
        'constant' => 'T_AND_EQUAL',
        'description' => '&= assignment operators',
      ],
      T_ARRAY => [
        'constant' => 'T_ARRAY',
        'description' => 'array() array(), array syntax',
      ],
      T_ARRAY_CAST => [
        'constant' => 'T_ARRAY_CAST',
        'description' => '(array) type-casting',
      ],
      T_AS => [
        'constant' => 'T_AS',
        'description' => 'as foreach',
      ],
      //T_BAD_CHARACTER => 'anything below ASCII 32 except \t (0x09), \n (0x0a) and \r (0x0d)',
      T_BOOLEAN_AND => [
        'constant' => 'T_BOOLEAN_AND',
        'description' => '&& logical operators',
      ],
      T_BOOLEAN_OR => [
        'constant' => 'T_BOOLEAN_OR',
        'description' => '|| logical operators',
      ],
      T_BOOL_CAST => [
        'constant' => 'T_BOOL_CAST',
        'description' => '(bool) or (boolean) type-casting',
      ],
      T_BREAK => [
        'constant' => 'T_BREAK',
        'description' => 'break break',
      ],
      T_CALLABLE => [
        'constant' => 'T_CALLABLE',
        'description' => 'callable callable',
      ],
      T_CASE => [
        'constant' => 'T_CASE',
        'description' => 'case switch',
      ],
      T_CATCH => [
        'constant' => 'T_CATCH',
        'description' => 'catch Exceptions (available since PHP 5.0.0)',
      ],
      //T_CHARACTER => 'not used anymore',
      T_CLASS => [
        'constant' => 'T_CLASS',
        'description' => 'class classes and objects',
      ],
      T_CLASS_C => [
        'constant' => 'T_CLASS_C',
        'description' => '__CLASS__ magic constants',
      ],
      T_CLONE => [
        'constant' => 'T_CLONE',
        'description' => 'clone classes and objects',
      ],
      T_CLOSE_TAG => [
        'constant' => 'T_CLOSE_TAG',
        'description' => '?> or %> escaping from HTML',
      ],
      T_COMMENT => [
        'constant' => 'T_COMMENT',
        'description' => '// or #, and /* */ comments',
      ],
      T_CONCAT_EQUAL => [
        'constant' => 'T_CONCAT_EQUAL',
        'description' => '.= assignment operators',
      ],
      T_CONST => [
        'constant' => 'T_CONST',
        'description' => 'const class constants',
      ],
      T_CONSTANT_ENCAPSED_STRING => [
        'constant' => 'T_CONSTANT_ENCAPSED_STRING',
        'description' => '"foo" or \'bar\' string syntax',
      ],
      T_CONTINUE => [
        'constant' => 'T_CONTINUE',
        'description' => 'continue continue',
      ],
      T_CURLY_OPEN => [
        'constant' => 'T_CURLY_OPEN',
        'description' => '{$ complex variable parsed syntax',
      ],
      T_DEC => [
        'constant' => 'T_DEC',
        'description' => '-- incrementing/decrementing operators',
      ],
      T_DECLARE => [
        'constant' => 'T_DECLARE',
        'description' => 'declare declare',
      ],
      T_DEFAULT => [
        'constant' => 'T_DEFAULT',
        'description' => 'default switch',
      ],
      T_DIR => [
        'constant' => 'T_DIR',
        'description' => '__DIR__ magic constants (available since PHP 5.3.0)',
      ],
      T_DIV_EQUAL => [
        'constant' => 'T_DIV_EQUAL',
        'description' => '/= assignment operators',
      ],
      T_DNUMBER => [
        'constant' => 'T_DNUMBER',
        'description' => '0.12, etc. floating point numbers',
      ],
      T_DOC_COMMENT => [
        'constant' => 'T_DOC_COMMENT',
        'description' => '/** */ PHPDoc style comments',
      ],
      T_DO => [
        'constant' => 'T_DO',
        'description' => 'do do..while',
      ],
      T_DOLLAR_OPEN_CURLY_BRACES => [
        'constant' => 'T_DOLLAR_OPEN_CURLY_BRACES',
        'description' => '${ complex variable parsed syntax',
      ],
      T_DOUBLE_ARROW => [
        'constant' => 'T_DOUBLE_ARROW',
        'description' => '=> array syntax',
      ],
      T_DOUBLE_CAST => [
        'constant' => 'T_DOUBLE_CAST',
        'description' => '(real), (double) or (float) type-casting',
      ],
      T_DOUBLE_COLON => [
        'constant' => 'T_DOUBLE_COLON',
        'description' => ':: see T_PAAMAYIM_NEKUDOTAYIM below',
      ],
      T_ECHO => [
        'constant' => 'T_ECHO',
        'description' => 'echo echo',
      ],
      T_ELLIPSIS => [
        'constant' => 'T_ELLIPSIS',
        'description' => '... function arguments (available since PHP 5.6.0)',
      ],
      T_ELSE => [
        'constant' => 'T_ELSE',
        'description' => 'else else',
      ],
      T_ELSEIF => [
        'constant' => 'T_ELSEIF',
        'description' => 'elseif elseif',
      ],
      T_EMPTY => [
        'constant' => 'T_EMPTY',
        'description' => 'empty empty()',
      ],
      T_ENCAPSED_AND_WHITESPACE => [
        'constant' => 'T_ENCAPSED_AND_WHITESPACE',
        'description' => '" $a" constant part of string with variables',
      ],
      T_ENDDECLARE => [
        'constant' => 'T_ENDDECLARE',
        'description' => 'enddeclare declare, alternative syntax',
      ],
      T_ENDFOR => [
        'constant' => 'T_ENDFOR',
        'description' => 'endfor for, alternative syntax',
      ],
      T_ENDFOREACH => [
        'constant' => 'T_ENDFOREACH',
        'description' => 'endforeach foreach, alternative syntax',
      ],
      T_ENDIF => [
        'constant' => 'T_ENDIF',
        'description' => 'endif if, alternative syntax',
      ],
      T_ENDSWITCH => [
        'constant' => 'T_ENDSWITCH',
        'description' => 'endswitch switch, alternative syntax',
      ],
      T_ENDWHILE => [
        'constant' => 'T_ENDWHILE',
        'description' => 'endwhile while, alternative syntax',
      ],
      T_END_HEREDOC => [
        'constant' => 'T_END_HEREDOC',
        'description' => 'heredoc syntax',
      ],
      T_EVAL => [
        'constant' => 'T_EVAL',
        'description' => 'eval() eval()',
      ],
      T_EXIT => [
        'constant' => 'T_EXIT',
        'description' => 'exit or die exit(), die()',
      ],
      T_EXTENDS => [
        'constant' => 'T_EXTENDS',
        'description' => 'extends extends, classes and objects',
      ],
      T_FILE => [
        'constant' => 'T_FILE',
        'description' => '__FILE__ magic constants',
      ],
      T_FINAL => [
        'constant' => 'T_FINAL',
        'description' => 'final Final Keyword',
      ],
      T_FINALLY => [
        'constant' => 'T_FINALLY',
        'description' => 'finally Exceptions (available since PHP 5.5.0)',
      ],
      T_FOR => [
        'constant' => 'T_FOR',
        'description' => 'for for',
      ],
      T_FOREACH => [
        'constant' => 'T_FOREACH',
        'description' => 'foreach foreach',
      ],
      T_FUNCTION => [
        'constant' => 'T_FUNCTION',
        'description' => 'function or cfunction functions',
      ],
      T_FUNC_C => [
        'constant' => 'T_FUNC_C',
        'description' => '__FUNCTION__ magic constants',
      ],
      T_GLOBAL => [
        'constant' => 'T_GLOBAL',
        'description' => 'global variable scope',
      ],
      T_GOTO => [
        'constant' => 'T_GOTO',
        'description' => 'goto (available since PHP 5.3.0)',
      ],
      T_HALT_COMPILER => [
        'constant' => 'T_HALT_COMPILER',
        'description' => '__halt_compiler() __halt_compiler (available since PHP 5.1.0)',
      ],
      T_IF => [
        'constant' => 'T_IF',
        'description' => 'if if',
      ],
      T_IMPLEMENTS => [
        'constant' => 'T_IMPLEMENTS',
        'description' => 'implements Object Interfaces',
      ],
      T_INC => [
        'constant' => 'T_INC',
        'description' => '++ incrementing/decrementing operators',
      ],
      T_INCLUDE => [
        'constant' => 'T_INCLUDE',
        'description' => 'include() include',
      ],
      T_INCLUDE_ONCE => [
        'constant' => 'T_INCLUDE_ONCE',
        'description' => 'include_once() include_once',
      ],
      T_INLINE_HTML => [
        'constant' => 'T_INLINE_HTML',
        'description' => 'text outside PHP',
      ],
      T_INSTANCEOF => [
        'constant' => 'T_INSTANCEOF',
        'description' => 'instanceof type operators',
      ],
      T_INSTEADOF => [
        'constant' => 'T_INSTEADOF',
        'description' => 'insteadof Traits (available since PHP 5.4.0)',
      ],
      T_INT_CAST => [
        'constant' => 'T_INT_CAST',
        'description' => '(int) or (integer) type-casting',
      ],
      T_INTERFACE => [
        'constant' => 'T_INTERFACE',
        'description' => 'interface Object Interfaces',
      ],
      T_ISSET => [
        'constant' => 'T_ISSET',
        'description' => 'isset() isset()',
      ],
      T_IS_EQUAL => [
        'constant' => 'T_IS_EQUAL',
        'description' => '== comparison operators',
      ],
      T_IS_GREATER_OR_EQUAL => [
        'constant' => 'T_IS_GREATER_OR_EQUAL',
        'description' => '>= comparison operators',
      ],
      T_IS_IDENTICAL => [
        'constant' => 'T_IS_IDENTICAL',
        'description' => '=== comparison operators',
      ],
      T_IS_NOT_EQUAL => [
        'constant' => 'T_IS_NOT_EQUAL',
        'description' => '!= or <> comparison operators',
      ],
      T_IS_NOT_IDENTICAL => [
        'constant' => 'T_IS_NOT_IDENTICAL',
        'description' => '!== comparison operators',
      ],
      T_IS_SMALLER_OR_EQUAL => [
        'constant' => 'T_IS_SMALLER_OR_EQUAL',
        'description' => '<= comparison operators',
      ],
      T_SPACESHIP => [
        'constant' => 'T_SPACESHIP',
        'description' => '<=> comparison operators (available since PHP 7.0.0)',
      ],
      T_LINE => [
        'constant' => 'T_LINE',
        'description' => '__LINE__ magic constants',
      ],
      T_LIST => [
        'constant' => 'T_LIST',
        'description' => 'list() list()',
      ],
      T_LNUMBER => [
        'constant' => 'T_LNUMBER',
        'description' => '123, 012, 0x1ac, etc. integers',
      ],
      T_LOGICAL_AND => [
        'constant' => 'T_LOGICAL_AND',
        'description' => 'and logical operators',
      ],
      T_LOGICAL_OR => [
        'constant' => 'T_LOGICAL_OR',
        'description' => 'or logical operators',
      ],
      T_LOGICAL_XOR => [
        'constant' => 'T_LOGICAL_XOR',
        'description' => 'xor logical operators',
      ],
      T_METHOD_C => [
        'constant' => 'T_METHOD_C',
        'description' => '__METHOD__ magic constants',
      ],
      T_MINUS_EQUAL => [
        'constant' => 'T_MINUS_EQUAL',
        'description' => '-= assignment operators',
      ],
      T_MOD_EQUAL => [
        'constant' => 'T_MOD_EQUAL',
        'description' => '%= assignment operators',
      ],
      T_MUL_EQUAL => [
        'constant' => 'T_MUL_EQUAL',
        'description' => '*= assignment operators',
      ],
      T_NAMESPACE => [
        'constant' => 'T_NAMESPACE',
        'description' => 'namespace namespaces (available since PHP 5.3.0)',
      ],
      T_NS_C => [
        'constant' => 'T_NS_C',
        'description' => '__NAMESPACE__ namespaces (available since PHP 5.3.0)',
      ],
      T_NS_SEPARATOR => [
        'constant' => 'T_NS_SEPARATOR',
        'description' => '\ namespaces (available since PHP 5.3.0)',
      ],
      T_NEW => [
        'constant' => 'T_NEW',
        'description' => 'new classes and objects',
      ],
      T_NUM_STRING => [
        'constant' => 'T_NUM_STRING',
        'description' => '"$a[0]" numeric array index inside string',
      ],
      T_OBJECT_CAST => [
        'constant' => 'T_OBJECT_CAST',
        'description' => '(object) type-casting',
      ],
      T_OBJECT_OPERATOR => [
        'constant' => 'T_OBJECT_OPERATOR',
        'description' => '-> classes and objects',
      ],
      T_OPEN_TAG => [
        'constant' => 'T_OPEN_TAG',
        'description' => '<?php, <? or <% escaping from HTML',
      ],
      T_OPEN_TAG_WITH_ECHO => [
        'constant' => 'T_OPEN_TAG_WITH_ECHO',
        'description' => '<?= or <%= escaping from HTML',
      ],
      T_OR_EQUAL => [
        'constant' => 'T_OR_EQUAL',
        'description' => '|= assignment operators',
      ],
      T_PAAMAYIM_NEKUDOTAYIM => [
        'constant' => 'T_PAAMAYIM_NEKUDOTAYIM',
        'description' => ':: ::. Also defined as T_DOUBLE_COLON.',
      ],
      T_PLUS_EQUAL => [
        'constant' => 'T_PLUS_EQUAL',
        'description' => '+= assignment operators',
      ],
      T_POW => [
        'constant' => 'T_POW',
        'description' => '** arithmetic operators (available since PHP 5.6.0)',
      ],
      T_POW_EQUAL => [
        'constant' => 'T_POW_EQUAL',
        'description' => '**= assignment operators (available since PHP 5.6.0)',
      ],
      T_PRINT => [
        'constant' => 'T_PRINT',
        'description' => 'print() print',
      ],
      T_PRIVATE => [
        'constant' => 'T_PRIVATE',
        'description' => 'private classes and objects',
      ],
      T_PUBLIC => [
        'constant' => 'T_PUBLIC',
        'description' => 'public classes and objects',
      ],
      T_PROTECTED => [
        'constant' => 'T_PROTECTED',
        'description' => 'protected classes and objects',
      ],
      T_REQUIRE => [
        'constant' => 'T_REQUIRE',
        'description' => 'require() require',
      ],
      T_REQUIRE_ONCE => [
        'constant' => 'T_REQUIRE_ONCE',
        'description' => 'require_once() require_once',
      ],
      T_RETURN => [
        'constant' => 'T_RETURN',
        'description' => 'return returning values',
      ],
      T_SL => [
        'constant' => 'T_SL',
        'description' => '<< bitwise operators',
      ],
      T_SL_EQUAL => [
        'constant' => 'T_SL_EQUAL',
        'description' => '<<= assignment operators',
      ],
      T_SR => [
        'constant' => 'T_SR',
        'description' => '>> bitwise operators',
      ],
      T_SR_EQUAL => [
        'constant' => 'T_SR_EQUAL',
        'description' => '>>= assignment operators',
      ],
      T_START_HEREDOC => [
        'constant' => 'T_START_HEREDOC',
        'description' => '<<< heredoc syntax',
      ],
      T_STATIC => [
        'constant' => 'T_STATIC',
        'description' => 'static variable scope',
      ],
      T_STRING => [
        'constant' => 'T_STRING',
        'description' => 'parent, self, etc. identifiers, e.g. keywords like parent and self, function names, class names and more are matched. See also T_CONSTANT_ENCAPSED_STRING.',
      ],
      T_STRING_CAST => [
        'constant' => 'T_STRING_CAST',
        'description' => '(string) type-casting',
      ],
      T_STRING_VARNAME => [
        'constant' => 'T_STRING_VARNAME',
        'description' => '"${a complex variable parsed syntax',
      ],
      T_SWITCH => [
        'constant' => 'T_SWITCH',
        'description' => 'switch switch',
      ],
      T_THROW => [
        'constant' => 'T_THROW',
        'description' => 'throw Exceptions',
      ],
      T_TRAIT => [
        'constant' => 'T_TRAIT',
        'description' => 'trait Traits (available since PHP 5.4.0)',
      ],
      T_TRAIT_C => [
        'constant' => 'T_TRAIT_C',
        'description' => '__TRAIT__ __TRAIT__ (available since PHP 5.4.0)',
      ],
      T_TRY => [
        'constant' => 'T_TRY',
        'description' => 'try Exceptions',
      ],
      T_UNSET => [
        'constant' => 'T_UNSET',
        'description' => 'unset() unset()',
      ],
      T_UNSET_CAST => [
        'constant' => 'T_UNSET_CAST',
        'description' => '(unset) type-casting',
      ],
      T_USE => [
        'constant' => 'T_USE',
        'description' => 'use namespaces (available since PHP 5.3.0; reserved since PHP 4.0.0)',
      ],
      T_VAR => [
        'constant' => 'T_VAR',
        'description' => 'var classes and objects',
      ],
      T_VARIABLE => [
        'constant' => 'T_VARIABLE',
        'description' => '$foo variables',
      ],
      T_WHILE => [
        'constant' => 'T_WHILE',
        'description' => 'while while, do..while',
      ],
      T_WHITESPACE => [
        'constant' => 'T_WHITESPACE',
        'description' => '\t \r\n',
      ],
      T_XOR_EQUAL => [
        'constant' => 'T_XOR_EQUAL',
        'description' => '^= assignment operators',
      ],
      T_YIELD => [
        'constant' => 'T_YIELD',
        'description' => 'yield generators (available since PHP 5.5.0)'
      ],
    ];
  }

}
