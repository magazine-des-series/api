<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/app')
    ->in(__DIR__.'/features')
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests');

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules(
        [
            '@Symfony' => true,
            '@PHP71Migration' => true,
            'array_syntax' => ['syntax' => 'short'],
            'ordered_imports' => true,
            'phpdoc_order' => true,
            'return_type_declaration' => ['space_before' => 'none'],
        ]
    )
    ->setUsingCache(false);
