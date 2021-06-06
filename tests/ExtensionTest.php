<?php

namespace Jawira\CaseConverterTwigTests;

use Jawira\CaseConverterTwig\CaseConverterExtension;
use Twig\Test\IntegrationTestCase;

/**
 * @author Jawira Portugal
 */
class ExtensionTest extends IntegrationTestCase
{
  public function getExtensions()
  {
    return [new CaseConverterExtension()];
  }

  public function getFixturesDir()
  {
    return __DIR__ . '/Fixtures/';
  }
}
