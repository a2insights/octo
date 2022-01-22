<?php

use PhpCsFixer\Fixer\Import\OrderedImportsFixer;

$finder = PhpCsFixer\Finder::create()
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->exclude([
        '.git',
        '.idea',
        '*.blade.php',
        'bower_components',
        'node_modules',
        'vendor',
    ])
    ->exclude([
        'bootstrap/cache',
        'storage',
    ])
;

$config = new PhpCsFixer\Config();

return $config
    ->setUsingCache(true)
    ->setRules([
        '@Symfony' => true,
        'concat_space' => ['spacing' => 'one'],
        'array_syntax' => ['syntax' => 'short'],
        'no_empty_phpdoc' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_summary' => false,
        'ordered_imports' => [
            'sort_algorithm' => OrderedImportsFixer::SORT_ALPHA,
            'imports_order' => [
                OrderedImportsFixer::IMPORT_TYPE_CONST,
                OrderedImportsFixer::IMPORT_TYPE_FUNCTION,
                OrderedImportsFixer::IMPORT_TYPE_CLASS,
            ],
        ],
        'pow_to_exponentiation' => true,
        'yoda_style' => false,
        'psr0' => false,
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'phpdoc_indent' => true,
        'cast_spaces' => ['space' => 'single'],
        'binary_operator_spaces' => [],
        'unary_operator_spaces' => [],
        'phpdoc_scalar' => ['types' => ['boolean', 'callback', 'double', 'integer', 'real', 'str']],
        'standardize_not_equals' => true,
        'no_unused_imports' => true,
        'whitespace_after_comma_in_array' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_return' => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiline_whitespace_before_semicolons' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_trailing_whitespace_in_comment' => true,
        'no_whitespace_in_blank_line' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'trailing_comma_in_multiline_array' => true,
        'ordered_imports'  => [
            'sort_algorithm' => 'alpha',
        ],
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder)
;
