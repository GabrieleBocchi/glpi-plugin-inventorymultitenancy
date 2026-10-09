<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['node_modules', 'var', 'vendor'])
    ->name('*.php');

return (new Config())
    ->setCacheFile(__DIR__ . '/var/php-cs-fixer.cache')
    ->setRules([
        '@PSR12' => true,
    ])
    ->setFinder($finder);
