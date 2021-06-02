<?php

namespace Jawira\CaseConverterTwig;

use Jawira\CaseConverter\CaseConverter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CaseConverterExtension extends AbstractExtension
{
  protected $cc;

  public function __construct()
  {
    $this->cc = new CaseConverter();
  }

  public function getFilters(): array
  {
    return [new TwigFilter('to_ada', [$this, 'toAda']),
            new TwigFilter('to_cobol', [$this, 'toCobol']),
            new TwigFilter('to_dot', [$this, 'toDot']),
            new TwigFilter('to_kebab', [$this, 'toKebab']),
            new TwigFilter('to_lower', [$this, 'toLower']),
            new TwigFilter('to_macro', [$this, 'toMacro']),
            new TwigFilter('to_pascal', [$this, 'toPascal']),
            new TwigFilter('to_sentence', [$this, 'toSentence']),
            new TwigFilter('to_snake', [$this, 'toSnake']),
            new TwigFilter('to_title', [$this, 'toTitle']),
            new TwigFilter('to_train', [$this, 'toTrain']),
            new TwigFilter('to_upper', [$this, 'toUpper']),
            new TwigFilter('to_camel', [$this, 'toCamel']),];
  }

  public function __call($value, $arguments)
  {
    return $this->cc->convert(reset($arguments))->$value();
  }
}
