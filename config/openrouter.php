<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OpenRouter API Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for OpenRouter AI chat integration
    |
    */

    'api_key' => env('OPENROUTER_API_KEY', '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'),
    'base_url' => 'https://openrouter.ai/api/v1',
    'model' => 'deepseek/deepseek-r1-0528:free',
];
