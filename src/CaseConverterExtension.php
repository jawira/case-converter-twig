<?php

namespace Jawira\CaseConverterTwig;

use Exception;
use Jawira\CaseConverter\CaseConverter;
use Jawira\CaseConverter\Convert;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use function array_map;
use function is_string;
use function reset;

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
    $filters = ['to_ada',
                'to_camel',
                'to_cobol',
                'to_dot',
                'to_kebab',
                'to_lower',
                'to_macro',
                'to_pascal',
                'to_sentence',
                'to_snake',
                'to_title',
                'to_train',
                'to_upper',
                'from_auto',
                'from_ada',
                'from_camel',
                'from_cobol',
                'from_dot',
                'from_kebab',
                'from_lower',
                'from_macro',
                'from_pascal',
                'from_sentence',
                'from_snake',
                'from_title',
                'from_train',
                'from_upper',];

    $mapper = function ($filter) {
      $method = $this->cc->convert($filter)->toCamel();
      /** @var callable $callback */
      $callback = [$this, $method];
      return new TwigFilter($filter, $callback);
    };

    return array_map($mapper, $filters);
  }

  /**
   * @param string                                          $value
   * @param array<int,string|\Jawira\CaseConverter\Convert> $arguments
   * @return string
   * @throws \Jawira\CaseConverter\CaseConverterException
   * @throws Exception
   */
  public function __call($value, $arguments)
  {
    /** @var string|\Jawira\CaseConverter\Convert $input */
    $input   = reset($arguments);
    $convert = is_string($input) ? $this->cc->convert($input) : $input;
    if (!($convert instanceof Convert)) {
      throw new Exception('Invalid value to convert.');
    }
    return $convert->$value();
  }
}
