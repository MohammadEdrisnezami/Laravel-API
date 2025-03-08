<?php

return [
    'paths' => ['api/*', 'storage/*'], // مطمئن شوید storage/* وجود دارد
    'allowed_methods' => ['GET', 'POST', 'OPTIONS'],
    'allowed_origins' => ['http://localhost:5173'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Content-Type', 'Authorization'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];