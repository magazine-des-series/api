<?php

declare(strict_types=1);

$finder = Symfony\CS\Finder::create()
    ->in(__DIR__.'/app')
    ->in(__DIR__.'/features')
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests');

return Symfony\CS\Config::create()
    ->fixers(
        [
            'ordered_use',
            'short_array_syntax',
            'strict',
            'strict_param',
        ]
    )
    ->finder($finder);
