<?php

use Illuminate\Support\Str;

return [
    'default' => 'file',

    'stores' => [
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],
    ],

    'prefix' => Str::slug('laravel', '_').'_cache',
];
