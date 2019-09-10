<?php

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->in(__DIR__)
    ->exclude('vendor')
    ->exclude('resources/views')
    ->exclude('storage')
    ->exclude('public')
    ->notName("*.txt")
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$fixers = [
    'single_quote'
];

return PhpCsFixer\Config::create()
    ->setIndent("  ")
    ->setRules([
        '@PSR2' => true,
        'strict_param' => false,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'braces' => [
            'allow_single_line_closure' => true, 
            'position_after_functions_and_oop_constructs' => 'same'
        ],
        'single_quote' => true
    ])
    ->setFinder($finder)
    ->setUsingCache(false);