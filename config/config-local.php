<?php

return [
    'components' => [
        'db' => [
            'dsn'               => 'sqlite:@app/sqlite.db',
            'enableSchemaCache' => true,
        ],
    ],
];
