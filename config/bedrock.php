<?php

return [
    'bearer_token' => env('AWS_BEARER_TOKEN_BEDROCK'),
    'region'       => env('AWS_BEDROCK_REGION', 'eu-north-1'),
    'base_url'     => 'https://bedrock-runtime.' . env('AWS_BEDROCK_REGION', 'eu-north-1') . '.amazonaws.com',
];
