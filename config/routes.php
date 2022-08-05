<?php

return [

    '/' => [
        'App\Controllers\HomeController',
        'show'
    ],

    '/addArgonaut.php' => [
        'App\Controllers\AddArgonautController',
        'add'
    ],

    '/getArgonauts.php' => [
        'App\Controllers\GetArgonautsController',
        'get'
    ],

    '/deleteArgonaut.php' => [
        'App\Controllers\DeleteArgonautController',
        'delete'
    ]
];