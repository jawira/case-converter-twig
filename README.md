🔤 Twig extension for Case Converter
====================================

This Twig extension is port from **jawira/case-converter**.

[![Latest Stable Version](https://poser.pugx.org/jawira/case-converter-twig/v)](//packagist.org/packages/jawira/case-converter-twig)
[![Total Downloads](https://poser.pugx.org/jawira/case-converter-twig/downloads)](//packagist.org/packages/jawira/case-converter-twig)
[![composer.lock](https://poser.pugx.org/jawira/case-converter-twig/composerlock)](//packagist.org/packages/jawira/case-converter-twig)
[![.gitattributes](https://poser.pugx.org/jawira/case-converter-twig/gitattributes)](//packagist.org/packages/jawira/case-converter-twig)
[![License](https://poser.pugx.org/jawira/case-converter-twig/license)](//packagist.org/packages/jawira/case-converter-twig)

Usage
-----

This library provides the following filters:

| **from_**       | **to_**       |
|-----------------|---------------|
| `from_auto`     |               |
| `from_ada`      | `to_ada`      |
| `from_camel`    | `to_camel`    |
| `from_cobol`    | `to_cobol`    |
| `from_dot`      | `to_dot`      |
| `from_kebab`    | `to_kebab`    |
| `from_lower`    | `to_lower`    |
| `from_macro`    | `to_macro`    |
| `from_pascal`   | `to_pascal`   |
| `from_sentence` | `to_sentence` |
| `from_snake`    | `to_snake`    |
| `from_title`    | `to_title`    |
| `from_train`    | `to_train`    |
| `from_uppder`   |  `to_upper`   |

Use a `to_*` filter to [automatically](https://jawira.github.io/case-converter/detection-algorithm.html) change the
casing convention of a *string*:

```twig
{{ 'welcome-to-the-jungle'|to_camel }}

{# outputs 'welcomeToTheJungle' #}
```

Optionally, you can call a `from_*` filter to specify the casing convention of input *string*:

```twig
{{ 'user.first-name'|from_dot|to_upper }}

{# outputs 'USER FIRST-NAME' #}
```

How to install
--------------

Install with Composer:

```console
$ composer require jawira/case-converter-twig
```

If you are not using Symfony Flex, you also have to register the extension:

```yaml
# config/packages/case_converter_twig.yaml
services:
  jawira.case.converter.twig:
    class: \Jawira\CaseConverterTwig\CaseConverterExtension
    tags: [ 'twig.extension' ]
```

Contributing
------------

If you liked this project, ⭐ [star it on GitHub](https://github.com/jawira/case-converter-twig).

License
-------

This library is licensed under the [MIT license](LICENSE.md).

***

Packages from jawira
--------------------

<dl>

<dt>
    <a href="https://packagist.org/packages/jawira/case-converter">jawira/case-converter
    <img alt="GitHub stars" src="https://badgen.net/github/stars/jawira/case-converter?icon=github"/></a>
</dt>
<dd>Convert strings between 13 naming conventions: Snake case, Camel case,
  Pascal case, Kebab case, Ada case, Train case, Cobol case, Macro case,
  Upper case, Lower case, Sentence case, Title case and Dot notation.
</dd>

<dt>
    <a href="https://packagist.org/packages/jawira/emoji-catalog">jawira/emoji-catalog
    <img alt="GitHub stars" src="https://badgen.net/github/stars/jawira/emoji-catalog?icon=github"/></a>
</dt>
<dd>Get access to +3000 emojis as class constants.</dd>

<dt><a href="https://packagist.org/packages/jawira/">more...</a></dt>
</dl>
