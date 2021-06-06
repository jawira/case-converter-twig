<?php

namespace Jawira\CaseConverterTwig;

use Jawira\CaseConverter\CaseConverter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use function array_keys;
use function array_map;
use function array_values;
use function assert;
use function is_callable;
use function reset;
use function var_dump;

/**
 * @author Jawira Portugal
 */
class CaseConverterExtension extends AbstractExtension
{
  /** @var CaseConverter */
  protected $cc;

  public function __construct()
  {
    $this->cc = new CaseConverter();
  }

  public function getFilters(): array
  {
    /** @var array<string, callable> $filters */
    $filters = ['to_ada'      => [$this, 'toAda'],
                'to_camel'    => [$this, 'toCamel'],
                'to_cobol'    => [$this, 'toCobol'],
                'to_dot'      => [$this, 'toDot'],
                'to_kebab'    => [$this, 'toKebab'],
                'to_lower'    => [$this, 'toLower'],
                'to_macro'    => [$this, 'toMacro'],
                'to_pascal'   => [$this, 'toPascal'],
                'to_sentence' => [$this, 'toSentence'],
                'to_snake'    => [$this, 'toSnake'],
                'to_title'    => [$this, 'toTitle'],
                'to_train'    => [$this, 'toTrain'],
                'to_upper'    => [$this, 'toUpper'],];

    $mapper = function ($filterName, $callable) {
      return new TwigFilter($filterName, $callable);
    };

    return array_map($mapper, array_keys($filters), array_values($filters));
  }

  /**
   * @param string   $value
   * @param string[] $arguments
   * @return string
   * @throws \Jawira\CaseConverter\CaseConverterException
   */
  public function __call($value, $arguments)
  {
    /** @var string $input */
    $input = reset($arguments);

    return $this->cc->convert($input)->$value();
  }
}
