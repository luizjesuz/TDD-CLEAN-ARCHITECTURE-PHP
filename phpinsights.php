<?php

declare(strict_types=1);

return [
    'preset' => 'default',
    'exclude' => [
        'coverage-report',
        'tmp',
        //  'path/to/directory-or-file'
    ],
    'add' => [
        //  ExampleMetric::class => [
        //      ExampleInsight::class,
        //  ]
    ],
    'remove' => [
        //  ExampleInsight::class,
    ],
    'config' => [
        //  ExampleInsight::class => [
        //      'key' => 'value',
        //  ],
    ],
];
