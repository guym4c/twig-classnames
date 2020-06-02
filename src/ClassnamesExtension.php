<?php

namespace Guym4c\TwigClassnames;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use voku\helper\UTF8;

class ClassnamesExtension extends AbstractExtension {

    public function getFunctions(): array {
        return [new TwigFunction('classnames', function (...$classes): string {
            $result = '';
            foreach ($classes as $arg) {
                if (is_array($arg)) {
                    foreach ($arg as $key => $value) {
                        if ($value) {
                            $result .= " {$key}";
                        }
                    }
                } else if ($arg) {
                    $result .= ' ' . (string) $arg;
                }
            }
            return UTF8::trim($result);
        })];
    }
}