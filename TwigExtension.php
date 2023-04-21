<?php

namespace Drupal\superscript_symbols\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * A Twig extension that adds a filter to superscript registered and trademark characters.
 */
class SuperscriptSymbolsExtension extends AbstractExtension {

  /**
   * Generates a list of all Twig filters that this extension defines.
   */
  public function getFilters() {
    return [
      'superscript_symbols' => new TwigFilter('superscript_symbols', [$this, 'superscriptSymbolsFilter']),
    ];
  }

  /**
   * Gets a unique identifier for this Twig extension.
   */
  public function getName() {
    return 'superscript_symbols.superscript_symbols_extension';
  }

  /**
   * Superscripts registered (®) and trademark (™) characters in a string.
   *
   * @param string $string
   *   The string to be filtered.
   *
   * @return string
   *   The filtered string with superscripted registered and trademark characters.
   */
  public function superscriptSymbolsFilter($string) {
    return preg_replace_callback('/(®|™)/', function ($matches) {
      return sprintf('<sup>%s</sup>', $matches[0]);
    }, $string);
  }

}